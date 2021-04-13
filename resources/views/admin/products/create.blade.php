@extends('layouts.adminApp')


@section('content')
{{-- CREATE PRODUCT CONTENT STARTS --}}


<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="page-header">
            <div class="page-title">
                <h3>Product</h3>
            </div>

            <nav class="breadcrumb-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span>Create Product</span></li>
                </ol>
            </nav>

        </div>

        <div class="row">
          
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>All fields are required*</h4>
                            </div>
                        {{-- include alert info card --}}
                        @include('admin.partials._alerts')
                        {{-- include alert info card --}}
                        </div>
                           
                    </div>
                    <div class="widget-content widget-content-area" >
                        <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <!-- Form Controls -->
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div>


                                    <div class="card-body row">

                                        <div class="col-md-6 col-xs-12 col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputLeftIcon">Product Name</label>
                                                <span class="form-icon-wrapper">
                                                    <span class="form-icon form-icon--left">
                                                        <i
                                                            class="fa fa-user-circle form-icon__item"></i>
                                                    </span>
                                                    {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                    <input
                                                        class="form-control form-icon-input-left @error('name') is-invalid @enderror"
                                                        id="name" type="text" name="name"
                                                        placeholder="enter product name" required
                                                        value="{{ old('name') }}" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xs-12 col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputLeftIcon">Prodcut Price &#8358;</label>
                                                <span class="form-icon-wrapper">
                                                    <span class="form-icon form-icon--left">
                                                        <i
                                                            class="fa fa-user-circle form-icon__item"></i>
                                                    </span>
                                                    {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                    <input
                                                        class="form-control form-icon-input-left @error('price') is-invalid @enderror"
                                                        id="price" type="text" name="price"
                                                        placeholder="enter product price" required
                                                        value="{{ old('price') }}" />
                                                    @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xs-12 col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputLeftIcon">Cylinder Size</label>
                                                <span class="form-icon-wrapper">
                                                    <span class="form-icon form-icon--left">
                                                        <i
                                                            class="fa fa-user-circle form-icon__item"></i>
                                                    </span>
                                                    {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                    <input
                                                        class="form-control form-icon-input-left @error('size') is-invalid @enderror"
                                                        id="size" type="text" name="size"
                                                        placeholder="enter cylinder size" required
                                                        value="{{ old('size') }}" />
                                                    @error('size')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-xs-12 col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputLeftIcon">Product Image</label>
                                                <span class="form-icon-wrapper">
                                                    <span class="form-icon form-icon--left">
                                                        <i
                                                            class="fa fa-user-circle form-icon__item"></i>
                                                    </span>
                                                    <input
                                                        class="form-control  form-icon-input-left @error('image') is-invalid @enderror"
                                                        id="image" type="file" name="image"
                                                        placeholder="write post image" required />
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </span>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-xs-12 col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputAddress">Product Status</label>
                        <select class="form-control form-icon-input-left @error('status') is-invalid @enderror"
                            name="status" required >
                        
                                <option value="">Choose</option>
                             
                                <option value="1">Active</option>
                                <option value="0">Archive</option>
                                
                                
                        </select>
                        @error('size')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-lg-6">
                                            <div class="form-group mb-4">
                                                <label for="inputLeftIcon">Product descriptions</label>
                                                <span class="form-icon-wrapper">
                                                    <span class="form-icon form-icon--left">
                                                        <i
                                                            class="fa fa-user-circle form-icon__item"></i>
                                                    </span>
                                                    {{-- <input id="inputLeftIcon" class="form-control form-icon-input-left" type="email" placeholder="Placeholder" aria-describedby="emailHelp"> --}}
                                                    <textarea class="form-control form-icon-input-left"
                                                        placeholder="enter product descriptions"
                                                        name="description">{{ old('description') }}</textarea>

                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>

                                        {{-- <hr class="my-4"> --}}
                                        <div class="input-group">
                                            <button class="btn btn-primary m-1" type="submit">Create
                                                Product</button>
                                            <button class="btn btn-outline-secondary m-1"
                                                type="reset">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End Form Controls -->
                    </form>
                    </div>
                </div>
            </div>


        </div>
        
    </div>
    
</div>

{{-- CREATE PRODUCT CONTENT ENDS --}}
@endsection