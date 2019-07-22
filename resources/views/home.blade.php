@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','EPL')
@push('breadcrumb')
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">EPL</a></li>
@endpush
@section('page-content')
   <div class="row">
       <div class="card" style="width:100%;height: 485px;">
           <div class="card-header">
                Card heaer
           </div>
           <div class="card-body">
               Card body
           </div>
       </div>
   </div>
@endsection
