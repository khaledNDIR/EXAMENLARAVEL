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
                  <h1>CLIENT</h1>
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