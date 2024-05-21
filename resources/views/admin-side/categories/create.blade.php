@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/categories">categories</a></li>
                <li class="active">new</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="title" required>
                        </div>
                        {{--<div class="form-group">
                            <label for="parent_id">Parent Category</label>
                            <input type="number" class="form-control" id="parent_id" name="parent_id" placeholder="parent category">
                        </div>--}}
                        <div class="form-group" style="width: 100% !important">
                            <label for="parent_id">Parent Category</label>
                            <select class="form-control select-value" size="3" name="parent_id">
                                <option value="{{null}}" selected>Select One...</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{\App\Http\Controllers\admin\CategoryController::parentTree($category, $category->title)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keywords">keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords" placeholder="keywords">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="description">
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div><!-- /.box -->

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


@endsection

@section('footer')
    <!-- Add jQuery and Bootstrap JavaScript -->
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
    <!-- Add Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-value').select2();

            $('#searchForm').submit(function(e) {
                e.preventDefault();
                var searchTerm = $('#searchInput').val();
                $('.select-value').val(null).trigger('change'); // Clear previous selection
                $('.select-value').select2('open');
                $('.select2-search__field').val(searchTerm);
            });
        });
    </script>
@endsection
