@extends('layouts.admin.app')

@section('content')


<div class="sales-boxes">    
    <div class="recent-sales box">
        <div class="title">{{$title}}</div>
        <p>Los campos que tienen el <span class="text-danger">*</span> son obligatorios de completar.</p>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="needs pt-4" method="POST" action="{{route('admin.desaparecidos.update', $data[0]->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <h5 class="mb-3 text-primary">Datos de la persona desaparecida</h5>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <img src="{{ asset($data[0]->foto) }}" alt="{{$data[0]->nombre}}" width="100px">
                    <label for="foto">Foto <span class="text-danger">*</span></label>
                    <input type="file" name="foto" id="foto" accept="image/*">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nombre">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$data[0]->nombre}}" required="">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fec_nacimiento">Fecha de Nacimiento <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="fec_nacimiento" name="fec_nacimiento" value="{{$data[0]->fecha_nacimiento}}" required="">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="sexo">Sexo <span class="text-danger">*</span></label>
                    <select class="custom-select d-block w-100" id="sexo" name="sexo" value="{{$data[0]->sexo}}" required="">
                        <option value="M" @if ($data[0]->sexo == 'M') @selected(true) @endif>Mujer</option>
                        <option value="H" @if ($data[0]->sexo == 'H') @selected(true) @endif>Hombre</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="direccion">Dirección de residencia <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{$data[0]->direccion_residencia}}" required="">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="ult_avistamiento">Último avistamiento <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="ult_avistamiento" name="ult_avistamiento" value="{{$data[0]->ultimo_avistamiento}}" required="">
                </div>
            </div>

            <hr class="mb-4">
            <h5 class="mb-3 text-primary">Discapacidades</h5>
            <div class="row">
                @foreach ($discapacidades as $disc)
                    <label>
                        <input type="checkbox" name="discapacidad[]" value="{{$disc->id}}" @if (in_array($disc->id, json_decode($data[0]->discapacidad))) @checked(true) @endif> {{$disc->nombre}}
                    </label><br> 
                @endforeach
            </div>

            <hr class="mb-4">
            <h5 class="mb-3 text-primary">Datos del contacto</h5>
            <p>Esta información debe ser de la persona que recibira la llamada sobre el desaparecido.</p>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombre_contacto">Nombre <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="{{$data[0]->nombre_contacto}}" required="">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="telefono_contacto">Número de teléfono <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="tel" class="form-control" id="telefono_contacto" name="telefono_contacto" value="{{$data[0]->telefono_contacto}}" required="">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="num_whatsapp_contacto">WhatsApp</label>
                    <div class="input-group">
                        <input type="tel" class="form-control" id="num_whatsapp_contacto" name="num_whatsapp_contacto" value="{{$data[0]->whatsapp_contacto}}">
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="window.location.href='{{ route('admin.desaparecidos.index') }}'">Volver atras</button>
            <button class="btn btn-primary btn-sm btn-block" type="submit">Guardar Cambios</button>
        </form>
</div>

@endsection