<!doctype html>
<html lang="en">

<head>
     <title><?= esc(ucfirst($page)) ?></title>
     <!-- Required meta tags -->
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

     <!-- Bootstrap CSS v5.2.1 -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
     <div class="container">
          <div class="row">
               <h1><?= esc(ucfirst($page)) ?></h1>
               <?php foreach ($images as $img) { ?>
                    <div class="col-md-4 my-3">
                         <div class="card">
                              <img height="250" width="300" class="card-img-top " src="<?= base_url($img['path']) ?>" alt="Uploaded Image" />
                              <!-- <img class="card-img-top" src="<?= base_url('uploads/image/dice-1502706_640.jpg') ?>" alt="Uploaded Image" /> -->
                              <div class="card-body">
                                   <h4 class="card-title"><?= esc($img['name']) ?></h4>
                                   <p class="card-text"><?= esc($img['type']) ?></p>
                              </div>
                         </div>
                    </div>
               <?php } ?>
          </div>

     </div>
     <!-- Bootstrap JavaScript Libraries -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>