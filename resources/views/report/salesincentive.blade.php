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
                            <li class="breadcrumb-item active">Employee DoD Sale's Report</li>
                        </ol>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="GET" class="form-inline">
                                    <div class="form-group">
                                        <label for="from" class="col-md-4">Year</label>
                                        <select name="year" id="year" class="form-control col-md-8">
                                            @for($i=2016;$i<=2100;$i++)
                                                <option>{!! $i !!}</option>
                                            @endfor
                                        </select>
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
                                <h4 class="card-title">Employee DoD Sale's Report - @php echo isset($_GET['year']) != null ? $_GET['year'] : date('Y'); @endphp </h4>
                                <h6 class="card-subtitle"><code></code></h6>

                                <table id="salesreport" class="display table table-hover table-striped table-bordered table-sm text-center" style="overflow:hidden !important">

                                        
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th>March</th>
                                            <th>April</th>
                                            <th>May</th>
                                            <th>June</th>
                                            <th>July</th>
                                            <th>August</th>
                                            <th>September</th>
                                            <th>October</th>
                                            <th>November</th>
                                            <th>December</th> 
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $jan = 0; $feb = 0; $mar = 0; $apr = 0; $may = 0; $june = 0; $july = 0; $aug = 0; $sep = 0; $oct = 0; $nov = 0; $dec = 0;
                                            $total = 0;
                                        @endphp

                                        @foreach($report as $row)
                                        @php
                                            $jan    += $row['january'];     $feb += $row['february'];   $mar    += $row['march']; 
                                            $apr    += $row['april'];       $may += $row['may'];        $june   += $row['june']; 
                                            $july   += $row['july'];        $aug += $row['august'];     $sep    += $row['september']; 
                                            $oct    += $row['october'];     $nov += $row['november'];   $dec    += $row['december']; 
                                        @endphp
                                            <tr>
                                                <td>{{ $row['employee_id'] }}</td>
                                                <td>{{ $row['january'] }}</td>
                                                <td>{{ $row['february'] }}</td>
                                                <td>{{ $row['march'] }}</td>
                                                <td>{{ $row['april'] }}</td>
                                                <td>{{ $row['may'] }}</td>
                                                <td>{{ $row['june'] }}</td>
                                                <td>{{ $row['july'] }}</td>
                                                <td>{{ $row['august'] }}</td>
                                                <td>{{ $row['september'] }}</td>
                                                <td>{{ $row['october'] }}</td>
                                                <td>{{ $row['november'] }}</td>
                                                <td>{{ $row['december'] }}</td>
                                                <td>
                                                    {{ 
                                                        $row['january']+ $row['february']+$row['march']+
                                                        $row['april']+$row['may']+$row['june']+$row['july']+$row['august']+
                                                        $row['september']+$row['october']+$row['november']+$row['december']

                                                    }}
                                                    @php
                                                        $total  +=  $row['january']+ $row['february']+$row['march']+
                                                                    $row['april']+$row['may']+$row['june']+$row['july']+$row['august']+
                                                                    $row['september']+$row['october']+$row['november']+$row['december']
                                                    @endphp
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr class="text-danger">
                                                <td></td>
                                                

                                                <td>{!! $jan    !!}</td>
                                                <td>{!! $feb    !!}</td>
                                                <td>{!! $mar    !!}</td>
                                                <td>{!! $apr    !!}</td>
                                                <td>{!! $may    !!}</td>
                                                <td>{!! $june   !!}</td>
                                                <td>{!! $july   !!}</td>
                                                <td>{!! $aug    !!}</td>
                                                <td>{!! $sep    !!}</td>
                                                <td>{!! $oct    !!}</td>
                                                <td>{!! $nov    !!}</td>
                                                <td>{!! $dec    !!}</td>
                                                <td>{!! $total !!}</td>
                                            </tr>
                                    </tfoot>
                                        
                                    
                                    
 
                                    
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

