
<style>
    .replied-message {
        font-weight: bold;
        color: grey;
    }
    .new-message {
        font-weight: bold;
        color: green;
    }
    .read-message {
        font-weight: bold;
        color: orange;
    }
    tbody tr td {
        text-align: center;
        padding-bottom: 10px;
    }
    thead tr th {
        text-align: center;
        padding-bottom: 15px;
    }
    button a {
        text-decoration: none;
        color: white;
    }
    button a:hover {
        text-decoration: none;
        color: white;
    }
</style>

{{-- bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 --}}

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900"><b>Messages</b> List</h1>
    <div class="grid md:grid-cols-1 p-6">

        <table style="margin: 0" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Status</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Reply</th>
            </tr>
            </thead>
            <tbody>
            @if(Auth::user()->getMessages()->count() > 0)
                @foreach(Auth::user()->getMessages() as $loan)
                    <tr>
                        @if($loan->status == "new")
                            <td class="new-message">{{$loan->status}}</td>
                            <td>{{$loan->subject}}</td>
                            <td>{{$loan->message}}</td>
                            <td>{{$loan->reply}}</td>
                        @endif
                    </tr>
                @endforeach
                @foreach(Auth::user()->getMessages() as $loan)
                    <tr>
                        @if($loan->status == "read")
                            <td class="read-message">{{$loan->status}}</td>
                            <td>{{$loan->subject}}</td>
                            <td>{{$loan->message}}</td>
                            <td>{{$loan->reply}}</td>
                        @endif
                    </tr>
                @endforeach
                @foreach(Auth::user()->getMessages() as $loan)
                    <tr>
                        @if($loan->status == "replied")
                            <td class="replied-message">{{$loan->status}}</td>
                            <td>{{$loan->subject}}</td>
                            <td>{{$loan->message}}</td>
                            <td>{{$loan->reply}}</td>
                        @endif
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

<div class="flex justify-between p-6 lg:p-8 bg-white border-b border-gray-200">
    <a href="#" style="color: blue;"></a>
    <button class="btn btn-success"><a href="{{route('new-message')}}">New Message</a></button>
</div>
{{--<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <a href="#" style="color: blue;">Loans history ...</a>
</div>--}}
