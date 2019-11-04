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
            <h6 style="margin-top:30px; font-size:18px;font-weight: bold;">A Member of Esquire Group</h6>
        </div>
        <div class="content">
                <div class="row" style="margin-top:50px;">
                    <div class="col-md-6" style="border:2px solid black">
                        <h6 style="margin-bottom:15px;"><b>CORPORATE OFFICE :</b></h6>
                        <h6 style="margin-bottom:10px; color:black"><b>Esquire Tower, 21, Shaheed Tajuddin Ahmed Sarani :</b></h6>
                        <p style="margin-bottom: 4px;">Tejgaon I/A, Dhaka-1208, Bangladesh</p>
                        <p style="margin-bottom: 4px;"><b>Phone:</b> 096 02 333888</p> 
                        <p style="margin-bottom: 4px;"><b>Email:</b> epl@esquirebd.com</p>
                        <p style="margin-bottom: 4px;"><b>FACTORY :</b> Plot B-36, BSCIC Industrial Estate
Kanchpur, Sonargaon, Narayangonj</b></p>
                    </div>
                    <div class="col-md-1">
                    
                    </div>
                    <div class="col-md-5" style=" height:50px;">
                        <h6 style="margin-bottom:10px;"><b>Challan No : 10006</b></h6>
                        <h6 style="margin-bottom:10px;"><b>Do No : {{$d_challan[0]->dealer_demand_no}}</b></h6>
                        <h6 style="margin-bottom:10px;"><b>Date : {{ date('Y-m-d') }}</b></h6>                   
                    </div>
                </div>
            <h3 style="margin-top:30px;margin-bottom:30px;">DELIVERY CHALLAN</h3>

            <div class="row" style="margin-top:50px;">
                <div class="col-md-6" style="border:2px solid black">
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-6">
                            <h6><b>Consignee :</b></h6>
                        </div>
                        <div class="col-md-6" align="right">
                            <h6><b>Dealer Code : {{$d_challan[0]->d_s_code}}</b></b></h6>
                        </div>
                    </div>
                    <div class="dealar-info" align="center">
                        <h3 style="">DELIVERY CHALLAN</h3>
                        <h6 style="margin-bottom:15px;"><b>{{$d_challan[0]->d_s_name}}</b></h6>
                        <h6 style="margin-bottom:15px;">{{$d_challan[0]->dlr_address}}, {{$d_challan[0]->dlr_police_station}}</h6>
                        <h6 style="margin-bottom:15px;">{{$d_challan[0]->dlr_mobile_no}}</h6>
                    </div>
                </div>
                    
                <div class="col-md-6" style="border:2px solid black">
                    <h6 style="margin-top:10px;"><b>Consignee :</b></h6>
                    <h3 style="">Esquire Plastics Ltd</h3>
                    <p>Plot - B-36, BSCIC Industrial Estate Katchpur, Narayangonj</p>
                    <h6 style="margin-bottom:10px;"><b>Truck No : 11.4910</b></h6>
                    <h6 style="margin-bottom:10px;"><b>Product Type : House Hold</b></h6>               
                </div>
            </div>
            <div class="ctable" style="margin-top:40px;">
                <div class="table-responsive">
                    <table id="example" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Si.No</th>
                                <th>Description/Product Name</th>
                                <th>Quantity/Pcs</th>
                                <th>Bonus</th>
                                <th>Total Delivery Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($d_challan as $dchallan)
                            <tr>
                                @if(($dchallan->s_m_a_status==1)&&($dchallan->delivery_qty>=$dchallan->s_m_i_target_qty)&&($dchallan->delivery_qty !=null))
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dchallan->product_name}} - {{$dchallan->product_code}}</td>
                                    <td>{{$dchallan->delivery_qty}}</td>
                                    <td>{{$dchallan->bonus}}</td>
                                    <td>{{$dchallan->delivery_qty}}+{{$dchallan->bonus}}</td>

                                @elseif($dchallan->delivery_qty !=null)
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dchallan->product_name}} - {{$dchallan->product_code}}</td>
                                    <td>{{$dchallan->delivery_qty}}</td>
                                    <td></td>
                                    <td>{{$dchallan->delivery_qty}}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>                        
                            <td></td>                        
                            <td style="font-weight: bold;">{{$d_qty[0]->total_d_qty}}</td>                        
                            <td></td>                        
                            <td></td>                        
                        </tr>
                        </tfoot><
                    </table>
                </div>
            </div> 

            <div class="row" align="center" style="margin-top:60px;margin-bottom:60px;">
                <div class="col-md-4">
                ________________<br/>Received by 
                </div>
                <div class="col-md-4">
                ________________</br>In-Charge (Delivery)
                </div>
                <div class="col-md-4">
                ________________</br>Authorised by
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