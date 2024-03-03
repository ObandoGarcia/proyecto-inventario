@extends('dashboard')

@section('contenido-dinamico')
    <div class="content-wrapper">
        <div class="container">
            <h2 class="display-5 fw-bold text-body-emphasis">Proveedores activos</h2>
            <div class="pt-3 px-4">
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateSupplier"><i class="menu-icon tf-icons bx bx-plus-circle"></i> Agregar nuevo proveedor</button>
               <a href="inactive_suppliers"><button type="button" class="btn btn-primary">Ver proveedores inactivos</button></a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplierItem )
                        <tr>
                            <td>{{ $supplierItem->name}}</td>
                            <td>{{ $supplierItem->phone}}</td>
                            <td>{{ $supplierItem->email}}</td>
                            <td>
                                @if ($supplierItem->state_name == 'Activo')
                                    <span class="badge text-bg-success">{{ $supplierItem->state_name }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateSupplier{{ $supplierItem->id }}"><i class="menu-icon tf-icons bx bx-edit"></i> Editar</button>
                                <form action="{{ route('change_state_suppliers', $supplierItem->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"><i class="menu-icon tf-icons bx bx-checkbox-minus"></i> Desactivar</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit modal form -->
                        <div class="modal fade" id="modalUpdateSupplier{{ $supplierItem->id }}" tabindex="-1" aria-labelledby="modalupdatesupplier" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar proveedor</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update_suppliers', $supplierItem->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id_update">

                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" value="{{ $supplierItem->name }}" name="supplier_name_update" required>

                                        <label for="telefono">Telefono</label>
                                        <input type="number" class="form-control" value="{{ $supplierItem->phone }}" name="supplier_phone_update" required min="0">

                                        <label for="email">Correo electronico</label>
                                        <input type="email" class="form-control" value="{{ $supplierItem->email }}" name="supplier_email_update" required>

                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar proveedor</button>
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
    <div class="modal fade" id="modalCreateSupplier" tabindex="-1" aria-labelledby="modalcreatesupplier" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar un nuevo proveedor</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create_suppliers') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="supplier_name" required>

                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" name="supplier_phone" required>

                    <label for="email">Correo electronico</label>
                    <input type="email" class="form-control" name="supplier_email" required>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar proveedor</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
