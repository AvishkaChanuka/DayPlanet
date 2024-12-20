<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day Planet - SDG Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="blogs_styles.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include('includes/navbar.php');?>
    <!-- Hero Section -->
    <div class="hero-section text-center text-white">
        <div class="container">
        <h1 class="display-4 fw-bold mb-4"></h1>
        <h1 class="display-4 fw-bold mb-4">Sustainable Development Goals Blog</h1>
        <p class="lead mb-4">Exploring ways to create a better world.</p>
        </div>
    </div>

    <div class="container">
        <!-- Search Bar 
        <form class="search-form">
            <div class="input-group">
                <input type="search" class="form-control" placeholder="Search blog posts...">
                <button class="btn btn-success" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>-->

        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                <!-- Featured Post 
                <div class="card blog-card mb-4">
                    <div class="card-body">
                        <span class="featured-tag">Latest</span>
                        <span class="category-badge">SDG 13: Climate Action</span>
                        <h3 class="blog-title">Global Climate Change: Actions for a Sustainable Future</h3>
                        <div class="meta-info mb-2">
                            <i class="bi bi-person"></i> James Wilson
                            <span class="mx-2">•</span>
                            <i class="bi bi-calendar"></i> Mar 20, 2024
                            <span class="mx-2">•</span>
                            <i class="bi bi-eye"></i> 1.2k views
                        </div>
                        <p class="card-text">An in-depth look at how climate change is affecting our planet and what actions we can take to make a difference...</p>
                        <a href="blog-detail.html" class="btn btn-success">Read More</a>
                    </div>
                </div>-->

                <div class="row">
                    <!-- Regular Blog Posts -->

                    <?php
                        include('includes/connection.php');
                        $query = "SELECT 
                                    blogs.blog_id,
                                    blogs.title,
                                    blogs.intro,
                                    blogs.sdg_goal,
                                    blogs.posted_date,
                                    blogs.cover_image,
                                    blogs.paragraphs,
                                    users.full_name
                                FROM blogs
                                JOIN users ON blogs.user_id = users.user_id
                                ORDER BY blogs.posted_date DESC
                                LIMIT 10;";

                        $conn = connectDatabase();
                        $result = $conn->query($query);
                    
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["blog_id"];
                                $title = $row["title"];
                                $sdg = $row["sdg_goal"];
                                $date = $row["posted_date"];
                                $user = $row["full_name"];
                                $intro = $row["intro"];
                                $cover = $row["cover_image"];
                                $para = $row["paragraphs"];
                                

                                echo('
                                <div class="col-md-6">
                                    <div class="card blog-card">
                                        <div class="card-body">
                                            <span class="category-badge">'.$sdg.'</span>
                                            <h5 class="blog-title">'.$title.'</h5>
                                            <div class="meta-info mb-2">
                                                <i class="bi bi-person"></i> '.$user.'
                                                <span class="mx-2">•</span>
                                                <i class="bi bi-calendar"></i> '.$date.'
                                            </div>
                                            <p class="card-text">'.$intro.'</p>
                                            <a href="blog-detail.php?id='.$id.'&title='.$title.'&cover='.$cover.'&sdg='.$sdg.'&intro='.$intro.'&para='.$para.'&user='.$user.'&date='.$date.'" class="btn btn-success">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                ');
                            }
                        }
                    
                        $conn->close();
                    ?>
                    
                </div>

                <div class="container">
                    <!-- Add Blog Button -->
                    <div class="add-blog-btn mb-4 text-start">
                        <a href="add-blog.php" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i> Add Blog
                        </a>
                    </div>
                    
                
                    <div class="row">
                        <!-- Main Content -->
                        <div class="col-lg-8">
                            <!-- Blog content remains unchanged -->
                        </div>
                
                        <!-- Sidebar -->
                        <div class="col-lg-4">
                            <!-- Sidebar content remains unchanged -->
                        </div>
                    </div>
                </div>
                

                <!-- Pagination 
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>-->
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Categories -->
                <div class="sidebar-section">
                    <h4 class="sidebar-title">News</h4>
                    <img src="8960411.jpg" alt="description" width="375px" height="500px" >

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
