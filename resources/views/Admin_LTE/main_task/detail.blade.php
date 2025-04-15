@extends('layouts.app')
@section('stylesheets')
@endsection
@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="col-md-6 col-lg-6 col-sm-7">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Task Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Task Name:- </label>
                                <label for="exampleInputEmail1">{{$task->task_name}}</label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Estimated Time (Days):- </label>
                                <label for="exampleInputEmail1">{{$task->task_duration_days_plan}}</label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Start Date:- </label>
                                <label for="exampleInputEmail1">{{$task->start_time}}</label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">End Date:- </label>
                                <label for="exampleInputEmail1">{{$task->end_time}}</label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Actual Spent Time (Days):- </label>
                                <label for="exampleInputEmail1">{{$task->task_duration_days_actual}}</label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Task Status:- </label>
                                <label for="exampleInputEmail1">{{$task->task_status}}</label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Deadline:- </label>
                                <label for="exampleInputEmail1"><span style="color:red;">{{$task->deadline}}</span></label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Related Task:- </label>
                                <label for="exampleInputEmail1">{{$task->related_type}} <a href="" class="btn-link">Open</a></label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Related Id:- </label>
                                <label for="exampleInputEmail1">{{$task->related_id}}</label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Active Status:- </label>
                                <label for="exampleInputEmail1">
                                    @if($task->is_active==1)
                                        Active
                                    @elseif($task->is_active==0)
                                        Inactive
                                    @endif
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    @if($task->is_archived==1)
                                        Archived
                                    @elseif($task->is_archived==0)
                                        Working
                                    @endif
                                </label>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">


                        </div>
                    </form>
                </div>




           </div>
      </div>
      </div>

  </section>
  @endsection
  @section('scripts')
  <!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
  @endsection
