<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
    
            <!-- CSRF Token -->
             {{-- 後の章で説明します --}}
            <meta name="csrf-token" content="{{ csrf_token() }}">
    
            <!-- Scripts -->
             {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
            <script src="{{ secure_asset('js/app.js') }}" defer></script>
            
            <!--google font-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&family=Zen+Maru+Gothic:wght@700&display=swap" rel="stylesheet">
            
            <!-- Fonts -->
            <link rel="dns-prefetch" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
            <!-- Styles -->
            {{-- Laravel標準で用意されているCSSを読み込みます --}}
            <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
            {{-- entryCSSを読み込みます --}}
            <link href="{{ secure_asset('css/entry.css') }}" rel="stylesheet">
            @yield('css')
    </head>
    <body>
        <main>
            <div class="top vh-100">
                <div style="height: 60px"></div>
                <div class="align-items-center justify-content-center">
                    <img src="{{ asset('images/Frame1.png') }}" width="30%" height="auto" class="rounded mx-auto d-block"alt="">
                    
                    <div class="entry">
                        <a href="{{ route('random') }}">
                            <img src="{{ asset('images/Top.jpg')}}" width="50%" height="auto" alt="Top">
                            <img src="{{ asset('images/Enter.jpg')}}" width="50%" height="auto" alt="Enter">
                        </a>
                    </div>
                    
                    <img src="{{ asset('images/Frame2.png') }}" width="30%" height="auto" class="rounded mx-auto d-block" alt="">
                </div>
            </div>
            
        </main>
    </body>
</html>