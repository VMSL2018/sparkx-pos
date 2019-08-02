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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <div class="col-md-12 align-self-center">
                        <h3 class="text-themecolor">Reports<span class="pull-right"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Product Group Data</li>
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
                                <h4 class="card-title">Product Group Report</h4>
                                <h6 class="card-subtitle"><code></code></h6>

                                <table id="salesreport" class="table table-striped table-bordered table-sm text-center" style="font-size:12px">
                                    <thead>
                                    <tr>
                                        <th>P. Code</th>
                                        <th>P. Name</th>
                                        <th>Category</th>
                                        <th>Purchased QTY </th>
                                        <th>Unit Cost</th>
                                        <th>Transport TK</th>
                                        <th>Total Cost</th>
                                        <th>GP TK</th>
                                        <th>Product Mix</th>
                                        <th>Sold QTY</th>
                                        <th>Unsold QTY</th>
                                        <th>Total QTY</th>
                                        <th>Required Quantity</th>
                                        <th>Reorder Level</th>
                                        <th>Reorder Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                    $i=1;
                                    @endphp

                                    @foreach($reports as $row)

                                        <tr>
                                            <td>{{$row["product_code"]}}</td>
                                            <td>{{$row["product_name"]}}</td>
                                            <td>{{$row["category"]}}</td>
                                            <td>{{$row["purchased_quantity"]}}</td>
                                            <td>{{$row["unit_cost"]}}</td>
                                            <td>{{$row["transport_cost"]}}</td>
                                            <td>{{$row["total_cost"]}}</td>
                                            <td>{{$row["gp_taka"]}}</td>
                                            <td>{{$row["product_mix"]}} %</td>
                                            <td>{{$row["sold_quantity"]}}</td>
                                            <td>{{ $row["unsold_quantity"] }}</td>
                                            <td>{{$row["total_quantity"]}}</td>
                                            <td>{{$row["required_quantity"]}}</td>
                                            <td>{{ $row["reorder_level"] }}</td>
                                            <td>
                                                @if($row["unsold_quantity"] >= $row["reorder_level"])
                                                    <label class="label label-warning">NO</label>
                                                @endif

                                                @if($row["unsold_quantity"] < $row["reorder_level"])
                                                    <label class="label label-success">YES</label>
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
        $('#salesreport').DataTable({
            dom: 'Bfrtip',
            order: [[ 3, "desc" ]],
             paging: false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endsection

