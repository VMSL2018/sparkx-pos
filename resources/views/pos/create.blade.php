<?php
/**
 * Created by PhpStorm.
 * User: shovon
 * Date: 8/4/18
 * Time: 2:32 AM
 */
?>

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

                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-7">
                        <!--INPUT ITEM BARCODE-->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Item</h4>
                                <h6 class="card-subtitle"><code><span class="help-block text-danger" id="message"> Sale ID: <strong>@php echo date("Ymdhis"); @endphp</strong> </span> </code></h6>

                                <form  id="itemForm">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <input type="hidden" name="pos_session_code" id="pos_session_code" value="@php echo date("Ymdhis"); @endphp">
                                        @php
                                            $datetime = DateTime::createFromFormat('YmdHis', date("YmdHis"));
                                        @endphp
                                        <input type="hidden" id="weekday" value="{!! $datetime->format('l') !!}">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="itemCode" name="itemCode" autofocus required>
                                        </div>


                                        <div class="col-sm-2">
                                            <button class="btn btn-info" id="ItemCodeSubmit" type="submit">Add</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!--iTEM LIST INSERTED IN POS-->
                        <div class="card" >
                            <div class="card-body">
                                <div id ="ItemList"></div>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                            <!--BASIC INFORMATION COLLECTING FORM-->
                                <form action="">
                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="">Customer Type</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="customer_type" id="customer_type" class="form-control" required>
                                                <option value="NEW">NEW</option>
                                                <option value="OLD">OLD</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="">Customer No</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="customernumber" id="customernumber" list="customernumberlist">
                                            <p class="text-warning" id="customerinfo"></p>
                                        </div>

                                    </div>

                                    <div class="row form-group">
                                        <div class="col-sm-2">
                                            <label for="">Employee ID</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="employee_id" id="employee_id" required>
                                            <p class="text-warning" id="employeeinfo"></p>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="">Payment Method</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <select name="payment_method" id="payment_method" class="form-control" required>
                                                <option value="Cash">Cash</option>
                                                <option value="Card">Card</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>

                                <!--CALCULATIONS-->
                                <hr>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Sub Total</th>
                                            <th id="subtotalprice" class="animated wobble delay-2s"></th>
                                            <th>
                                                <select name="" id="" class="form-control" readonly>
                                                    <option value="">TK</option>
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <th>
                                                <input type="text" class="form-control" name="tax" id="tax">
                                            </th>
                                            <th>
                                                <select name="" id="" class="form-control" readonly>
                                                    <option value="">%</option>
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <th>
                                                <input type="text" class="form-control" name="discount" id="discount">
                                            </th>
                                            <th>
                                                <select name="discountmethod" id="discountmethod" class="form-control">
                                                    <option value="1">TK</option>
                                                    <option value="2">%</option>
                                                </select>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <th id="totalprice"></th>
                                            <th>
                                                <select name="" id="" class="form-control" readonly>
                                                    <option value="">TK</option>
                                                </select>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>

                                <!--PAYMENT BUTTON-->
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!--SOME CODE HERE-->
                                    </div>
                                    <div class="col-sm-4">
                                        {{--<button class="btn btn-danger" name="cancel" id="cancel">Cancel</button>&nbsp;--}}
                                        {{--<button class="btn btn-warning" name="hold" id="hold">Hold</button>&nbsp;--}}
                                        <button class="btn btn-info pull-right" name="pay" id="pay">Pay</button>&nbsp;
                                    </div>
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
<script>
/*        function reload(arg){

            if(arg==undefined){
                $(window).on('beforeunload',function(){
                    return ;
                })
            }
            else{
                $(window).on('beforeunload',function(){
                    return arg;
                })
            }

        }

        var arg =false;
        reload(arg);*/


    </script>

    <script type="text/javascript">
        var Total = '';
        var ITEMLIST =[];
        $(document).ready(function() {

        /*
            $(":input").keypress(function(event){
                if (event.which == '10' || event.which == '13') {
                    event.preventDefault();
                }
            });
        */
            var SubTotal = {};



            $("#ItemCodeSubmit").click(function(e) {

                e.preventDefault();

                var ItemCode = $('#itemCode').val();
                //alert(ItemCode);
                var PosSessionCode = $('#pos_session_code').val();

                //$('#itemCode').val('');



                $.ajax({
                    type:'POST',
                    url:'/pos',
                    data:
                        {
                            itemcode : ItemCode,
                            pos_session_code : PosSessionCode,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                    success:function(html){
                        $result = html;

                        if($result == 0){
                            $('#message').html("Item is not in inventory");
                        }

                        else if($result== 1){
                           $.ajax({
                                   type: 'get',
                                   url: '/itemlist',
                                   data:
                                       {
                                           'pos_session_code': PosSessionCode,
                                           _token: $('meta[name="csrf-token"]').attr('content')
                                       },
                                   success: function (data){

                                       

                                       ITEMLIST = data;
                                        $('#message').html(" ");

                                        $('#ItemList').html("");

                                        var totalprice =[];

                                        var divHtml = "";

                                        var j =1;

                                        divHtml += "<table class='table text-center color-table warning-table table-condensed' style='font-size:13px !important;'>";
                                        divHtml += '<thead><tr><th>SL</th><th>Item Code</th><th>Product Group</th><th>Tag Price</th><th>Discount</th><th>Price</th><th>Action</th></tr></thead>';
                                        divHtml += '<tbody>';

                                        for (i = 0; i < data.length; i++) {
                                           
                                           divHtml += "<tr class='animated fadeInUp delay-2s' id='"+data[i].id+"'>";
                                           divHtml += "<td>" + j + "</td>";
                                           divHtml += "<td>" + data[i].itemcode + "</td>";
                                           divHtml += "<td>" + data[i].product_name + "</td>";
                                           divHtml += "<td>" + data[i].tag_price + "</td>";
                                           divHtml += '<td>';
                                           divHtml += '<input type="number" name="individual_discount" value="'+data[i].discount_price+'" id="individual_discount'+data[i].id+'" class="" style="width:80px !important;border-radius:none !important;" onkeyup="discountFunction('+data[i].id+','+data[i].tag_price+')">'; 
                                           divHtml += '<select name="individual_discount_type" id="individual_discount_type'+data[i].id+'"><option value="2">TK</option><option value="1">%</option></select>';
                                           divHtml += '</td>';
                                           divHtml += '<td id="total_price'+ data[i].id+'">'+ data[i].total_price +'</td>';
                                           divHtml += '<td><button class="btn btn-danger btn-xs" onclick="removeItem('+data[i].id+')">X</button></td>';
                                           divHtml += "</tr>";

                                           totalprice.push(data[i].price);
                                           j++;
                                        }
                                        

                                        divHtml += '</tbody>';
                                        divHtml += "</table>";

                                        $('#ItemList').html(divHtml);

                                       var sum = 0;
                                       for (var i = 0; i < totalprice.length; i++) {
                                           sum = sum+ parseFloat(totalprice[i]);
                                       }
                                       SubTotal.sum = sum;

                                       $('#subtotalprice').html(sum);
                                       $('#totalprice').html(sum);

                                       Total = sum;


                                   }
                           });
                        }

                        else{
                            $('#message').html($result);
                        }
                    }
                });



                $('#tax').on('keyup',function(){
                    var subtotal = SubTotal.sum;
                    var discountmethod = $('#discountmethod').val();


                    if(discountmethod==2){
                        var discountamount = $('#discount').val();
                        var discount = (parseFloat(discountamount)*parseFloat(subtotal))/100;
                    }else{
                        var discount = parseFloat($('#discount').val());
                    }

                    var tax = $('#tax').val();
                    var taxAmount = (parseFloat(tax)*parseFloat(subtotal))/100;

                    if (discount>0){
                        var total = parseFloat(subtotal) + parseFloat(taxAmount)- parseFloat(discount);
                    }else{
                        var total = parseFloat(subtotal) + parseFloat(taxAmount);
                    }

                    //$('#totalprice').html(total);

                    if(total){
                        $('#totalprice').html(total);
                        Total = total;
                    }else{
                        $('#totalprice').html(subtotal);
                        Total = subtotal;
                    }

                });



                $('#discount').on('keyup',function(){
                    var subtotal = SubTotal.sum;

                    var discountmethod = $('#discountmethod').val();

                    if(discountmethod==2){
                        var discountamount = $('#discount').val();
                        var discount = (parseFloat(discountamount)*parseFloat(subtotal))/100;
                    }else{
                        var discount = $('#discount').val();
                    }


                    var tax = $('#tax').val();
                    var taxAmount = (parseFloat(tax)*parseFloat(subtotal))/100;

                    if (tax){
                        var total = parseFloat(subtotal) + parseFloat(taxAmount)- parseFloat(discount);
                    }else{
                        var total = parseFloat(subtotal) - parseFloat(discount);
                    }



                    if(total){
                        $('#totalprice').html(total);
                        Total = total;
                    }else{
                        $('#totalprice').html(subtotal);
                        Total = subtotal
                    }


                });

            });
        });
    </script>

    <script>
        // GETTING CUSTOMER INFO USING AJAX METHOD
        $('#customernumber').on('keyup',function(){
            var customerNumber = $('#customernumber').val();

            $.ajax({
                type:'POST',
                url:'/customerlist',
                data:
                    {
                        customernumber : customerNumber,

                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){
                    if(data){
                        $('#customerinfo').html("Name: "+ data.customer_name+" Email: "+data.customer_email);
                    }else{
                        $('#customerinfo').html("Not Available");
                    }


                }
            });

        });
        // GETTING Employee INFO USING AJAX METHOD
        $('#employee_id').on('keyup',function(){
            var employee_id = $('#employee_id').val();

            $.ajax({
                type:'POST',
                url:'/employeelist',
                data:
                    {
                        employee_id : employee_id,

                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){
                    if(data){
                        $('#employeeinfo').html("Name: "+ data.employee_name);
                    }else{
                        $('#employeeinfo').html("Not Available");
                    }


                }
            });

        });
    </script>

    <script>

        function removeItem(id){
            var id = id;
            var PosSessionCode = $('#pos_session_code').val();
            var SubTotal = {};

            $.ajax({
                type:'GET',
                url:'/posdelete/'+id,
                data:
                    {
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){
                    if(data == "success"){

                        $('#'+id).remove();

                        $.ajax({
                            type: 'get',
                            url: '/itemlist',
                            data:
                                {
                                    'pos_session_code': PosSessionCode,
                                    _token: $('meta[name="csrf-token"]').attr('content')
                                },
                            success: function (data){
                                ITEMLIST = data;
                                $('#message').html(" ");

                                $('#ItemList').html("");

                                var totalprice =[];

                                var divHtml = "";
                                var j =1;

                                divHtml += "<table class='table text-center color-table warning-table table-condensed' style='font-size:13px !important;'>";
                                divHtml += '<thead><tr><th>SL</th><th>Item Code</th><th>Product Group</th><th>Tag Price</th><th>Discount</th><th>Price</th><th>Action</th></tr></thead>';
                                divHtml += '<tbody>';

                                for (i = 0; i < data.length; i++) {
                                    divHtml += "<tr class='animated fadeInUp delay-2s' id='"+data[i].id+"'>";
                                    divHtml += "<td>" + j + "</td>";
                                    divHtml += "<td>" + data[i].itemcode + "</td>";
                                    divHtml += "<td>" + data[i].product_name + "</td>";
                                    divHtml += "<td>" + data[i].tag_price + "</td>";
                                    divHtml += '<td>';
                                    divHtml += '<input type="number" name="individual_discount" value="'+data[i].discount_price+'" id="individual_discount'+data[i].id+'" class="" style="width:80px !important;border-radius:none !important;" onkeyup="testFunction('+data[i].id+','+data[i].tag_price+')">'; 
                                    divHtml += '<select name="individual_discount_type" id="individual_discount_type'+data[i].id+'"><option value="2">TK</option><option value="1">%</option></select>';
                                    divHtml += '</td>';
                                    divHtml += '<td id="total_price'+ data[i].id+'">'+ data[i].total_price +'</td>';
                                    divHtml += '<td><button class="btn btn-danger btn-xs" onclick="removeItem('+data[i].id+')">X</button></td>';
                                    divHtml += "</tr>";

                                    totalprice.push(data[i].price);
                                    j++;
                                }

                                divHtml += '</tbody>';
                                divHtml += "</table>";

                                $('#ItemList').html(divHtml);

                                var sum = 0;
                                for (var i = 0; i < totalprice.length; i++) {
                                    sum = sum+ parseFloat(totalprice[i]);
                                }
                                SubTotal.sum = sum;

                                $('#subtotalprice').html(sum);
                                $('#totalprice').html(sum);

                                Total = sum;


                            }
                        });
                    }
                }
            });
        }
    </script>




    <script>
        $('#pay').on('click',function(){
            var pos_session_code = $('#pos_session_code').val();
            var customer_type = $('#customer_type').val();
            var payment_method = $('#payment_method').val();
            var employee_id = $('#employee_id').val();
            var weekday = $('#weekday').val();

            var discountmethod = $('#discountmethod').val();

            var totalprice = Total;

            var tax = $('#tax').val();




            if(discountmethod==2){
                var discountamount = $('#discount').val();
                var discount = (parseFloat(discountamount)*parseFloat(subtotal))/100;
            }else{
                var discount = $('#discount').val();
            }


            $.ajax({
                type:'PUT',
                url:'/pos/'+pos_session_code,
                data:
                    {
                        pay : 1,
                        customer_type:customer_type,
                        payment_method:payment_method,
                        employee_id:employee_id,
                        weekday:weekday,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){
                    swal("Good job!","Order placed","success")
                    .then((value) => {

/*                        var prtContent = document.getElementById("print");
                        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                        WinPrint.document.write(prtContent.innerHTML);
                        WinPrint.document.close();
                        WinPrint.focus();

                        setTimeout(function() {
                            WinPrint.print();
                            WinPrint.close();
                            window.location = "/new-entry";
                        }, 350);*/








                            var newWindow = window.open('', '', 'width=100, height=100');
                            var   document = newWindow.document.open();
                            var pageContent ="";

/*                            pageContent +='<!DOCTYPE html>';
                            pageContent +='<html>';
                            pageContent +=   '<head>';
                            pageContent +=   '<meta charset="utf-8" />';
                            pageContent +=   '<title>Inventory</title>';
                            pageContent +=   '<style type="text/css">body {-webkit-print-color-adjust: exact; font-family: Arial;}</style>';
                            pageContent +=   '</head>';
                            pageContent +=   '<body>';
                            pageContent +=      '<table>';
                            pageContent +=           '<tr>';
                            pageContent +=              '<th>Item Code</th>';
                            pageContent +=              '<th>Product Group</th>';
                            pageContent +=              '<th>Price</th>';
                            pageContent +=           '</tr>';
                            for (i = 0; i < ITEMLIST.length; i++) {

                            pageContent +=         '<tr>';
                            pageContent +=              '<td>'+ ITEMLIST[i].itemcode + '</td>';
                            pageContent +=              '<td>' + ITEMLIST[i].product_group + '</td>';
                            pageContent +=              '<td>' + ITEMLIST[i].price + '</td>';
                            pageContent +=         '</tr>';

                            }

                            pageContent +=         '<tr>';
                            pageContent +=              '<td>Tax</td>';
                            pageContent +=              '<td></td>';
                            pageContent +=              '<td>'+tax+'%</td>';
                            pageContent +=         '</tr>';
                            pageContent +=         '<tr>';
                            pageContent +=              '<td>Discount</td>';
                            pageContent +=              '<td></td>';
                            pageContent +=              '<td>'+discount+'TK</td>';
                            pageContent +=         '</tr>';


                            pageContent +=          '<tr>';
                            pageContent +=              '<td>Total</td>';
                            pageContent +=              '<td></td>';
                            pageContent +=              '<td>'+Total+' TK</td>';
                            pageContent +=          '</tr>';
                            pageContent +=        '</table>';
                            pageContent +=       '-----------------------------------------------------------------------------------------------------';
                            pageContent +=    '</body>';
                            pageContent +=    '</html>';*/




                        pageContent +='   <div id="">';
                        pageContent +='    <center id="top">';
                        pageContent +='   <div class="logo"></div>';
                        pageContent +='    <div class="info">';
                        pageContent +='    <h2 style="font-size:5px;">SparkX Fashion Wear</h2>';
                        pageContent +='    </div>';
                        pageContent +='    </center>';
                        pageContent +='   <div id="mid">';
                        pageContent +='    <div class="info">';
                        pageContent +='    <h2>Contact Info</h2>';
                        pageContent +='   <p>';
                        pageContent +='    Address : street city, state 0000</br>';
                        pageContent +='    Email   : JohnDoe@gmail.com</br>';
                        pageContent +='    Phone   : 555-555-5555</br>';
                        pageContent +='    </p>';
                        pageContent +='   </div>';
                        pageContent +='     </div>';
                        pageContent +='   <div id="bot">';
                        pageContent +='    <div id="table">';
                        pageContent +='    <table>';
                        pageContent +='    <tr class="tabletitle">';
                        pageContent +='   <td class="item"><h2>Item</h2></td>';
                        pageContent +='    <td class="Hours"><h2>Qty</h2></td>';
                        pageContent +='   <td class="Rate"><h2>Sub Total</h2></td>';
                        pageContent +='    </tr>';
                        pageContent +='   <tr class="service">';
                        pageContent +='   <td class="tableitem"><p class="itemtext" style="font-size:10px;font-family:courier">Communication</p></td>';
                        pageContent +='   <td class="tableitem"><p class="itemtext">5</p></td>';
                        pageContent +='   <td class="tableitem"><p class="itemtext">$375.00</p></td>';
                        pageContent +='   </tr>';

                        pageContent +='   <tr class="service">';
                        pageContent +='    <td class="tableitem"><p class="itemtext">Asset Gathering</p></td>';
                        pageContent +='   <td class="tableitem"><p class="itemtext">3</p></td>';
                        pageContent +='    <td class="tableitem"><p class="itemtext">$225.00</p></td>';
                        pageContent +='    </tr>';

                        pageContent +='   <tr class="service">';
                        pageContent +='   <td class="tableitem"><p class="itemtext">Design Development</p></td>';
                        pageContent +='  <td class="tableitem"><p class="itemtext">5</p></td>';
                        pageContent +='   <td class="tableitem"><p class="itemtext">$375.00</p></td>';
                        pageContent +='   </tr>';

                        pageContent +='   <tr class="service">';
                        pageContent +='   <td class="tableitem"><p class="itemtext">Animation</p></td>';
                        pageContent +='  <td class="tableitem"><p class="itemtext">20</p></td>';
                        pageContent +='   <td class="tableitem"><p class="itemtext">$1500.00</p></td>';
                        pageContent +='  </tr>';

                        pageContent +='   <tr class="service">';
                        pageContent +='   <td class="tableitem"><p class="itemtext">Animation Revisions</p></td>';
                        pageContent +='    <td class="tableitem"><p class="itemtext">10</p></td>';
                        pageContent +='   <td class="tableitem"><p class="itemtext">$750.00</p></td>';
                        pageContent +='   </tr>';


                        pageContent +='   <tr class="tabletitle">';
                        pageContent +='   <td></td>';
                        pageContent +='   <td class="Rate"><h2>tax</h2></td>';
                        pageContent +='   <td class="payment"><h2>$419.25</h2></td>';
                        pageContent +='   </tr>';

                        pageContent +='   <tr class="tabletitle">';
                        pageContent +='   <td></td>';
                        pageContent +='    <td class="Rate"><h2>Total</h2></td>';
                        pageContent +='    <td class="payment"><h2>$3,644.25</h2></td>';
                        pageContent +='   </tr>';

                        pageContent +='   </table>';
                        pageContent +='    </div>';

                        pageContent +='   <div id="legalcopy">';
                        pageContent +='   <p class="legal"><strong>Thank you for your business!</strong>  ';
                        pageContent +=   'Payment is expected within 31 days; please process this invoice within that time. ';
                        pageContent +=   'There will be a 5% interest charge per month on late invoices.';
                        pageContent +='    </p>';
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
                            window.location = "/new-entry";
                        }, 250);

                    });
                }
            });
        });
    </script>
    <script>
        $('#hold').on('click',function(){
            var pos_session_code = $('#pos_session_code').val();
            var customer_type = $('#customer_type').val();
            var payment_method = $('#payment_method').val();
            var employee_id = $('#employee_id').val();
            $.ajax({
                type:'PUT',
                url:'/pos/'+pos_session_code,
                data:
                    {
                        hold : 2,
                        customer_type:customer_type,
                        payment_method:payment_method,
                        employee_id:employee_id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){
                    swal("Good job!","Order held","info")
                    .then((value) => {

                        reload();

                        window.location = "/pos";
                    });
                }
            });
        });
    </script>
    <script>
        $('#cancel').on('click',function(){
            var pos_session_code = $('#pos_session_code').val();
            var customer_type = $('#customer_type').val();
            var payment_method = $('#payment_method').val();
            var employee_id = $('#employee_id').val();
            $.ajax({
                type:'PUT',
                url:'/pos/'+pos_session_code,
                data:
                    {
                        cancel : 3,
                        customer_type:customer_type,
                        payment_method:payment_method,
                        employee_id:employee_id,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){

                }
            });
        });
    </script>

    <script>
        function discountFunction(id,tag_price){
            var id = id;
            var tag_price = tag_price;
            var individual_discount = $('#individual_discount'+id).val();
            var individual_discount_type = $('#individual_discount_type'+id).val();
            
            $.ajax({
                type: 'POST',
                url : '/individual_discount',
                data:{
                    'id': id,
                    'tag_price':tag_price,
                    'individual_discount': individual_discount,
                    'individual_discount_type': individual_discount_type,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success:function(data){
                    
                    console.log(data);

                        $('#total_price'+id).html(data);
                
                }
            });

        }
    </script>

@endsection

