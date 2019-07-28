<div id="emp-profile" class="emp-profile" style="display:none;margin-buttom;30px">
    <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">Employee Profile</h4>
    <div class="row">
        <div class="col-md-6">

            <div class="form-group m-b-40 " style="margin-top: 0;">
                <input type="text" class="form-control" id="pnumber" name="emp_mobile_number">
                <label for="pnumber">Phone Number</label>
                <span class="text-danger"></span>
            </div>

            <div class="form-group m-b-40 {{ $errors->has('gender') ? 'has-error' : '' }}" >
                <h5 style="color:black">Select Gender </h5>
                <div class="demo-radio-button">
                    <input name="emp_gender" type="radio" id="male" value="Male" class="with-gap radio-col-red" />
                    <label for="male">Male</label>
                    <input name="emp_gender" type="radio" id="female" value="Female" class="with-gap radio-col-pink" />
                    <label for="female">Female</label>
                </div>
                <span class="text-danger">{{ $errors->first('gender') }}</span>
            </div>
            <div class="form-group m-b-40 {{ $errors->has('present_address') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="paddress" name="emp_present_address" required>
                <label for="paddress">Present Address <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('present_address') }}</span>
            </div>   
            <div class="form-group m-b-40 " style="margin-top: 0;">
                <input type="text" class="form-control" id="nationalit" name="emp_nationality">
                <label for="nationalit">Nationality</label>
                <span class="text-danger"></span>
            </div>   
            <div class="form-group m-b-40 " style="margin-top: 0;">
                <input type="text" class="form-control" id="religion" name="emp_religion">
                <label for="religion">Religion</label>
                <span class="text-danger"></span>
            </div>  
            <div class="form-group m-b-40 {{ $errors->has('nid') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="fname" name="emp_father_name">
                <label for="fname">Fathers Name </label>
                <span class="text-danger">{{ $errors->first('nid') }}</span>
            </div>   
            <div class="form-group m-b-40 {{ $errors->has('nid') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="mname" name="emp_mother_name">
                <label for="mname">Mothers Name </label>
                <span class="text-danger">{{ $errors->first('nid') }}</span>
            </div>                  
        </div>         

        <div class="col-md-6">
            <div class="form-group m-b-40 " style="margin-top: -5%;" >
                <label style="position: initial;" for="dob" style="margin-bottom: 0px;">Date Of Birth</label>
                <input type="date" class="form-control" id="dob" name="emp_dob">
                <span class="text-danger"></span>
            </div>
            <div class="form-group m-b-40 " >
                <h5 style="color:black">Maritial Status</h5>
                <div class="demo-radio-button">
                    <input name="emp_merital_status" type="radio" id="m" value="Married" class="with-gap radio-col-red" />
                    <label for="m">Married</label>
                    <input name="emp_merital_status" type="radio" id="unm" value="Unmarried" class="with-gap radio-col-pink" />
                    <label for="unm">Unmarried</label>
                </div>
            </div>

            <div class="form-group m-b-40 {{ $errors->has('nid') ? 'has-error' : '' }}" id="sname" style="display:">
                <input type="text" class="form-control" id="sname" name="emp_spouse_name">
                <label for="sname">Spouse Name <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('nid') }}</span>
            </div>

            <div class="form-group m-b-40 {{ $errors->has('permanent_address') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="peaddress" name="emp_parmanent_address" required>
                <label for="peaddress">Permanent Address <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
            </div>
            <div class="form-group m-b-40 {{ $errors->has('nid') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="nid" name="emp_nid_card">
                <label for="nid">NID <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('nid') }}</span>
            </div>  
            <div class="form-group m-b-40"style="margin-top: 0%;">
                <div class="form-group">
                    <label>Blood Group</label>
                    <select class="form-control" style="padding: 0px 10px 10px 10;" name="emp_blood_group">
                        <option>Select Blood Group</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div> 
                                   
        </div>               
    </div>
    <div class="class row next2" style="margin-top:20px;margin-bottom: 30px; display:none;" id="next2">
        <div class="class col-md-10"></div>
        <div class="class col-md-2">
            <a href="#" class="btn btn-warning btn-sm ptest1">< Previous</a>
            <a href="#" class="btn btn-warning btn-sm test1" style="width: 76px;margin-top: 3px;">Next ></a>
        </div>
    </div>
</div>