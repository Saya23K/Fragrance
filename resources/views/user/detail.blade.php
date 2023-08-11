@extends('layouts.user')

@section('content')
    <div class="col-md-6 mx-auto info">
        <label>ブランド名 <a href="{{ route('random')."?brand_id=".$fragrance->m_brand_id }}">
                {{ $fragrance->brand->brand }} </a></label>
        </br>
        <label>名前 {{ $fragrance->fragrance }}</label>
        </br>
        <div class="col-md-8 mx-auto"><img width="100%" height="100%" src="{{ secure_asset('storage/image/fragrance/' . $fragrance->image_path) }}"></div></br>
        
        </br><label>容量・値段 {{ $fragrance->capacity }}ml ￥{{ $fragrance->price }}</label></br>
        オーデ
        @if($fragrance->kind == 1)
            <label>パルファン（持続時間：約5時間）</label></br>
        @elseif($fragrance->kind == 2)
            <label>トワレ（持続時間：約3～5時間）</label></br>
        @else
            <label>コロン（持続時間：約1～2時間）</label></br>
        @endif
        
        主な香料</br>
            トップ</br>
            @foreach($fragrance->top_components as $top)
                <a href="{{ route('random')."?component_id=".$top->m_component_id }}">
                {{$top->m_component->component}}</a>　
            @endforeach</br>
            
            ミドル</br>
            @foreach($fragrance->middle_components as $middle)
                <a href="{{ route('random')."?component_id=".$middle->m_component_id }}">
                {{$middle->m_component->component}}</a>　
            @endforeach</br>
            
            ラスト</br>
            @foreach($fragrance->last_components as $last)
                <a href="{{ route('random')."?component_id=".$last->m_component_id }}">
                {{$last->m_component->component}}</a>　
            @endforeach
            </br>
        説明
        </br><label>{{ $fragrance->comment }}</label></br>
    </div>

@endsection
