<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4><h5><span id="app_id"> </span> </h5>
            </div>
            <div class="modal-body">
                <form id="assignForm" name="assignForm" class="form-horizontal">
                   <input type="hidden" name="application_id" id="application_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Assign-To</label>
                        <div class="col-sm-12">
                    <select   class="form-control select2bs4" style="width: 300px;"    name="user_id" id="user_id" required >
                         @foreach ($dataa as $key => $user)
                            @if(!empty($user->getRoleNames())) 
                            @foreach($user->getRoleNames() as $v)
                             @if($v=='Assessor')
                             <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->middle_name }}</option>
                          
                             @endif
                             @endforeach
                            @endif
                            @endforeach 
                            </select>


                        </div>
                    </div>
     
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Assginment Date</label>
                        <div class="col-sm-12">
                       <input id="AssignmentDate" name="AssignmentDate" required=""  readonly value="@php $t=time(); echo date("Y-m-d",$t); @endphp"  class="form-control"></textarea>
                        </div>
                    </div>
      
                    <div class="col-md-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveAssign" value="create">Assign Changes 
                     </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>









<script type="text/javascript">
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });



    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('un-assignment.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'application_number', name: 'application_number','visible': false},
            {data: 'application_status', name:'application_status'},
            {data: 'product_trade_name', name:'product_trade_name'},
            {data: 'fullname', name:'fullname'},
            {data: 'trade_name', name:'trade_name'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ]
    });


    
    $('#createNewBook').click(function () {
        alert("hellow Eyoba");
        $('#saveAssign').val("create-book");
        $('#application_id').val('');
        $('#assignForm').trigger("reset");
        $('#modelHeading').html("Create New Book");
        $('#ajaxModel').modal('show');
    });



    $('body').on('click', '.editAssign', function () {
      var application_number = $(this).data('id');
    //   $.get("{{ route('assignment.index') }}" +'/' + application_number +'/edit', function (data) {
          $('#modelHeading').html("Assigning To");
          $('#app_id').html(application_number);
          $('#saveAssign').val("Assign");
          $('#ajaxModel').modal('show');
        //   $('#application_id').val(data.id);
        //   $('#title').val(data.title);
        //   $('#author').val(data.author);
    //   })
   });
   


   
    $('#saveAssign').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
        var assigned_To = document.getElementById('user_id').value;
        var assigned_By = document.getElementById('user_idd').innerHTML;
        var application_id = document.getElementById('app_id').innerHTML;


        $.ajax({
        //   data: $('#assignForm').serialize(),
        data:{      assigned_To:assigned_To,
                    assigned_By:assigned_By,
                    application_id:application_id,
                              },
          url: "{{ route('assignment.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
   
              $('#assignForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveAssign').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteBook', function () {
     
        var application_id = $(this).data("id");
        {if(confirm("Are You sure You Want To Delete This File")){}else{return false;}}
        $.ajax({
            type: "DELETE",
            url: "{{ route('books.store') }}"+'/'+application_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>