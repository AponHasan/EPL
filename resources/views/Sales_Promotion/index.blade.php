@extends('layouts.app-layout')
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
    <div class="col-md-12" style="padding-left: 0px;">
        <div class="card" style="height: auto;">
        <div class="card-header">
            Item Free Offer
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Title</th>
                                <th>Product Name</th>
                                <th>Target QTY</th>
                                <th>Achieve QTY</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($freequerys as $freequery)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$freequery->sales_promotions_title}}</td>
                                <td>{{$freequery->product_name}}</td>
                                <td>{{$freequery->s_m_i_target_qty}}</td>
                                <td>{{$freequery->s_m_i_qty}}</td>
                                <td>
                                    @if($freequery->s_m_a_status == 0)
                                        <form  action="{{Route('promotion.status.active')}}" method="post">
                                        @csrf 
                                        <input type="hidden" value="{{$freequery->id}}" name="s_p_id">
                                        <button type="submit" class="btn btn-success btn-sm" style="width: 100%;">Active</button>
                                        </form>
                                    @else
                                        <form  action="{{Route('promotion.status.deactive')}}" method="post">
                                        @csrf 
                                        <input type="hidden" value="{{$freequery->id}}" name="s_p_id">
                                        <button type="submit" class="btn btn-warning btn-sm" style="width: 100%;">Deactivate</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
    
    <div class="col-md-12" style="padding-left: 0px;">
        <div class="card" style="height: auto;">
            <div class="card-header">
            Item Discount Offer
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Title</th>
                                <th>Product Name</th>
                                <th>Target QTY</th>
                                <th>Achieve Discount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($discquerys as $discquery)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$discquery->sales_promotions_title}}</td>
                                <td>{{$discquery->product_name}}</td>
                                <td>{{$discquery->s_m_i_d_target_qty}}</td>
                                <td>{{$discquery->s_m_i_discount}}</td>
                                <td>
                                    @if($discquery->s_m_a_status == 0)
                                        <form  action="{{Route('promotion.status.active')}}" method="post">
                                        @csrf 
                                        <input type="hidden" value="{{$discquery->id}}" name="s_p_id">
                                        <button type="submit" class="btn btn-success btn-sm" style="width: 100%;">Active</button>
                                        </form>
                                    @else
                                        <form  action="{{Route('promotion.status.deactive')}}" method="post">
                                        @csrf 
                                        <input type="hidden" value="{{$discquery->id}}" name="s_p_id">
                                        <button type="submit" class="btn btn-warning btn-sm" style="width: 100%;">Deactivate</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12" style="padding-left: 0px;">
        <div class="card" style="height: auto;">
            <div class="card-body">
                        <h4 class="card-title"> Discount Incentive Offer</h4>
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Title</th>
                                <th>Product Name</th>
                                <th>Target Amount</th>
                                <th>Achieve Incentive</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($discquerys as $discquery)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$discquery->sales_promotions_title}}</td>
                                <td>{{$discquery->product_name}}</td>
                                <td>{{$discquery->s_m_i_d_target_qty}}</td>
                                <td>{{$discquery->s_m_i_discount}}</td>
                                <td>
                                    @if($discquery->s_m_a_status == 0)
                                        <form  action="{{Route('promotion.status.active')}}" method="post">
                                        @csrf 
                                        <input type="hidden" value="{{$discquery->id}}" name="s_p_id">
                                        <button type="submit" class="btn btn-success btn-sm" style="width: 100%;">Active</button>
                                        </form>
                                    @else
                                        <form  action="{{Route('promotion.status.deactive')}}" method="post">
                                        @csrf 
                                        <input type="hidden" value="{{$discquery->id}}" name="s_p_id">
                                        <button type="submit" class="btn btn-warning btn-sm" style="width: 100%;">Deactivate</button>
                                        </form>
                                    @endif
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
$(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
<script>

$(function () {
    $('act').on('click', function () {
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: 'sales/promo/status',
            data: {
                // text: $("textarea[name=Status]").val(),
                // Status: Status
            },
            dataType : 'json'
        });
    });
});




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


$(function () {
    $('input').on('click', function () {
        var Status = $(this).val();
        $.ajax({
            url: 'Ajax/StatusUpdate.php',
            data: {
                text: $("textarea[name=Status]").val(),
                Status: Status
            },
            dataType : 'json'
        });
    });
});

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

