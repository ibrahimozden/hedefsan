@extends('layouts.urunkurulum')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              @if ($errors->any())
            <div class="alert alert-danger col-md-12 col-sm-12 col-xs-12">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                     @endforeach
                </ul>
            </div><br>
            @endif
              <h4 class="card-title">ÜRÜN KURULUM TABLOSU VERİ GÜNCELLEME</h4>
              <p class="card-category">Bu tablodan ürün kurulum tablosu verileri için güncelleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('productsetups.update', $productsetup->id)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}	
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="adi" class="bmd-label-floating">ADI</label>
                      <input type="text"  class="form-control" name="adi" id="productsetup_adi" value="{{$productsetup->adi}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="adi_en" class="bmd-label-floating">ADI_EN</label>
                      <input type="text"  class="form-control" name="adi_en" id="productsetup_adi_en" value="{{$productsetup->adi_en}}">
                    </div>
                  </div>
            
                  
                <button type="submit" class="btn btn-primary pull-right">GÜNCELLE</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection
