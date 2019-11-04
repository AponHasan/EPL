@extends('layouts.app-layout')
@section('page-content')
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p style="color:#fff">{{ $message }}</p>
            </div>
        @endif

        @if ($message = Session::get('delete'))
            <div class="alert alert-danger" style="background-color:red"  id="danger-alert">
                <p style="color:#fff">{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="col-md-6">
    <!-- card -->
        <div class="card" style="height: 535px;">
            <!-- card body -->
            <div class="card-header">
            Create Staff Category
            </div>
            <div class="card-body">
            <h3></h3>
            <!-- Create department -->
                <form class="floating-labels m-t-40" action="{{Route('staffcateory.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                            <label for="area_title">Staff Category Title</label>
                                <input type="text" class="form-control" id="area_title"  name="staff_cate_title">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group m-b-5">
                                <textarea class="form-control" rows="4" id="input7" name="staff_cate_desccription"></textarea>
                                <span class="bar"></span>
                                <label for="input7">Description</label>
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
    <div class="card-header">
    Staff Category List
    </div>
            <div class="card-body">
                <h4 class="card-title">Staff Category List</h4>
    <div class="table-responsive">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>SI. No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($staffCategorys as $staffCategory)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$staffCategory->staff_cate_title}}</td>
                <td>
                <a href="#" class="btn btn-danger btn-sm" data-myid="{{$staffCategory->id}}" data-mytitle="" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$staffCategory->id}}" data-mytitle="{{$staffCategory->staff_cate_title}}" data-mycode="" data-mydescription="{{$staffCategory->staff_cate_desccription}}" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Delete Staff Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="{{route('staffcateory.destroy','test')}}"method="POST">
            {{method_field('delete')}}
            @csrf
      <div class="modal-body" >
        <p>Are You Sure You Want To Delete this...!</p> 
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

 <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Update Staff Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <form class="floating-labels m-t-40" action="{{route('staffcateory.update','test')}}"method="POST">
                    {{method_field('patch')}}
                    @csrf
                    <div class="form-group m-b-40 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="input1" style="position: initial;">Staff Category Title</label>
                        <input type="hidden" class="form-control" id="mid" name="id">
                        <input type="text" class="form-control" id="mtitle" name="staff_cate_title">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>

                    <div class="form-group m-b-5">
                    <label for="input7" style="position: initial;">Description</label>
                        <input type="textarea" class="form-control" rows="4" id="mdescription" name="staff_cate_desccription">
                        <span class="bar"></span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect waves-light" style="width:50%" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="width: 50%;">UPDATE</button>
                    </div>
                </form>
            </div>
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
    // Edit
    $('#edit').on('show.bs.modal',function(event){
        console.log('hello test');
        var button = $(event.relatedTarget)
        var title = button.data('mytitle')
        var description = button.data('mydescription')
        var id = button.data('myid')

        var modal =$(this)
        modal.find('.modal-body #mtitle').val(title);
        modal.find('.modal-body #mdescription').val(description);
        modal.find('.modal-body #mid').val(id);
    })



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
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });

 $(document).ready (function(){
            $("#danger-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush
