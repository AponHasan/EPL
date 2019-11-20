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
                SPO Target Set
                </div>
                <div class="col-md-9" align="right">
                    <a href="{{route('spo.collection.starget')}}" class="btn btn-primary btn-sm">Target List</a>
                </div>
            </div>
        </div>
            <!-- card body -->
            <div class="card-body">
            
            <!-- Create department -->
                <form class="floating-labels m-t-40" action="{{Route('spo.target.set')}}"method="POST">
                    @csrf
                    <div class="row" style="margin-left:5%">
                        <div class="col-md-8">
                            <div class="form-group m-b-40">
                                <label style="position: inherit;">SPO</label>
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="emp_id">
                                <option value="">Select SPO</option>
                                    @foreach($emps as $emp)
                                    <option value="{{$emp->id}}">{{$emp->emp_name}}</option>
                                    @endforeach
                                </select>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="form-group m-b-40">
                                <label style="position: inherit;">Target Amount</label>
                                <input type="text" class="form-control" id="targeta"  name="traget_amount">
                            </div>
                        </div> 
                        <div class="col-md-8">
                            <div class="form-group m-b-40">
                                <label style="position: inherit;">Achieve Commision (%)</label>
                                <input type="text" class="form-control" id="commition"  name="achieve_commistion">
                            </div>
                        </div>                       
                        <div class="col-md-8">
                            <div class="form-group m-b-40">
                            <label for="pstation" style="position: inherit;">From Date</label>
                                <input type="date" class="form-control" id="pstation"  name="from_date">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-8" style="" id="cash">
                            <div class="form-group m-b-40">
                                <label for="pstation" style="position: inherit;">To Date</label>
                                <input type="date" class="form-control" id="pstation"  name="to_date">
                                <span class="text-danger"></span>
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
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Set Target</button>
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