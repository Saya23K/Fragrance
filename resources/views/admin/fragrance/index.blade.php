@extends('layouts.admin')
        
@section('content')

        <div class="col-md-8 mx-auto">
        
                <h2>香水登録一覧</h2>
                
                <a href="{{ url('admin/fragrances/create') }}">新規登録</a>
                
                @foreach ($fragrances as $fragrance)
                <table>
                        <tr>
                                <td>{{$fragrance->id}}</td>
                                <td>{{$fragrance->brand->brand}}</td>
                                <td>{{$fragrance->fragrance}}</td>
                                <td><a href="{{ route('fragrances.edit', [ $fragrance->id ]) }}">[編集]</a></td>
                               
                        </tr>
                </table>
                @endforeach
                
        </div>
        
@endsection