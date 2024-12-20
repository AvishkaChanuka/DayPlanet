<style>
  li.nav-item{
    padding-left: 10px;
    padding-right: 10px;
  }

  li.nav-item:hover{
    border-bottom: 1px solid black;
  }

  .navbar {
      padding: 1rem 0;
      background-color: white !important;
      border-bottom: 1px solid #dee2e6;
    }
</style>

<?php
  if(!isset($_COOKIE["UserID"])){

    header('Location:login.php');

  }
?>

<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>Day Planet</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          
          <a class="nav-link" href="leaderboard.php">Leaderboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="tips.php">Suatainable Tips</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="blogs.php">Blog</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="user_profile.php">Profile</a>
        </li>

      </ul>
      <form class="d-flex" role="search">
        <label style="font-weight: bold;"><?php echo $_COOKIE["UserName"]?></label>
      </form>
    </div>
  </div>
</nav>