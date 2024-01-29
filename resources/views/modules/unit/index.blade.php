@extends('layouts.themes.app')

@section('content')
<div class="section-header mb-0">
    <h1>Lista de Unidades</h1>
    <div class="section-header-breadcrumb">
        <a class="btn btn-sm btn-primary mr-5" href="{{ route('units.create') }}">
            <i class="fa fa-add"></i> Añadir unidad
        </a>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-hover" style="background-color: hsl(227, 34%, 15%);" id="tblExports">
                            <thead style="background-color: hsl(227, 34%, 15%);">
                                <tr>
                                    <th style="color: #fff;">NOMBRE</th>
                                    <th style="color: #fff;">ABREVIATURA</th>
                                    <th style="color: #fff;">EQUIVALENCIA</th>
                                    <th style="color: #fff;">ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($units as $unit)
                                <tr>
                                    <td style="color: #fff;">{{ $unit['name'] }}</td>
                                    <td style="color: #fff;">{{ $unit['abbreviation'] }}</td>
                                    <td style="color: #fff;">{{ $unit['equivalence'] }}</td>
                                    <td>
                                        <form action="{{ route('units.destroy', $unit['id']) }}" method="POST">
                                            <a href="{{ route('units.edit', $unit['id']) }}" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-pen"></i></a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
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
</div>
@endsection
