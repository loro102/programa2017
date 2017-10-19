<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\customer;
use App\models\File;
use App\models\Opponent;

Class Buscador Extends Controller
{
    public function cliente(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            if ($request->has('select')) {
                $select = $request->select;
                if ($select == 1) {
                    $resultados = customer::search($request->get('query')));

                    return $resultados->count() ? $resultados : $error;//,$resultado2->count() ? $resultado2 : $error];
                }
                if ($select == 2) {
                    $resultado2 = File::search($request->get('query'));

                    return $resultado2->count() ? $resultado2 : $error;//,$resultado2->count() ? $resultado2 : $error];
                }
                if ($select == 3) {
                    $resultado3 = Opponent::search($request->get('query'));

                    return $resultado3->count() ? $resultado3 : $error;//,$resultado2->count() ? $resultado2 : $error];
                }
            }
        }

        return $error;
    }

    public function expediente(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = File::search($request->get('query'));

            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }

    public function oponente(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = Opponent::search($request->get('query'));

            return $resultados->count() ? $resultados : $error;
        }

        return $error;
    }
}
