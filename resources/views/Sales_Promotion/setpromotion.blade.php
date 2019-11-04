@extends('layouts.app-layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
@section('page-content')

<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p style="color:#fff">{{ $message }}</p>
            </div>
        @endif

        @if ($message = Session::get('delete'))
            <div class="alert alert-danger" style="background-color:red"  id="danger-alert">
                <p style="color:#fff">{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="col-md-12">
    <!-- card -->
        <div class="card" style="height: auto;">
            <!-- card body -->
            <div class="card-body" >
                <h3>Promotional Menu Set</h3>
                <!-- Create department -->
                    <form class="floating-labels m-t-40" action="{{Route('store.set.promotion')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group m-b-40">
                                <label for="area_title">Promotional Title</label>
                                    <input type="text" class="form-control" id="sptitle"  name="sales_promotions_title">
                                    <span class="text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group m-b-40">
                                    <label>Promotion Oper Category</label>
                                    <select class="form-control p-input text-dark inputv"  id="sales_promo_c" name="sales_promotions_category">
                                        <option >Select Category</option>
                                        <option value="free">Free Item</option>
                                        <option value="discount">Discount</option>
                                        <option value="cashin">Cash Incentive</option>
                                    </select>
                                </div>
                            </div>                     
                        </div>
                        <div class="col-md-12" style="margin-top:20px;" id="productid">
                            Select Product
                            <div class="form-group m-b-40">
                                <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="dogid" name="product_id">
                                    <option value="">Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row" id="free" style="display:none">
                            Free Item
                            <div class="col-md-12">
                                <div class="form-group m-b-40">
                                    <label for="tq">Target Quantity</label>
                                    <input type="text" class="form-control" id="tq"  name="s_m_i_target_qty">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-b-40">
                                    <label for="tq">Achieve Quantity</label>
                                    <input type="text" class="form-control" id="tq"  name="s_m_i_qty">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    <div class="row" id="discount" style="display:none">
                        Discount
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                                <label for="tq">Target Quantity</label>
                                <input type="text" class="form-control" id="tq"  name="s_m_i_d_target_qty">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                                <label for="tq">Achieve Discunt (%)</label>
                                <input type="text" class="form-control" id="tq"  name="s_m_i_discount">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="cashIncentive" style="display:none">
                        Cash Incentive
                        <div class="col-md-12" style="margin-top:20px;" id="productid">
                            Select Dealer
                            <div class="form-group m-b-40">
                                <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="dogid" name="product_id">
                                    <option value="">Select Dealer</option>
                                    @foreach($dealers as $dealer)
                                        <option value="{{$dealer->id}}">{{$dealer->d_s_code}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                                <label for="tam">Target Amount</label>
                                <input type="text" class="form-control" id="tam"  name="s_m_tc_target_amount">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                                <label for="ta">Achieve Discunt (%)</label>
                                <input type="text" class="form-control" id="ta"  name="s_m_tc_discount">
                                <span class="text-danger"></span>
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
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
<script>
$(document).ready (function(){
$("#sales_promo_c").on("change",function(){
        var e = document.getElementById("sales_promo_c");
        var ddvalue = e.options[e.selectedIndex].value;
        if(ddvalue == 'free')
        {
        document.getElementById("free").style.display = "";
        document.getElementById("discount").style.display = "none";
        document.getElementById("cashIncentive").style.display = "none";
        }
        if(ddvalue == 'discount')
        {
        document.getElementById("free").style.display = "none";
        document.getElementById("discount").style.display = "";
        document.getElementById("cashIncentive").style.display = "none";
        }
        if(ddvalue == 'cashin')
        {
        document.getElementById("free").style.display = "none";
        document.getElementById("discount").style.display = "none";
        document.getElementById("cashIncentive").style.display = "";
        document.getElementById("productid").style.display = "none";
        }
        console.log(ddvalue);
    
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
