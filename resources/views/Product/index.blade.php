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
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success"id="success-alert">
                    <p style="color:#fff;font-weight:bold" >{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('delete'))
                <div class="alert alert-danger" style="background-color:red"  id="danger-alert">
                    <p style="color:#fff;font-weight:bold">{{ $message }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="">
    <div class="card" style="height: 535px;">
            <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                <h4 class="card-title">Product List</h4>
                </div>
                <div class="col-md-2">
                <a href="{{Route('product.create')}}" class="btn btn-primary tn-sm">New Product</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Si.No</th>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Product Dimension</th>
                                <th>Description</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_code}}</td>
                                    <td>{{$product->product_dimension}} {{$product->product_dimension_unit}}</td>
                                    <td>{{$product->product_description}}</td>
                                    <td style="text-align: center;">
                                    <a href="#" class="btn btn-danger btn-sm" data-myid="{{$product->id}}" data-mytitle="" data-toggle="modal" data-target="#delete"><i class="ti-trash"></i></a>
                    <a href="#" class="show-modal  btn btn-warning btn-sm" alt="default" data-myid="{{$product->id}}" data-mytitle="{{$product->product_name}}" data-mycode="{{$product->product_code}}" data-mydimension="{{$product->product_dimension}}" data-mydimensionunit="{{$product->product_dimension_unit}}" data-myweight="{{$product->product_weight}}" data-myweightunit="{{$product->product_weight_unit}}" data-mybarcode="{{$product->product_barcode}}" data-mymrp="{{$product->product_mrp}}" data-mycolor="{{$product->product_color}}" data-myprice="{{$product->product_dp_price}}" data-mycommision="{{$product->product_dealer_commision}}" data-mydescription="{{$product->product_description}}" scription alt="default" data-toggle="modal" data-target="#edit" ><i class="ti-settings"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: red;color:#fff">
        <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      

      <form action="{{route('product.destroy','test')}}"method="POST">
            {{method_field('delete')}}
            @csrf
      <div class="modal-body" >
        <p>Are You Sure You Want To Delete this...!</p> 
        <!-- <input type="disable" class="form-control" id="mtitle" name="id"> -->
        <input type="hidden" class="form-control" id="mid" name="id">
      </div>
      <div class="modal-footer" align="center">
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">No Cancle</button>
        <button type="submit" class="btn btn-danger btn-sm">Yes Delete</button>
      </div>
      </form>
  
    </div>
  </div>
</div>

<div id="edit" class="modal fade lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Update Department</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="floating-labels m-t-40" action="{{route('product.update','test')}}"method="POST">
                    {{method_field('patch')}}
                    @csrf
                    <div class="form-group m-b-40 {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="hidden" class="form-control" id="mid" name="id">
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="mtitle" style="position: initial;">Item Name</label>
                                <input type="text" class="form-control" id="mtitle"  name="product_name">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pcode" style="position: initial;">Item Code</label>
                                <input type="text" class="form-control" id="mcode"  name="product_code">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pdimension" style="position: initial;">Item Dimension</label>
                                <input type="text" class="form-control" id="mdimension" style="margin-top: 0px;"  name="product_dimension">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pdimension" style="position: inherit;">Dimension Unit</label>
                                <select class="form-control" id="mdimensionunit" style="padding: 0px 10px 10px 10;" name="product_dimension_unit">
                                <option value="">Select Dimension Unit</option>
                                <option value="cm">cm</option>
                                <option value="mm">mm</option>
                                <option value="litter">litter</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="Weight" style="position: initial;">Item Weight</label>
                                <input type="text" class="form-control" id="mweight" style="margin-top: 0px;"  name="product_weight">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <label for="pdimension" style="position: inherit;">Item Weight Unit</label>
                                <select class="form-control" id="mweightunit" style="padding: 0px 10px 10px 10;" name="product_weight_unit">
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
                                <select class="form-control p-input text-dark inputv" id="mcolor" name="product_color">
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
                            <label for="barcode" style="position: initial;">Barcode</label>
                                <input type="text" class="form-control" id="mbarcode"  name="product_barcode">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dpprice" style="position: initial;">DP Price</label>
                                <input type="text" class="form-control" id="mprice"  name="product_dp_price">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dc" style="position: initial;"> Dealer Commission (%)</label>
                                <input type="text" class="form-control" id="mcommision"  name="product_dealer_commision">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="mrp" style="position: initial;">MRP</label>
                                <input type="text" class="form-control" id="mmrp"  name="product_mrp">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group m-b-5">
                            <label for="mdescription" style="position: initial;">Description</label>
                                <textarea class="form-control" rows="4" id="mdescription" name="product_description"></textarea>
                                <span class="bar"></span>
                                
                            </div>
                        </div>
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
@endsection
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

    // Edit
    $('#edit').on('show.bs.modal',function(event){
        console.log('hello test');
        var button = $(event.relatedTarget)
        var title = button.data('mytitle')
        var code =  button.data('mycode')
        var description = button.data('mydescription')
        var id = button.data('myid')
        var dimension = button.data('mydimension')
        var dimensionunit = button.data('mydimensionunit')
        var weight = button.data('myweight')
        var weightunit = button.data('myweightunit')
        var barcode = button.data('mybarcode')
        var mrp = button.data('mymrp')
        var color = button.data('mycolor')
        var price = button.data('myprice')
        var commision = button.data('mycommision')
        

        var modal =$(this)
        modal.find('.modal-body #mtitle').val(title);
        modal.find('.modal-body #mdescription').val(description);
        modal.find('.modal-body #mid').val(id);
        modal.find('.modal-body #mcode').val(code);
        modal.find('.modal-body #mdimension').val(dimension);
        modal.find('.modal-body #mdimensionunit').val(dimensionunit);
        modal.find('.modal-body #mweight').val(weight);
        modal.find('.modal-body #mweightunit').val(weightunit);
        modal.find('.modal-body #mbarcode').val(barcode);
        modal.find('.modal-body #mmrp').val(mrp);
        modal.find('.modal-body #mcolor').val(color);
        modal.find('.modal-body #mprice').val(price);
        modal.find('.modal-body #mcommision').val(commision);
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