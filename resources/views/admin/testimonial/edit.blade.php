@extends('layouts.adminApp')


@section('content')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
       
           {{-- INCLUDE PAGE HEADER --}}
           @include('admin.includes.header',['headerTitle'=>'Dashboard','title1'=>'Dashbord'])
           {{-- INCLUDE PAGE HEADER --}}

        <div class="row">
          
            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" style="margin-bottom:24px;">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Approve testimonial/ ignore to leave inactive</h4>

                                <div class="widget-content widget-content-area" >
                                    {{-- include flash mesage --}}
                                    @include('admin.partials._alerts')
                                    {{-- include flash mesage --}}
                                <form method="POST" action="{{route("admin.testimonial.update",$testimonial->id)}}">
                                    @csrf
                                    @method('PATCH')
                                        <div class="form-row mb-4">
                                            <div class="form-group col-md-6">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" value="{{$testimonial->fullname}}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="occupation">Occupation</label>
                                                <input type="text" class="form-control" id="occupation" name="occupation" value="{{$testimonial->occupation}}" readonly/>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputState">Status</label>
                                                <select id="inputState" class="form-control @error('status') is-invalid @enderror" name="status">
    
                                                    @if ($testimonial->status == 0)
                                                    <option value="">Not Approved</option>
                                                    <option value="1">Approve</option>
                                                        
                                                    @else
                                                    <option value="">Approved</option>
                                                    <option value="0">Dis-Approve</option>
                                                        
                                                    @endif
                                                </select>
                                                 @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="inputAddress">Testimonial</label>
                                            <textarea class="form-control" id="details" rows="5" name="details" readonly>{{$testimonial->details}}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success mt-3">Approve</button>
                                        <a href="{{route("admin.testimonial.index")}}" class="btn btn-warning mt-3">Go back</a>
                                        </div>
                                    </form>
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