@extends('layouts.themes.app')

@section('content')
{{-- <div class="section"> --}}
<div class="section-header mb-0">
    <h1>Lista de Usuarios</h1>

    {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div> --}}
    <div class="section-header-breadcrumb">
        <a class="btn btn-sm btn-primary mr-5" href="{{ route('users.create') }}"><i class="fa fa-add"></i>Añadir usuario</a>

    </div>
</div>
<div class="section-body">
    {{-- <h2 class="section-title">Table</h2>
            <p class="section-lead">Example of some Bootstrap table components.</p> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                {{-- <div class="card-header"> --}}
                {{-- <h4>Advanced Table</h4> --}}
                {{-- <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                {{-- </div> --}}
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-hover" style="background-color: hsl(227, 34%, 15%);" id="tblExports">
                            <thead style="background-color: hsl(227, 34%, 15%);">
                                <tr>
                                    <th style="color: #fff;">NOMBRE</th>
                                    <th style="color: #fff;">APELLIDO</th>
                                    <th style="color: #fff;">EDAD</th>
                                    <th style="color: #fff;">EMAIL</th>
                                    <th style="color: #fff;">TELEFONO</th>
                                    <th style="color: #fff;">PAIS</th>
                                    <th style="color: #fff;">ACCIONES</th>
                                    {{-- <th></th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $id => $user)
                                <tr>
                                    <td style="color: #fff;">{{ $user['name'] }}</td>
                                    <td style="color: #fff;">{{ $user['lastname'] }}</td>
                                    <td style="color: #fff;">{{ $user['age'] }}</td>
                                    <td style="color: #fff;">{{ $user['email'] }}</td>
                                    <td style="color: #fff;">{{ $user['phone'] }}</td>
                                    <td style="color: #fff;">{{ $user['country'] }}</td>
                                    {{-- <h2>{{ $user['id']}}</h2> --}}

                                    <td>
                                        <form action="{{ route('users.destroy', $user['id']) }}" method="POST">
                                            <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-success btn-sm btn-rounded"><i class="fa fa-pen"></i></a>
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
{{-- </div> --}}
{{-- @section('js')
    <script>
        $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable( {
            responsive: true,
            autoWidth: false,
            "lengthMenu": [[10,50,-1], [10,50, "All"]],
            "language": {
                "url": "assets/datatablesEs/tableEspañol.json"
            }
        } );
    } );
    </script>

    @endsection --}}

{{-- <script>
        $(document).ready(function () {
            $('#tblExports').DataTable({
                responsive: true,
                autoWidth: false,
                "lengthMenu": [[10, 50, -1], [10, 50, "All"]],
                "language": {
                    "url": "assets/datatablesEs/tableEspañol.json"
                }
            });
        });
    </script> --}}
@endsection
