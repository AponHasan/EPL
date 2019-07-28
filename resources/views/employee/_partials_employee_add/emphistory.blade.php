<div id="emp-history" class="emp-history" style="display:none">
    <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">Employment info</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group m-b-40 {{ $errors->has('joining_date') ? 'has-error' : '' }}" >
                <label style="position: initial;" for="joindate">Joining date</label>  
                <input type="date" class="form-control" id="joindate" name="emp_joining_date">
                <span class="text-danger">{{ $errors->first('joining_date') }}</span>                                        
            </div>

            <div class="form-group m-b-40"style="margin-top: 0%;">
                <div class="form-group">
                    <label>Select Department</label>
                    <select class="form-control" style="padding: 0px 10px 10px 10;" name="emp_department_id">
                        <option>Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_title}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="form-group m-b-40 " >
                <label for="input1">Designation</label>
                <select name="emp_designation_id" class="form-control">
                <option>Select Designation</option>
                        @foreach($designations as $designation)
                        <option value="{{$designation->id}}">{{$designation->designation_title}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group m-b-40"style="margin-top: 12.2%;">
                <div class="form-group">
                    <label>Select Division</label>
                    <select class="form-control" style="padding: 0px 10px 10px 10;" name="emp_division_id">
                        <option>Select Division</option>
                        @foreach($divisions as $division)
                        <option value="{{$division->id}}">{{$division->division_title}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="form-group m-b-40 {{ $errors->has('nid') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="ginfo" name="emp_grade_info">
                <label for="ginfo">Grade info </label>
                <span class="text-danger">{{ $errors->first('nid') }}</span>
            </div>
           
        </div>    
        
        <div class="col-md-6">
        <div class="form-group m-b-40"style="margin-top: 0%;">
                <div class="form-group">
                    <label>Select Unit</label>
                    <select class="form-control" style="padding: 0px 10px 10px 10;" name="emp_unit_id">
                        <option>Select Unit</option>
                        @foreach($units as $unit)
                        <option value="{{$unit->id}}">{{$unit->unit_title}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
            </div>
            <div class="form-group m-b-40 " >
                <label for="input1">Section</label>
                <select name="emp_secction_id" class="form-control">
                <option>Select Section</option>
                        @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->section_title}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group m-b-40"style="margin-top: 12.2%;">
                <div class="form-group">
                    <label>Select Staff Category</label>
                    <select class="form-control" style="padding: 0px 10px 10px 10;" name="emp_staff_category_id">
                        <option>Select Staff Category</option>
                        @foreach($staffCategorys as $staffCategory)
                        <option value="{{$staffCategory->id}}">{{$staffCategory->staff_cate_title}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger"></span>
                </div>
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