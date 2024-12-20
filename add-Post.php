<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post - Day Planet</title>
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
        <h1 class="mb-4 text-center text-success">Write a Post</h1>

        <form id="addPostForm" enctype="multipart/form-data" method ="POST">
            <div class="mb-3">
                <label for="postTitle" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="postTitle" placeholder="Enter the post title" required name="PostTitle">
            </div>
            <div class="mb-3">
                <label for="postImage" class="form-label">Post Image</label>
                <input class="form-control" id="postImage" type="file" name="PostCover" required>
            </div>
            <div class="mb-3">
                <label for="postCategory" class="form-label">Category</label>
                <select class="form-select" id="postCategory" required name="PostSDG">
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
                <label for="postContent" class="form-label">Content</label>
                <textarea class="form-control" id="postContent" rows="10" placeholder="Write your post here..." required name="PostContent"></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100" name="AddPost">Submit Post</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <?php
        include('includes/crud.php');
        
        if(isset($_POST["AddPost"])){
            $user = $_COOKIE["UserID"];
            $postTitle = $_POST["PostTitle"];
            $postSDG = $_POST["PostSDG"];
            $PostContent = $_POST["PostContent"];

            $postCover = $_FILES["PostCover"] ["name"];
            $postCoverType = $_FILES["PostCover"] ["type"];
            $postCoverTemp = $_FILES["PostCover"] ["tmp_name"];
            $postCoverError = $_FILES["PostCover"] ["error"];

            $query = "INSERT INTO posts (user_id, title, body, cover_image, sdg_goal, status)
                        VALUES ($user, '".$postTitle."', '".$PostContent."', '".$postCover."', '".$postSDG."', 'Pending');";
          
            if(Create($query)){
                move_uploaded_file($postCoverTemp, "upload/post/".$postCover);
                ShowSuccess("Post Posted Successfully!!!");
            }
            else{
                ShowError("Something went wrong, please try again!!!");
            }
        }
      ?>
    
</body>
</html>
