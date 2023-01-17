@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Previous QR Codes') }} 
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
              <div class="">
                <h3 class="card-title">Date: 1/10/2022</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped datatables">
                  <thead>
                  <tr>
                    <th>Heat Number</th>
                    <th>QR Code</th>
                    <th>Testing Report</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td></td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  
                </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>


   

                


                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <form>
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Generate New QR</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="card-body">
                  <div class="form-group">
                    <label for="heatNumber">Heat Number</label>
                    <input type="number" class="form-control" id="heatNumber" placeholder="Heat number">
                  </div>
                  <div class="form-group">
                    <label for="currentDate">Date</label>
                    <input type="date" class="form-control" id="currentDate">
                  </div>
                  <div class="form-group">
                    <label for="testingReportFile">Testing Report (PDF file)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="testingReportFile">
                        <label class="custom-file-label" for="testingReportFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Generate QR</button>
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



