@extends('layouts.admin-layout')

@section('title', 'AdminPanel')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Message
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>dashboard</a></li>
                <li><a href="/admin/messages">messages</a></li>
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
                            <td>{{$message->id}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">User</th>
                            <td>{{$message->userId->name}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Subject</th>
                            <td>{{$message->subject}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Message</th>
                            <td>{{$message->message}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Reply</th>
                            <td>{{$message->reply}}</td>
                        </tr>
                        <tr>
                            <th style="width: 150px">Status</th>
                            <td>{{$message->status}}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="box-header bg-info">
                        <form role="form" action="{{route('admin.messages.update', ['id' => $message->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="reply">Reply</label>
                                <textarea class="form-control" style="resize: none" id="reply" name="reply">{{$message->reply}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Reply</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
