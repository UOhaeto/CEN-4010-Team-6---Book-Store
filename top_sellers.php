<!DOCTYPE html>
<html>

<?php
	include("functions/functions.php");
  echo file_get_contents("html/header.php");
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/new_style.css" media="all" </link>
</head>
<body>
	<div class="content" >

		<div id="book_container">

        <?php

            $rec_limit = 5;
            /* Get total number of records */
            $sql = "SELECT count(isbn) FROM books";
            $retval = mysqli_query($con, $sql );

            if(! $retval ) {
            die('Could not get data: ' . mysqli_error($con));
            }
            $row = mysqli_fetch_array($retval  );
            $rec_count = $row[0];

            if( isset($_GET{'page'} ) ) {
            $page = $_GET{'page'};
            $offset = $rec_limit * ($page - 1) ;
            }else {
            $page = 0;
            $offset = 0;
            }

            $left_rec = $rec_count - ($page * $rec_limit);
                    $total_pages = ceil($rec_count / $rec_limit);


            $retval = mysqli_query($con, $sql );

            if(! $retval ) {
            die('Could not get data: ' . mysql_error());
            }


            $get_b = "SELECT * FROM books ORDER BY sold DESC LIMIT $rec_limit OFFSET $offset";

            $run_b = mysqli_query($con, $get_b);

        //connection to db
            global $con;
            //get 6 random books
            //$get_b = "SELECT * FROM book_ratings_view LIMIT ";

            $run_b = mysqli_query($con, $get_b);
            while($row_b=mysqli_fetch_array($run_b)){
                    //initializing variable with book name.
                    $b_title = $row_b['book_title'];
                    $b_price = $row_b['price'];
                    $b_image = $row_b['book_image'];
                    $b_year = $row_b['year'];
                    $b_sold = $row_b['sold'];
                    //$b_rating = round ($row_b['avgRating']);
                    //primary key
                    //used to display individual details page.
                    $b_isbn = $row_b['isbn'];

                echo "
                    <div id='single_book'>
                            <h3>$b_title</h3>
                            <a href='details.php?b_isbn=$b_isbn'><img src='admin/book_images/$b_image' width='150px' height='200px'  /></a>
                            <p> $ $b_price </p>
                            <p> Year: $b_year </p>
                            <p> Sold: $b_sold </p>

                        <div style='margin: auto;'>
                        <a href='details.php?b_isbn=$b_isbn' style='float:left;'>More Info</a>
                        <a href='top_sellers.php?add_cart=$b_isbn&page=$page'><button style='float:right'>Add to Cart</button></a>
                        </div>
                    </div>
                ";

            }
            $pagLink = "<div class='pagination'>";
            for ($i=1; $i<=$total_pages; $i++) {
                if($page == $i){
                    $pagLink .= "<a class='active' href='top_sellers.php?page=".$i."'>".$i."</a>";
                }else{
                    $pagLink .= "<a  href='top_sellers.php?page=".$i."'>".$i."</a>";
                }

            };
            echo $pagLink . "</div>";




        ?>


		</div>

	</div>

</body>
</html>
