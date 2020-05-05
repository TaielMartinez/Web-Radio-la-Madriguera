@extends ('layouts.admin')
@section ('contenido')
    
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <h3>Listado de programas <a href="programas/programa"><button>ver</button></a></h3>
        </div>
    </div>
    
    <div class="table-responsive">
        <table>
            <thead>
                <th>id</th>
                <th>nombre</th>
                <th>descripcion</th>
            </thead>
            @foreach ($programas as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->nombre }}</td>
                <td>{{ $row->descripcion }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    {{$programas->render()}}

@endsection