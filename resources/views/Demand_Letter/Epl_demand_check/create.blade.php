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
                        <p><span>Demand Check No : </span>10001</p>
                    </div>
                </div>
            </div>
        <div class="table-responsive">
        <table id="example" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Si.No</th>
                    <th>Product Name</th>
                    <th>DP Price</th>
                    <th>Demand Quantity</th>
                    <th>Demand Painding</th>
                    <th>Dealer Commission</th>
                    <th>Total Price</th>
                    <th style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($demandcol as $demandcols)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$demandcols->product_name}}</td>
                    <td>{{$demandcols->dp_price}} Tk</td>
                    <td>{{$demandcols->qty}} Piece</td>
                    <td> Piece</td>
                    <td>{{$demandcols->p_dsc}} Tk</td>
                    <td>{{$demandcols->p_cost}} Tk</td>
                    <td style="text-align: center;">
                    @if($demandcols->demand_hold_status=='1')
                    <form action="{{Route('demandletter.product.unhold',$demandcols->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm savebbtn" id="savebbtn" style="width: 100%;background-color: #76db76;font-weight: bold;">Unhold</button>
                    </form>
                    @elseif($demandcols->demand_approve_status=='1')
                    <a href="#"style="width: 80px;background-color: #2dbf2de8;color: #fff; font-weight: bold;"  id="ap"  class=" btn btn-default btn-sm" alt="default" >Approved</a>
                    @else
                    <a href="#"style="width: 80px;" id="co" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$demandcols->id}}" data-mydealerid="{{$demandcols->dealer_id}}" data-myproductid="{{$demandcols->products_id}}" data-mytitle="{{$demandcols->qty}}" data-mycode="{{$demandcols->product_dealer_commision}}" data-mydescription="{{$demandcols->dp_price}}" data-mydemandno="{{$demandcols->dealer_demand_no}}" scription alt="default" data-toggle="modal" data-target="#edit" >Checkout</a>


                    <form action="{{Route('demandletter.product.approved',$demandcols->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm savebbtn" id="savebbtn" style="width: 100%;">Approve</button>
                    </form>
                    <form action="{{Route('demandletter.product.hold',$demandcols->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm savebbtn" id="savebbtn" style="width: 100%;">Hold</button>
                    </form>
                    @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Update Demand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <form class="floating-labels m-t-40" action="{{route('demandletter.check-out.create')}}"method="POST">
                    @csrf
                    <div class="form-group m-b-40 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="hidden" class="form-control" id="mid" name="demand_id">
                        <input type="hidden" class="form-control" id="mdealerid" name="dealer_id">
                        <input type="hidden" class="form-control" id="mproductid" name="products_id">
                        <input type="hidden" class="form-control" id="mdemanid" name="dealer_demand_no">
                        <input type="hidden" class="form-control" id="mcode" name="">
                        <input type="hidden" class="form-control" id="mdescription" name="">
                        <input type="hidden" class="form-control" id="totalappcommision" name="">

                        <label for="input1" style="position: initial;">Demand Quantity</label>
                        <input type="text" class="form-control" id="mtitle" name="">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>


                    <div class="form-group m-b-40 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="input1" style="position: initial;">Approve Quantity</label>
                        <input type="text" class="form-control mapqty" id="mapqty" name="approve_qty">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group m-b-40 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="input1" style="position: initial;">Painding Quantity</label>
                        <input type="text" class="form-control" id="mpqty" name="">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
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
        var code = button.data('mycode')
        var description = button.data('mydescription')
        var id = button.data('myid')
        var demandid = button.data('mydemandno')
        var dealerid = button.data('mydealerid')
        var productid = button.data('myproductid')

        var modal =$(this)
        modal.find('.modal-body #mtitle').val(title);
        modal.find('.modal-body #mcode').val(code);
        modal.find('.modal-body #mdescription').val(description);
        modal.find('.modal-body #mid').val(id);
        modal.find('.modal-body #mdemanid').val(demandid);
        modal.find('.modal-body #mdealerid').val(dealerid);
        modal.find('.modal-body #mproductid').val(productid);
    })
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
@endpush