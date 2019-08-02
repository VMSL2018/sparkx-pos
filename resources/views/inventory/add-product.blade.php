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
                        <h3 class="text-themecolor">New Product Supply Entry From : &nbsp; {{$itemcode['itemcode']}}</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">New Data Entry-Inventory</li>
                        </ol>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Product in Inventory</h4>
                                <h6 class="card-subtitle"><code></code></h6>
                                <form class="form-material m-t-40" id="add-product-form" method="post" action="/inventory">
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
                                                    @foreach($men as $row)
                                                        <option value="{{$row['product_code']}}">{{$row['product_name']}}</option>
                                                    @endforeach
                                                    @foreach($ladies as $row)
                                                        <option value="{{$row['product_code']}}">{{$row['product_name']}}</option>
                                                    @endforeach
                                                    @foreach($boys as $row)
                                                        <option value="{{$row['product_code']}}">{{$row['product_name']}}</option>
                                                    @endforeach
                                                    @foreach($girls as $row)
                                                        <option value="{{$row['product_code']}}">{{$row['product_name']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Total Item</label>
                                                <input type="text" class="form-control form-control-line" placeholder="" name="total_item">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Unit Cost</label>
                                                <input type="number" min="1" class="form-control form-control-line" placeholder="" name="unit_cost" id="unit_cost">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help"></span>Transportation Cost</label>
                                                <input type="number" min="1" class="form-control form-control-line" placeholder="" name="transportation_cost" id="transportation_cost">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Sell Price <span class="help text-warning" id="PerUnitTotalPrice"></span></label>

                                                <input type="text" class="form-control form-control-line" placeholder="" name="selling_price">
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





                                    <div class="form-group text-center">
                                        <button class="btn btn-info ">Save</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>


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
    <script>
        /*
        $("#add-product-form").submit(function(e){
            return false;
        });
*/
    </script>
    <script>
        $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    </script>
    <script>
        $( "#transportation_cost" ).change(function() {
            var TransportationCost = document.getElementById('transportation_cost').value;
            var UnitCost = document.getElementById('unit_cost').value;
            var PerUnitTotalCost = Number(TransportationCost)+Number(UnitCost);

            $("#PerUnitTotalPrice").text("(Per Unit Total Price is TK "+PerUnitTotalCost+"/-)");
        });
    </script>
@endsection

