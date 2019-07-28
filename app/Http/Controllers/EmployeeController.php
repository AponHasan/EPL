<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Section;
use App\StaffCategory;
use App\Unit;
use App\Department;
use App\Designation;
use App\Division;
use App\Company;

class EmployeeController extends Controller
{
    public function index()
    {
        // return 'hello employee';
        $testuser = Employee::orderBy('id','desc')->get();
        return view('employee.employee',compact('testuser'));
    }

    public function create()
    {
            $sections = Section::orderBy('id','desc')->get();
            $staffCategorys = StaffCategory::orderBy('id','desc')->get();
            $units = Unit::orderBy('id','desc')->get();
            $departments = Department::orderBy('id','desc')->get();
            $designations = Designation::orderBy('id','desc')->get();
            $divisions = Division::orderBy('id','desc')->get();
            $companys = Company::orderBy('id','desc')->get();
        return view('employee.employeeadd',compact('sections','staffCategorys','units','departments','designations','divisions','companys'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $employees = new Employee;
        $employees->emp_code = $request->emp_code;
        $employees->emp_punch_card_no = $request->emp_punch_card_no;
        $employees->emp_name = $request->emp_name;
        $employees->emp_dob = $request->emp_dob;
        $employees->emp_designation_id = $request->emp_designation_id;
        $employees->emp_gender = $request->emp_gender;
        $employees->emp_merital_status = $request->emp_merital_status;
        $employees->emp_nid_card = $request->emp_nid_card;
        $employees->emp_mobile_number = $request->emp_mobile_number;
        $employees->emp_nationality = $request->emp_nationality;
        $employees->emp_religion = $request->emp_religion;
        $employees->emp_present_address = $request->emp_present_address;
        $employees->emp_parmanent_address = $request->emp_parmanent_address;
        $employees->emp_father_name = $request->emp_father_name;
        $employees->emp_mother_name = $request->emp_mother_name;
        $employees->emp_spouse_name = $request->emp_spouse_name;
        $employees->emp_blood_group = $request->emp_blood_group;
        $employees->emp_joining_date = $request->emp_joining_date;
        $employees->emp_unit_id = $request->emp_unit_id;
        $employees->emp_division_id = $request->emp_division_id;
        $employees->emp_department_id = $request->emp_department_id;
        $employees->emp_company_id = $request->emp_company_id;
        $employees->emp_secction_id = $request->emp_secction_id;
        $employees->emp_staff_category_id = $request->emp_staff_category_id;
        $employees->emp_grade_info = $request->emp_grade_info;
        $employees->emp_mail_id = $request->emp_mail_id;
        $employees->save();
        return 'ok';

    }

    public function edit(Type $var = null)
    {
        # code...
    }

    public function update(Type $var = null)
    {
        # code...
    }

    public function delete(Type $var = null)
    {
        # code...
    }


}
