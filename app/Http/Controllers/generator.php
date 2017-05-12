<?php

namespace App\Http\Controllers;

use App\models\customer;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use Storage;
use function storage_path;


class generator extends Controller
{

    public function hoja_nueva_consulta(Request $request,$id)
    {
        //
        $cliente=customer::findorfail(7);
        //clonar plantilla
        $templateProcessor = new TemplateProcessor(storage_path('app/storage/documentos/RJ030_Hoja_consulta.docx'));
        //reemplazar tags por valores
        $templateProcessor->setValue('userId#1', htmlspecialchars('1'));
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

        echo file_get_contents(storage_path('app/storage/cliente/').''.$cliente->id.'/RJ030_Hoja_consulta.docx');

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