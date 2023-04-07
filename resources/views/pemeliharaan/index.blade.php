<x-app-layout>
    <x-slot name="header_content">
        <h1>Data Pemeliharaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Data Pemeliharaan</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        {{-- <x-jet-welcome /> --}}
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    {{-- <button type="button" class="btn btn-primary btn-icon" id="btmodal" style="position: absolute; right: 0px;"></button> --}}
                    @if (auth()->user()->role_id == 1)
                    <a href="{{ route('data.tambah.index') }}" class="btn btn-primary btn-icon"
                        style="position: absolute; right: 0px;"><i class="far fa-edit"></i></a>
                    @endif
                </div>



                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tr>
                                <th>No</th>
                                <th>Nama Jalan</th>
                                <th>Nama Kontraktor</th>
                                <th>Jenis Pemeliharaan</th>
                                <th>Status</th>
                                @if (auth()->user()->role_id == 1)
                                <th>Action</th>
                                @endif
                            </tr>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $d->nama_jalan }}</td>
                                    <td>{{ $d->nama_kontraktor }}</td>
                                    <td>{{ $d->jenis_pemeliharaan }}</td>
                                    @if ($d->status != 1)
                                        <td>
                                            <div class="badge badge-success">Sudah Terlaksana</div>
                                        </td>
                                    @else
                                        <td>
                                            <div class="badge badge-warning">Belum Terlaksana</div>
                                        </td>
                                    @endif
                                    @if (auth()->user()->role_id == 1)
                                    <td><a href="{{ url('edit', $d->id) }}" class="btn btn-info">Edit</a>
                                        <form action="{{ url('hapus', $d->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger" id="swal-6">Hapus</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->


</x-app-layout>
