<?= $this->extend('default'); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('public'); ?>/datatables/datatables.min.css">
<link rel="stylesheet" href="<?= base_url('public'); ?>/select2/css/select2.min.css">

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="display-6 text-center mb-4"><?= $title; ?></h2>
<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
  <button class="btn btn-primary me-md-2 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambahRider"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg></button>
</div>
      <table id="table-rider" class="table text-center table-striped responsive nowrap">
        <thead >
          <tr>
            <th style="width: 15%;">BIB</th>
            <th style="width: 15%;">Nama</th>
            <th style="width: 15%;">Tim</th>
            <th style="width: 10%;">JK</th>
            <th style="width: 15%;">Asal</th>
            <th style="width: 15%;">Umur</th>
            <th style="width: 15%;">Aksi </th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

<!-- Modal -->
<div class="modal fade" id="modal-tambahRider" tabindex="-1" aria-labelledby="modal-tambahRiderLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#" id="formModal-tambahRider">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-tambahRiderLabel">Tambah <?= $title; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="bib" placeholder="BIB" required name="bib" >
          <label for="bib" >BIB</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="nama" placeholder="Rider MTB" required name="nama" >
          <label for="nama" >Nama Rider</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="tim" placeholder="Tim MTB"  name="tim" >
          <label for="tim" >Nama Tim</label>
        </div>
        <div class="mb-3 row align-items-center">
          <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-9">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="Pria" checked>
                <label class="form-check-label" for="pria">Pria</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="wanita" value="Wanita">
                <label class="form-check-label" for="wanita">Wanita</label>
              </div>  
          </div>
        </div>
        <div class="form-control mb-3">
         <label for="provinsi_asal">Provinsi</label>
          <select class=" select2" style="width:100%;" id="provinsi_asal" name="provinsi_asal" aria-label="Pilih Provinsi" >
          </select>
          
        </div>
        
        <div class="form-floating">
          <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" placeholder="Senin, 20 Januari 2024"  >
          <label for="tanggal_lahir">Tanggal Lahir</label>
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" id="btnSubmit-tambahRider">Tambah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Add a modal for editing -->
<div class="modal fade" id="modal-editRider" tabindex="-1"  aria-labelledby="modal-editRiderLabel" aria-hidden="true">
   <div class="modal-dialog" >
   <form id="form-editRider" action="#">
      <div class="modal-content">
         <div class="modal-header">
         <h1 class="modal-title fs-5" id="modal-editRiderLabel">Edit <?= $title; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="editBib" placeholder="BIB" required name="bib" >
          <label for="bib" >BIB</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="editNama" placeholder="Rider MTB" required name="nama" >
          <label for="nama" >Nama Rider</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="editTim" placeholder="Tim MTB"  name="tim" >
          <label for="tim" >Nama Tim</label>
        </div>
        <div class="mb-3 row align-items-center">
          <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-9">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="editPria" value="Pria" checked>
                <label class="form-check-label" for="pria">Pria</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="editWanita" value="Wanita">
                <label class="form-check-label" for="wanita">Wanita</label>
              </div>  
          </div>
        </div>
        <div class="form-control mb-3">
         <label for="provinsi_asal">Provinsi</label>
          <select class=" select2" style="width:100%;" id="editProvinsi_asal" name="provinsi_asal" aria-label="Pilih Provinsi" >
          </select>
          
        </div>
        
        <div class="form-floating">
          <input type="date" name="tanggal_lahir" class="form-control" id="editTanggal_lahir" placeholder="Senin, 20 Januari 2024"  >
          <label for="tanggal_lahir">Tanggal Lahir</label>
        </div>

        
      </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" id="btnSubmit-editRider">Edit</button>
        </div>
      </div>
      </form>
   </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('js'); ?>
<script src="<?= base_url('public'); ?>/datatables/datatables.min.js" ></script>
<script src="<?= base_url('public'); ?>/select2/js/select2.min.js" ></script>
<script>
    $(document).ready(function () {
      const provinces = [{"id":"11","name":"ACEH"},{"id":"12","name":"SUMATERA UTARA"},{"id":"13","name":"SUMATERA BARAT"},{"id":"14","name":"RIAU"},{"id":"15","name":"JAMBI"},{"id":"16","name":"SUMATERA SELATAN"},{"id":"17","name":"BENGKULU"},{"id":"18","name":"LAMPUNG"},{"id":"19","name":"KEPULAUAN BANGKA BELITUNG"},{"id":"21","name":"KEPULAUAN RIAU"},{"id":"31","name":"DKI JAKARTA"},{"id":"32","name":"JAWA BARAT"},{"id":"33","name":"JAWA TENGAH"},{"id":"34","name":"DI YOGYAKARTA"},{"id":"35","name":"JAWA TIMUR"},{"id":"36","name":"BANTEN"},{"id":"51","name":"BALI"},{"id":"52","name":"NUSA TENGGARA BARAT"},{"id":"53","name":"NUSA TENGGARA TIMUR"},{"id":"61","name":"KALIMANTAN BARAT"},{"id":"62","name":"KALIMANTAN TENGAH"},{"id":"63","name":"KALIMANTAN SELATAN"},{"id":"64","name":"KALIMANTAN TIMUR"},{"id":"65","name":"KALIMANTAN UTARA"},{"id":"71","name":"SULAWESI UTARA"},{"id":"72","name":"SULAWESI TENGAH"},{"id":"73","name":"SULAWESI SELATAN"},{"id":"74","name":"SULAWESI TENGGARA"},{"id":"75","name":"GORONTALO"},{"id":"76","name":"SULAWESI BARAT"},{"id":"81","name":"MALUKU"},{"id":"82","name":"MALUKU UTARA"},{"id":"91","name":"PAPUA BARAT"},{"id":"94","name":"PAPUA"}];

      $('#provinsi_asal').select2({
        data: provinces.map(province => ({ id: province.name, text: province.name })),
        dropdownParent: $('#modal-tambahRider')
    });

      $('#editProvinsi_asal').select2({
        data: provinces.map(province => ({ id: province.name, text: province.name })),
        dropdownParent: $('#modal-editRider')
      });

        $('#formModal-tambahRider').submit(function (e) {

            e.preventDefault();
            if ($('#nama').val() === '' || $('#event_id').val() === '' ) {
                alert('Tolong isi nama atau pilih event');
                return;
            }
            const formData = new FormData(this);
            
            $.ajax({
                url: '<?= base_url('rider') ?>',
                method: 'POST',
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function (response) {

                    alert(response.message);
                    refreshTable();
                    $('#modal-tambahRider').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                },
                error: function (xhr, status, error) {
                    
                    console.error(xhr.responseJSON.message);
                    alert(xhr.responseJSON.message)
                    // Handle error response here
                }
            });
        });
        
        let dataTableRider = $('#table-rider').DataTable({
            ajax: {
                url: '<?= base_url('rider/new') ?>',
                type: 'GET',
            },
            columnDefs: [
                // Center align the header content of column 1
              { className: "dt-head-center", targets: [ 0, 1,2,3,4,5,6 ] }],
            responsive: true,
           
            columns: [
                { data: 'bib' },
                { data: 'nama' },
                { data: 'tim' },
                { data: 'jenis_kelamin',
                  render : function (data, type, row) {
                    return data === 'Pria' ? `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-standing" viewBox="0 0 16 16">
  <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M6 6.75v8.5a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2.75a.75.75 0 0 0 1.5 0v-2.5a.25.25 0 0 1 .5 0"/>
</svg>` : `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-standing-dress" viewBox="0 0 16 16">
  <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-.5 12.25V12h1v3.25a.75.75 0 0 0 1.5 0V12h1l-1-5v-.215a.285.285 0 0 1 .56-.078l.793 2.777a.711.711 0 1 0 1.364-.405l-1.065-3.461A3 3 0 0 0 8.784 3.5H7.216a3 3 0 0 0-2.868 2.118L3.283 9.079a.711.711 0 1 0 1.365.405l.793-2.777a.285.285 0 0 1 .56.078V7l-1 5h1v3.25a.75.75 0 0 0 1.5 0Z"/>
</svg>` 
                  }
                },
                { data: 'provinsi_asal' },
                
                { 
                  data: 'tanggal_lahir',
                  render : function (data, type, row) {
                    if (data === '0000-00-00') return 'N/A';

                    const birthDate = new Date(data);

                    // Calculate age
                    const currentDate = new Date();
                    const ageInMillis = currentDate - birthDate;

                    // Convert age from milliseconds to years
                    const ageInYears = Math.floor(ageInMillis / (365.25 * 24 * 60 * 60 * 1000));

                    return ageInYears;
                  }
                },
                {
                  data: null,
                  render: function (data, type, row) {
                      return '<a class="btn btn-sm btn-primary" onclick="editRow(event,' + row.id + ')">Edit</a>' +
                        ' <button class="btn btn-sm btn-danger" onclick="deleteRow(' + row.id + ')">Hapus</button>';
                  },
                  orderable: false,
                },
            ],
            order: [[5, 'asc']]

        });
        function refreshTable() {
          dataTableRider.ajax.reload();
        } 

        window.editRow = function (event, id) {
          event.preventDefault()
          let hiddenInput = $('<input type="hidden" id="rider_id" value="'+ id +'">');
          $('#form-editRider').append(hiddenInput);

          $.ajax({
            url: '<?= base_url('rider') ?>/' + id,
            method: 'GET',
            success: function (response) {

               if (response.status === 'success') {
                  // Populate modal fields with data for editing
                  $('#editBib').val(response.data.bib);
                  $('#editNama').val(response.data.nama);
                  if(response.data.jenis_kelamin == 'Pria'){
                    $('#editPria').attr('checked', true);
                  } else {
                    $('#editWanita').attr('checked', true);
                  }
                  
                  $('#editTim').val(response.data.tim);
                  $('#editTanggal_lahir').val(response.data.tanggal_lahir);
                  $('#editProvinsi_asal').val(response.data.provinsi_asal);
                  $('#editProvinsi_asal').trigger('change'); // Notify any JS components that the value changed

                  // Open the edit modal
                  $('#modal-editRider').modal('show');  
               } else {
                  // Handle error or display a message
                  alert(response.message);
               }
            },
            error: function (xhr, status, error) {
               console.error(xhr.responseText);
               // Handle error response here
            }
         });
        };

        window.deleteRow = function (id) {
          if (confirm('Apakah anda yakin ingin menghapus rider ini?')) {
                  $.ajax({
                      url: '<?= base_url('rider') ?>/' + id,
                      method: 'DELETE',
                      success: function (response) {

                          if (response.status === 'success') {
                              // Refresh DataTable after successful deletion
                              refreshTable();
                              
                          } else {
                              // Handle error or display a message
                              alert(response.message);
                          }
                      },
                      error: function (xhr, status, error) {
                          console.error(xhr.responseJson.message);
                          // Handle error response here
                      }
                  });
              }
        };
        
        $('#form-editRider').submit(function (e) {

          e.preventDefault();
          if ($('#editNama').val() === '') {
                alert('Tolong isi nama rider');
                return;
            }

          let id = $('#rider_id').val()
          // const updateData = new FormData(this)
          let updateData = $(this).serialize(); // Use serialize() or serializeArray()
        // Or if data is in JSON format:
        // var updateData = JSON.stringify($(this).serializeArray());
         $.ajax({
            url: '<?= base_url('rider') ?>/' + id + '/edit',
            method: 'GET', // Use 'PUT' method for updating
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data: updateData,
            success: function (response) {

               if (response.status === 'success') {
                  // Refresh DataTable after successful update
                  refreshTable();
                    $('#modal-editRider').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
               } else {
                  // Handle error or display a message
                  alert(response.message);
               }
            },
            error: function (xhr, status, error) {
               console.error(xhr.responseText);
               // Handle error response here
            }
         });
        })
    });
</script>
<?= $this->endSection(); ?>
