<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Blog - Day Planet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-success {
            background-color: var(--dark-green, #198754);
            border-color: var(--dark-green, #198754);
        }
        .btn-success:hover {
            background-color: var(--hover-green, #157347);
            border-color: var(--hover-green, #157347);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center text-success">Write a Blog</h1>

        <form id="addBlogForm" enctype="multipart/form-data" method ="POST">
            <div class="mb-3">
                <label for="blogTitle" class="form-label">Blog Title</label>
                <input type="text" class="form-control" id="blogTitle" placeholder="Enter the blog title" required name="BlogTitle">
            </div>
            <div class="mb-3">
                <label for="blogImage" class="form-label">Blog Cover Image</label>
                <input class="form-control" id="blogImage" type="file" name="BlogCover" required>
            </div>
            <div class="mb-3">
                <label for="blogCategory" class="form-label">Category</label>
                <select class="form-select" id="blogCategory" required name="BlogSDG">
                    <option value="">Select a category</option>
                    <option value="SDG 1">SDG 1: No Poverty</option>
                    <option value="SDG 2">SDG 2: Zero Hunger</option>
                    <option value="SDG 3">SDG 3: Good Health and Well-being</option>
                    <option value="SDG 4">SDG 4: Quality Education</option>
                    <option value="SDG 5">SDG 5: Gender Equality</option>
                    <option value="SDG 6">SDG 6: Clean Water and Sanitation</option>
                    <option value="SDG 7">SDG 7: Affordable and Clean Energy</option>
                    <option value="SDG 8">SDG 8: Decent Work and Economic Growth</option>
                    <option value="SDG 9">SDG 9: Industry, Innovation and Infrastructure</option>
                    <option value="SDG 10">SDG 10: Reduced Inequality</option>
                    <option value="SDG 11">SDG 11: Sustainable Cities and Communities</option>
                    <option value="SDG 12">SDG 12: Responsible Consumption and Production</option>
                    <option value="SDG 13">SDG 13: Climate Action</option>
                    <option value="SDG 14">SDG 14: Life Below Water</option>
                    <option value="SDG 15">SDG 15: Life on Land</option>
                    <option value="SDG 16">SDG 16: Peace, Justice and Strong Institutions</option>
                    <option value="SDG 17">SDG 17: Partnerships for the Goals</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="blogIntro" class="form-label">Introduction</label>
                <textarea class="form-control" id="blogIntro" rows="5" placeholder="Write your Intro here..." required name="BlogIntro"></textarea>
            </div>
            <div class="mb-3">
                <label for="blogContent" class="form-label">Content</label>
                <textarea class="form-control" id="blogContent" rows="10" placeholder="Write your blog here..." required name="BlogContent"></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100" name="AddBlog">Submit Blog</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php
        include('includes/crud.php');
        
        if(isset($_POST["AddBlog"])){
            $user = $_COOKIE["UserID"];
            $blogTitle = $_POST["BlogTitle"];
            $blogSDG = $_POST["BlogSDG"];
            $BlogIntro = $_POST["BlogIntro"];
            $BlogContent = $_POST["BlogContent"];

            $blogCover = $_FILES["BlogCover"] ["name"];
            $blogCoverType = $_FILES["BlogCover"] ["type"];
            $blogCoverTemp = $_FILES["BlogCover"] ["tmp_name"];
            $blogCoverError = $_FILES["BlogCover"] ["error"];

            $query = "INSERT INTO blogs (user_id, title, Intro, cover_image, sdg_goal, paragraphs)
                    VALUES ($user, '".$blogTitle."', '".$BlogIntro."', '".$blogCover."', '".$blogSDG."', '".$BlogContent."');";
          
            if(Create($query)){
                move_uploaded_file($blogCoverTemp, "upload/blog/".$blogCover);
                ShowSuccess("Blog Posted Successfully!!!");
            }
            else{
                ShowError("Something went wrong, please try again!!!");
            }
        }
      ?>
    
</body>
</html>
