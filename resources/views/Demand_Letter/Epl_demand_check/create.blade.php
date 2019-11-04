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
    <div class="card-header">Dealer Demand </div>
    <div class="card-body">
    <form class="floating-labels m-t-40" action="{{route('demandletter.check-out.create')}}"method="POST">
    @csrf
        <input type="hidden" class="form-control"  name="dealer_id" value="{{$demandcol[0]->dealer_id}}">
        <input type="hidden" class="form-control"  name="dealer_demand_no" value="{{$demandcol[0]->dealer_demand_no}}">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <p><span>Dealer Name : </span>{{$demandcol[0]->d_s_name}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <p><span>Demand Date : </span>{{$demandcol[0]->date}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <p >Demand Check No : <span id="dcnos"> </span></p>
                        <input type="hidden" class="form-control" id="dcno" name="dealer_demand_check_out_no" >
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger" style="background-color:#fff">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color:red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-4" style="margin-top:10px;">
                    <div class="form-group m-b-40 " >
                        <label for="input1">Warehouse</label>
                        <select required="" name="warehouse_id" class="form-control ">
                        <option value=" ">Select Warehouse</option>
                                @foreach($warehouses as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->factory_name}}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
            </div>
            
        <div class="table-responsive">
        <table id="example" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Si.No</th>
                    <th>Product Name</th>
                    <th>Deamand Paindding</th>                    
                    <th>In Stock</th>                    
                    <th>Approve QTY</th>                    
                </tr>
            </thead>
            <tbody>
            @foreach($demandcol as $demandcols)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$demandcols->product_name}}</td>
                    @if($demandcols->demand_id==null)
                        <td>{{$demandcols->qty}}</td>
                    @else
                    <td>{{$demandcols->painding}}</td>
                    @endif
                    <td></td>
                    <td>
                    @if($demandcols->demand_id==null)
                        <input type="text" class="form-control col-md-3" style="border-color: green"  name="approve_qty[]" value="{{$demandcols->qty}}">
                    @else
                        <input type="text" class="form-control col-md-3" style="border-color: green"  name="approve_qty[]" value="{{$demandcols->painding}}">
                    @endif
                <input type="hidden" class="form-control"  name="products_id[]" value="{{$demandcols->products_id}}">
                <input type="hidden" class="form-control"  name="demand_id[]" value="{{$demandcols->id}}">
                    </td>                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        <div class="text-center m-t-20" style="margin-bottom: 10%;">
            <button class="btn btn-primary submit-btn" type="submit">Check Out </button>
        </div>
    </form>
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

    $('.mapqty').on('keyup',function (event) {
        var approveQty = parseInt($(this).val());
        var demandQty = parseInt($('#mtitle').val());
        var dpprice = ($('#mdescription').val());
        var dealarcommision = $('#mcode').val();

        if(approveQty > demandQty)
        {
            alert("Sorry.!, You Can't approve more then demand qty");

            $('#mpqty').empty();
        }
        else if(approveQty < 0)
        {
            alert("Sorry.!, You Can't Enter Negative Number");
            $('#mpqty').empty();
        }

        else{
        var PaindingQty = demandQty-approveQty;
        document.getElementById("mpqty").value = PaindingQty;
        // $('#mpqty').val(PaindingQty);
        var totalcost = Math.round(approveQty*dpprice);
        var totalAppcommision = Math.round((totalcost*dealarcommision)/100);
        document.getElementById("totalappcommision").value=totalAppcommision;
        console.log(totalAppcommision);
        }
        
    })
 </script>

<script type="text/javascript">

$(document).ready(function(){
        $('#sin').on('click',function(){
            
            var id = $(this).attr('data-myid');
            // var uid = e.options[e.selectedIndex].value;
            console.log(id);
            if(uid){
                $.ajax({
                    url: '/salaryincitementdone/'+uid,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        // console.clog(data[0].total_salary);
                        if(!(data[0]))
                        {
                            console.log('no');
                        }
                        if(data!=null)
                        {
                          
                            
                        }
                    }
                });
            }
        });
    });
    </script>
<script>
$(document).ready(function(){
        $.ajax({
            url : '/dealer/demandletter/demandcheckmNumber',
            type: "GET",
            dataType: 'json',
            success : function(data){
                // console.log(data[0].demand_confirm_no);
                if(data[0].demand_check_no != null)
                {
                    
                    var dln = parseInt(data[0].demand_check_no)+1;
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
</script>
@endpush