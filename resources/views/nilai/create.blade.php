@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts._flash')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Data nilai </div>

                    <div class="card-body">
                        <form action="{{ route('nilai.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">NIS</label>
                                <input type="text" name="nis"
                                    class="form-control @error('nis') is-invalid @enderror">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Kode Mapel</label>
                                <input type="text" name="kode_mapel"
                                    class="form-control @error('kode_mapel') is-invalid @enderror">
                                @error('kode_mapel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Nilai</label>
                                <input type="text" name="nilai1"
                                    class="form-control @error('nilai1') is-invalid @enderror">
                                @error('nilai1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Grade</label>
                                <input type="text" name="grade"
                                    class="form-control @error('grade') is-invalid @enderror">
                                @error('grade')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection