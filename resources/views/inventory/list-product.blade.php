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
<style>




</style>
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
                    {{--  
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Reports</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">All Product  Report</li>
                        </ol>
                    </div>
                    --}}
                    {{--

                    <div class="col-md-7 align-self-center text-right d-none d-md-block">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</button>
                    </div>
                    --}}

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>View & Download Data</h3>
                                    <p class="text-warning">Tips: To edit any single item you can search from here by inserting item code</p>
                                </div>
                                <form class="form-material m-t-40" id="add-product-form" method="post" action="/inventory/alldata">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <div class="row">
                                            <label class=" col-md-2">From:&nbsp;&nbsp;&nbsp;</label>
                                            <input type="date" class="form-control form-control-line col-md-8" placeholder="" name="from">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-2">To:&nbsp;&nbsp;&nbsp;</label>
                                            <input type="date" class="form-control form-control-line col-md-8" placeholder="" name="to">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2"><span ></span>Item Code&nbsp;&nbsp;</label>
                                            <input type="text" class="form-control form-control-line col-sm-8" placeholder="" name="item_code">
                                        </div>
                                    </div>
                                        

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2">Invoice&nbsp;&nbsp;&nbsp;</label>
                                            <input type="text" class="form-control form-control-line col-sm-8" placeholder="" name="invoice_number">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2">Lot&nbsp;&nbsp;&nbsp;</label>
                                            <input type="text" class="form-control form-control-line col-sm-8" placeholder="" name="lot_number">
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2">Status&nbsp;&nbsp;&nbsp;</label>
                                            <select class="form-control col-sm-8" name="selling_status" id="selling_status">
                                                <option value="">Choose Your Option</option>
                                                <option value="0">Unsold</option>
                                                <option value="1">Sold</option>
                                                <option value="2">Return from Customer</option>
                                                <option value="3">Lost</option>
                                                <option value="4">Damage</option>
                                                <option value="5">Return to Supplier</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-2">Location&nbsp;&nbsp;&nbsp;</label>
                                            <select class="form-control col-sm-8" name="warehouse_id" id="warehouse_id">
                                                <option value="">Choose Your Option</option>
                                                @foreach ($warehouses  as $row)
                                                    <option value="{{ $row['id'] }}">{{ $row['warehouse_name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                         
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <div class="form-group">
                                                <button class="btn btn-info" type="submit">View & Download</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>Edit Inventory Data (Bulk Edit)</h3>
                                    <p class="text-warning">Tips: Use this section for updating multiple items from inventory.</p>
                                </div>     

                                <form class="form-material m-t-40" id="add-product-form" method="get" action="/inventory-search">
                                    
                                    <div class="row">
                                    <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label><span class="help col-sm-6"></span>Lot Number</label>
                                                <input type="text" class="form-control form-control-line col-sm-6" placeholder="" name="lot">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <div class="form-group">
                                                <button class="btn btn-info" type="submit">EDIT</button>
                                            </div>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
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
    <!-- This is data table -->
    <script src="../assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(function() {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });

        });
        $('#allProductsTable').DataTable({
            dom: 'Bfrtip',
            paging: false,
            searching:true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>

@endsection

