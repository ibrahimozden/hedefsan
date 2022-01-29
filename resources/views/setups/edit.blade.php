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
              <h4 class="card-title">KURULUM TABLOSU VERİ GÜNCELLEME</h4>
              <p class="card-category">Bu tablodan kurulum tablosu verileri için güncelleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('setups.update', $setup->id)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}	
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="kurulum" class="bmd-label-floating">KURULUM</label>
                      <input type="text"  class="form-control" name="kurulum" id="setup_kurulum" value="{{$setup->kurulum}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="kurulum_en" class="bmd-label-floating">KURULUM_EN</label>
                      <input type="text" class="form-control" name="kurulum_en" id="setup_kurulum_en" value="{{$setup->kurulum_en}}">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="kurulum_turu_id" class="bmd-label-floating">KURLUM_TÜRÜ_ID</label>
                      <input type="number" class="form-control" name="kurulum_turu_id" id="setup_kurulum_turu_id" value="{{$setup->kurulum_turu_id}}">
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
