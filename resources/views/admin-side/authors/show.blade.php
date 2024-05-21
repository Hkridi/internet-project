@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Author
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/authors">authors</a></li>
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
                            <th style="width: 150px">ID</th>
                            <td>{{$author->id}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Name</th>
                            <td>{{$author->name}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Birth - Death</th>
                            <td>{{$author->birth}} - {{$author->death}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Bio</th>
                            <td>{{$author->bio}}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="{{route('admin.authors.edit', ['id' => $author->id])}}" class=" btn btn-info btn-sm">Edit</a>
                </div>
            </div>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

@endsection

