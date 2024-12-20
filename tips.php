<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Tips - Tips Feed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <!-- Navigation -->
  <?php include('includes/navbar.php');?>

  <!-- Hero Section -->
  <div class="hero-section text-center text-white">
    <div class="container">
    <h1 class="display-4 fw-bold mb-4"></h1>
      <h1 class="display-4 fw-bold mb-4">Tips Feed</h1>
      <p class="lead mb-4">Explore tips submitted by others to promote sustainability.</p>
    </div>
  </div>

    <div class="container my-5">
        <!-- Tips Section -->
        <div class="row">
            <!-- Tip 1 -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Use Reusable Bags</h5>
                        <p class="card-text">Switch to reusable bags for shopping to reduce plastic waste.</p>
                        <p class="card-text"><small class="text-muted">Posted on: 2024-12-18</small></p>
                        <button class="btn btn-outline-success btn-sm" disabled>👍 Like</button>
                    </div>
                </div>
            </div>

            <!-- Tip 2 -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Save Electricity</h5>
                        <p class="card-text">Turn off lights and unplug devices when not in use.</p>
                        <p class="card-text"><small class="text-muted">Posted on: 2024-12-17</small></p>
                        <button class="btn btn-outline-success btn-sm" disabled>👍 Like</button>
                    </div>
                </div>
            </div>

            <!-- Tip 3 -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Start Composting</h5>
                        <p class="card-text">Compost food scraps and yard waste to enrich soil and reduce landfill waste.</p>
                        <p class="card-text"><small class="text-muted">Posted on: 2024-12-16</small></p>
                        <button class="btn btn-outline-success btn-sm" disabled>👍 Like</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
