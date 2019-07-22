@extends('layouts.app-layout')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
@endpush

@section('page-content')
    
    <div class="card">
        <div class="card-header">
            <h4>Add New Employee</h4>
        </div>
        <div class="card-body">
        <form class="floating-labels m-t-40" action="{{route('employee.update',$users[0]->id)}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
  {{csrf_field()}}
                <div class="row">
                
                    <div class="col-md-12">
                     <!-- user info start -->
                        <div id="emp-reg" class="emp-reg">
                            <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">User Registration</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40  {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <input type="text" class="form-control" value="{{$users[0]->name}}" id="empname" name="name">
                                        <label for="empname">Employee name</label>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                    
                                </div>               
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 {{ $errors->has('email') ? 'has-error' : '' }}" >
                                        <input type="text" class="form-control" value="{{$users[0]->email}}" id="empmail" name="email">
                                        <label for="empmail">E-mail</label>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>               
                            </div>
                            
                        </div>  
                     <!-- user info end -->

                     <!-- user profile info start -->
                        <div id="emp-profile" class="emp-profile" >
                            <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">User Profile</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 ">
                                        <label>Department</label>
                                        <select name="department_id" class="form-control">
                                            <option value="{{$users[0]->department_id}}">{{$users[0]->dname}}</option>
                                            @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    <div class="form-group m-b-40 " style="margin-top: 12.2%;">
                                        <input type="text" class="form-control" value="{{$users[0]->phone_number}}" id="pnumber" name="phone_number">
                                        <label for="pnumber">Phone Number</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <h5>Select Gender</h5>
                                        <div class="demo-radio-button">
                                        @if($users[0]->gender=='Male')
                                            <input name="gender" type="radio" value="{{$users[0]->gender}}" checked id="male" class="with-gap radio-col-red" />
                                            <label for="male">Male</label>
                                            <input name="gender" type="radio" value="{{$users[0]->gender}}"  id="female" class="with-gap radio-col-pink" />
                                            <label for="female">Female</label>
                                        @elseif($users[0]->gender=='Female')
                                            <input name="gender" type="radio" value="{{$users[0]->gender}}"  id="male" class="with-gap radio-col-red" />
                                            <label for="male">Male</label>
                                            <input name="gender" type="radio" value="{{$users[0]->gender}}" checked id="female" class="with-gap radio-col-pink" />
                                            <label for="female">Female</label>
                                        @else
                                            <input name="gender" type="radio" value="{{$users[0]->gender}}"  id="male" class="with-gap radio-col-red" />
                                            <label for="male">Male</label>
                                            <input name="gender" type="radio" value="{{$users[0]->gender}}"  id="female" class="with-gap radio-col-pink" />
                                            <label for="female">Female</label>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-b-40 {{ $errors->has('present_address') ? 'has-error' : '' }}" >
                                        <input type="text" class="form-control" value="{{$users[0]->present_address}}" id="paddress" name="present_address">
                                        <label for="paddress">Present Address</label>
                                        <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" value="{{$users[0]->passport}}" id="passport" name="passport">
                                        <label for="passport">Passport</label>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group m-b-40">
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="input-file-now-custom-1">Upload user Image</label>
                                                <input type="file" id="input-file-now-custom-1" name="image" style="margin-top: 20px;" class="dropify" value="/storage/userpic/{{$users[0]->image}}"  data-default-file="/storage/userpic/{{$users[0]->image}}" />
                                            </div>
                                        </div>
                                    <span class="text-danger">{{ $errors->first('designation_id') }}</span>                             </div>
                                </div>    

                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <label for="input1">Designation</label>
                                        <select name="designation_id" class="form-control">
                                            <option value="{{$users[0]->designation_id}}">{{$users[0]->desname}}</option>
                                            @foreach($designations as $designation)
                                                <option value="{{$designation->id}}">{{$designation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <label style="position: initial;" for="dob">Date Of Birth</label>
                                        <input type="date" class="form-control" value="{{$users[0]->dob}}" id="dob" name="dob">
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <h5>Maritial Status</h5>
                                        <div class="demo-radio-button">
                                        @if($users[0]->maritial_status=='Married')
                                            <input name="maritial_status" type="radio" value="{{$users[0]->maritial_status}}" checked id="m" class="with-gap radio-col-red" />
                                            <label for="m">Married</label>
                                            <input name="maritial_status" type="radio" value="{{$users[0]->maritial_status}}" id="unm" class="with-gap radio-col-pink" />
                                            <label for="unm">Unmarried</label>
                                        @elseif($users[0]->maritial_status=='Unmarried')
                                            <input name="maritial_status" type="radio" value="{{$users[0]->maritial_status}}"  id="m" class="with-gap radio-col-red" />
                                            <label for="m">Married</label>
                                            <input name="maritial_status" type="radio" value="{{$users[0]->maritial_status}}" checked id="unm" class="with-gap radio-col-pink" />
                                            <label for="unm">Unmarried</label>
                                        @else
                                            <input name="maritial_status" type="radio" value="{{$users[0]->maritial_status}}"  id="m" class="with-gap radio-col-red" />
                                            <label for="m">Married</label>
                                            <input name="maritial_status" type="radio" value="{{$users[0]->maritial_status}}"  id="unm" class="with-gap radio-col-pink" />
                                            <label for="unm">Unmarried</label>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-b-40 {{ $errors->has('permanent_address') ? 'has-error' : '' }}" >
                                        <input type="text" class="form-control" value="{{$users[0]->permanent_address}}" id="peaddress" name="permanent_address">
                                        <label for="peaddress">Permanent Address</label>
                                        <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                    </div>
                                    <div class="form-group m-b-40 {{ $errors->has('nid') ? 'has-error' : '' }}" >
                                        <input type="text" class="form-control" value="{{$users[0]->nid}}" id="nid" name="nid">
                                        <label for="nid">NID</label>
                                        <span class="text-danger">{{ $errors->first('nid') }}</span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" value="{{$users[0]->tex_code}}" id="texcode" name="tex_code">
                                        <label for="texcode">Tax Code</label>
                                        <span class="text-danger"></span>
                                    </div>
                                                                        
                                </div>               
                            </div>
                            
                        </div>
                     <!-- user profile info end -->

                     <!-- user emploment history info start -->                        
                        <div id="emp-history" class="emp-history" >
                            <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">Employment History</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <label for="input1">Employment Type</label>
                                        <select class="form-control"name="employment_type_id">
                                            <option value="{{$users[0]->employment_type_id}}">{{$users[0]->etname}}</option>
                                            @foreach($employments as $empolment)
                                            <option value="{{$empolment->id}}">{{$empolment->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group m-b-40 {{ $errors->has('registration_date') ? 'has-error' : '' }}" >
                                        <label style="position: initial;" for="redate">Registration Date</label>
                                        <input type="date" class="form-control" value="{{$users[0]->registration_date}}" id="redate" name="registration_date">
                                        <span class="text-danger">{{ $errors->first('registration_date') }}</span>
                                      
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" value="{{$users[0]->promotion}}" id="promotion" name="promotion">
                                        <label for="promotion">Promotion</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 "style="margin-top: 12.2%;" >
                                        <input type="text" class="form-control" value="{{$users[0]->increment}}" id="incrimint" name="increment">
                                        <label  for="incrimint">Increment</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <div class="form-group">
                                            <label for="" style="position: initial;"> Select Leave Type</label>
                                            <select name="leave_id[]" style="padding: 0px 10px 10px 10; " class="form-control" id="leave" multiple>
                                                @foreach($leaves as $leave)
                                                <option value="{{ $leave->id }}" {{$users[0]->lid == $leave->id  ? 'selected' : ''}}>{{$leave->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- <input type="text" class="form-control" id="leave" name="leave_id">
                                        <label for="leave">Leave</label>
                                        <span class="text-danger"></span> -->
                                    </div>
                                </div>    
                                
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <label for="input1">Working Place</label>
                                        <select class="form-control" name="working_place_id">
                                        <option value="{{$users[0]->wid}}">{{$users[0]->wpname}}</option>
                                            @foreach($workingplaces as $workingplace)
                                            <option value="{{$workingplace->id}}">{{$workingplace->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group m-b-40 {{ $errors->has('joining_date') ? 'has-error' : '' }}" >
                                        <label style="position: initial;" for="joindate">Joining date</label>  
                                        <input type="date" class="form-control" value="{{$users[0]->joining_date}}" id="joindate" name="joining_date">
                                        <span class="text-danger">{{ $errors->first('joining_date') }}</span>                                        
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <label style="position: initial;" for="perdate">Permanent Date</label>
                                        <input type="date" class="form-control" value="{{$users[0]->permanent_date}}" id="perdate" name="permanent_date">
                                       
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" value="{{$users[0]->office_mobile_number}}" id="omn" name="office_mobile_number">
                                        <label for="omn">Official Mobile No</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <label style="position: initial;" for="input1">Increment Date</label>
                                        <input type="date" class="form-control" value="{{$users[0]->increment_date}}" id="" name="increment_date">
                                        
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                    <img height="140px" id="output"/>
                                    </div>
                                </div>               
                            </div>
                            
                        </div>
                     <!-- user emploment history info end -->                                                    
                            
                        <!-- button row -->
                        <div class="class row save" style="margin-top:20px; ">
                            <div class="class col-md-4"></div>
                            <div class="class col-md-4">
                            <button type="submit" class="btn btn-primary savebbtn" id="savebbtn" style="width: 100%;">Update</button>
                            </div>
                            <div class="class col-md-4"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('end_js')
<!-- jQuery file upload -->
<script src="{{asset('js/dropify.min.js')}}"></script>
<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endpush