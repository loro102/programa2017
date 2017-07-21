<template>
    <div class="col-md-12">
        <h1 class="text-center text-muted">
            Buscador
        </h1>
        <div class="well">
            <div class="formgroup">
                <div class="input-group">
                    <div>
                        <input
                                type="text"
                                class="form-control"
                                placeholder="¿A quien buscas?"
                                v-model="query"
                                />
                </div>
                    <div><span class="input-group-btn">
                        <button class="btn btn-primary" @click="search" type="button" v-if="!searching">
                            Buscar
                        </button>
                        <button class="btn btn-default" type="button" disabled v-else="">
                            Buscando ...

                        </button>
                        </span></div>
            </div>
        </div>
            <div class="alert alert-danger" v-if="error">
                <span class="glypicon glyphicon-exclamation">
                    {{error}}
                </span>
            </div>
            <div class="row list-group">
                <div v-if="!searching">
                    <div class="well col-xs-10 col-xs-offset-1" v-for="customer in customer"></div>
                    <h1>{{cliente.nombre}}</h1>

                </div>
                <div class="pull-rigth">
                    <v-paginator v-if="customer"
                                 :options="options"
                                 :ressource_url="resource_url"
                                 v-on:update="updateResource"
                                 >

                    </v-paginator>
                    <div v-else class="text-center">nanai</div>
                </div>
            </div>
    </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import VueResource from 'vue-resource';
    Vue.use(VueResource);
    import VuePaginator from 'vuejs-paginator';
    export default {
        components:{
            VPaginator:VuePaginator
        },
        data(){
            return{
                customer:[],
                searching:false,
                error:false,
                query:'',
                resource_url:'',
                options:{
                    remote_current_page:'current_page',
                    remote_last_page:'last_page',
                    remote_next_page_url:'next_page_url',
                    remote_prev_page_url:'prev_page_url',
                    next_button_text:'Siguiente',
                    previous_button_text:'Anterior'
                },
                methods: {
                    search: function () {
                        this.error = '';
                        this.customers = [];
                        this.searching = true;
                        this.resource_url = 'localhost/api/search?query=' + this.query;
                        this.$http.get(this.resource_url).then((response)=>{
                            if (response.body.error)
                            {
                                this.error=response.body.error;
                            }
                            else{
                                Vue.set([],'customers',response.body);
                            }
                            this.searching=false;
                            this.query='';
                        })
                    },
                    updateResource:function(data)
                    {
                        this.customers=data;
                    }
                }

            }
        }
    }

</script>