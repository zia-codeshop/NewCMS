@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

@section('content')


    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3"></div>
            </div>


                <div class="my-2">
                    <form action="{{route('admin.project-wise-report')}}" method="GET">
                        <div class="row mb-5 ">
                            <div class="col-sm-3">
                                <span id="span-rp">START DATE</span>
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <div class="col-sm-3">
                                <span id="span-rp">END DATE</span>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                            <div class="col-sm-3">
                                <span id="span-rp">PROJECT NAME</span>
                                <select name="status_box" id="status_box" class="form-control">
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 mt-3">
                                <button class="btn btn-primary " type="submit">Show</button>
                            </div>
                        </div>

                    </form>
                </div>


        <!--end breadcrumb-->
            <div class="card">
                <div class="card-header text-center">project wise report</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>place</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @if ($projects->count())--}}
{{--                                @foreach ($projects as $project)--}}
                                    <tr>
                                        <td>{{ 1 }}</td>
                                        <td>{{ 2 }}</td>

                                        <td>{{ 3 }}</td>

                                    </tr>

                                    <!--Delete Modal -->

{{--                                @endforeach--}}
{{--                            @endif--}}
                            </tbody>
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
            //Default data table
            $('#example').DataTable();
            var table = $('#example2').DataTable({
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
                        messageTop: 'Project-Wise-Report',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6,7]

                        }

                    },
                    {
                        extend: 'pdfHtml5',
                        titleAttr: 'PDF',
                        extension: ".pdf",
                        filename: "Project-Wise-Report",
                        title: "",
                        text: '<i class="fadeIn animated bx bx-file-blank"></i> ',
                        className: 'btn btn-warning box-shadow--4dp btn-sm-menu',
                        messageTop: 'Project-Wise-Report',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5,6,7]

                        },


                    },

                    {
                        extend: 'print',
                        titleAttr: 'print',
                        text:      '<i class="fadeIn animated bx bx-printer"></i> ',
                        className: 'btn btn-danger box-shadow--4dp btn-sm-menu',
                        messageTop: 'Project-Wise-Report',
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
            });
            table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>



@endsection
