@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambahkan soal') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('createquestion', $section->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="count" class="col-sm-4 col-form-label text-md-right">{{ __('Jumlah Soal') }}</label>

                            <div class="col-md-6">
                                <input id="count" type="text" class="form-control{{ $errors->has('count') ? ' is-invalid' : '' }}" name="count" value="{{ old('count') }}" required autofocus>

                                @if ($errors->has('count'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('count') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="essay" class="col-sm-4 col-form-label text-md-right">{{ __('Essay?') }}</label>

                            <div class="col-md-6">
                                <input id="essay" type="checkbox" class="form-check-input form-control{{ $errors->has('essay') ? ' is-invalid' : '' }}" name="essay" value="essay">
                                <label class="form-check-label col-form-label" for="essay">
                                    Tanpa pilihan ganda
                                </label>

                                @if ($errors->has('essay'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('essay') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>
                                <a href="{{ route('question', $section->id) }}" class="btn btn-danger">
                                    {{ __('Kembali') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
