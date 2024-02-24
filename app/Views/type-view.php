<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
<script src="<?= base_url("public") ?>/js/color-modes.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type View</title>
    <link href="<?= base_url(
        "public"
    ) ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url("public") ?>/css/mystyle.css" rel="stylesheet">

    <style>
        .container {
            box-sizing: border-box;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
      .tableFixHead          { overflow: auto; height: 100px; }
.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }
    </style>
</head>
<body>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed top-0 end-0 mt-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" onclick="clearAll()">
          Clear All
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" onclick="sendToDB()">
          Send To DB
          </button>
        </li>
      </ul>
      
    
    </div>

    
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check" viewBox="0 0 16 16">
        <title>Check</title>
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
    </svg>

<div class="container max-vh-100 pt-3">
  <div class="row ">
    <div class="col-12 col-md-10 m-auto ">
      <div class="mb-3 overflow-auto tableFixHead" style="height: 37vh; max-height: 37vh !important;">
              <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">BIB</th>
                    <th scope="col">TIME</th>
                    <th scope="col">Lap(s)</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
                </table>
            </div>
</div>
</div>

        <div class="row mb-3 h-50">
            <div class="col-12 col-md-10 m-auto ">
              
      <div class="display text-center">0</div>
                <div class="calc m-auto fw-bold text-white d-flex justify-content-center align-items-bottom" id="keypad-container">

                <!-- <div class="d-flex align-items-center justify-content-between mb-1 keys-row first-keys-row text-white flex-column keypad-new" id="keypad-new">
                        <div class="key show-display">10</div>
                        </div>  -->
                  
                    <div class="keypad ">

                        <div class="d-flex align-items-center justify-content-between mb-1 keys-row first-keys-row">
                        <div class="key clear-all ">AC</div>
                        <div class="key clear-last ">DEL</div>
                        
                        <div class="key add" data-bs-toggle="modal" data-bs-target="#exampleModal" >+</div>
                        
                        <div class="key show-display">10</div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-1 keys-row second-keys-row">
                        <div class="key show-display">7</div>
                        <div class="key show-display">8</div>
                        <div class="key show-display">9</div>
                        <div class="key show-display">21</div>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between mb-1 keys-row third-keys-row">
                        <div class="key show-display">4</div>
                        <div class="key show-display">5</div>
                        <div class="key show-display">6</div>
                        <div class="key show-display">50</div>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between mb-1 keys-row fourth-keys-row">
                        <div class="key show-display">1</div>
                        <div class="key show-display">2</div>
                        <div class="key show-display">3</div>
                        <div class="key show-display">00</div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-1 keys-row">
                        <div class="key show-display">0</div>
                        <div class="key calculate ">ENTER</div>
                        </div>

                    </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">
            Tambah Shortcut
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input class="form-control form-control-lg" id="shortcut-baru" type="text" placeholder="30" aria-label="30" >

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="tambah">Tambah</button>
      </div>
    </div>
  </div>
</div>

    <script src="<?= base_url("public") ?>/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->
    <script src="<?= base_url("public") ?>/js/myscript.js"></script>
    <script>
        document.getElementById('tambah').addEventListener('click', function (e) {
            let shortCutNew = document.getElementById('shortcut-baru').value
            if(shortCutNew == ''){
                alert('isi shortcut baru terlebih dahulu')
                return;
            }

            let keypadNew = document.getElementById('keypad-new')
            var keypadContainer = document.getElementById('keypad-container');
            
            if(keypadNew == null){
                // Buat elemen baru (misalnya, <p>) untuk ditambahkan
                let newElement = document.createElement('div');

                // atau menggunakan metode classList
                newElement.classList.add('d-flex', 'align-items-center' ,'justify-content-between', 'mb-1' ,'keys-row', 'first-keys-row', 'text-white' ,'flex-column', 'keypad-new');
                newElement.id = 'keypad-new'

                let innerDivElement = document.createElement('div');
                innerDivElement.classList.add('key', 'show-display'); // Gantilah dengan nama kelas yang diinginkan
                innerDivElement.addEventListener('click', showDisplay)

                // Tambahkan konten atau atribut ke elemen baru jika diperlukan
                innerDivElement.textContent = shortCutNew;

                // Masukkan elemen div di dalam elemen baru
                newElement.appendChild(innerDivElement);
                
                // Ambil anak pertama dari elemen div
                let firstChild = keypadContainer.firstChild;

                // Masukkan elemen baru sebelum anak pertama
                keypadContainer.insertBefore(newElement, firstChild);
            } else {
                let newElement = document.createElement('div');

                // atau menggunakan metode classList
                newElement.classList.add('key', 'show-display');


                // Tambahkan konten atau atribut ke elemen baru jika diperlukan
                newElement.textContent = shortCutNew;

                // Masukkan elemen div di dalam elemen baru
                keypadNew.appendChild(newElement)
                
            }

        })
        
     document.querySelector('.display').addEventListener('change', function() {
        // Handler untuk perubahan pada elemen div.display
        // Misalnya, Anda dapat melakukan sesuatu di sini ketika isi dari elemen div.display berubah
        console.log('Content Changed:', this.innerText);
      });
    </script>
</body>
</html>