@extends('layouts.admin.app')

@section('content')

<div class="sales-boxes">    
    <div class="recent-sales box">
        <div class="title">{{$title}}</div>
        <div class="button">
            <a href="{{route('admin.desaparecidos.create')}}">Añadir nueva persona</a>
        </div>
        <div class="sales-details">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Fecha Nac.</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Ult. Avistamiento</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data AS $val)
                    <tr>
                        <th scope="row">{{$val->id}}</th>
                        <td><img src="{{ asset($val->foto) }}" alt="Foto de {{ $val->nombre }}" style="width: 70px; height: 70px;"></td>
                        <td>{{$val->nombre}}</td>
                        <td>{{$val->sexo}}</td>
                        <td>{{ Carbon\Carbon::parse($val->fecha_nacimiento)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($val->fecha_nacimiento)->age }}</td>
                        <td>{{ Carbon\Carbon::parse($val->ultimo_avistamiento)->format('d M Y') }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('admin.desaparecidos.show', $val->id) }}'">Ver</button>
                                <button type="button" class="btn btn-secondary" onclick="window.location.href='{{ route('admin.desaparecidos.edit', $val->id) }}'">Editar</button>
                                <button type="button" class="btn btn-secondary" onclick="confirmDelete('{{ route('admin.desaparecidos.delete', $val->id) }}')">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    function confirmDelete(url) {
        if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
            window.location.href = url;
        }
    }
</script>

@endsection