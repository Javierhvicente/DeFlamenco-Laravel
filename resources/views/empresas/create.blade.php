@extends("main")

@section('content')
    {!! Form::open(['route'=>'empresas.store', 'method'=>'POST', 'files'=>true, 'class'=>'form-horizontal']) !!}
    <div class="container">
        <div class="row">
            <!-- Columna Izquierda -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="text-center">
                    <h6>Sube una foto de perfil</h6>
                    <div class="form-group">
                        {!! Form::file('imagen', ['class'=>'form-control text-center center-block well well-sm', 'accept'=>'image/jpeg']) !!}
                    </div>
                </div>
            </div>
            <!-- Columna Derecha -->
            <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
                {{-- Nombre --}}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre:', ['class'=>'col-lg-3 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('nombre', old('nombre'), ['class'=>'form-control', 'required', 'placeholder'=>'Nombre de la Empresa']) !!}
                    </div>
                </div>
                {{-- CIF --}}
                <div class="form-group">
                    {!! Form::label('cif', 'CIF:', ['class'=>'col-lg-3 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('cif', old('cif'), ['class'=>'form-control', 'required', 'placeholder'=>'CIF de la Empresa']) !!}
                    </div>
                </div>
                {{-- Dirección --}}
                <div class="form-group">
                    {!! Form::label('direccion', 'Dirección:', ['class'=>'col-lg-3 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('direccion', old('direccion'), ['class'=>'form-control', 'required', 'placeholder'=>'Dirección de la Empresa']) !!}
                    </div>
                </div>
                {{-- Teléfono --}}
                <div class="form-group">
                    {!! Form::label('telefono', 'Teléfono:', ['class'=>'col-lg-3 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('telefono', old('telefono'), ['class'=>'form-control', 'required', 'placeholder'=>'Número de Teléfono']) !!}
                    </div>
                </div>
                {{-- Email --}}
                <div class="form-group">
                    {!! Form::label('email', 'Email:', ['class'=>'col-lg-3 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::email('email', old('email'), ['class'=>'form-control', 'required', 'placeholder'=>'Correo Electrónico']) !!}
                    </div>
                </div>
                {{-- Cuenta Bancaria --}}
                <div class="form-group">
                    {!! Form::label('cuentaBancaria', 'Cuenta Bancaria:', ['class'=>'col-lg-3 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::text('cuentaBancaria', old('cuentaBancaria'), ['class'=>'form-control', 'required', 'placeholder'=>'Cuenta Bancaria']) !!}
                    </div>
                </div>
                {{-- Tipo --}}
                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo:', ['class'=>'col-lg-3 control-label']) !!}
                    <div class="col-lg-6">
                        {!! Form::select('tipo', ['juego'=>'Juego', 'consola'=>'Consola'], old('tipo', 'juego'), ['class'=>'form-control']) !!}
                    </div>
                </div>
                {{-- Botones --}}
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        {!! Form::submit('Registrar', ['class'=>'btn btn-success']) !!}
                        <a href="{{ route('empresas.index') }}" class="btn btn-default">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
