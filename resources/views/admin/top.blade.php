@extends('layouts.admin')
        
@section('content')

        <div class="col-md-8 mx-auto">
        
                <h2>管理者ページ</h2>
                
                <a href="{{ url('/admin/fragrances/') }}"> 登録香水一覧 </a>
                
                <a href="{{ url('/admin/brands/') }}"> ブランドマスター </a>
                
                <a href="{{ url('/admin/components/') }}"> 成分マスター </a>
        
        </div>
@endsection