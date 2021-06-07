<!doctype html>
<html lang="en">
  <?php include 'head.php'; ?>
  
  <body>

   <?php 
   
    include 'menu.php';
    
    include 'database.php';
   
   
   ?> 


   <div class="container">
     <div class="row">


      
     <div class="col-md-6">
         <h4>SubMenu List</h4>
         <hr>
         <table class="table table-borderd">
         <thead>
            <tr>
              <th>S. No</th>
              <th>Menu Name</th>
              <th>Sub Menu Name</th>
              <th>Sub Menu URL</th>
              <th>Sub Menu Order</th>
            </tr>
         </thead>

         <tbody>
          <tr>
            <?php

            include 'database.php';

              $menulistqry = "SELECT sub_menu.*, menu.menu_name  FROM sub_menu 
              inner join menu on menu.menu_id=sub_menu.menu_id 
              where submenu_status='Enable' ";
              $menulistres = mysqli_query($con, $menulistqry);

              while ($menudata=mysqli_fetch_assoc($menulistres)) {
                
            ?>

            <tr>

            <td> <?php echo $menudata['submenu_id']; ?> </td>
            <td> <?php echo $menudata['menu_name']; ?> </td>
            <td> <?php echo $menudata['submenu_name']; ?> </td>
            <td> <?php echo $menudata['submenu_url']; ?> </td>
            <td> <?php echo $menudata['submenu_order']; ?> </td>

            </tr>

            <?php 

              }

            ?>
          
          </tr>
         
         </tbody>
         </table>
     
     </div>

     
     <div class="col-md-6">
         <h4>Submenu List</h4>
         <hr>

         
       <div class="col-md-6">
         <h4>Add Menu item</h4>
         <hr>

         <form method="post" action="submenu_adddb.php">
            <div class="form-group">
                <select class="form-control" name="menu_id">
                    <option value="">Select Menu</option>

                    <?php 

                    
              $menulistqry = "SELECT * FROM menu where menu_status='Enable' ";
              $menulistres = mysqli_query($con, $menulistqry);

              while ($menudata=mysqli_fetch_assoc($menulistres)) {
                
            ?>

            <option value="<?php echo $menudata['menu_id']; ?>">
                 <?php echo $menudata['menu_name']; ?>
            </option>

        <?php } ?>


 
                </select>
            </div>

            <div class="form-group">
              <input type="text" name="submenu_name" class="form-control" placeholder="SubMenu Name" />
            </div>


            <div class="form-group">
              <input type="text" name="submenu_url" class="form-control" placeholder="SubMenu URL" />
            </div>


            <div class="form-group"> 
                <select name="submenu_display" class="form-control" id="" >
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>



            <div class="form-group"> 
                <select name="submenu_order" class="form-control" id="" >
                    <?php
                    for ($i=0; $i <10 ; $i++){ 
                        
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option> 
                  <?php   }  ?>
                </select>
            </div>


            <div class="form-group">
              <input type="submit" name="submenu_submit" class="btn btn-primary"
              value="Add SubMenu" />
             
          </div>


         </form>


       </div>
     </div>

   </div>

   <?php include 'footer.php'; ?>
       

   </body>
</html>