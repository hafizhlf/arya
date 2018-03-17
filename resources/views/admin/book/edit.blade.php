@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buku LKS') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updatebook', $book->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Judul Buku') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $book->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="lesson" class="col-sm-4 col-form-label text-md-right">{{ __('Pelajaran') }}</label>
    
                                <div class="col-md-6">
    
                                    <select id="lesson" name="lesson" class="form-control{{ $errors->has('lesson') ? ' is-invalid' : '' }}" required>
                                        @foreach ($lessons as $lesson)
                                            <option value="{{ $lesson->id }}"
                                                @if ($lesson->id == $book->lesson_id)
                                                    selected
                                                @endif
                                                >{{ $lesson->name }}</option>
                                        @endforeach
                                    </select>
    
                                    @if ($errors->has('lesson'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('lesson') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="degree" class="col-sm-4 col-form-label text-md-right">{{ __('Pendidikan') }}</label>

                            <div class="col-md-6">

                                <select id="degree" name="degree" class="form-control{{ $errors->has('degree') ? ' is-invalid' : '' }}" required>
                                    @foreach ($degrees as $degree)
                                        <option value="{{ $degree->id }}"
                                            @if ($degree->id == $book->degree_id)
                                                selected
                                            @endif
                                            >{{ $degree->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('degree'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('degree') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="class" class="col-sm-4 col-form-label text-md-right">{{ __('Kelas') }}</label>

                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control{{ $errors->has('class') ? ' is-invalid' : '' }}" name="class" value="{{ $book->class }}" required>

                                @if ($errors->has('class'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('class') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="semester" class="col-sm-4 col-form-label text-md-right">{{ __('Semester') }}</label>

                            <div class="col-md-6">
                                <input id="semester" type="text" class="form-control{{ $errors->has('semester') ? ' is-invalid' : '' }}" name="semester" value="{{ $book->semester }}" required>

                                @if ($errors->has('semester'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('semester') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="publisher" class="col-sm-4 col-form-label text-md-right">{{ __('Penerbit') }}</label>

                            <div class="col-md-6">
                                <input id="publisher" type="text" class="form-control{{ $errors->has('publisher') ? ' is-invalid' : '' }}" name="publisher" value="{{ $book->publisher }}" required>

                                @if ($errors->has('publisher'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('publisher') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ubah') }}
                                </button>
                                <a href="{{ route('book') }}" class="btn btn-danger">
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
