@extends('dashboard')

@section('contenido-dinamico')
    <div class="content-wrapper">
        <div class="container">
            <h2 class="display-5 fw-bold text-body-emphasis">Estados</h2>
            <div class="pt-3 px-4">
               <button class="btn btn-primary"><i class="menu-icon tf-icons bx bx-plus-circle"></i> Agregar nuevo registro</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($state as $stateItem )
                        <tr>
                            <td>{{ $stateItem->name }}</td>
                            <td>
                                <button class="btn btn-warning"><i class="menu-icon tf-icons bx bx-edit"></i> Editar</button>
                                <button class="btn btn-danger"><i class="menu-icon tf-icons bx bx-trash"></i> Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
