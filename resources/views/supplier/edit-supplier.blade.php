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
                        <h3 class="text-themecolor">New Supplier</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">New Supplier</li>
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
                                <h4 class="card-title">Add new Supplier Information</h4>
                                <hr>
                                <h6 class="card-subtitle"><code></code></h6>
                                <form class="form-material m-t-40" id="add-supplier-form" method="" action="">

                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id" value="{{$supplier->id}}">
                                    {{--supplier name--}}
                                    <div class="form-group">
                                        <label for="name"><span class="help"><strong>Supplier Name</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" id="name" name="name"  value="{{$supplier->name}}">
                                    </div>
                                    {{--end of supplier name--}}

                                    {{--contact person--}}
                                    <div class="form-group">
                                        <label for="contact_person"><span class="help"><strong>Contact Person Name</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" id="contact_person" name="contact_person" value="{{$supplier->contact_person}}">
                                    </div>
                                    {{--end of contact person--}}

                                    {{--contact number--}}
                                    <div class="form-group">
                                        <label for="contact_number"><span class="help"><strong>Contact Number</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" id="contact_number" name="contact_number" value="{{$supplier->contact_number}}">
                                    </div>
                                    {{--end of contact number--}}

                                    {{--alt contact number--}}
                                    <div class="form-group">
                                        <label for="alt_contact_number"><span class="help"><strong>Alt Contact Number</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" id="alt_contact_number" name="alt_contact_number" value="{{$supplier->alt_contact_number}}">
                                    </div>
                                    {{--end of contact number--}}


                                    {{--suppliers email address--}}
                                    <div class="form-group">
                                        <label for="supplier_email"><span class="help"><strong>Supplier Email</strong></span></label>
                                        <input type="email" class="form-control form-control-line" placeholder="" id="supplier_email" name="supplier_email" value="{{$supplier->supplier_email}}">
                                    </div>
                                    {{--end of suppliers email address--}}


                                    {{--supplier address--}}
                                    <div class="form-group">
                                        <label><span class="help"><strong>Supplier Address</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" id="supplier_address" name="supplier_address" value="{{$supplier->supplier_address}}">
                                    </div>
                                    {{--supplier address--}}

                                    {{--extra information--}}
                                    <div class="form-group">
                                        <label><span class="help"><strong>Extra Info</strong></span></label>
                                        <input type="text" class="form-control form-control-line" placeholder="" id="extra_info" name="extra_info" value="{{$supplier->extra_info}}">
                                    </div>
                                    {{--extra information--}}
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
            var name = $('#name').val();
            var contact_person = $('#contact_person').val();
            var contact_number = $('#contact_number').val();
            var alt_contact_number= $('#alt_contact_number').val();
            var supplier_email= $('#supplier_email').val();
            var supplier_address= $('#supplier_address').val();
            var extra_info= $('#extra_info').val();





            $.ajax({
                type:'PUT',
                url:'/supplier/'+id,
                data:
                    {
                        id : id,
                        name: name,
                        contact_person:contact_person,
                        contact_number:contact_number,
                        alt_contact_number:alt_contact_number,
                        supplier_email:supplier_email,
                        supplier_address:supplier_address,
                        extra_info:extra_info,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data){
                    if(data=="success"){
                        swal("Good job!","Supplier Information Updated","success")
                            .then((value) => {
                                //reload();
                                window.location = "/supplier";
                        });
                    }
                }
            });
        });
    </script>
@endsection

