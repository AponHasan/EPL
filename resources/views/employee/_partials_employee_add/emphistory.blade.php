<div id="emp-history" class="emp-history" style="display:none">
    <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">Employment History</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group m-b-40 " >
                <label for="input1">Employment Type <span style="color:red; font-weight:bold">*</span></label>
                <select required="required" class="form-control"name="employment_type_id" >
                    <option disabled="disabled">Select Employment Type</option>
                    @foreach($employments as $empolment)
                    <option value="{{$empolment->id}}">{{$empolment->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group m-b-40"style="margin-top: 12.2%;">
                <div class="form-group">
                    <label>Select Division</label>
                    <select class="form-control" style="padding: 0px 10px 10px 10;" name="divison_id">
                        <option>Select Division</option>
                        @foreach($divisions as $division)
                        <option  value="{{ $division->id }}">{{$division->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="form-group m-b-40 {{ $errors->has('registration_date') ? 'has-error' : '' }}" >
                <label style="position: initial;" for="redate">Registration Date <span style="color:red; font-weight:bold">*</span></label>
                <input type="date" class="form-control" id="redate" name="registration_date" required>
                <span class="text-danger">{{ $errors->first('registration_date') }}</span>
                
            </div>
            <div class="form-group m-b-40 " >
                <input type="text" class="form-control" id="promotion" name="promotion">
                <label for="promotion">Promotion</label>
                <span class="text-danger"></span>
            </div>
            <div class="form-group m-b-40 "style="margin-top: 12.2%;" >
                <input type="text" class="form-control" id="incrimint" name="increment">
                <label  for="incrimint">Increment</label>
                <span class="text-danger"></span>
            </div>
            <div class="form-group m-b-40 " >
                <div class="form-group">
                    <label for="" style="position: initial;"> Select Leave Type</label>
                    <select name="leave_id[]" style="padding: 0px 10px 10px 10; " class="form-control" id="leave" multiple>
                        @foreach($leaves as $leave)
                        <option value="{{$leave->id}}">{{$leave->title}}</option>
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
                <label for="input1">Working Place <span style="color:red; font-weight:bold">*</span></label>
                <select class="form-control" name="working_place_id" required>
                    <option>Select Working Place </option>
                    @foreach($workingplaces as $workingplace)
                    <option value="{{$workingplace->id}}">{{$workingplace->name}}</option>
                    @endforeach
                    
                </select>
            </div>
            
            <div class="form-group m-b-40 {{ $errors->has('joining_date') ? 'has-error' : '' }}" >
                <label style="position: initial;" for="joindate">Joining date</label>  
                <input type="date" class="form-control" id="joindate" name="joining_date">
                <span class="text-danger">{{ $errors->first('joining_date') }}</span>                                        
            </div>
            <div class="form-group m-b-40 " >
                <label style="position: initial;" for="perdate">Permanent Date</label>
                <input type="date" class="form-control" id="perdate" name="permanent_date">
                
                <span class="text-danger"></span>
            </div>
            <div class="form-group m-b-40 " >
                <input type="text" class="form-control" id="omn" name="office_mobile_number">
                <label for="omn">Official Mobile No</label>
                <span class="text-danger"></span>
            </div>
            <div class="form-group m-b-40 " >
                <label style="position: initial;" for="input1">Increment Date</label>
                <input type="date" class="form-control" id="" name="increment_date">
                
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