<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Day Planet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
      .card{
        margin-top:15px;
        margin-bottom:15px;
      }

      img.sdg-icon{
        width:100%;
      }
    </style>
  </head>
  <body>
    <?php include('includes/navbar.php');?>

    <div class="container" style="padding-top:20px;">

      <div class="row justify-content-center">

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-7 fw-bold text-start fs-6">Ann Jeffry</div>
                <div class="col-5 text-end fs-6">10/15/2024</div>
              </div>
            </div>
            <img src="https://i.pinimg.com/736x/77/52/7c/77527c4aeb5ba57e84185723e0500216.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
              <span class="badge text-bg-secondary">SDG 01</span>
              </li>
            </ul>
            <div class="card-footer">
            <select class="form-select form-select-sm" aria-label="Small select example">
              <option selected>Vote SDG</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-3">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-7 fw-bold text-start fs-6">Ann Jeffry</div>
                <div class="col-5 text-end fs-6">10/15/2024</div>
              </div>
            </div>
            <img src="https://i.pinimg.com/736x/77/52/7c/77527c4aeb5ba57e84185723e0500216.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
              <span class="badge text-bg-secondary">SDG 01</span>
              </li>
            </ul>
            <div class="card-footer">
            <h6>Your supported <span class="badge text-bg-secondary">SDG 12</span></h6>
            </div>
          </div>
        </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>