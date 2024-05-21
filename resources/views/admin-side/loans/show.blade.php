@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Loan
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/loans">loans</a></li>
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
                            <td>{{$loan->id}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">User</th>
                            <td>{{$loan->userId->name}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Book</th>
                            <td>{{$loan->bookId->title}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Due Date</th>
                            <td>{{$loan->due_date}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Return Date</th>
                            <td>{{$loan->return_date}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Status</th>
                            <td>{{$loan->status}}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    @if($loan->status == "pending")
                        <a href="{{route('admin.loans.active', ['id' => $loan->id])}}" class=" btn btn-info btn-sm">Active</a>
                    @elseif($loan->status == "overdue" || $loan->status == "active")
                        <a href="{{route('admin.loans.return', ['id' => $loan->id])}}" class=" btn btn-info btn-sm">Return</a>
                    @endif
                </div>
            </div>
        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->

@endsection

