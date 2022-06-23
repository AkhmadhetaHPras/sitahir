<x-app-layout>
  <div class="container-fluid tarif">
    <h5 class="buku-air-title mb-3 ps-0">
      <span class="border-3 border-bottom border-primary">Daftar Tarif</span>
    </h5>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{!! $message !!}</p>
    </div>
    @endif
    <!-- botton + modal tambah tarif -->

    <!-- Button trigger modal -->
    <div class="d-grid gap-2 d-md-flex mb-3 mt-4">
      @if(Auth::user()->hasRole('admin'))
      <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#tambahTarifModal">
        Tambah Tarif
      </button>
      @endif
    </div>

    <!-- Modal Tambah Tarif-->
    <div class="modal fade" id="tambahTarifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Tarif Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <form action="{{ route('tarif.store') }}" method="post">
              @csrf
              <div class="mb-3">
                <label for="addKubikAir" class="form-label">Kubik Air</label>
                <input type="number" class="form-control" id="addKubikAir" name="kubik">
              </div>
              <div class="mb-3">
                <label for="addTarif" class="form-label">Tarif (Rp)</label>
                <input type="number" class="form-control" id="addTarif" placeholder="contoh : 15000" name="tarif">
              </div>
              <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-success mt-3"><b>SIMPAN</b></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- boton + modal tambah tarif end -->


    <!-- Flex For Table -->
    <div class="table-responsive-sm">
      <table class="table  tb-tarif">
        <tr class="header">
          <th scope="col">KUBIK AIR</th>
          <th scope="col">TARIF (RP)</th>
          @if(Auth::user()->hasRole('admin'))
          <th scope="col">AKSI</th>
          @endif
        </tr>
        <tbody>

          @foreach ($paginate as $tr)
          <form action="{{ route('tarif.destroy', $tr->id) }}" method="POST">
            <tr class="content">
              <td>{{ $tr ->kubik }}</td>
              <td>Rp. {{ number_format($tr ->tarif) }}</td>
              @if(Auth::user()->hasRole('admin'))
              <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$tr->id}}">
                  EDIT
                </button>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" type="button">HAPUS</button>
              </td>
              @endif
            </tr>
          </form>

 <!------ Modal Edit Tarif  -->
 <form action="{{ route('tarif.update',$tr->id) }}" method="POST" id="formProfile" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="modal fade" id="edit{{$tr->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Tarif</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="addKubikAir" class="form-label">Kubik Air</label>
              <input type="number" class="form-control" id="addKubikAir" name="kubik" required value="{{$tr->kubik}}">
            </div>
            <div class="mb-3">
              <label for="addTarif" class="form-label">Tarif (Rp)</label>
              <input type="number" class="form-control" id="addTarif" name="tarif" placeholder="contoh : 15000" required value="{{$tr->tarif}}">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" class="btn btn-success mt-3"><b>SIMPAN</b></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</form>
<!------ Modal Edit Tarif End -->

          @endforeach
        </tbody>
      </table>
      {!! $paginate->links() !!}
    </div>

   

    <!-- Flex fot Table End -->


  </div>
</x-app-layout>