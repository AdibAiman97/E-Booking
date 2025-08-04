<ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="admin-dashboard.php">
        <i class="fas fa-clipboard-list"></i>

          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user"></i>
          <span>Customer</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">My Customer:</h6>
          <a class="dropdown-item" href="admin-add-user.php">Add</a>
          <a class="dropdown-item" href="admin-view-user.php">View</a>
          <a class="dropdown-item" href="admin-manage-user.php">Manage</a>
        </div>
      </li>

      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-file"></i>
          <span>Pet</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">My Customer Pet:</h6>
          <a class="dropdown-item" href="admin-view-cat.php">View</a>
          <a class="dropdown-item" href="admin-manage-cat.php">Manage</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-cat"></i>
          <span>Room List</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">My Room:</h6>
          <a class="dropdown-item" href="admin-add-vehicle.php">Add</a>
          <a class="dropdown-item" href="admin-view-vehicle.php">View</a>
          <a class="dropdown-item" href="admin-manage-vehicle.php">Manage</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-book"></i>
          <span>Bookings</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Booking:</h6>
          <a class="dropdown-item" href="admin-add-booking.php">Bookings List</a>
          <a class="dropdown-item" href="admin-manage-booking.php">Manage Booking</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-comments"></i>
          <span>Feedbacks</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="admin-view-feedback.php">View</a>
          <a class="dropdown-item" href="admin-publish-feedback.php">Manage</a>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="admin-pwd-resets.php">
          <i class="fas fa-fw fa-key"></i>
          <span>Password Resets</span></a>
      </li>
      
      <li class="nav-item">
        
      </li> 
    </ul>
    <style>
/* Active State */
.nav-item.active .nav-link {
    background-color:#D2B48C;
    color: white;
    border-radius: 8px;
}
</style>