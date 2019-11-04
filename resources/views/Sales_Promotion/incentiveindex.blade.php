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
        Incentive Offer
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display " style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Title</th>
                                <th>Dealer Name</th>
                                <th>Target Amount</th>
                                <th>Achieve Discount (%)</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($incentives as $incentive)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$incentive->sales_promotions_title}}</td>
                                <td>{{$incentive->dealerid}}</td>
                                <td>{{$incentive->target_amount}}</td>
                                <td>{{$incentive->achive_discount}}</td>
                                <td>{{$incentive->fdate}}</td>
                                <td>{{$incentive->tdate}}</td>
                                <td>
                                   
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

