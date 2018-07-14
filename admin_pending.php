<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'test3');
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>


<?php
$query = "SELECT volunteer_name,book_title,link FROM records where status='pending'";
$response = @mysqli_query($dbc, $query) ;
if($response){
echo '<table align="left"
cellspacing="5" cellpadding="8">
<tr><td align="left"><b>Volunteer Name</b></td>
<td align="left"><b>Book Title</b></td>
<td align="left"><b>Link</b></td>

</tr>';
while($row = mysqli_fetch_array($response)){
echo '<tr><td align="left">' .
$row['volunteer_name'] . '</td><td align="left">' .
$row['book_title'] . '</td><td align="left">' .
$row['link'] . '</td><td align="left">';
echo '</tr>';
}
echo '</table>';
} else {
echo "Couldn't issue database query<br />";
echo "mysqli_error($dbc)";
}
mysqli_close($dbc);
?>

