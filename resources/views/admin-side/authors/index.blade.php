@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Authors
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="active">authors</li>
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
                            <th style="width: 10px">ID</th>
                            <th>Name</th>
                            <th style="width: 40px">Show</th>
                            <th style="width: 40px">Edit</th>
                            <th style="width: 40px">Delete</th>
                        </tr>
                        @foreach($authors as $author)
                            <tr class="row-align">
                                <td>{{$author->id}}</td>
                                <td>{{$author->name}}</td>
                                <td><a href="{{route('admin.authors.show', ['id' => $author->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                <td><a href="{{route('admin.authors.edit', ['id' => $author->id])}}" class="btn btn-info btn-sm">Edit</a></td>
                                <td><a href="{{route('admin.authors.delete', ['id' => $author->id])}}" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure, you want to delete the author .!?')">
                                        Delete</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
@endsection
