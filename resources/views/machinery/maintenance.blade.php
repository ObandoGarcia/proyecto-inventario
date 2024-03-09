@extends('dashboard')

@section('contenido-dinamico')
    <div class="content-wrapper">
        <div class="container">
            <h2 class="display-5 fw-bold text-body-emphasis">Maquinaria en mantenimiento</h2>
            <div class="pt-3 px-4">
                <a href="machineries"><button type="button" class="btn btn-primary">Ver maquinaria activa</button></a>
                <a href="inactive_machineries"><button type="button" class="btn btn-primary">Ver maquinaria inactiva</button></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Modelo</th>
                        <th>Serie</th>
                        <th>Descripcion</th>
                        <th>¿Esta dispoible?</th>
                        <th>Fecha de ingreso</th>
                        <th>Estado</th>
                        <th>Marca</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($machineries as $machineryItem)
                        <tr>
                            <td>{{ $machineryItem->name }}</td>
                            <td>{{ $machineryItem->model }}</td>
                            <td>{{ $machineryItem->series }}</td>
                            <td>{{ $machineryItem->description }}</td>
                            <td>
                                @if ($machineryItem->available == false)
                                    <i class="menu-icon tf-icons bx bx-x bx-lg bx-tada-hover"></i>
                                @endif
                            </td>
                            <td>{{ $machineryItem->admission_date }}</td>
                            <td>
                                @if ($machineryItem->state_name == 'En mantenimiento')
                                    <span class="badge text-bg-warning">{{ $machineryItem->state_name }}</span>
                                @endif
                            </td>
                            <td>{{ $machineryItem->brand_name }}</td>
                            <td>{{ $machineryItem->suppliers_name }}</td>
                            <td>
                                <form action="{{ route('change_state_to_active', $machineryItem->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success"><i
                                            class="menu-icon tf-icons bx bx-check-square"></i> Activar</button>
                                </form>

                                <form action="{{ route('change_state_machinery_to_inactive', $machineryItem->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="menu-icon tf-icons bx bx-checkbox-minus"></i> Desactivar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
