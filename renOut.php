<?php 
session_start();
include "connDB.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
}
 ?>
 <!DOCTYPE html>
 <html>
 <title>Rent Out books</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Ready to read more, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>
     <?php 
     $book1 = $_SESSION['book1'];
     $book2 = $_SESSION['book2'];
     //funtion for tilte1
     function title1() { 
        include "connDB.php";
        $sql = "SELECT * FROM books WHERE title='Tilte1'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['title'] === 'Tilte1'){
                $_SESSION['isbn'] = $row['isbn'];
            	$_SESSION['title'] = $row['title'];
            	$_SESSION['author'] = $row['author'];
                $_SESSION['publisher'] = $row['publisher'];
                $_SESSION['genre'] = $row['genre'];
            	header("Location: memHome.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect Book not found");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect book not found");
	        exit();
		}
        //
        //updatas began here 
        //
        if(isset($_SESSION['id'])) {
            $a = $_SESSION['id'];
            $b = $_SESSION['isbn'];
    
            if (empty($book1)) {
                //include "connDB.php";
                $sql1 = "UPDATE library_members SET book1 = '$b' id = $a";
                $sql2 = "UPDATE books SET books_in = books_in - 1, books_out = books_out + 1  WHERE isbn = '$b'";
                
                if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                    echo "Title1 was selected and database updated successfully on book1";
                } else {
                    echo "Error updating database: " . mysqli_error($conn);
                }
            } else if(empty($book2)) {
                $sql1 = "UPDATE library_members SET book2 = '$b' id = $a";
                $sql2 = "UPDATE books SET books_in = books_in - 1, books_out = books_out + 1  WHERE isbn = '$b'";
                
                if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                    echo "Title1 was selected and database updated successfully on book2";
                } else {
                    echo "Error updating database: " . mysqli_error($conn);
                }
            }
            else {
                echo "Only 2 book at the time";
            }
        } else {
            echo "Error: 'isbn' or 'id' parameter is missing";
        }
        }//end of function 
        //funtion for tilte2
     function title2() { 
        include "connDB.php";
        $sql = "SELECT * FROM books WHERE title='Tilte2'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['title'] === 'Tilte2'){
                $_SESSION['isbn'] = $row['isbn'];
            	$_SESSION['title'] = $row['title'];
            	$_SESSION['author'] = $row['author'];
                $_SESSION['publisher'] = $row['publisher'];
                $_SESSION['genre'] = $row['genre'];
            	header("Location: memHome.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect Book not found");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect book not found");
	        exit();
		}
        //
        //updatas began here 
        //
        if(isset($_SESSION['id'])) {
            $a = $_SESSION['id'];
            $b = $_SESSION['isbn'];
    
            if (empty($book1)) {
                //include "connDB.php";
                $sql1 = "UPDATE library_members SET book1 = '$b' id = $a";
                $sql2 = "UPDATE books SET books_in = books_in - 1, books_out = books_out + 1  WHERE isbn = '$b'";
                
                if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                    echo "Title1 was selected and database updated successfully on book1";
                } else {
                    echo "Error updating database: " . mysqli_error($conn);
                }
            } else if(empty($book2)) {
                $sql1 = "UPDATE library_members SET book2 = '$b' id = $a";
                $sql2 = "UPDATE books SET books_in = books_in - 1, books_out = books_out + 1  WHERE isbn = '$b'";
                
                if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
                    echo "Title1 was selected and database updated successfully on book2";
                } else {
                    echo "Error updating database: " . mysqli_error($conn);
                }
            }
            else {
                echo "Only 2 book at the time";
            }
        } else {
            echo "Error: 'isbn' or 'id' parameter is missing";
        }
        }//end of function 


        //if statements 
        if(array_key_exists('book1', $_POST)) { 
            title1();
        } 
        else if(array_key_exists('book2', $_POST)) { 
            title2(); 
        } 

    ?>
<form method="post"> 
        <input type="submit" name="title1"
                class="button" value="tile1" /> 
          
        <input type="submit" name="title2"
                class="button" value="title2" /> 
    </form> 
</body> 
 </html>
