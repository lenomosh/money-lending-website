<html>
<head>
    @php
    include view('inc.header')
    @endphp


</head>
<header>
    @php
        include view('inc.nav')
    @endphp


</header>
<body>
@yield('index')
@yield('about')
@yield('services')
@yield('grant')
@yield('contact')
@yield('signup')
@yield('script')
</body>
<footer>
    @php
        include view('inc.footer')
    @endphp
</footer>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('js/jquery-2.1.1.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/functions.js')}}"></script>
</html>