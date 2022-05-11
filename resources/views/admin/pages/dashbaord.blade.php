@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

@section('content')

    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h6>Sessions</h6>
                                    <h4 class="font-weight-bold">32,842 <small class="text-success font-small">(+40%)</small></h4>
                                </div>
                                <div class="dashboard-icons bg-light-primary text-primary"><i class="bx bx-refresh"></i>
                                </div>
                            </div>
                            <p class="text-secondary mb-0">Analytics for last week</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h6>Users</h6>
                                    <h4 class="font-weight-bold">16,352 <small class="text-success font-small">(+22%)</small></h4>
                                </div>
                                <div class="dashboard-icons bg-light-danger text-danger"><i class="bx bx-group"></i>
                                </div>
                            </div>
                            <p class="text-secondary mb-0">Analytics for last week</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h6>Time on Site</h6>
                                    <h4 class="font-weight-bold">34m 14s <small class="text-success font-small">(+55%)</small></h4>
                                </div>
                                <div class="dashboard-icons bg-light-warning text-warning"><i class="bx bx-time"></i>
                                </div>
                            </div>
                            <p class="text-secondary mb-0">Analytics for last week</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="widgets-icons bg-primary text-white rounded-circle"><i class='bx bx-cart'></i>
                                </div>
                                <div class="media-body pl-3">
                                    <h5 class="mb-0 font-weight-bold">44275</h5>
                                    <p class="mb-0 text-secondary">New Orders</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"> <i class='bx bx-dots-vertical-rounded'></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">Action</a>
                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="widgets-icons bg-sunset text-white rounded-circle"><i class='bx bx-dollar'></i>
                                </div>
                                <div class="media-body pl-3">
                                    <h5 class="mb-0 font-weight-bold">$15,824</h5>
                                    <p class="mb-0 text-secondary">Total Income</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"> <i class='bx bx-dots-vertical-rounded'></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">Action</a>
                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="widgets-icons bg-danger text-white rounded-circle"><i class='bx bx-wallet'></i>
                                </div>
                                <div class="media-body pl-3">
                                    <h5 class="mb-0 font-weight-bold">3432</h5>
                                    <p class="mb-0 text-secondary">Total Expense</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"> <i class='bx bx-dots-vertical-rounded'></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">Action</a>
                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="widgets-icons bg-success text-white rounded-circle"><i class='bx bx-group'></i>
                                </div>
                                <div class="media-body pl-3">
                                    <h5 class="mb-0 font-weight-bold">4528</h5>
                                    <p class="mb-0 text-secondary">New Users</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"> <i class='bx bx-dots-vertical-rounded'></i>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right">	<a class="dropdown-item" href="javascript:;">Action</a>
                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Something else here</a>
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
