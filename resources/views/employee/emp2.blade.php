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
        <form class="floating-labels m-t-40" action="{{route('employee.store')}}"method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div id="emp-reg" class="emp-reg">
                            <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">User Registration</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Employee name</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Password</label>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>               
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">E-mail</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Confirm Password</label>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>               
                            </div>
                            <div class="class row next1" style="margin-top:20px;display:none" id="next1">
                                <div class="class col-md-10"></div>
                                <div class="class col-md-2">
                                    <a href="#" class="btn btn-warning btn-sm test">Next ></a>
                                </div>
                            </div>
                        </div>   


                        <div id="emp-profile" class="emp-profile" style="display:">
                            <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">User Profile</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <label>Department</label>
                                        <select class="form-control">
                                            <option>Department 1</option>
                                            <option>Department 2</option>
                                            <option>Department 3</option>
                                            <option>Department 4</option>
                                            <option>Department 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Phone Number</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <h5>Select Gender</h5>
                                        <div class="demo-radio-button">
                                            <input name="group3" type="radio" id="male" class="with-gap radio-col-red" />
                                            <label for="male">Male</label>
                                            <input name="group3" type="radio" id="female" class="with-gap radio-col-pink" />
                                            <label for="female">Female</label>
                                        </div>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Present Address</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">NID/Passport</label>
                                        <span class="text-danger"></span>
                                    </div>

                                    <div class="form-group m-b-40">
                                        <div class="card">
                                            <div class="card-body">
                                                <label for="input-file-now-custom-1">Upload user Image</label>
                                                <input type="file" id="input-file-now-custom-1" style="margin-top: 20px;" class="dropify" data-default-file="../assets/images/users/demopic.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>    


                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <label for="input1">Designation</label>
                                        <select class="form-control">
                                            <option>Designation 1</option>
                                            <option>Designation 2</option>
                                            <option>Designation 3</option>
                                            <option>Designation 4</option>
                                            <option>Designation 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Date Of Birth</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <h5>Maritial Status</h5>
                                        <div class="demo-radio-button">
                                            <input name="group3" type="radio" id="m" class="with-gap radio-col-red" />
                                            <label for="m">Married</label>
                                            <input name="group3" type="radio" id="unm" class="with-gap radio-col-pink" />
                                            <label for="unm">Unmarried</label>
                                        </div>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Permanent Address</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Tax Code</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                    <img height="140px" id="output"/>
                                    </div>
                                </div>               
                            </div>
                            <div class="class row next2" style="margin-top:20px; display:none;" id="next2">
                                <div class="class col-md-10"></div>
                                <div class="class col-md-2">
                                    <a href="#" class="btn btn-warning btn-sm ptest1">< Previous</a>
                                    <a href="#" class="btn btn-warning btn-sm test1">Next ></a>
                                </div>
                            </div>
                        </div>
                        
                        <div id="emp-history" class="emp-history" style="display:">
                            <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">Employment History</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <label for="input1">Employment Type</label>
                                        <select class="form-control">
                                            <option>Employment Type 1</option>
                                            <option>Employment Type 2</option>
                                            <option>Employment Type 3</option>
                                            <option>Employment Type 4</option>
                                            <option>Employment Type 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <label for="input1">Working Division</label>
                                        <select class="form-control">
                                            <option>Working Division 1</option>
                                            <option>Working Division 2</option>
                                            <option>Working Division 3</option>
                                            <option>Working Division 4</option>
                                            <option>Working Division 5</option>
                                        </select>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Registration Date</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Promotion</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Incriminte</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Leave</label>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>    
                                
                                <div class="col-md-6">
                                    <div class="form-group m-b-40 " >
                                        <label for="input1">Working Place</label>
                                        <select class="form-control">
                                            <option>Working Place 1</option>
                                            <option>Working Place 2</option>
                                            <option>Working Place 3</option>
                                            <option>Working Place 4</option>
                                            <option>Working Place 5</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Joining date</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Permanent Date</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Official Mobile No</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                        <input type="text" class="form-control" id="" name="name">
                                        <label for="input1">Incriminte Date</label>
                                        <span class="text-danger"></span>
                                    </div>
                                    <div class="form-group m-b-40 " >
                                    <img height="140px" id="output"/>
                                    </div>
                                </div>               
                            </div>
                            <div class="class row next3" style="margin-top:20px; display:none;" id="next3">
                                <div class="class col-md-10"></div>
                                <div class="class col-md-2">
                                <a href="#" class="btn btn-warning btn-sm ptest2">< Previous</a>
                                </div>
                            </div>
                        </div>
                            
                            
                        <!-- button row -->
                        <div class="class row save" style="margin-top:20px; display:;">
                            <div class="class col-md-4"></div>
                            <div class="class col-md-4">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
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
<script type="text/javascript">  
    $(document).ready(function(){
        $(".test").click(function()
            {
                $(".emp-reg").css("display","none");
                $(".emp-profile").css("display","");
                $(".next2").css("display","");
                $(".test").css("display","none");
            })

        $(".test1").click(function()
            {
                $(".emp-reg").css("display","none");
                $(".emp-profile").css("display","none");
                $(".emp-history").css("display","");
                $(".next3").css("display","");
                $(".save").css("display","");
                $(".next2").css("display","none");
                $(".test").css("display","none");
            })

        $(".ptest1").click(function()
            {
                $(".emp-reg").css("display","");
                $(".emp-profile").css("display","none");
                $(".emp-history").css("display","none");
                $(".save").css("display","none");
                $(".next2").css("display","none");
                $(".test").css("display","");
            })
        $(".ptest2").click(function()
            {
                $(".emp-reg").css("display","none");
                $(".emp-profile").css("display","");
                $(".emp-history").css("display","none");
                $(".save").css("display","none");
                $(".next2").css("display","");
                $(".test").css("display","none");
            })

        $(".save").click(function()
            {
                $(".emp-reg").css("display","");
                $(".emp-profile").css("display","");
                $(".emp-history").css("display","");
                $(".save").css("display","");
                $(".next2").css("display","none");
                $(".test").css("display","none");
            })
    })
</script>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endpush