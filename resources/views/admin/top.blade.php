@extends('layouts.admin')
        
@section('content')
 
        
        <div class="container">
                <div style="height: 150px"></div>
                <div class="col-md-8 mx-auto">
                         <div class="contents d-flex align-items-center justyfy-content-center">
                                <a href="{{ url('/admin/fragrances/') }}"><img src="{{ asset('storage/image/FragranceMaster.png')}}" width="100%" height="auto" alt="登録香水一覧"></a>
                                
                                <a href="{{ url('/admin/components/') }}"><img src="{{ asset('storage/image/ComponentMaster.png')}}" width="100%" height="auto" alt="成分マスター"></a>
                         
                                <a href="{{ url('/admin/brands/') }}"><img src="{{ asset('storage/image/BrandMaster.png')}}" width="100%" height="auto" alt="ブランドマスター"></a>
                        </div>
                </div>

        
        </div>

@endsection