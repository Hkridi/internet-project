
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
</style>

{{-- bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8 --}}
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900"><b>New</b> Loan</h1>
    <div class="grid md:grid-cols-1 p-6">
        <form role="form" action="{{route('new-loan-store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                {{--<div class="form-group">
                    <label for="book_id">Book</label>
                    <input type="number" class="form-control" id="book_id" name="book_id" placeholder="book" required>
                </div>--}}
                <!-- input table of book id -->
                <div class="table-container" style="margin-top: 10px; max-height: 40vh; overflow-y: scroll;">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10%">#</th>
                            <th style="width: 15%">ISBN</th>
                            <th style="width: 75%">Book Title</th>
                        </tr>
                        </thead>
                        <tbody style="overflow-y: auto;">
                        @foreach($books as $book)
                            <tr>
                                <td>
                                    <input type="radio" name="book_id" value="{{ $book->id }}">
                                </td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->title }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer" style="margin-top: 30px">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>


