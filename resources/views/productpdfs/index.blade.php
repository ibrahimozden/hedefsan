@extends('layouts.urunpdf')

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
                            <h4 class="card-title ">ÜRÜN PDF TABLOSU</h4>
                            <p class="card-category">Bu tablodan ürün pdf verileri ile ilgili işlemler yapabilirsiniz.</p>
                            <a href="{{ route('productpdfs.create') }}" class="btn btn-primary pull-left">YENİ VERİ EKLE</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-info">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            ADI
                                        </th>
                                        <th>
                                            ADI_EN
                                        </th>
                                        <th colspan="2">
                                            İŞLEMLER
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($productpdfs as $productpdf)
                                                <td>
                                                    {{ $productpdf->id }}
                                                </td>
                                                <td>
                                                    {{ $productpdf->adi}}
                                                </td>
                                                <td>
                                                    {{ $productpdf->adi_en }}
                                                </td>
                                                
                                                <td>
                                                    <a href="{{ route('productpdfs.edit', $productpdf->id) }}"
                                                        class="btn btn-primary pull-right">DÜZENLE</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('productpdfs.destroy', $productpdf->id) }}" method="post">
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
                        {{ $productpdfs->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
