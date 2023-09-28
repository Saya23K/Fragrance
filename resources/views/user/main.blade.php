@extends('layouts.user')

@section('content')
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
                <div style="height: 50px"></div>
                <span class="ms-5 choose">Choose by feeling</span>
                <span class="ms-3 bright">━━━直感で選ぶ</span>
                    @endif
        </div>   
            
            <div style="height: 30px"></div>
            
            <div class="d-flex justify-content-evenly">
                @foreach ($fragrances as $fragrance)
                <!--href="javascript:void(0)でリンク無効　クリックでchangeImg実行-->
                <a class="switch" href="javascript:void(0);" onclick="changeImg(this,'{{ route('info', [ $fragrance->id ]) }}');">
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
                    function changeImg(link,url){
                        
                        // <a>タグ内のsilhouette要素を呼び出す
                        var silhouette = link.getElementsByClassName("silhouette")[0];
                        
                        // <a>タグ内のfragrance要素を呼び出す
                        var fragrance = link.getElementsByClassName("fragrance")[0];
                        // 画像を表示する(cssプロパティ初期化)
                        fragrance.style.display = "initial";
                        
                        //画像にアニメーションをかける 
                        fragrance.animate(
                        	[
                        		{ opacity: 0 },
                        		{ opacity: 1 }
                        	],
                        	{
                        	    //秒数とアニメーションの種類
                        		duration: 1000,
                        		fill: 'forwards'
                        	}
                        );
                        
                        
                        silhouette.style.display = "none";
                        
                        //現在のURL(window.location.href)を推移先(url)へ上書き
                        //setTimeoutで秒数指定
                        setTimeout(function(){
                          window.location.href = url;
                        }, 1*1000);
                        
                    }
                </script>
                
            </div>
            
        <div style="height: 50px"></div>
        @if($flag != 1 && $flag != 2)
        
        <div class="text-center information">◆　ご案内　◆</div>
        <div class="d-flex justify-content-center align-self-stretch"> 
        <div class="box1"><p>まずは直感でひとつ選んでください</p></div>
        <div class="align-self-center mx-2">→</div>
        <div class="box1"><p>説明文から同じブランドの香水や同じ香りの成分を持つ香水と出会えます</p></div>
        <div class="align-self-center mx-2">→</div>
        <div class="box1"><p>気になるものと出会えるまで繰り返してください</br>
        <span class="bright">シルエットクイズもできたりします</span></p></div>
        </div>

        @endif
        
         <div style="height: 50px"></div>
    </div>
            
                            
@endsection