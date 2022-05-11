@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">Site Information</div>
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javaScript:;"><i class='bx bx-home-alt'></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Site Information</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="siteInformation-profile-page">

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
                        <div class="tab-pane fade show active">
                            <div class="card shadow-none border mb-0">
                                <div class="card-body">
                                    <h4 class="mb-5">Update Logos</h4>
                                    <form action="{{ route('admin.logos.update') }}" method="POST" class="form-body" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="row">
                                            <div class="col-lg-6 border-right">
                                                <div class="mb-3">
                                                    <img src="{{ asset( $siteInformation ? $siteInformation->agency_logo ? 'storage/'.$siteInformation->agency_logo : 'admin/images/avatars/no_image.jpg' : 'admin/images/avatars/no_image.jpg') }}" id="image_preview" class="rounded shadow" width="130" height="130" alt="profile image" />
                                                    <h6 class="mt-2">Logo</h6>
                                                </div>
                                                <div class="mb-5 mt-3 w-50">
                                                    <input type="file" name="agency_logo" id="image_input_field" class="form-control @error('agency_logo') is-invalid @enderror">
                                                    @error('agency_logo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <img src="{{ asset( $siteInformation ? $siteInformation->agency_logo_inverse ? 'storage/'.$siteInformation->agency_logo_inverse : 'admin/images/avatars/no_image.jpg' : 'admin/images/avatars/no_image.jpg') }}" id="image_preview_1" class="rounded shadow" width="130" height="130" alt="profile image" />
                                                    <h6 class="mt-2">Logo Inverse</h6>
                                                </div>
                                                <div class="mb-5 mt-3 w-50">
                                                    <input type="file" name="agency_logo_inverse" id="image_input_field_1" class="form-control @error('agency_logo_inverse') is-invalid @enderror">
                                                    @error('agency_logo_inverse')
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


            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="card shadow-none border mb-0">
                                <div class="card-body">
                                    <h4 class="mb-5">Update Site Information</h4>
                                    <form action="{{ route('admin.siteInformation.update') }}" method="POST" class="form-body">
                                        @csrf
                                        @method('put')
                                        <div class="row mt-3 mb-3">
                                            <div class="col-12 col-lg-6 border-right">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="agency_name" class="form-control @error('agency_name') is-invalid @enderror" value="{{ old('agency_name', $siteInformation ? $siteInformation->agency_name : '') }}">
                                                    @error('agency_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="agency_email" class="form-control @error('agency_email') is-invalid @enderror" value="{{ old('agency_email', $siteInformation ? $siteInformation->agency_email : '') }}">
                                                    @error('agency_email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input type="text" name="agency_phone" class="form-control @error('agency_phone') is-invalid @enderror" value="{{ old('agency_phone', $siteInformation ? $siteInformation->agency_phone : '') }}">
                                                    @error('agency_phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Address <span class="text-danger">*</span></label>
                                                    <textarea name="agency_address" class="form-control @error('agency_address') is-invalid @enderror">{{ old('agency_address', $siteInformation ? $siteInformation->agency_address : '') }}</textarea>
                                                    @error('agency_address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-6 border-right">
                                                        <div class="mb-3">
                                                            <img src="{{ asset( $siteInformation ? $siteInformation->agency_instagram ? 'storage/'.$siteInformation->agency_instagram : 'admin/images/avatars/no_image.jpg' : 'admin/images/avatars/no_image.jpg') }}" id="image_preview" class="rounded shadow" width="130" height="130" alt="profile image" />
                                                            <h6 class="mt-2">Login Page Image</h6>
                                                        </div>
                                                        <div class="mb-5 mt-3 w-50">
                                                            <input type="file" name="agency_instagram" id="image_input_field" class="form-control @error('agency_instagram') is-invalid @enderror">
                                                            @error('agency_instagram')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <img src="{{ asset( $siteInformation ? $siteInformation->agency_youtube ? 'storage/'.$siteInformation->agency_youtube : 'admin/images/avatars/no_image.jpg' : 'admin/images/avatars/no_image.jpg') }}" id="image_preview_1" class="rounded shadow" width="130" height="130" alt="profile image" />
                                                            <h6 class="mt-2">Favicon</h6>
                                                        </div>
                                                        <div class="mb-5 mt-3 w-50">
                                                            <input type="file" name="agency_youtube" id="image_input_field_1" class="form-control @error('agency_youtube') is-invalid @enderror">
                                                            @error('agency_youtube')
                                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                            @enderror
                                                        </div>
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
