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
                    <div class="col-md-12 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Sale's Report</li>
                        </ol>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="GET" class="form-inline">
                                    <div class="form-group">
                                        <label for="from" class="col-md-4">From</label>
                                        <input type="date" class="form-control col-md-8" name="from">
                                    </div>
                                    <div class="form-group">
                                        <label for="to" class="col-md-3">To</label>
                                        <input type="date" class="form-control col-md-9" name="to">
                                    </div>
                                    <div class="text-center">
                                        &nbsp;&nbsp;&nbsp;<button class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sale's Report</h4>
                                <h6 class="card-subtitle"><code></code></h6>

                                <table id="salesreport" class="display table table-hover table-striped table-bordered table-sm text-center" style="font-size:12px">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Weekday</th>
                                            <th>Date</th>
                                            <th>Item Code</th>
                                            <th>Tag</th>
                                            <th>Discount</th>
                                            <th>Final</th>
                                            <th>Cumulative</th>
                                            <th>Bonus</th>
                                            <th>Customer Type</th>
                                            <th>Product Name</th>
                                            <th>Seller Name</th>
                                            <th>Supplier Name</th>
                                            <th>Showroom</th>
                                            <th>Check</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i =1; $cumulative = 0;@endphp
                                        @if($sales!=null)
                                        @foreach($sales as $row)
                                            <tr>
                                                <td>{!! $i !!}</td>
                                                <td>{!! $row['weekday'] !!}</td>
                                                <td>{!! Carbon\Carbon::parse($row['created_at'])->format('d/m/Y'); !!}</td>
                                                <td>{!! $row['itemcode'] !!}</td>
                                                <td>{!! $row['tag_price'] !!}</td>
                                                <td>{!! $row['discount_price'] !!}</td>
                                                <td>{!! $row['total_price'] !!}</td>
                                                <td>
                                                    @php
                                                       echo $cumulative +=  $row['total_price'];   
                                                    @endphp
                                                </td>
                                                <td>{!! $row['bonus'] !!}</td>
                                                <td>{!! $row['customer_type'] !!}</td>
                                                <td>{!! $row['product_name'] !!}</td>
                                                <td>{!! $row['employee_name'] !!}</td>
                                                <td>{!! $row['supplier_name'] !!}</td>
                                                <td>{!! $row['showroom'] !!}</td>
                                                <td>
                                                    @php
                                                        if(intval($row['tag_price']) == intval($row['total_price'])){
                                                          
                                                        }
                                                        if(intval($row['tag_price']) > intval($row['total_price'])){
                                                            $check  = round((intval($row['total_price'])/intval($row['tag_price']))*100,1);
                                                        }else{
                                                            $check = 100; 
                                                        }
                                                    @endphp
                                                    @if($check < 90)
                                                        <label for="" class="label label-danger">{{ $check  }}%</label>
                                                    @else    
                                                        <label for="" class="label label-success">{{ $check  }}%</label>
                                                    @endif
                                                </td>
                                            
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                        @endif
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
            paginate:false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endsection

