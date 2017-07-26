<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\customer;
use App\models\File;
use App\models\Opponent;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function cliente(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = customer::search($request->get('query'))->paginate(25);

            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }

    public function expediente(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = customer::search($request->get('query'))->paginate(25);

            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }

    public function oponente(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = customer::search($request->get('query'))->paginate(25);
            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }
}
