<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | Day Planet</title>
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
      <h1 class="display-4 fw-bold mb-4">Make Every Day Count for Sustainability</h1>
      <p class="lead mb-4">Join a global community taking daily actions towards the UN Sustainable Development Goals</p>
    </div>
  </div>

  <div class="container">
    <!-- Featured SDGs -->
    <?php include('sdg.html');?>

    <!-- Recent Posts -->
  

    <div class="content-section">
      <h3 class="section-title">Recent Posts</h3>
      <div class="row g-4">

      <?php

        include('includes/connection.php');
        $query = "SELECT * FROM posts ORDER BY(`posted_date`) DESC LIMIT 10;";

        $conn = connectDatabase();
        $result = $conn->query($query);
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["post_id"];
                $title = $row["title"];
                $body = $row["body"];
                $cover = $row["cover_image"];
                $sdg = $row["sdg_goal"];
                $date = $row["posted_date"];

                echo('
                <div class="col-md-4">
                  <div class="post-card">
                    <img src="upload/post/'.$cover.'" class="card-img-top">
                    <div class="card-body">
                      <div class="card-meta">
                        <span class="badge mt-2">'.$sdg.'</span>
                        <span class="text-muted">'.$date.'</span>
                      </div>
                      <h5 class="card-title fw-bold mb-3">'.$title.'</h5>
                      <p class="card-text fs-6 text-dark mb-4">'.$body.'</p>
                      <div class="d-flex gap-3">
                        <button class="action-button heart-button">
                          <i class="bi bi-heart-fill"></i>
                          <span>24</span>
                        </button>
                        <button class="action-button comment-button">
                          <i class="bi bi-chat-fill"></i>
                          <span>5</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>');
            }
        }
    
        $conn->close();
      ?>
        
        <!-- Repeat similar structure for other posts -->
      </div>
    </div>

    <!-- Achievement Badges -->
    <div class="content-section">
      <h3 class="section-title">Top Achievements</h3>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="achievement-badge">
            <i class="bi bi-tree-fill badge-icon"></i>
            <h5>Earth Guardian</h5>
            <p class="text-muted mb-0">Plant 100 trees</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="achievement-badge">
            <i class="bi bi-droplet-fill badge-icon"></i>
            <h5>Water Savior</h5>
            <p class="text-muted mb-0">Save 1000L of water</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="achievement-badge">
            <i class="bi bi-sun-fill badge-icon"></i>
            <h5>Solar Pioneer</h5>
            <p class="text-muted mb-0">Install solar panels</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include('includes/footer.php');?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>