
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
    <h1 class="mt-8 text-2xl font-medium text-gray-900"><b>Messages</b> List</h1>
    <div class="grid md:grid-cols-1 p-6">
        <form role="form" action="{{route('new-message-store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="subject">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <input type="text" class="form-control" id="message" name="message" placeholder="message" required>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>

{{--<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <a href="#" style="color: blue;">Loans history ...</a>
</div>--}}
