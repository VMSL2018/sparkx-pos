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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
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
                        <h3 class="text-themecolor">Product Return</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Product Return</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <!--POS form-->
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Return Item From Customer</h4>
                                        <h6 class="card-subtitle"><code><span class="help-block text-danger" id="message">  </span> </code></h6>
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" autofocus >
                                                    <p class="text-danger" id="item_code_warning"></p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="return_reason" name="return_reason" placeholder="Reason for Return" >
                                                    <p class="text-danger" id="return_reason_warning"></p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-info" id="" type="submit" onclick="returnitem()">Return</button>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sale's Return Report</h4>
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
                                            <th>Check</th>
                                            <th>Return Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i =1; $cumulative = 0;@endphp
                                        @if($returns!=null)
                                        @foreach($returns as $row)
                                            <tr>
                                                <td>{!! $i !!}</td>
                                                <td>{!! $row['weekday'] !!}</td>
                                                <td>{!! Carbon\Carbon::parse($row['created_at'])->format('d/m/Y');  !!}</td>
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
                                                <td></td>
                                                <td>{!! $row['product_name'] !!}</td>
                                                <td>{!! $row['employee_name'] !!}</td>
                                                <td>{!! $row['supplier_name'] !!}</td>
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
                                                <td>{!! Carbon\Carbon::parse($row['updated_at'])->format('d/m/Y');  !!}</td>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $(":input").keypress(function(event){
                if (event.which == '10' || event.which == '13') {
                    event.preventDefault();
                }
            });
        });
    </script>

    <script>
        function returnitem(){

            var item_code = $('#item_code').val();
            var return_reason = $('#return_reason').val();

            if(!item_code){ $('#item_code_warning').html("Insert Item Code") }
            if(!return_reason){ $('#return_reason_warning').html("Insert Return Reason") }

            if(item_code  && return_reason){
                $.ajax({
                    method:'POST',
                    url:'/return',
                    data:{
                        item_code : item_code,
                        return_reason : return_reason,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        if(data == "success"){
                            swal("Good job!","Product returned successfully","success")
                                .then((value) => {
                                    window.location = "/return";
                                });
                        }else{
                            swal("Oops!","Something Wen Wrong","danger")
                                .then((value) => {
                                    window.location = "/return";
                                });
                        }
                    }
                });
            }


        }
    </script>

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
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
@endsection

