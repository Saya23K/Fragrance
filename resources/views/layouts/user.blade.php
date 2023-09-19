<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
    
            <!-- CSRF Token -->
             {{-- 後の章で説明します --}}
            <meta name="csrf-token" content="{{ csrf_token() }}">
    
            {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
            <title>@yield('title')</title>
    
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
            {{-- userCSSを読み込みます --}}
            <link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
            @yield('css')
    </head>
    <body>
        <div class="test row">
        <header class="navbar mx-auto">
                <div class="justfy-content-start">
                    <a class="icon" href="{{route('random')}}"><img src="{{ asset('storage/image/SampleHeader.jpg')}}" width="auto" height="80px" alt="Topへ"></a>
                </div>
                <div class="justfy-content-end">
                    <form action="{{ route('search') }}" method="get">
                        <div class="form-group row">
                            <div class="col-10">
                                <input type="text" class="form-control" name="cond_string" placeholder="" >
                            </div>
                            <div class="col-2">
                                @csrf
                                <input type="submit" class="btn btn-primary" value="🔎">
                            </div>
                        </div>
                    </form>
                </div>
            
        </header>
        </div>
        <main>
            @yield('content')
        </main>
        
    </body>
</html>