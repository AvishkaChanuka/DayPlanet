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
    <div class="content-section">
      <h3 class="section-title">Featured SDGs</h3>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="text-center">
            <i class="bi bi-lightning-charge-fill sdg-icon"></i>
            <h5 class="mb-3">Clean Energy</h5>
            <div class="progress">
              <div class="progress-bar" style="width: 75%"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <i class="bi bi-tree-fill sdg-icon"></i>
            <h5 class="mb-3">Climate Action</h5>
            <div class="progress">
              <div class="progress-bar" style="width: 65%"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <i class="bi bi-droplet-fill sdg-icon"></i>
            <h5 class="mb-3">Clean Water</h5>
            <div class="progress">
              <div class="progress-bar" style="width: 80%"></div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="text-center">
            <i class="bi bi-house-heart-fill sdg-icon"></i>
            <h5 class="mb-3">Sustainable Cities</h5>
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Posts -->
    <div class="content-section">
      <h3 class="section-title">Recent Posts</h3>
      <div class="row g-4">

        <div class="col-md-4">
          <div class="post-card">
            <img src="assets/solar.jpg" class="card-img-top" alt="Solar Panel Installation">
            <div class="card-body">
              <div class="card-meta">
                <span class="badge mt-2">SDG 7</span>
                <span class="text-muted">3 days ago</span>
              </div>
              <h5 class="card-title fw-bold mb-3">Solar Panel Installation</h5>
              <p class="card-text fs-6 text-dark mb-4">Just installed solar panels! Making a switch to clean energy. #CleanEnergy</p>
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
        </div>
        
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
  <footer>
    <div class="container">
      <div class="row g-4">
        <div class="col-md-4">
          <h5 class="footer-title">Day Planet</h5>
          <p class="text-muted">Making sustainability a daily habit</p>
        </div>
        <div class="col-md-4">
          <h5 class="footer-title">Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-muted">About Us</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Blog</a></li>
            <li><a href="#" class="text-decoration-none text-muted">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5 class="footer-title">Follow Us</h5>
          <div class="social-links d-flex gap-3">
            <a href="#"><i class="bi bi-twitter"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>