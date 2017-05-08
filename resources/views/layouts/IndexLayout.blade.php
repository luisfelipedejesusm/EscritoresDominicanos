<html>

<head>

    <title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    @include('importsIndex')

</head>

<body>
    <div class="loader valign-wrapper ">
        <div class="preloader-wrapper big active loader-body valign ">
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