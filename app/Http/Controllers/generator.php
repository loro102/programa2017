<?php

namespace App\Http\Controllers;

use App\models\agent;
use App\models\customer;
use App\models\file;
use App\models\insurer;
use App\models\professional;
use Carbon\Carbon;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use Storage;
use function storage_path;


Class Generator extends Controller
{
    public function __construct()
    {
        setlocale(LC_TIME, 'es_ES.utf8');
        $this->largo=Carbon::now()->formatLocalized('%A %d %B %Y');
        $this->hoy= Carbon::Now()->format('d-m-Y');
        //datos empresa
        $this->empresa='nombre de empresa';
        $this->empresa_mercantil='nombre mercantil .SL';
        $this->empresa_cif='CIF de la empresa';
        $this->gerente_empresa='Nombre y apellidos del gerente';
        $this->gerente_nif_empresa='nif del gerente';
        $this->direccion_empresa='direccion de la empresa';
        $this->localidad_empresa='localidad de la empresa';
        $this->email_empresa='E-Mail de la empresa';
        $this->web_empresa='Página Web de la empresa';
        $this->telefono1='telefono 1 empresa';
        $this->telefono2='telefono 2 empresa';
        $this->fax='fax empresa';
        $this->movil='telefono movil empresa';
        $this->middleware('auth');

    }

    Public Function Hoja_Nueva_Consulta(Request $request,$id)
    {
        //
        $cliente=customer::findorfail($id);
        //clonar plantilla
        $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/RJ030_Hoja_consulta.docx'));
        //reemplazar tags por valores
        $templateProcessor->setValue('cliente.id', htmlspecialchars($cliente->id));
        $templateProcessor->setValue('cliente.nombre', htmlspecialchars($cliente->getFullNameAttribute($cliente->id)));
        $templateProcessor->setValue('cliente.nif', htmlspecialchars($cliente->nif));
        $templateProcessor->setValue('cliente.direccion', htmlspecialchars($cliente->direccion));
        $templateProcessor->setValue('cliente.localidad', htmlspecialchars($cliente->localidad));
        $templateProcessor->setValue('cliente.provincia', htmlspecialchars($cliente->provincia));
        $templateProcessor->setValue('cliente.codigopostal', htmlspecialchars($cliente->codigopostal));
        $templateProcessor->setValue('cliente.telefono', htmlspecialchars($cliente->telefono1));
        $templateProcessor->setValue('cliente.telefono2', htmlspecialchars($cliente->telefono2));
        $templateProcessor->setValue('cliente.movil', htmlspecialchars($cliente->movil));
        $templateProcessor->setValue('cliente.email', htmlspecialchars($cliente->email));
        $templateProcessor->setValue('cliente.agente', htmlspecialchars($cliente->agent->nombre));

        $templateProcessor->setValue('empresa.nombre', htmlspecialchars($this->empresa));
        $templateProcessor->setValue('empresa.nombremercantil', htmlspecialchars($this->empresa_mercantil));
        $templateProcessor->setValue('empresa.cif', htmlspecialchars($this->empresa_cif));
        $templateProcessor->setValue('empresa.direccion', htmlspecialchars($this->direccion_empresa));
        $templateProcessor->setValue('empresa.localidad', htmlspecialchars($this->localidad_empresa));
        $templateProcessor->setValue('empresa.telefono', htmlspecialchars($this->telefono1));
        $templateProcessor->setValue('empresa.telefono2', htmlspecialchars($this->telefono2));
        $templateProcessor->setValue('empresa.fax', htmlspecialchars($this->fax));
        $templateProcessor->setValue('empresa.movil', htmlspecialchars($this->movil));
        $templateProcessor->setValue('empresa.email', htmlspecialchars($this->email_empresa));
        $templateProcessor->setValue('empresa.web', htmlspecialchars($this->web_empresa));
        $templateProcessor->setValue('empresa.gerente', htmlspecialchars($this->gerente_empresa));
        $templateProcessor->setValue('empresa.nifgerente', htmlspecialchars($this->gerente_nif_empresa));

        $templateProcessor->setValue('hoy', $this->hoy);
        $templateProcessor->setValue('hoy_largo',$this->largo );


         //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/temp/RJ030_Hoja_consulta.docx'));

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=RJ030_Hoja_consulta.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/temp/RJ030_Hoja_consulta.docx'));
        ob_clean();
        flush();
        //exit;
        return redirect()->action('clientes@show@show',['id'=>$id]);

        //echo file_get_contents(storage_path('app/storage/cliente/').''.$cliente->id.'/RJ030_Hoja_consulta.docx');

    }

    //Procesar plantillas para la carta de agradecimiento

    Public Function Carta_Agracedimiento_Agente(Request $request,$id,$cliente)
    {

        $agente=agent::findorfail($id);
        $agente_cliente=customer::findorfail($cliente);
        //clonar plantilla
        $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/AgentesAgradecimiento.docx'));
        //reemplazar tags por valores
        $templateProcessor->setValue('agente.id', htmlspecialchars($agente->id));
        $templateProcessor->setValue('agente.nombre', htmlspecialchars($agente->nombre));
        $templateProcessor->setValue('agente.nif', htmlspecialchars($agente->nif));
        $templateProcessor->setValue('agente.direccion', htmlspecialchars($agente->direccion));
        $templateProcessor->setValue('agente.localidad', htmlspecialchars($agente->localidad));
        $templateProcessor->setValue('agente.provincia', htmlspecialchars($agente->provincia));
        $templateProcessor->setValue('agente.codigopostal', htmlspecialchars($agente->codigo_postal));
        $templateProcessor->setValue('agente.telefono', htmlspecialchars($agente->telefono1));
        $templateProcessor->setValue('agente.telefono2', htmlspecialchars($agente->telefono2));
        $templateProcessor->setValue('agente.movil', htmlspecialchars($agente->movil));
        $templateProcessor->setValue('agente.email', htmlspecialchars($agente->email));
        $templateProcessor->setValue('agente.fax', htmlspecialchars($agente->fax));
        $templateProcessor->setValue('agente.cliente', htmlspecialchars($agente_cliente->getFullNameAttribute($cliente)));

        $templateProcessor->setValue('empresa.nombre', htmlspecialchars($this->empresa));
        $templateProcessor->setValue('empresa.nombremercantil', htmlspecialchars($this->empresa_mercantil));
        $templateProcessor->setValue('empresa.cif', htmlspecialchars($this->empresa_cif));
        $templateProcessor->setValue('empresa.direccion', htmlspecialchars($this->direccion_empresa));
        $templateProcessor->setValue('empresa.localidad', htmlspecialchars($this->localidad_empresa));
        $templateProcessor->setValue('empresa.telefono', htmlspecialchars($this->telefono1));
        $templateProcessor->setValue('empresa.telefono2', htmlspecialchars($this->telefono2));
        $templateProcessor->setValue('empresa.fax', htmlspecialchars($this->fax));
        $templateProcessor->setValue('empresa.movil', htmlspecialchars($this->movil));
        $templateProcessor->setValue('empresa.email', htmlspecialchars($this->email_empresa));
        $templateProcessor->setValue('empresa.web', htmlspecialchars($this->web_empresa));
        $templateProcessor->setValue('empresa.gerente', htmlspecialchars($this->gerente_empresa));
        $templateProcessor->setValue('empresa.nifgerente', htmlspecialchars($this->gerente_nif_empresa));

        $templateProcessor->setValue('hoy', $this->hoy);
        $templateProcessor->setValue('hoy_largo',$this->largo );



        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/temp/Hoja_agradecimiento_cliente.docx'));

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=Hoja_agradecimiento_cliente.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/temp/Hoja_agradecimiento_cliente.docx'));
        ob_clean();
        flush();
        //exit;
        return redirect()->action('clientes@show@show',['id'=>$cliente]);
        
    }

    //generador de documentos
    Public Function Contrato_Prestacion_Servicios(Request $request,$file_id)
    {
        $file = file::findorfail($file_id);

        //clonar plantilla
        $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/contrato_prestacion_servicios.docx'));
        //reemplazar tags por valores
        $templateProcessor->setValue('cliente.id', htmlspecialchars($file->customer_id));
        $templateProcessor->setValue('cliente.nombre', htmlspecialchars($file->customer->getFullNameAttribute($file->customer_id)));
        $templateProcessor->setValue('cliente.nif', htmlspecialchars($file->customer->nif));
        $templateProcessor->setValue('cliente.direccion', htmlspecialchars($file->customer->direccion));
        $templateProcessor->setValue('cliente.localidad', htmlspecialchars($file->customer->localidad));
        $templateProcessor->setValue('cliente.provincia', htmlspecialchars($file->customer->provincia));
        $templateProcessor->setValue('cliente.codigopostal', htmlspecialchars($file->customer->codigopostal));
        $templateProcessor->setValue('cliente.telefono', htmlspecialchars($file->customer->telefono1));
        $templateProcessor->setValue('cliente.telefono2', htmlspecialchars($file->customer->telefono2));
        $templateProcessor->setValue('cliente.movil', htmlspecialchars($file->customer->movil));
        $templateProcessor->setValue('cliente.email', htmlspecialchars($file->customer->email));
        $templateProcessor->setValue('expediente.fechasuceso', htmlspecialchars($file->fecha_accidente));
        $templateProcessor->setValue('expediente.horasuceso', htmlspecialchars($file->hora_accidente));
        //tags extras
        $templateProcessor->setValue('empresa.nombre', htmlspecialchars($this->empresa));
        $templateProcessor->setValue('empresa.nombremercantil', htmlspecialchars($this->empresa_mercantil));
        $templateProcessor->setValue('empresa.cif', htmlspecialchars($this->empresa_cif));
        $templateProcessor->setValue('empresa.direccion', htmlspecialchars($this->direccion_empresa));
        $templateProcessor->setValue('empresa.localidad', htmlspecialchars($this->localidad_empresa));
        $templateProcessor->setValue('empresa.telefono', htmlspecialchars($this->telefono1));
        $templateProcessor->setValue('empresa.telefono2', htmlspecialchars($this->telefono2));
        $templateProcessor->setValue('empresa.fax', htmlspecialchars($this->fax));
        $templateProcessor->setValue('empresa.movil', htmlspecialchars($this->movil));
        $templateProcessor->setValue('empresa.email', htmlspecialchars($this->email_empresa));
        $templateProcessor->setValue('empresa.web', htmlspecialchars($this->web_empresa));
        $templateProcessor->setValue('empresa.gerente', htmlspecialchars($this->gerente_empresa));
        $templateProcessor->setValue('empresa.nifgerente', htmlspecialchars($this->gerente_nif_empresa));

        $templateProcessor->setValue('hoy', $this->hoy);
        $templateProcessor->setValue('hoy_largo',$this->largo );


        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/temp/contrato_prestacion_servicios.docx'));

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=contrato_prestacion_servicios.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/temp/contrato_prestacion_servicios.docx'));
        ob_clean();
        flush();
       // exit;
        return redirect()->action('filesController@show',['id'=>$file->id]);

    }
    //Generación de contrato de prestación de servicios a representado
    Public Function Contrato_Prestacion_Servicios_Representados(Request $request,$file_id)
    {
        $file = file::findorfail($file_id);
        //clonar plantilla
        $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/contrato_prestacion_servicios_representado.docx'));
        //reemplazar tags por valores
        $templateProcessor->setValue('cliente.id', htmlspecialchars($file->customer_id));
        $templateProcessor->setValue('cliente.nombre', htmlspecialchars($file->customer->getFullNameAttribute($file->customer_id)));
        $templateProcessor->setValue('cliente.nif', htmlspecialchars($file->customer->nif));
        $templateProcessor->setValue('cliente.direccion', htmlspecialchars($file->customer->direccion));
        $templateProcessor->setValue('cliente.localidad', htmlspecialchars($file->customer->localidad));
        $templateProcessor->setValue('cliente.provincia', htmlspecialchars($file->customer->provincia));
        $templateProcessor->setValue('cliente.codigopostal', htmlspecialchars($file->customer->codigopostal));
        $templateProcessor->setValue('cliente.telefono', htmlspecialchars($file->customer->telefono1));
        $templateProcessor->setValue('cliente.telefono2', htmlspecialchars($file->customer->telefono2));
        $templateProcessor->setValue('cliente.movil', htmlspecialchars($file->customer->movil));
        $templateProcessor->setValue('cliente.email', htmlspecialchars($file->customer->email));
        $templateProcessor->setValue('representado.nombre', htmlspecialchars($file->nombre));
        $templateProcessor->setValue('representado.fechanacimiento', htmlspecialchars($file->fechanacimiento));
        $templateProcessor->setValue('representado.nif', htmlspecialchars($file->nif));
        $templateProcessor->setValue('expediente.fechasuceso', htmlspecialchars($file->fecha_accidente));
        $templateProcessor->setValue('expediente.horasuceso', htmlspecialchars($file->hora_accidente));

        $templateProcessor->setValue('empresa.nombre', htmlspecialchars($this->empresa));
        $templateProcessor->setValue('empresa.nombremercantil', htmlspecialchars($this->empresa_mercantil));
        $templateProcessor->setValue('empresa.cif', htmlspecialchars($this->empresa_cif));
        $templateProcessor->setValue('empresa.direccion', htmlspecialchars($this->direccion_empresa));
        $templateProcessor->setValue('empresa.localidad', htmlspecialchars($this->localidad_empresa));
        $templateProcessor->setValue('empresa.telefono', htmlspecialchars($this->telefono1));
        $templateProcessor->setValue('empresa.telefono2', htmlspecialchars($this->telefono2));
        $templateProcessor->setValue('empresa.fax', htmlspecialchars($this->fax));
        $templateProcessor->setValue('empresa.movil', htmlspecialchars($this->movil));
        $templateProcessor->setValue('empresa.email', htmlspecialchars($this->email_empresa));
        $templateProcessor->setValue('empresa.web', htmlspecialchars($this->web_empresa));
        $templateProcessor->setValue('empresa.gerente', htmlspecialchars($this->gerente_empresa));
        $templateProcessor->setValue('empresa.nifgerente', htmlspecialchars($this->gerente_nif_empresa));

        $templateProcessor->setValue('hoy', $this->hoy);
        $templateProcessor->setValue('hoy_largo',$this->largo );


        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/temp/contrato_prestacion_servicios_representado.docx'));

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=contrato_prestacion_servicios_representado.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/temp/contrato_prestacion_servicios_representado.docx'));
        ob_clean();
        flush();
       // exit;
        return redirect()->action('filesController@show',['id'=>$file->id]);

    }

    //Generacion de asunción de dirección técnica
    Public Function Contrato_Asuncion_Direccion_Tecnica(Request $request,$file_id,$profesional_id)
    {
        $file = file::findorfail($file_id);
        $profesional=professional::findorfail($profesional_id);
        //clonar plantilla
        if (empty($file->nombre)){
            $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/asuncion_direccion_tecnica.docx'));
        }
        else
        {
            $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/asuncion_direccion_tecnica_representado.docx'));
        };
        //reemplazar tags por valores
        $templateProcessor->setValue('cliente.id', htmlspecialchars($file->customer_id));
        $templateProcessor->setValue('cliente.nombre', htmlspecialchars($file->customer->getFullNameAttribute($file->customer_id)));
        $templateProcessor->setValue('cliente.nif', htmlspecialchars($file->customer->nif));
        $templateProcessor->setValue('cliente.direccion', htmlspecialchars($file->customer->direccion));
        $templateProcessor->setValue('cliente.localidad', htmlspecialchars($file->customer->localidad));
        $templateProcessor->setValue('cliente.provincia', htmlspecialchars($file->customer->provincia));
        $templateProcessor->setValue('cliente.codigopostal', htmlspecialchars($file->customer->codigopostal));
        $templateProcessor->setValue('cliente.telefono', htmlspecialchars($file->customer->telefono1));
        $templateProcessor->setValue('cliente.telefono2', htmlspecialchars($file->customer->telefono2));
        $templateProcessor->setValue('cliente.movil', htmlspecialchars($file->customer->movil));
        $templateProcessor->setValue('cliente.email', htmlspecialchars($file->customer->email));
        //$templateProcessor->setValue('representado.nombre', htmlspecialchars($file->nombre));
        //$templateProcessor->setValue('representado.fechanacimiento', htmlspecialchars($file->fechanacimiento));
        //$templateProcessor->setValue('representado.nif', htmlspecialchars($file->nif));
        $templateProcessor->setValue('expediente.fechasuceso', htmlspecialchars($file->fecha_accidente));
        $templateProcessor->setValue('expediente.horasuceso', htmlspecialchars($file->hora_accidente));
        $templateProcessor->setValue('profesional.nombre', htmlspecialchars($profesional->Nombre));
        $templateProcessor->setValue('profesional.nif', htmlspecialchars($profesional->nif));
        $templateProcessor->setValue('profesional.colegiado', htmlspecialchars($profesional->num_colegiado));

        $templateProcessor->setValue('empresa.nombre', htmlspecialchars($this->empresa));
        $templateProcessor->setValue('empresa.nombremercantil', htmlspecialchars($this->empresa_mercantil));
        $templateProcessor->setValue('empresa.cif', htmlspecialchars($this->empresa_cif));
        $templateProcessor->setValue('empresa.direccion', htmlspecialchars($this->direccion_empresa));
        $templateProcessor->setValue('empresa.localidad', htmlspecialchars($this->localidad_empresa));
        $templateProcessor->setValue('empresa.telefono', htmlspecialchars($this->telefono1));
        $templateProcessor->setValue('empresa.telefono2', htmlspecialchars($this->telefono2));
        $templateProcessor->setValue('empresa.fax', htmlspecialchars($this->fax));
        $templateProcessor->setValue('empresa.movil', htmlspecialchars($this->movil));
        $templateProcessor->setValue('empresa.email', htmlspecialchars($this->email_empresa));
        $templateProcessor->setValue('empresa.web', htmlspecialchars($this->web_empresa));
        $templateProcessor->setValue('empresa.gerente', htmlspecialchars($this->gerente_empresa));
        $templateProcessor->setValue('empresa.nifgerente', htmlspecialchars($this->gerente_nif_empresa));

        $templateProcessor->setValue('hoy', $this->hoy);
        $templateProcessor->setValue('hoy_largo',$this->largo );


        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/temp/asuncion_direccion_tecnica.docx'));

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=asuncion_direccion_tecnica.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/temp/asuncion_direccion_tecnica.docx'));
        ob_clean();
        flush();
        //exit;
        return redirect()->action('filesController@show',['id'=>$file_id]);

    }

    //Generacion de autorización y compromiso de pago
    Public Function Autorización_Servicio_Profesionales(Request $request,$file_id,$profesional_id)
    {

        $file = file::findorfail($file_id);
        $profesional=professional::findorfail($profesional_id);
        //clonar plantilla
        if (empty($file->nombre)){
            $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/autorización_servicio_profesionales.docx'));
        }
        else
        {
            $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/autorización_servicio_profesionales_representado.docx'));
        };

        //reemplazar tags por valores
        $templateProcessor->setValue('cliente.id', htmlspecialchars($file->customer_id));
        $templateProcessor->setValue('cliente.nombre', htmlspecialchars($file->customer->getFullNameAttribute($file->customer_id)));
        $templateProcessor->setValue('cliente.nif', htmlspecialchars($file->customer->nif));
        $templateProcessor->setValue('cliente.direccion', htmlspecialchars($file->customer->direccion));
        $templateProcessor->setValue('cliente.localidad', htmlspecialchars($file->customer->localidad));
        $templateProcessor->setValue('cliente.provincia', htmlspecialchars($file->customer->provincia));
        $templateProcessor->setValue('cliente.codigopostal', htmlspecialchars($file->customer->codigopostal));
        $templateProcessor->setValue('cliente.telefono', htmlspecialchars($file->customer->telefono1));
        $templateProcessor->setValue('cliente.telefono2', htmlspecialchars($file->customer->telefono2));
        $templateProcessor->setValue('cliente.movil', htmlspecialchars($file->customer->movil));
        $templateProcessor->setValue('cliente.email', htmlspecialchars($file->customer->email));
        $templateProcessor->setValue('representado.nombre', htmlspecialchars($file->nombre));
        $templateProcessor->setValue('representado.fechanacimiento', htmlspecialchars($file->fechanacimiento));
        $templateProcessor->setValue('representado.nif', htmlspecialchars($file->nif));
        $templateProcessor->setValue('expediente.fechasuceso', htmlspecialchars($file->fecha_accidente));
        $templateProcessor->setValue('expediente.horasuceso', htmlspecialchars($file->hora_accidente));
        $templateProcessor->setValue('profesional.nombre', htmlspecialchars($profesional->Nombre));
        $templateProcessor->setValue('profesional.nif', htmlspecialchars($profesional->nif));
        $templateProcessor->setValue('profesional.colegiado', htmlspecialchars($profesional->num_colegiado));
        $templateProcessor->setValue('profesional.especialidad', htmlspecialchars($profesional->especialidad));
        $templateProcessor->setValue('profesional.direccion', htmlspecialchars($profesional->direccion));
        $templateProcessor->setValue('profesional.localidad', htmlspecialchars($profesional->localidad));
        $templateProcessor->setValue('profesional.codigopostal', htmlspecialchars($profesional->codigo_postal));
        $templateProcessor->setValue('profesional.provincia', htmlspecialchars($profesional->provincia));
        $templateProcessor->setValue('profesional.telefono', htmlspecialchars($profesional->telefono1));
        $templateProcessor->setValue('profesional.telefono2', htmlspecialchars($profesional->telefono2));
        $templateProcessor->setValue('profesional.telefono3', htmlspecialchars($profesional->telefono3));
        $templateProcessor->setValue('profesional.movil', htmlspecialchars($profesional->movil));
        $templateProcessor->setValue('profesional.email', htmlspecialchars($profesional->email));
        $templateProcessor->setValue('empresa.nombre', htmlspecialchars($this->empresa));
        $templateProcessor->setValue('empresa.nombremercantil', htmlspecialchars($this->empresa_mercantil));
        $templateProcessor->setValue('empresa.cif', htmlspecialchars($this->empresa_cif));
        $templateProcessor->setValue('empresa.direccion', htmlspecialchars($this->direccion_empresa));
        $templateProcessor->setValue('empresa.localidad', htmlspecialchars($this->localidad_empresa));
        $templateProcessor->setValue('empresa.telefono', htmlspecialchars($this->telefono1));
        $templateProcessor->setValue('empresa.telefono2', htmlspecialchars($this->telefono2));
        $templateProcessor->setValue('empresa.fax', htmlspecialchars($this->fax));
        $templateProcessor->setValue('empresa.movil', htmlspecialchars($this->movil));
        $templateProcessor->setValue('empresa.email', htmlspecialchars($this->email_empresa));
        $templateProcessor->setValue('empresa.web', htmlspecialchars($this->web_empresa));
        $templateProcessor->setValue('empresa.gerente', htmlspecialchars($this->gerente_empresa));
        $templateProcessor->setValue('empresa.nifgerente', htmlspecialchars($this->gerente_nif_empresa));
        $templateProcessor->setValue('hoy', $this->hoy);
        $templateProcessor->setValue('hoy_largo',$this->largo );


        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/temp/autorización_servicio_profesionales.docx'));

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=autorización_servicio_profesionales.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/temp/autorización_servicio_profesionales.docx'));
        ob_clean();
        flush();
        //exit;
        return redirect()->action('filesController@show',['id'=>$file->id]);

    }

    //Generacion de autorización y compromiso de pago
    Public Function Designacion_Abogado(Request $request,$file_id,$profesional_id)
    {
        $file = file::findorfail($file_id);
        $profesional=professional::findorfail($profesional_id);
        $aseguradora=insurer::findorfail($file->insurer_id);
        //clonar plantilla
        if (empty($file->nombre)){
            $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/designacion_abogados.docx'));
        }
        else
        {
            $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/designacion_abogados_representado.docx'));
        };

        //reemplazar tags por valores
        $templateProcessor->setValue('cliente.id', htmlspecialchars($file->customer_id));
        $templateProcessor->setValue('cliente.nombre', htmlspecialchars($file->customer->getFullNameAttribute($file->customer_id)));
        $templateProcessor->setValue('cliente.nif', htmlspecialchars($file->customer->nif));
        $templateProcessor->setValue('cliente.direccion', htmlspecialchars($file->customer->direccion));
        $templateProcessor->setValue('cliente.localidad', htmlspecialchars($file->customer->localidad));
        $templateProcessor->setValue('cliente.provincia', htmlspecialchars($file->customer->provincia));
        $templateProcessor->setValue('cliente.codigopostal', htmlspecialchars($file->customer->codigopostal));
        $templateProcessor->setValue('cliente.telefono', htmlspecialchars($file->customer->telefono1));
        $templateProcessor->setValue('cliente.telefono2', htmlspecialchars($file->customer->telefono2));
        $templateProcessor->setValue('cliente.movil', htmlspecialchars($file->customer->movil));
        $templateProcessor->setValue('cliente.email', htmlspecialchars($file->customer->email));
        $templateProcessor->setValue('representado.nombre', htmlspecialchars($file->nombre));
        $templateProcessor->setValue('representado.fechanacimiento', htmlspecialchars($file->fechanacimiento));
        $templateProcessor->setValue('representado.nif', htmlspecialchars($file->nif));
        $templateProcessor->setValue('expediente.fechasuceso', htmlspecialchars($file->fecha_accidente));
        $templateProcessor->setValue('expediente.horasuceso', htmlspecialchars($file->hora_accidente));
        $templateProcessor->setValue('expediente.referencia', htmlspecialchars($file->ref_expediente));
        $templateProcessor->setValue('expediente.poliza', htmlspecialchars($file->numero_poliza));
        $templateProcessor->setValue('expediente.condicion', htmlspecialchars($file->condicion));
        $templateProcessor->setValue('profesional.nombre', htmlspecialchars($profesional->Nombre));
        $templateProcessor->setValue('profesional.nif', htmlspecialchars($profesional->nif));
        $templateProcessor->setValue('profesional.colegiado', htmlspecialchars($profesional->num_colegiado));
        $templateProcessor->setValue('profesional.especialidad', htmlspecialchars($profesional->especialidad));
        $templateProcessor->setValue('profesional.direccion', htmlspecialchars($profesional->direccion));
        $templateProcessor->setValue('profesional.localidad', htmlspecialchars($profesional->localidad));
        $templateProcessor->setValue('profesional.codigopostal', htmlspecialchars($profesional->codigo_postal));
        $templateProcessor->setValue('profesional.provincia', htmlspecialchars($profesional->provincia));
        $templateProcessor->setValue('profesional.telefono', htmlspecialchars($profesional->telefono1));
        $templateProcessor->setValue('profesional.telefono2', htmlspecialchars($profesional->telefono2));
        $templateProcessor->setValue('profesional.telefono3', htmlspecialchars($profesional->telefono3));
        $templateProcessor->setValue('profesional.movil', htmlspecialchars($profesional->movil));
        $templateProcessor->setValue('profesional.email', htmlspecialchars($profesional->email));
        $templateProcessor->setValue('aseguradora.nombre', htmlspecialchars($aseguradora->nombre));
        $templateProcessor->setValue('aseguradora.direccion', htmlspecialchars($aseguradora->direccion));
        $templateProcessor->setValue('aseguradora.codigopostal', htmlspecialchars($aseguradora->codigo_postal));
        $templateProcessor->setValue('aseguradora.localidad', htmlspecialchars($aseguradora->localidad));
        $templateProcessor->setValue('aseguradora.provincia', htmlspecialchars($aseguradora->provincia));

        $templateProcessor->setValue('empresa.nombre', htmlspecialchars($this->empresa));
        $templateProcessor->setValue('empresa.nombremercantil', htmlspecialchars($this->empresa_mercantil));
        $templateProcessor->setValue('empresa.cif', htmlspecialchars($this->empresa_cif));
        $templateProcessor->setValue('empresa.direccion', htmlspecialchars($this->direccion_empresa));
        $templateProcessor->setValue('empresa.localidad', htmlspecialchars($this->localidad_empresa));
        $templateProcessor->setValue('empresa.telefono', htmlspecialchars($this->telefono1));
        $templateProcessor->setValue('empresa.telefono2', htmlspecialchars($this->telefono2));
        $templateProcessor->setValue('empresa.fax', htmlspecialchars($this->fax));
        $templateProcessor->setValue('empresa.movil', htmlspecialchars($this->movil));
        $templateProcessor->setValue('empresa.email', htmlspecialchars($this->email_empresa));
        $templateProcessor->setValue('empresa.web', htmlspecialchars($this->web_empresa));
        $templateProcessor->setValue('empresa.gerente', htmlspecialchars($this->gerente_empresa));
        $templateProcessor->setValue('empresa.nifgerente', htmlspecialchars($this->gerente_nif_empresa));

        $templateProcessor->setValue('hoy', $this->hoy);
        $templateProcessor->setValue('hoy_largo',$this->largo );


        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/temp/designacion_abogado.docx'));

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=designacion_abogado.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/temp/designacion_abogado.docx'));
        ob_clean();
        flush();
        //exit;
        return redirect()->action('filesController@show',['id'=>$file->id]);

    }
     //Generacion de RAJ
    Public Function ReciboAsisteciaJuridica(Request $request,$file_id,$profesional_id)
    {
        $file = file::findorfail($file_id);
        $profesional=professional::findorfail($profesional_id);
        $aseguradora=insurer::findorfail($file->insurer_id);

        //clonar plantilla
        if (empty($file->nombre)){
            $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/designacion_abogados.docx'));
        }
        else
        {
            $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/designacion_abogados_representado.docx'));
        };

        //reemplazar tags por valores
        $templateProcessor->setValue('cliente.id', htmlspecialchars($file->customer_id));
        $templateProcessor->setValue('cliente.nombre', htmlspecialchars($file->customer->getFullNameAttribute($file->customer_id)));
        $templateProcessor->setValue('cliente.nif', htmlspecialchars($file->customer->nif));
        $templateProcessor->setValue('cliente.direccion', htmlspecialchars($file->customer->direccion));
        $templateProcessor->setValue('cliente.localidad', htmlspecialchars($file->customer->localidad));
        $templateProcessor->setValue('cliente.provincia', htmlspecialchars($file->customer->provincia));
        $templateProcessor->setValue('cliente.codigopostal', htmlspecialchars($file->customer->codigopostal));
        $templateProcessor->setValue('cliente.telefono', htmlspecialchars($file->customer->telefono1));
        $templateProcessor->setValue('cliente.telefono2', htmlspecialchars($file->customer->telefono2));
        $templateProcessor->setValue('cliente.movil', htmlspecialchars($file->customer->movil));
        $templateProcessor->setValue('cliente.email', htmlspecialchars($file->customer->email));
        $templateProcessor->setValue('representado.nombre', htmlspecialchars($file->nombre));
        $templateProcessor->setValue('representado.fechanacimiento', htmlspecialchars($file->fechanacimiento));
        $templateProcessor->setValue('representado.nif', htmlspecialchars($file->nif));
        $templateProcessor->setValue('expediente.fechasuceso', htmlspecialchars($file->fecha_accidente));
        $templateProcessor->setValue('expediente.horasuceso', htmlspecialchars($file->hora_accidente));
        $templateProcessor->setValue('expediente.referencia', htmlspecialchars($file->ref_expediente));
        $templateProcessor->setValue('expediente.poliza', htmlspecialchars($file->numero_poliza));
        $templateProcessor->setValue('expediente.condicion', htmlspecialchars($file->condicion));
        $templateProcessor->setValue('profesional.nombre', htmlspecialchars($profesional->Nombre));
        $templateProcessor->setValue('profesional.nif', htmlspecialchars($profesional->nif));
        $templateProcessor->setValue('profesional.colegiado', htmlspecialchars($profesional->num_colegiado));
        $templateProcessor->setValue('profesional.especialidad', htmlspecialchars($profesional->especialidad));
        $templateProcessor->setValue('profesional.direccion', htmlspecialchars($profesional->direccion));
        $templateProcessor->setValue('profesional.localidad', htmlspecialchars($profesional->localidad));
        $templateProcessor->setValue('profesional.codigopostal', htmlspecialchars($profesional->codigo_postal));
        $templateProcessor->setValue('profesional.provincia', htmlspecialchars($profesional->provincia));
        $templateProcessor->setValue('profesional.telefono', htmlspecialchars($profesional->telefono1));
        $templateProcessor->setValue('profesional.telefono2', htmlspecialchars($profesional->telefono2));
        $templateProcessor->setValue('profesional.telefono3', htmlspecialchars($profesional->telefono3));
        $templateProcessor->setValue('profesional.movil', htmlspecialchars($profesional->movil));
        $templateProcessor->setValue('profesional.email', htmlspecialchars($profesional->email));
        $templateProcessor->setValue('aseguradora.nombre', htmlspecialchars($aseguradora->nombre));
        $templateProcessor->setValue('aseguradora.direccion', htmlspecialchars($aseguradora->direccion));
        $templateProcessor->setValue('aseguradora.codigopostal', htmlspecialchars($aseguradora->codigo_postal));
        $templateProcessor->setValue('aseguradora.localidad', htmlspecialchars($aseguradora->localidad));
        $templateProcessor->setValue('aseguradora.provincia', htmlspecialchars($aseguradora->provincia));

        $templateProcessor->setValue('empresa.nombre', htmlspecialchars($this->empresa));
        $templateProcessor->setValue('empresa.nombremercantil', htmlspecialchars($this->empresa_mercantil));
        $templateProcessor->setValue('empresa.cif', htmlspecialchars($this->empresa_cif));
        $templateProcessor->setValue('empresa.direccion', htmlspecialchars($this->direccion_empresa));
        $templateProcessor->setValue('empresa.localidad', htmlspecialchars($this->localidad_empresa));
        $templateProcessor->setValue('empresa.telefono', htmlspecialchars($this->telefono1));
        $templateProcessor->setValue('empresa.telefono2', htmlspecialchars($this->telefono2));
        $templateProcessor->setValue('empresa.fax', htmlspecialchars($this->fax));
        $templateProcessor->setValue('empresa.movil', htmlspecialchars($this->movil));
        $templateProcessor->setValue('empresa.email', htmlspecialchars($this->email_empresa));
        $templateProcessor->setValue('empresa.web', htmlspecialchars($this->web_empresa));
        $templateProcessor->setValue('empresa.gerente', htmlspecialchars($this->gerente_empresa));
        $templateProcessor->setValue('empresa.nifgerente', htmlspecialchars($this->gerente_nif_empresa));

        $templateProcessor->setValue('hoy', $this->hoy);
        $templateProcessor->setValue('hoy_largo',$this->largo );


        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/temp/designacion_abogado.docx'));

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=designacion_abogado.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/temp/designacion_abogado.docx'));
        ob_clean();
        flush();
        //exit;
        return redirect()->action('filesController@show',['id'=>$file->id]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=customer::findorfail(9);
        echo date('H:i:s'), ' Creating new TemplateProcessor instance...';
        $templateProcessor = new TemplateProcessor('storage/Sample_07.docx');
// Variables on different parts of document

        $templateProcessor->setValue('weekday', htmlspecialchars(date('l'))); // On section/content
        $templateProcessxor->setValue('time', htmlspecialchars(date('H:i'))); // On footer
        $templateProcessor->setValue('serverName', htmlspecialchars(realpath(__DIR__))); // On header

// Simple table
        $templateProcessor->cloneRow('rowValue', 10);

        $templateProcessor->setValue('rowValue#1', htmlspecialchars('Sun'));
        $templateProcessor->setValue('rowValue#2', htmlspecialchars('Mercury'));
        $templateProcessor->setValue('rowValue#3', htmlspecialchars('Venus'));
        $templateProcessor->setValue('rowValue#4', htmlspecialchars('Earth'));
        $templateProcessor->setValue('rowValue#5', htmlspecialchars('Mars'));
        $templateProcessor->setValue('rowValue#6', htmlspecialchars('Jupiter'));
        $templateProcessor->setValue('rowValue#7', htmlspecialchars('Saturn'));
        $templateProcessor->setValue('rowValue#8', htmlspecialchars('Uranus'));
        $templateProcessor->setValue('rowValue#9', htmlspecialchars('Neptun'));
        $templateProcessor->setValue('rowValue#10', htmlspecialchars('Pluto'));

        $templateProcessor->setValue('rowNumber#1', htmlspecialchars('1'));
        $templateProcessor->setValue('rowNumber#2', htmlspecialchars('2'));
        $templateProcessor->setValue('rowNumber#3', htmlspecialchars('3'));
        $templateProcessor->setValue('rowNumber#4', htmlspecialchars('4'));
        $templateProcessor->setValue('rowNumber#5', htmlspecialchars('5'));
        $templateProcessor->setValue('rowNumber#6', htmlspecialchars('6'));
        $templateProcessor->setValue('rowNumber#7', htmlspecialchars('7'));
        $templateProcessor->setValue('rowNumber#8', htmlspecialchars('8'));
        $templateProcessor->setValue('rowNumber#9', htmlspecialchars('9'));
        $templateProcessor->setValue('rowNumber#10', htmlspecialchars('10'));

// Table with a spanned cell
        

        $templateProcessor->setValue('userId#1', htmlspecialchars('1'));
        $templateProcessor->setValue('cliente.nombre', htmlspecialchars($cliente->nombre));
        $templateProcessor->setValue('userFirstName#1', htmlspecialchars('James'));
        $templateProcessor->setValue('userName#1', htmlspecialchars('Taylor'));
        $templateProcessor->setValue('userPhone#1', htmlspecialchars('+1 428 889 773'));
        $templateProcessor->setValue('usermovile#1', htmlspecialchars('+1 428 889 773'));
        $templateProcessor->setValue('userId#2', htmlspecialchars('2'));
        $templateProcessor->setValue('userFirstName#2', htmlspecialchars('Robert'));
        $templateProcessor->setValue('userName#2', htmlspecialchars('Bell'));
        $templateProcessor->setValue('userPhone#2', htmlspecialchars('+1 428 889 774'));

        $templateProcessor->setValue('userId#3', htmlspecialchars('3'));
        $templateProcessor->setValue('userFirstName#3', htmlspecialchars('Michael'));
        $templateProcessor->setValue('userName#3', htmlspecialchars('Ray'));
        $templateProcessor->setValue('userPhone#3', htmlspecialchars('+1 428 889 775'));

        echo date('H:i:s'), ' Saving the result document...';
         //dd($disco->put('hola'));
        $templateProcessor->saveAs(storage_path('app/storage/cliente/').''.$cliente->id.'/Sample_07_TemplateCloneRow.docx');
       // Storage::move('storage/Sample_07_TemplateCloneRow.docx', 'storage/cliente/ejemplo.docx');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
