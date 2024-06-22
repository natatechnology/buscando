<?php

namespace App\Http\Controllers;

use App\Models\Desaparecidos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesaparecidosController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }

    
    public function index() {
        $title = 'Listado de desaparecidos';
        if (auth()->user()->rol == 1) {
            $data = DB::select('SELECT * FROM desaparecidos WHERE soft_delete IS NULL ORDER BY id DESC');
        } else {
            $data = DB::select('SELECT * FROM desaparecidos WHERE publicado_por = ? AND soft_delete IS NULL ORDER BY id DESC', [auth()->user()->id]);
        }
        return view('admin.desaparecidos.index', compact('title', 'data'));
    }

    
    public function create() {
        $title = 'Añadir nueva persona desaparecida';
        $discapacidades = DB::select('SELECT id, nombre FROM discapacidades ORDER BY nombre ASC');
        return view('admin.desaparecidos.create', compact('title', 'discapacidades'));
    }

    
    public function store(Request $request) {
        // Validar el formulario
        $validatedData = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nombre' => 'required|string|max:255',
            'fec_nacimiento' => 'required|date',
            'sexo' => 'required|string|in:M,H',
            'direccion' => 'required|string|max:255',
            'ult_avistamiento' => 'required|date',
            'nombre_contacto' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|max:20',
        ]);

        // Manejar la carga de la imagen
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public/fotos'); // Almacena la imagen en el directorio 'public/fotos'
            $foto = str_replace('public/', 'storage/', $path); // Ajusta la ruta para acceso público
        }


        $new                        = new Desaparecidos();
        $new->publicado_por         = auth()->user()->id;
        $new->foto                  = $foto; // Guarda la ruta de la imagen
        $new->nombre                = $request->nombre;
        $new->fecha_nacimiento      = $request->fec_nacimiento;
        $new->sexo                  = $request->sexo;
        $new->direccion_residencia  = $request->direccion;
        $new->discapacidad          = json_encode($request->discapacidad);
        $new->ultimo_avistamiento   = $request->ult_avistamiento;
        $new->nombre_contacto       = $request->nombre_contacto;
        $new->telefono_contacto     = $request->telefono_contacto;
        if (isset($request->num_whatsapp_contacto) && $request->num_whatsapp_contacto != '') {
            $new->whatsapp_contacto = $request->num_whatsapp_contacto;
        }
        $new->ult_actualizacion_id  = auth()->user()->id;
        $new->save();
        
        return redirect()->route('admin.desaparecidos.index');
    }

    
    public function show($id) {
        if (auth()->user()->rol == 1) {
            $data = DB::select('SELECT * FROM desaparecidos WHERE id = ? AND soft_delete IS NULL ORDER BY id DESC', [$id]);
        } else {            
            $data = DB::select('SELECT * FROM desaparecidos WHERE id = ? AND publicado_por = ? AND soft_delete IS NULL ORDER BY id DESC', [$id, auth()->user()->id]);
        }
        if (is_array($data) && count($data) > 0) {
            $title = 'Desaparecido Detalles: '.$data[0]->nombre;
            $discapacidades = DB::select('SELECT id, nombre FROM discapacidades ORDER BY nombre ASC');
            return view('admin.desaparecidos.show', compact('title', 'data', 'discapacidades'));
        } else {
            return redirect()->back();
        }
    }

    
    public function edit($id) {
        if (auth()->user()->rol == 1) {
            # code...
            $data = DB::select('SELECT * FROM desaparecidos WHERE id = ? AND soft_delete IS NULL ORDER BY id DESC', [$id]);
        } else {            
            $data = DB::select('SELECT * FROM desaparecidos WHERE id = ? AND publicado_por = ? AND soft_delete IS NULL ORDER BY id DESC', [$id, auth()->user()->id]);
        }
        if (is_array($data) && count($data) > 0) {
            $title = 'Formulario de edición: '.$data[0]->nombre;
            $discapacidades = DB::select('SELECT id, nombre FROM discapacidades ORDER BY nombre ASC');
            return view('admin.desaparecidos.edit', compact('title', 'data', 'discapacidades'));
        } else {
            return redirect()->back();
        }
    }

    
    public function update(Request $request, $id) {
        // Validar el formulario
        if ($request->hasFile('foto')) {
            $validatedData = $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nombre' => 'required|string|max:255',
                'fec_nacimiento' => 'required|date',
                'sexo' => 'required|string|in:M,H',
                'direccion' => 'required|string|max:255',
                'ult_avistamiento' => 'required|date',
                'nombre_contacto' => 'required|string|max:255',
                'telefono_contacto' => 'required|string|max:20',
            ]);

            $file = $request->file('foto');
            $path = $file->store('public/fotos'); // Almacena la imagen en el directorio 'public/fotos'
            $foto = str_replace('public/', 'storage/', $path); // Ajusta la ruta para acceso público
        } else {
            $validatedData = $request->validate([
                'nombre' => 'required|string|max:255',
                'fec_nacimiento' => 'required|date',
                'sexo' => 'required|string|in:M,H',
                'direccion' => 'required|string|max:255',
                'ult_avistamiento' => 'required|date',
                'nombre_contacto' => 'required|string|max:255',
                'telefono_contacto' => 'required|string|max:20',
            ]);
        }

        $update                        = Desaparecidos::findOrFail($id);
        $update->publicado_por         = auth()->user()->id;
        // Manejar la carga de la imagen
        if (isset($foto) && $foto != '') {            
            $update->foto                  = $foto; // Guarda la ruta de la imagen
        }
        $update->nombre                = $request->nombre;
        $update->fecha_nacimiento      = $request->fec_nacimiento;
        $update->sexo                  = $request->sexo;
        $update->direccion_residencia  = $request->direccion;
        $update->discapacidad          = json_encode($request->discapacidad);
        $update->ultimo_avistamiento   = $request->ult_avistamiento;
        $update->nombre_contacto       = $request->nombre_contacto;
        $update->telefono_contacto     = $request->telefono_contacto;
        if (isset($request->num_whatsapp_contacto) && $request->num_whatsapp_contacto != '') {
            $update->whatsapp_contacto = $request->num_whatsapp_contacto;
        }
        $update->ult_actualizacion_id  = auth()->user()->id;
        $update->save();
        
        return redirect()->route('admin.desaparecidos.index');
    }

    
    public function destroy($id) {
        if (auth()->user()->rol == 1) {
            $update                        = Desaparecidos::findOrFail($id);
            $update->ult_actualizacion_id  = auth()->user()->id;
            $update->soft_delete           = Carbon::now();
            $update->save();
        } else {            
            $data = DB::select('SELECT * FROM desaparecidos WHERE id = ? AND publicado_por = ? AND soft_delete IS NULL ORDER BY id DESC', [$id, auth()->user()->id]);
            if (is_array($data) && count($data) > 0) {
                $update                        = Desaparecidos::findOrFail($id);
                $update->ult_actualizacion_id  = auth()->user()->id;
                $update->soft_delete           = Carbon::now();
                $update->save();
            } else {
                return redirect()->back();
            }
        }
        
        return redirect()->route('admin.desaparecidos.index');
    }

}
