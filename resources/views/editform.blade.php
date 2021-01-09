@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar datos del empleado</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="form-group">
                            <label for="code">Código:</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Código" value="{{ $employee->code ? $employee->code : old('code') }}"/>
                            @error('code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{ $employee->name ? $employee->name : old('name') }}"/>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="paternal_surname">Apellido paterno:</label>
                            <input type="text" class="form-control @error('paternal_surname') is-invalid @enderror" name="paternal_surname" placeholder="Apellido paterno" value="{{ $employee->paternal_surname ? $employee->paternal_surname : old('paternal_surname') }}"/>
                            @error('paternal_surname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="maternal_surname">Apellido materno:</label>
                            <input type="text" class="form-control @error('maternal_surname') is-invalid @enderror" name="maternal_surname" placeholder="Apellido materno" value="{{ $employee->maternal_surname ? $employee->maternal_surname : old('maternal_surname') }}"/>
                            @error('maternal_surname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electronico:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo electronico" value="{{ $employee->email ? $employee->email : old('email') }}"/>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contract_type">Tipo de contrato:</label>
                            <input type="text" class="form-control @error('contract_type') is-invalid @enderror" name="contract_type" placeholder="Tipo de contrato" value="{{ $employee->contract_type ? $employee->contract_type : old('contract_type') }}"/>
                            @error('contract_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>

                            <button type="button" class="btn btn-danger" onclick="window.location.href = '{{ route('employee.all') }}';">
                                Regresar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
