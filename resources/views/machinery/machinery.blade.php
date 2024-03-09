@extends('dashboard')

@section('contenido-dinamico')
    <div class="content-wrapper">
        <div class="container">
            <h2 class="display-5 fw-bold text-body-emphasis">Maquinaria activa</h2>
            <div class="pt-3 px-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateMachinery"><i
                        class="menu-icon tf-icons bx bx-plus-circle"></i> Agregar nueva maquinaria</button>
                <a href="inactive_machineries"><button type="button" class="btn btn-primary">Ver maquinaria inactiva</button></a>
                <a href="maintenance_machineries"><button type="button" class="btn btn-primary">Ver maquinaria en
                        mantenimiento</button></a>
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
                                @if ($machineryItem->available == true)
                                    <i class="menu-icon tf-icons bx bx-check bx-lg bx-tada-hover"></i>
                                @endif
                            </td>
                            <td>{{ $machineryItem->admission_date }}</td>
                            <td>
                                @if ($machineryItem->state_name == 'Activo')
                                    <span class="badge text-bg-success">{{ $machineryItem->state_name }}</span>
                                @elseif ($machineryItem->state_name == 'Inactivo')
                                    <span class="badge text-bg-danger">{{ $machineryItem->state_name }}</span>
                                @elseif ($machineryItem->state_name == 'En mantenimiento')
                                    <span class="badge text-bg-warning">{{ $machineryItem->state_name }}</span>
                                @endif
                            </td>
                            <td>{{ $machineryItem->brand_name }}</td>
                            <td>{{ $machineryItem->suppliers_name }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalEditMachinery{{ $machineryItem->id }}"><i
                                        class="menu-icon tf-icons bx bx-edit"></i> Editar</button>

                                <form action="{{ route('change_state_machinery_to_inactive', $machineryItem->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="menu-icon tf-icons bx bx-checkbox-minus"></i> Desactivar</button>
                                </form>

                                <form action="{{ route('change_state_machinery_to_maintenance', $machineryItem->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info"><i
                                            class="menu-icon tf-icons bx bx-package"></i> Mantenimiento</button>
                                </form>
                            </td>
                        </tr>

                        <!--Edit modal form-->
                        <div class="modal fade" id="modalEditMachinery{{ $machineryItem->id }}" tabindex="-1"
                            aria-labelledby="modaleditmachinery" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar registro de maquinaria
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('update_machineries', $machineryItem->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <label for="nombre">Nombre</label>
                                            <input type="text" value="{{ $machineryItem->name }}" class="form-control"
                                                name="machinery_name_update" required>

                                            <label for="modelo">Modelo</label>
                                            <input type="text" value="{{ $machineryItem->model }}" class="form-control"
                                                name="machinery_model_update" required>

                                            <label for="serie">Serie</label>
                                            <input type="text" value="{{ $machineryItem->series }}" class="form-control"
                                                name="machinery_serie_update" required>

                                            <label for="descripcion">Descripcion</label>
                                            <input type="text" value="{{ $machineryItem->description }}"
                                                class="form-control" name="machinery_description_update" required>

                                            <label for="fechadeingreso">Fecha de ingreso</label>
                                            <input type="datetime-local" value="{{ $machineryItem->admission_date }}"
                                                class="form-control" name="machinery_date_update" required>

                                            <label for="marca">Marca</label>
                                            <select class="form-select" name="machinery_brand_update">
                                                <option value="{{ $machineryItem->brand_id }}" selected>
                                                    {{ $machineryItem->brand_name }}</option>
                                                @foreach ($brands as $brandItem)
                                                    <option value="{{ $brandItem->id }}">{{ $brandItem->name }}</option>
                                                @endforeach
                                            </select>

                                            <label for="proveedor">Proveedor</label>
                                            <select class="form-select" name="machinery_supplier_update">
                                                <option value="{{ $machineryItem->supplier_id }}" selected>
                                                    {{ $machineryItem->suppliers_name }}</option>
                                                @foreach ($suppliers as $supplierItem)
                                                    <option value="{{ $supplierItem->id }}">{{ $supplierItem->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id_update">

                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar marca</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add modal form -->
    <div class="modal fade" id="modalCreateMachinery" tabindex="-1" aria-labelledby="modalcreatebrand"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar una nueva maquinaria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create_machineries') }}" method="POST">
                        @csrf
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="machinery_name" required>

                        <label for="modelo">Modelo</label>
                        <input type="text" class="form-control" name="machinery_model" required>

                        <label for="serie">Serie</label>
                        <input type="text" class="form-control" name="machinery_serie" required>

                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" name="machinery_description" required>

                        <label for="fechadeingreso">Fecha de ingreso</label>
                        <input type="datetime-local" class="form-control" name="machinery_date" required>

                        <label for="marca">Marca</label>
                        <select class="form-select" name="machinery_brand" required>
                            <option value="" selected>Seleccione una marca</option>
                            @foreach ($brands as $brandItem)
                                <option value="{{ $brandItem->id }}">{{ $brandItem->name }}</option>
                            @endforeach
                        </select>

                        <label for="proveedor">Proveedor</label>
                        <select class="form-select" name="machinery_supplier" required>
                            <option value="" selected>Seleccione un proveedor</option>
                            @foreach ($suppliers as $supplierItem)
                                <option value="{{ $supplierItem->id }}">{{ $supplierItem->name }}</option>
                            @endforeach
                        </select>

                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar maquinaria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
