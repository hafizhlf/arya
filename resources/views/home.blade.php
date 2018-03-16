@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Lembar Kerja Siswa (LKS) adalah lembaran yang berisi tugas yang harus dikerjakan oleh peserta didik. LKS biasanya berupa petunjuk, langkah untuk menyelesaikan suatu tugas, suatu tugas yang diperintahkan dalam lembar kegiatan harus jelas kompetensi dasar yang akan dicapainya.( Depdiknas; 2004;18).
                    <br/>
                    <br/>
                    <h4>Petunjuk</h4>
                    Arya yang isi
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
