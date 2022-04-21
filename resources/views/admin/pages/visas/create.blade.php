@extends('admin.layouts.master')

@section('content')


    <style>
        #others-element{
            /*display: flex;*/
        }
    </style>

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">Add Visa</div>
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class='bx bx-home-alt'></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Visa</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="user-profile-page">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">{{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">{{session('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">	<span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Edit-Profile">
                            <div class="card shadow-none border mb-0">
                                <div class="card-body">
{{--                                    <h4 class="mb-5">Add Agent</h4>--}}
                                    <form action="{{ route('admin.visas.store') }}" method="POST" class="form-body" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mt-3 mb-3">
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">
                                            <div class="form-group">
                                                    <label>Company <span class="text-danger">*</span></label>
                                                    <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}">
                                                    @error('company')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mt-3 mb-3">
                                            <div class="col-12 col-lg-6">
                                                <div class="form-group">
                                                    <label>Price <span class="text-danger">*</span></label>
                                                    <input type="text" name="costprice" class="form-control @error('costprice') is-invalid @enderror" value="{{ old('costpricecostprice') }}">
                                                    @error('costprice')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-6">

                                            </div>
                                        </div>


                                        <div class="row mt-3 mb-3">
                                            <div class="col-12 col-lg-6">
                                                <label>Others</label>
                                                <div class="form-group" id="others-element">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="ptr" class="custom-control-input" id="ptr">
                                                        <label class="custom-control-label" for="ptr">ptr</label>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="medical" class="custom-control-input" id="medical">
                                                        <label class="custom-control-label" for="medical">medical</label>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="insurance" class="custom-control-input" id="insurance">
                                                        <label class="custom-control-label" for="insurance">insurance</label>
                                                    </div>
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" name="transport" class="custom-control-input" id="transport">
                                                        <label class="custom-control-label" for="transport">transport</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary m-1">Save</button>
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
<!--end page-content-wrapper-->

@endsection
