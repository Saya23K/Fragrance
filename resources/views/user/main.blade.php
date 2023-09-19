@extends('layouts.user')

@section('content')
    <div style="height: 30px"></div>
    <div class="box_main col-md-7">
        <div class="mx-auto random align-content-center flex-wrap">
                @if($flag == 1)
                    {{ $brand->brand }}の香水
                @elseif($flag == 2)
                    <p>{{ $component->component }}を使用している香水</p>
                    </br>
                    @isset($component->component_comment)
                        <div class ="col-md-8 mx-auto comment_box">
                            <div>{{ $component->component }}</div>
                            <p>{{$component->component_comment}}</p>
                        </div>
                    @endisset
                @else
                <p>Choose by feeling</p>
                </br>
                <div align="right">
                    <p>──直感で選ぶ</p>
                </div>
                @endif
            
            
            <div style="height: 80px"></div>
            
            <div class="d-flex justify-content-evenly">
                @foreach ($fragrances as $fragrance)
                <a class="switch"="javascript:void(0);" onclick="changeImg(this,'{{ route('info', [ $fragrance->id ]) }}');">
                    @if ($fragrance->silhouette_path)
                        <div class="centering_item">
                        <img class="fragrance" src="{{ secure_asset('storage/image/fragrance/' . $fragrance->image_path) }}" width="70%" height="auto">
                        <img class="silhouette" src="{{ secure_asset('storage/image/silhouette/' . $fragrance->silhouette_path) }}" width="70%" height="auto">
                        </div>
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
                        		duration: 1000,
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
        <div style="height: 220px"></div>
    </div>
            
                            
@endsection