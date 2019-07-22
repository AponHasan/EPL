@extends('layouts.app-layout')
@section('page-content')
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="col-md-12">
    <!-- card -->
        <div class="card" style="height: 535px;">
            <!-- card body -->
            <div class="card-body">
            <h3>Create Dealer Line Manager</h3>
            <!-- Create department -->
                <form class="floating-labels m-t-40" action="{{Route('dealersettings.linemanager.postcreate')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="lm_name">Line Manager Name</label>
                                <input type="text" class="form-control" id="lm_name"  name="lm_name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="lm_nid">NID</label>
                                <input type="text" class="form-control" id="lm_nid"  name="lm_nid">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="lm_phone_number">Phone Nuumber</label>
                                <input type="text" class="form-control" id="lm_phone_number"  name="lm_phone_number">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-5">
                                <textarea class="form-control" rows="4" id="input7" name="lm_address"></textarea>
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
$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush