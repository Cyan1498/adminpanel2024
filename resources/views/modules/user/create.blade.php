@extends('layouts.themes.app')

@section('content')
    {{-- <div class="section-header">
        <div class="section-header-back">
            <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create New Post</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Posts</a></div>
            <div class="breadcrumb-item">Create New Customer</div>
        </div>
    </div> --}}

    <div class="section-body">
        {{-- <h2 class="section-title">Create New Post</h2>
        <p class="section-lead">
            On this page you can create a new post and fill in all fields.
        </p> --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>Nuevo cliente</h4>
                    </div> --}}
                    @if($id)
                    <form action="{{ route('users.update', ['user' => $id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <h2>Edit User</h2>
                    @else
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <h4>Nuevo cliente</h4>
                    @endif
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        name="name"
                                        value="{{ $id ? $user['name'] : '' }}"
                                    >
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">LastName</label>
                                <div class="col-sm-12 col-md-7">
                                    <input 
                                        type="text" 
                                        class="form-control @error('lastname') is-invalid @enderror" 
                                        name="lastname"
                                        value="{{ $id ? $user['lastname'] : '' }}"
                                        >
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Edad</label>
                                <div class="col-sm-12 col-md-7">
                                    <input 
                                        type="number" 
                                        class="form-control" 
                                        name="age"
                                        value="{{ $id ? $user['age'] : '' }}"
                                        >
                                        @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input 
                                        type="text" 
                                        class="form-control @error('email') is-invalid @enderror" 
                                        name="email"
                                        value="{{ $id ? $user['email'] : '' }}"
                                    >
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                <div class="col-sm-12 col-md-7">
                                    <input 
                                        type="text" 
                                        class="form-control 
                                        @error('phone') is-invalid 
                                        @enderror" 
                                        name="phone" 
                                        maxlength="9"
                                        value="{{ $id ? $user['phone'] : '' }}"
                                        >
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">country</label>
                                <div class="col-sm-12 col-md-7">
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="country"
                                        value="{{ $id ? $user['country'] : '' }}"
                                        >
                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                    <select class="form-control selectric">
                                        <option>Active</option>
                                        <option>Locked</option>
                                    </select>
                                    <label class="custom-toggle">
                                        <input type="checkbox" name="estado" value="0">
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group row mb-4">
                                    <label for="specialties" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Especialidades</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select 
                                        class="selectpicker" 
                                        title="Seleccionar especialidades" 
                                        multiple
                                        
                                    >
                                            <option value="">hola</option>
                                            <option value="">hola</option>
                                            <option value="">hola</option>
                                            <option value="">hola</option>
                                            <option value="">hola</option>
                                    </select>
                                    </div>

                            </div> --}}
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Create Post</button>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection