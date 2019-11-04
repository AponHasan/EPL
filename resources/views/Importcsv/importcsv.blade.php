@extends('layouts.app-layout')
@section('page-content')

<div class="row">
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success "id="success-alert">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
    <div class="col-md-12">
        <div class="card">
            <div class="row" style="margin-top:30px; ">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Department CSV
                        </div>
                        <div class="card-body">
                            <form action="{{route('department.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                        Dealer CSV 
                        </div>
                        <div class="card-body">
                            <form action="{{route('dealer.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Dealer</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Dealer Zone 
                        </div>
                        <div class="card-body">
                            <form action="{{route('dealer.zone.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Dealer Zone</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Dealer Type 
                        </div>
                        <div class="card-body">
                            <form action="{{route('dealer.type.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Dealer Type</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Dealer Designation 
                        </div>
                        <div class="card-body">
                            <form action="{{route('dealer.designation.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Dealer Designation</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Dealer division 
                        </div>
                        <div class="card-body">
                            <form action="{{route('division.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Division</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Line Manager CSV
                        </div>
                        <div class="card-body">
                            <form action="{{route('linemanager.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Line manager</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            SPO CSV
                        </div>
                        <div class="card-body">
                            <form action="{{route('spo.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Spo</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                        Warehouse CSV
                        </div>
                        <div class="card-body">
                            <form action="{{route('factory.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Warehouse CSV</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                         StaffCategory CSV
                        </div>
                        <div class="card-body">
                            <form action="{{route('staffcategory.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import StaffCategory CSV</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                         Dealer Area CSV
                        </div>
                        <div class="card-body">
                            <form action="{{route('dealerarea.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Dealer Area CSV</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                         Product CSV
                        </div>
                        <div class="card-body">
                            <form action="{{route('product.import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" accept=".csv">
                                <button class="btn btn-success">Import Product CSV</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('end_js')
<script>
$(document).ready (function(){
            $("#success-alert").fadeTo(7000, 7000).slideUp(1000);
 });
</script>
@endpush