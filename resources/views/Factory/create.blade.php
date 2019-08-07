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
    <div class="col-md-12">
    <!-- card -->
        <div class="card" style="height: 535px;">
            <!-- card body -->
            <div class="card-body">
            <h3>Create Factory</h3>
            <!-- Create department -->
                <form class="floating-labels m-t-40" action="{{Route('factory.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="area_title">Factory Name</label>
                                <input type="text" class="form-control" id="area_title"  name="factory_name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="factory_company_id">
                                <option value="">Select Company</option>
                                @foreach($companys as $company)
                                    <option value="{{$company->id}}">{{$company->company_title}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="factory_type_id">
                                <option value="">Select Factory Type</option>
                                @foreach($dealertypes as $dealertype)
                                    <option value="{{$dealertype->id}}">{{$dealertype->type_title}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="factory_division_id">
                                <option value="">Select Factory Division</option>
                                @foreach($divisions as $division)
                                    <option value="{{$division->id}}">{{$division->division_title}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pn">Factory Phone Number</label>
                                <input type="text" class="form-control" id="pn"  name="factory_contact_number">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-5">
                                <textarea class="form-control" rows="4" id="input7" name="factory_address"></textarea>
                                <span class="bar"></span>
                                <label for="input7">Address</label>
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
