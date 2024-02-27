@extends('dashboard')

@section('contenido-dinamico')
    <div class="content-wrapper">
        <div class="container">
            <h2 class="display-5 fw-bold text-body-emphasis">Estados</h2>
            <div class="pt-3 px-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateState"><i class="menu-icon tf-icons bx bx-plus-circle"></i> Agregar nuevo registro</button>
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
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUpdateState{{ $stateItem->id }}"><i class="menu-icon tf-icons bx bx-edit"></i> Editar</button>
                            </td>
                        </tr>

                        <!-- Edit modal form -->
                        <div class="modal fade" id="modalUpdateState{{ $stateItem->id }}" tabindex="-1" aria-labelledby="modalupdatestate" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar estado</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('update_states', $stateItem->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" value="{{ $stateItem->name }}" name="state_name_update" required>

                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar estado</button>
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
    <div class="modal fade" id="modalCreateState" tabindex="-1" aria-labelledby="modalcreatestate" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar un nuevo estado</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create_states') }}" method="POST">
                    @csrf

                    <label for="nombre">Estado</label>
                    <input type="text" class="form-control" name="state_name" required>

                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar estado</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
@endsection
