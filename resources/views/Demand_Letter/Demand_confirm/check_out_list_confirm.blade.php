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
        <div class="card" style="height: auto;">
            <div class="card-body">
            <div class="row">
            <div class="col-md-6" >
                <h4 class="card-title">Demand Check-Out List</h4>
            </div>
            <div class="col-md-6" >
                <label>Confirm Number: demand-confirm-<span id="dcnos"></span></label>
            </div>
            
            </div>
            <form class="floating-labels m-t-40" action="{{Route('list.confirm')}}" method="post">
                @csrf
                @foreach($check_list as $check_lists)
                    <input type="hidden" name="c_status[]" value="{{$check_lists->id}}" >
                @endforeach
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="dcno"  name="demand_confirm_no" value="" type="hidden" />
                        <label for="dealer">Dealer Name</label>
                        <input type="hidden" class="form-control"  name="dealer_demand_check_out_no" value="{{$check_list[0]->dealer_demand_check_out_no}}">
                        <input type="hidden" class="form-control"  name="dealer_demand_no" value="{{$check_list[0]->dealer_demand_no}}">
                        <input class="form-control" id="dealer"  name="" value="{{$check_list[0]->d_s_name}}" type="text" readonly />
                        <input class="form-control" id="dealer"  name="dealer_id" value="{{$check_list[0]->dealer_id}}" type="hidden" readonly />
                        <input class="form-control" id="dealer"  name="ddl_check_outs_id" value="{{$check_list[0]->id}}" type="hidden" readonly />
                        <label for="track">Track Number</label>
                        <input class="form-control" id="track"  name="track_number" value="" type="text" />
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Product Code</th>
                                <th>Order Quantity</th>
                                <th>Delivery Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($check_list as $check_lists)
                                @if($check_lists->approve != 0)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$check_lists->product_code}}</td>
                                    <td>
                                    <input type="text" class="form-control col-md-3" style="border-color: green"  name="approve_qty[]" value="{{$check_lists->approve}}" readonly>
                                    </td>
                                    <td>
                                    <input type="text" class="form-control col-md-3" style="border-color: green"  name="delivery_quentity[]" value="{{$check_lists->approve}}">
                                    <input type="hidden" class="form-control"  name="demand_id[]" value="{{$check_lists->demand_id}}">
                                    </td>
                                </tr>
                                @endif
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <input type="hidden" class="form-control"  name="products_id[]" value="{{$check_lists->products_id}}">
                
            <div class="text-center m-t-20" style="margin-bottom: 10%;">
            
                <button class="btn btn-primary submit-btn" type="submit">Delivery Confirm</button>
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
$(document).ready(function(){
        $.ajax({
            url : '/dealer/demandletter/demandconfirmNumber',
            type: "GET",
            dataType: 'json',
            success : function(data){
                // console.log(data[0].demand_confirm_no);
                if(data[0].demand_confirm_no != null)
                {
                    
                    var dln = parseInt(data[0].demand_confirm_no)+1;
                    console.log(dln);
                    document.getElementById("dcno").value = dln;
                    document.getElementById("dcnos").innerHTML = dln;
                }
                else{
                    document.getElementById("dcno").value = 100001;
                }
                
            }
        });
    });
$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });

 $(document).ready (function(){
            $("#danger-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush