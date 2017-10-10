<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    //
    public function importar(request $request, $id)
    {
        Excel::load('./file.xls', function ($reader) {
            $results = $reader->get();
            dd($results);
            // \App\models\customer::insert($results->toArray());
        });
    }
}
