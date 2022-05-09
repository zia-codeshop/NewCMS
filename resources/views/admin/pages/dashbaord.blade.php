@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

@section('content')

    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6>Total Profit</h6>
                                    <h4 class="font-weight-bold mb-0">$8320</h4>
                                </div>
                                <div class="ml-auto"> <small class="text-danger float-right">(-72.16%) <i class='bx bx-down-arrow-alt'></i></small>
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6>Total Sales</h6>
                                    <h4 class="font-weight-bold mb-0">5264</h4>
                                </div>
                                <div class="ml-auto"> <small class="text-success float-right">(+68.26%) <i class='bx bx-up-arrow-alt'></i></small>
                                    <div id="chart2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6>Total Visitors</h6>
                                    <h4 class="font-weight-bold mb-0">22.7k</h4>
                                </div>
                                <div class="ml-auto"> <small class="text-success float-right">(+54.34%) <i class='bx bx-up-arrow-alt'></i></small>
                                    <div id="chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <div class="card radius-10">
                <div class="card-header border-bottom-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="font-weight-bold mb-0">Recent Orders</h5>
                        </div>
                        <div class="ml-auto">
                            <button type="button" class="btn btn-white radius-10">View More</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Product Name</th>
                                    <th>Customer</th>
                                    <th>Product id</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="product-img bg-transparent border">
                                            <img src="assets/images/icons/shoes.png" width="35" alt="">
                                        </div>
                                    </td>
                                    <td>Nike Sports NK</td>
                                    <td>Mitchell Daniel</td>
                                    <td>#9668521</td>
                                    <td>$99.85</td>
                                    <td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-img bg-transparent border">
                                            <img src="assets/images/icons/smartphone.png" width="35" alt="">
                                        </div>
                                    </td>
                                    <td>Redmi Airdts</td>
                                    <td>Craig Clayton</td>
                                    <td>#8627523</td>
                                    <td>$59.35</td>
                                    <td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-img bg-transparent border">
                                            <img src="assets/images/icons/mouse.png" width="35" alt="">
                                        </div>
                                    </td>
                                    <td>Magic Mouse 2</td>
                                    <td>Julia Burke</td>
                                    <td>#6875954</td>
                                    <td>$42.68</td>
                                    <td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-img bg-transparent border">
                                            <img src="assets/images/icons/tshirt.png" width="35" alt="">
                                        </div>
                                    </td>
                                    <td>Coton-T-Shirt</td>
                                    <td>Clark Natela</td>
                                    <td>#4587892</td>
                                    <td>$32.78</td>
                                    <td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="product-img bg-transparent border">
                                            <img src="assets/images/icons/headphones.png" width="35" alt="">
                                        </div>
                                    </td>
                                    <td>Headphones 7</td>
                                    <td>Robin Mandela</td>
                                    <td>#5587426</td>
                                    <td>$29.52</td>
                                    <td><a href="javaScript:;" class="btn btn-sm btn-success radius-30">Delivered</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->

@endsection
