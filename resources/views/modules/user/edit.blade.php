<x-app-layout>
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
                    <div class="card-header">
                        <h4>Nuevo cliente</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="name" value="{{ $customer->name }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">LastName</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="lastname" value="{{ $customer->lastname }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Dni</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="dni" value="{{ $customer->dni }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control" name="direccion" value="{{ $customer->address }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                  <select class="form-control selectric" name="status">
                                    <option value="{{$customer->status }}">{{$customer->status }}</option>
                                    @if($customer->status=='Active')
                                    <option value="Locked">Locked</option>
                                        @else
                                    <option value="Active">Active</option>
                                    @endif
                                  </select>
                                </div>
                              </div>
                              <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                  <button type="submit" class="btn btn-primary">Update customer</button>
                                </div>
                              </div>
                    
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
