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
                <form class="floating-labels m-t-40" action="{{Route('confirm.list.get')}}"method="POST">
                @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label>Select Dealer</label>
                            <select class="form-control" style="padding: 0px 10px 10px 10;" name="dealer_id">
                                <option>Select Dealer Code</option>
                                @foreach($confirm_dealer_list as $confirmdealerlist)
                                <option value="{{$confirmdealerlist->dealer_id}}">   {{$confirmdealerlist->dlr_code}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label>Select Demand Number</label>
                            <select class="form-control" style="padding: 0px 10px 10px 10;" id="dlcode" name="demand_no">
                                <option>Select Dealer Code</option>
                               
                            </select>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>
                    </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm" value="Search">
                </form>                
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
$(document).ready(function(){
    $('select[name="dealer_id"]').on('change',function(){
        var dlrid = $(this).val();
        console.log(dlrid);
        if(dlrid){
            $.ajax({
                url: '/dealer/demandno/get/'+dlrid,
                type:"GET",
                dataType:'json',
                success: function(data){
                    console.log(data); 

                    var selOpts = "";
            for (i=0;i<data.length;i++)
            {
                var id = data[i]['demand_confirm_no'];
                selOpts += "<option value='"+id+"'>"+id+"</option>";
            }
            $('#dlcode').append(selOpts);
            }
            });
        }
    });
});
</script>
@endpush