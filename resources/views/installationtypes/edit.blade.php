@extends('layouts.kurulumturu')

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
              <h4 class="card-title">KURULUM TÜRÜ TABLOSU VERİ GÜNCELLEME</h4>
              <p class="card-category">Bu tablodan kurulum türü tablosu verileri için güncelleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('installationtypes.update', $installationtype->id)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}	
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="tur" class="bmd-label-floating">TÜR</label>
                      <input type="text"  class="form-control" name="tur" id="installationtype_tur" value="{{$installationtype->tur}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="tur_en" class="bmd-label-floating">TÜR_EN</label>
                      <input type="text" class="form-control" name="tur_en" id="installationtype_tur_en" value="{{$installationtype->tur_en}}">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="kurulum_urun_id" class="bmd-label-floating">KURULUM_ÜRÜN_İD</label>
                      <input type="number" class="form-control" name="kurulum_urun_id" id="installationtype_kurulum_urun_id" value="{{$installationtype->kurulum_urun_id}}">
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
