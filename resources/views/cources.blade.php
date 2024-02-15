@extends('layout/app')
@section("contents") 
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card" >
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" id="search"  name="search" value="{{ isset($_REQUEST['search'])?$_REQUEST['search']:''}}" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                                </button>
                            </div> &nbsp;
                            <select class="custom-select" name="shorting" id="shorting">
                                <option value='desc' >DESC</option>
                                <option value='asc' >ASC</option> 
                            </select>
                        </div>
                    </div>
                </div>  
            <div id="tableData" >
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Topic</th>
                            <th width="100">Price Range</th>
                            <th>Speakers</th>
                            <th width="100">Created ON</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->name}}</td>
                            <td>{{$course->topic->name}}</td> 
                            <td>{{$course->price_range}}</td>
                            <td>
                                @foreach($course->Speakers as $Speaker)
                                    <span class="float-right badge bg-success">
                                        {{$Speaker->name}}
                                    </span> 
                                @endforeach
                            </td>
                            <td>{{$course->created_at}}</td>

                            
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination m-0 float-right">
                    {{ $courses->links() }}
                </ul>
            </div> 
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>


@endsection

@section('customScript')
<script>
    $("#filterForm input, #shorting, #search").change(function(event){
        event.preventDefault();
        $.ajax({
            url: "{{route('cources.filter')}}",
            method : "GET",
            data: $("#filterForm").serializeArray().concat([
                { name: 'short', value: $("#shorting").val() },
                { name: 'search', value: $("#search").val() }
            ]),      
            dataType: "html",
            success: function(response) {
                $('#tableData').html(response); 
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Function to handle pagination
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        const page = $(this).attr('href').split('page=')[1];
        $.ajax({
            url: "{{route('cources.filter')}}",
            method: "GET",
            data: $("#filterForm").serializeArray().concat({name: 'page', value: page}),
            dataType: "html",
            success: function(response) {
                $('#tableData').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>
@endsection
