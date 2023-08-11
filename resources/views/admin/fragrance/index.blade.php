@extends('layouts.admin')

@section('css')
        <link href="{{ secure_asset('css/form.css') }}" rel="stylesheet">
@endsection
@section('content')
         <div class="menu">
                <div class="col-md-8 mx-auto">
                
                        <h2>香水登録一覧</h2>
                        
                        <a href="{{ url('admin/fragrances/create') }}">新規登録</a>
                        
                        @foreach ($fragrances as $fragrance)
                        <table>
                                <tr>
                                        
                                        <td>{{$fragrance->id}}</td>
                                        <td>
                                                @if ($fragrance->image_path)
                                                <img src="{{ secure_asset('storage/image/fragrance/' . $fragrance->image_path) }}" width="100" height="100">
                                                @endif
                                        </td>
                                        <td>{{$fragrance->brand->brand}}</td>
                                        <td>{{$fragrance->fragrance}}</td>
                                        <td><a href="{{ route('fragrances.edit', [ $fragrance->id ]) }}">[編集]</a></td>
                                       
                                </tr>
                        </table>
                        @endforeach
                       
                </div>
        </biv> 
        
@endsection
