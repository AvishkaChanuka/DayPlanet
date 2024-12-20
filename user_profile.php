<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile | Day Planet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php include('includes/connection.php');?>
    <style>
      body {
        background-color: #f8f9fa;
      }

      .profile-header {
        background-color: #ffffff;
        padding: 2rem 0;
        padding-top:5rem;
        border-bottom: 1px solid #dee2e6;
        margin-bottom: 2rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      }

      .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      }

      .nav-tabs {
        border-bottom: 2px solid #dee2e6;
        margin-bottom: 2rem;
      }

      .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        padding: 1rem 1.5rem;
        margin-bottom: -2px;
      }

      .nav-tabs .nav-link.active {
        color: #198754;
        border-bottom: 2px solid #198754;
      }

      .post-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 1rem;
        max-width: 360px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
      }

      .post-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      }

      .card-img-top {
        border-radius: 16px 16px 0 0;
        height: 200px;
        object-fit: cover;
        width: 100%;
      }

      .card-body {
        padding: 1.5rem;
      }

      .card-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
      }

      .badge {
        background-color: #28a745;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
      }

      .text-muted {
        color: #6c757d;
        font-size: 0.875rem;
      }

      .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #2d3748;
      }

      .card-text {
        color: #4a5568;
        font-size: 1rem;
        line-height: 1.5;
        margin-bottom: 1.25rem;
      }

      .card-actions {
        display: flex;
        gap: 1rem;
        align-items: center;
      }

      .action-button {
        background: none;
        border: none;
        padding: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #4a5568;
        font-size: 0.875rem;
        cursor: pointer;
        transition: color 0.2s ease;
      }

      .action-button:hover {
        color: #2d3748;
      }

      .action-button i {
        font-size: 1.25rem;
      }

      .heart-button:hover {
        color: #e53e3e;
      }

      .comment-button:hover {
        color: #3182ce;
      }

      .achievement-badge {
        width: 100px;
        height: 100px;
        border-radius: 10px;
        background: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      }

      .badge-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
        color: #198754;
      }

      .sdg-progress {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        margin-bottom: 1.5rem;
      }

      .progress {
        height: 10px;
        border-radius: 5px;
      }

      .follower-card {
        background: white;
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      }

      .follower-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
      }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <?php include('includes/navbar.php');?>
    <!-- Profile Header -->
    <div class="profile-header">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-3 text-center">
            <img src="assets/user.jpg" alt="Profile Avatar" class="profile-avatar mb-3">
          </div>
          <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div>
              <?php
                $query = "SELECT 
                              u.user_id,
                              u.full_name,
                              u.email,
                              u.location,
                              u.gender,
                              u.points,
                              u.profile_pic,
                              u.date_joined,
                              COUNT(DISTINCT p.post_id) AS post_count,
                              COUNT(DISTINCT t.tip_id) AS tip_count,
                              COUNT(DISTINCT b.blog_id) AS blog_count
                          FROM users u
                          LEFT JOIN posts p ON u.user_id = p.user_id
                          LEFT JOIN tips t ON u.user_id = t.user_id
                          LEFT JOIN blogs b ON u.user_id = b.user_id
                          WHERE u.user_id = ".$_COOKIE["UserID"]."
                          GROUP BY u.user_id;";

                $conn = connectDatabase();
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row["full_name"];
                        $location = $row["location"];
                        $cover = $row["profile_pic"];
                        $sdg = $row["date_joined"];

                        echo'<h2 class="mb-1">'.$name.'</h2>';
                        echo'<p class="mb-2"><i class="bi bi-geo-alt-fill"></i>'.$location.'</p>';

                        echo'
                          <p class="mb-3">"Passionate about sustainable development and making a positive impact 🌱"</p>
                            </div>
                          </div>
                          <div class="d-flex gap-4">
                            <div><strong>'.$row["post_count"].'</strong> <span class="text-muted">Posts</span></div>
                            <div><strong>'.$row["tip_count"].'</strong> <span class="text-muted">Tips</span></div>
                            <div><strong>'.$row["blog_count"].'</strong> <span class="text-muted">Blogs</span></div>
                          </div>
                        ';
                    }
                }

                $conn->close();
              ?>
                
                
                
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <!-- Tabs Navigation -->
      <ul class="nav nav-tabs" id="profileTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts" type="button" role="tab">
            <i class="bi bi-grid-3x3"></i> Posts
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="achievements-tab" data-bs-toggle="tab" data-bs-target="#achievements" type="button" role="tab">
            <i class="bi bi-trophy"></i> Achievements
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="followers-tab" data-bs-toggle="tab" data-bs-target="#followers" type="button" role="tab">
            <i class="bi bi-people"></i> Followers
          </button>
        </li>
      </ul>


      <div class="tab-content" id="profileTabsContent">
        <!-- Posts tab -->
        <div class="tab-pane fade show active" id="posts" role="tabpanel">
          <div class="row">

          <?php

            
            $query = "SELECT * FROM posts WHERE user_id = ".$_COOKIE["UserID"]." ORDER BY(`posted_date`) ;";

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

          </div>
        </div>

        <!-- Achievements tab -->
        <div class="tab-pane fade" id="achievements" role="tabpanel">
          <h4 class="mb-4">Badges Earned</h4>
          <div class="d-flex flex-wrap">
            <div class="achievement-badge">
              <i class="bi bi-tree-fill badge-icon"></i>
              <span class="small">Earth Guardian</span>
            </div>
            <div class="achievement-badge">
              <i class="bi bi-droplet-fill badge-icon"></i>
              <span class="small">Water Savior</span>
            </div>
            <div class="achievement-badge">
              <i class="bi bi-sun-fill badge-icon"></i>
              <span class="small">Solar Pioneer</span>
            </div>
          </div>

          <h4 class="mt-5 mb-4">SDG Progress</h4>
          <div class="sdg-progress">
            <div class="d-flex justify-content-between mb-2">
              <span>SDG 7: Affordable and Clean Energy</span>
              <span>75%</span>
            </div>
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 75%"></div>
            </div>
          </div>
        </div>

        <!-- Followers tab -->
        <div class="tab-pane fade" id="followers" role="tabpanel">
          <div class="row">
            <div class="col-md-6">
              <div class="follower-card d-flex align-items-center">
                <img src="https://i.pravatar.cc/50" class="follower-avatar me-3" alt="Follower Avatar">
                <div class="flex-grow-1">
                  <h6 class="mb-1">John Doe</h6>
                  <small class="text-muted">@johndoe</small>
                </div>
                <button class="btn btn-sm btn-outline-success">Follow Back</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit profile button -->
    <div class="modal fade" id="editProfileModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value="Sarah Green">
              </div>
              <div class="mb-3">
                <label class="form-label">Bio</label>
                <textarea class="form-control" rows="3">Passionate about sustainable development and making a positive impact 🌱</textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" class="form-control" value="New York, USA">
              </div>
              <div class="mb-3">
                <label class="form-label">Profile Picture</label>
                <input type="file" class="form-control">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success">Save Changes</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>