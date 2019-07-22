<div id="emp-reg" class="emp-reg">
    <h4 style="width=100%;background-color:#e9e9e9;height: 40px;padding: 10px 10px 10px 10px;font-weight: bold;margin-bottom: 25px;">User Registration</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group m-b-40  {{ $errors->has('name') ? 'has-error' : '' }}">
                <input type="text" class="form-control" id="empname" name="name" required>
                <label for="empname">Employee name <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group m-b-40 {{ $errors->has('password') ? 'has-error' : '' }}" >
                <input type="password" class="form-control" id="emppass" name="password" required>
                <label for="emppass">Password <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
        </div>               
        <div class="col-md-6">
            <div class="form-group m-b-40 {{ $errors->has('email') ? 'has-error' : '' }}" >
                <input type="text" class="form-control" id="empmail" name="email" required>
                <label for="empmail">E-mail <span style="color:red; font-weight:bold">*</span></label>
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
        </div>               
    </div>
    <div class="class row next1" style="margin-top:20px;" id="next1">
        <div class="class col-md-10"></div>
        <div class="class col-md-2">
            <a href="#" class="btn btn-warning btn-sm test">Next ></a>
        </div>
    </div>
</div>  