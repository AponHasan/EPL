@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<style>
div.dataTables_wrapper div.dataTables_filter input
{
    width: 700px;
    background-color: #b1d5f5;
    height: 30px;
    padding-left: 10px;
}

</style>
@endpush

@section('page-content')
<div class="card">
    <div class="card-header">
    Dealer Demand List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Si.No</th>
                        <th>Dealer Name</th>
                        <th>Demand Date</th>
                        <th>Demand Id</th>
                        <th>Demand Quantity</th>
                        <th>Demand Commission</th>
                        <th>Grand Total</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($dealerdemanlist as $ddl)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$ddl->d_s_name}}</td>
                        <td>{{$ddl->date}}</td>
                        <td>{{$ddl->dealer_demand_no}}</td>
                        <td>{{$ddl->orderqty}}</td>
                        <td>{{$ddl->dcommission}}</td>
                        <td>{{$ddl->dproductcost}}</td>
                        <td style="text-align: center;">
                            <a href="{{route('demandletter.check-out',$ddl->dealer_demand_no)}}" class="btn btn-primary btn-sm"title="View Profile">Check Order</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection\
@push('end_js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush