<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body>
    @extends('layouts.app')
    <div class="wrapper">
        @include('layouts.sidebar')
        <div id="body" class="active">
            <!-- navbar navigation component -->
            @include('layouts.navbar')
            <!-- end of navbar navigation -->           
            <div class="content">
               <div class="container">
                 <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-2 m-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="">
                                        <div class="icon-big text-center">
                                            <i class="teal fas fa-car"></i>
                                        </div>
                                    </div>                             
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fas fa-calendar"></i> For this Week
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2 m-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="">
                                        <div class="icon-big text-center">
                                            <i class="teal fas fa-truck"></i>
                                        </div>
                                    </div>                             
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fas fa-calendar"></i> For this Week
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2 m-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="">
                                        <div class="icon-big text-center">
                                            <i class="teal fas fa-user-tie"></i>
                                        </div>
                                    </div>                             
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fas fa-calendar"></i> For this Week
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2 m-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="">
                                        <div class="icon-big text-center">
                                            <i class="teal fas fa-users"></i>
                                        </div>
                                    </div>                             
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fas fa-calendar"></i> For this Week
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-2 m-3">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="">
                                        <div class="icon-big text-center">
                                            <i class="teal fas fa-money-bill-alt"></i>
                                        </div>
                                    </div>                             
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="fas fa-calendar"></i> For this Week
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                   
                 </div>
                   <hr>
                <div align="center">
                    <i class="fas fa-calendar-alt"></i> Pour cette Semaine
                </div>
                <hr>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="head">
                                            <h5 class="mb-0">Traffic Overview</h5>
                                            <p class="text-muted">Current year website visitor data</p>
                                        </div>
                                        <div class="canvas-wrapper">
                                            <canvas class="chart" id="trafficflow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="head">
                                            <h5 class="mb-0">Sales Overview</h5>
                                            <p class="text-muted">Current year sales data</p>
                                        </div>
                                        <div class="canvas-wrapper">
                                            <canvas class="chart" id="sales"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                </div>
            </div>            
        </div>
        
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>