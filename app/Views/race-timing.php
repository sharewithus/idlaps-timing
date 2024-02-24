<?= $this->extend('template-race'); ?>

<?= $this->section('css'); ?>
<script>
  
  function beep() {
    let snd = new Audio("data:audio/wav;base64,//   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rx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");  
    snd.play();
  }
</script>
<link rel="stylesheet" href="<?= base_url('public'); ?>/datatables/datatables.min.css">
<script>
   let timerInterval;
    let startTime;
    function startTimer() {
      // Clear any existing intervals to avoid multiple timers running simultaneously
      clearInterval(timerInterval);

      // Set the start time to the current time
      startTime = new Date();

      // Save the start time to localStorage
      localStorage.setItem('startTime', startTime.toISOString());

      // Start the timer
      timerInterval = setInterval(function () {
        updateTimerDisplay();
      }, 10); // Update every 10 milliseconds

      // Hide the "Start" button after it's pressed
      document.getElementById('startButton').style.display = 'none';
    }

    function resumeTimer() {
      // Clear any existing intervals to avoid multiple timers running simultaneously
      clearInterval(timerInterval);
      
      // Start the timer with the stored start time
      timerInterval = setInterval(function () {
        updateTimerDisplay();
      }, 10); // Update every 10 milliseconds
      
      
      // Hide the "Start" button after it's pressed
    }

    function updateTimerDisplay() {
      const currentTime = new Date();
      const elapsedMilliseconds = currentTime - startTime;

      const hours = Math.floor(elapsedMilliseconds / 3600000);
      const minutes = Math.floor((elapsedMilliseconds % 3600000) / 60000);
      const seconds = Math.floor((elapsedMilliseconds % 60000) / 1000);
      const milliseconds = Math.floor((elapsedMilliseconds % 1000) / 10); // Display only two digits

      const formattedTime = `${padNumber(hours)}:${padNumber(minutes)}:${padNumber(seconds)}.${padNumber(milliseconds, 2)}`;
      document.getElementById('timer').innerText = formattedTime;
    }

    function padNumber(number, length = 2) {
      return number.toString().padStart(length, '0');
    }

</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
    <!-- <div class="row justify-content-center">
      <div class="col-12 col-md-8">

      </div>
    </div> -->
    <div class="text-center mb-4">
    <h1 id="timer">00:00:00.00</h1>
      <button class="btn btn-primary" id="startButton" onclick="startTimer()">Start</button>
    </div>

    <div class="row" id="tap-container">
      <div class="col-4 col-md-3 col-xl-2">
      <a href="#" onclick="saveTime('unknwn')" class="text-decoration-none">
      <div class="card" >
        <div class="card-body">
          <h6 class="card-title text-center fw-bold" id="bib">Unknown <br> Racer</h6>
          <!-- <small class="card-link disabled text-decoration-none">Lap <span id="lap-ongoing">1</span> / <span id="lap-total">2</span></small>
          <small class="card-link disabled text-decoration-none" id="time">00:05:00.00</small> -->
        </div>
      </div>
      </a>
      </div>
    </div>

    <!-- <table id="example" class="table " style="width:100%">
                <thead >
                    <tr>
                        <th>BIB</th>
                        <th>Nama</th>
                        <th>Tim</th>
                        <th>Partisipasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
    </table> -->


        <nav class="navbar fixed-bottom bg-body-tertiary">
            <div class="container-fluid">
                <div class="navbar-collapse" id="navbarNav">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8 ">
                            <ul class="nav justify-content-between align-items-center">
                                <li class="nav-item dropup-center dropup" id="fastTapView">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false">
                                        Fast Tap View
                                    </a>
                                    <div class="dropdown-menu p-3">
                                    <table class="table" style="width:100%">
                                    <thead >
                                      <tr>
                                          <th>ID</th>
                                          <th>Waktu</th>
                                      </tr>
                                  </thead>
                                  <tbody id="resFastTapView">
                                      
                                  </tbody>
                                      
                                    </table>
                                   </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
<?= $this->endSection(); ?>

<?= $this->section('js'); ?>

<script src="<?= base_url('public'); ?>/datatables/datatables.min.js" ></script>
<script>
    $(document).ready(function() {
     // Check if start time is stored in localStorage
    const storedStartTime = localStorage.getItem('startTime');
    if (storedStartTime) {
      // If stored, set the start time and resume the timer
      // if(document.getElementById('startButton')){

        document.getElementById('startButton').style.display = 'none';
      // }
      startTime = new Date(storedStartTime);
      resumeTimer();
    }

    function saveData(data, newKey, newValue, storageName) {
      // Iterate through each item in the "data" array
      data.forEach(function (item) {
        // Add or update the new key-value pair inside each item
        item[newKey] = newValue;
      });

      // Save the updated data back to localStorage
      localStorage.setItem(storageName, JSON.stringify(data));
    }
    function getById(id, storageName) {
      var existingData = getData(storageName);
      return existingData.find(item => item.id === id);
    }

    function saveDataAndUpdate(data, storageName) {
      // Get existing data from localStorage or initialize an empty array
      var existingData = JSON.parse(localStorage.getItem(storageName)) || [];

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
      localStorage.setItem(storageName, JSON.stringify(existingData));
    }

    // Function to read data from localStorage
    function getData(storageName) {
      return JSON.parse(localStorage.getItem(storageName)) || [];
    }

    // Function to delete data from localStorage
    function deleteData(id, storageName) {
      // Get existing data from localStorage
      let existingData = JSON.parse(localStorage.getItem(storageName)) || [];

      // Filter out the data with the specified ID
      let newData = existingData.filter(item => item.id !== id);

      // Save the updated data back to localStorage
      localStorage.setItem(storageName, JSON.stringify(newData));
    }

    function editDataById(id, newData, storageName) {
      // Get existing data from localStorage
      var existingData = JSON.parse(localStorage.getItem(storageName)) || [];

      // Find the index of the item with the specified ID
      var existingIndex = existingData.findIndex(item => item.id === id);

      if (existingIndex !== -1) {
        // Update existing data with new data
        existingData[existingIndex] = { ...existingData[existingIndex], ...newData };

        // Save the updated data back to localStorage
        localStorage.setItem(storageName, JSON.stringify(existingData));
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

    function countOccurrences(array, key, value) {
    return array.reduce((count, item) => {
        return count + (item[key] === value ? 1 : 0);
    }, 0);
    }

    window.saveTime = function (id, bib, kat_id, lap) {
        // let itemToUpdate = saveData(id.toString(), '')
        beep();
        let recordTime = new Date().toISOString();
        const timer = document.getElementById('timer').innerText;
        document.getElementById('time'+ id.toString()).innerText = timer;

        let dataArray = JSON.parse(localStorage.getItem('timing')) || [];

        // Create your object with the data you want to save
        let newData = {
            idRacer: id,
            bib: bib,
            time : recordTime,
            kat_id : kat_id
            // Add more properties as needed
        };

        // Push the new data object into the array
        dataArray.push(newData);
        
        // Save the updated array back to localStorage
        localStorage.setItem('timing', JSON.stringify(dataArray));

        setTimeout(() => {
         document.getElementById('time'+ id.toString()).innerText = '';
        }, 2000);
        
        let lapOnGoing = countOccurrences(dataArray, 'idRacer', parseInt(id));

        // console.log(occurrences,lap)
        if(lap > 1) {
          document.getElementById('lap-ongoing'+ id.toString()).innerText = lapOnGoing;
        } else {
          document.getElementById('info'+ id.toString()).innerText = 'Finished';
          setTimeout(() => {
            document.getElementById('card'+ id.toString()).style.display = 'none';
          }, 3000);
        }

        // Update data (change name)
        // if (itemToUpdate) {
        //     itemToUpdate.status = !itemToUpdate.status;
        //     saveDataAndUpdate(itemToUpdate);
            
        //     let retrievedData = getData('dataRiderSetup');
        //     table.clear().rows.add(retrievedData).draw();
        // }

    }


     // Initialize DataTables
    let retrievedData = getData('dataRiderSetup');
    const container = document.getElementById('tap-container');

    // Loop through the data array
    retrievedData.forEach(item => {
      // Create a new card element
      const card = document.createElement('div');
      card.classList.add('col-4', 'col-md-3', 'col-xl-2');

      // Create the card structure
      let konten = `<a href="#" onclick="saveTime(${item.id}, ${item.bib}, ${item.kategori_id}, ${item.lap})" id="card${item.id}" class="text-decoration-none">
          <div class="card">
            <div class="card-body">
              <h6 class="card-title text-center fw-bold" id="bib">${item.bib}</h6>`;

              if(item.lap == '1') {
                konten += `<small class="card-link disabled text-decoration-none" id="info${item.id}">Tap to Finished</small>`
              } else {
                konten += `<small class="card-link disabled text-decoration-none">Lap <span id="lap-ongoing${item.id}">1</span> / <span id="lap-total">${item.lap}</span></small>`
              }

              
              
              konten +=  `<small class="card-link disabled text-decoration-none" id="time${item.id}"></small>
              </div>
          </div>
        </a>`;
        card.innerHTML = konten;
      // Append the card to the container
      container.appendChild(card);
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
    let dropdown = document.getElementById("fastTapView");

    function calculateTimeGap(referenceTime) {
      let retrievedData = getData('timing');
      return retrievedData.map(obj => {
        const racerTime = new Date(obj.time);
        const gapInSeconds = (racerTime - referenceTime) / 1000; // Convert milliseconds to seconds
        return { ...obj, gapInSeconds };
      });
    }

    dropdown.addEventListener('click', function () {
      let retrievedData = getData('timing');
      const tbody = document.getElementById('resFastTapView');
      tbody.innerHTML = '';
      const referenceTime = localStorage.getItem('startTime');
      const parsedReferenceTime = new Date(referenceTime);

      // Calculate time gaps
      const dataWithTimeGaps = calculateTimeGap(parsedReferenceTime);

      // Loop through the array of objects with time gaps
      dataWithTimeGaps.forEach(obj => {
          // Create a new table row
          const tableRow = document.createElement('tr');

          // Create table cells
          const idRacerCell = document.createElement('td');
          idRacerCell.textContent = obj.idRacer;
          tableRow.appendChild(idRacerCell);

          // const timeCell = document.createElement('td');
          // timeCell.textContent = obj.time;
          // tableRow.appendChild(timeCell);

          const timeGapCell = document.createElement('td');
          timeGapCell.textContent = `${obj.gapInSeconds} seconds`;
          tableRow.appendChild(timeGapCell);

          // Append the table row to the table body
          tbody.appendChild(tableRow);
        });
      
    
    });
  });
</script>

<?= $this->endSection(); ?>
