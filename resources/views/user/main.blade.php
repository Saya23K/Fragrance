@extends('layouts.user')

@section('content')
<div class="col-md-8 mx-auto random vh-100 d-flex align-content-center flex-wrap">
    <font size="5">Choose by feeling</font>
    </br>
    <div align="right">
        <font size="1" color="silver">──直感で選ぶ</font>
    </div>
    <div class="d-flex justify-content-evenly">
        @foreach ($fragrances as $fragrance)
        <a class="switch"="javascript:void(0);" onclick="changeImg(this,'{{ route('info', [ $fragrance->id ]) }}');">
            @if ($fragrance->silhouette_path)
                <img class="fragrance" src="{{ secure_asset('storage/image/fragrance/' . $fragrance->image_path) }}" width="80%" height="auto">
                <img class="silhouette" src="{{ secure_asset('storage/image/silhouette/' . $fragrance->silhouette_path) }}" width="80%" height="auto">
                
            @else
                リンク
            @endif
        </a>
        @endforeach
    
        <script>
            //let switchImg = document.getElementById("switch");
            function changeImg(link,url){
                
                var silhouette = link.getElementsByClassName("silhouette")[0];
                
                
                var fragrance = link.getElementsByClassName("fragrance")[0];
                fragrance.style.display = "initial";
                
                fragrance.animate(
                	[
                		{ opacity: 0 },
                		{ opacity: 1 }
                	],
                	{
                		duration: 1500,
                		fill: 'forwards'
                	}
                );
                
                silhouette.style.display = "none";
                
                setTimeout(function(){
                  window.location.href = url;
                }, 2*1000);
                
            //switchImg.classList.toggle("on_switch");
            }
            //switchImg.addEventListener("click",changeImg);
        </script>
    </div>
</div>
        
                        
@endsection