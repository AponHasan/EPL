@extends('layouts.app-layout')
@section('page-content')
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('delete'))
            <div class="alert alert-danger" style="background-color:red"  id="danger-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="col-md-6">
    <!-- card -->
        <div class="card" style="height: 535px;">
            <!-- card body -->
            <div class="card-body">
            <h3>Create Dealer Type</h3>
            <!-- Create department -->
                <form class="floating-labels m-t-40" action="{{Route('dealersettings.type.postcreate')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                            <label for="zname">Type Title</label>
                                <input type="text" class="form-control" id="zname"  name="type_title">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                            <label for="zdes">Type Description</label>
                                <input type="text" class="form-control" id="zdes"  name="type_description">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <!-- button row -->
                    <div class="class row" style="margin-top:20px;margin-bottom:30px">
                        <div class="class col-md-4"></div>
                        <div class="class col-md-4">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
                        </div>
                        <div class="class col-md-4"></div>
                    </div>
                </form>
            </div><!-- end create department -->
            <!-- end card body -->
        </div><!-- end card -->
    </div> <!-- end col-6 -->
    <div class="col-md-6" style="padding-left: 0px;">
    <div class="card" style="height: 535px;">
            <div class="card-body">
                <h4 class="card-title">Dealer Type List</h4>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dealertype as $dtype)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dtype->type_title}}</td>
                                <td>
                                <a href="#" class="btn btn-danger btn-sm" data-myid="{{$dtype->id}}" data-mytitle="{{$dtype->type_title}}" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                                    <a href="sdfs" class="show-modal  btn btn-warning btn-sm" alt="default"><i class="ti-settings"></i></a>
                                </td>
                            </tr>   
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: red;color:#fff">
        <h5 class="modal-title" id="exampleModalLabel">Delete Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="{{route('dealersettings.type.delete','test')}}"method="POST">
            {{method_field('delete')}}
            @csrf
      <div class="modal-body" >
        <p>Are You Sure You Want To Delete this...!</p> 
        <!-- <input type="disable" class="form-control" id="mtitle" name="id"> -->
        <input type="hidden" class="form-control" id="mid" name="id">
      </div>
      <div class="modal-footer" align="center">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">No Cancle</button>
        <button type="submit" class="btn btn-danger btn-sm">Yes Delete</button>
      </div>
      </form>
  
    </div>
  </div>
</div>
</div>
@endsection
@push('end_js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
// list pagination by datatable
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    } );
    console.log($('#uspid').val());
    
} );
</script>
<script>
// Delete
$('#delete').on('show.bs.modal',function(event){
        console.log('hello test');
        var button = $(event.relatedTarget)
        var title = button.data('mytitle')
        var id = button.data('myid')

        var modal =$(this)
        modal.find('.modal-body #mtitle').val(title);
        modal.find('.modal-body #mid').val(id);
    })
    $(document).ready (function(){
            $("#danger-alert").fadeTo(7000, 7000).slideUp(1000);
 });
$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush