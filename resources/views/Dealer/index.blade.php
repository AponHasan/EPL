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
    <div class="col-md-12" style="padding-left: 0px;">
    <div class="card" style="height: 535px;">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6" align="left"><h4 class="card-title">Dealer Info</h4></div>
                <div class="col-md-6" align="right"><a href="{{Route('dealer.getcreate')}}" class="btn btn-primary btn-sm">Add New Dealer</a></div>
            </div>
                
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Name</th>
                                <th>SPO</th>
                                <th>Proprietor Name</th>
                                <th>Phone Number</th>
                                <th>Adddress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($dealer as $dlr)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dlr->d_s_name}}</td>
                                <td>{{$dlr->sop_name}}</td>
                                <td>{{$dlr->d_proprietor_name}}</td>
                                <td>{{$dlr->dlr_mobile_no}}</td>
                                <td>{{$dlr->dlr_address}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-sm" ><i class="ti-trash"></i></a>
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