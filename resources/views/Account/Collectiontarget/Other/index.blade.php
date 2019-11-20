
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
            <div class="row">
                <div class="col-md-3">
                Dealer Target
                </div>
                <div class="col-md-9" align="right">
                    <a href="{{route('other.collection.otarget.set')}}" class="btn btn-primary btn-sm">Target Set</a>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>SI. No</th>
                                <th>Name</th>
                                <th>Target Time</th>
                                <th>Target Amount</th>
                                <th>Commistion(%)</th>
                                <th>Achieve Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($otherstars as $ottar)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$ottar->emp_name}}</td>
                                <td align="center">{{$ottar->from_date}} </br> TO </br> {{$ottar->to_date}}</td>
                                <td>{{$ottar->traget_amount}}</td>
                                <td>{{$ottar->achieve_commistion}} %</td>
                                <td>Calculeting..</td>
                                <td></td>
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