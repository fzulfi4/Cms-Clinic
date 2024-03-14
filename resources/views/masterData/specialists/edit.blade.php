@extends('layouts.admin')


@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <form action="{{ route('specialists.update', $specialists->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h2 class="section-title">Specialist</h2>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-6">
                                <label>Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    value="{{ $specialists->title }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ $specialists->description }}">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label class="form-label">Status</label>
                                <select class="form-control m-bot15" name="status">
                                    <option value="1" <?php echo $specialists->status == 1 ? 'selected' : ''; ?>>Aktif</option>
                                    <option value="0" <?php echo $specialists->status == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
