@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary float-right" onclick="window.location.href = '{{ route('employee.form') }}';">
                        Nuevo empleado
                    </button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-stripped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Código</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="text-center">{{ $employee->code }}</td>
                                    <td class="text-center">{{ $employee->name . ' ' . $employee->paternal_surname . ' ' . $employee->maternal_surname }}</td>
                                    <td class="text-center">{{ $employee->state }}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success" onclick="window.location.href = '{{ route('employee.detail', $employee->id) }}';">
                                            Detalle
                                        </button>
                                        <button type="button" class="btn btn-warning" onclick="window.location.href = '{{ route('employee.editform', $employee->id) }}';">
                                            Editar
                                        </button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.href = '{{ route('employee.changestate', $employee->id) }}';">
                                            @if ($employee->state == 'Activo')
                                                Desactivar
                                            @else
                                                Activar
                                            @endif
                                        </button>
                                        <button type="button" class="btn btn-danger" onclick="window.location.href = '{{ route('employee.delete', $employee->id) }}';">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
