<?php
if (isset($_COOKIE['success'])) { ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> <?php echo $_COOKIE['success']; ?>
    </div>
<?php
}
if (isset($_COOKIE['error'])) {
?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Error!</strong> <?php echo $_COOKIE['error']; ?>
    </div>
<?php
}


try {
    $con = mysqli_connect("localhost", "root", "", "2025_4CE_A");
    // echo "Connected successfully";
    // 1 time process 
    // $db = "create database 2025_4CEA";
    // try {
    //     if ($con->query($db)) {
    //         echo "Database created successfully with the name 2025_4CEA";
    //     }
    // } catch (Exception $e) {
    //     echo "error in creating database";
    // }

    // try {
    //     $con->select_db("2025_4CEA");
    // } catch (Exception $e) {
    //     echo "error in selecting database";
    // }


    //table creation is one time process
    // $register = "create table register(
    //     id int primary key auto_increment, 
    //     name varchar(50), 
    //     email varchar(50), 
    //     password varchar(50), 
    //     mobile bigint(10),
    //     state char(50),
    //     gender char(10),
    //     hobbies varchar(200),
    //address varchar(100),
    //     photo varchar(200))";
    //     try {
    //         if ($con->query($register)) {
    //             echo "Table created successfully with the name register";
    //         }
    //     } catch (Exception $e) {
    //         echo "Error:Error in creating the table";
    //     }
} catch (Exception $e) {
    echo "Error:Error in connecting to the database";
}
