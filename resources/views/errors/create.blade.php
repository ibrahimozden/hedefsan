@extends('layouts.hata')

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
              <h4 class="card-title">HATA TABLOSU VERİ EKLEME</h4>
              <p class="card-category">Bu tablodan hata tablosu için veri ekleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('errors.store')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>HATA_KODU</label>
                      <div class="form-group">
                        <label  for="hata_kodu" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="hata_kodu" id="hata_kodu" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>HATA_KODU_EN</label>
                      <div class="form-group">
                        <label  for="hata_kodu_en" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="hata_kodu_en" id="hata_kodu_en" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="urun_id" class="bmd-label-floating">URUN_ID</label>
                      <input type="number" class="form-control" name="urun_id" id="urun_id" >
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
