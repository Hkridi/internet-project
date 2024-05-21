@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Author
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/authors">authors</a></li>
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
                <form role="form" action="{{route('admin.authors.update', ['id' => $author->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$author->name}}" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="birth">Birth</label>
                                    <input type="number" class="form-control" id="birth" name="birth"  value="{{$author->birth}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="death">Death</label>
                                    <input type="number" class="form-control" id="death" name="death"  value="{{$author->death}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <input type="text" class="form-control" id="bio" name="bio" value="{{$author->bio}}">
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
