@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/categories">categories</a></li>
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
                <form role="form" action="{{route('admin.categories.update', ['id' => $category->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$category->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent Category</label>
                            <input type="number" class="form-control" id="parent_id" name="parent_id" value="{{$category->parent_id}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$category->description}}">
                        </div>
                        <div class="form-group">
                            <label for="keywords">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords" value="{{$category->keywords}}">
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
