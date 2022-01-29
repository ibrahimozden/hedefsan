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
              <h4 class="card-title">KURULUM TÜRÜ TABLOSU VERİ EKLEME</h4>
              <p class="card-category">Bu tablodan kurulum türü tablosu için veri ekleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('installationtypes.store')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>KURULUM TÜRÜ</label>
                      <div class="form-group">
                        <label  for="tur" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="tur" id="tur" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>KURULUM_TÜRÜ_EN</label>
                      <div class="form-group">
                        <label  for="tur_en" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="tur_en" id="tur_en" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="kurulum_urun_id" class="bmd-label-floating">KURULUM_ÜRÜN_ID</label>
                      <input type="number" class="form-control" name="kurulum_urun_id" id="kurulum_urun_id" >
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
