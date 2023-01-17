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

                    @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

            @foreach ($data as $key => $showdatas)
              <h3 class="card-title">Date: {{$key}}</h3>
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
                <span style="display:none;">{{$a=1}}</span>
                @foreach($showdatas as $showdata)
                  <tr>
                    <td>{{$showdata->number}}</td>
                    <td>  <img width="60" src="{{$showdata->title}}"> &nbsp;
                        <a target="_blank" href="{{$showdata->title}}">view</a>
                    </td>
                    <td><a target="_blank" href="{{$showdata->filename}}">view PDF file</a></td>
                    <td>{{$a}}</td>
                    <td><a onclick="return confirm('Are You Sure!')" href="/qr/delete/{{$showdata->id}}">X</a></td>
                  </tr>
                  <span style="display:none;">{{$a++}}</span>
                @endforeach
                  
                </tbody>

                </table>
              </div>
              @endforeach

              <div class="d-flex justify-content-center">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')


@endsection



