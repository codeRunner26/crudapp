<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM DATA</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="formdata.css">
</head>

<body>

    <?php
    // connection file  path { we use a seperate file for connection};
    include("connfile.php");
    // sql query  for  selecting & displaying  the data from table .
    $sql = "SELECT * FROM `crudoperation` " ;
    $result = mysqli_query($conn, $sql);
    
    $alldata = mysqli_num_rows($result);



    // echo $alldata ;
    if ($alldata != 0) {
        // echo "table has " . $alldata . " records <br>";
?>
    <div class="main_btn">
        <a href="index.php"><button>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                    </svg> Add New </span>
            </button></a>
    </div>
    <h2> Form Data Is Here </h2>
    <table border="3">
        <tr>
            <th>S.no</th>
            <th>FIRST NAME</th>
            <th>LAST NAME</th>
            <th>GENDER</th>
            <th>Email</th>
            <th>Phone no</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php  
        while ($total = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" .$total["sno"] . "</td> 
                    <td>" .$total["fname"] . "</td> 
                    <td>" .$total["lname"] . "</td> 
                    <td>" .$total["gender"] . "</td> 
                    <td>" .$total["email"] . "</td> 
                    <td>" .$total["phone"] . "</td> 
                    <td>" .$total["address"] . "</td> 
                    <td> <a class='update' href='update.php?id=".$total['sno']."'>Update</a>
                    <a class='delete'  href='delete.php?id=".$total['sno']."' onclick='return confirm(\"Are you sure to delete this record ?\")'>Delete</a></td> </tr>";
        }

    } else{
        echo  '<div class="main">
                <div class="🤚">
                <div class="👉"></div>
                <div class="👉"></div>
                <div class="👉"></div>
                <div class="👉"></div>
                <div class="🌴"></div>		
                <div class="👍"></div>
                </div>'. ' NO  RECORD  FOUND!' .'</div>'; 
                 
        echo '<div class="main_btn">
        <a href="index.php"><button>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                    </svg> Add New </span>
            </button></a>
        </div>';  
    }
?>
    </table>

</body>

</html>