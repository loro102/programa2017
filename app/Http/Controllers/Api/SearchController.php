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
            $resultados = customer::search($request->get('query'))->paginate(1);
            $resultado2 = File::search($request->get('query'))->paginate(25);
            $resultado3 = Opponent::search($request->get('query'))->paginate(25);
            if ($resultados->count()) {
                return $resultados->count() ? $resultados : $error;//,$resultado2->count() ? $resultado2 : $error];
            }
            if ($resultado2->count()) {
                return $resultado2->count() ? $resultado2 : $error;//,$resultado2->count() ? $resultado2 : $error];
            }

            return $resultado3->count() ? $resultado3 : $error;

        }

        return $error;
    }

    public function expediente(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = File::search($request->get('query'))->paginate(25);

            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }

    public function oponente(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = Opponent::search($request->get('query'))->paginate(25);
            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }
}
