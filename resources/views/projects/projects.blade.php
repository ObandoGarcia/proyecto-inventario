@extends('dashboard')

@section('contenido-dinamico')
    <div class="content-wrapper">
        <div class="container">
            <h2 class="display-5 fw-bold text-body-emphasis">Proyectos</h2>
            <div class="pt-3 px-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreateProject"><i
                        class="menu-icon tf-icons bx bx-plus-circle"></i> Agregar nuevo proyecto</button>
            </div>
        </div>
        <div class="table table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre del projecto</th>
                        <th>Ubicacion</th>
                        <th>Encargado</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de finalizacion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $projectsItem)
                        <tr>
                            <td>{{ $projectsItem->name }}</td>
                            <td>{{ $projectsItem->location }}</td>
                            <td>{{ $projectsItem->manager }}</td>
                            <td>{{ $projectsItem->start_date }}</td>
                            <td>{{ $projectsItem->end_date }}</td>
                            <td>
                                @if ($projectsItem->state_name == 'Activo')
                                    <span class="badge text-bg-success">{{ $projectsItem->state_name }}</span>
                                @elseif ($projectsItem->state_name == 'Inactivo')
                                    <span class="badge text-bg-danger">{{ $projectsItem->state_name }}</span>
                                @elseif ($mprojectstem->state_name == 'En mantenimiento')
                                    <span class="badge text-bg-warning">{{ $projectsItem->state_name }}</span>
                                @else
                                    <span>{{ $projectsItem->state_name }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalEditProject{{ $projectsItem->name }}"><i
                                        class="menu-icon tf-icons bx bx-edit"></i> Editar</button>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalEditProjectState{{ $projectsItem->name }}"><i
                                        class="menu-icon tf-icons bx bx-stats"></i> Estado</button>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add modal form -->
    <div class="modal fade" id="modalCreateProject" tabindex="-1" aria-labelledby="modalcreatebrand"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar una nueva maquinaria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        @csrf
                        <label for="nombre">Nombre del projecto</label>
                        <input type="text" class="form-control" name="project_name" required>

                        <label for="ubicacion">Ubicacion</label>
                        <input type="text" class="form-control" name="project_location" required>

                        <label for="encargado">Encargado</label>
                        <input type="text" class="form-control" name="project_manager" required>

                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input type="datetime-local" class="form-control" name="project_start_date" required>

                        <label for="fecha_fin">Fecha de finalizacion(estimada)</label>
                        <input type="datetime-local" class="form-control" name="project_end_date" required>

                        <label for="estado">Estado</label>
                        <select class="form-select" name="project_state" required>
                            <option value="" selected>Seleccione un estado</option>
                            @foreach ($states as $stateSelectItem)
                                <option value="{{ $stateSelectItem->id }}">{{ $stateSelectItem->name }}</option>
                            @endforeach
                        </select>

                        <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar projecto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
