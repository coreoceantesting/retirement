@extends('layouts.admin')

@section('title')
Profile
@endsection

@section('content')

    <div class="p-0">
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title"><i class="fas fa-users mr-1"></i>
                    Personal Detail
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item mr-1">
                            <a href="{{ route('personaldetail.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Add New</a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.card-header -->
            
            <div class="card-body table-responsive table-bordered">
                <table class="table" id="example">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Name</th>
                        <!-- <th>Email</th> -->
                        <th>Mobile No</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($personaldetail as $detail)
                        <tr>
                            <td>{{ $detail->id }}</td>
                            <td>{{ $detail->first_name .'-'.$detail->last_name }}</td>
                            <!-- <td>{{ $detail->email }}</td> -->
                            <td>{{ $detail->mobile_no  }}</td>
                            <td>
                                {{-- <button class="btn btn-sm btn-info" > <i class="fa fa-eye"></i> View</button> --}}
                                <a href="{{route('personaldetail.edit',$detail->id)}}" class="btn btn-sm btn-warning" > <i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-sm btn-danger" > <i class="fa fa-trash"></i> Delete </button>
                            </td>
                        </tr>
                         @endforeach 
                    </tbody>
                </table>
            </div>
        </div>

    
       
    </div>

@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable(); // Replace 'example' with the ID of your table
    });
</script>

