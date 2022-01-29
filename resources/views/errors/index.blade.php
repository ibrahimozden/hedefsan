@extends('layouts.hata')

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
                            <h4 class="card-title ">HATA TABLOSU</h4>
                            <p class="card-category">Bu tablodan hata verileri ile ilgili işlemler yapabilirsiniz.</p>
                            <a href="{{ route('errors.create') }}" class="btn btn-primary pull-left">YENİ VERİ EKLE</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-info">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            HATA_KODU
                                        </th>
                                        <th>
                                            HATA_KODU_EN
                                        </th>
                                        <th>
                                            URUN_ID
                                        </th>
                                        <th colspan="2">
                                            İŞLEMLER
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($errors as $error)
                                                <td>
                                                    {{ $error->id }}
                                                </td>
                                                <td>
                                                    {{ $error->hata_kodu}}
                                                </td>
                                                <td>
                                                    {{ $error->hata_kodu_en }}
                                                </td>
                                                <td>
                                                    {{ $error->urun_id}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('errors.edit', $error->id) }}"
                                                        class="btn btn-primary pull-right">DÜZENLE</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('errors.destroy', $error->id) }}" method="post">
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
                        {{ $errors->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
