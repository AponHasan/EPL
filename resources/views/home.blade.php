@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','EPL')
@push('breadcrumb')
<li class="breadcrumb-item"><a style="color:#fff" href="javascript:void(0)">EPL</a></li>
@endpush
@section('page-content')
   <div class="row">
   <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
       <div class="card" style="width:100%;height: auto;">
           <div class="card-header">
                Comments 
           </div>
           <div class="card-body">
                <div class="comment-post">
                    <form class="floating-labels m-t-40" action="{{route('comment.post')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group m-b-40">
                                <label for="sop_name">Name</label>
                                    <input type="text" class="form-control" id="sop_name"  name="name">
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-12">
                                <div class="form-group m-b-5">
                                    <textarea class="form-control" rows="4" id="input7" name="description"></textarea>
                                    <span class="bar"></span>
                                    <label for="input7">Comments</label>
                                </div>
                            </div>
                        </div>
                        <!-- button row -->
                        <div class="class row" style="margin-top:20px;margin-bottom:30px">
                            <div class="class col-md-4"></div>
                            <div class="class col-md-6">
                            
                            </div>
                            <div class="class col-md-2">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
                @foreach($comment as $comments)
                <div class="comment-get">
                <h4>{{$comments->name}}<span style="font-size: 13px;font-style: italic;margin-left: 5px;">  {{$comments->comments_time}}</span></h4>
                <div class="post">
                    <p>{{$comments->description}}</p>
                </div>
                </div>
                @endforeach
           </div>
       </div>
   </div>
@endsection
@push('end_js')
<script>
$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush