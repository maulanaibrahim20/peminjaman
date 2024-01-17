@extends('superadmin.dashboard')
@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Master Admin Position</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Master Admin Table </li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaldemo1">
                <i class="fa fa-plus"></i> Tambah Data
            </button>

        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">Data Admin Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">No</th>
                                    <th class="wd-15p border-bottom-0">nama posisi</th>
                                    <th class="wd-15p border-bottom-0 text-center">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($position as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->position_admin }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-warning" data-bs-target="#modaldemo2{{ $data->id }}"
                                                data-bs-toggle="modal" href=""><i class="fa fa-edit"></i></a>
                                            <form style="display: inline" method="POST"
                                                action="{{ url('/superadmin/master/position/' . $data->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"data-confirm-delete="true" class="btn btn-danger ">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal tambah data --}}
    <div class="modal fade" id="modaldemo1">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close"
                        data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ url('/superadmin/master/position') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-label">Nama Posisi Admin</label>
                                <input class="form-control  mb-4 is-valid state-valid" placeholder="Masukan Nama"
                                    required="" type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save changes</button> <button class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal tambah data --}}

    {{-- modal edit data --}}
    @foreach ($position as $item)
        <div class="modal fade" id="modaldemo2{{ $item->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Message Preview</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ url('/superadmin/master/position/' . $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Nama Posisi Admin</label>
                                    <input class="form-control  mb-4 is-valid state-valid" placeholder="Masukan Nama"
                                        required="" type="text" value="{{ $item->position_admin }}" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Save changes</button> <button
                                class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end edit data --}}
@endsection
