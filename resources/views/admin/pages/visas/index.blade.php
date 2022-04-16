@extends('admin.layouts.master')

@section('content')

    <style>
        #my-delete,#my-edit{
            font-size: 1.5em;
        }
        .dt-buttons btn-group>button{
            background-color: #0f531f;
        }
    </style>

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
            <div class="breadcrumb-title pr-3">Visa</div>

            <div class="ml-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.visas.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add Visa</a>
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
            <div class="card-header">Visa Data</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($visas->count())
                                @foreach ($visas as $visa)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $visa->name }}</td>
{{--                                        <td>{{ $visa->email }}</td>--}}
{{--                                        <td>{{ $visa->phone }}</td>--}}
{{--                                        <td>{{ $visa->address }}</td>--}}
                                        <td>
                                            <a href="{{ route('admin.visas.edit', $visa) }}"><i class="bx bx-edit" id="my-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal-{{ $loop->index }}"><i class="bx bx-trash text-danger" id="my-delete"></i></a>
                                        </td>
                                    </tr>

                                    <!--Delete Modal -->
                                    <div class="modal fade" id="deleteModal-{{ $loop->index }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Agent</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <h1 class="text-danger">Are you sure?</h1>
                                                    <p>This action cannot be undone.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <form action="{{ route('admin.visas.destroy', $visa) }}" method="POST">
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
{{--                        <tfoot>--}}
{{--                            <tr>--}}
{{--                                <th>#</th>--}}
{{--                                <th>Name</th>--}}
{{--                                <th>Image</th>--}}
{{--                                <th>Email</th>--}}
{{--                                <th>Contact</th>--}}
{{--                                <th>Address</th>--}}
{{--                                <th>Action</th>--}}
{{--                            </tr>--}}
{{--                        </tfoot>--}}
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
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>



@endsection
