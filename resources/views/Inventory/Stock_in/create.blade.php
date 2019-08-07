@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<style>
  .col-md-3.adds {
    margin-top: 23px;
}
</style>
@endpush
@section('page-content')
<div class="card">
    <div class="card-header">
    </div>
    <div class="card-body">
        <div class="">
            <form method="Post" action="{{Route('product.stock.in.store')}}">
            @csrf
                <div class="row">
                </div>
                <br>
            <div class="row portinfo">
            </div>
                <div class="row">
                    <div class="col-sm-10">
                    </div>
                    <div class="col-sm-2">
                        <button align="right"  class="btn btn-success btn-sm add_form_field"><span style="font-size:16px; font-weight:bold;">Add New</span></button>
                    </div>
                </div>
                <br>
                <div class="hr">
                </div>
                <div class="productinfo">
                    @include('Inventory.partial_stock_in.productinfo')
                </div>		
                
                <div class="hr">
                </div>
                <div class="productresult">
                    @include('Inventory.partial_stock_in.productresult')
                </div>
                <div class="row">
                    <div class="col-sm-7">
                    </div>
                </div>
                <div class="hr1">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div>
@endsection
@push('end_js')
<script type="text/javascript">

	$(document).ready(function() {
		// add dynamic infut field
    var max_fields      = 100;
    var wrapper         = $(".container1");
    var add_button      = $(".add_form_field");
      
    var x = 1;
    $(add_button).click(function(e){
        e.preventDefault();
        
        if(x < max_fields){
            x++;          
            $(wrapper).append('<div class="row container1" style="margin-left: .81%;"><div class="col-sm-3 form-group"><label>Product Code</label><select class="form-control p-input text-dark inputv" id="dogid" name="prouct_id[]"><option value="">Select Product</option>@foreach($products as $product)<option value="{{$product->id}}">{{$product->product_name}}</option>@endforeach</select>     </div><div class="col-sm-3 form-group m-b-40" style=""><label for="qtyid">Quantity</label><input  type="number" onkeypress="isInputNumber(event)" class="form-control inputv qty" id="qtyid"  name="quantity[]"><span class="text-danger"></span></div><div class="col-sm-3 form-group"><label>Warehouse</label><select class="form-control p-input text-dark inputv" id="dogid" name="factory_id[]"><option value="">Select Warehouse</option>@foreach($warehouses as $warehouse)<option value="{{$warehouse->id}}">{{$warehouse->factory_name}}</option>@endforeach</select></div><div class="col-sm-1 delete" style="margin-top: 3%;"><a href="#" class="btn btn-danger ">Remove</a></div></div>'); 
            //add input box
        }
        
  else
  {
  alert('You Reached the limits')
  }
    var dom=$('.row').children().children("#qtyid");
    //console.log(dom);
    });

  //delete dynamically create input field
    $(wrapper).on("click",".delete", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
        total();
    })
       
    	//calculate product quantity and unit price
         $('#goods_container').on('input','.qty','.unitsprice',function(){

         		// $('.totalvalueid').attr("value", "0");
         	   var parent = $(this).closest('.row');
         	   // var selfvalue= $(this).val();
         	   var qt=parent.find('.qty').val();
         	   var up=parent.find('.unitsprice').val();
         	   var totalvalueid=parseFloat(qt)* parseFloat(up);
         	   parent.find('.totalvalueid').val(parseFloat(qt)* parseFloat(up));
         	   total();
                
         });

         //calculate total value
         function total(){
         	var total = 0;
         	$(".totalvalueid").each(function(){
         		var totalvalueid = $(this).val()-0;
         		total +=totalvalueid;
         		$('.total').val(total);
         		// console.log(total);
         	})
         	 $('.total').val(total);
         }
}); //end document function

function isInputNumber(evt){
	var cha = String.fromCharCode(evt.which);
	if (!(/[0-9]/.test(cha)))
	{
	    $('#numberModal').modal('show');
	}
}

</script>
<!-- <script type="text/javascript">
function getp(){
    $(document).ready(function(){
        $('select[name="prouct_id[]"]').on('change',function(){
            var pid = $(this).val();
            // console.log(pid);
            if(pid){
                $.ajax({
                    url: '/dpprice/'+pid,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        console.log(data[0].product_dp_price);  
                        var bm = data[0].product_dp_price;
                        document.getElementById("unitsprice").value = bm;  
                    }
                });
            }
        });
    });
};
</script> -->
@endpush




        
       







