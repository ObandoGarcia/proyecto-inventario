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
                                @elseif ($projectsItem->state_name == 'Completado')
                                    <span class="badge text-bg-primary">{{ $projectsItem->state_name }}</span>
                                @elseif ($projectsItem->state_name == 'Cancelado')
                                    <span class="badge text-bg-danger">{{ $projectsItem->state_name }}</span>
                                @elseif ($projectsItem->state_name == 'En pausa')
                                    <span class="badge text-bg-info">{{ $projectsItem->state_name }}</span>
                                @else
                                    <span>{{ $projectsItem->state_name }}</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalEditProject{{ $projectsItem->id }}"><i
                                        class="menu-icon tf-icons bx bx-edit"></i> Editar</button>

                                <form action="{{ route('change_state_projects_to_completed', $projectsItem->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary"><i
                                            class="menu-icon tf-icons bx bx-check-square"></i> Marcar completado</button>
                                </form>

                                <form action="{{ route('change_state_projects_to_cancel', $projectsItem->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger"><i
                                            class="menu-icon tf-icons bx bx-checkbox-minus"></i> Cancelado</button>
                                </form>

                                <form action="{{ route('change_state_projects_to_pause', $projectsItem->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info"><i
                                            class="menu-icon tf-icons bx bx-pause"></i> En pausa</button>
                                </form>
                            </td>
                        </tr>

                        <!--Edit modal form-->
                        <div class="modal fade" id="modalEditProject{{ $projectsItem->id }}" tabindex="-1"
                            aria-labelledby="modaleditproject" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Eidtar proyecto existente</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('update_project', $projectsItem->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <label for="nombre">Nombre del projecto</label>
                                            <input type="text" value="{{ $projectsItem->name }}" class="form-control"
                                                name="project_name_update" required>

                                            <label for="ubicacion">Ubicacion</label>
                                            <input type="text" value="{{ $projectsItem->location }}"
                                                class="form-control" name="project_location_update" required>

                                            <label for="encargado">Encargado</label>
                                            <input type="text" value="{{ $projectsItem->manager }}" class="form-control"
                                                name="project_manager_update" required>

                                            <label for="fecha_inicio">Fecha de inicio</label>
                                            <input type="datetime-local" value="{{ $projectsItem->start_date }}"
                                                class="form-control" name="project_start_date_update" required>

                                            <label for="fecha_fin">Fecha de finalizacion(estimada)</label>
                                            <input type="datetime-local" value="{{ $projectsItem->end_date }}"
                                                class="form-control" name="project_end_date_update" required>

                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">

                                            <br>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar proyecto</button>
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
    <div class="modal fade" id="modalCreateProject" tabindex="-1" aria-labelledby="modalcreateproject" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar un nuevo projecto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('create_project') }}" method="POST">
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
                        <select class="form-select" name="project_state_select" required>
                            <option value="">Seleccione un estado</option>
                            <option value="1">Activo</option>
                            <option value="4">Completado</option>
                            <option value="5">Cancelado</option>
                            <option value="6">En pausa</option>
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
