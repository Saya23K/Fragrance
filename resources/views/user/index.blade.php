@extends('layouts.user')

@section('content')
    <div class="col-md-6 mx-auto">
        @empty($cond_string)
        登録香水一覧　{{$fragrances->count()}}件
        
        @else
        "{{ $cond_string }}"で検索した結果　{{$fragrances->count()}}件
        
        @endempty
        
        @foreach ($fragrances as $fragrance)
            <a href="{{ route('info', $fragrance->id) }}">
                <div class="index">
                <table>
                    <tr>
                        <td>  {{ $loop->iteration }}  </td>
                        <td>
                                @if ($fragrance->image_path)
                                <img src="{{ secure_asset('storage/image/fragrance/' . $fragrance->image_path) }}" width="100" height="100">
                                @endif
                        </td>
                        <td>{{$fragrance->brand->brand}}</td>
                        <td>{{$fragrance->fragrance}}</td>
                           
                    </tr>
                </table>
                </div>
            </a>
        @endforeach
    </div>
@endsection