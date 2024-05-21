@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit User
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> dashboard</a></li>
                <li><a href="#">users</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Edit User</h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="{{route('admin.users.update', ['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                        </div>
                        {{--<div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{ $user->password }}" required>
                        </div>--}}

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="member" {{$user->role == 'member' ? 'selected' : ''}}>Member</option>
                                <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="none" {{$user->gender == 'none' ? 'selected' : ''}}>Select</option>
                                <option value="male" {{$user->gender == 'male' ? 'selected' : ''}}>Male</option>
                                <option value="female" {{$user->gender == 'female' ? 'selected' : ''}}>Female</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


@endsection
