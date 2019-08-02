<?php
/**
 * Created by PhpStorm.
 * User: shovon
 * Date: 8/4/18
 * Time: 2:32 AM
 */
?>



@extends('layouts.layout')

{{--
    =>HEADER CSS ELEMENTS
    => ONLY WORKS FOR THIS PAGE
--}}
@section('headerContent')

@endsection


{{--MAIN WRAPPER ELEMENTS--}}
@section('content')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">


        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
    @include('inc.header')
    <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
    @include('inc.leftsidebar')
    <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">New Product Entry</h3>
                    </div>
                    {{--

                                        <div class="col-md-7 align-self-center text-right d-none d-md-block">
                                            <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</button>
                                        </div>
                    --}}
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-material m-t-40" id="add-product-form" method="post" action="/multiple">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Invoice Number</label>
                                                <input type="text" class="form-control form-control-line" placeholder="" name="invoice_number">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span> Invoice Date</label>
                                                <input type="date" class="form-control form-control-line" id="" placeholder="" name="invoice_date">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span> Invoice Total Price</label>
                                                <input type="number" min="0" class="form-control form-control-line" id="" placeholder="" name="invoice_cost">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Lot Number</label>
                                                <input type="text" class="form-control form-control-line" placeholder="" name="lot_number">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Supplier Name</label>
                                                <select name="supplier_id" id="" class="form-control form-control-line">
                                                    <option value="">Choose Your Option</option>
                                                    @foreach($suppliers as $row)
                                                        <option value="{{$row['id']}}">{{$row['name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Product Group</label>
                                                <select name="product_id" id="" class="form-control form-control-line">
                                                    <option value="">Choose Your Option</option>
                                                    @foreach($products as $row)
                                                        <option value="{{$row['product_code']}}">{{$row['product_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Unit Cost</label>
                                                <input type="number" min="1" class="form-control form-control-line" placeholder="" name="unit_cost" id="unit_cost">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Transportation Cost</label>
                                                <input type="number" min="1" class="form-control form-control-line" placeholder="" name="transportation_cost" id="transportation_cost">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Planned Showroom</label>
                                                <select name="showroom_id" id="" class="form-control form-control-line">
                                                    <option value="">Choose Your Option</option>
                                                    @foreach($showrooms as $row)
                                                        <option value="{{$row['id']}}">{{$row['showroom_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Warehouse</label>
                                                <select name="warehouse_id" id="" class="form-control form-control-line">
                                                    <option value="">Choose Your Option</option>
                                                    @foreach($warehouses as $row)
                                                        <option value="{{$row['id']}}">{{$row['warehouse_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                    <div class="row">
                                        @if($total_items != NULL)
                                        @for($i = 0;$i<$total_items;$i++)
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Item Code</label>
                                                <input type="text" class="form-control form-control-line" placeholder="" name="item_code[]" value="{{ $itemcodes[$i]['itemcode'] }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Sell Price <span class="help text-warning" id="PerUnitTotalPrice"></span></label>

                                                <input type="text" class="form-control form-control-line" placeholder="" name="selling_price[]">
                                            </div>
                                        </div>
                                        @endfor
                                        @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group text-center">
                            <button class="btn btn-info " type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © {{date('Y')}} SparkX Fashion Wear </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

@endsection



{{--
    =>FOOTER JS ELEMNETS
    => ONLY WORKS FOR THIS PAGE
--}}
@section('footerContent')
    <!--Custom JavaScript -->
    <script src="/js/custom.min.large-sidebar.js"></script>

@endsection

