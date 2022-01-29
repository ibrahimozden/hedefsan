@extends('layouts.pdffile')

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
              <h4 class="card-title">PDF FİLE TABLOSU VERİ EKLEME</h4>
              <p class="card-category">Bu tablodan pdf file tablosu için veri ekleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('pdffiles.store')}}">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>NAME</label>
                      <div class="form-group">
                        <label  for="name" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="name" id="name" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>NAME_EN</label>
                      <div class="form-group">
                        <label  for="name_en" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="name_en" id="name_en" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>PDF_URL</label>
                      <div class="form-group">
                        <label  for="pdf_url" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="pdf_url" id="pdf_url" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>PDF_URL_EN</label>
                      <div class="form-group">
                        <label  for="pdf_url_en" class="bmd-label-floating"></label>
                        <textarea class="form-control" name="pdf_url_en" id="pdf_url_en" rows="3"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="urun_pdf_id" class="bmd-label-floating">URUN_PDF_ID</label>
                      <input type="number" class="form-control" name="urun_pdf_id" id="urun_pdf_id" >
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
