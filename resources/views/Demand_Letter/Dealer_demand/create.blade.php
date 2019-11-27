@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
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
@if(Auth::user()->user_role->role_id==1)
<form action="{{Route('demandletter.generate')}}" method="POST">
    @csrf
    <div class="card-header">
    </div>
    <div class="card-boy">
    <div class="container"
>        <div class="row">
            <div class="col-md-6">
                <h3>Dealer Info</h3>
            </div>
            <div class="col-md-6" >
            <label>Demand Number : dealer-demand-<span id="dlnos"></span></label>
            </div>
            <div class="col-md-6">
                <label> Dealer Code*</label> 
                <select class="form-control"  name="dealer_id"  id="dealer" required>
                    <option value=" ">Select Dealer</option>
                    @foreach($dealers as $dealer)
                    <option value="{{$dealer->id}}">{{$dealer->dlr_code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="dlno"  name="dealer_demand_no" value="" type="hidden" />
                    <label for="">Dealer Name</label>
                    <input class="form-control"  id="d_name"  name="" value="" type="text" Readonly/>
                </div>
            </div>
            
            <div class="col-md-12">
                <h3>Product Info</h3>
            </div>
            
            <div class="col-md-3">
                <label>Select Product *</label> 
                <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true"  name="product"  id="products_id" required>
                    <option value=" " selectedS>Select Product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2" style="padding-right:2px">
                <label>DP price*</label> 
                <input class="form-control"  name="dp_price" value="" type="text"  id='u_price'/>
            </div>
            <div class="col-md-1" style="padding-left:2px;">
                <label>Discount(%)</label> 
                <input class="form-control"  name="u_discount" value="" type="text"  id='u_discount' style="width: 90px;"/>
            </div>
            <div class="col-md-2" style="padding-left: 30px;">
                <label> Qty* <span style="color:green">   </span>  <span id="available_produsts" style="color:#3ac0d6"></span>  </label> 
                <input class="form-control"  name="qty"   type="number" id="qtty"   / >
            </div>
            <div class="col-md-2" >
                <label>Total Discount</label> 
                <input class="form-control"  name="p_dsc" value="" type="text"  id='p_dsc'/>
            </div>
            <div class="col-md-2" >
                <label>Total Price</label> 
                <input class="form-control"  name="p_cost" value="" type="text"  id='p_cost'/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-2 adds" >
        <button type="button" id="btn-product_added" class="btn btn-primary mt-2 add" >
            <i class="fa fa-plus-circle"></i> Add
        </button>   
    </div>
    <div class="table-responsive mt-2">
                    <table class="table" id="show-tests">
                        <thead>
                            <tr id="table-head" style="display: none">
                                <th>Select Product</th>
                                <th>DP Price</th>
                                <th>Discount(%)</th>
                                <th>Quantity</th>
                                <th>Total Discount</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="float-right text-right p-3 border"style="margin-right: 2%;margin-bottom: 2%;">
                        <p>
                           Grand Total : <span id="total_price">0.00</span>
                            <input type="hidden" name="total_price" id="total_price_input" class="text-right" readonly>
                        </p>
                        <p>
                           Grand Total Discount: <span id="total_dsc">0.00</span>
                            <input type="hidden" name="total_dsc" id="total_dsc_input" class="text-right" readonly>
                        </p>
                        <p>
                           Grand Total Quentity: <span id="total_qty">0.00</span>
                            <input type="hidden" name="total_qty" id="total_qty_input" class="text-right" readonly>
                        </p>
                        
                    </div>
                </div>
            <div class="text-center m-t-20" style="margin-bottom: 10%;">
                <button class="btn btn-primary submit-btn" type="submit">Generate Demand Letter</button>
            </div>
    </form>
    @elseif(Auth::user()->user_role->role_id==2)
    <form action="{{Route('demandletter.generate')}}" method="POST">
    @csrf
    <div class="card-header">
    </div>
    <div class="card-boy">
    <div class="container"
>        <div class="row">
            <div class="col-md-6">
                <h3>Dealer Info</h3>
            </div>
            <div class="col-md-6" >
            <label>Demand Number : dealer-demand-<span id="dlnos"></span></label>
            </div>
            <!-- <div class="col-md-6">
                <label> Dealer Code*</label> 
                <select class="form-control"  name="dealer_id"  id="dealer" required>
                    <option value=" ">Select Dealer</option>
                    @foreach($dealers as $dealer)
                    <option value="{{$dealer->id}}">{{$dealer->dlr_code}}</option>
                    @endforeach
                </select>
            </div> -->
            <div class="col-md-2" style="padding-right:2px">
                <label>Dealer Code</label> 
                <input class="form-control"  name="dealer_id" value="{{$dealerlogid[0]->dlr_code}}" type="text"  id='u_price'/>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="dlno"  name="dealer_demand_no" value="" type="hidden" />
                    <label for="">Dealer Name</label>
                    <input class="form-control"  id="d_name"  name="" value="{{$dealerlogid[0]->d_s_name}}" type="text" Readonly/>
                </div>
            </div>
            
            <div class="col-md-12">
                <h3>Product Info</h3>
            </div>
            
            <div class="col-md-3">
                <label>Select Product *</label> 
                <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true"  name="product"  id="products_id" required>
                    <option value=" " selectedS>Select Product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2" style="padding-right:2px">
                <label>DP price*</label> 
                <input class="form-control"  name="dp_price" value="" type="text"  id='u_price'/>
            </div>
            <div class="col-md-1" style="padding-left:2px;">
                <label>Discount(%)</label> 
                <input class="form-control"  name="u_discount" value="" type="text"  id='u_discount' style="width: 90px;"/>
            </div>
            <div class="col-md-2" style="padding-left: 30px;">
                <label> Qty* <span style="color:green">   </span>  <span id="available_produsts" style="color:#3ac0d6"></span>  </label> 
                <input class="form-control"  name="qty"   type="number" id="qtty"   / >
            </div>
            <div class="col-md-2" >
                <label>Total Discount</label> 
                <input class="form-control"  name="p_dsc" value="" type="text"  id='p_dsc'/>
            </div>
            <div class="col-md-2" >
                <label>Total Price</label> 
                <input class="form-control"  name="p_cost" value="" type="text"  id='p_cost'/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-2 adds" >
        <button type="button" id="btn-product_added" class="btn btn-primary mt-2 add" >
            <i class="fa fa-plus-circle"></i> Add
        </button>   
    </div>
    <div class="table-responsive mt-2">
                    <table class="table" id="show-tests">
                        <thead>
                            <tr id="table-head" style="display: none">
                                <th>Select Product</th>
                                <th>DP Price</th>
                                <th>Discount(%)</th>
                                <th>Quantity</th>
                                <th>Total Discount</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="float-right text-right p-3 border"style="margin-right: 2%;margin-bottom: 2%;">
                        <p>
                           Grand Total : <span id="total_price">0.00</span>
                            <input type="hidden" name="total_price" id="total_price_input" class="text-right" readonly>
                        </p>
                        <p>
                           Grand Total Discount: <span id="total_dsc">0.00</span>
                            <input type="hidden" name="total_dsc" id="total_dsc_input" class="text-right" readonly>
                        </p>
                        <p>
                           Grand Total Quentity: <span id="total_qty">0.00</span>
                            <input type="hidden" name="total_qty" id="total_qty_input" class="text-right" readonly>
                        </p>
                        
                    </div>
                </div>
            <div class="text-center m-t-20" style="margin-bottom: 10%;">
                <button class="btn btn-primary submit-btn" type="submit">Generate Demand Letter</button>
            </div>
    </form>


    @elseif(Auth::user()->user_role->role_id==3)
<form action="{{Route('demandletter.generate')}}" method="POST">
    @csrf
    <div class="card-header">
    </div>
    <div class="card-boy">
    <div class="container"
>        <div class="row">
            <div class="col-md-6">
                <h3>Dealer Info</h3>
            </div>
            <div class="col-md-6" >
            <label>Demand Number : dealer-demand-<span id="dlnos"></span></label>
            </div>
            <div class="col-md-6">
                <label> Dealer Code*</label> 
                <select class="form-control"  name="dealer_id"  id="dealer" required>
                    <option value=" ">Select Dealer</option>
                    @foreach($d_w_spo as $dealer)

                        <option value="{{$dealer->id}}">{{$dealer->dlr_code}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="dlno"  name="dealer_demand_no" value="" type="hidden" />
                    <label for="">Dealer Name</label>
                    <input class="form-control"  id="d_name"  name="" value="" type="text" Readonly/>
                </div>
            </div>
            
            <div class="col-md-12">
                <h3>Product Info</h3>
            </div>
            
            <div class="col-md-3">
                <label>Select Product *</label> 
                <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true"  name="product"  id="products_id" required>
                    <option value=" " selectedS>Select Product</option>
                    @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->product_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2" style="padding-right:2px">
                <label>DP price*</label> 
                <input class="form-control"  name="dp_price" value="" type="text"  id='u_price'/>
            </div>
            <div class="col-md-1" style="padding-left:2px;">
                <label>Discount(%)</label> 
                <input class="form-control"  name="u_discount" value="" type="text"  id='u_discount' style="width: 90px;"/>
            </div>
            <div class="col-md-2" style="padding-left: 30px;">
                <label> Qty* <span style="color:green">   </span>  <span id="available_produsts" style="color:#3ac0d6"></span>  </label> 
                <input class="form-control"  name="qty"   type="number" id="qtty"   / >
            </div>
            <div class="col-md-2" >
                <label>Total Discount</label> 
                <input class="form-control"  name="p_dsc" value="" type="text"  id='p_dsc'/>
            </div>
            <div class="col-md-2" >
                <label>Total Price</label> 
                <input class="form-control"  name="p_cost" value="" type="text"  id='p_cost'/>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-2 adds" >
        <button type="button" id="btn-product_added" class="btn btn-primary mt-2 add" >
            <i class="fa fa-plus-circle"></i> Add
        </button>   
    </div>
    <div class="table-responsive mt-2">
                    <table class="table" id="show-tests">
                        <thead>
                            <tr id="table-head" style="display: none">
                                <th>Select Product</th>
                                <th>DP Price</th>
                                <th>Discount(%)</th>
                                <th>Quantity</th>
                                <th>Total Discount</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="float-right text-right p-3 border"style="margin-right: 2%;margin-bottom: 2%;">
                        <p>
                           Grand Total : <span id="total_price">0.00</span>
                            <input type="hidden" name="total_price" id="total_price_input" class="text-right" readonly>
                        </p>
                        <p>
                           Grand Total Discount: <span id="total_dsc">0.00</span>
                            <input type="hidden" name="total_dsc" id="total_dsc_input" class="text-right" readonly>
                        </p>
                        <p>
                           Grand Total Quentity: <span id="total_qty">0.00</span>
                            <input type="hidden" name="total_qty" id="total_qty_input" class="text-right" readonly>
                        </p>
                        
                    </div>
                </div>
            <div class="text-center m-t-20" style="margin-bottom: 10%;">
                <button class="btn btn-primary submit-btn" type="submit">Generate Demand Letter</button>
            </div>
    </form>
    @endif
</div>
@endsection
@push('end_js')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
<script>
// demand Number generate
$(document).ready(function(){
        $.ajax({
            url : '/dealer/demandletter/demandeNumber',
            type: "GET",
            dataType: 'json',
            success : function(data){
              
              // console.log(data.length!=0)
              if(data.length!=0)
              {
                  var today = new Date();
                  var year = today.getFullYear();
                  var month =today.getMonth()+1;
                  var date =today.getDate();
                  console.log(year);
                  console.log(month);
                  console.log(date);
                  var dln = parseInt(data[0].dealer_demand_no)+1;
                  // console.log(dln);
                  document.getElementById("dlno").value = dln;
                  document.getElementById("dlnos").innerHTML = dln;
              }
              else{
                  document.getElementById("dlno").value = 100001;
                  document.getElementById("dlnos").innerHTML = 100001;
              }
              
          }
        });
    });

$(document).ready(function(){
    $('select[name="dealer_id"]').on('change',function(){
        var dlrid = $(this).val();
        // console.log(dlrid);
        if(dlrid){
            $.ajax({
                url: '/dealer/name/get/'+dlrid,
                type:"GET",
                dataType:'json',
                success: function(date){
                    // console.log(date[0].d_s_name);
                    var dlrname = date[0].d_s_name;
                    document.getElementById("d_name").value = dlrname; 
                    }
            });
        }
    });
});

$(document).ready(function(){
        $('select[name="product"]').on('change',function() {
     var pro_id = $(this).val();
         
       $.ajax({
        url : '/dealer/demandletter/product/price/'+pro_id,  
        type:"GET",               
        dataType: 'json',         
        success : function(data) {
    
            var pprice = data[0].product_dp_price;
            var pdcom = data[0].product_dealer_commision;
            document.getElementById("u_price").value = pprice;
            document.getElementById("u_discount").value = pdcom;
            $("#qtty").on("input", function(){
                            var pqt = $(qtty).val();
                            var cost = $(qtty).val()*pprice;
                            var dcost =((cost*pdcom)/100);
                            var pwithd = cost-dcost;
                            // console.log(dcost);
                            document.getElementById("p_dsc").value = dcost;
                            document.getElementById("p_cost").value = pwithd;
                        })
            }, 
        });  
    });
});

 $(document).on('click', '#btn-product_added', function() {
           var pro_id = $('#products_id').val();
           var _token = '{{ csrf_token() }}';
           $.ajax({
               url: "{{ route('dealer.demand.copy') }}",
               method: "POST",
               data: {_token:_token, pro_id:pro_id,unit_price:$('#u_price').val(), qty:$('#qtty').val(),u_discount:$('#u_discount').val(),p_dsc:$('#p_dsc').val(),p_cost:$('#p_cost').val()},
               dataType: "json",
               success: function (response) {
                   $('#table-head').show(); 
                   console.log(response);
                    $('#show-tests').append(response);
                    $('#pro_id').val(' ');
                    $('#u_price').val(' ');
                    $('#qtty').val(' ');
                    $('#u_discount').val(' ');
                    $('#p_dsc').val(' ');
                    $('#p_cost').val(' ');
                     getTotalPrice();
                     getTotalQty();
                     getTotalDsc();
               }
           });
       });
       $(document).on('click', '.btn-remove', function() {
          $('#test_row_' + $(this).data('testid')).remove();
                    getTotalPrice();
                     getTotalQty();
                     getTotalDsc();
           $('#due').html(Math.round(total_test_price() - $('#customer_pay').val()));
       });

// Grend Total
       function getTotalPrice() {
           $('#total_price').html(total_test_price().toFixed(2));
           $('#total_price_input').val(total_test_price());
           $('#due').html(Math.round(total_test_price() - ($('#customer_pay').val() +$('#dis_amount').val() )));

       }

       function total_test_price() {
           var total = 0;
           $('.test-price').each(function(index, element) {
               total += parseFloat(element.textContent);
           });
           return Math.round( total);
       }


// Total Quuentity
        function getTotalQty() {
           $('#total_qty').html(total_test_qty());
           $('#total_qty_input').val(total_test_qty());
       }

       function total_test_qty() {
           var total = 0;
           $('.test-qty').each(function(index, element) {
               total += parseFloat(element.textContent);
           });
           return Math.round( total);
       }


    //   Total discunt
        function getTotalDsc() {
           $('#total_dsc').html(total_test_dsc().toFixed(2));
           $('#total_dsc_input').val(total_test_dsc());
       }

       function total_test_dsc() {
           var total = 0;
           $('.test-p-dsc').each(function(index, element) {
               total += parseFloat(element.textContent);
           });
           return parseFloat(Math.round( total));
       }


</script>


<script>



</script>
@endpush