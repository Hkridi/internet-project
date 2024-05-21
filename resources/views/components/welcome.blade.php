
<style>
    .rejected-loan {
        font-weight: bold;
        color: purple;
    }
    .returned-loan {
        font-weight: bold;
        color: grey;
    }
    .overdue-loan {
        font-weight: bold;
        color: red;
    }
    .active-loan {
        font-weight: bold;
        color: green;
    }
    .pending-loan {
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
    <h1 class="mt-8 text-2xl font-medium text-gray-900"><b>Loans</b> List</h1>
    <div class="grid md:grid-cols-1 p-6">

        <table style="margin: 0" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Status</th>
                <th>Due Date</th>
                <th>Return Date</th>
                <th>Book Title</th>
            </tr>
            </thead>
            <tbody>
            @if(Auth::user()->getLoans()->count() > 0)
                @foreach(Auth::user()->pendingLoans() as $loan)
                    <tr>
                        @if($loan->status == "pending")
                            <td class="pending-loan">{{$loan->status}}</td>
                            <td>{{$loan->due_date}}</td>
                            <td>{{$loan->return_date}}</td>
                            {{--<td>{{$loan->bookId->title}}</td>--}}
                            <td>{{$loan->bookId->title}}</td>
                        @endif
                    </tr>
                @endforeach
                @foreach(Auth::user()->activeLoans() as $loan)
                    <tr>
                        @if($loan->status == "active")
                            <td class="active-loan">{{$loan->status}}</td>
                            <td>{{$loan->due_date}}</td>
                            <td>{{$loan->return_date}}</td>
                            <td>{{$loan->bookId->title}}</td>
                        @endif
                    </tr>
                @endforeach
                @foreach(Auth::user()->overdueLoans() as $loan)
                    <tr>
                        @if($loan->status == "overdue")
                            <td class="overdue-loan">{{$loan->status}}</td>
                            <td>{{$loan->due_date}}</td>
                            <td>{{$loan->return_date}}</td>
                            <td>{{$loan->bookId->title}}</td>
                        @endif
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

<div class="flex justify-between p-6 lg:p-8 bg-white border-b border-gray-200">
    <a href="{{route('loans-history')}}" style="color: blue;">Loans history ...</a>
    <button class="btn btn-success"><a href="{{route('new-loan')}}">New Loan</a></button>
</div>
