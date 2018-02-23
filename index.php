<?php
   require_once('admin/phpscripts/config.php');
   if(isset($_GET['filter'])){
     $tbl = "tbl_movies";
 		 $tbl2 = "tbl_genre";
 	   $tbl3 = "tbl_mov_genre";
 		 $col = "movies_id";
 		 $col2 = "genre_id";
 		 $col3 = "genre_name";
     $filter = $_GET['filter'];
     $getMovies = filterType($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
   }else{
     $tbl = "tbl_movies";
     $getMovies = getAll($tbl);
   }



?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to a bunch of movies!</title>
</head>
<body>
  <?php
    include('includes/nav.html');

    // ! means not, so not a string.
    if(!is_string($getMovies)){
      while($row = mysqli_fetch_array($getMovies)){
        echo "<img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
        <h2>{$row['movies_title']}</h2>
        <p>{$row['movies_year']}</p>
        <a href=\"details.php?id={$row['movies_id']}\">More Details</a>
        <br><br>
        "; // \ makes the " not count as a close to the string the img tag is in

      }
    }else{
        echo "<p class=\"error\">{$getMovies}</p>";
    }

    include('includes/footer.html');
  ?>
</body>
</html>
