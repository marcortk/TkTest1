<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta chasrset="UTF-8">
        <title>@yield('title','Default')</title>
        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">


    </head>
    <body style="background:#8A0808">
    	@include('admin.template.nav')
    	<section class="section-admin">
            <div class="panel panel-defaults">
                <div class="panel panel-heading">
                    <h3 class="panel panel-title">@yield('title') </h3>                    
                </div>
                <div class="panel-body">
                    @include('flash::message')
                    <!--include('admin.template.errors')-->
                    @yield('content')
                </div>
            </div>
    	</section>

    	<footer>
    		
    	</footer>
    	<script src="{{asset('plugins/jquery/js/jquery-2.2.1.js')}}"></script>
    	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>

    </body>
</html>