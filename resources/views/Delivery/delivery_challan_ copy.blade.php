@extends('layouts.app-layout-report')
@section('title','Home')
@section('content-title','GMEBD')
@push('breadcrumb')
@endpush

@section('page-content')

<div class="card">
    <div class="card-header">
        Delivery Challan
    </div>
    <div class="card-body">
        <div class="challanlogo" align="center">
            <img src="{{asset('/assets/images/Logo.png')}}" alt="homepage" style="width: 75px;" class="light-logo" />
            <img src="../assets/images/logo-text1.png" alt="homepage" style="height: 45px;" class="dark-logo" />
            <h6 style="margin-top:30px; font-size:18px;font-weight: bold;">Provisional- Bill</h6>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <h6><b>Name:</b> M/S. Chad Ali Store</h6>
                    <h6><b>Dealer Code:</b> 1315</h6>
                    <h6><b>Type:</b> Cash</h6>
                    <label for="">Address: Cotton mill college road, Bogra</label></br>
                    <label for="">Contact No: 01741370682</label></br></br>
                    <h6><b>TSM:</b>  Mr. Abu Akkas (01938882182)</h6>
                </div>

                <div class="col-md-4">
                    <h6><b>Bill No:</b> EPL/Dlr/2019/07-89</h6>
                    <h6><b>MR No:</b> </h6>
                    <h6><b>MR Amount:</b> </h6></br>
                    <h6><b>DO No:</b> 2074</h6>
                    <h6><b>DO Amount:</b> 0</h6>
                    <h6><b>Challan No:</b> </h6>
                    <h6><b>DO  Date:</b> </h6>
                </div>
            </div>
            <div class="ctable">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Si.No</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Com.</th>
                                <th>Order Qty.</th>
                                <th>Order Amount</th>
                                <th>Del Qty</th>
                                <th>Unable Qty</th>
                                <th>Del Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            <tr>
                                <td>llll </td>
                                <td>llll </td>
                                <td>llll </td>
                                <td>llll </td>
                                <td>llll </td>
                                <td>llll </td>
                                <td>llll </td>
                                <td>llll </td>
                                <td>llll </td>
                            </tr>
                            <tr>
                                <td>fff </td>
                                <td>fff </td>
                                <td>fff </td>
                                <td>fff </td>
                                <td>fff </td>
                                <td>fff </td>
                                <td>fff </td>
                                <td>fff </td>
                                <td>fff </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> 
            <div class="row" style="margin-top:50px;">
                <div class="col-md-4">
                    <div class="fn ">
                        <div class="table-responsive">
                            <table border="1px solid black" id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th align="center" colspan="2" style="padding-left:25%">Financial Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr>
                                        <td>Credit Limit:</td>
                                        <td>252552020</td>
                                    </tr>
                                    <tr>
                                        <td>Previous Credit:</td>
                                        <td>45456114</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-2">
                <div class="fn ">
                        <div class="table-responsive">
                            <table border="1px solid black" id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th align="center">Und</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="row" style="margin-top:30px">
                <div class="col-md-12">
                    <div class="sig">
                        <div class="table-responsive">
                            <table border="1px solid black" id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th align="center" colspan="4" style="padding-left:42%">Office use only</th>
                                    </tr>
                                    <tr>
                                        <th align="center">Department</th>
                                        <th align="center">Receiving Time</th>
                                        <th align="center">Signature</th>
                                        <th align="center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    <tr>
                                        <td>Finance</td>
                                        <td>________:________</td>
                                        <td></td>
                                        <td>_____/_____/_____</td>
                                    </tr>
                                    <tr>
                                        <td>Sales & Marketing</td>
                                        <td>________:________</td>
                                        <td></td>
                                        <td>_____/_____/_____</td>
                                    </tr>
                                    <tr>
                                        <td>Distribution</td>
                                        <td>________:________</td>
                                        <td></td>
                                        <td>_____/_____/_____</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>

            <div class="row" style="margin-top:60px;margin-bottom:60px;">
                <div class="col-md-3">
                ________________<br/>Prepared by
                </div>
                <div class="col-md-3">
                ________________</br>GM - Group Accounts
                </div>
                <div class="col-md-3">
                ________________</br>GM - Group Finance
                </div>
                <div class="col-md-3">
                ________________</br>CEO
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('end_js')
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script>
    $(document).ready (function(){
                $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
    });
    </script>
@endpush