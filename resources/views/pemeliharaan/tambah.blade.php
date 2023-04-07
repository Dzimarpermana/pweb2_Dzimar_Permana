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
                {{-- <button type="button" class="btn btn-primary btn-icon" id="btmodal" style="position: absolute; right: 0px;"><i class="far fa-edit"></i></button> --}}
              </div>

              <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                  <div class="card">
                    <form action="{{Route('data.tambah')}}" method="POST">
                      @csrf
                      <div class="card-header">
                        <h1><b>Tambah data pemeliharaan</b></h1>
                      </div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Nama Jalan</label>
                          <input type="text" class="form-control" name="nama_jalan" required>
                        </div>
                        <div class="form-group">
                          <label>Jenis Pemeliharaan</label>
                          <input type="text" class="form-control" name="jenis_pemeliharaan" required>
                        </div>
                        <div class="form-group">
                          <label>Nama Kontraktor</label>
                          <input type="text" name="nama_kontraktor" class="form-control" required>
                        </div>
                        <div class="form-group mb-0">
                          <label>Status</label>
                         <select name="status" id="" class="form-control">
                          <option value="1">Belum Terlaksana</option>
                          <option value="2">Sudah Terlaksana</option>
                        </select>
                        </div>
                      </div>
                      <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
          </div>
    </div>

     <!-- Script -->


</x-app-layout>
