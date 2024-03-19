@extends('layouts.admin')


@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="card">
                    <form action="{{ route('doctors.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h2 class="section-title">Doctors</h2>
                        </div>
                        <div class="card-body row">
                            <div class="form-group col-4">
                                <label>Nik</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik"
                                    value="{{ $user->nik }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-4">
                                <label>Sip</label>
                                <input type="text" class="form-control @error('sip') is-invalid @enderror" name="sip"
                                    value="{{ $user->sip }}">
                                @error('sip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-4">
                                <label>Ihs</label>
                                <input type="text" class="form-control @error('ihs') is-invalid @enderror" name="ihs"
                                    value="{{ $user->ihs }}">
                                @error('ihs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Photo</label>
                                <input id="photo" type="file"
                                    class="form-control @error('photo') is-invalid @enderror" name="photo"
                                    accept="image/*">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @if ($user->photo)
                                    <img src="{{ asset('storage/uploads/'. $user->photo) }}" alt="User Photo"
                                        style="max-width: 200px; margin-top: 10px;">
                                @else
                                    <p>No photo available</p>
                                @endif
                            </div>
                            <div class="form-group col-6">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                            </div>
                        
                        
                            <div class="form-group col-6">
                                <label class="form-label">Status</label>
                                <select class="form-control m-bot15" name="status">
                                    <option value="1" <?php echo $user->status == 1 ? 'selected' : ''; ?>>Aktif</option>
                                    <option value="0" <?php echo $user->status == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label">Specialist</label>
                                <select class="form-control m-bot15" name="sid">
                                    @foreach ($specialists as $specialists)
                                    <option value="{{$specialists->id}}" <?php echo $user->sid == $specialists->id ? 'selected' : ''; ?>>{{$specialists->description}}</option>
                                    @endforeach
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
