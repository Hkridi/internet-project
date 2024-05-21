@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Loan
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/loans">loans</a></li>
                <li class="active">Edit</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->

                <!-- form start -->
                <form role="form" action="{{route('admin.loans.update', ['id' => $loan->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" value="{{$loan->user_id}}" required>
                        </div>
                        <div class="form-group">
                            <label for="book_id">Book</label>
                            <input type="text" class="form-control" id="book_id" name="book_id" value="{{$loan->book_id}}" required>
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
