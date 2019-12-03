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
use App\User;
use App\Role_user;
use DB;

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


    public function getempname($id)
    {
        $query = DB::select('SELECT employees.emp_designation_id FROM `employees`
        WHERE employees.id="'.$id.'"');
        // return($query[0]->emp_designation_id);



        if($query[0]->emp_designation_id == 2)
        {
            $empname = DB::select('SELECT employees.emp_code,employees.emp_name,employees.emp_designation_id,designations.designation_title,dealers.d_s_name,dealers.dlr_code 
            FROM `employees`
            LEFT JOIN  dealers ON employees.id = dealers.dlr_spo_id
            LEFT JOIN designations ON designations.id = employees.emp_designation_id
            WHERE employees.id="'.$id.'"');
            return($empname);

        }else
        {
            $empname = DB::select('SELECT employees.emp_code,employees.emp_name,employees.emp_designation_id,designations.designation_title,dealers.d_s_name,dealers.dlr_code 
            FROM `employees`
            LEFT JOIN  dealers ON employees.id = dealers.dlr_lm_id
            LEFT JOIN designations ON designations.id = employees.emp_designation_id
            WHERE employees.id="'.$id.'"');
            return($empname);
            // return response()->json("Nops") ;
        }
    }


    public function passwordset()
    {
        $employees = Employee::latest('id')->where('user_id','=',null)->get();
        // dd($employees);
        return view('employee.credential.spopassword',compact('employees'));
    }

    public function password(Request $request)
    {
        $did = $request->emp_desid;



        $password=trim($request->emp_password);
        
        $empid = $request->emp_id;
        $user = new User;
            $user->name                                 = $request->emp_name;
            $user->email                                = $request->emp_mail;
            $user->password                             = bcrypt($password);
            $user->save();

        if($did==6)
        {
            $userrole = new Role_user;
            $userrole->role_id      = 3;
            $userrole->user_id      = $user->id;
            $userrole->save();
        }
        elseif($did==7)
        {
            $userrole = new Role_user;
            $userrole->role_id      = 4;
            $userrole->user_id      = $user->id;
            $userrole->save();
        }
        
           $empid = Employee::find($empid);
           $empid ->user_id=$user->id;
           $empid ->save();
           return back()->with('success','Password set Successfully');
    }
}
