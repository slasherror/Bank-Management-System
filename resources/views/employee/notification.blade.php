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
    <div class="row py-4">
      <div class="col-md-6">
        <form action="{{ route('notifications.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="notification">Write Notification</label>
                <input type="text" class="form-control" name="notification" id="notification" />
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save</button>
        </form>
      </div>
    </div>
      <div class="row m-2">

        <div class="col-3" style="height: 400px; width: 800px;">
          <table class="table">
            <thead>
            <tr>
              <th>From Account</th>
              <th>Message</th>
              <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($notifications as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->data}}</td>
                    <!-- Button button -->
                  <td>
                    <form action="{{ route('notifications.delete', $data->id) }}" method="POST" onsubmit="return confirm('Are you sure to delete notifications?')">
                      @csrf
                      @method('POST')
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  </td>
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
</body>
</html>
