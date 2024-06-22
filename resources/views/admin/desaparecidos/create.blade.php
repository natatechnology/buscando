@extends('layouts.admin.app')

@section('content')


<div class="sales-boxes">    
    <div class="recent-sales box">
        <div class="title">{{$title}}</div>


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="needs pt-4" method="POST" action="{{route('admin.desaparecidos.store')}}" enctype="multipart/form-data">
            @csrf

            <h5 class="mb-3 text-primary">Datos de la persona desaparecida</h5>
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" required="" accept="image/*" required="">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required="">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="fec_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fec_nacimiento" name="fec_nacimiento" required="">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="sexo">Sexo</label>
                    <select class="custom-select d-block w-100" id="sexo" name="sexo" required="">
                        <option value="M">Mujer</option>
                        <option value="H">Hombre</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="direccion">Dirección de residencia</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" required="">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="ult_avistamiento">Último avistamiento</label>
                    <input type="date" class="form-control" id="ult_avistamiento" name="ult_avistamiento" required="">
                </div>
            </div>

            <hr class="mb-4">
            <h5 class="mb-3 text-primary">Discapacidades</h5>
            <div class="row">
                @foreach ($discapacidades as $disc)
                <label>
                    <input type="checkbox" name="discapacidad[]" value="{{$disc->id}}"> {{$disc->nombre}}
                </label><br>
                @endforeach
            </div>

            <hr class="mb-4">
            <h5 class="mb-3 text-primary">Datos del contacto</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombre_contacto">Nombre</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" required="">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="telefono_contacto">Número de teléfono</label>
                    <div class="input-group">
                        <input type="tel" class="form-control" id="telefono_contacto" name="telefono_contacto" required="">
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="num_whatsapp_contacto">WhatsApp</label>
                    <div class="input-group">
                        <input type="tel" class="form-control" id="num_whatsapp_contacto" name="num_whatsapp_contacto">
                    </div>
                </div>
            </div>

            <hr class="mb-4">
            <button class="btn btn-secondary btn-sm btn-block" type="button" onclick="window.location.href='{{ route('admin.desaparecidos.index') }}'">Volver atras</button>
            <button class="btn btn-primary btn-sm btn-block" type="submit">Realizar publicación</button>
        </form>
    </div>
</div>

@endsection