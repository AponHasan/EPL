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
                    <form class="floating-labels m-t-40" action="{{Route('store.incentive.promotion')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group m-b-40">
                                <label for="area_title">Promotional Title</label>
                                    <input type="text" class="form-control" id="sptitle"  name="sales_promotions_title">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="cashIncentive" >
                            <div class="col-md-12" style="margin-top:20px;" >
                            Select Dealer
                                <div class="form-group m-b-40">
                                    <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true" id="dogid" name="dealer_id">
                                        <option value="">Select Dealer</option>
                                        @foreach($dealers as $dealer)
                                        <option value="{{$dealer->id}}">{{$dealer->d_s_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                                <label for="tam">Target Amount</label>
                                <input type="text" class="form-control" id="tam"  name="target_amount">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                                <label for="ta" >Achieve Discunt (%)</label>
                                <input type="text" class="form-control" id="ta"  name="achive_discount">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                                <label for="fdate" style="position: inherit;">From Date</label>
                                <input type="date" class="form-control" id="fdate"  name="fdate">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group m-b-40">
                                <label for="tdate" style="position: inherit;">To Date</label>
                                <input type="date" class="form-control" id="tdate"  name="tdate">
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
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });

 $(document).ready (function(){
            $("#danger-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush
