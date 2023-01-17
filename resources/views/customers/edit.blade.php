@extends('layouts.main')

@section('content')

<div class="container-fluid">
  <br>
    <div class="row">  <!-- justify-content-center -->
        <div class="col-md-6">
            <div class="card">

                <div class="card-header">{{ __('Edit customer details') }}</div>

                <div class="card-body">
                      <form method="POST" action="{{ route('customer/update') }}">
                        
                <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{$customer->name}}" required>
                      </div>
                   </div>   
                  
                 </div>
                  
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" class="form-control" name="company"  value="{{$customer->company}}">
                  </div>
                  </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" name="phone" value="{{$customer->phone}}">
                          </div>
                      </div>
                      
                  </div>
                  
             <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="address">Full Address</label>
                    <input type="text" class="form-control" name="address" value="{{$customer->address}}">
                  </div>
               </div>
              </div>

              <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <input name="id" type="hidden" value="{{ $customer->id }}"/>
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </div>
              </div>
          </div>
                <!-- /.card-body -->
                
                
                
              </form>
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["pdf"]
    });
  });
</script>
@endsection