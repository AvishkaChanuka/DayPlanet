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
 
  <?php include('includes/crud.php');?>
    <div class="card mb-3" style="max-width: 840px; top: 50%;left:50%;position: absolute;transform: translate(-50%,-50%);box-sizing: border-box;">
        <div class="row g-0">
          <div class="col-md-6">
            <img src="https://i.pinimg.com/736x/02/1d/92/021d9228024533a1c0ab07dd3cb83a86.jpg" class="img-fluid rounded-start" alt="..." style="height:100%;">
          </div>
          <div class="col-md-6">
            <div class="card-header" style="background-color: white;">
                <h3 class="card-title" style="padding-left: 10px;">Day Planet | Sign Up</h3>
            </div>
            <div class="card-body" style="padding-left: 25px;">

              <form action="signup.php" method="post">

                <div class="mb-3">
                  <label for="signupname" class="form-label">Your name</label>
                  <input type="text" class="form-control" id="signupname" name="UserName" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="UserEmail" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="UserPassword" required>
                </div>

                <div class="mb-3">
                  <label class="form-label" style="margin-right: 10px;">Gender</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="UserGender" id="exampleRadios1" value="Male" required>
                    <label class="form-check-label" for="exampleRadios1">
                      Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="UserGender" id="exampleRadios2" value="Female" required>
                    <label class="form-check-label" for="exampleRadios2">
                      Female
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="UserGender" id="exampleRadios3" value="Other" required>
                    <label class="form-check-label" for="exampleRadios3">
                      Other
                    </label>
                  </div>
                </div>
                <!--
                <div class="mb-3">
                  <label for="examplebday" class="form-label">Birth Day</label>
                  <input type="date" class="form-control" id="examplebday" name="UserBDay" required>
                </div>
                -->
                <div class="mb-3">
                  <label class="form-label" for="location">Location</label>
                  <select class="form-select form-select-sm" aria-label="Small select example" id="location" name="UserLocation" required>
                    <option value="Asia">Asia</option>
                    <option value="Africa">Africa</option>
                    <option value="America">America</option>
                    <option value="Europe">Europe</option>
                    <option value="Oceania">Oceania</option>
                  </select>
                </div>

                <div class="container" style='text-align: center; padding-top:20px;'>
                    <button type="submit" class="btn btn-dark" name="SignUp" style="margin-right: 10px;">Sign Up</button>
                    <button type="reset" class="btn btn-outline-dark">Clear</button>
                </div>

                <p class="text-center" style="padding-top: 15px;">Are you a part of Day Planet? <b><a href="login.php">Sign In here</a></b> </p>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php
        
        if(isset($_POST["SignUp"])){
          $userName = $_POST["UserName"];
          $userEmail = $_POST["UserEmail"];
          $userPassword = $_POST["UserPassword"];
          $userGender = $_POST["UserGender"];
          $userLocation = $_POST["UserLocation"];
          $userProfilePic = "https://i.pinimg.com/736x/53/7c/8a/537c8a75f01598eb7559552f4c4b0dc7.jpg";

          $query = "INSERT INTO users (full_name, email, password, location, gender, points, profile_pic)
                    VALUES ('$userName', '$userEmail', '$userPassword', '$userLocation', '$userGender', 0, '$userProfilePic');";
          
          if(Create($query)){
            ShowAlert("Account has created successfully!!!");
          }
          else{
            ShowError("Something went wrong, please try again!!!");
          }
        }
      ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>