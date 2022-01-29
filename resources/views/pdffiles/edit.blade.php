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
              <h4 class="card-title">PDF FİLE TABLOSU VERİ GÜNCELLEME</h4>
              <p class="card-category">Bu tablodan pdf file tablosu verileri için güncelleme işlemleri yapabilirsiniz.</p>
            </div>
            <div class="card-body">
              <form method="post" action="{{route('pdffiles.update', $pdffile->id)}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}	
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name" class="bmd-label-floating">NAME</label>
                      <input type="text"  class="form-control" name="name" id="pdffile_name" value="{{$pdffile->name}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="name_en" class="bmd-label-floating">NAME_EN</label>
                      <input type="text"  class="form-control" name="name_en" id="pdffile_name_en" value="{{$pdffile->name_en}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pdf_url" class="bmd-label-floating">PDF_URL</label>
                      <input type="text" class="form-control" name="pdf_url" id="pdffile_pdf_url" value="{{$pdffile->pdf_url}}">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="pdf_url_en" class="bmd-label-floating">PDF_URL_EN</label>
                      <input type="text" class="form-control" name="pdf_url_en" id="pdffile_pdf_url_en" value="{{$pdffile->pdf_url_en}}">
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="urun_pdf_id" class="bmd-label-floating">URUN_PDF_ID</label>
                      <input type="number" class="form-control" name="urun_pdf_id" id="pdffile_urun_pdf_id" value="{{$pdffile->urun_pdf_id}}">
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
