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
    <form action="{{Route('dealer.password')}}" method="POST">
        @csrf
        <div class="card-header">
        Dealer Password Set
        </div>
        <div class="card-boy">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <label> Dealer Code*</label> 
                        <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true"  name="dealer_id"  id="dealer" required>
                            <option value="">Select Dealer</option>
                            @foreach($dealers as $dealer)
                            <option value="{{$dealer->id}}">{{$dealer->dlr_code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                             <label for="">Dealer Name</label>
                            <input class="form-control"  id="d_name"  name="dealer_name" value="" type="text" Readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Dealer Mail</label>
                            <input class="form-control" id="dlno"  name="dealer_mail" value="" type="email" />
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input class="form-control" id="dlno"  name="dealer_password" value="" type="password" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center m-t-20" style="margin-bottom: 10%;">
            <button class="btn btn-primary submit-btn" type="submit" id="dgbtn">Set Password</button>
        </div>
    </form>
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

</script>

@endpush