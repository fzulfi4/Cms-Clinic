@extends('layouts.admin')


@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="section-header">
                                    <h2 class="section-title">Specialist</h2>
                                    <div class="float-right">
                                        <div class="section-header-button">
                                            <a href="{{ route('specialists.create') }}" class="btn btn-primary">Add New</a>
                                        </div>
                                    </div>
                                </div>

                                <p class="section-lead">
                                    You can manage all specialist, such as editing, deleting and more.
                                </p>
                            </div>
                            <div class="card-body">
                                {{-- <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div> --}}
                                <div class="float-right">
                                    <form method="GET" action="{{ route('specialists') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>title</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $number = 0; @endphp
                                            @foreach ($specialists as $specialist)
                                            @php $number++; @endphp
                                                <tr>
                                                    <td style="width: 25px;">{{ $number }}</td>
                                                    <td>{{ $specialist->title }}</td>
                                                    <td>{{ $specialist->description }}</td>
                                                    <td>
                                                        <?php if($specialist->status == 1): ?>
                                                        <div href='' class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-eye"></i> Aktif
                                                        </div>
                                                        <?php else: ?>
                                                        <div class="btn btn-sm btn-danger btn-icon">
                                                            <i class="fas fa-eye-slash"></i> Tidak Aktif
                                                        </div>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href='{{ route('specialists.edit', $specialist->id) }}'
                                                                class="btn btn-sm btn-info btn-icon ml-2">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('specialists.destroy', $specialist->id) }}"
                                                                method="POST" class="ml-2">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button
                                                                    class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $specialists->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
