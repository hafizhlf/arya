@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="card-title">Pendidikan</h5>                    
                    <p class="card-text text-muted">Lihat, tambah, ubah dan hapus tingkat pendidikan pada sistem.</p>
                    <a href="{{ route('degree') }}" class="btn btn-outline-primary">Tampilkan</a>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Pelajaran</h5>                    
                    <p class="card-text text-muted">Lihat, tambah, ubah dan hapus pelajaran pada sistem.</p>
                    <a href="{{ route('lesson') }}" class="btn btn-outline-primary">Tampilkan</a>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Buku LKS</h5>                    
                    <p class="card-text text-muted">Lihat, tambah, ubah dan hapus buku LKS pada sistem.</p>
                    <a href="{{ route('book') }}" class="btn btn-outline-primary">Tampilkan</a>
                </div>
                <div class="card-body text-center">
                    <a href="" class="btn btn-outline-primary">Tingkatan Pelajaran</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
