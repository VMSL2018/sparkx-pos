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
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-subtitle"><code></code></h6>
                                <form class="form-material m-t-40" id="add-supplier-form" method="post" action="/employee">
                                    {{csrf_field()}}
                                    {{--supplier name--}}
                                    <div class="form-group">
                                        <label for="employee_id"><span class="help"><strong>Employee ID</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="employee_id">
                                    </div>
                                    {{--end of supplier name--}}

                                    {{--contact person--}}
                                    <div class="form-group">
                                        <label for="employee_name"><span class="help"><strong>Employee Name</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="employee_name">
                                    </div>
                                    {{--end of contact person--}}

                                    {{--contact person--}}
                                    <div class="form-group">
                                        <label for="showroom"><span class="help"><strong>Showroom</strong></span></label>
                                        <select name="showroom" id="" class="form-control">
                                            <option value="">Choose Your Option</option>
                                            @foreach($showrooms as $row)
                                                <option value="{{$row['showroom_name']}}">{{$row['showroom_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--end of contact person--}}

                                    {{--contact person--}}
                                    <div class="form-group">
                                        <label for="salary"><span class="help"><strong>Salary</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="salary">
                                    </div>
                                    {{--end of contact person--}}


                                    <div class="form-group text-center">
                                        <button class="btn btn-info ">Save</button>
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
<!--Custom JavaScript  for large sidebar-->
<script src="/js/custom.min.large-sidebar.js"></script>
    <script>
        // $("#add-supplier-form").submit(function(e){
        //     return false;
        // });
    </script>
@endsection

