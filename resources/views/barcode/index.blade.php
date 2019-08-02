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
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
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
                    <div class="col-md-12 align-self-center">
                        <h3 class="text-themecolor">Print Barcode</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Print Barcode</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->


                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->

                <div class="row container">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="/barcodesearch" method="post">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="lot_number" id="lot_number" placeholder="Input Your Lot Number" >
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-info">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card"  >
                            <div class="card-body">
                                <div class="card-title">Export Barcode</div>
	                                <div class="table-responsive" id="" >
                                        @if($barcodes !=null)
                                            <table  id="printTable" class=" text-center display nowrap table table-hover  table-bordered table-condensed">
                                                <tbody>
                                        		@foreach($barcodes as $barcode)
                                                <tr>
                            						<td style="width:120px !important;padding-left:5px;">
                                                    	<p style="margin-top:-15px; important;font-weight:bold !important;">
	                        								<svg  style="" id='A{{$barcode['item_code']}}'></svg> 
	                                                        <script>
	                                                    		JsBarcode('#A{{$barcode['item_code']}}', '{{$barcode['item_code']}}',{
						
																	textPosition:"top",
																	height:"25",
																	width:1.2,
																	marginBottom:0,
																	fontSize:12,
																	font:"arial"
	                                                    		});
	                                                		</script>
                            							</p>
                            							
                            							<p style="margin-top:-15px;margin-left:10px;font-size:10px !important;line-height:120%;font-family:arial !important;font-weight:bold">
                            								{{$barcode['product_name']}} 
                        								</p>
                            							
                            							<p style="float:right;margin-right:7px;margin-top:-15px;margin-left:10px;font-size:12px !important;font-family:arial !important;font-weight:bold">
                            								Taka:{{$barcode['selling_price']}} 
                        								</p>
                            								
                            							
														
														
													</td>
                            						<td style="width:120px !important;padding-left:25px !important;">
                            							<p style="margin-top:-15px; important">
	                        								<svg  style="" id='A{{$barcode['item_code']}}'></svg> 
	                                                        <script>
	                                                    		JsBarcode('#A{{$barcode['item_code']}}', '{{$barcode['item_code']}}',{
																	
																	textPosition:"top",
																	height:"25",
																	width:1.2,
																	marginBottom:0,
																	fontSize:12,
																	font:"monospace"
	                                                    		});
	                                                		</script>
                            							</p>
                            							
                                                    	<p style="margin-top:-15px;margin-left:10px;font-size:10px !important;line-height:120%;font-family:arial !important;font-weight:bold">
                            								{{$barcode['product_name']}} 
                        								</p>
                            							
                            							<p style="float:right;margin-right:7px;margin-top:-15px;margin-left:10px;font-size:12px !important;font-family:arial !important;font-weight:bold">
                            								Taka:{{$barcode['selling_price']}} 
                        								</p>
								
													</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                			</table>
                                		@endif
	                                </div>
									<center><button class="btn btn-info" id="print"> Print </button></center>	
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- End Info box -->
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
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('#salesreport').DataTable({
            dom: 'Bfrtip',
            paginate:false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <script>
        function convertToImage() {
            var resultDiv = document.getElementById("result");
            html2canvas(document.getElementById("printtable"), {
                onrendered: function(canvas) {
                    var img = canvas.toDataURL("image/png");
                    result.innerHTML = '<img  src="'+img+'"/>';
                    //result.innerHTML = '<a href="'+img+'" class="btn btn-info" download="filename.jpg">Download</a>';

                    //var prtContent = document.getElementById("print");
                    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                    WinPrint.document.write(result.innerHTML);
                    WinPrint.document.close();
                    WinPrint.focus();
                    setTimeout(function() {
                        WinPrint.print();
                        WinPrint.close();
                    }, 250);
                }
            });
        }

        //click event
        var convertBtn = document.getElementById("convert");
        convertBtn.addEventListener('click', convertToImage);
    </script>



    <script>
    	var array = @php echo json_encode($barcodes );  @endphp ;
    	console.log(array);
    </script>

    
    <script>
    	function barcodes(){
    		
						var barcodeX = document.getElementById('jsbarcodeprint'); 
						var     newWindow = window.open('', '', 'width=100, height=100');
						var     document = newWindow.document.open();
						var     pageContent ="";
						pageContent += '<table class="" style="font-size:15px !important;font-family:courier !important;font-weight:boldest !important;" >'; 
						pageContent += '<tr>'; 
						pageContent += '<td style="width:120px !important">';
						pageContent +=   	'<h6 style="margin-left:13px; margin-right:30px;margin-top:5px">'+barcodeX+'</h6>';
						pageContent +=   	'<h6 style="margin-left:13px;margin-top:-25px;text-align:left"></h6>';
						pageContent +=   	'<h6 style="margin-left:13px;margin-top:-25px;text-align:left; line-height:70%;"><strong>Man Full Sleeve Casual</strong></h6>';
						pageContent +=		'<h6 style="margin-left:13px;margin-top:-25px;text-align:left"><strong>Taka&nbsp;500</strong></h6>';
						pageContent += '</td>';
						
						pageContent += '<td>';
						pageContent +=   	'<h6 style="margin-left:50px;">ABCD123</h6>';
						pageContent +=   	'<h6 style="margin-top:-30px;margin-left:50px;"><strong>00020535</strong></h6>';
						pageContent +=   	'<h6 style="margin-top:-30px;margin-left:50px;"><strong>Man</strong></h6>';
						pageContent +=		'<h6 style="margin-top:-30px;margin-left:50px;"><strong>Taka&nbsp;500</strong></h6>';
						pageContent += '</td>';
						pageContent += '</tr>';
						pageContent += '</table>'; 





                        document.write(pageContent);
                        document.close();
                        newWindow.moveTo(0, 0);
                        newWindow.resizeTo(screen.width, screen.height);
                        setTimeout(function() {
                            newWindow.print();
                            newWindow.close();
                            window.location = "/barcode";
                        }, 250);
    	}
    </script>
    
    <script>
    	function printData(){
    		
		   var divToPrint=document.getElementById("printTable");
		   newWin= window.open("");
		   newWin.document.write(divToPrint.outerHTML);
		   newWin.print();
		   newWin.close();
		   
		}

		$('#print').on('click',function(){
			printData();
		})
    </script>
	

@endsection
