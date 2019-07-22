@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')

@endpush

@section('page-content')
<div class="">
<!-- employee partial deshboard -->
<div class="row">
    <div class="col-md-3">
        @include('hrmdeshboardsidemenu.hrmdeshboard')
    </div>
    <div class="col-md-9">
        @include('employee._partials_employee_add.emp-dashboard') 
    </div>
</div>
</div>
</div>
@endsection
@push('end_js')
@endpush