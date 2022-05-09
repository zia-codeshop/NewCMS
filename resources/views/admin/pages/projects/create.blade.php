@extends('admin.layouts.master')

@section('content')

    <style>
        #customer-div{
            margin-top: 150px;
        }
    </style>

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">Add People</div>
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class='bx bx-home-alt'></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add People</li>
                    </ol>
                </nav>
            </div>
            <div class="ml-auto">
                <div class="btn-group top-adding-btn">
                    <a href="{{ route('admin.dynamic-people.create') }}" class="btn btn-primary" ><i class="bx bx-plus"></i> Add Multiple</a>
                </div>
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
                                    <form action="{{ route('admin.peoples.store') }}" method="POST" class="form-body" enctype="multipart/form-data">
                                        @csrf





                                        <div class="row mt-3 mb-3">
                                            <div class="col-12 col-lg-4">
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

                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label>Contact <span class="text-danger">*</span></label>
                                                    <input type="text" name="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}">
                                                    @error('contact')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-4">
                                                <div class="form-group">
                                                    <label>Address </label>
                                                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
