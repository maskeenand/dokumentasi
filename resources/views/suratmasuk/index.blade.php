@extends('layout.master')

@section('konten')
<div class="row">
<div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Surat Masuk</h6>
        <a href="/suratmasuk/create" class="btn btn-primary ">add</a>
      </div>
      <div class="card-body px-2 pt-0 pb-2">
        <div class="table-responsive p-2">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-secondary p-2">No Surat</th>
                <th class="text-secondary p-2">Jenis Surat</th>
                <th class=" text-secondary p-2">Tanggal Surat</th>
                <th class="text-secondary p-2">Tanggal Terima</th>
                <th class="text-secondary p-2">Dari</th>
                <th class="text-secondary p-2">Perihal</th>
                <th class="text-secondary p-2">Keterangan</th>
                <th class="text-secondary p-2">File Surat</th>
                <th class="text-secondary opacity-7">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $suratmasuk as $dp)
              <tr>
               <td> {{ $dp->no_surat }}</td>
               <td> {{ $dp->jenis_surat }}</td>
               <td>{{$dp->tgl_surat}}</td>
               <td>{{$dp->tgl_terima}}</td>
               <td>{{$dp->dari}}</td>
               <td>{{$dp->perihal}}</td>

              <td>{{$dp->keterangan}}</td>
              <td>
                <a href="file/{{ $dp->file_surat }}"><button class="btn btn-success" type="button">Download</button></a>
                {{-- {{$dp->file_surat}} --}}
                </td>
              <td>
                <button onclick="window.location='{{ url('surat_masuk/'.$dp->no_surat) }}'" type="button" class="btn btn-sm btn-info" title="Edit Data">
                    <i class="fas fa-edit"></i>
                </button>
                  <form onsubmit="return deleteData('{{ $dp->dari }}')" style="display: inline" method="POST" action="{{ url('surat_masuk/'.$dp->no_surat) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button>
                    {{-- <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"></a> --}}
                    {{-- <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm "><i class="fas fa-trash"></i></button> --}}
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
@endsection
