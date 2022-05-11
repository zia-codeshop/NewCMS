@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

@section('content')

    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Edit Cdr</div>

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
                                        {{--                                    <h4 class="mb-5">Edit cdr</h4>--}}
                                        <form action="{{ route('admin.cdrs.update', $cdr) }}" method="POST" class="form-body" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <div class="row mt-3 mb-3">

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>Account Holder <span class="text-danger">*</span></label>
                                                        <input type="text" name="account_holder" class="form-control @error('account_holder') is-invalid @enderror"  value="{{ old('account_holder', $cdr->account_holder) }}">
                                                        @error('account_holder')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>Amount <span class="text-danger">*</span></label>
                                                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror"  value="{{ old('amount', $cdr->amount) }}">
                                                        @error('amount')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>Ref # </label>
                                                        <input type="text" name="ref_no" class="form-control @error('ref_no') is-invalid @enderror"  value="{{ old('ref_no', $cdr->ref_no) }}">
                                                        @error('ref_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3 mb-3">

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>Cdr # <span class="text-danger">*</span></label>
                                                        <input type="text" name="cdr_no" class="form-control @error('cdr_no') is-invalid @enderror"  value="{{ old('cdr_no', $cdr->cdr_no) }}">
                                                        @error('cdr_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>Project <span class="text-danger">*</span></label>
                                                        <input type="text" name="project" class="form-control @error('project') is-invalid @enderror"  value="{{ old('project', $cdr->project) }}">
                                                        @error('project')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-primary m-1">Update</button>
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
