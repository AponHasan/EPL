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
    <div class="col-md-12" style="padding-left: 0px;">
        <div class="card" style="height: 535px;">
            <div class="card-body">
                <h4 class="card-title">Department List</h4>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Product Name</th>
                                <th>Demand Qty</th>
                                <th>Approve Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($check_list as $check_lists)
                                @if($check_lists->partial_a_s==1)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$check_lists->product_name}}</td>
                                        <td>{{$check_lists->demand_qty}}</td>
                                        <td>{{$check_lists->total_approve}}</td>
                                    </tr>
                                @elseif($check_lists->partial_a_s==0)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$check_lists->product_name}}</td>
                                        <td>{{$check_lists->demand_qty}}</td>
                                        <td>{{$check_lists->demand_qty}}</td>
                                    </tr>
                                @endif
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <form action="{{Route('list.confirm')}}" method="post">
                @csrf
                @foreach($check_list as $check_lists)
                    <input type="hidden" name="c_status[]" value="{{$check_lists->id}}" >
                @endforeach
                <input type="submit" value="Confirm">
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
$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });

 $(document).ready (function(){
            $("#danger-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush