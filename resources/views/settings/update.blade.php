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
                        <h3 class="text-themecolor">Basic Settings</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Basic Settings</li>
                        </ol>
                    </div>
                </div>

                <!--Settings Data-->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $data->id }}" name="id" id="id">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-2">Title</label>
                                            <input type="text" class="form-control col-md-8" name="title" id="title" value="{{ $data->title }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="" class="col-md-2">Value</label>
                                            <input type="text" class="form-control col-md-8" name="value" id="value" value="{{ $data->value }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <button class="btn btn-sm btn-info " onclick="update()">UPDATE</button>
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

<script>
    function update(){
        var id = $('#id').val();
        var title = $('#title').val();
        var value = $('#value').val();

        if(id && title && value){
            $.ajax({
                type:'PUT',
                url:'/settings/'+id,
                data: {
                    id: id,
                    title: title,
                    value:value,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if(data=="success"){
                        swal("Good job!","Setting Information Updated","success")
                            .then((value) => {
                                //reload();
                                window.location = "/settings";
                        });
                    }
                    if(data=="failed"){
                        swal("Oopss!","Something Went Wrong!!","failed")
                            .then((value) => {
                                window.location = "/settings";
                        });
                    }
                }
            });
        }
    }
</script>
@endsection