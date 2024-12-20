<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Detail - Day Planet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="blog-styles.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <a href="blogs.php" class="btn btn-success mb-4">
            <i class="bi bi-arrow-left"></i> Back to Blogs
        </a>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                <img src="upload/blog/<?php echo $_GET['cover'];?>" class="card-img-top">
                    <div class="card-body">
                    
                        <span class="category-badge"><?php echo $_GET['sdg'];?></span>
                        <h1 class="blog-title mb-3"><?php echo $_GET['title'];?></h1>
                        <div class="meta-info mb-4">
                            <i class="bi bi-person"></i> <?php echo $_GET['user'];?>
                            <span class="mx-2">•</span>
                            <i class="bi bi-calendar"></i> <?php echo $_GET['date'];?>
                            <span class="mx-2">•</span>
                            <i class="bi bi-eye"></i> 1.2k views
                            <span class="mx-2">•</span>
                            <i class="bi bi-clock"></i> 8 min read
                        </div>

                        <div class="blog-content">
                            <p class="lead"><?php echo $_GET['intro'];?></p>
                            <p> <?php echo $_GET['para'];?></p>
                        </div>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="mb-4">Comments (3)</h4>
                        
                        <!-- Comment Form -->
                        <form class="mb-4">
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" placeholder="Leave a comment..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Post Comment</button>
                        </form>

                        <!-- Comments List -->
                        <div class="comments-list">
                            <!-- Comment 1 -->
                            <div class="d-flex mb-4">
                                <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                                <div>
                                    <h5 class="mb-1">Sarah Parker</h5>
                                    <p class="text-muted small">2 hours ago</p>
                                    <p>Great article! The suggestions for individual actions are particularly helpful.</p>
                                </div>
                            </div>

                            <!-- Comment 2 -->
                            <div class="d-flex">
                                <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                                <div>
                                    <h5 class="mb-1">Mike Johnson</h5>
                                    <p class="text-muted small">5 hours ago</p>
                                    <p>This is exactly what we need - practical solutions that everyone can implement.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar 
            <div class="col-lg-4">
                
                <div class="sidebar-section">
                    <h4 class="sidebar-title">Related Posts</h4>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="blog-title">Renewable Energy: The Future is Now</h6>
                            <p class="small text-muted mb-2">Mar 18, 2024</p>
                            <a href="#" class="btn btn-sm btn-success">Read More</a>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h6 class="blog-title">Sustainable Cities: Building for Tomorrow</h6>
                            <p class="small text-muted mb-2">Mar 15, 2024</p>
                            <a href="#" class="btn btn-sm btn-success">Read More</a>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Categories -->
                <div class="sidebar-section">
                    <h4 class="sidebar-title">Advertisments</h4>
                    <img src="8960411.jpg" alt="description" width="375px" height="500px" >

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>