<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\models\customer;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $error = ['No se ha encontrado resultados'];
        if ($request->has('query')) {
            $resultados = customer::search($request->get('query'));

            return $resultados->count() ? $resultados : error;
        }

        return $error;
    }
}
