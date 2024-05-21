@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Book
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/books">books</a></li>
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
                <form role="form" action="{{route('admin.books.update', ['id' => $book->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$book->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" value="{{$book->isbn}}" required>
                        </div>
                        <div class="form-group">
                            <label for="author_id">Author</label>
                            <input type="number" class="form-control" id="author_id" name="author_id" value="{{$book->author_id}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{$book->description}}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{$book->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" id="language" name="language" value="{{$book->language}}">
                        </div>
                        <div class="form-group">
                            <label for="publication_year">Publication Year</label>
                            <input type="number" class="form-control" id="publication_year" name="publication_year" value="{{$book->publication_year}}">
                        </div>
                        <div class="form-group">
                            <label for="edition">Edition</label>
                            <input type="number" class="form-control" id="edition" name="edition" value="{{$book->edition}}">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1" {{$book->status == '1' ? 'selected' : ''}}>Enable</option>
                                <option value="0" {{$book->status == '0' ? 'selected' : ''}}>Disable</option>
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
