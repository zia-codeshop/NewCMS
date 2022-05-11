@extends('admin.layouts.master',['title' => $siteInformation->agency_name])

@section('content')


    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                <div class="breadcrumb-title pr-3">Add Multiple projects Data</div>

                <div class="ml-auto">
                    <div class="btn-group top-adding-btn">
                        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i>
                            Add Single</a>
                         </div>
                </div>
            </div>

        <!--end breadcrumb-->
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" id="dynamic_form">
                            <span id="result"></span>
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th >Name</th>
                                    <th >Place</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td>
                                        @csrf
                                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->

@endsection



@section('script')


    <script>
        $(document).ready(function(){

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number)
            {
                html = '<tr>';
                html += '<td><input type="text" name="name[]" id="name" placeholder = "Enter Name" class="form-control" /></td>';
                html += '<td><input type="text" name="place[]" id="place" placeholder = "Enter place" class="form-control" /></td>';
                if(number > 1)
                {
                    html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">-</button></td></tr>';
                    $('tbody').append(html);
                }
                else
                {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">+</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
                count--;
                $(this).closest("tr").remove();
            });

            $('#dynamic_form').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:'{{route("admin.dynamic-project.create")}}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $('#save').attr('disabled','disabled');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<p>'+data.error[count]+'</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                        }
                        else
                        {
                            dynamic_field(1);
                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        }
                        $('#save').attr('disabled', false);
                    }
                })
            });

        });
    </script>


@endsection
