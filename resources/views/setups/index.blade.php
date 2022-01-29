@extends('layouts.setup')

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
                            <h4 class="card-title ">KURULUM TABLOSU</h4>
                            <p class="card-category">Bu tablodan kurulum tablosu verileri ile ilgili işlemler yapabilirsiniz.</p>
                            <a href="{{ route('setups.create') }}" class="btn btn-primary pull-left">YENİ VERİ EKLE</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-info">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            KURULUM
                                        </th>
                                        <th>
                                            KURULUM_EN
                                        </th>
                                        <th>
                                            KURULUM_TÜRÜ_ID
                                        </th>
                                        <th colspan="2">
                                            İŞLEMLER
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($setups as $setup)
                                                <td>
                                                    {{ $setup->id }}
                                                </td>
                                                <td>
                                                    {{ $setup->kurulum }}
                                                </td>
                                                <td>
                                                    {{ $setup->kurulum_en }}
                                                </td>
                                                <td>
                                                    {{ $setup->kurulum_turu_id }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('setups.edit', $setup->id) }}"
                                                        class="btn btn-primary pull-right">DÜZENLE</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('setups.destroy', $setup->id) }}" method="post">
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
                        {{ $setups->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
