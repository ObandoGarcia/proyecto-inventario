@extends('dashboard')

@section('contenido-dinamico')
    <div class="content-wrapper">
        <div class="container">
            <h2 class="display-5 fw-bold text-body-emphasis">Marcas activas</h2>
            <div class="pt-3 px-4">
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateBrand"><i class="menu-icon tf-icons bx bx-plus-circle"></i> Agregar una nueva marca</button>
               <a href="inactive_brands"><button type="button" class="btn btn-primary">Ver marcas inactivas</button></a>
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
                    @foreach ($brands as $brandItem )
                        <tr>
                            <td>{{ $brandItem->name }}</td>
                            <td>
                                @if ($brandItem->state_name == 'Activo')
                                    <span class="badge text-bg-success">{{ $brandItem->state_name }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateBrand{{ $brandItem->id }}"><i class="menu-icon tf-icons bx bx-edit"></i> Editar</button>
                                <form action="{{ route('change_state', $brandItem->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"><i class="menu-icon tf-icons bx bx-checkbox-minus"></i> Desactivar</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit modal form -->
                        <div class="modal fade" id="modalUpdateBrand{{ $brandItem->id }}" tabindex="-1" aria-labelledby="modalupdatebrand" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar marca</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update_brands', $brandItem->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id_update">

                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" value="{{ $brandItem->name }}" name="brand_name_update" required>

                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
    <div class="modal fade" id="modalCreateBrand" tabindex="-1" aria-labelledby="modalcreatebrand" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar una nueva marca</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create_brands')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="brand_name" required>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar marca</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
@endsection
