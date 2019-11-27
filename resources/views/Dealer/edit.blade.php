@extends('layouts.app-layout')
@section('page-content')
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success"id="success-alert">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="col-md-12">
    <!-- card -->
        <div class="card" style="">
            <!-- card body -->
            <div class="card-body">
            <h3>Set Dealer Info</h3>
            <!-- Create department -->
                <form class="floating-labels m-t-40" action="{{Route('dealer.postdealeredit')}}"method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$dealers[0]->id}}">
                    <div class="row" style="border-bottom: 3px solid thistle;margin-bottom: 25px;"> 
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dtitle">Dealer Title</label>
                                <input type="text" class="form-control" id="dtitle" value="{{$dealers[0]->d_s_name}}"  name="d_s_name" required>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dmail">Dealer Email</label>
                                <input type="mail" class="form-control" id="dmail" value="{{$dealers[0]->email}}"  name="d_s_mail" required>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                    <div class="col-md-6">SPO</div>
                    <div class="col-md-6">Line Manager</div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="dlr_spo_id">
                                <option value="{{$dealers[0]->dlr_spo_id}}">{{$dealers[0]->spo_name}}</option>
                                @foreach($dealerspo as $dspo)
                                    <option value="{{$dspo->id}}">{{$dspo->sop_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="dlr_lm_id">
                                <option value="{{$linem[0]->dlr_lm_id}}">{{$linem[0]->lm_name}}</option>
                                @foreach($dealerlm as $dlm)
                                    <option value="{{$dlm->id}}">{{$dlm->lm_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="prname">Proprietor Name</label>
                                <input type="text" class="form-control" id="prname"  value="{{$dealers[0]->d_proprietor_name}}" name="d_proprietor_name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dcode">Dealer Code</label>
                                <input type="text" class="form-control" id="dcode"  value="{{$dealers[0]->dlr_code}}" name="dlr_code">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <span class="text">Dealer OP Date</span>
                                <input type="date" class="form-control" id="totoals"  value="{{$dealers[0]->dlr_op_date}}" name="dlr_op_date">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <span class="text">Dealer OP Month</span>
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="dlr_op_month">
                                        <option value="">Select Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="pstation">Police Station</label>
                                <input type="text" class="form-control" id="pstation"  value="{{$dealers[0]->dlr_police_station}}" name="dlr_police_station">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="dlr_area_id">
                                <option value="">Select Dealer Area</option>
                                @foreach($dealerarea as $darea)
                                    <option value="{{$darea->id}}">{{$darea->area_title}}</option>
                                @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dmobile">Dealer Mobile</label>
                                <input type="text" class="form-control" id="dmobile"  value="{{$dealers[0]->dlr_mobile_no}}" name="dlr_mobile_no">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dbase">Dealer Base</label>
                                <input type="text" class="form-control" id="dbase"  value="{{$dealers[0]->dlr_base}}" name="dlr_base">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dsm">Dealer DSM</label>
                                <input type="text" class="form-control" id="dsm"  value="{{$dealers[0]->dlr_dsm}}" name="dlr_dsm">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                                <select class="form-control" style="padding: 0px 10px 10px 10;" name="dlr_zone_id">
                                <option value="">Select Dealer zone</option>
                                @foreach($dealerzone as $dzone)
                                    <option value="{{$dzone->id}}">{{$dzone->zone_title}}</option>
                                @endforeach   
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="dtlic">Dealer Tred Lisence</label>
                                <input type="text" class="form-control" id="dtlic"  value="{{$dealers[0]->dlr_tred_lisence}}" name="dlr_tred_lisence">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-5">
                                <textarea class="form-control" rows="4" id="input7" value="{{$dealers[0]->dlr_address}}" name="dlr_address"></textarea>
                                <span class="bar"></span>
                                <label for="input7">Address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b-40">
                            <label for="tinn">Dealer Tin Number</label>
                                <input type="text" class="form-control" id="tinn" value="{{$dealers[0]->dlr_tin_number}}"  name="dlr_tin_number">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                    </div>

                    <!-- button row -->
                    <div class="class row" style="margin-top:20px;margin-bottom:30px">
                        <div class="class col-md-4"></div>
                        <div class="class col-md-4">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">SAVE</button>
                        </div>
                        <div class="class col-md-4"></div>
                    </div>
                </form>
            </div><!-- end create department -->
            <!-- end card body -->
        </div><!-- end card -->
    </div> <!-- end col-7 -->
</div>
@endsection