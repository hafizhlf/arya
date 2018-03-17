@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(('Buku LKS')) }}</div>

                <div class="card-body text-center">
                    @if (!empty($degrees[0]->name))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Nama Buku') }}</th>
                                    <th scope="col">{{ __('Tingkat Pendidikan') }}</th>
                                    <th scope="col">{{ __('Kelas') }}</th>
                                    <th scope="col">{{ __('Semester') }}</th>
                                    <th scope="col">{{ __('Penerbit') }}</th>
                                    <th scope="col" colspan="2"><a href="{{ route('createdegree') }}" class="form-control btn btn-outline-success btn-sm">Tambah</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $book->name }}</td>
                                    <td>
                                        <a href="{{ route('editdegree', $book->id) }}" class="form-control btn btn-outline-primary btn-sm">{{ __('Ubah') }}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroydegree', $book->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="submit" class="form-control btn btn-outline-danger btn-sm" value="Hapus">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $books->links() }}
                    @else
                        <p>Data Kosong</p>
                        <a href="{{ route('createdegree') }}" class="btn btn-outline-success btn-sm">Tambahkan data</a>
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
