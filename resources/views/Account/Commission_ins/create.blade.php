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
                <form class="floating-labels m-t-40" action="{{Route('commission.incentive.store')}}"method="POST">
                    @csrf
                    <div class="row" style="margin-left:5%">
                        <div class="col-md-8"  id="cash">
                            <div class="form-group m-b-40">
                            <label for="title" style="position: inherit;">Title</label>
                                <input type="text" class="form-control" id="title"  name="title">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-8"  id="cash">
                            <div class="form-group m-b-40">
                            <label for="tamount" style="position: inherit;">Target Amount</label>
                                <input type="text" class="form-control" id="tamount"  name="target_amount">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group m-b-40">
                            <label for="pstation" style="position: inherit;">Achieve Commision (%)</label>
                                <input type="text" class="form-control" id="inc"  name="achive_commision">
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

                        <!-- button row -->
                        <div class="class col-md-2"></div>
                            <div class="class col-md-4" style="margin-top:30px; margin-bottom:30px">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Incentive Set</button>
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
  
</script>
@endpush