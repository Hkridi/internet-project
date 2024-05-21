@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pending Loans
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="active">loans</li>
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
                            <th>User</th>
                            <th>Status</th>
                            <th style="width: 40px">Show</th>
                            <th style="width: 40px">Active</th>
                            <th style="width: 40px">Reject</th>
                        </tr>
                        @foreach($loans as $loan)
                            @if($loan->status == "pending")
                                <tr class="row-align">
                                    <td>{{$loan->id}}</td>
                                    <td>{{$loan->user_id}}</td>
                                    <td>{{$loan->status}}</td>
                                    <td><a href="{{route('admin.loans.show', ['id' => $loan->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                    <td><a href="{{route('admin.loans.active', ['id' => $loan->id])}}" class="btn btn-info btn-sm">Active</a></td>
                                    <td><a href="{{route('admin.loans.reject', ['id' => $loan->id])}}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure, you want to reject the book .!?')">
                                            Reject</a></td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
@endsection
