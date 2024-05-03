<?php 
session_start();
include "connDB.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Retutn books, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>

     <p>
        <?php 
        if($_SESSION['book1'] == null && $_SESSION['book2'] == null){
            echo "There are no book to return";
        }
        else {echo "There are books to return";}
        ?>
     </p>

    <?php

function book1() { 
    if(isset($_SESSION['id']) && isset($_SESSION['book1'])) {
        $a = $_SESSION['id'];
        $b = $_SESSION['book1'];

        if (!empty($b)) {
            include "connDB.php";
            $sql1 = "UPDATE library_members SET book1 = NULL WHERE id = $a";
            $sql2 = "UPDATE books SET books_in = books_in + 1 WHERE isbn = '$b'";
            
            if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                echo "Button1 was selected and database updated successfully";
            } else {
                echo "Error updating database: " . mysqli_error($conn);
            }
        } else {
            echo "Error: 'book1' parameter is empty";
        }
    } else {
        echo "Error: 'id' or 'book1' parameter is missing";
    }
} 
function book2() { 
    if(isset($_SESSION['id']) && isset($_SESSION['book2'])) {
        $a = $_SESSION['id'];
        $b = $_SESSION['book2'];

        if (!empty($b)) {
            include "connDB.php";
            $sql1 = "UPDATE library_members SET book2 = NULL WHERE id = $a";
            $sql2 = "UPDATE books SET books_in = books_in + 1 WHERE isbn = '$b'";
            
            if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                echo "Button2 was selected and database updated successfully";
            } else {
                echo "Error updating database: " . mysqli_error($conn);
            }
        } else {
            echo "Error: 'book2' parameter is empty";
        }
    } else {
        echo "Error: 'id' or 'book2' parameter is missing";
    }
} 
        if(array_key_exists('book1', $_POST)) { 
            book1();
        } 
        else if(array_key_exists('book2', $_POST)) { 
            book2(); 
        } 

    ?> 
    <form method="post"> 
        <input type="submit" name="book1"
                class="button" value="book1" /> 
          
        <input type="submit" name="book2"
                class="button" value="book2" /> 
    </form> 

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>