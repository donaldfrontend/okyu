<!doctype html>
<html lang="en">
  <?php include 'head.php'; ?>
  
  <body>

   <?php include 'menu.php'; ?>


   <div class="container">
     <div class="row">

     
     <div class="col-md-6">
         <h4>Menu List</h4>
         <hr>
         <table class="table table-borderd">
         <thead>
            <tr>
              <th>S. No</th>
              <th>Menu Name</th>
              <th>Menu Icon</th>
            </tr>
         </thead>

         <tbody>
          <tr>
            <?php

            include 'database.php';

              $menulistqry = "SELECT * FROM menu where menu_status='Enable' ";
              $menulistres = mysqli_query($con, $menulistqry);

              while ($menudata=mysqli_fetch_assoc($menulistres)) {
                
            ?>

            <tr>

            <td> <?php echo $menudata['menu_id']; ?> </td>
            <td> <?php echo $menudata['menu_name']; ?> </td>
            <td> <?php echo $menudata['menu_icon']; ?> </td>

            </tr>

            <?php 

              }

            ?>
          
          </tr>
         
         </tbody>
         </table>
     
     </div>





       <div class="col-md-6">
         <h4>Add Menu item</h4>
         <hr>

         <form method="post" action="menu_adddb.php">
            <div class="form-group">
              <input type="text" name="menu_name" class="form-control" placeholder="Menu Name" />
            </div>

            <div class="form-group">
              <input type="text" name="menu_icon" class="form-control" placeholder="Menu Icon" />
            </div>


            <div class="form-group">
              <input type="submit" name="menu_submit" class="btn btn-primary"
              value="Add Menu" />
             
          </div>


         </form>


       </div>
     </div>

   </div>

   <?php include 'footer.php'; ?>
       

   </body>
</html>