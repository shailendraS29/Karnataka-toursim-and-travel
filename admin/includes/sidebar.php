<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <img src="img/logo/travel.png">
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="manage_bookings.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>

   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#packageForm" aria-expanded="true" aria-controls="collapseForm">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>Package Management</span>
    </a>
    <div id="packageForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Packages</h6>
        <a class="collapse-item" href="create_package.php">Create Package</a>
        <a class="collapse-item" href="manage_packages.php">Manage Packages</a>
        <div class="collapse-item" href="">Total Packages = 
          <?php $sql3 = "SELECT PackageId from tbltourpackages";
                      $query3= $dbh -> prepare($sql3);
                      $query3->execute();
                      $results3=$query3->fetchAll(PDO::FETCH_OBJ);
                      $cnt3=$query3->rowCount();
                      ?>
                      <?php echo htmlentities($cnt3);?>
          </div>

      </div>
    </div>
  </li>
  <!--
   <li class="nav-item">
    <a class="nav-link" href="manage_bookings.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Bookings</span>
    </a>
  </li>
-->

  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#packageForm" aria-expanded="true" aria-controls="collapseForm">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>User Management</span>
    </a>
    <div id="packageForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users</h6>
        <a class="collapse-item" href="manage_users.php">Manage User</a>
        <div class="collapse-item" href="">Total Users = 
        <?php $sql = "SELECT id from tblusers";
                      $query = $dbh -> prepare($sql);
                      $query->execute();
                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                      $cnt=$query->rowCount();
                      ?>
                      <?php echo htmlentities($cnt);?>
          </div>

      </div>
    </div>
  </li>

<li class="nav-item">
    <a class="nav-link" href="admin_messages.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Messages</span>
    </a>
  </li>

  














  <!--
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="collapseTable">
      <i class="fas fa-fw fa-users"></i>
      <span>User Management</span>
    </a>
    <div id="users" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Users</h6>
        <a class="collapse-item" href="user_register.php">Register User</a>
        <a class="collapse-item" href="Permissions.php">User Permissions</a>
      </div>
    </div>
    
    </li>-->
</ul>