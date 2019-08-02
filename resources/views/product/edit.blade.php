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
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">New Product Group</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">New Product Group</li>
                        </ol>
                    </div>
                    {{--

                                        <div class="col-md-7 align-self-center text-right d-none d-md-block">
                                            <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</button>
                                        </div>
                    --}}

                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-subtitle"><code></code></h6>
                                <form class="form-material m-t-40" id="add-supplier-form" method="" action="">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="id" value="{{ $products->id }}">
                                    {{--supplier name--}}
                                    <div class="form-group">
                                        <label for="product_code"><span class="help"><strong>Product Code</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="product_code" value="{{ $products->product_code }}" readonly>
                                    </div>
                                    {{--end of supplier name--}}

                                    {{--contact person--}}
                                    <div class="form-group">
                                        <label for="product_name"><span class="help"><strong>Product Name</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="product_name" value="{{ $products->product_name }}" readonly>
                                    </div>
                                    {{--end of contact person--}}

                                    {{--contact person--}}
                                    <div class="form-group">
                                        <label for="category"><span class="help"><strong>Category</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="product_name" value="{{ $products->category }}" readonly>
                                    </div>
                                    {{--end of contact person--}}

                                    {{--Reorder Level--}}
                                    <div class="form-group">
                                        <label for="reorder_level"><span class="help"><strong>Reorder Level</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="reorder_level"  id="reorder_level" value="{{ $products->reorder_level }}">
                                    </div>
                                    {{--Reorder Level--}}

                                    {{--Required Quantity--}}
                                    <div class="form-group">
                                        <label for="required_quantity"><span class="help"><strong>Required Quantity</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="required_quantity" id="required_quantity" value="{{ $products->required_quantity }}">
                                    </div>
                                    {{--Required Quantity--}}

                                    <div class="form-group text-center">
                                        <button class="btn btn-info" id="update">Save</button>
                                    </div>


                                </form>
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
        $('#update').on('click',function(e){
            e.preventDefault();

            var id = $('#id').val();


            var required_quantity = $('#required_quantity').val();
            var reorder_level = $('#reorder_level').val();

            $.ajax({
                type:'PUT',
                url:'/product/'+id,
                data:
                    {
                        id : id,
                        required_quantity: required_quantity,
                        reorder_level:reorder_level,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){
                    if(data=="success"){
                        swal("Good job!","Product Information Updated","success")
                            .then((value) => {
                                //reload();
                                window.location = "/product";
                        });
                    }
                }
            });
        });
    </script>
@endsection

