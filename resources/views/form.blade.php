@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dar de alta un nuevo empleado</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="code">Código:</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" placeholder="Código" value="{{ old('code') }}"/>
                            @error('code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nombre" value="{{ old('name') }}"/>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="paternal_surname">Apellido paterno:</label>
                            <input type="text" class="form-control @error('paternal_surname') is-invalid @enderror" name="paternal_surname" placeholder="Apellido paterno" value="{{ old('paternal_surname') }}"/>
                            @error('paternal_surname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="maternal_surname">Apellido materno:</label>
                            <input type="text" class="form-control @error('maternal_surname') is-invalid @enderror" name="maternal_surname" placeholder="Apellido materno" value="{{ old('maternal_surname') }}"/>
                            @error('maternal_surname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correo electronico:</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo electronico" value="{{ old('email') }}"/>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contract_type">Tipo de contrato:</label>
                            <input type="text" class="form-control @error('contract_type') is-invalid @enderror" name="contract_type" placeholder="Tipo de contrato" value="{{ old('contract_type') }}"/>
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
