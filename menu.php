<nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Dynamic <Menu:context></Menu:context></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Settings</a>
              </li>
             
             <!-- <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
               -->

               <?php

               include 'database.php';
               
              $menulistqry = "SELECT * FROM menu where menu_status='Enable' ";
              $menulistres = mysqli_query($con, $menulistqry);

              while ($menulistdata=mysqli_fetch_assoc($menulistres)) {

                $menu_id = $menulistdata['menu_id'];
               ?>

              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span><i class="<?php echo $menulistdata['menu_name']; ?>"></i></span> 
               <?php echo $menulistdata['menu_name']; ?>
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <?php 
              $submenulistqry = "SELECT * FROM sub_menu where submenu_status='Enable'  AND menu_id='$menu_id' AND submenu_display='Yes' ORDER BY submenu_order asc";
              $submenulistres = mysqli_query($con, $submenulistqry);

              while ($submenulistdata=mysqli_fetch_assoc($submenulistres)) {

               ?>

                <a class="dropdown-item" href="<?php echo $submenulistdata['submenu_url']; ?>">
                <?php echo $submenulistdata['submenu_name']; ?>
                </a>
                
              <?php }  ?>
              </div>


              </li>

              <?php }  ?>



       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Setting
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="menu_add.php">Add Menu</a>
          <a class="dropdown-item" href="submenu_add.php">Add Sub Menu</a>
          <a class="dropdown-item" href="user_permission.php">Permission</a>
        </div>
      </li>


               
 


            </ul>
          </div>
        </div>
      </nav>