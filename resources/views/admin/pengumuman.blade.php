<x-app-layout>
  <div class="container-fluid pengumuman">
    <div class="row">
      <h5 class="buku-air-title mb-3 ps-0">
        <span class="border-3 border-bottom border-primary">Pengumuman</span>
      </h5>
      @if(Auth::user()->hasRole('admin'))
      <button type="button" class="btn tambah mb-3 mt-4 col-md-3 col-sm-4 col-12" data-bs-toggle="modal" data-bs-target="#tambahpengumuman">
        Tambah Pengumuman
      </button>
      @endif
      <br><br>
      <table class="table table-bordered">
        <tr class="header">
          <td>JUDUL</td>
          <td>FILE</td>
          <td width="400px">AKSI</td>
        </tr>
        @foreach ($paginate as $pg)
       
        <tr class="content">
          <td>{{ $pg ->judul }}</td>
          <td><a href='#'>{{ $pg ->file }}</a></td>
          <td>
            <form class="text-start" action="{{ route('pengumuman.destroy', $pg->id) }}" method="POST">
              <button type="button" class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#detailpengumuman{{$pg->id}}">
                DETAIL
              </button>
              <button type="button" class="btn edit me-1" data-bs-toggle="modal" data-bs-target="#editpengumuman{{$pg->id}}">
                EDIT
              </button>
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">HAPUS</button>
              
            </form>
          </td>
        </tr>
        <div class="modal fade" id="detailpengumuman{{$pg->id}}" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body detail-m">
          <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
          <br>
          <h5 class="modal-title modal-judul" id="exampleModalLabel">DETAIL PENGUMUMAN</h5><br>
          <h6 class="content-detail">JUDUL PENGUMUMAN</h6>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="judul" required value="{{$pg->judul}}" readonly>
          </div>
          <p class="detail-p">Surat Undangan Rapat 10 Juli</p>
          <h6 class="content-detail">ISI PENGUMUMAN</h6>
          <textarea class="form-control detail-p" rows="3" name="isi" required  readonly>{{$pg->isi}}</textarea>
          <br>
          <h6 class="content-detail">FILE</h6>
          <a class="detail-p" href="{{$pg->file}}">{{$pg->file}}</a>
        </div>
      </div>
    </div>
  </div>

  <form action="{{ route('pengumuman.update',$pg->id) }}" method="POST" id="formProfile" enctype="multipart/form-data">
      @csrf
      @method('PUT')
  <div class="modal fade" id="editpengumuman{{$pg->id}}" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body edit-m">
          <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
          <br>
          <h5 class="modal-title modal-judul" id="exampleModalLabel">EDIT PENGUMUMAN</h5><br>
          <h6 class="content-detail">JUDUL PENGUMUMAN</h6>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="judul" required value="{{$pg->judul}}">
          </div>
          <h6 class="content-detail">ISI PENGUMUMAN</h6>
          <textarea class="form-control detail-p" rows="3" name="isi" required >{{$pg->isi}}</textarea>
          <br>
          <h6 class="content-detail">FILE</h6>
          <a class="detail-p" href="{{$pg->file}}">{{$pg->file}}</a>
          <button class="btn btn-edit">EDIT</button>
          
          
        </div>
      </div>
    </div>
  </div>
  </form>
        @endforeach
      </table>
      {!! $paginate->links() !!}
    </div>
  </div>

  

  
  <div class="modal fade" id="tambahpengumuman" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body tambah-m">
          <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
          <br>
          <h5 class="modal-title modal-judul" id="exampleModalLabel">TAMBAH PENGUMUMAN</h5><br>
          <form action="{{ route('pengumuman.store') }}" method="post">
  @csrf
          <h6 class="content-detail">JUDUL PENGUMUMAN</h6>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="judul" required value="{{$pg->judul}}">
          </div>
          <br>
          <h6 class="content-detail">ISI PENGUMUAM</h6>
          <textarea class="form-control detail-p" rows="3" name="isi" required value="{{$pg->isi}}"></textarea>
          <br>
          <h6 class="content-detail">LINK FILE</h6>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="file" required value="{{$pg->file}}">
          </div>
          <button class="btn btn-edit">SIMPAN</button>
          
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>