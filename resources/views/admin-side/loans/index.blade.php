@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                All Loans
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
                            <th style="width: 40px">Return</th>
                        </tr>
                        @foreach($loans as $loan)
                            <tr class="row-align">
                                <td>{{$loan->id}}</td>
                                <td>{{$loan->userId->name}}</td>
                                <td>{{$loan->status}}</td>
                                <td><a href="{{route('admin.loans.show', ['id' => $loan->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                @if($loan->status == "pending")
                                    <td><a href="{{route('admin.loans.active', ['id' => $loan->id])}}" class="btn btn-info btn-sm">Active</a></td>
                                @else
                                    <td><a disabled href="{{route('admin.loans.active', ['id' => $loan->id])}}" class="btn btn-info btn-sm">Active</a></td>
                                @endif

                                @if($loan->status == "pending")
                                    <td><a href="{{route('admin.loans.reject', ['id' => $loan->id])}}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure, you want to reject the book .!?')">
                                            Reject</a></td>
                                @else
                                    <td><a disabled href="{{route('admin.loans.reject', ['id' => $loan->id])}}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure, you want to reject the book .!?')">
                                            Reject</a></td>
                                @endif

                                @if($loan->status == "active" || $loan->status == "overdue")
                                    <td><a href="{{route('admin.loans.return', ['id' => $loan->id])}}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure, you want to return the book .!?')">
                                            Return</a></td>
                                @else
                                    <td><a disabled href="{{route('admin.loans.return', ['id' => $loan->id])}}" class="btn btn-danger btn-sm"
                                           onclick="return confirm('Are you sure, you want to return the book .!?')">
                                            Return</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
@endsection
