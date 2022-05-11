@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">User Profile</div>
            <div class="pl-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javaScript:;"><i class='bx bx-home-alt'></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="user-profile-page">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-7 border-right">
                            <div class="d-md-flex align-items-center">
                                <div class="mb-md-0 mb-3">
                                    <img src="{{ asset( $user->image ? 'storage/'.$user->image : 'admin/images/avatars/no_image.jpg' ) }}" class="rounded shadow" width="130" height="130" alt="profile image" />
                                </div>
                                <div class="ml-md-4 flex-grow-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <h4 class="mb-0">{{ $user->name }}</h4>
                                    </div>
                                    <p class="mb-0 text-muted">Super Admin</p>
                                    <p class="text-primary"><span class="dot-green"></span> online</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5">
                            <table class="table table-sm table-borderless mt-md-0 mt-3">
                                <tbody>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="">
                                @if ($user->twitter)
                                    <a href="//{{ $user->twitter }}" class="btn btn-sm btn-link"><i class='bx bxl-twitter'></i></a>
                                @endif
                                @if ($user->facebook)
                                    <a href="//{{ $user->facebook }}" class="btn btn-sm btn-link"><i class='bx bxl-facebook'></i></a>
                                @endif
                                @if ($user->linkedin)
                                    <a href="//{{ $user->linkedin }}" class="btn btn-sm btn-link"><i class='bx bxl-linkedin'></i></a>
                                @endif
                                @if ($user->instagram)
                                    <a href="//{{ $user->instagram }}" class="btn btn-sm btn-link"><i class='bx bxl-instagram'></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link edit-profile active" data-toggle="tab" href="#Edit-Profile">
                                <span class="p-tab-name">Edit Profile</span><i class='bx bx-message-edit font-24 d-sm-none'></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link change-password" data-toggle="tab" href="#Change-Password">
                                <span class="p-tab-name">Change Password</span><i class='bx bx-message-edit font-24 d-sm-none'></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

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
                                    <h4 class="mb-5">Edit Profile</h4>
                                    <form action="{{ route('admin.profile.update', $user) }}" method="POST" class="form-body" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="mb-md-0 mb-3 text-center">
                                            <img src="{{ asset( $user->image ? 'storage/'.$user->image : 'admin/images/avatars/no_image.jpg' ) }}" id="image_preview" class="rounded shadow" width="150" height="150" alt="profile image" />
                                        </div>
                                        <div class="mb-5 mt-3 w-25 mx-auto">
                                            <input type="file" name="image" id="image_input_field" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mt-3 mb-3">
                                            <div class="col-12 col-lg-6 border-right">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Email <span class="text-danger">*</span></label>
                                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Phone <span class="text-danger">*</span></label>--}}
{{--                                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">--}}
{{--                                                    @error('phone')--}}
{{--                                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                            <strong>{{ $message }}</strong>--}}
{{--                                                        </span>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <label>Gender <span class="text-danger">*</span></label>
                                                    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Twitter</label>--}}
{{--                                                    <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ old('twitter', $user->twitter) }}">--}}
{{--                                                    @error('twitter')--}}
{{--                                                        <span class="invalid-feedback" role="alert">--}}
{{--                                                            <strong>{{ $message }}</strong>--}}
{{--                                                        </span>--}}
{{--                                                    @enderror--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <label>Facebook</label>
                                                    <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $user->facebook) }}">
                                                    @error('facebook')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Linked In</label>
                                                    <input type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ old('linkedin', $user->linkedin) }}">
                                                    @error('linkedin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Instagram</label>
                                                    <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram', $user->instagram) }}">
                                                    @error('instagram')
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

                        <div class="tab-pane fade" id="Change-Password">
                            <div class="card shadow-none border mb-0">
                                <div class="card-body">
                                    <h4 class="mb-5">Change Password</h4>
                                    <form action="{{ route('admin.password.change', $user) }}" method="POST" class="form-body">
                                        @csrf
                                        @method('put')

                                        <div class="form-group">
                                            <label>Old Password <span class="text-danger">*</span></label>
                                            <input type="text" name="old_password" class="form-control @error('old_password') is-invalid @enderror" value="{{ old('old_password', $user->old_password) }}">
                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>New Password <span class="text-danger">*</span></label>
                                            <input type="text" name="new_password" class="form-control @error('new_password') is-invalid @enderror" value="{{ old('new_password', $user->new_password) }}">
                                            @error('new_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password <span class="text-danger">*</span></label>
                                            <input type="text" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" value="{{ old('confirm_password', $user->confirm_password) }}">
                                            @error('confirm_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
    var url = window.location.href;

    if(url.includes('#Change-Password'))
    {
        $('#Edit-Profile').removeClass('show active');
        $('.edit-profile').removeClass('active');
        $('#Change-Password').addClass('show active');
        $('.change-password').addClass('active');
    }
</script>

@endsection
