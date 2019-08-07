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
    <div class="col-md-12">
    <!-- card -->
        <div class="card">
            <!-- card body -->
            <div class="card-body">
            <h3>Create Product</h3>
            <!-- Create department -->
                <form class="floating-labels m-t-40" action="{{Route('product.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pname">Item Name</label>
                                <input type="text" class="form-control" id="pname"  name="product_name">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pcode">Item Code</label>
                                <input type="text" class="form-control" id="pcode"  name="product_code">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pdimension">Item Dimension</label>
                                <input type="text" class="form-control" id="pdimension" style="margin-top: 30px;"  name="product_dimension">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pdimension" style="position: inherit;">Dimension Unit</label>
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="product_dimension_unit">
                                <option value="">Select Dimension Unit</option>
                                <option value="cm">cm</option>
                                <option value="mm">mm</option>
                                <option value="litter">litter</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="Weight">Item Weight</label>
                                <input type="text" class="form-control" id="Weight" style="margin-top: 30px;"  name="product_weight">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <label for="pdimension" style="position: inherit;">Item Weight Unit</label>
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="product_weight_unit">
                                    <option value="">Select Item Weight Unit</option>
                                    <option value="KG">KG</option>
                                    <option value="gm">gm</option>
                                    <option value="Litter">Litter</option>
                                    <option value="ml">ml</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <label>Color</label>
                                <select class="form-control p-input text-dark inputv" id="dogid" name="product_color">
                                    <option >Select Color</option>
                                    <option value="White">White</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Black">Black</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Gray">Gray</option>
                                </select>
                            </div>
                        </div>
                        	
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="barcode">Barcode</label>
                                <input type="text" class="form-control" id="barcode"  name="product_barcode">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dpprice">DP Price</label>
                                <input type="text" class="form-control" id="dpprice"  name="product_dp_price">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dc"> Dealer Commission (%)</label>
                                <input type="text" class="form-control" id="dc"  name="product_dealer_commision">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="mrp">MRP</label>
                                <input type="text" class="form-control" id="dpprice"  name="product_mrp">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group m-b-5">
                                <textarea class="form-control" rows="4" id="input7" name="product_description"></textarea>
                                <span class="bar"></span>
                                <label for="input7">Description</label>
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
        var description = button.data('mydescription')
        var id = button.data('myid')

        var modal =$(this)
        modal.find('.modal-body #mtitle').val(title);
        modal.find('.modal-body #mdescription').val(description);
        modal.find('.modal-body #mid').val(id);
    })

    $('#pname').on('keyup',function(){
    // alert("The text has been changed.");
    var pnamevalue = document.getElementById('pname').value();
    // var pnamelen = pnamevalue.length;
    console.log(pnamevalue);
})

// Delete
$('#delete').on('show.bs.modal',function(event){
        console.log('hello test');
        var button = $(event.relatedTarget)
        var title = button.data('mytitle')
        var id = button.data('myid')

        var modal =$(this)
        modal.find('.modal-body #mtitle').val(title);
        modal.find('.modal-body #mid').val(id);
    })


$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });

 $(document).ready (function(){
            $("#danger-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush