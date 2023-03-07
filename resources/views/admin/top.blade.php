@extends('layouts.admin')
        
@section('content')
        
        <h2>管理者ページ</h2>
        
        <a href="{{ url('/admin/fragrances/') }}"> 登録香水一覧 </a>
        
        <a href="{{ url('/admin/brands/') }}"> ブランドマスター </a>
        
        <a href="{{ url('/admin/components/') }}"> 成分マスター </a>
@endsection