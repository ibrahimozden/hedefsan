@extends('layouts.setup')

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
              <h4 class="card-title">KURULUM TABLOSU VERİ EKLEME</h4>
              <p class="card-category">Bu tablodan kurulum tablosu için veri ekleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('setups.store')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>KURULUM</label>
                      <div class="form-group">
                        <label  for="kurulum" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="kurulum" id="kurulum" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>KURULUM_EN</label>
                      <div class="form-group">
                        <label  for="kurulum_en" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="kurulum_en" id="kurulum_en" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="kurulum_turu_id" class="bmd-label-floating">KURLUM_TÜRÜ_ID</label>
                      <input type="number" class="form-control" name="kurulum_turu_id" id="kurulum_turu_id" >
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
