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
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Inventory Registry</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="allProductsTable" class="display table table-hover table-striped table-bordered table-sm text-center" style="font-size:12px">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Lot</th>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Supplier Name</th>
                                            <th>Unit Price</th>
                                            <th>Transport Taka</th>
                                            <th>Unit Total Price</th>
                                            <th>Selling Price</th>
                                            <th>GP Taka</th>
                                            <th>GP Margin</th>
                                            <th>Planned Showroom</th>
                                            <th>Warehouse</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody style="">
                                            @foreach($inventories as $row)
                                                <tr>
                                                    <td>{{ Carbon\Carbon::parse($row['invoice_date'])->format('d/m/Y') }}</td>
                                                    <td>{{ $row['invoice_number'] }}</td>
                                                    <td>{{ $row['lot_number'] }}</td>
                                                    <td>{{ $row["item_code"] }}</td>
                                                    <td>{{ $row["product_name"] }}</td>
                                                    <td>{{ $row["category"] }}</td>
                                                    <td>{{ $row['supplier_name'] }}</td>
                                                    <td>{{ $row["unit_cost"] }}</td>
                                                    <td>{{ $row["transportation_cost"] }}</td>
                                                    <td>{{ $row["unit_total_cost"] }}</td>
                                                    <td>{{ $row["selling_price"] }}</td>
                                                    <td>{{ $row["gp_taka"] }}</td>
                                                    <td>{{ $row["gp_margin"] }}%</td>
                                                    <td>{{ $row['showroom_name'] }}</td>
                                                    <td>{{ $row['warehouse_name'] }} </td>
                                                    <td>
                                                        @php
                                                            $status = '';
                                                            $status_code = '';
                                                            if($row['selling_status'] == 0)
                                                                $status = 'Unsold';
                                                                $status_code = '0';
                                                            if($row['selling_status'] == 1)
                                                                $status = 'Sold';
                                                                $status_code = '1';
                                                            if($row['selling_status'] == 2)
                                                                $status = 'Returned from Customer';
                                                                $status_code = '2';
                                                            if($row['selling_status'] == 3)
                                                                $status = 'Lost';
                                                                $status_code = '3';
                                                            if($row['selling_status'] == 4)
                                                                $status = 'Damaged';
                                                                $status_code = '4';
                                                            if($row['selling_status'] == 5)
                                                                $status = 'Returned to Supplier';
                                                                $status_code = '5';
                                                        @endphp
                                                        <label for="" class="label label-warning"> {{ $status }}</label>
                                                    </td>
                                                    
                                                    <td>
                                                        @if($row['selling_status'] == 1)
                                                            <label for="" class="label label-warning"> EDIT</label>
                                                        @else 
                                                            <a href="/inventory/{{ $row['id'] }}/edit"><label for="" class="label label-info"> EDIT</label></a> 
                                                        @endif
                                                        
                                                    </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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

