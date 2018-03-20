@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bank Soal Buku LKS</div>

                <div class="card-body text-center">
                    @if (!empty($questions[0]->name))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pelajaran</th>
                                    <th scope="col" colspan="2"><a href="{{ route('createlesson', $book->id) }}" class="form-control btn btn-outline-success btn-sm">Tambah</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
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
                        <a href="{{ route('amountquestion', $book->id) }}" class="btn btn-outline-success btn-sm">Tambahkan data</a>
                    @endif
                </div>
                <div class="card-footer text-muted">
                    <a href="{{ route('book') }}" style="text-decoration: none;">Kembali ke halaman sebelumnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
