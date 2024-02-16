<?= $this->extend('default'); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('public'); ?>/datatables/datatables.min.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<h2 class="display-6 text-center mb-4"><?= $title; ?></h2>
<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
  <button class="btn btn-primary me-md-2 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#modal-tambahEvent"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg></button>
</div>
      <table id="table-event" class="table text-center table-striped responsive nowrap">
        <thead >
          <tr>
            <th style="width: 40%;">Nama</th>
            <th style="width: 20%;">Lokasi</th>
            <th style="width: 20%;">Tanggal</th>
            <th style="width: 20%;">Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

<!-- Modal -->
<div class="modal fade" id="modal-tambahEvent" tabindex="-1" aria-labelledby="modal-tambahEventLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="#" id="formModal-tambahEvent">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modal-tambahEventLabel">Tambah <?= $title; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="nama" placeholder="Event MTB" required name="nama" >
          <label for="nama" >Nama Event</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="DKI Jakarta">
          <label for="lokasi">Lokasi</label>
        </div>
        <div class="form-floating">
          <input type="datetime-local" name="waktu" class="form-control" id="waktu" placeholder="Senin, 20 Januari 2024 10:00:00" min="<?=date('Y-m-d\Th:i')?>" >
          <label for="waktu">Waktu Pelaksanaan</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary" id="btnSubmit-tambahEvent">Tambah</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- Add a modal for editing -->
<div class="modal fade" id="modal-editEvent" tabindex="-1"  aria-labelledby="modal-editEventLabel" aria-hidden="true">
   <div class="modal-dialog" >
   <form id="form-editEvent" action="#">
      <div class="modal-content">
         <div class="modal-header">
         <h1 class="modal-title fs-5" id="modal-editEventLabel">Edit <?= $title; ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <!-- Form for editing data -->
           
               <!-- Add input fields for editing data -->
               <div class="form-floating mb-3">
                <input type="text" class="form-control" id="editNama" placeholder="Event MTB" required name="nama" >
                <label for="editNama" >Nama Event</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="lokasi" class="form-control" id="editLokasi" placeholder="DKI Jakarta">
                <label for="editLokasi">Lokasi</label>
              </div>
              <div class="form-floating">
                <input type="datetime-local" name="waktu" class="form-control" id="editWaktu" placeholder="Senin, 20 Januari 2024 10:00:00" min="<?=date('Y-m-d\Th:i')?>" >
                <label for="editWaktu">Waktu Pelaksanaan</label>
              </div>
            
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary" id="btnSubmit-editEvent">Edit</button>
        </div>
      </div>
      </form>
   </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('js'); ?>
<script src="<?= base_url('public'); ?>/datatables/datatables.min.js" ></script>
<script>
    $(document).ready(function () {
        $('#formModal-tambahEvent').submit(function (e) {

            e.preventDefault();
            if ($('#nama').val() === '') {
                alert('Tolong isi nama event');
                return;
            }
            const formData = new FormData(this);
            
            $.ajax({
                url: '<?= base_url('event') ?>',
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
                    $('#modal-tambahEvent').modal('hide');
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

        
        
        let dataTableEvent = $('#table-event').DataTable({
            ajax: {
                url: '<?= base_url('event/new') ?>',
                type: 'GET',
            },
            columnDefs: [
                // Center align the header content of column 1
              { className: "dt-head-center", targets: [ 0, 1,2,3 ] }],
            responsive: true,
            columns: [
                { data: 'nama' },
                { data: 'lokasi' },
                { data: 'waktu' },
                {
                  data: null,
                  render: function (data, type, row) {
                      return '<a class="btn btn-sm btn-primary" onclick="editRow(event,' + row.id + ')">Edit</a>' +
                        ' <button class="btn btn-sm btn-danger" onclick="deleteRow(' + row.id + ')">Hapus</button>';
                  },
                  orderable: false,
                },
            ],
            order: [['2', 'desc']]

        });
        function refreshTable() {
          dataTableEvent.ajax.reload();
        } 

        window.editRow = function (event, id) {
          event.preventDefault()
          let hiddenInput = $('<input type="hidden" id="event_id" value="'+ id +'">');
          $('#form-editEvent').append(hiddenInput);

          $.ajax({
            url: '<?= base_url('event') ?>/' + id,
            method: 'GET',
            success: function (response) {

               if (response.status === 'success') {
                  // Populate modal fields with data for editing
                  $('#editNama').val(response.data.nama);
                  $('#editLokasi').val(response.data.lokasi);
                  $('#editWaktu').val(response.data.waktu);

                  // Open the edit modal
                  $('#modal-editEvent').modal('show');  
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
          if (confirm('Apakah anda yakin ingin menghapus event ini?')) {
                  $.ajax({
                      url: '<?= base_url('event') ?>/' + id,
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
        
        $('#form-editEvent').submit(function (e) {

          e.preventDefault();
          if ($('#editNama').val() === '') {
                alert('Tolong isi nama event');
                return;
            }

          let id = $('#event_id').val()
          // const updateData = new FormData(this)
          let updateData = $(this).serialize(); // Use serialize() or serializeArray()
        // Or if data is in JSON format:
        // var updateData = JSON.stringify($(this).serializeArray());
         $.ajax({
            url: '<?= base_url('event') ?>/' + id + '/edit',
            method: 'GET', // Use 'PUT' method for updating
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            data: updateData,
            success: function (response) {

               if (response.status === 'success') {
                  // Refresh DataTable after successful update
                  refreshTable();
                    $('#modal-editEvent').modal('hide');
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
