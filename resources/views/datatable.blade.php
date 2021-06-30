@extends('layout')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with minimal features & hover style</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="country_table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Country Id</th>
                                    <th>Country name</th>
                                    <th>Code </th>
                                    <th>Code 2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url: "get-table-data",
            success: function(data) {
                // console.log(data);
                $('#country_table').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                    "aaData": data,
                    "columns": [
                        {
                            "data" : "country_id",
                            
                        },
                        {
                            "data" : "name"
                        },
                        {
                            "data" : "iso_code_2",
                            "render" : function(data,type,row){
                                if(data =="AF"){
                                    return '<small class="label text-success">' + data + '</small>';
                                }
                                else{
                                    return '<small class="label text-danger">' + data + '</small>'; 
                                }
                            }
                        },
                        {
                            "data" : "iso_code_3"
                        },
                        {
                            "data" : null,
                            "render" : function(data,type,row){
                                console.log(type);
                                return '<button class="btn btn-primary btn-xs">' + row.iso_code_2 +'</button>';
                            }
                        }
                    ] 
                });
            }

        });

    });
</script>

@endsection