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
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                  <center>
                            <h2 style="font-size:15px;">SparkX Fashion Wear</h2>
                            <p style="margin-top:-10px"><small>Switching to Smart</p>
                            </center>
                           <hr>
                        
                            <table class="table table-sm table-bordered">
                                <tr>
                                    <td>Showroom:</td>
                                    <td>{{ $data['from_pos_primary'][0]['showroom'] }}</td>
                                </tr>
                                <tr>
                                    <td>Invoice:</td>
                                    <td>{{ $data['from_pos_primary'][0]['pos_session_code'] }}</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>{{ $data['from_pos_primary'][0]['created_at'] }}</td>
                                </tr>
                            </table>


                         	<div id="bot">
                       	<div id="table">
                        	<hr>
                            <table style="" class="table table-bordered table-sm text-center">
                                <tr>
                                    <th>SL</th>
                                    <th>Code</th>
                                    <th>Product</th>
                                    <th>Tag</th>
                                    <th>Dis</th>
                                    <th>Net</th>
                                </tr>


                            @php
                                $j=1;    
                            @endphp
                            @for($i = 0; $i < count($data['from_pos']); $i++)
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ $data['from_pos'][$i]['itemcode'] }}</td>
                                    <td>{{ $data['from_pos'][$i]['product_name'] }}</td>
                                    <td>{{ $data['from_pos'][$i]['tag_price'] }}TK</td>
                                    <td>{{ $data['from_pos'][$i]['discount_price'] }}TK</td>
                                    <td>{{ $data['from_pos'][$i]['total_price'] }} TK</td>
                                </tr>
                                @php $j++; @endphp
                            @endfor
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <!--
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Sub Total</td>
                                    <td></td>
                                    <td>{{ $data['from_pos_primary'][0]['subtotal_price'] }}TK</td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Discount</td>
                                    <td></td>
                                    <td>{{ $data['from_pos_primary'][0]['discount_price'] }}TK</td>
                                </tr>
                                -->

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Net Cash</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $data['from_pos_primary'][0]['total_price'] }}TK</td>
                                </tr>
                            </table>
                        
                         </div>
                      <hr>
                        <div id="legalcopy">
                            <p class="legal" style="text-align:right">Thank you for shopping with us.</p>
                            <p class="legal" style="text-align:right">_________________</p>
                            <p class="legal" style="text-align:right;margin-top:-10px;">Signature</p>
                            <p class="legal" style="text-align:center">***</p>
                        </div>

                         </div>
                         </div>


                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <a href="/new-entry"><button class="btn btn-info">Back</button></a>
                            <button class="btn btn-warning" onclick="print()">Print</button>
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
            //order: [[ 2, "desc" ]],
            paginate:false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <script>
        function print(){
            var data = @php echo json_encode($data); @endphp ;
            //console.log(data);
                        var j =1;
                        var     newWindow = window.open('', '', 'width=100, height=100');
                        var     document = newWindow.document.open();
                        var     pageContent ="";
                        pageContent +='    <center>';
                        pageContent +='    <h2 style="font-size:15px;">SparkX Fashion Wear</h2>';
                        pageContent +='    <p style="margin-top:-10px"><small>Switching to Smart</p>';
                        pageContent +='    </center>';
                        pageContent +='    <hr>';
                        
                        pageContent +='		<table>';
                        pageContent +='		<tr>';
                        pageContent +='		<td><p style="margin-top:-5px"><small>Showroom: '+data['from_pos_primary'][0].showroom+'</small></p></td>';
                        pageContent +='		</tr>';
                        pageContent +='		<tr>';
                        pageContent +='		<td style=""><p style="margin-top:-5px"><small>Invoice: '+data['from_pos_primary'][0].pos_session_code+'</small></p></td>';
                        pageContent +='		</tr>';
                        pageContent +='		<tr>';
                        pageContent +='		<td><p style="margin-top:-5px"><small>Date: '+data['from_pos_primary'][0].created_at+'</small></p></td>';
                        pageContent +='		</tr>';
                        pageContent +='		</table>';


                        pageContent +=' 	<div id="bot">';
                        pageContent +=' 	<div id="table">';
                        pageContent +=' 	<hr>';
                        pageContent +=' 	<table style="font-size:10px;font-family:arial;">';
                        pageContent +=' 	<tr style="text-align:center">';
                        pageContent +=' 	<th>SL</th>';
                        pageContent +=' 	<th>Code</th>';
                        pageContent +=' 	<th>Product</th>';
                        pageContent +=' 	<th>Tag</th>';
                        pageContent +=' 	<th>Dis</th>';
                        pageContent +=' 	<th>Net</th>';
                        pageContent +=' 	</tr>';

                        pageContent +='   <tr>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   </tr>';

                        for(i = 0; i < data['from_pos'].length; i++){
                            var discount = data['from_pos'][i].discount_price;
                            if(discount){ discount = data['from_pos'][i].discount_price }
                            else{discount = 0;}
                        
                            pageContent +='   <tr>';
                            pageContent +='   <td style="text-align:left">'+j+'</td>';
                            pageContent +='   <td style="text-align:left">'+data['from_pos'][i].itemcode+'</td>';
                            pageContent +='   <td style="text-align:left">'+data['from_pos'][i].product_name+'</td>';
                            pageContent +='   <td style="text-align:left">'+data['from_pos'][i].tag_price+'TK</td>';
                            pageContent +='   <td style="text-align:left">'+discount+'TK</td>';
                            pageContent +='   <td style="text-align:right">'+data['from_pos'][i].total_price+'TK</td>';
                            pageContent +='   </tr>';

                            j++;
                        }

                        pageContent +='   <tr>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   </tr>';

                    /*        
                        pageContent +='   <tr>';
                        pageContent +='   <td></td>';
                        pageContent +='   <td></td>';
                        pageContent +='   <td style="text-align:left">Sub Total</td>';
                        pageContent +='   <td></td>';
                        pageContent +='   <td style="text-align:right">'+data['from_pos_primary'][0].subtotal_price+'TK</td>';
                        pageContent +='   </tr>';

                        pageContent +='   <tr>';
                        pageContent +='   <td></td>';
                        pageContent +='   <td></td>';
                        pageContent +='    <td style="text-align:left">Discount</td>';
                        pageContent +='   <td></td>';
                        pageContent +='    <td style="text-align:right">'+data['from_pos_primary'][0].discount_price+'TK</td>';
                        pageContent +='   </tr>';
                    */
                        pageContent +='   <tr>';
                        pageContent +='   <td></td>';
                        pageContent +='   <td></td>';
                        pageContent +='    <td style="text-align:left">Net Cash</td>';
                        pageContent +='   <td></td>';
                        pageContent +='   <td></td>';
                        pageContent +='    <td style="text-align:right">'+data['from_pos_primary'][0].total_price+'TK</td>';
                        pageContent +='   </tr>';
                        
                        

                        pageContent +='   </table>';
                        
                        pageContent +='    </div>';
                        pageContent +='    <hr>';
                        pageContent +='   <div id="legalcopy">';
                        pageContent +='   <p class="legal" style="text-align:right">Thank you for shopping with us.</p>';
                        pageContent +='   <p class="legal" style="text-align:right">_________________</p>';
                        pageContent +='   <p class="legal" style="text-align:right;margin-top:-10px;">Signature</p>';
                        pageContent +='   <p class="legal" style="text-align:center">***</p>';
                        pageContent +=  '  </div>';

                        pageContent += '  </div>';
                        pageContent +='   </div>';


                        document.write(pageContent);
                        document.close();
                        newWindow.moveTo(0, 0);
                        newWindow.resizeTo(screen.width, screen.height);
                        setTimeout(function() {
                            newWindow.print();
                            newWindow.close();
                            window.location = "/print/"+data['from_pos_primary'][0].invoice;
                        }, 250);
                        
        }
    </script>
@endsection

