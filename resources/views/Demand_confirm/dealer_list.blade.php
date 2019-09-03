@extends('layouts.app-layout')
@section('page-content')
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="col-md-12" style="padding-left: 0px;">
    <div class="card" style="height: 535px;">
            <div class="card-body">
            <form class="floating-labels m-t-40" action=""method="POST">
                @csrf
                    <div class="form-group m-b-40">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label>Select Dealer</label>
                            <select class="form-control" style="padding: 0px 10px 10px 10;" name="dealer_id">
                                <option>Select Dealer Code</option>
                                @foreach($dealer_lists as $dealer)
                                <option value="{{$dealer->dealer_id}}">   {{$dealer->d_s_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                    <table class="table" style="display:none" id='tbl'>
                        <caption>Confirm Product Order List</caption>
                        <thead>
                            <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Demand Qty</th>
                            <th scope="col">Approve Qty</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>

                
            </div>
        </div>


		
		
    </div>
</div>
@endsection
@push('end_js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years", 
        minViewMode: "years"
    });
</script>
<script>
// list pagination by datatable
$(document).ready(function() {
    $('#example').DataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    } );
    console.log($('#uspid').val());
    
} );
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="dealer_id"]').on('change',function(){
            var dealerid = $(this).val();
            console.log(dealerid);
            if(dealerid)
            {
                $.ajax({
                    url: '/demand-confirm/productlist/'+dealerid,
                    type: 'GET',
                    dataType: 'json',

                    success:function(data)
        {
            console.log(data);
            
            document.getElementById('tbl').style.display = 'block';        
            var res='';
            $.each (data, function (key, value) {
           
            if(value.partial_a_s==1){
                res += 
            '<tr>'+               
            '<td>'+value.product_name+'</td>'+
                '<td>'+value.demand_qty+'</td>'+
                '<td>'+value.approve_qty+'</td>'+
                '<td> <input type="checkbox" value="1" name="nnn">afsfs</br></td>'+
           '</tr>';

        }else{
            res +=  
            '<tr>'+               
                '<td>'+value.product_name+'</td>'+
                '<td>'+value.demand_qty+'</td>'+
                '<td>'+value.demand_qty+'</td>'+
                '<td> <input type="checkbox" value="1" name="nnn">afsfs</br></td>'+
           '</tr>';
        }

   });

            $('tbody').html(res);
        }


                });
            }
        });
    });
</script>

@endpush