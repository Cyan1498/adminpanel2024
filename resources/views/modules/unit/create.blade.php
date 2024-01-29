@extends('layouts.themes.app')

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if($id)
                <form action="{{ route('units.update', ['unit' => $id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <h2>Editar Unidad</h2>
                @else
                <div class="card-body">
                    <form action="{{ route('units.store') }}" method="POST">
                        @csrf
                        <h4>Crear Unidad</h4>
                @endif
                        <!-- Nombre -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nombre</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $id ? $unit['name'] : '' }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Abreviatura -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Abreviatura</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('abbreviation') is-invalid @enderror" name="abbreviation" value="{{ $id ? $unit['abbreviation'] : '' }}">
                                @error('abbreviation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Equivalencia -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Equivalencia</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control @error('equivalence') is-invalid @enderror" name="equivalence" value="{{ $id ? $unit['equivalence'] : '' }}">
                                @error('equivalence')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Botón de envío -->
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary">{{ $id ? 'Actualizar Unidad' : 'Crear Unidad' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
