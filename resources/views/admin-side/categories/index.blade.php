@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Categories
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="active">categories</li>
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
                            <th>Title</th>
                            <th style="width: 40px">Show</th>
                            <th style="width: 40px">Edit</th>
                            <th style="width: 40px">Delete</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr class="row-align">
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>

                                <td><a href="{{route('admin.categories.show', ['id' => $category->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                <td><a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                <td><a href="{{route('admin.categories.delete', ['id' => $category->id])}}" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure, you want to delete the category .!?')">
                                        Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
@endsection
