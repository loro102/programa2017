<template>

    <div class="col-md-12">

        <h1 class="text-center text-muted">

            Buscador

        </h1>


        <div class="well">

            <div class="form-group form-inline">

                <div class="input-group">

                    <div class="icon-addon">

                        <input type="text" placeholder="¿Que estas buscando?" class="form-control" v-model="query">
                        <select placeholder="¿Que estas buscando?" class="form-control" v-model="select">
                            <option value="1">Cliente</option>
                            <option value="2">Expediente</option>
                            <option value="3">Contrario</option>
                        </select>

                    </div>

                    <span class="input-group-btn">

                        <button class="btn btn-primary" v-on:click="search" type="button" v-if="!searching">

                            Buscar!

                        </button>

                        <button class="btn btn-default" type="button" disabled v-else>Buscando...</button>

                    </span>

                </div>

            </div>

        </div>


        <div class="alert alert-danger" v-if="error">

            <span class="glyphicon glyphicon-exclamation-sign">

                {{ error }}

            </span>

        </div>


        <div class="row list-group">

            <div v-if="!searching">

                <table class="table table-striped">

                    <thead>

                    <tr>

                        <th>Cliente</th>

                        <th>Nif</th>

                    </tr>


                    </thead>

                    <tbody>

                    <tr v-for="resultado in resultados">

                        <td>{{ resultado.apellidos }} {{ resultado.nombre }}</td>

                        <td>{{ resultado.nif }}</td>

                    </tr>

                    </tbody>

                </table>


                <div>

                        <span class="label label-success">

                        </span>

                </div>


                <div class="clearfix"></div>

                <hr/>


                <div class="pull-right">

                    <v-paginator

                            v-if="resultados"

                            :options="options"

                            :resource_url="resource_url"

                            v-on:update="updateResource"

                    >

                    </v-paginator>

                </div>


            </div>


            <div v-else class="text-center">

                <img src="/images/preloader.gif"/>

            </div>


        </div>

    </div>

</template>


<script>

    import Vue from 'vue';

    import VuePaginator from 'vuejs-paginator'

    export default {

        components: {

            VPaginator: VuePaginator

        },

        data() {

            return {

                resultados: [],

                searching: false,

                error: false,

                query: '',

                select: '1',

                options: {

                    remote_current_page: 'current_page',

                    remote_last_page: 'last_page',

                    remote_next_page_url: 'next_page_url',

                    remote_prev_page_url: 'prev_page_url',

                    next_button_text: 'Siguiente',

                    previous_button_text: 'Anterior'

                },

                resource_url: ''

            }

        },

        methods: {

            search: function () {

                this.error = '';

                this.resultados = [];

                this.searching = true;


                this.resource_url = 'http://localhost/api/searchcli?query=' + this.query + '&select=' + this.select;


                this.$http.get(this.resource_url).then((response) => {

                    if (response.body.error) {

                        this.error = response.body.error;

                    }

                    else {

                        Vue.set([], 'resultados', response.body);

                    }

                    this.searching = false;

                    this.query = '';

                });

            },

            updateResource: function (data) {

                this.resultados = data

            }

        }

    };

</script>