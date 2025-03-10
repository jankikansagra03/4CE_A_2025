 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="js/bootstrap.bundle.min.js"></script>
 <?php
    include_once("connect.php");

    $q = "select * from register";
    $result = $con->query($q);

    ?>
 <table class="table table-responsive table-striped">
     <tr>
         <th>Sr.NO</th>
         <th>Id</th>
         <th>NAme</th>
         <th>Email</th>
         <th>profile picture</th>
         <th>Action</th>
     </tr>
     <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {

        ?>
         <tr>
             <td><?php echo $i; ?></td>
             <td><?php echo $row['id']; ?></td>
             <td><?php echo $row['name']; ?></td>
             <td><?php echo $row['email']; ?></td>
             <td>
                 <img src="profile_pictures/<?php echo $row['photo']; ?>" alt="" width="100px">
             </td>
             <td>
                 <a href="edit_user.php?uid=<?php echo $row['id'];?>">
                     <button class="btn btn-primary">Edit</button>
                 </a>
                 <a href="view_user.php">
                     <button class="btn btn-info">View</button>
                 </a>
                 <a href="delete_user.php">
                     <button class="btn btn-danger">Delete</button>
                 </a>


             </td>
         </tr>

     <?php
            $i++;
        }
        ?>
 </table>