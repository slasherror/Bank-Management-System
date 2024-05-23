<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    label {
      display: inline-block;
      width: 200px;
    }

  </style>
  @include('employee.home.css')
</head>
<body>
<div class="container-scroller">
  <div class="row p-0 m-0 proBanner" id="proBanner">
    <!-- Pro Banner HTML code goes here -->
  </div>

  @include('employee.home.sidebar')
  @include('employee.home.navbar')

  {{-- Body part start --}}

  <div class="container-fluid page-body-wrapper">

    <div class="container" style="margin-top: 50px">
      <div class="row m-2">

        <div class="col-3" style="height: 400px; width: 800px;">
          <table class="table">
            <thead>
            <tr>
              <th>From Account</th>
              <th>Name</th>
              <th>Email</th>
              <th>Subject</th>
              <th>Reason</th>
              <th>Date</th>
              <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($feedback as $data)
                <tr>
                  <td>{{$data->from}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->subject}}</td>
                  <td>{{$data->reason}}</td>
                  <td>{{$data->date}}</td>
                  
                  <td>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$data->id}}" data-bs-whatever="@mdo">
                        Reply
                    </button>
                  </td>
                    <!-- Button button -->
                  <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete feedback?')" href="{{url('deletefeedback',$data->id)}}">Delete</a></td>
                </tr>
              
            @endforeach
            </tbody>
          </table>
        </div>
      </div>

    {{-- Body part end --}}

    @include('employee.home.script')
    @include('sweetalert::alert')
  </div>
</div>
@foreach($feedback as $data)
<div class="modal fade" id="exampleModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$data->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$data->id}}">Reply to {{$data->name}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save-replay') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control text-dark" id="recipient-name" name="recipient" value="{{$data->email}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control text-white" id="message-text" name="message" rows="5" required></textarea>
                    </div>
                    <input type="hidden" name="feedback_id" value="{{$data->id}}">
                    <input type="hidden" name="user_id" value="{{$data->from}}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
</body>
</html>
