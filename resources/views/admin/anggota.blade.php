<x-app-layout>
    <div class="anggota">
        <p class="judul">Daftar Anggota</p><br>
        <div class="daftar">
          <button 
            type="button" 
            class="btn tambah" 
            data-bs-toggle="modal" 
            data-bs-target="#tambah"
            >
            Tambah Anggota
          </button>
          <br><br>
          <table class="table table-bordered">
            <tr class="header">
              <td>NAMA ANGGOTA</td>
              <td>ALAMAT</td>
              <td width="300px"></td>
            </tr>
    
            <tr class="content">
              <td >Ahmad Rafif Alaudin</td>
              <td >Jalam Anggraini RT 08/RW 02</td>
              <td>
                <form>
                  <button 
                    type="button" 
                    class="btn btn-warning" 
                    data-bs-toggle="modal" 
                    data-bs-target="#detail"
                    >
                    DETAILS
                  </button>&emsp;
                  <button 
                    type="button" 
                    class="btn edit" 
                    data-bs-toggle="modal" 
                    data-bs-target="#edit"
                    >
                    EDIT
                  </button>&emsp;
                  <button class="btn btn-danger">DELETE</button>
                </form>
              </td>
            </tr>
          </table>

    
      <!-- Modal  -->
      <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body detail-m">
              <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
              <h5 class="modal-title judul" id="exampleModalLabel">DETAILS</h5><br>
              <img class="profil" src="../img/profile.jpg">
              <P class="detail">&emsp; Nama 
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; 
                Akhmadheta Hafid </P>
              <P class="detail">&emsp; Alamat 
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 
                Jalan Anggraini RT 08/RW 02 </P>
              <P class="detail">&emsp; No Whatsapp 
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 
                082230980990 </P>
              <P class="detail">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; 
                Tanggal Bergabung 
                &emsp;&emsp;&emsp;&emsp;&emsp; 
                15 Maret 2019 </P>
              <button class="btn btn-oke">OKE</button>
            </div>
          </div>
        </div>
      </div>
    
      <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body edit-m">
              <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
              <h5 class="modal-title judul" id="exampleModalLabel">EDIT PROFILE</h5><br>
              <img class="profil" src="../img/profile.jpg">
              <div class="mb-3 row">
                <label for="inputName" class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputName" placeholder="Akhmadheta Hafid">
                </div>
              </div>   
              
              <div class="mb-3 row">
                <label for="inputAddress" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputAddress" placeholder="Jalan Anggraini RT 08/RW 02">
                </div>
              </div> 
    
              <div class="mb-3 row">
                <label for="inputNo" class="col-sm-4 col-form-label">No Whatsapp</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="inputNo" placeholder="082230980990">
                </div>
              </div>
    
              <div class="mb-3 row last">
                <label for="inputDate" class="col-sm-4 col-form-label">Tanggal Bergabung</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputDate" placeholder="15 Maret 2019">
                </div>
              </div>
              <button class="btn btn-save">SAVE</button>
            </div>
          </div>
        </div>
      </div>
    
      <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true" data-bs-backdrop="false" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-body tambah-m">
              <button type="button" class="btn-close ext" data-bs-dismiss="modal" aria-label="Close"></button>
              <h5 class="modal-title judul" id="exampleModalLabel">TAMBAH ANGGOTA</h5><br>
              <div class="mb-3 row">
                <label for="inputFile" class="col-sm-4 col-form-label">Profile</label>
                <div class="col-sm-8">
                  <input class="form-control" type="file" id="formFile">
                </div>
              </div> 
    
              <div class="mb-3 row">
                <label for="inputName" class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputName">
                </div>
              </div>   
              
              <div class="mb-3 row">
                <label for="inputAddress" class="col-sm-4 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputAddress">
                </div>
              </div> 
    
              <div class="mb-3 row">
                <label for="inputNo" class="col-sm-4 col-form-label">No Whatsapp</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="inputNo">
                </div>
              </div>
    
              <div class="mb-3 row">
                <label for="inputDate" class="col-sm-4 col-form-label">Tanggal Bergabung</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputDate">
                </div>
              </div>
              <button class="btn btn-add">TAMBAH</button>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>