@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class=" row">
                      <div class="col-6 col-sm-8 col-md-9">
                          <h3>Courses</h3>
                      </div>
                        <div class="col-6 col-sm-4 col-md-3 text-center">
                          <a href="{{url('admin/courses/add')}}" class="btn btn-link" role="button">Add Course</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                  <table id="table" name="table" class="display">
                      <thead>
                          <tr>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Course Leader</th>
                              <th></th>
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
@endsection

@section('js_includes')
<script type="text/javascript">
    var tableData = {!!json_encode($courses) !!};

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
                  { title: "Course Leader" },
                  { title: " ",
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                          //console.log(oData[4]);
                          $(nTd).html("<a href='/admin/courses/edit?courseId="+oData[3]+"'>Edit</a>");
                        }
                  },
                ]
        });
    }

// $(".refund").on("click", function(){
//         return confirm("Are you sure you want to refund this customer?");
//     });



// var r = $(".refund_id").value();
// console.log(r);

// $("document").ready(function(){
//   if( r !== null ){
//     $("td").addClass('table-danger');
//     $("#refund_id").show();
//   };
// });
// </script>
@endsection
