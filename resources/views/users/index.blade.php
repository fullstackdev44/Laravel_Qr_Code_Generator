@extends('layouts.main')

@section('content')

<style type="text/css">
    .dataTables_filter, .pagination{
        float: right;
    }
    .btn-delete{
        background: none;
        border: none;
        margin-left: -5px;
        color: #f74545;
    }
</style>

<div class="container-fluid">
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Users') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table id="customers-list" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($customers as $customer)
                  <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>

                    <a href="{{url('change-password/')}}"><i class="nav-icon fas fa-edit"></i> Change Password</a>

                        <!-- <a href="{{url('customer/edit/'.$customer->id)}}"><i class="nav-icon fas fa-edit"></i></a> -->
                         
                        <!-- <button type="submit" class="btn-delete" data-toggle="modal" data-target="#deleteCustomerModal-{{$customer->id}}"><i class="nav-icon fas fa-trash-alt"></i></button> -->

                         <div class="modal fade" id="deleteCustomerModal-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel-{{$customer->id}}" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCustomerModalLabel-{{$customer->id}}">Customer Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                  <p>Are you sure you want to delete <strong>{{$customer->name}}?</strong></p>
                                  <form method="POST" action="{{url('customer/delete')}}">
                                @csrf
                                <input name="id" type="hidden" value="{{ $customer->id }}"/>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm Delete</button>
                                    </div>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                                  
                                </div>
                              </div>
                            </div>
                     </td>
                    
                    
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>


<script>
  $(function () {
    $("#customers-list").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ["pdf"],
      order: [[0, 'desc']],
    });
  });
</script>
@endsection