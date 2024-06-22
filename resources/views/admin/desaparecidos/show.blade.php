@extends('layouts.admin.app')

@section('content')


<div class="sales-boxes">    
    <div class="recent-sales box">
        <div class="title">{{$title}}</div>
            <h5 class="mb-3 text-primary pt-2">Datos de la persona desaparecida</h5>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <img src="{{ asset($data[0]->foto) }}" alt="{{$data[0]->nombre}}" width="100px">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" value="{{$data[0]->nombre}}"  @disabled(true)>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fec_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" value="{{$data[0]->fecha_nacimiento}}"  @disabled(true)>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="sexo">Sexo</label>
                    <select class="custom-select d-block w-100" @disabled(true)>
                        <option value="M" @if ($data[0]->sexo == 'M') @selected(true) @endif>Mujer</option>
                        <option value="H" @if ($data[0]->sexo == 'H') @selected(true) @endif>Hombre</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="direccion">Dirección de residencia</label>
                    <input type="text" class="form-control" value="{{$data[0]->direccion_residencia}}" @disabled(true)>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="ult_avistamiento">Último avistamiento</label>
                    <input type="date" class="form-control" value="{{$data[0]->ultimo_avistamiento}}" @disabled(true)>
                </div>
            </div>

            <hr class="mb-4">
            <h5 class="mb-3 text-primary">Discapacidades</h5>
            <div class="row">
                @foreach ($discapacidades as $disc)
                    <label>
                        <input type="checkbox" name="discapacidad[]" value="{{$disc->id}}" @if (in_array($disc->id, json_decode($data[0]->discapacidad))) @checked(true) @endif @disabled(true)> {{$disc->nombre}}
                    </label><br> 
                @endforeach
            </div>

            <hr class="mb-4">
            <h5 class="mb-3 text-primary">Datos del contacto</h5>
            <p>Esta información debe ser de la persona que recibira la llamada sobre el desaparecido.</p>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombre_contacto">Nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{$data[0]->nombre_contacto}}" @disabled(true)>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="telefono_contacto">Número de teléfono</label>
                    <div class="input-group">
                        <input type="tel" class="form-control" value="{{$data[0]->telefono_contacto}}" @disabled(true)>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="num_whatsapp_contacto">WhatsApp</label>
                    <div class="input-group">
                        <input type="tel" class="form-control" value="{{$data[0]->whatsapp_contacto}}" @disabled(true)>
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="window.location.href='{{ route('admin.desaparecidos.index') }}'">Volver atras</button>
            <button class="btn btn-primary btn-sm btn-block" type="button" onclick="window.location.href='{{ route('admin.desaparecidos.edit', $data[0]->id) }}'">Actualizar</button>
        </div>
    </div>
</div>

@endsection