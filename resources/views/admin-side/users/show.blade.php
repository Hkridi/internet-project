@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
                <li><a href="#">users</a></li>
                <li class="active">show</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box ">
                <!-- box-header -->
                <div class="box-header">
                    <h3 class="box-title">Information</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body padding">
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th style="width: 150px">Id</th>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Name</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Role</th>
                            <td>{{$user->role}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Gender</th>
                            <td>{{$user->gender}}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="{{route('admin.users.edit', ['id' => $user->id])}}" class=" btn btn-info btn-sm">Edit</a>
                </div>
            </div>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


@endsection
