<html>

<head>

    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('importsIndex')

</head>

<body>
    <div class="loader">
        <div class="preloader-wrapper big active loader-body">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="back">  
    </div>


@include('menu.menuIndex')


@yield('content')

@include('indexviews/modals')

@include('footer')

@include('importScripts')

@yield('customScripts')
</body>

</html>