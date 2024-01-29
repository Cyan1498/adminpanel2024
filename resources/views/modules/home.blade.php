@extends('layouts.themes.app')

@section('content')
<div class="section-header mt-5">
    <div class="col-12 col-md-6 col-xl-4 mb-4"> {{-- Cada tarjeta ocupa el ancho completo en dispositivos pequeños, la mitad en medianos y un cuarto en extra grandes --}}
        <div class="card bg-success order-card">
            <div class="card-block">
                <h5 class="ml-2 mt-2">Usuarios</h5>
                <h2 class="text-right"><i class="fa fa-users f-left"></i><span class="ml-2 mr-2">{{$usersCount}}</span></h2>
                <p class="m-b-0 text-right"><a href="/users" class="text-white mr-2">Ver más</a></p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mb-4"> {{-- Cada tarjeta ocupa el ancho completo en dispositivos pequeños, la mitad en medianos y un cuarto en extra grandes --}}
        <div class="card bg-info order-card">
            <div class="card-block">
                <h5 class="ml-2 mt-2">Unidades</h5>
                <h2 class="text-right"><i class="fa fa-users f-left"></i><span class="ml-2 mr-2">{{$unitsCount}}</span></h2>
                <p class="m-b-0 text-right"><a href="/units" class="text-white mr-2">Ver más</a></p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-4 mb-4"> {{-- Cada tarjeta ocupa el ancho completo en dispositivos pequeños, la mitad en medianos y un cuarto en extra grandes --}}
        <div class="card bg-danger order-card">
            <div class="card-block">
                <h5 class="ml-2 mt-2">Ejercicos</h5>
                <h2 class="text-right"><i class="fa fa-users f-left"></i><span class="ml-2 mr-2">{{$excerCount}}</span></h2>
                <p class="m-b-0 text-right"><a href="#" class="text-white mr-2">Ver más</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
