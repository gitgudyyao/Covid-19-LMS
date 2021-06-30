<?php
$con = mysqli_connect("localhost","root","","lms");
if (!$con){
	die("Database connection failed");
}
mysqli_query($con,'SET CHARACTER SET utf8');
mysqli_query($con,"SET SESSION collation_connection ='utf8_general_ci'");


$issueid = base64_decode($_GET['issueid']);
$bookpriceresults = mysqli_query($con,"SELECT issuebook.price as bookprice FROM issuebook WHERE id = $issueid");
$bookprice = mysqli_fetch_assoc($bookpriceresults);
$price = --$bookprice['bookprice'];

$avaiblequnitity = mysqli_query($con,"SELECT books.avaible_qty as quintity FROM issuebook JOIN books ON issuebook.book_id = books.id WHERE issuebook.id = $issueid");
$finalqunitity = mysqli_fetch_assoc($avaiblequnitity);
$qunity = ++$finalqunitity['quintity'];

$currentdate = date("Y-m-d");
$updatequery = "UPDATE issuebook SET return_date =' $currentdate', price = $price  WHERE issuebook.id = $issueid";
$updatequintity = "UPDATE books JOIN issuebook ON books.id = issuebook.book_id SET books.avaible_qty = $qunity WHERE issuebook.id = $issueid";

$issueupdate = mysqli_query($con,$updatequery);
$bookquintity = mysqli_query($con,$updatequintity);

if ($issueupdate && $bookquintity ){
    header("location: returnbook.php");
}

?>