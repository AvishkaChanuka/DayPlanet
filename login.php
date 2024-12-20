<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | Day Planet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/auth.css">
</head>
  <body>
    <div class="card mb-3" style="max-width: 680px; top: 50%;left:50%;position: absolute;transform: translate(-50%,-50%);box-sizing: border-box;">
        <div class="row g-0">
          <div class="col-md-5">
            <img src="https://i.pinimg.com/736x/9a/1d/ba/9a1dba31a6957c4132c18d9e2c74018a.jpg" class="img-fluid rounded-start" alt="..." style="height:100%;">
          </div>
          <div class="col-md-7">
            <div class="card-header" style="background-color: white;">
                <h3 class="card-title" style="padding-left: 10px;">Day Planet | Sign In</h3>
            </div>
            <div class="card-body" style="padding-left: 25px;">
              <form action="" method="post">

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="UserEmail">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="UserPassword">
                </div>
                <div class="container" style='text-align: center; padding-top:10px;'>
                    <button type="submit" class="btn btn-dark" name="SignIn" style="margin-right: 10px;">Sign In</button>
                    <button type="reset" class="btn btn-outline-dark">Clear</button>
                </div>

                <p class="text-center" style="padding-top: 15px;">Still aren't you a part of Day Planet? <b><a href="#">Sign Up Now</a></b> </p>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php

        include('includes/crud.php');

        if(isset($_POST["SignIn"])){
          
          $userEmail = $_POST["UserEmail"];
          $userPassword = $_POST["UserPassword"];

          $query = "SELECT * FROM users WHERE email ='". $userEmail ."' and password = '". $userPassword."';";

          function Login($sql) {
            $conn = connectDatabase();
            $result = $conn->query($sql);
        
            $data = [];
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                    
                    $cookie_name = "UserID";
                    $cookie_value = $row['user_id'];
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

                    $cookie_name = "UserName";
                    $cookie_value = $row['full_name'];
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


                    $msg = "Hi " . $row['full_name'] . " Let's do an impact together!!!";
                    ShowAlert($msg);
                }
              
              header('Location:index.php');
              exit();
            }
            else{
              ShowError("Something went wrong, please check your credentials & again!!!");
            }
        
            $conn->close();
          }

          Login($query);
        }
      ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>