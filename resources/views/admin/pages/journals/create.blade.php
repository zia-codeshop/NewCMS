@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

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
                <div class="breadcrumb-title pr-3">journals</div>
                <div class="pl-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class='bx bx-home-alt'></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add journal</li>
                        </ol>
                    </nav>
                </div>
                <div class="ml-auto">
                    <div class="btn-group top-adding-btn">
                        <a href="{{ route('admin.dynamic-journal.create') }}" class="btn btn-primary" ><i class="bx bx-plus"></i> Add Multiple</a>
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
                                        <form action="{{ route('admin.journals.store') }}" method="POST" class="form-body" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row mt-3 mb-3">
                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>description <span class="text-danger">*</span></label>
                                                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"  value="{{ old('description') }}">
                                                        @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>people</label>
                                                        <select name="people_id" id="people_id" class="form-control select2-search--inline">
                                                            <option value=""> --- Select People --- </option>
                                                            @if($peoples->count())
                                                                @foreach($peoples as $people)
                                                                    <option value={{$people->id}}>{{$people->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>project</label>
                                                        <select name="project_id" id="project_id" class="form-control select2-search--inline">
                                                            <option value=""> --- Select project --- </option>
                                                            @if($projects->count())
                                                                @foreach($projects as $project)
                                                                    <option value={{$project->id}}>{{$project->title}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>

                                                </div>


                                            </div>

                                            <div class="row mt-3 mb-3">
                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>debit</label>
                                                        <input type="text" name="debit" class="form-control @error('debit') is-invalid @enderror"  value="{{ old('debit') }}">
                                                        @error('debit')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="form-group">
                                                        <label>credit</label>
                                                        <input type="text" name="credit" class="form-control @error('credit') is-invalid @enderror"  value="{{ old('credit') }}">
                                                        @error('credit')
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

@section('script')
    <script>

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });

    </script>
@endsection
