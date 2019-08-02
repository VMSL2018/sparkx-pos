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
    input{
        width: 60px !important;
        padding-right: 5px !important;
    }
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
                        <form method="post" action="/inventory/bulkupdate">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Inventory Registry-EDIT</h4>
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
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="lot" value="{{ $_GET['lot'] }}">
                                                        <input type="hidden" name="invoice_number" value="{{ $row["invoice_number"] }}">
                                                        <input style= "width:60px !important;" type="hidden" name="id[]" id="id" value="{{ $row["id"] }}">
                                                        <td>
                                                            {{ Carbon\Carbon::parse($row['invoice_date'])->format('d/m/Y') }}
                                                        </td>
                                                        <td>
                                                            {{ $row['invoice_number'] }}
                                                        </td>
                                                        <td>
                                                            <input type="text" name="lot_number[]" id="lot_number" value="{{ $row['lot_number'] }}">
                                                        </td>
                                                        <td>
                                                            {{ $row["item_code"] }}
                                                        </td>
                                                        <td>
                                                            <select name="product_name[]" id="product_name">
                                                                <option value="{{ $row["products_id"] }}">{{ $row["product_name"] }}</option>
                                                                @foreach ($products  as $item)
                                                                    <option value="{{ $item->product_code }}">{{ $item->product_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="category[]" id="category">
                                                                <option value="{{ $row["category"] }}">{{ $row["category"] }}</option>
                                                                <option value="MAN">MAN</option>
                                                                <option value="LADY">LADY</option>
                                                                <option value="BOY">BOY</option>
                                                                <option value="GIRL">GIRL</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="supplier_name[]" id="supplier_name">
                                                                <option value="{{ $row['supplier_id'] }}">{{ $row['supplier_name'] }}</option>
                                                                @foreach ($suppliers  as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="unit_cost[]" id="unit_cost" value="{{ $row["unit_cost"] }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="transportation_cost[]" id="transportation_cost" value="{{ $row["transportation_cost"] }}">
                                                        </td>
                                                        <td>
                                                            {{ $row["unit_total_cost"] }}                                                   
                                                        </td>
                                                        <td>
                                                            <input type="text" name="selling_price[]" id="selling_price" value="{{ $row["selling_price"] }}">
                                                        </td>
                                                        <td>
                                                            {{ $row["gp_taka"] }}
                                                        </td>
                                                        <td>
                                                            {{ $row["gp_margin"] }}%
                                                        </td>
                                                        <td>
                                                            <select name="showroom_name[]" id="showroom_name">
                                                                <option value="{{ $row['showroom_id'] }}">{{ $row['showroom_name'] }}</option>
                                                                @foreach ($showrooms  as $item)
                                                                    <option value="{{ $item->id}}">{{ $item->showroom_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="warehouse_name[]" id="warehouse_name">
                                                                <option value="{{ $row['warehouse_id'] }} ">{{ $row['warehouse_name'] }} </option>
                                                                @foreach ($warehouses as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->warehouse_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select name="selling_status[]" id="selling_status">
                                                                @php
                                                                    $status = '';
                                                                    $status_code = '';
                                                                    if($row['selling_status'] == 0){
                                                                        $status = 'Unsold';
                                                                        $status_code = '0';
                                                                    }
                                                                    if($row['selling_status'] == 1){
                                                                        $status = 'Sold';
                                                                        $status_code = '1';
                                                                    }
                                                                    if($row['selling_status'] == 2){
                                                                        $status = 'Returned from Customer';
                                                                        $status_code = '2';
                                                                    }
                                                                    if($row['selling_status'] == 3){
                                                                        $status = 'Lost';
                                                                        $status_code = '3';
                                                                    }
                                                                    if($row['selling_status'] == 4){
                                                                        $status = 'Damaged';
                                                                        $status_code = '4';
                                                                    }
                                                                    if($row['selling_status'] == 5){
                                                                        $status = 'Returned to Supplier';
                                                                        $status_code = '5';
                                                                    }
                                                                @endphp
                                                                <option value="{{ $status_code }} ">{{ $status }} </option>
                                                                {{-- 
                                                                    <option value="0">Unsold</option>
                                                                    <option value="1">Sold</option>
                                                                    <option value="2">Returned from Customer</option>
                                                                --}}
                                                                    <option value="3">Lost</option>
                                                                    <option value="4">Damaged</option>
                                                                    <option value="5">Returned to Supplier</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <a href="/inventory/{{ $row['id'] }}/edit" target="_blank"><label for="" class="label label-info"> EDIT</label></a> 
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-info" name="update" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
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
<script src="/js/custom.min.small-sidebar.js"></script>
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
            /*
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
            */
        });
    </script>

@endsection

