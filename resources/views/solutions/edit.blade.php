@extends('layouts.cozum')

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
              <h4 class="card-title">ÇÖZÜM TABLOSU VERİ GÜNCELLEME</h4>
              <p class="card-category">Bu tablodan çözüm tablosu verileri için güncelleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('solutions.update', $solution->id)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}	
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="cozum_text" class="bmd-label-floating">ÇÖZÜM_TEXT</label>
                      <input type="text"  class="form-control" name="cozum_text" id="solution_cozum_text" value="{{$solution->cozum_text}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="cozum_text_en" class="bmd-label-floating">ÇÖZÜM_TEXT_EN</label>
                      <input type="text" class="form-control" name="cozum_text_en" id="solution_cozum_text_en" value="{{$solution->cozum_text_en}}">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="hata_id" class="bmd-label-floating">HATA_ID</label>
                      <input type="number" class="form-control" name="hata_id" id="solution_hata_id" value="{{$solution->hata_id}}">
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
