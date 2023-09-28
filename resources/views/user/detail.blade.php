@extends('layouts.user')

@section('content')
    <div class="col-md-6 mx-auto box_main">
        <div class="col-md-10 mx-auto">
            <span class="brand_name">
                <a class="line" href="{{ route('random')."?brand_id=".$fragrance->m_brand_id }}">
                {{ $fragrance->brand->brand }}</a>
            </span>
            <span> - {{ $fragrance->fragrance }}</span>
            <div class="text-right">オーデ
            @if($fragrance->kind == 1)
                <label>パルファン（持続時間：約5時間）</label></br>
            @elseif($fragrance->kind == 2)
                <label>トワレ（持続時間：約3～5時間）</label></br>
            @else
                <label>コロン（持続時間：約1～2時間）</label></br>
            @endif
            </div>
        </div>
        </br></br>
        <div class="col-md-8 mx-auto"><img width="100%" height="100%" src="{{ secure_asset('storage/image/fragrance/' . $fragrance->image_path) }}"></div>
        
        <div style="text-align: right"><font size="2">参考価格:{{ $fragrance->capacity }}ml-￥{{ $fragrance->price }}</font></div></br>
        
        <div class="notebox col-md-10 mx-auto">
        <span class="box-title">主な香料</span>
        <p>
            ●トップ●</br>
            @foreach($fragrance->top_components as $top)
                <a class="line" href="{{ route('random')."?component_id=".$top->m_component_id }}">
                {{$top->m_component->component}}</a>　
            @endforeach</br>
            
            ●ミドル●</br>
            @foreach($fragrance->middle_components as $middle)
                <a class="line" href="{{ route('random')."?component_id=".$middle->m_component_id }}">
                {{$middle->m_component->component}}</a>　
            @endforeach</br>
            
            ●ラスト●</br>
            @foreach($fragrance->last_components as $last)
                <a class="line" href="{{ route('random')."?component_id=".$last->m_component_id }}">
                {{$last->m_component->component}}</a>　
            @endforeach
            </br>
        </p>
        </div>
        <div class="text-center">◆　香りの説明　◆</div>
        <div class="col-md-10 mx-auto">{{ $fragrance->comment }}</div>
        <div style="height: 20px"></div>
    </div>
    
@endsection
