@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/categories">categories</a></li>
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
                            <td>{{$category->id}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Title</th>
                            <td>{{$category->title}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Parent Category</th>
                            <td>
                                @if ($category->categoryId)
                                    {{\App\Http\Controllers\admin\CategoryController::parentTree($category, $category->title)}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Description</th>
                            <td>{{$category->description}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Keywords</th>
                            <td>{{$category->keywords}}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="{{route('admin.categories.edit', ['id' => $category->id])}}" class=" btn btn-info btn-sm">Edit</a>
                </div>
            </div>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


@endsection
