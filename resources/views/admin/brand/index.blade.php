@extends('layouts.admin')
        
@section('content')
        <div class="col-md-8 mx-auto">
                <link href="{{ secure_asset('css/form.css') }}" rel="stylesheet">
                        
                <h2>登録ブランド一覧</h2>
                
                <a href="{{ url('admin/brands/create') }}">新規登録</a>
                
                @foreach ($brands as $brand)
                <table>
                        <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->brand}}</td>
                                <td>{{$brand->brandJP}}</td>
                                <td><a href="{{ route('brands.edit', [ $brand->id ]) }}">[編集]</a></td>
                               
                        </tr>
                </table>
                @endforeach
        </div>
        
        
@endsection