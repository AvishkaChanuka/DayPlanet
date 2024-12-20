<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Leaderboard | Day Planet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .navbar {
      padding: 1rem 0;
      background-color: white !important;
      border-bottom: 1px solid #dee2e6;
    }

    .hero-section {
      background: linear-gradient(rgba(25, 135, 84, 0.9), rgba(25, 135, 84, 0.8));
      padding: 4rem 0;
      color: white;
      text-align: center;
      margin-bottom: 2rem;
    }

    .content-section {
      background: white;
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .leaderboard-table {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .leaderboard-title {
      font-size: 1.5rem;
      color: #2d3748;
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .table tbody tr:hover {
      background-color: #f1f3f5;
    }

    .rank {
      font-weight: bold;
      color: #198754;
    }

    .progress-bar {
      background-color: #198754;
    }

    footer {
      background-color: white;
      padding: 2rem 0;
      border-top: 1px solid #dee2e6;
      margin-top: 2rem;
    }
  </style>
</head>
<body>
  <!-- Navigation -->
  <?php include('includes/navbar.php');?>
  <!-- Hero Section -->
  <div class="hero-section">
    <h1 class="display-4">Leaderboard</h1>
    <p class="lead">Recognizing the top contributors in driving sustainable actions</p>
  </div>

  <div class="container">
    <!-- Leaderboard Section -->
    <div class="content-section">
      <h2 class="leaderboard-title">Top Contributors</h2>
      <table class="table table-hover leaderboard-table">
        <thead class="table-light">
          <tr>
            <th scope="col">Rank</th>
            <th scope="col">Name</th>
            <th scope="col">Points</th>
            <th scope="col">Progress</th>
          </tr>
        </thead>
        <tbody>

        <?php

          include('includes/connection.php');
          $query = "SELECT 
              u.full_name AS user_name,
              SUM(COALESCE(p.post_count, 0) * 10 + COALESCE(t.tip_count, 0) + COALESCE(b.blog_count, 0) * 10) AS points,
              ROUND((SUM(COALESCE(p.post_count, 0) * 10 + COALESCE(t.tip_count, 0) + COALESCE(b.blog_count, 0) * 10) / 100) * 100, 2) AS progress
          FROM 
              users u
          LEFT JOIN (
              SELECT user_id, COUNT(*) AS post_count
              FROM posts
              GROUP BY user_id
          ) p ON u.user_id = p.user_id
          LEFT JOIN (
              SELECT user_id, COUNT(*) AS tip_count
              FROM tips
              GROUP BY user_id
          ) t ON u.user_id = t.user_id
          LEFT JOIN (
              SELECT user_id, COUNT(*) AS blog_count
              FROM blogs
              GROUP BY user_id
          ) b ON u.user_id = b.user_id
          GROUP BY 
              u.user_id, u.full_name
          ORDER BY 
              points DESC;
          ";

          $conn = connectDatabase();
          $result = $conn->query($query);

          if ($result && $result->num_rows > 0) {
             $i = 1;
              while ($row = $result->fetch_assoc()) {

                  echo('
                  <tr>
                    <td><span class="rank">'.$i.'</span></td>
                    <td>'.$row["user_name"].'</td>
                    <td>'.$row["points"].'</td>
                    <td>
                      <div class="progress">
                        <div class="progress-bar" style="width: '.$row["progress"].'%;">'.$row["progress"].'</div>
                      </div>
                    </td>
                  </tr>
                  ');
              }
          }

          $conn->close();
        ?>
        </tbody>
      </table>
    </div>
  </div>

  <?php include('includes/footer.php');?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
