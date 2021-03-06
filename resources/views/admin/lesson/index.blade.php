@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pelajaran</div>

                <div class="card-body text-center">
                    @if (!empty($lessons[0]->name))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pelajaran</th>
                                    <th scope="col" colspan="2"><a href="{{ route('createlesson') }}" class="form-control btn btn-outline-success btn-sm">Tambah</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lessons as $lesson)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $lesson->name }}</td>
                                    <td>
                                        <a href="{{ route('editlesson', $lesson->id) }}" class="form-control btn btn-outline-primary btn-sm">{{ __('Ubah') }}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroylesson', $lesson->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" class="form-control btn btn-outline-danger btn-sm" value="Hapus">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $lessons->links() }}
                    @else
                        <p>Data Kosong</p>
                        <a href="{{ route('createlesson') }}" class="btn btn-outline-success btn-sm">Tambahkan data</a>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('admin') }}" style="text-decoration: none;">Kembali ke halaman Admin</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
