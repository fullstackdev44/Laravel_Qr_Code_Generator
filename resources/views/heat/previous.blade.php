@extends('layouts.main')

@section('content')
<div class="container-fluid">
  <br>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Previous QR codes') }} 
                <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">Add New QR Code
                </button> -->
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

            <div class="">
              
              <div class="card-body">
                <table class="table table-bordered table-striped datatables">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>QR Codes</th>
                  </tr>
                  </thead>
                <tbody>

                @foreach($getdate as $showdata)

                  <tr>
                    <td>{{$showdata->date}}</td>
                    <td> 
                    <!-- data-target="#modal-lg" -->
                      <button type="button" class="btn btn-default getrecord" data-hdate="{{$showdata->date}}" data-toggle="modal" >View
                      </button>
                    </td>
                  </tr>

                @endforeach
                

                  
                </tbody>

                </table>

                <div class="d-flex justify-content-center">
                    {{ $getdate->links('pagination::bootstrap-4') }}
                </div>
                
              </div>
              <!-- /.card-body -->
            </div>

                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden"class="" name="token" value="663WzofOWNLEDviBmggNhHXx3OZQ5WNBFcdqs4FG">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

$( document ).ready(function() {
  $( '.getrecord' ).click(function() {
    date  = $(this).attr('data-hdate');
    token = $('.token').val();
    $('.sendData').html('');
    $.ajax({
      url: 'getbydate',
      type: 'POST',
      data: {'bydate' : date,'getrecord':'getbydate',"_token": "{{ csrf_token() }}",},
      dataType: "json",
      success: function(res){
        $.each( res, function( key, value ) {
        console.log(value);
          $('.mydate').html(date);
          $('.sendData').append('<li>Heat No. '+value.number+' <a href="/'+value.title+'">view QR Code</a> | <a href="/'+value.filename+'">View File</a></li>');
          $('#modal-lg').modal('show');
        });
      }
    });
  });
});

</script>

<div class="modal fade" id="modal-lg">
        <div class="modal-dialog">
          <form>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">All QR Codes on <span class="mydate"></span></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card-body">
                  <ul class="sendData">
                  </ul>

                </div>
            </div>
            <div class="modal-footer justify-content-right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#currentDate').val(today);
  });
</script>

@endsection



