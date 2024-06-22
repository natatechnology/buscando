<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller {
    //

    public function index() {
        $title = 'Buscando rastros de vida';
        $data = DB::select('SELECT * FROM desaparecidos WHERE soft_delete IS NULL ORDER BY id DESC');
        $discapacidades = DB::select('SELECT id, nombre FROM discapacidades ORDER BY nombre ASC');
        return view('publico.index', compact('title', 'data', 'discapacidades'));
    }



}
