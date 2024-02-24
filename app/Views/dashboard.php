<?= $this->extend('template-race'); ?>

<?= $this->section('css'); ?>
<link rel="stylesheet" href="<?= base_url('public'); ?>/datatables/datatables.min.css">
<style>
     .big-checkbox {width: 24px; height: 24px;}
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <table id="example" class="table " style="width:100%">
                <thead >
                    <tr>
                        <th ><input class="form-check-input big-checkbox" type="checkbox" id="selectAll"></th>
                        <th>Kategori - Event</th>
                        <!-- <th>Rider</th> -->
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $kat): ?>
                    <tr>
                        <td><input class="form-check-input big-checkbox rowCheckbox" type="checkbox" data-id='<?= $kat['id']; ?>'></td>
                        <td><?= $kat['nama']; ?> - <?= $kat['event_nama']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
    </table>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="<?= base_url('public'); ?>/datatables/datatables.min.js" ></script>
<script>
    function setSessionData(data) {
        // AJAX request
        $.ajax({
            url: '<?= base_url(); ?>' + 'session/set-session', // Replace with your actual route
            type: 'POST',
            dataType: 'json',
            data: {kategori : data},
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function getCheckedRows() {
        let checkedRows = [];

        $('.rowCheckbox:checked').each(function() {
            let rowId = $(this).data('id');
            checkedRows.push(rowId);
        });

        return checkedRows;
    }

    
    $(document).ready(function() {
        setSessionData('');
        
        $('#next').on('click', function() {
            let checkedRows = getCheckedRows();
            setSessionData(checkedRows);
        });

        // Initialize DataTables
        let table = $('#example').DataTable({
            ordering: false,
            columnDefs: [{className : 'dt-head-center dt-body-center', targets : [0,1]}],
            paging: false,
            info: false
        });

        // Add event listener for "Select All" checkbox
        $('#selectAll').on('change', function() {
            $('.rowCheckbox').prop('checked', this.checked);
        });

        // Add event listener for row checkboxes
        $('#example tbody').on('change', '.rowCheckbox', function() {
            // If all checkboxes are checked, set "Select All" checkbox to checked
            $('#selectAll').prop('checked', $('.rowCheckbox:checked').length === table.rows().count());
        });

  
    });
</script>
<?= $this->endSection(); ?>
