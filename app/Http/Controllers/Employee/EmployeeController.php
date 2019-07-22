<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserEmploymentHistory;
use App\Models\Workingplace;
use App\Models\Designation;
use App\UserLeaveAllocate;
use App\Models\Department;
use App\Models\Employment;
use App\Models\Division;
use App\Models\Leave;
use App\Models\Bank;
use App\UserProfile;
use App\User;
use Storage;
use DB;

class EmployeeController extends Controller
{
    // employee index page
    public function index()
    {
        $testuser       = DB::table('users')
                        ->leftJoin('user_profile','user_profile.user_id','=','users.id')
                        ->leftJoin('departments','departments.id','=','user_profile.department_id')
                        ->leftJoin('designations','designations.id','=','user_profile.designation_id')
                        ->select('users.name','users.id','users.email','users.password',
                        'user_profile.nid','user_profile.image','user_profile.department_id','user_profile.designation_id','user_profile.dob','user_profile.gender','user_profile.maritial_status','user_profile.passport','user_profile.permanent_address','user_profile.phone_number','user_profile.present_address','user_profile.tex_code',
                        'departments.name as dname','designations.name as desname')
                        ->get();

       $users           = User::all(); //get user data
       return view('employee.employee',compact('testuser')); //return employee index page with user table data
    }


    public function create()
    {
        $users          = UserProfile::all();   //get user table data
        $divisions      = Division::all();      //get division table data
        $workingplaces  = Workingplace::all();  //get Workingplace table data
        $designations   = Designation::all();   //get Designation table data
        $departments    = Department::all();    //get Department table data
        $employments    = Employment::all();    //get Employment table data
        $leaves         = Leave::all();         //get Leave table data
        $banks          = Bank::all();          //get bank table data

        return view('employee.employeeadd',compact('divisions','workingplaces','designations','departments','employments','leaves','users','banks'));       //return employee create page with required table data
    }

    public function store(Request $request)
    {
        
        $this->validate($request,[

            // user validation
            'name'                  => 'required',
            'email'                 => 'required|unique:users',
            'password'              => 'required',

            // user profile validation
            'department_id'        => 'required',
             'present_address'      => 'required',
             'permanent_address'    => 'required',
             'nid'                  => 'required',
             'gender'               => 'required',


            //  user employment history
            'employment_type_id'    =>  'required',
            'registration_date'     =>  'required',
            'joining_date'          =>  'required',
        ]);

            if($request->has('image'))
                {
                    $file=$request->file('image');
                    $filename='image'.time().'.'.$file->getClientOriginalExtension();
                    $filesize=$file->getClientSize();
                    $file->storeAs('userpic',$filename);
                    
                }
            else{
                    $filename='demopic.png';
                }

                // if ($validator->fails()) {
                //     return redirect(route('employee.employeeadd'))
                //                 ->withErrors($validator)
                //                 ->withInput();
                // }
        
            //user data save
            $user = new User;
                $user->name                                 = $request->name;
                $user->email                                = $request->email;
                $user->password                             = bcrypt($request->password);
                $user->save();
               
                //user profile data save
            $userprofile = new UserProfile;
                $userprofile->department_id                 = $request->department_id;
                $userprofile->user_id                       = $user->id;
                $userprofile->designation_id                = $request->designation_id;
                $userprofile->phone_number                  = $request->phone_number;
                $userprofile->gender                        = $request->gender;
                $userprofile->present_address               = $request->present_address;
                $userprofile->permanent_address             = $request->permanent_address;
                $userprofile->nid                           = $request->nid;
                $userprofile->passport                      = $request->passport;
                $userprofile->image                         = $filename;
                $userprofile->dob                           = $request->dob;
                $userprofile->maritial_status               = $request->maritial_status;
                $userprofile->tex_code                      = $request->tex_code;
                $userprofile->account_name                  = $request->account_name;
                $userprofile->accont_number                 = $request->account_number;
                $userprofile->bank_branch                   = $request->bank_branch;
                $userprofile->bank_id                       = $request->bank_id;

                $userprofile->save();
                
                //user emplomenthistory data save
            $useremploymenthistory = new  UserEmploymentHistory();
                $useremploymenthistory->employment_type_id  = $request->employment_type_id;
                $useremploymenthistory->user_id             = $user->id;
                $useremploymenthistory->working_place_id    = $request->working_place_id;
                $useremploymenthistory->registration_date   = $request->registration_date;
                $useremploymenthistory->joining_date        = $request->joining_date;
                $useremploymenthistory->increment           = $request->increment;
                $useremploymenthistory->increment_date      = $request->increment_date;
                $useremploymenthistory->permanent_date      = $request->permanent_date;
                $useremploymenthistory->office_mobile_number = $request->office_mobile_number;
                $useremploymenthistory->promotion           = $request->promotion;
                $useremploymenthistory->save();

                $user->leaves()->attach($request->leave_id);
                $user->save();

                return redirect()->route('employee.index')
                        ->with('success','Employee create successfully.');  //redirect user index page with success meg
    }

  
    public function profile($id)
    {
      

        $users      = DB::table('users')
                    ->leftJoin('user_profile','user_profile.user_id','=','users.id')
                    ->leftJoin('departments','departments.id','=','user_profile.department_id')
                    ->leftJoin('designations','designations.id','=','user_profile.designation_id')
                    ->leftJoin('user_employment_history','user_employment_history.user_id','=','users.id')
                    ->leftJoin('employment_types','employment_types.id','=','user_employment_history.employment_type_id')
                    ->leftJoin('working_places','working_places.id','=','user_employment_history.working_place_id')
                    ->leftJoin('divisions','divisions.id','=','working_places.divison_id')
                    ->leftJoin('user_leave_allocate','user_leave_allocate.user_id','=','users.id')
                    ->leftJoin('leaves','leaves.id','=','user_leave_allocate.leave_id')
                    ->leftJoin('salary_settings','salary_settings.user_id','=','users.id')

                    ->where('users.id','=',$id)

                    ->select('users.name','users.email','users.password',
                    'user_profile.nid','user_profile.image','user_profile.department_id','user_profile.designation_id','user_profile..dob','user_profile.gender','user_profile.maritial_status','user_profile.passport','user_profile.permanent_address','user_profile.phone_number','user_profile.present_address','user_profile.tex_code',

                    'departments.name as dname','designations.name as desname',
                    
                    'user_employment_history.employment_type_id','user_employment_history.joining_date','user_employment_history.office_mobile_number','user_employment_history.permanent_date','user_employment_history.promotion','user_employment_history.registration_date','user_employment_history.working_place_id','user_employment_history.increment','user_employment_history.increment_date',

                    'employment_types.name as etname',

                    'working_places.name as wpname','working_places.id',

                    'divisions.name as divname',

                    'user_leave_allocate.user_id','user_leave_allocate.leave_id',

                    'leaves.id','leaves.title','leaves.number_of_days',
                    'salary_settings.basic_salary','salary_settings.house_rent','salary_settings.provident_fund','salary_settings.mobile_allowances','salary_settings.dinning_allowances','salary_settings.medical_allowances','salary_settings.transport_allowances'

                    )
                    ->get();
                    
        return view('employee.profile',compact('users'));
        
    }


    public function edit($id)
    {
        $users      = DB::table('users')
                    ->leftJoin('user_profile','user_profile.user_id','=','users.id')
                    ->leftJoin('departments','departments.id','=','user_profile.department_id')
                    ->leftJoin('designations','designations.id','=','user_profile.designation_id')
                    ->leftJoin('user_employment_history','user_employment_history.user_id','=','users.id')
                    ->leftJoin('employment_types','employment_types.id','=','user_employment_history.employment_type_id')
                    ->leftJoin('working_places','working_places.id','=','user_employment_history.working_place_id')
                    ->leftJoin('divisions','divisions.id','=','working_places.divison_id')
                    ->leftJoin('user_leave_allocate','user_leave_allocate.user_id','=','users.id')
                    ->leftJoin('leaves','leaves.id','=','user_leave_allocate.leave_id')

                    ->where('users.id','=',$id)

                    ->select('users.id','users.name','users.email','users.password',
                    'user_profile.nid','user_profile.image','user_profile.department_id','user_profile.designation_id','user_profile..dob','user_profile.gender','user_profile.maritial_status','user_profile.passport','user_profile.permanent_address','user_profile.phone_number','user_profile.present_address','user_profile.tex_code',

                    'departments.name as dname','designations.name as desname',
                    
                    'user_employment_history.employment_type_id','user_employment_history.joining_date','user_employment_history.office_mobile_number','user_employment_history.permanent_date','user_employment_history.promotion','user_employment_history.registration_date','user_employment_history.working_place_id','user_employment_history.increment','user_employment_history.increment_date',

                    'employment_types.name as etname',

                    'working_places.name as wpname','working_places.id as wid',

                    'divisions.id as did','divisions.name as divname',

                    'user_leave_allocate.user_id','user_leave_allocate.leave_id',

                    'leaves.id as lid','leaves.title','leaves.number_of_days'
                    )
                    ->get();
        $departments    = Department::all();
        $designations   = Designation::all();
        $employments    = Employment::all();
        $leaves         = Leave::all();
        $workingplaces  = Workingplace::all();
       return view('employee.employeeedit',compact('users','departments','designations','employments','leaves','workingplaces'));
    }

    public function update(Request $request,$id)
    {
                    if($request->has('image'))
                    {
                        $file=$request->file('image');
                        $filename='image'.time().'.'.$file->getClientOriginalExtension();
                        $filesize=$file->getClientSize();
                        $file->storeAs('userpic',$filename);
                        
                    }
                else{
                        $filename='demopic.png';
                    }
        $user =User::find($id);
                $user->name                                 = $request->name;
                $user->email                                = $request->email;
                $user->password                             = bcrypt($request->password);
                $user->save();

                $user->userprofile->department_id                 = $request->department_id;
                $user->userprofile->user_id                       = $user->id;
                $user->userprofile->designation_id                = $request->designation_id;
                $user->userprofile->phone_number                  = $request->phone_number;
                $user->userprofile->gender                        = $request->gender;
                $user->userprofile->present_address               = $request->present_address;
                $user->userprofile->permanent_address             = $request->permanent_address;
                $user->userprofile->nid                           = $request->nid;
                $user->userprofile->passport                      = $request->passport;
                $user->userprofile->image                         = $filename;
                $user->userprofile->dob                           = $request->dob;
                $user->userprofile->maritial_status               = $request->maritial_status;
                $user->userprofile->tex_code                      = $request->tex_code;
                $user->userprofile->save();
                
                $user->useremploymenthistory->employment_type_id  = $request->employment_type_id;
                $user->useremploymenthistory->user_id             = $user->id;
                $user->useremploymenthistory->working_place_id    = $request->working_place_id;
                $user->useremploymenthistory->registration_date   = $request->registration_date;
                $user->useremploymenthistory->joining_date        = $request->joining_date;
                $user->useremploymenthistory->increment           = $request->increment;
                $user->useremploymenthistory->increment_date      = $request->increment_date;
                $user->useremploymenthistory->permanent_date      = $request->permanent_date;
                $user->useremploymenthistory->office_mobile_number = $request->office_mobile_number;
                $user->useremploymenthistory->promotion           = $request->promotion;
                $user->useremploymenthistory->save();

                return redirect()->route('employee.index')
                        ->with('success','Employee Update successfully.');
    }

    public function destroy(Request $request, $id)
    {
        User::findOrFail($request->id)->Delete($request->all());
        return redirect()->route('employee.index')
                        ->with('success', 'Employee Delete  successfully .');
    }


    public function dashboard()
    {
        return view('employee.empdashboard');
    }


    public function test()
    {
        return view('employee.emp2');
    }

}
