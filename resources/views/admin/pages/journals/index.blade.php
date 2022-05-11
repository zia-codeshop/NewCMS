@extends('admin.layouts.master')

@section('content')


<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">journals</div>

            <div class="ml-auto">
                <div class="btn-group top-adding-btn">
                    <a href="{{ route('admin.journals.create') }}" class="btn btn-primary" ><i class="bx bx-plus"></i> Add Single</a>
                    <a href="{{ route('admin.dynamic-journal.create') }}" class="btn btn-outline-secondary ml-2" id="sec-btn"><i class="bx bx-plus"></i> Add Multiple</a>

                </div>
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

        <!--end breadcrumb-->
        <div class="card">
            <div class="card-header">journals Data</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th id="custom-table-heading">#</th>
                                <th id="custom-table-heading">description</th>
                                <th id="custom-table-heading">projects</th>
                                <th id="custom-table-heading">peoples</th>
                                <th id="custom-table-heading">Debit</th>
                                <th id="custom-table-heading">Credit</th>
                                <th id="custom-table-heading">Date</th>
                                <th id="custom-table-heading">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($journals->count())
                                @foreach ($journals as $journal)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $journal->description }}</td>

                                        <td>{{ $journal->getProject->title }}</td>
                                        <td>{{ $journal->getPeople->name }}</td>
                                        <td>{{ $journal->debit }}</td>
                                        <td>{{ $journal->credit }}</td>
                                        <td>{{ \Carbon\Carbon::parse($journal->created_at)->toFormattedDateString('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.journals.edit', $journal) }}"><i class="bx bx-edit" id="my-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal-{{ $loop->index }}"><i class="bx bx-trash text-danger" id="my-delete"></i></a>
                                        </td>
                                    </tr>

                                    <!--Delete Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $loop->index }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete journal</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <h1 class="text-danger">Are you sure?</h1>
                                                    <p>This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.journals.destroy', $journal) }}" method="POST">
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
                            <th colspan="4" style="text-align:right">Summary:</th>
                            <th style="text-align:left">Credit:</th>
                            <th style="text-align:left">Balnce:</th>
                            <th style="text-align:left">Balnce:</th>
                            <th></th>
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

                    // Total over all pages
                    debit = api
                        .column( 4 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    credit = api
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageDebitTotal = api
                        .column( 4, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // credit over this page
                    pageCreditTotal = api
                        .column( 5, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( 4 ).footer() ).html(
                        'Rs: '+pageDebitTotal +' ( Rs: '+ debit +' total)'
                    );
                    $( api.column( 5 ).footer() ).html(
                        'Rs: '+pageCreditTotal +' ( Rs: '+ credit +' total)'
                    );
                    $( api.column( 6 ).footer() ).html(
                        'Rs: '+(pageCreditTotal - pageCreditTotal) +' ( Rs: '+ (debit-credit) +' total)'
                    );
                }
                //butttons
                ,buttons: [
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
                        messageTop: 'Journal Data',
                        exportOptions: {
                        columns: [0, 1, 2, 3,4,5,6]

            }

        },
                    {
                        extend: 'pdfHtml5',
                        titleAttr: 'PDF',
                        extension: ".pdf",
                        filename: "Journal Data",
                        title: "",
                        text: '<i class="fadeIn animated bx bx-file-blank"></i> ',
                        className: 'btn btn-warning box-shadow--4dp btn-sm-menu',
                        messageTop: 'Journal Data',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6]

                        },


                    },

                    {
                        extend: 'print',
                        titleAttr: 'print',
                        text:      '<i class="fadeIn animated bx bx-printer"></i> ',
                        className: 'btn btn-danger box-shadow--4dp btn-sm-menu',
                        messageTop: 'Journal Data',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6]

                        },
                        customize: function ( win ) {
                            $(win.document.body)
                                .css( 'font-size', '10pt' )
                                .prepend(
                                    '<div><img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;"  alt="logo"/></div>'
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
