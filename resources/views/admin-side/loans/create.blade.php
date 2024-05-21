@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Loan
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/loans">loans</a></li>
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
                {{--<form role="form" action="{{route('admin.loans.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <input type="number" class="form-control" id="user_id" name="user_id" placeholder="user" required>
                        </div>
                        <div class="form-group">
                            <label for="book_id">Book</label>
                            <input type="number" class="form-control" id="book_id" name="book_id" placeholder="book" required>
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>--}}

                <!-- /.box-header -->
                <form role="form" action="{{route('admin.loans.store')}}" method="post">
                    @csrf
                    <!-- box body -->
                    <div class="box-body">
                        <!-- input table of user id -->
                        <div class="table-container" style="max-height: 200px; overflow-y: scroll">
                            <table id="user-data-table" style="margin: 0; max-height: 100px" class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10%">Select</th>
                                    <th style="width: 15%">Id</th>
                                    <th style="width: 25%">User Name</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $key => $user)
                                    <tr class="user-row">
                                        <td style="text-align: center">
                                            <label>
                                                <input class="form-check-input user-radio" type="radio" value="{{$user->id}}"
                                                       name="user_id" id="user-id-radio{{$key + 1}}" required>
                                            </label>
                                        </td>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--<div class="form-group value-view">
                                <label>User Name</label>
                                <input type="text" style="cursor: default" class="form-control" id="user-selected-value" readonly>
                            </div>--}}
                        </div>

                        <!-- input table of book id -->
                        <div class="table-container" style="margin-top: 30px; max-height: 200px; overflow-y: scroll">
                            <table id="book-data-table" style="margin: 0" class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 10%">Select</th>
                                    <th style="width: 15%">ISBN</th>
                                    <th style="width: 20%">Book Title</th>
                                    <th style="width: 15%">Quantity Available</th>
                                    <th style="width: 15%">Language</th>
                                    <th style="">Edition</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($books as $key => $book)
                                    <tr class="book-row">
                                        <td style="text-align: center;">
                                            <label>
                                                <input class="form-check-input book-radio" type="radio" value="{{$book->id}}"
                                                       name="book_id" id="book-id-radio{{$key + 1}}" required>
                                            </label>
                                        </td>
                                        <td>{{$book->isbn}}</td>
                                        <td>{{$book->title}}</td>
                                        <td>{{$book->quantity_available}}</td>
                                        <td>{{$book->language}}</td>
                                        <td>{{$book->edition}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{--<div class="form-group value-view">
                                <label>Book Title</label>
                                <input type="text" style="cursor: default" class="form-control" id="book-selected-value" readonly>
                            </div>--}}
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div><!-- /.box -->

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


@endsection


@section('footer')
    {{--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        /*var inputValue = document.querySelector('.user-radio').value;*/
        $(document).ready(function() {
            $('#user-data-table').DataTable({
                scrollY: '20vh',
                scrollCollapse: true,
                dom: 'ft',
                language: {
                    search: "User Search: ", // Change the search box label
                    searchPlaceholder: "user name, user id ...", // Change the search box placeholder
                },
            });

            $('#book-data-table').DataTable({
                scrollY: '10vh',
                scrollCollapse: true,
                dom: 'ft',
                language: {
                    search: "Book Search: ", // Change the search box label
                    searchPlaceholder: "isbn, book title ...", // Change the search box placeholder
                },
            });

            // Set the new selected values in the selected-value box
            $('.user-row').click(function() {
                $(this).find('.user-radio').prop('checked', true);
                var userInput = $(this).find('td:nth-child(3)').text();
                $('#user-selected-value').val(userInput);
            });

            $('.book-row').click(function() {
                $(this).find('.book-radio').prop('checked', true);
                var bookInput = $(this).find('td:nth-child(3)').text();
                $('#book-selected-value').val(bookInput);
            });
        });
    </script>
@endsection
