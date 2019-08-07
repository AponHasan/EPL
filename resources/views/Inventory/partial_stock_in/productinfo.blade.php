
		<div class="hr" style="width: 100%;background-color: black;height: 3px;">
		</div>
<div id="goods_container">	
	<div class="row container1">
		<div class="col-sm-3 form-group">
			<label>Product Code</label>
			<select class="form-control p-input text-dark inputv" id="dogid" name="prouct_id[]">
				<option value="">Select Product</option>
				@foreach($products as $product)
				<option value="{{$product->id}}">{{$product->product_name}}</option>
				@endforeach
			</select>
        </div>

		<div class="col-sm-3 form-group m-b-40">
			<label for="qtyid">Quantity</label>
			<input  type="number" onkeypress="isInputNumber(event)" class="form-control inputv qty" id="qtyid"  name="quantity[]">
			<span class="text-danger"></span>
		</div>
		<div class="col-sm-3 form-group">
			<label>Warehouse</label>
			<select class="form-control p-input text-dark inputv" id="dogid" name="factory_id[]">
				<option value="">Select Warehouse</option>
				@foreach($warehouses as $warehouse)
				<option value="{{$warehouse->id}}">{{$warehouse->factory_name}}</option>
				@endforeach
			</select>
        </div>
	</div>
</div>
<div class="modal fade" id="numberModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title">Modal Header</h4> -->
        </div>
        <div class="modal-body">
          <p style="color: red; font-weight: bold;">Character dosen't support in here.</p>
          <p style="color: green; font-weight: bold;">Enter Number only Please.</p>
        </div>
        <div class="modal-footer" align="center">
          <button  type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
        </div>
      </div>
      
    </div>
  </div>