@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __(('Buku LKS')) }}</div>

                <div class="card-body text-center">
                    @if (!empty($books[0]->name))
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Pelajaran') }}</th>
                                    <th scope="col">{{ __('Nama Buku') }}</th>
                                    <th scope="col">{{ __('Tingkat Pendidikan') }}</th>
                                    <th scope="col">{{ __('Kelas') }}</th>
                                    <th scope="col">{{ __('Semester') }}</th>
                                    <th scope="col">{{ __('Penerbit') }}</th>
                                    <th scope="col" colspan="2"><a href="{{ route('createbook') }}" class="form-control btn btn-outline-success btn-sm">Tambah</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $book->lesson->name }}</td>
                                    <td><a href="{{ route('section', $book->id) }}">{{ $book->name }}</a></td>
                                    <td>{{ $book->degree->name }}</td>
                                    <td>{{ $book->class }}</td>
                                    <td>{{ $book->semester }}</td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>
                                        <a href="{{ route('editbook', $book->id) }}" class="form-control btn btn-outline-primary btn-sm">{{ __('Ubah') }}</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('destroybook', $book->id) }}" method="POST">
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
                        <a href="{{ route('createbook') }}" class="btn btn-outline-success btn-sm">Tambahkan data</a>
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
