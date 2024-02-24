<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
      <script src="<?= base_url('public'); ?>/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Rikza">
    <title>IDLaps - Timing</title>
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"> -->

    <link href="<?= base_url('public'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <?= $this->renderSection('css'); ?>
  </head>
  <body>

        <nav class="navbar sticky-top bg-body-tertiary">
            <div class="container-fluid">
                <div class="navbar-collapse" id="navbarNav">
                    <div class="row justify-content-center">
                            <div class="col-12 col-md-8 ">
                    <ul class="nav justify-content-between align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url() .$back ?>" id="back">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"  fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                    </svg>
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-3 disabled text-primary" href="#"><?= $title; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url().$next ?>" 
                        id="next">
                        <?php if($next == 'race-timing'): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-play-btn" viewBox="0 0 16 16">
  <path d="M6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814z"/>
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
</svg>
<?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"  fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                    </svg>
                <?php endif; ?>
                </a>
                    </li>
                    </ul>
                </div>
                    </div>
                </div>
                
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 pt-5">
                    
                <?= $this->renderSection('content'); ?>

                </div>
            </div>
        </div>

<script src="<?= base_url('public'); ?>/js/bootstrap.bundle.min.js"></script>

<?= $this->renderSection('js'); ?>
    </body>
</html>