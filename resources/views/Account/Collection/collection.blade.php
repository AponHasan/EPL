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
    <div class="col-md-12">
    <!-- card -->
        <div class="card" style="">
        <div class="card-header">
            <div class="row">
                <div class="col-md-3">
                Collection
                </div>
                <div class="col-md-9" align="right">
                    <a href="{{route('collection.index')}}" class="btn btn-primary btn-sm">Collection List</a>
                </div>
            </div>
        </div>
            <!-- card body -->
            <div class="card-body">
            
            <!-- Create department -->
                <form class="floating-labels m-t-40" action="{{Route('collection.amount')}}"method="POST">
                    @csrf
                    <div class="row" style="margin-left:5%">
                        <div class="col-md-8">
                            <div class="form-group m-b-40">
                                <label style="position: inherit;">Dealer</label>
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="dealer_id">
                                <option value="">Select Dealer</option>
                                @foreach($dealers as $dealer)
                                <option value="{{$dealer->id}}">{{$dealer->dlr_code}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="form-group m-b-40">
                                <label style="position: inherit;">Collect Method</label>
                                <select class="form-control" id="select" style="padding: 0px 10px 10px 10;" name="collection_method">
                                    <option value="">Select Method</option> 
                                    <option value="Cash">Cash</option> 
                                    <option value="Check">Check</option>
                                </select>
                            </div>
                        </div>                        
                        <div class="col-md-8">
                            <div class="form-group m-b-40">
                            <label for="pstation" style="position: inherit;">Collection Date</label>
                                <input type="date" class="form-control" id="pstation"  name="collection_date">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-8" style="display:none" id="cash">
                            <div class="form-group m-b-40">
                            <label for="pstation" style="position: inherit;">Collection Amount</label>
                                <input type="text" class="form-control" id="pstation"  name="collection_amount">
                                <span class="text-danger"></span>
                            </div>
                        </div>

                        <div class="check" style="display:none" id="check">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group m-b-40">
                                    <label for="pstation" style="position: inherit;">Check Name</label>
                                        <input type="text" class="form-control" id="pstation"  name="check_name">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group m-b-40 col-md-8">
                                    <label style="position: inherit;">Select Bank</label>
                                    <select class="form-control" id="select" style="padding: 0px 10px 10px 10;" name="bank_id">
                                        <option value="">Select Bank</option> 
                                        @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->bank_name}}</option> 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group m-b-40">
                                    <label for="pstation" style="position: inherit;">Check Number</label>
                                        <input type="text" class="form-control" id="pstation"  name="check_number">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group m-b-40">
                                    <label for="pstation" style="position: inherit;">Check Date</label>
                                        <input type="date" class="form-control" id="pstation"  name="check_date">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group m-b-5">
                                <label for="input7" style="position: initial;">Description</label>
                                <input type="textarea" class="form-control" rows="4" id="mdescription" name="description">
                                <span class="bar"></span>
                            </div>
                        </div>
                    </div>

                    <!-- button row -->
                    <div class="class row" style="margin-top:20px;margin-bottom:30px">
                        <div class="class col-md-2"></div>
                        <div class="class col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Collect</button>
                        </div>
                        <div class="class col-md-4"></div>
                    </div>
                </form>
            </div><!-- end create department -->
            <!-- end card body -->
        </div><!-- end card -->
    </div> <!-- end col-7 -->
</div>
@endsection

@push('end_js')
<script>
    $('#select').on('change', function() {
        var x = $(this).find(":selected").val();

        if(x=="Cash")
        {
            var a = document.getElementById("cash");
            var b = document.getElementById("check");
            a.style.display = "";
            b.style.display = "none";
        }
        if(x=="Check")
        {
            var a = document.getElementById("cash");
            var b = document.getElementById("check");
            a.style.display = "";
            b.style.display = "";
        }
        if(x=="MobilePay")
        {
            var a = document.getElementById("cash");
            var b = document.getElementById("check");
            a.style.display = "";
            b.style.display = "none";
        }
        // console.log(x);
    });
</script>
@endpush