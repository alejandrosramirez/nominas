@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Datos del empleado

                    <button type="button" class="btn btn-primary float-right" onclick="window.location.href = '{{ route('employee.all') }}';">
                        Regresar
                    </button>
                </div>

                <div class="card-body text-center">
                    @if (is_null($employee))
                        <h4>El empleado no existe.</h4>
                    @else
                        <h3><strong>Código de empleado:</strong></h3>
                        <h5><p>{{ $employee->code }}</p></h5>

                        <h3><strong>Nombre del empleado:</strong></h3>
                        <h5><p>{{ $employee->name . ' ' . $employee->paternal_surname . ' ' . $employee->maternal_surname }}</p></h5>

                        <h3><strong>Correo del empleado:</strong></h3>
                        <h5><p>{{ $employee->email }}</p></h5>

                        <h3><strong>Tipo de contrato:</strong></h3>
                        <h5><p>{{ $employee->contract_type }}</p></h5>

                        <h3><strong>Estado actual:</strong></h3>
                        <h5><p>{{ $employee->state }}</p></h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
