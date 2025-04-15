


<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">

<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

<script rel="javascript" src="{{ asset('plugins/toastr/toastr.min.js')}}" ></script>
<script rel="javascript" src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}" ></script>

<div  class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <input type="hidden" value="{{ Auth::user()->id }}" id="user_id" />
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
    <form id="bookForm"    enctype="multipart/form-data"  action="{{ route('receipts.store') }}" method="POST" name="bookForm" class="form-horizontal"   >
              @csrf
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                   <label class="col-sm-2 control-label">Generated InvoiceNmber</label>
                   <div class="col-sm-12">

                
                   <input id="invoice_number" name="invoice_number" required placeholder="InvoiceNumber" class="form-control"  type="text" readonly>                        </div>


                   </div>
                   

                        <div class="form-group">
                        <label class="col-sm-2 control-label">Receipt Number</label>
                        <div class="col-sm-12">
                        <input id="receipt_number" name="receipt_number" required placeholder="Receipt Number" class="form-control"  type="text">                        </div>
                        </div>

<!--
                        <div class="form-group">
                        <label class="col-sm-2 control-label">Amount</label>
                        <div class="col-sm-12">
                        <input id="amount" name="amount" required placeholder="Amount" class="form-control"  type="text" >                        </div>
                        </div>
                         
-->
                         <div class="form-group">
                        <label class="col-sm-2 control-label">Received Date</label>
                        <div class="col-sm-12">
                        <input id="date" name="receipt_data" required placeholder="Date" class="form-control"  type="text" value="@php $t=time(); echo date("Y-m-d",$t); @endphp"  readonly >                        </div>
                        </div>

                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"> Description </label>
                        <div class="col-sm-12">
                            <textarea id="description" name="description" required placeholder="Description" class="form-control"></textarea>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="col-sm-2 control-label"> Receipt File </label>
                        <div class="col-sm-12">
                            <input  id="receipt_file" type="file" name="file" required placeholder="File" class="form-control" >
                        </div>
                    </div>
                    
                    <div class="col-sm-6 pull-right">
                  <img id="preview-image" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                        alt="preview image" style="max-height: 250px;">
                </div>
                  <br><br>


                    

      
                    <div class="col-md-offset-2 col-sm-10">
                     <button style="display:block"  type="submit" class="btn btn-primary"  id="saveBtn" value="create">Save changes
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
        ajax: "{{ route('receipts.received') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'id', name: 'id','visible': false},
            {data: 'application_id', name: 'application_id','visible': false},
            {data: 'receipt_number', name: 'receipt_number'},
            {data: 'invoice_number', name: 'invoice_number','visible': true},
            {data: 'amount', name: 'amount'},
            {data: 'date', name: 'date'},
            {data: 'Receipt_Date', name: 'Receipt_Date'},
            {data: 'path', name: 'path','visible':false},
            {data: 'path', name: 'path','visible':false},
            {data: 'description', name: 'description'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ]
        
    });

/*

    $('#saveBtn').submit(function (e) {
        e.preventDefault();
        $(this).html('Save');
       
       
       //var formData = new FormData(this);

    var  generated_number_invoice =document.getElementById('generated_number_invoice').value;
    var  receipt_number = document.getElementById('receipt_number').value;
    var  amount = document.getElementById('amount').value;
    var  date = document.getElementById('date').value;
    var  description =  document.getElementById('description').value;
    var  file = document.getElementById('receipt_file').value;
    
     $.ajax({
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
          url: "{{ route('receipts.store') }}",
          type: "GET",
          dataType: 'json',
          success: function (data) {
            $('#bookForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });


*/
       $('#images').change(function(){
           
           let reader = new FileReader();
           reader.onload = (e) => { 
             $('#preview-image').attr('src', e.target.result); 
           };
           reader.readAsDataURL(this.files[0]); 
         
          });





	 $('#print_inv').click(function () {
         var divName = 'print_invoice';
        
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
         document.body.innerHTML = printContents;
         window.print();
         document.body.innerHTML = originalContents;
	     window.location="{{ url('/invoice') }}";

     
});



	 $('#generated_number_invoice').change(function () {
        var generated_number_invoice  = document.getElementById('generated_number_invoice').value;
        $.ajax({
          url: "{{ url('/get_amount_from_invoice/get') }}",
          type: "POST",
          data: 
          {
           invoice_number:generated_number_invoice ,
          
          },
          success: function (data) {
            
       document.getElementById('amount').value= data.amount;
       document.getElementById('amount').disabled=true;
      
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
     
});


      $('#generate_invoice').click(function () {
      
        var application_id = document.getElementById('application_id').value;
        var remark = document.getElementById('remark').value;
        var user_id = document.getElementById('user_id').value;
        var  invoice_id = document.getElementById('invoice_id').value;
     
       
        
        if ( application_id == '') 
        
        {  document.getElementById('application_id').focus(); return false; } 
        

        
          $.ajax({
          url: "{{ url('/invoice_generate') }}",
          type: "POST",
          data: 
          {
           application_id:application_id,
           user_id:user_id,
           
           remark:remark,
          },
          success: function (data) {
            
       document.getElementById('invoice_id').value= data.invoice_generated;
       document.getElementById('rendered_template').innerHTML = data.rendered_template;
       document.getElementById('print_inv').style.display="block";
       document.getElementById('saveBtn').style.display="block";

    var Toast = Swal.mixin({
      toast: true,
      position: 'top-center',
      showConfirmButton: false,
      timer: 6000
    }); 

toastr.success("Invoice Generated successully")



          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
       
    });








    $('#createNewBook').click(function () {
        //alert("hellow Eyoba");
        $('#saveBtn').val("create-book");
        $('#book_id').val('');
        $('#bookForm').trigger("reset");
        $('#modelHeading').html("Receive Receipt");
        $('#ajaxModel').modal('show');
    });







    $('body').on('click', '.editReceipt', function () {
      var invoice_number = $(this).data('id');
      
     // $.get("{{ route('books.index') }}" +'/' + book_id +'/edit', function (data) {
          $('#modelHeading').html("Import Receipt Information");
          $('#saveBtn').html("Import");
          $('#ajaxModel').modal('show');
          $('#invoice_number').val(invoice_number);
         // $('#title').val(data.title);
          //$('#author').val(data.author);
     // })
   });







    $('#saveBtn').submit(function (e) {
        e.preventDefault();
        $(this).html('Save');
        var formData = new FormData(this);

    var  generated_number_invoice =document.getElementById('generated_number_invoice').value;
    var  receipt_number = document.getElementById('receipt_number').value;
    var  amount = document.getElementById('amount').value;
    var  date = document.getElementById('date').value;
    var  description =  document.getElementById('description').value;
    var  filee = document.getElementById('receipt_file').value;




    
     $.ajax({
         
          url: "{{ route('receipts.store') }}",
          type: "POST",
          data: {
            generated_number_invoice:generated_number_invoice,
            receipt_number :receipt_number ,
            amount:receipt_number ,
            date:date,
            description :description,
            file:formData ,
                },
          dataType: 'json',
         
          success: function (data) {
   
              $('#bookForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });


    
    $('body').on('click', '.deleteBook', function () {
     
        var book_id = $(this).data("id");
        {if(confirm("Are You sure You Want To Delete This File")){}else{return false;}}
        $.ajax({
            type: "DELETE",
            url: "{{ route('books.store') }}"+'/'+book_id,
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




