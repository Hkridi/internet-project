@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Users
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Name</th>
                            <th>email</th>
                            <th>role</th>
                            <th style="width: 40px">Show</th>
                            <th style="width: 40px">Edit</th>
                            <th style="width: 40px">Delete</th>
                        </tr>
                        @foreach($users as $user)
                            <tr class="row-align">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>

                                <td><a href="{{route('admin.users.show', ['id' => $user->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                <td><a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                <td><a href="{{route('admin.users.delete', ['id' => $user->id])}}" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure, you want to delete the user: {{$user->name}} .!?')">
                                        Delete</a>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
                {{--<div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>--}}
            </div><!-- /.box -->

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
@endsection
