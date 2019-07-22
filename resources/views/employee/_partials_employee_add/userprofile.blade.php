<div id="emp-profile" class="emp-profile" style="display:none">
    <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">User Profile</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group m-b-40 ">
                <label>Department <span style="color:red; font-weight:bold">*</span></label>
                <select required="required" name="department_id" class="form-control" >
                    <option value="">Select Department</option>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group m-b-40 " style="margin-top: 12.2%;">
                <input type="text" class="form-control" id="pnumber" name="phone_number">
                <label for="pnumber">Phone Number</label>
                <span class="text-danger"></span>
            </div>

            <div class="form-group m-b-40 {{ $errors->has('gender') ? 'has-error' : '' }}" >
                <h5>Select Gender </h5>
                <div class="demo-radio-button">
                    <input name="gender" type="radio" id="male" value="Male" class="with-gap radio-col-red" />
                    <label for="male">Male</label>
                    <input name="gender" type="radio" id="female" value="Female" class="with-gap radio-col-pink" />
                    <label for="female">Female</label>
                </div>
                <span class="text-danger">{{ $errors->first('gender') }}</span>
            </div>

<!-- bank name -->
            <div class="form-group m-b-40 " >
                <label for="input1">Bank</label>
                <select name="bank_id" class="form-control">
                <option>Select Bank</option>
                @foreach($banks as $bank)
                    <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group m-b-40 " >
                <input type="text" class="form-control" id="banumber" name="account_number">
                <label for="banumber">Account Number</label>
                <span class="text-danger"></span>
            </div>


            
            <div class="form-group m-b-40 {{ $errors->has('present_address') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="paddress" name="present_address" required>
                <label for="paddress">Present Address <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('present_address') }}</span>
            </div>
            <div class="form-group m-b-40 " >
                <input type="text" class="form-control" id="passport" name="passport">
                <label for="passport">Passport</label>
                <span class="text-danger"></span>
            </div>

            <div class="form-group m-b-40">
                <div class="card">
                    <div class="card-body">
                        <label for="input-file-now-custom-1">Upload user Image</label>
                        <input type="file" id="input-file-now-custom-1" name="image" style="margin-top: 20px;" class="dropify" data-default-file="/upload/user/demopic.png"  />
                    </div>
                </div>
                <span class="text-danger">{{ $errors->first('designation_id') }}</span>                             </div>
            </div>         

        <div class="col-md-6">
            <div class="form-group m-b-40 " >
                <label for="input1">Designation</label>
                <select name="designation_id" class="form-control">
                <option>Select Designation</option>
                @foreach($designations as $designation)
                    <option value="{{$designation->id}}">{{$designation->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group m-b-40 " >
                <label style="position: initial;" for="dob">Date Of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
                <span class="text-danger"></span>
            </div>
            <div class="form-group m-b-40 " >
                <h5>Maritial Status</h5>
                <div class="demo-radio-button">
                    <input name="maritial_status" type="radio" id="m" value="Married" class="with-gap radio-col-red" />
                    <label for="m">Married</label>
                    <input name="maritial_status" type="radio" id="unm" value="Unmarried" class="with-gap radio-col-pink" />
                    <label for="unm">Unmarried</label>
                </div>
            </div>

            <div class="form-group m-b-40 " >
                <input type="text" class="form-control" id="baname" name="account_name">
                <label for="baname">Account Name</label>
                <span class="text-danger"></span>
            </div>

            <div class="form-group m-b-40 " >
                <input type="text" class="form-control" id="babranch" name="bank_branch">
                <label for="babranch">Bank Branch</label>
                <span class="text-danger"></span>
            </div>

            <div class="form-group m-b-40 {{ $errors->has('permanent_address') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="peaddress" name="permanent_address" required>
                <label for="peaddress">Permanent Address <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
            </div>
            <div class="form-group m-b-40 {{ $errors->has('nid') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="nid" name="nid">
                <label for="nid">NID <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('nid') }}</span>
            </div>
            <div class="form-group m-b-40 " >
                <input type="text" class="form-control" id="texcode" name="tex_code">
                <label for="texcode">Tax Code</label>
                <span class="text-danger"></span>
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