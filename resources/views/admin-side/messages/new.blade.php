@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                New Messages
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li class="active">messages</li>
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
                            <th style="width: 10px">Id</th>
                            <th>User</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th style="width: 40px">Show</th>
                        </tr>
                        @foreach($messages as $message)
                            @if($message->status == "new")
                                <tr class="row-align">
                                    <td>{{$message->id}}</td>
                                    <td>{{$message->userId->name}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td>{{$message->status}}</td>
                                    <td><a href="{{route('admin.messages.show', ['id' => $message->id])}}" class="btn btn-success btn-sm">Show</a></td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
@endsection
