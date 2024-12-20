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

        <?php

        include('includes/connection.php');
        $query = "SELECT * FROM tips ORDER BY(`posted_date`) DESC LIMIT 10;";

        $conn = connectDatabase();
        $result = $conn->query($query);
    
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["tip_id"];
                $title = $row["title"];
                $body = $row["body"];
                $sdg = $row["sdg_goal"];
                $date = $row["posted_date"];

                echo('
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">'.$title.'</h5>
                            <p class="card-text">'.$body.'</p>
                            <div class="card-meta">
                                <span class="badge mt-2">'.$sdg.'</span>
                                <span class="text-muted">'.$date.'</span>
                            </div>
                            <button class="btn btn-outline-success btn-sm" disabled>👍 Like</button>
                        </div>
                    </div>
                </div>
                ');
            }
        }
    
        $conn->close();
      ?>

        </div>
    </div>

    <div class="container">
        <!-- Add Blog Button -->
        <div class="add-blog-btn mb-4 text-start">
            <a href="add-tip.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Add Tip
             </a>            
        </div>
    </div>
</body>
</html>
