@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

@section('content')


<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">Cdrs</div>

            <div class="ml-auto">
                <div class="btn-group top-adding-btn">
                    <a href="{{ route('admin.cdrs.create') }}" class="btn btn-primary" ><i class="bx bx-plus"></i> Add Single</a>
                    <a href="{{ route('admin.dynamic-cdr.create') }}" class="btn btn-outline-secondary ml-2" id="sec-btn"><i class="bx bx-plus"></i> Add Multiple</a>
                </div>
            </div>
        </div>

        <div>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link pending-cdrs" href="{{route('admin.cdrs.index')}}">
                        <span class="p-tab-name">Pending Cdrs</span><i class='bx bx-message-edit font-24 d-sm-none'></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link release-cdrs active"  href="{{route('admin.release-cdr')}}">
                        <span class="p-tab-name">Release Cdrs</span><i class='bx bx-message-edit font-24 d-sm-none'></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link win-cdrs"  href="{{route('admin.win-cdr')}}">
                        <span class="p-tab-name">Win Cdrs</span><i class='bx bx-message-edit font-24 d-sm-none'></i>
                    </a>
                </li>
            </ul>
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

        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header">release cdrs Data</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th id="custom-table-heading">#</th>
                            <th id="custom-table-heading">Account Holder</th>
                            <th id="custom-table-heading">Amount</th>
                            <th id="custom-table-heading">Ref #</th>
                            <th id="custom-table-heading">Cdr #</th>
                            <th id="custom-table-heading">Status</th>
                            <th id="custom-table-heading">Project</th>
                            <th id="custom-table-heading">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($cdrs->count())
                            @foreach ($cdrs as $cdr)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $cdr->account_holder }}</td>
                                    <td>{{ $cdr->amount }}</td>
                                    <td>{{ $cdr->ref_no }}</td>
                                    <td>{{ $cdr->cdr_no }}</td>
                                    <td>{{ $cdr->status }}</td>
                                    <td>{{ $cdr->project }}</td>
                                    <td>
                                        <a href="{{ route('admin.cdrs.winUpdate',$cdr->id) }}"><img src="{{asset('storage/letter-w.png')}}"
                                                                                                    alt="letter-w.png" id="my-win"></a>
                                        {{--                                            <a href="{{ route('admin.cdrs.releaseUpdate',$cdr->id) }}"><img src="{{asset('storage/letter-r2.png')}}"--}}
                                        {{--                                                                                                            alt="letter-r.png" id="my-release"></a>--}}
                                        <a href="{{ route('admin.cdrs.edit', $cdr) }}"><i class="bx bx-edit" id="my-edit"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModal-{{ $loop->index }}"><i class="bx bx-trash text-danger" id="my-delete"></i></a>
                                    </td>
                                </tr>

                                <!--Delete Modal -->
                                <div class="modal fade" id="deleteModal-{{ $loop->index }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete cdr</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h1 class="text-danger">Are you sure?</h1>
                                                <p>This action cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.cdrs.destroy', $cdr) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"><i class="bx bx-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <th  style="text-align:right">Summary:</th>
                            <th colspan="2" style="text-align:right">Credit:</th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                            <th ></th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page-content-wrapper-->

@endsection

@section('script')


    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable( {
                //calculation starts
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    total = api
                        .column( 2 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    console.log(total);

                    // Total over this page
                    pageTotal = api
                        .column(2, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    console.log('<br>'+ pageTotal);


                    // Update footer
                    $( api.column( 1 ).footer() ).html(
                        'Rs: '+pageTotal +' ( Rs: '+ total +' total)'
                    );

                }
                //butttons
                ,
                buttons: [
                    {
                        extend:    'pageLength',
                        className: 'box-shadow--4dp btn-sm-menu'
                    },
                    {

                        extend:    'copy',
                        titleAttr:  'copy',
                        text:      '<i class="fadeIn animated bx bx-copy"></i>',
                        className: 'btn btn-info box-shadow--4dp btn-sm-menu',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }

                    },
                    {
                        extend:    'excel',
                        titleAttr:    'excel',
                        text:      '<i class="fadeIn animated bx bx-file"></i> ',
                        className: 'btn btn-success box-shadow--4dp btn-sm-menu',
                        messageTop: 'Release Cdrs Data',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6,7]

                        }

                    },
                    {
                        extend: 'pdfHtml5',
                        titleAttr: 'PDF',
                        extension: ".pdf",
                        filename: "Release Cdrs Data",
                        title: "",
                        text: '<i class="fadeIn animated bx bx-file-blank"></i> ',
                        className: 'btn btn-warning box-shadow--4dp btn-sm-menu',
                        messageTop: 'Release Cdrs Data',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6,7]

                        },


                    },

                    {
                        extend: 'print',
                        titleAttr: 'print',
                        text:      '<i class="fadeIn animated bx bx-printer"></i> ',
                        className: 'btn btn-danger box-shadow--4dp btn-sm-menu',
                        messageTop: 'Release Cdrs Data',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6,7]

                        },
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .prepend(
                                    // '<div><img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;"  alt="logo"/></div>'
                                );

                            $(win.document.body).find( 'table' )
                                .addClass( 'compact' )
                                .css( 'font-size', 'inherit' );
                        },



                    },
                    {
                        extend:    'colvis',
                        titleAttr:    'Filter Column',
                        text:      '<i class="fadeIn animated bx bx-filter"></i> ',
                        className: 'btn btn-dark box-shadow--4dp btn-sm-menu'
                    },

                ],
                lengthChange: false,

            } );

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

        });
        //
        //





    </script>



@endsection
