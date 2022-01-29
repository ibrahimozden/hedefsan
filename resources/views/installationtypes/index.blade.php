@extends('layouts.kurulumturu')

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
                            <h4 class="card-title ">KURULUM TÜRÜ TABLOSU</h4>
                            <p class="card-category">Bu tablodan kurulum türü verileri ile ilgili işlemler yapabilirsiniz.</p>
                            <a href="{{ route('installationtypes.create') }}" class="btn btn-primary pull-left">YENİ VERİ EKLE</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-info">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            TÜR
                                        </th>
                                        <th>
                                            TÜR_EN
                                        </th>
                                        <th>
                                            KURULUM_ÜRÜN_ID
                                        </th>
                                        <th colspan="2">
                                            İŞLEMLER
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($installationtypes as $installationtype)
                                                <td>
                                                    {{ $installationtype->id }}
                                                </td>
                                                <td>
                                                    {{ $installationtype->tur}}
                                                </td>
                                                <td>
                                                    {{ $installationtype->tur_en }}
                                                </td>
                                                <td>
                                                    {{ $installationtype->kurulum_urun_id}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('installationtypes.edit', $installationtype->id) }}"
                                                        class="btn btn-primary pull-right">DÜZENLE</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('installationtypes.destroy', $installationtype->id) }}" method="post">
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
                        {{ $installationtypes->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
