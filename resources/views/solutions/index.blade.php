@extends('layouts.cozum')

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
                            <h4 class="card-title ">ÇÖZÜM TABLOSU</h4>
                            <p class="card-category">Bu tablodan çözüm verileri ile ilgili işlemler yapabilirsiniz.</p>
                            <a href="{{ route('solutions.create') }}" class="btn btn-primary pull-left">YENİ VERİ EKLE</a>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-info">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            ÇÖZÜM_TEXT
                                        </th>
                                        <th>
                                            ÇÖZÜM_TEXT_EN
                                        </th>
                                        <th>
                                            HATA_ID
                                        </th>
                                        <th colspan="2">
                                            İŞLEMLER
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($solutions as $solution)
                                                <td>
                                                    {{ $solution->id }}
                                                </td>
                                                <td>
                                                    {{ $solution->cozum_text}}
                                                </td>
                                                <td>
                                                    {{ $solution->cozum_text_en }}
                                                </td>
                                                <td>
                                                    {{ $solution->hata_id}}
                                                </td>
                                                <td>
                                                    <a href="{{ route('solutions.edit', $solution->id) }}"
                                                        class="btn btn-primary pull-right">DÜZENLE</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('solutions.destroy', $solution->id) }}" method="post">
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
                        {{ $solutions->links('vendor.pagination.simple-bootstrap-4') }}
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
