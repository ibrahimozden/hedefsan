@extends('layouts.pdffile')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-info">
                            @if (session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br>
                            @endif
                            <h4 class="card-title ">PDF FİLE TABLOSU</h4>
                            <p class="card-category">Bu tablodan pdf file verileri ile ilgili işlemler yapabilirsiniz.</p>
                            <a href="{{ route('pdffiles.create') }}" class="btn btn-primary pull-left">YENİ VERİ EKLE</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-info">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            NAME
                                        </th>
                                        <th>
                                            NAME_EN
                                        </th>
                                        <th>
                                            PDF_URL
                                        </th>
                                        <th>
                                            PDF_URL_EN
                                        </th>
                                        <th>
                                            URUN_PDF_ID
                                        </th>
                                        <th colspan="2">
                                            İŞLEMLER
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($pdffiles as $pdffile)
                                                <td>
                                                    {{ $pdffile->id }}
                                                </td>
                                                <td>
                                                    {{ $pdffile->name}}
                                                </td>
                                                <td>
                                                    {{ $pdffile->name_en }}
                                                </td>
                                                <td>
                                                    {{ $pdffile->pdf_url}}
                                                </td>
                                                <td>
                                                    {{ $pdffile->pdf_url_en}}
                                                </td>
                                                <td>
                                                    {{ $pdffile->urun_pdf_id}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('pdffiles.edit', $pdffile->id) }}"
                                                        class="btn btn-primary pull-right">DÜZENLE</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('pdffiles.destroy', $pdffile->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger pull-right" type="submit">SİL
                                                    </form></button>

                                                    </form>
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{ $pdffiles->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
