@extends('layouts.urunpdf')

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
              <h4 class="card-title">ÜRÜN PDF TABLOSU VERİ EKLEME</h4>
              <p class="card-category">Bu tablodan ürün pdf tablosu için veri ekleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('productpdfs.store')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>ADI</label>
                      <div class="form-group">
                        <label  for="adi" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="adi" id="adi" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>ADI_EN</label>
                      <div class="form-group">
                        <label  for="adi_en" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="adi_en" id="adi_en" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
    
                <button type="submit" class="btn btn-primary pull-right">EKLE</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
@endsection
