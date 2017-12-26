<?php

namespace App\Http\Controllers;

use App\models\customer;
use App\models\File;
use App\models\Insurer;
use App\models\Opponent;
use App\models\Phase;
use App\models\Professional;
use Illuminate\Http\Request;
use function nullOrEmptyString;

//use Phases;

Class Buscador Extends Controller
{
    public function filtrar()
    {
        $abogados = Professional::where('group_id', '1')->get();
        $lugar = File::all()->unique()->pluck('lugar', 'lugar')->prepend('Ninguno', 0);
        $fases = Phase::all();
        $aseguradoras = Insurer::all()->pluck('nombre', 'id')->prepend('Todas', '0');
        //dd($abogados);
        $working_days = collect([0 => 'Mon', 1 => 'Tue', 2 => 'Wed', 3 => 'Thu', 4 => 'Fri', 5 => 'Sat', 6 => 'Sun']);
        $saved_working_days = integerValue(0);

        //dd($working_days);
        return view('clientes2.buscador.siniestros', [
            'abogados' => $abogados,
            'lugar' => $lugar,
            'fases' => $fases,
            'aseguradoras' => $aseguradoras,
            'saved_working_days' => $saved_working_days,
        ]);
    }

    public function clientes(Request $request)
    {

        //dd($request);
        if ($request->has('search')) {
            if ($request->has('select')) {
                $select = $request->get('select');
                if ($select == 1) {

                    $resultados = customer::search($request->get('search', true))->get();

                    return view('clientes2.index', [
                        'resultados' => $resultados,
                    ]);
                }
                if ($select == 2) {
                    $resultados = File::search($request->get('search'))->paginate(15);

                    return view('clientes2.expedientes', [
                        'resultados' => $resultados,
                    ]);
                }
                if ($select == 3) {
                    $resultados = Opponent::search($request->get('search'))->paginate(15);

                    return view('clientes2.index', [
                        'resultados' => $resultados,
                    ]);
                }

                return view('clientes2.index', [
                    'resultados' => $resultados,
                ]);
            }
        }
        $resultados = customer::search('caracortada')->paginate(15);

        return view('clientes2.index', [
            'resultados' => $resultados,
        ]);
    }

    public function expedientes(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = File::search($request->get('query'));

            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }

    public function oponentes(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = Opponent::search($request->get('query'));

            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }

    public function cliente(Request $request)
    {
        if ($request->has('search')) {
            $resultados = customer::search($request->get('search'))->paginate(15);
        } else {
            $resultados = Customer::all();
        }

//dd($resultados);
        return view('clientes2.index', [
            'resultados' => $resultados,
        ]);
    }

    /*
     Siniestros.Source = Siniestros.Source + " WHERE (Siniestro.Tipo=1)
    and (Abonados.Id = Siniestro.Abonado)
    and (Siniestro.[Fecha Siniestro] is null
    or Siniestro.[Fecha Siniestro] between format('" + Replace(Siniestros__DFecha1, "'", "''") + "','dd/mm/yyyy')
    and format('" + Replace(Siniestros__DFecha2, "'", "''") + "','dd/mm/yyyy'))
    and (Siniestro.FechaAperturaExpediente is null
    or Siniestro.FechaAperturaExpediente between format('" + Replace(Siniestros__DFechaAE1, "'", "''") + "','dd/mm/yyyy')
    and format('" + Replace(Siniestros__DFechaAE2, "'", "''") + "','dd/mm/yyyy'))
    and (Siniestro.FechaCierreExpediente is null
    or Siniestro.FechaCierreExpediente between format('" + Replace(Siniestros__DFechaCE1, "'", "''") + "','dd/mm/yyyy')
    and format('" + Replace(Siniestros__DFechaCE2, "'", "''") + "','dd/mm/yyyy'))
    AND (Siniestro.Lugar like '" + Replace(Siniestros__DLugar, "'", "''") + "')
    and (Siniestro.Compañia Like  '%" + Replace(Siniestros__DCompAseguradora, "'", "''") + "%')
    and Tramitadores.Id=Siniestro.Tramitador
    and Agentes.Id=Abonados.Agente
    and Siniestro.Fase=Fases.Id
    and Siniestro.Fase in " + Replace(Siniestros__DFases, "'", "''") + "
    and (Siniestro.Tramitador in "+request.form("tramitador")+")
    and "+request.form("AJ")+"
    and "+request.form("CT1")+"
    and "+request.form("CT2")+request.form("Profesional1")+request.form("Profesional2")
' if (Request.form("CiaContraria")<>"") then Siniestros.Source = Siniestros.Source + "
    and (Contrarios.Compañia = '%" + Replace(Request.form("CiaContraria"), "'", "''") + "%')
    and (Contrarios.Siniestro=Siniestro.Id)"
'if (request.Form("cerrados")="checkbox") then Siniestros.Source = Siniestros.Source + "
    and (Siniestro.Fase=70)"
if (request.Form("alta")="checkbox") then Siniestros.Source = Siniestros.Source + "
    and (Siniestro.[Fecha Alta] between format('" + Request.Form("FechaAlta1")+ "','dd/mm/yyyy')
    and format('" + Request.Form("FechaAlta2") + "','dd/mm/yyyy'))"

if (request.Form("alta")="checkbox") then Siniestros.Source = Siniestros.Source + "
    and (Siniestro.[Fecha Alta] between format('" + Request.Form("FechaAlta1")+ "','dd/mm/yyyy')
    and format('" + Request.Form("FechaAlta2") + "','dd/mm/yyyy'))"

if (request.Form("FechaCobrorumbo")="checkbox") then Siniestros.Source = Siniestros.Source + "
    and (Siniestro.FechaCobrorumbo between format('" + Request.Form("FechaCobrorumbo1")+ "','dd/mm/yyyy')
    and format('" + Request.Form("FechaCobrorumbo2") + "','dd/mm/yyyy'))
    and Siniestro.FechaCobrorumbo is not null "
if (request.Form("FechaArchivo")="checkbox") then Siniestros.Source = Siniestros.Source + "
    and (Siniestro.FechaArchivo between format('" + Request.Form("FechaArchivo1")+ "','dd/mm/yyyy')
    and format('" + Request.Form("FechaArchivo2") + "','dd/mm/yyyy'))
    and Siniestro.FechaArchivo is not null "
'if not(request.Form("Fase")="") then Siniestros.Source = Siniestros.Source + "
    and Siniestro.Fase="&request.form("Fase")
if (request.Form("accidentescorporales")="checkbox") then Siniestros.Source = Siniestros.Source + "
    and (Siniestro.AccidentesCorporales=True)"
Siniestros.Source = Siniestros.Source + "  ORDER BY "&request.form("orden")
     *
     * */
    public function trafico(Request $request)
    {

        //dd($request);

        $prueba = $request->get('abogado');
        $prueba2 = $request->merge([
            'abogado' => implode(',', (array)$request->get('abogado'))]);
        $request->merge([
            'abogado' => implode(',', (array)$request->get('abogado'))]);

        //dd($request->get('abogado'));
        //$tramitador=$request->get('tramitador1').','.$request->get('tramitador2').','.$request->get('tramitador3').','.$request->get('tramitador4').','.$request->get('tramitador5');
        $error = ['No se ha encontrado resultados'];
        if ($request) {

            $resultado1 = File::where('sort_id', 1)->wherebetween('fecha_accidente', [
                $request->get('fromdateaccidente'),
                $request->get('todateaccidente'),
            ])
                ->wherebetween('fechaapertura', [$request->get('fromdateapertura'), $request->get('todateapertura')])
                ->when($request->cierre, function ($query) use ($request) {
                    return $query->wherebetween('fechacierre', [
                        $request->get('fromdatecierre'),
                        $request->get('todatecierre')
                    ]);
                })
                ->when($request->alta, function ($query) use ($request) {
                    return $query->wherebetween('fecha_alta_laboral', [
                        $request->get('fromdatealta'),
                        $request->get('todatealta')
                    ]);
                })
                ->when($request->cobro, function ($query) use ($request) {
                    return $query->wherebetween('fechacobroempresa', [
                        $request->get('fromdatecobro'),
                        $request->get('todatecobro')
                    ]);
                })
                ->when($request->archivo, function ($query) use ($request) {
                    return $query->wherebetween('fechaarchivo', [
                        $request->get('fromdatearchivo'),
                        $request->get('todatearchivo')
                    ]);
                })
                ->when($request->aj >= 0, function ($query) use ($request) {
                    return $query->where('firma_carta_abogado',
                        $request->get('aj'));
                })
                ->when($request->lugar, function ($query) use ($request) {
                    return $query->where('lugar',
                        $request->get('lugar'));
                })
                ->where('solicitor_id', $request->get('abogado'))
                ->where('insurer_id', $request->get('aseguradora'))
                ->get()/*
                ->wherebetween('fecha_alta_laboral',
                    [$request->get('fromdatealta'), $request->get('todatealta')])->wherebetween('fechacobroempresa',
                    [$request->get('fromdatecobro'), $request->get('todatecobro')])->wherebetween('fechaarchivo',
                    [$request->get('fromdatearchivo'), $request->get('todatearchivo')])->where('firma_carta_abogado',
                    $request->get('aj'))
                ->where('lugar', $request->get('lugar'))
                ->where('insurer_id',
                    $request->get('aseguradora'))
                ->wherein('solicitor_id',
                    $request->get('tramitador'))
                ->wherein('phase_id', $request->get('fases'))->get()*/
            ;
        }
        /*if ($request->has('cierre')) {
            $resultado1=$resultado1->wherebetween('fechacierre', [
                $request->get('fromdatecierre'),
                $request->get('todatecierre'),
            ]);

        }*/

        dd($resultado1);

        //$resultados = File::search($request->get('query'));

        return $resultados->count() ? $resultados : $error;
    }

    public function prueba()
    {
        return view('clientes2.buscador.listadosiniestros');
    }
}
