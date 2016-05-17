<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta chasrset="UTF-8">
        <title >@yield('title','Default')</title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">


    </head>
   <!-- <style type="text/css">
   
    </style>-->
    <body style="background-image:url('http://wallpoper.com/images/00/31/33/51/black-background_00313351.jpg');">
  <!--<body background="/home/php-84/Imágenes/back1.jpeg">   -->
    	@include('admin.template.nav')
    	<section class="section-admin">
              
                <div class="panel panel-heading" style="background-color: #E6E6E6">
                    <h1 class="panel panel-title">@yield('title') </h1>
                </div>                    
                 <div></div>
                <div class="panel-body" style="background-color: #E6E6E6">
                    @include('flash::message')
                    @include('admin.template.errors')
                    @yield('content')
                </div>
            
    	</section>

    	<footer>
    		
    	</footer>
    	<script src="{{asset('plugins/jquery/js/jquery-2.2.1.js')}}"></script>
    	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

    </body>
</html>