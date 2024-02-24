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
                        <th>BIB</th>
                        <th>Nama</th>
                        <th>Tim</th>
                        <th>Partisipasi</th>
                        <th>Aksi</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
    </table>

        <!-- <nav class="navbar fixed-bottom bg-body-tertiary">
            <div class="container-fluid">
                <div class="navbar-collapse" id="navbarNav">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 ">
                            <ul class="nav justify-content-between align-items-center">
                                <li class="nav-item dropup-center dropup" id="dnsDropDown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false">
                                        DNS
                                    </a>
                                    <ul class="dropdown-menu ">
                                    <li class="dropdown-item">
                                        <input class="form-check-input me-1" type="radio" name="listGroupRadio" value="dns" id="dns" checked>
                                        <label class="form-check-label" for="dns">DNS</label>
                                    </li>
                                    
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav> -->
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script src="<?= base_url('public'); ?>/datatables/datatables.min.js" ></script>
<script>
    $(document).ready(function() {

    function saveData(data, newKey, newValue) {
      // Iterate through each item in the "data" array
      data.forEach(function (item) {
        // Add or update the new key-value pair inside each item
        item[newKey] = newValue;
      });

      // Save the updated data back to localStorage
      localStorage.setItem('dataRiderSetup', JSON.stringify(data));
    }
    function getById(id) {
      var existingData = getData();
      return existingData.find(item => item.id === id);
    }

    function saveDataAndUpdate(data) {
      // Get existing data from localStorage or initialize an empty array
      var existingData = JSON.parse(localStorage.getItem('dataRiderSetup')) || [];

      // Check if data with the same ID already exists
      var existingIndex = existingData.findIndex(item => item.id === data.id);

      if (existingIndex !== -1) {
        // Update existing data
        existingData[existingIndex] = data;
      } else {
        // Add new data
        existingData.push(data);
      }

      // Save the updated data back to localStorage
      localStorage.setItem('dataRiderSetup', JSON.stringify(existingData));
    }

    // Function to read data from localStorage
    function getData() {
      return JSON.parse(localStorage.getItem('dataRiderSetup')) || [];
    }

    // Function to delete data from localStorage
    function deleteData(id) {
      // Get existing data from localStorage
      let existingData = JSON.parse(localStorage.getItem('dataRiderSetup')) || [];

      // Filter out the data with the specified ID
      let newData = existingData.filter(item => item.id !== id);

      // Save the updated data back to localStorage
      localStorage.setItem('dataRiderSetup', JSON.stringify(newData));
    }

    function editDataById(id, newData) {
      // Get existing data from localStorage
      var existingData = JSON.parse(localStorage.getItem('dataRiderSetup')) || [];

      // Find the index of the item with the specified ID
      var existingIndex = existingData.findIndex(item => item.id === id);

      if (existingIndex !== -1) {
        // Update existing data with new data
        existingData[existingIndex] = { ...existingData[existingIndex], ...newData };

        // Save the updated data back to localStorage
        localStorage.setItem('dataRiderSetup', JSON.stringify(existingData));
      } else {
        console.error('Item with ID', id, 'not found.');
      }
    }
    let table = $('#example').DataTable({
        ordering: false,
        columnDefs: [{className : 'dt-head-center dt-body-center', targets : [0,1]}],
        paging: false,
        info: false,
        columns: [

                { data: 'bib' },
                { data: 'nama' },
                { data: 'tim' },
                { 
                  data:'kategori_nama'
                },
                {
                  data: null,
                  render: function (data, type, row) {
                      if(row.status) {
                          
                        return '<button class="btn btn-sm btn-danger me-1" onclick="DNSRow(' + row.id + ')">DNS</button>' +  '<span class="badge rounded-pill text-bg-danger">DNS</span>' ;
                          
                        }else{
                            return '<button class="btn btn-sm btn-danger" onclick="DNSRow(' + row.id + ')">DNS</button>';
                      }
                  },
                },
            ],
    });

    window.DNSRow = function (id) {
          let itemToUpdate = getById(id.toString())


        // Update data (change name)
        if (itemToUpdate) {
            itemToUpdate.status = !itemToUpdate.status;
            saveDataAndUpdate(itemToUpdate);
            
            let retrievedData = getData();
            table.clear().rows.add(retrievedData).draw();
        }

    }

    $('#next').on('click', function() {
        let checkedRows = getCheckedRows();
        setSessionData(checkedRows);
    });

     // Initialize DataTables
    

    $.ajax({
        url: '<?= base_url('rider/setup') ?>',
        method: 'GET',
        dataType: 'json',
        async: false,
        success: function (response) {
            // table.clear().draw();
            saveDataAndUpdate([])
            saveData(response.data, 'status', false);
            let retrievedData = getData();
            table.clear().rows.add(retrievedData).draw();
        },
        error: function (error) {
          console.error('Error fetching data:', error);
        }
      });


   

    


    // // Add event listener for "Select All" checkbox
    // $('#selectAll').on('change', function() {
    //     $('.rowCheckbox').prop('checked', this.checked);
    // });

    // // Add event listener for row checkboxes
    // $('#example tbody').on('change', '.rowCheckbox', function() {
    //     // If all checkboxes are checked, set "Select All" checkbox to checked
    //     $('#selectAll').prop('checked', $('.rowCheckbox:checked').length === table.rows().count());
    // });

    
    });
</script>

<!-- BOTTOM MENU -->
<!-- <script>
    let dropdown = document.getElementById("dnsDropDown");
    dropdown.addEventListener('click', function () {
        let radioButtons = document.getElementsByName("listGroupRadio");
        let rbCheck = '';
        for (let i = 0; i < radioButtons.length; i++) {
          if (radioButtons[i].checked) {
            rbCheck = radioButtons[i].value;
            break;
          }
        }

        let dropdownDNS = new bootstrap.Dropdown(document.getElementById('dnsDropDown'));

        // Check if the dropdownDNS is currently shown
        let isDropdownShown = dropdownDNS._menu.classList.contains('show');
        if(isDropdownShown && rbCheck === 'dns' ) {

        }


      });
     

      

        
</script> -->
<?= $this->endSection(); ?>
