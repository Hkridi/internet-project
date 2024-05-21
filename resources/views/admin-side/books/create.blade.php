@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Book
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/books">books</a></li>
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
                <form role="form" action="{{route('admin.books.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="title" required>
                        </div>
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="isbn" required>
                        </div>
                        {{--<div class="form-group">
                            <label for="author_id">Author</label>
                            <input type="number" class="form-control" id="author_id" name="author_id" placeholder="author">
                        </div>--}}

                        <div class="form-group" style="width: 100% !important">
                            <label for="author_id">Author Name</label>
                            <select class="form-control select-value" size="3" name="author_id">
                                <option value="{{null}}" selected>Select One...</option>
                                @foreach ($authors as $author)
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="description">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="quantity">
                        </div>
                        <div class="form-group">
                            <label for="language">Language</label>
                            <input type="text" class="form-control" id="language" name="language" placeholder="language">
                        </div>
                        <div class="form-group">
                            <label for="publication_year">Publication Year</label>
                            <input type="number" class="form-control" id="publication_year" name="publication_year" placeholder="publication_year">
                        </div>
                        <div class="form-group">
                            <label for="edition">Edition</label>
                            <input type="number" class="form-control" id="edition" name="edition" placeholder="edition">
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1" selected>Enable</option>
                                <option value="0">Disable</option>
                            </select>
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

        /***** category checkbox *****/
        const noneCheckbox = document.getElementById('noneCheckbox');
        const categoryCheckboxes = document.querySelectorAll('.categoryCheckbox');

        noneCheckbox.addEventListener('change', function () {
            if (this.checked) {
                categoryCheckboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });
            }
        });

        categoryCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (this.checked) {
                    noneCheckbox.checked = false;
                }
            });
        });

        /*function confirm() {
            var checkbox = document.getElementById("default_settings");
            if (checkbox.checked) {
                var confirmation = confirm("Are you sure, you want reset all settings to default !?");
                if (confirmation) {
                    return true; // Proceed with form submission
                } else {
                    checkbox.checked = false; // Uncheck the checkbox
                    return false; // Cancel form submission
                }
            }
        }*/
    </script>
@endsection
