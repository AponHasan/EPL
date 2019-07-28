<div id="emp-reg" class="emp-reg">
    <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">User Registration</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group m-b-40  {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="text" class="form-control" id="empname" name="emp_name" required>
                <label for="empname">Employee name <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group m-b-40"style="margin-top: 12.2%;">
                <div class="form-group">
                    <label>Select Company</label>
                    <select class="form-control" style="padding: 0px 10px 10px 10;" name="emp_company_id">
                        <option>Select Company</option>
                        @foreach($companys as $company)
                        <option value="{{$company->id}}">{{$company->company_title}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="form-group m-b-40  {{ $errors->has('emppcard') ? 'has-error' : '' }}">
                <input type="text" class="form-control" id="emppcard" name="emp_punch_card_no" required>
                <label for="emppcard">Punch Card No<span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('card') }}</span>
            </div>
        </div>               
        <div class="col-md-6">
            <div class="form-group m-b-40  {{ $errors->has('empmail') ? 'has-error' : '' }}">
                <input type="text" class="form-control" id="empmail" name="emp_mail_id" required>
                <label for="empmail">E-mail <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('mail') }}</span>
            </div>
            <div class="form-group m-b-40  {{ $errors->has('empcode') ? 'has-error' : '' }}">
                <input type="text" class="form-control" id="empcode" name="emp_code" required>
                <label for="empcode">Employee Code <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('code') }}</span>
            </div>
        </div>               
    </div>
    <div class="class row next1" style="margin-top:20px;" id="next1">
        <div class="class col-md-10"></div>
        <div class="class col-md-2">
            <a href="#" class="btn btn-warning btn-sm test" style="width: 76px;">Next ></a>
        </div>
    </div>
</div>  