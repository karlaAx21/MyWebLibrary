<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>

     <h2> Books: </h2> 
     <p> <?php echo $_SESSION['book1']; ?> </p> 
     <p> <?php echo $_SESSION['book2']; ?> </p> 
     <a href="return.php"><button>return books</button></a>
     <a href="renOut.php"><button>rent books</button></a>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>