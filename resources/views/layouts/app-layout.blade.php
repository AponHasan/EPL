<!DOCTYPE html>
<html lang="en">
<head>
@include('_partials_.meta')
  @include('_partials_.css')
<style>
  .card{

  }
  .card-header{
    color: white;
    font-weight: bold;
    background: #212121;
  }
  </style>
</head>
<body class="fix-header fix-sidebar card-no-border logo-center">
  @guest
    @include('welcome')
  @else
    <div id="main-wrapper">
      @include('_partials_.header')
      <!-- top menu -->
     @php

     $notice =DB::select('SELECT sales_promotions.id,sales_promotions.sales_promotions_title,sales_promotions.sales_promotions_category,sales_promotions.product_id,sales_promotions.s_m_i_target_qty,sales_promotions.s_m_i_qty,sales_promotions.s_m_a_status,sales_promotions.s_m_i_d_target_qty,sales_promotions.s_m_i_discount,sales_promotions.s_m_tc_target_amount,sales_promotions.s_m_tc_discount,products.product_name 
        FROM `sales_promotions`
        LEFT JOIN products ON products.id = sales_promotions.product_id
        WHERE sales_promotions.s_m_a_status =1');

    @endphp
     <div class="page-wrapper">
            <div class="container-fluid" style="padding-right: 0px;padding-left: 0px;">
            <span style="position: fixed;background-color:#fff;color:black;font-weight: bold;padding-left: 5px;padding-right: 5px;">Promotional Offer :</span>
            <marquee > 
                @foreach($notice as $notices)
                @if($notices->sales_promotions_category == 'free')
                    <span style="color:#fff;font-weight: bold;">{{$notices->product_name}} : Order {{$notices->s_m_i_target_qty}}  and get extra {{$notices->s_m_i_qty}}   ||   </span>
                @elseif($notices->sales_promotions_category == 'discount')
                    <span style="color:#fff;font-weight: bold;">{{$notices->product_name}} : Order {{$notices->s_m_i_d_target_qty}}  and get Discount {{$notices->s_m_i_discount}}%   || </span>   
                @endif
                @endforeach
            </marquee>
              <div class="row">
                <div class="col-md-3" style="margin-top: 2%;">
                  <div class="card">
                    <div class="card-header">
                    Menu Bar
                    </div>
                    <div class="card-body">
                      <div class="col-md-3" style="padding-right: 20px;padding-left: 0px;margin-bottom: 10%;">.
                      <nav id="sidebar">
                      <div class="sidebar-header">
                          <h3>Menu Sidebar</h3>
                      </div>

                      <ul class="list-unstyled components">
                          <li class="active">
                              <a href="#itemSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Item Settings</a>
                              <ul class="collapse list-unstyled" id="itemSubmenu">
                                  <li>
                                      <a href="{{Route('product.create')}}">Add New Item</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('product.index')}}">Item List</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="#demandSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Demand Letter</a>
                              <ul class="collapse list-unstyled" id="demandSubmenu">
                                  <li>
                                      <a href="{{Route('demandletter.index')}}">Dealer Demand List</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('dealer.demand')}}">Dealer Demand</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('check.list')}}">Delivery List</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="#empSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Inventory</a>
                              <ul class="collapse list-unstyled" id="empSubmenu">
                                  <li>
                                      <a href="{{Route('product.stock.index')}}">Stock List</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('product.stock.in')}}">Stock New Item</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="#empSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Employee Settings</a>
                              <ul class="collapse list-unstyled" id="empSubmenu">
                                  <li>
                                      <a href="{{Route('emp.index')}}">Employee List</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('emp.create')}}">Add New Employee</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('designation.index')}}">Designation</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('department.index')}}">Department</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('staffcateory.index')}}">Stuff Category</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="#dealerSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Dealer Settings</a>
                              <ul class="collapse list-unstyled" id="dealerSubmenu">
                                  <li>
                                      <a href="{{Route('dealer.index')}}">Dealer List</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('dealer.getcreate')}}">Add New Dealer</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('dealersettings.type.create')}}">Dealer Type</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('dealersettings.area.create')}}">Dealer Area</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('division.index')}}">Division</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('dealersettings.zone.create')}}">Dealer Zone</a>
                                  </li>
                              </ul>
                          </li>
                          <li>
                              <a href="#setSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Settings</a>
                              <ul class="collapse list-unstyled" id="setSubmenu">
                                  <li>
                                      <a href="{{Route('company.index')}}">Company Settings</a>
                                  </li>
                                  
                                  <li>
                                      <a href="{{Route('factory.index')}}">Warehouse List</a>
                                  </li>
                                  <li>
                                      <a href="{{Route('factory.create')}}">Warehouse</a>
                                  </li>
                              </ul>
                          </li>
                      </ul>
                  </nav>
                </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-9"style="padding-right: 0px;padding-left: 0px;margin-top: 2%;">
                @yield('page-content')
                </div>
              </div>
            </div>
            @include('_partials_.footer')
     </div>
    </div>
  @endguest

    @include('_partials_.js')
  
</body>
</html>
