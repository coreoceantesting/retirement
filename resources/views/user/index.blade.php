@extends('layouts.admin')

@section('title')
Profile
@endsection

@section('content')
<template>
    <div class="p-0">
        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-users mr-1"></i>
                    Users
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item mr-1">
                            <button class="btn btn-sm btn-primary" @click="createMode"><i class="fas fa-plus-circle"></i> Add New</button>
                        </li>
                  {{-- <li class="nav-item">
                            <div class="input-group mt-0 input-group-sm" style="width: 350px;">
                                <input type="text" name="table_search" v-model="searchWord" class="form-control float-right" placeholder="Search by name, email">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default" @click="search"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body table-responsive table-bordered">
                <table class="table" id="example">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Name</th>
                        <!-- <th>Role</th> -->
                        <th>Email</th>
                        <th>Date Posted</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td> {{ $user->name }}</td>
                            {{--<td>{{ $user->role }}</td>--}}
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->created_at  }}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning" > <i class="fa fa-edit"></i> Edit</button>
                                <button class="btn btn-sm btn-danger" > <i class="fa fa-trash"></i> Delete </button>
                            </td>
                           
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <loading :loading="loading"></loading>--}}
        </div>

    
       
    </div>
</template>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable(); // Replace 'example' with the ID of your table
    });
</script>

