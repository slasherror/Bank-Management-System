<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    label {
      display: inline-block;
      width: 200px;
    }
    .table-container {
      margin-top: 50px;
      overflow-y: auto; /* Only vertical scrolling */
    }
    .table {
      width: 100%;
      table-layout: fixed; /* Ensure the table takes up the full width */
    }
    .table thead th, .table tbody td {
      padding: 10px;
      font-size: 14px;
      word-wrap: break-word; /* Break long words for better fit */
      word-break: break-all; /* Ensures long words break to avoid overflow */
    }
    .table thead th {
      background: skyblue;
      color: white;
    }
    .btn {
      font-size: 12px;
      padding: 5px 10px;
    }
    .table th, .table td {
      white-space: normal; /* Allow line breaks */
    }
    /* Set specific widths for each column */
    .col-account-id {
      width: 10%;
    }
    .col-name {
      width: 15%;
    }
    .col-email {
      width: 20%;
    }
    .col-phone {
      width: 15%;
    }
    .col-status {
      width: 10%;
    }
    .col-action {
      width: 10%;
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
    <div class="container">
      <div class="row m-2">
        <form action="" class="col-9">
          <div class="form-group">
            <input style="color:black; background:white" type="search" name="search" id="" value="{{$search}}"
                   class="form-control" placeholder="Search by Account No" aria-describedby="helpId">
          </div>
          <button class="btn btn-primary">Search</button>
          <a href="{{url('customerservice')}}"><button class="btn btn-primary" type="button">Reset</button></a>
        </form>
      </div>
      <div class="table-container">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="col-account-id">Account ID</th>
              <th class="col-name">Name</th>
              <th class="col-email">Email</th>
              <th class="col-phone">Phone</th>
              <th class="col-status">Status</th>
              <th class="col-action">Deposit</th>
              <th class="col-action">Withdraw</th>
              <th class="col-action">Update</th>
              <th class="col-action">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $customer)
              @if($customer->usertype == '0')
                <tr>
                  <td class="col-account-id"><a href="{{url('customerprofile', $customer->id)}}">{{$customer->uid}}</a></td>
                  <td class="col-name"><a href="{{url('customerprofile', $customer->id)}}">{{$customer->name}}</a></td>
                  <td class="col-email">{{$customer->email}}</td>
                  <td class="col-phone">{{$customer->phone}}</td>
                  <td class="col-status">
                    @if($customer->status == 'active')
                      <a href="#"><span>Active</span></a>
                    @else
                      <a href="#"><span>Inactive</span></a>
                    @endif
                  </td>
                  <td class="col-action"><a style="background: green" class="btn btn-primary" href="{{url('deposit', $customer->id)}}">Deposit</a></td>
                  <td class="col-action"><a style="background: aqua" class="btn btn-primary" href="{{url('withdraw', $customer->id)}}">Withdraw</a></td>
                  <td class="col-action"><a class="btn btn-primary" href="{{url('updatecustomer', $customer->id)}}">Update</a></td>
                  <td class="col-action"><a class="btn btn-danger" onclick="return confirm('Are you sure to remove user?')" href="{{url('deletecustomer', $customer->id)}}">Delete</a></td>
                </tr>
              @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    {{-- Body part end --}}
  </div>
</div>

@include('employee.home.script')
@include('sweetalert::alert')
</body>
</html>
