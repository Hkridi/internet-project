@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Book
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/books">books</a></li>
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
                            <td>{{$book->id}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Title</th>
                            <td>{{$book->title}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">ISBN</th>
                            <td>{{$book->isbn}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Author</th>
                            <td>
                                @if ($book->authorId)
                                    {{$book->authorId->name}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Description</th>
                            <td>{{$book->description}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Quantity</th>
                            <td>{{$book->quantity}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Language</th>
                            <td>{{$book->language}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Publication Year</th>
                            <td>{{$book->publication_year}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Edition</th>
                            <td>{{$book->edition}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Status</th>
                            @if($book->status == 1)
                                <td>Enable</td>
                            @else
                                <td>Disable</td>
                            @endif
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="{{route('admin.books.edit', ['id' => $book->id])}}" class=" btn btn-info btn-sm">Edit</a>
                </div>
            </div>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


@endsection
