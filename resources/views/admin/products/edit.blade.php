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
                
            <div class="col-xl-4 col-lg-6 col-md-6  mb-4">
                <div class="card b-l-card-1 h-100" style="-webkit-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); -moz-box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); box-shadow: 0 6px 10px 0 rgba(0,0,0,.14), 0 1px 18px 0 rgba(0,0,0,.12), 0 3px 5px -1px rgba(0,0,0,.2); ">
                    <img class="card-img-top" src="/chnlsgasplant/images/product/{{$product->image}}" alt="Card image cap">
                   
                </div>
            </div>

            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
              
                {{-- include alert info card --}}
                @include('admin.partials._alerts')
                {{-- include alert info card --}}
                
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Form controls</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area" style="height: 571px;">
                     
                        <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Product Name</label>
                                    <input
                                        class="form-control form-icon-input-left @error('name') is-invalid @enderror"
                                        id="name" type="text" name="name" placeholder="enter product name" required
                                        value="{{ $product->name }}" />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Product Price &#8358;</label>
                                    <input
                                        class="form-control form-icon-input-left @error('price') is-invalid @enderror"
                                        id="price" type="text" name="price" placeholder="enter product price"
                                        required value="{{ $product->price }}" />
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-4">
                            <div class="form-group col-6">
                                <label for="inputAddress">Cylinder Size</label>
                                <input class="form-control form-icon-input-left @error('size') is-invalid @enderror"
                                    id="size" type="text" name="size" placeholder="enter cylinder size" required
                                    value="{{ $product->size }}" />
                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="inputAddress">Product Status</label>
                                <select class="form-control form-icon-input-left @error('status') is-invalid @enderror"
                                    name="status" required>
                                
                                        <option value="">Choose</option>
                                        @if ($product->status == 1)
                                        <option value="1" selected>Active</option>
                                        <option value="0">Archive</option>
                                        @else
                                        <option value="1">Active</option>
                                        <option value="0" selected>Archived</option>
                                        @endif
                                        
                                </select>
                                @error('size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="inputAddress2">Product Image</label>
                                <input
                                    class="form-control  form-icon-input-left @error('image') is-invalid @enderror"
                                    id="image" type="file" name="image" placeholder="write post image" />
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row mb-4">
                                <label for="inputCity">Product Description</label>
                                <textarea class="form-control form-icon-input-left"
                                    placeholder="enter product descriptions"
                                    name="description">{{ $product->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update </button>
                            <a href="{{route('admin.products.index')}}" class="btn btn-info mt-3">Back </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>
    
</div>

{{-- CREATE PRODUCT CONTENT ENDS --}}
@endsection