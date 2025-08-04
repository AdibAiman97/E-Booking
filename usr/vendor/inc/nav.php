<nav class="navbar navbar-expand static-top" style="background-color: #4B3D3D;">

  <a href="user-dashboard.php">
    <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../logo1.png'; ?>" class="user-image img-thumbnail" alt="User Image">
  </a>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    <!-- Search functionality commented out -->
  </form>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-shield fa-fw" style="color: #f5f5f5;"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="user-change-pwd.php">Profile</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
      </div>
    </li>
  </ul>

</nav>

<!-- Add this CSS to style the user image -->
<style>
  .user-image {
    width: 40px;
    height: 40px;
    border-radius: 100%;
    object-fit: cover; /* Ensures the image fits well inside the circle */
  }

  .img-thumbnail {
    padding: 2px;
    border: none; /* Removes default border of img-thumbnail class */
  }
</style>