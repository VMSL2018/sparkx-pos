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
                        <h3 class="text-themecolor">Add New User</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Add New User</li>
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

                                <h6 class="card-subtitle">
                                    
                                    {{--
                                        @if(count($errors))
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                
                                    --}}

                                </h6>
                                <form class="form-material m-t-40" id="add-supplier-form" method="post" action="/user" {{ $errors->has('name','email') ? 'has-error' : ''}}>
                                    {{csrf_field()}}
                                    

                                    <div class="form-group">
                                        <label for="name"><span class="help"><strong>Name</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="name" >
                                        {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>


                                    <div class="form-group">
                                        <label for="email"><span class="help"><strong>Email</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="email" required>
                                        {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>



                                    <div class="form-group">
                                        <label for="Type"><span class="help"><strong>User Type</strong></span></label>
                                        <select name="type" id="" class="form-control" required>
                                            <option value="">Choose Your Option</option>
                                            <option value="2">Admin</option>
                                            <option value="3">Store Manager</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="showroom"><span class="help"><strong>Showroom</strong></span></label>
                                        <select name="showroom" id="" class="form-control" required>
                                            <option value="">Choose Your Option</option>
                                            @foreach($showrooms as $row)
                                                <option value="{{$row['showroom_name']}}">{{$row['showroom_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <label for="password"><span class="help"><strong>Password</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" name="password">
                                    </div>



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
<!--Custom JavaScript -->
<script src="/js/custom.min.large-sidebar.js"></script>
    <script>
        // $("#add-supplier-form").submit(function(e){
        //     return false;
        // });
    </script>
@endsection

