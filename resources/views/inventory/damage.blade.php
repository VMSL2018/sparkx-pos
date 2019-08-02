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
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
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
                            <h3 class="text-themecolor">Product Return</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Product Return</li>
                            </ol>
                        </div>
                        
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
                        <div class="row">
                            <!--POS form-->
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Damaged Item</h4>
                                        <h6 class="card-subtitle"><code><span class="help-block text-danger" id="message">  </span> </code></h6>

                                        
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="item_code" name="item_code" placeholder="Item Code" autofocus >
                                                    <p class="text-danger" id="item_code_warning"></p>
                                                </div>
                                            </div>
                                            <br>
                                            <!--
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="return_reason" name="return_reason" placeholder="Damage " >
                                                    <p class="text-danger" id="return_reason_warning"></p>
                                                </div>
                                            </div>
                                            -->
                                            <br>
                                            <div class="row">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-info" id="" type="submit" onclick="returnitem()">Save</button>
                                                </div>
                                            </div>
                                        
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

            if(!item_code){ $('#item_code').html("Insert Item Code") }
            //if(!return_reason){ $('#return_reason').html("Insert Return Reason") }

            if(item_code){
                $.ajax({
                    method:'POST',
                    url:'/damage',
                    data:{
                        item_code : item_code,
                        //return_reason : return_reason,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(data){
                        if(data == "success"){
                            swal("Good job!","Damaged Product Updated successfully","success")
                                .then((value) => {
                                    window.location = "/damage";
                                });
                        }else{
                            swal("Oops!","Something Wen Wrong","danger")
                                .then((value) => {
                                    window.location = "/damage";
                                });
                        }
                    }
                });
            }


        }
    </script>


@endsection

