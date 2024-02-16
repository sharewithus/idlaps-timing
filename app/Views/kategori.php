<?= $this->extend('default'); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('public'); ?>/datatables/datatables.min.css">
<link rel="stylesheet" href="<?= base_url('public'); ?>/select2/css/select2.min.css">

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="display-6 text-center mb-4"><?= $title; ?></h2>
<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
  <button class="btn btn-primary me-md-2 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambahKategori"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg></button>
</div>
      <table id="table-kategori" class="table text-center table-striped responsive nowrap">
        <thead >
          <tr>
            <th style="width: 20%;">Nama</th>
            <th style="width: 20%;">Event</th>
            <th style="width: 15%;">Start</th>
            <th style="width: 15%;">End</th>
            <th style="width: 15%;">Status</th>
            <th style="width: 15%;">Aksi </th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

<!-- Modal -->
<div class="modal fade" id="modal-tambahKategori" tabindex="-1" aria-labelledby="modal-tambahKategoriLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#" id="formModal-tambahKategori">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-tambahKategoriLabel">Tambah <?= $title; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="nama" placeholder="Kategori MTB" required name="nama" >
          <label for="nama" >Nama Kategori</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="event" name="event_id" aria-label="Pilih Event" required>
            <option selected value="">Pilih Event</option>
            <?php foreach ($events as $event ) : ?>
              <option value="<?= $event['id']; ?>"><?= $event['nama']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="event">Event</label>
        </div>

        <!-- <div class="mb-3 row align-items-center">
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
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" id="btnSubmit-tambahKategori">Tambah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Add a modal for editing -->
<div class="modal fade" id="modal-editKategori" tabindex="-1"  aria-labelledby="modal-editKategoriLabel" aria-hidden="true">
   <div class="modal-dialog" >
   <form id="form-editKategori" action="#">
      <div class="modal-content">
         <div class="modal-header">
         <h1 class="modal-title fs-5" id="modal-editKategoriLabel">Edit <?= $title; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="editNama" placeholder="Kategori MTB" required name="nama" >
          <label for="nama" >Nama Kategori</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="editEvent" name="event_id" aria-label="Pilih Event" required>
            <option selected value="">Pilih Event</option>
            <?php foreach ($events as $event ) : ?>
              <option value="<?= $event['id']; ?>"><?= $event['nama']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="event">Event</label>
        </div>

        <!-- <div class="mb-3 row align-items-center">
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
        </div> -->
      </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" id="btnSubmit-editKategori">Edit</button>
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


        $('#formModal-tambahKategori').submit(function (e) {

            e.preventDefault();
            if ($('#nama').val() === '' || $('#event_id').val() === '' ) {
                alert('Tolong isi nama atau pilih event');
                return;
            }
            const formData = new FormData(this);
            
            $.ajax({
                url: '<?= base_url('kategori') ?>',
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
                    $('#modal-tambahKategori').modal('hide');
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

        
        
        let dataTableKategori = $('#table-kategori').DataTable({
            ajax: {
                url: '<?= base_url('kategori/new') ?>',
                type: 'GET',
            },
            columnDefs: [
                // Center align the header content of column 1
              { className: "dt-head-center", targets: [ 0, 1,2,3,4,5 ] }],
            responsive: true,
           
            columns: [
                { data: 'nama' },
                { data: 'event_nama' },
                // { data: 'jenis_kelamin' },
                { 
                  data: 'start_race',
                  render: function (data, type, row) {
                    return data === null ? 'N/A' : data
                  }
                },
                { 
                  data: 'end_race',
                  render: function (data, type, row) {
                    return data === null ? 'N/A' : data
                  }
                },
                { 
                  data: 'status',
                  render : function (data, type, row) {
                    return data === '1' ? '<span class="badge rounded-pill text-bg-success">RUN</span>' : '<span class="badge rounded-pill text-bg-danger">STOP</span>';
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
            order: [[4, 'asc']]

        });
        function refreshTable() {
          dataTableKategori.ajax.reload();
        } 

        window.editRow = function (event, id) {
          event.preventDefault()
          let hiddenInput = $('<input type="hidden" id="event_id" value="'+ id +'">');
          $('#form-editKategori').append(hiddenInput);

          $.ajax({
            url: '<?= base_url('kategori') ?>/' + id,
            method: 'GET',
            success: function (response) {

               if (response.status === 'success') {
                  // Populate modal fields with data for editing
                  $('#editNama').val(response.data.nama);
                  $('#editEvent').val(response.data.event_id);
                  // if(response.data.jenis_kelamin == 'Pria'){
                  //   $('#editPria').attr('checked', true);
                  // } else {
                  //   $('#editWanita').attr('checked', true);

                  // }

                  // Open the edit modal
                  $('#modal-editKategori').modal('show');  
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
          if (confirm('Apakah anda yakin ingin menghapus kategori ini?')) {
                  $.ajax({
                      url: '<?= base_url('kategori') ?>/' + id,
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
        
        $('#form-editKategori').submit(function (e) {

          e.preventDefault();
          if ($('#editNama').val() === '') {
                alert('Tolong isi nama kategori');
                return;
            }

          let id = $('#event_id').val()
          // const updateData = new FormData(this)
          let updateData = $(this).serialize(); // Use serialize() or serializeArray()
        // Or if data is in JSON format:
        // var updateData = JSON.stringify($(this).serializeArray());
         $.ajax({
            url: '<?= base_url('kategori') ?>/' + id + '/edit',
            method: 'GET', // Use 'PUT' method for updating
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data: updateData,
            success: function (response) {

               if (response.status === 'success') {
                  // Refresh DataTable after successful update
                  refreshTable();
                    $('#modal-editKategori').modal('hide');
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
