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
                    <div class="col-md-6">
                        <!--INPUT ITEM BARCODE-->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add New Item</h4>
                                <h6 class="card-subtitle"><code><span class="help-block text-danger" id="message">  </code></h6>

                                <form  id="itemForm">
                                    {{ csrf_field() }}
                                    <div class="row">
                                    @php
                                     function itemcodes($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
                                        {
                                            $pieces = [];
                                            $max = mb_strlen($keyspace, '8bit') - 1;
                                            for ($i = 0; $i < $length; ++$i) {
                                                $pieces [] = $keyspace[random_int(0, $max)];
                                            }
                                            return implode('', $pieces);
                                        }
                                    @endphp
                                        <input type="hidden" name="pos_session_code" id="pos_session_code" value="@php echo itemcodes(9,'123456789'); @endphp">
                                        @php
                                            $datetime = DateTime::createFromFormat('YmdHis', date("YmdHis"));
                                        @endphp
                                        <input type="hidden" id="weekday" value="{!! $datetime->format('l') !!}">
                                        <input type="hidden" id="showroom" value="{{ Auth::user()->showroom }}">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="itemCode" name="itemCode" autofocus required>
                                        </div>


                                        <div class="col-sm-2">
                                            <button class="btn btn-primary" id="ItemCodeSubmit" type="submit">Add</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <!--iTEM LIST INSERTED IN POS-->
                                <div id ="ItemList" style=" height:200px; overflow: auto;"></div>
                                <hr>
                                <!--CALCULATIONS---->

                                    <table class="table table-sm table-striped text-center" style="font-size:18px;font-weight:400">
                                        <tbody>
                                            <tr style="background-color:orange;color:white;">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td> Total </td>
                                                <td id="totalprice">0</td>
                                                <td>TK</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>

                        <div class="col-md-6">
                        <div class="card" style="height:429px !important;">
                            <div class="card-body">
                            <!--BASIC INFORMATION COLLECTING FORM-->
								<form action="">
                                    <!--Showroom-->
                                        <input type="hidden" name="showroom" id="showroom" value="{{ Auth::user()->showroom }}">
                                    <!--Showroom-->
                                    <div class="row form-group">
                                        <div class="col-sm-4">
                                            <label for="">Customer Type</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select name="customer_type" id="customer_type" class="form-control" required>
                                                <option value="NEW">NEW</option>
                                                <option value="OLD">OLD</option>
                                            </select>
                                            <p class="text-warning" id="customer_type_warning"></p>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="">Customer No</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="customernumber" id="customernumber">
                                            <p class="text-warning" id="customerinfo"></p>
                                            <p class="text-warning" id="customer_number_warning"></p>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="">Employee ID</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="employee_id" id="employee_id" required>
                                            <p class="text-warning" id="employeeinfo"></p>
                                            <p class="text-warning" id="employee_id_warning"></p>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="">Payment Method</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input list="payment_method_list" name="payment_method" id="payment_method" class="form-control" required>
                                            <datalist id="payment_method_list">
                                                <option value="Cash">
                                                <option value="Card">
                                                <option value="Mobile Payment">
                                            </datalist>
                                            <p class="text-warning" id="payment_method_warning"></p>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="">Transaction ID</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="transaction_id" id="transaction_id" required>
                                            <p class="text-warning" id="transaction_id_warning"></p>
                                        </div>
                                    </div>
                                </form>
                                
                                <!--PAYMENT BUTTON-->
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!--SOME CODE HERE-->
                                    </div>
                                    <div class="col-sm-4">
                                        {{--<button class="btn btn-danger" name="cancel" id="cancel">Cancel</button>&nbsp;--}}
                                        {{--<button class="btn btn-warning" name="hold" id="hold">Hold</button>&nbsp;--}}
                                        <button class="btn btn-primary pull-right" name="pay" id="pay">Pay</button>&nbsp;
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
<!--Custom JavaScript  fro mini sidebar-->
<script src="/js/custom.min.small-sidebar.js"></script>
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
            var SubTotal = '';



            $("#ItemCodeSubmit").click(function(e) {

                e.preventDefault();

                var ItemCode = $('#itemCode').val();
                
                var PosSessionCode = $('#pos_session_code').val();
                
                $('#itemCode').val(''); // Clear Item Field



                $.ajax({
                    type:'POST',
                    url:'/pos-entry',
                    data:
                        {
                            itemcode : ItemCode,
                            pos_session_code : PosSessionCode,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                    success:function(data){
                        $result = data['message'];

                        $('#subtotalprice').html(data['sub_total_price']);
                        $('#totalprice').html(data['sub_total_price']);
                        SubTotal = data['sub_total_price'];

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

                                        divHtml += "<table class='table text-center color-table warning-table table-condensed table-sm' style='font-size:12px !important;'>";
                                        divHtml += '<thead><tr><th>SL</th><th>Item Code</th><th>Product Group</th><th>Tag</th><th>Discount</th><th>Net</th><th>Action</th></tr></thead>';
                                        divHtml += '<tbody>';

                                        for (i = 0; i < data.length; i++) {
                                           
                                           divHtml += "<tr class='animated fadeInUp delay-2s' id='"+data[i].id+"'>";
                                           divHtml += "<td>" + j + "</td>";
                                           divHtml += "<td>" + data[i].itemcode + "</td>";
                                           divHtml += "<td>" + data[i].product_name + "</td>";
                                           divHtml += "<td>" + data[i].tag_price + "</td>";
                                           divHtml += '<td>';
                                           divHtml += '<select class="" name="individual_discount_type" id="individual_discount_type'+data[i].id+'"><option value="2">TK</option><option value="1">%</option></select>';
                                           divHtml += '<input style="width:50px !important" class="" type="number" name="individual_discount" value="'+data[i].discount_price+'" id="individual_discount'+data[i].id+'" class="" style="width:80px !important;border-radius:none !important;" onkeyup="discountFunction('+data[i].id+','+data[i].tag_price+')">'; 
                                           
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

                                       

                                       


                                   }
                           });
                        }

                        else{
                            $('#message').html($result);
                        }
                    }
                });



                $('#tax').on('keyup',function(){

                    var subtotal = SubTotal;

                    var tax = $('#tax').val();

                    var taxAmount = (parseFloat(tax)*parseFloat(subtotal))/100;

                    var total = round(parseFloat(subtotal) + parseFloat(taxAmount)) ;
                    

                    if(total){
                        $('#totalprice').html(total);
                    }else{
                        $('#totalprice').html(subtotal);
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
                        $('#customerinfo').html("Name: "+ data.customer_name);
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
                        $('#employeeinfo').html(data.employee_name);
                    }else{
                        $('#employeeinfo').html("Not Available");
                    }


                }
            });

        });
    </script>






    <script>

        $('#pay').on('click',function(){

            
            var pos_session_code = $('#pos_session_code').val();
            var customer_type = $('#customer_type').val();
            var customernumber = $('#customernumber').val();
            var payment_method = $('#payment_method').val();
            var transaction_id = $('#transaction_id').val();
            var employee_id = $('#employee_id').val();
            var showroom = $('#showroom').val();
            var weekday = $('#weekday').val();

            var tax = $('#tax').val();

            if(!tax){
                $('#tax_warning').html("Please insert tax");
            }

            if(!employee_id){
                $('#employeeinfo').html("Insert employee id");
            }

            if(!payment_method){
                $('#payment_method_warning').html("Select payment method");
            }
            
            


           if(pos_session_code && customer_type && payment_method && employee_id ){

            $.ajax({
                type:'POST',
                url:'/posprimary',
                data:
                    {
                        'pos_session_code':pos_session_code,
                        'customer_type':customer_type,
                        'customer_number': customernumber,
                        'payment_method' : payment_method,
                        'transaction_id' : transaction_id,
                        'employee_id' : employee_id,
                        'showroom' : showroom,
                        'weekday' : weekday,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){
                

                    var j=1;

                    swal("Good job!","Order placed","success")
                    .then((value) => {
                        window.location = "/print/"+data;  
                    });
                      
                    /*
                    .then((value) => {
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
                        pageContent +=' 	<th>Rate</th>';
                        pageContent +=' 	<th>Sub Total</th>';
                        pageContent +=' 	</tr>';

                        pageContent +='   <tr>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   <td><hr></td>';
                        pageContent +='   </tr>';

                        for(i = 0; i < data['from_pos'].length; i++){

                        
                            pageContent +='   <tr>';
                            pageContent +='   <td style="text-align:left">'+j+'</td>';
                            pageContent +='   <td style="text-align:left">'+data['from_pos'][i].itemcode+'</td>';
                            pageContent +='   <td style="text-align:left">'+data['from_pos'][i].product_name+'</td>';
                            pageContent +='   <td style="text-align:left">'+data['from_pos'][i].tag_price+'TK</td>';
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
                        pageContent +='   </tr>';

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

                        pageContent +='   <tr>';
                        pageContent +='   <td></td>';
                        pageContent +='   <td></td>';
                        pageContent +='    <td style="text-align:left">Total</td>';
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
                            window.location = "/new-entry";
                        }, 250);

                    });
                    */
                    
                }
            });

           }
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
<!--REMOVE ITEM FUNCTION-->
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

                $('#subtotalprice').html(data['sub_total_price']);

                $('#totalprice').html(data['sub_total_price']);

                SubTotal = data['sub_total_price'];
                if(data['message'] == "success"){

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

                            divHtml += "<table class='table text-center color-table warning-table table-condensed table-sm' style='font-size:13px !important;'>";
                            divHtml += '<thead><tr><th>SL</th><th>Item Code</th><th>Product Group</th><th>Tag Price</th><th>Discount</th><th>Price</th><th>Action</th></tr></thead>';
                            divHtml += '<tbody>';

                            for (i = 0; i < data.length; i++) {
                                divHtml += "<tr class='animated fadeInUp delay-2s' id='"+data[i].id+"'>";
                                divHtml += "<td>" + j + "</td>";
                                divHtml += "<td>" + data[i].itemcode + "</td>";
                                divHtml += "<td>" + data[i].product_name + "</td>";
                                divHtml += "<td>" + data[i].tag_price + "</td>";
                                divHtml += '<td>';
                                divHtml += '<select name="individual_discount_type" id="individual_discount_type'+data[i].id+'"><option value="2">TK</option><option value="1">%</option></select>';
                                divHtml += '<input type="number" name="individual_discount" value="'+data[i].discount_price+'" id="individual_discount'+data[i].id+'" class="" style="width:80px !important;border-radius:none !important;" onkeyup="discountFunction('+data[i].id+','+data[i].tag_price+')">'; 
                      
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

                            

                        }
                    });
                }
            }
        });
    }
</script>

<!--ADD DISCOUNT FUNCTION-->
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
                    
                    

                        $('#total_price'+id).html(data['total_price']);
                        $('#subtotalprice').html(data['sub_total_price']);
                        $('#totalprice').html(data['sub_total_price']);
                
                }
            });

        }
    </script>

@endsection

