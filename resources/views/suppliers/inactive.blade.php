@extends('dashboard')

@section('contenido-dinamico')
    <div class="content-wrapper">
        <div class="container">
            <h2 class="display-5 fw-bold text-body-emphasis">Proveedores inactivos</h2>
            <div class="pt-3 px-4">
               <a href="suppliers"><button type="button" class="btn btn-primary">Regresar a provedores activos</button></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $suppliersItem )
                        <tr>
                            <td>{{ $suppliersItem->name }}</td>
                            <td>
                                @if ($suppliersItem->state_name == 'Inactivo')
                                    <span class="badge text-bg-danger">{{ $suppliersItem->state_name }}</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('change_state_to_active_suppliers', $suppliersItem->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success"><i class="menu-icon tf-icons bx bx-check-square"></i> Activar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
