@extends('layouts.themes.app')

@section('content')
{{-- <div class="section"> --}}
<div class="section-header mt-5">
    {{-- <h1>BIENVENIDO 2024</h1> --}}

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-2">
                        {{-- <h1>QUE FUE</h1> --}}
                        <div class="row">
                            <div class="col-6 col-md-6 col-xl-4">
                                <div class="card bg-sucess order-card">
                                    <div class="card-block">
                                        <h5>Usuarios</h5>

                                        <h2 class="text-right"><i class="fa fa-users f-left"></i><span>34</span></h2>
                                        <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Card Title</h4>
                                    </div>
                                    <div class="card-body">
                                        This is some text within a card body.
                                    </div>

                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Card Title</h4>
                                    </div>
                                    <div class="card-body">
                                        This is some text within a card body.
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
