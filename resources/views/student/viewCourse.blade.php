@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{url('student')}}" >< Back</a>
            <div class="card">
                <div class="card-header">
                  <div class=" row">
                      <div class="col-6 col-sm-8 col-md-9">
                        <span>  <h3>{{$course->title}}</h3><small>{{$uni->name}}</small></span>
                      </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center">
                          <button type="button" class="btn btn-success text-white apt-time" id="9" value="9" data-toggle="modal" data-target="#Modal">Join Course</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                  <table id="table" name="table" class="display">
                      <thead>
                          <tr>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Module Leader</th>
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ConfirmationModalLabel">Confirm Course Access Key</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('student/courses/join') }}">
        @csrf
        <input id="courseId" name="courseId" type="hidden" value="{{$course->id}}">
      <div class="modal-body">
            <div class="form-group row">
                <label for="key" class="col-md-4 col-form-label text-md-right">{{ __(' Access Key:') }}</label>
                <div class="col-md-6">
                    <input id="key" type="text" class="form-control{{ $errors->has('key') ? ' is-invalid' : '' }}" name="key" value="{{ old('key') }}" required autocomplete="key" autofocus>

                    @if ($errors->has('key'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('key') }}</strong>
                        </span>
                    @endif
                </div>

            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" id="submitBtn">Confirm</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('js_includes')
<script type="text/javascript">
    var tableData = {!!json_encode($modules) !!};

    $(function(){
      $.noConflict();
      console.log(tableData);
      formTable(tableData);
    });
    function formTable( tableData){


        $('#table').DataTable({
                data: tableData,
                order: [ 0, 'desc' ],
                columns:  [
                  { title: "Title" },
                  { title: "Description" },
                  { title: "Module Leader" },
                ]
        });
    }


 </script>
@endsection
