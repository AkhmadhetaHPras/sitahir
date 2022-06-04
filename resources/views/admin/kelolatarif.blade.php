<x-app-layout>
    <div class="container">

        <h5 class="mb-3 ps-0 pt-4">
          <span class="border-3 border-bottom border-primary">Daftar Tarif</span>
        </h5>
    
        <!-- botton + modal tambah tarif -->
    
    
        <!-- Button trigger modal -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-5">
          <button type="button" class="btn btn-success float-end" data-bs-toggle="modal"
            data-bs-target="#tambahTarifModal">
            Tambah Tarif
          </button>
        </div>
    
        <!-- Modal Tambah Tarif-->
        <div class="modal fade" id="tambahTarifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
          data-bs-backdrop="false">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tarif Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
    
              <div class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="addKubikAir" class="form-label">Kubik Air</label>
                    <input type="number" class="form-control" id="addKubikAir">
                  </div>
                  <div class="mb-3">
                    <label for="addTarif" class="form-label">Tarif (Rp)</label>
                    <input type="number" class="form-control" id="addTarif" placeholder="contoh : 15000">
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
          <table class="table table-hover tb-tarif">
            <thead class="thead-dark thead-tb-tarif">
              <tr>
                <th scope="col">KUBIK AIR</th>
                <th scope="col">TARIF (RP)</th>
                <th scope="col">AKSI</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>0</td>
                <td>5000</td>
                <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTarifModal">
                    EDIT
                  </button>
                  <button class="btn btn-danger" type="button">HAPUS</button>
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>6000</td>
                <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTarifModal">
                    EDIT
                  </button>
                  <button class="btn btn-danger" type="button">HAPUS</button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>8000</td>
                <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTarifModal">
                    EDIT
                  </button>
                  <button class="btn btn-danger" type="button">HAPUS</button>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td>8500</td>
                <td>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTarifModal">
                    EDIT
                  </button>
                  <button class="btn btn-danger" type="button">HAPUS</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    
        <!------ Modal Edit Tarif  -->
        <div class="modal fade" id="editTarifModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
          data-bs-backdrop="false">
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
                    <input type="number" class="form-control" id="addKubikAir">
                  </div>
                  <div class="mb-3">
                    <label for="addTarif" class="form-label">Tarif (Rp)</label>
                    <input type="number" class="form-control" id="addTarif" placeholder="contoh : 15000">
                  </div>
                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-success mt-3"><b>SIMPAN</b></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!------ Modal Edit Tarif End -->
    
        <!-- Flex fot Table End -->
    
    
      </div>
</x-app-layout>