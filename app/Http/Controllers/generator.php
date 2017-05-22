<?php

namespace App\Http\Controllers;

use App\models\agent;
use App\models\customer;
use App\models\file;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use Storage;
use function storage_path;


class generator extends Controller
{
    public function __construct()
    {
        setlocale(LC_TIME, 'es_ES.utf8');
        $this->largo=Carbon::now()->formatLocalized('%A %d %B %Y');
        //$dt = Carbon::parse();
        //$this->largo = largo;

    }

    public function hoja_nueva_consulta(Request $request,$id)
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


         //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/cliente/').''.$cliente->id.'/RJ030_Hoja_consulta.docx');

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=RJ030_Hoja_consulta.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/cliente/').''.$cliente->id.'/RJ030_Hoja_consulta.docx');
        ob_clean();
        flush();
        exit;
        return redirect()->action('clientes@show@show',['id'=>$id]);

        //echo file_get_contents(storage_path('app/storage/cliente/').''.$cliente->id.'/RJ030_Hoja_consulta.docx');

    }

    //Procesar plantillas para la carta de agradecimiento

    public function carta_agracedimiento_agente(Request $request,$id,$cliente)
    {
        //
        //dd($request);
        $agente=agent::findorfail($id);
        $agente_cliente=customer::findorfail($cliente);
        //clonar plantilla
        $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/AgentesAgradecimiento.docx'));
        //reemplazar tags por valores
        $templateProcessor->setValue('empresa', htmlspecialchars('RumboJuridico'));
        $templateProcessor->setValue('hoy', Carbon::Now()->format('d-m-Y'));
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



        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/cliente/').''.$cliente.'/Hoja_agradecimiento_cliente.docx');

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=Hoja_agradecimiento_cliente.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/cliente/').''.$cliente.'/Hoja_agradecimiento_cliente.docx');
        ob_clean();
        flush();
        exit;
        return redirect()->action('clientes@show@show',['id'=>$cliente]);
        
    }

    //generador de documentos
    public function contrato_prestacion_servicios(Request $request,$file_id)
    {
        //
        //dd($request);
       // $agente = agent::findorfail($id);
        $file = file::findorfail($file_id);
        //$cliente = customer::findorfail($file->customer_id);
        //setlocale(LC_TIME, 'es_ES.utf8');
        //$largo=Carbon::now()->formatLocalized('%A %d %B %Y');
        //$dd($hoy);
        //clonar plantilla
        $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/contrato_prestacion_servicios.docx'));
        //reemplazar tags por valores
        $templateProcessor->setValue('empresa', htmlspecialchars('RumboJuridico'));
        $templateProcessor->setValue('hoy', Carbon::Now()->format('d-m-Y'));

        $templateProcessor->setValue('hoy_largo',$this->largo );

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


        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/cliente/').''.$file->customer_id.'/'.$file_id.'/contrato_prestacion_servicios.docx');

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=contrato_prestacion_servicios.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/cliente/').''.$file->customer_id.'/contrato_prestacion_servicios.docx');
        ob_clean();
        flush();
        exit;
        return redirect()->action('filesController@show',['id'=>$file->id]);

    }
    //Generación de contrato de prestación de servicios a representado
    public function contrato_prestacion_servicios_representados(Request $request,$file_id)
    {
        //
        //dd($request);
        // $agente = agent::findorfail($id);
        $file = file::findorfail($file_id);
        //$cliente = customer::findorfail($file->customer_id);

        //$dd($hoy);
        //clonar plantilla
        $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/contrato_prestacion_servicios_representado.docx'));
        //reemplazar tags por valores
        $templateProcessor->setValue('empresa', htmlspecialchars('RumboJuridico'));
        $templateProcessor->setValue('hoy', Carbon::Now()->format('d-m-Y'));

        $templateProcessor->setValue('hoy_largo',$largo );

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


        //guardar en carpeta de cliente
        $templateProcessor->saveAs(storage_path('app/storage/cliente/').''.$file->customer_id.'/'.$file_id.'/contrato_prestacion_servicios_representado.docx');

        //descarga el documento automaticamente
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header("Content-Disposition: attachment; filename=contrato_prestacion_servicios_representado.docx");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        echo file_get_contents(storage_path('app/storage/cliente/').''.$file->customer_id.'/contrato_prestacion_servicios_representado.docx');
        ob_clean();
        flush();
        exit;
        return redirect()->action('filesController@show',['id'=>$file->id]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$phpWord = new \PhpOffice\PhpWord\PhpWord();
        //$phpWord=new TemplateProcessor('Sample_07.docx');
       // $templateProcessor->setValue('Name', 'John Doe');
       // $templateProcessor->setValue(array('City', 'Street'), array('Detroit', '12th Street'));
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
