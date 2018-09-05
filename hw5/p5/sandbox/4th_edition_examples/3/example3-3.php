<?php
  $mycounter = 1;
  $mystring  = "Hello";
  $myarray   = array("One", "Two", "Three");
?>

<?php
$mycounter = 1; echo $mycounter; echo "<br />";
$mystring	= "Hello"; echo $mystring;
echo "<br />";
$myarray	= array("One", "Two", "Three");
echo $myarray; // not quite what you expected, right? echo "<br />";
foreach ($myarray as $item)
{
echo $item; echo "<br />";
}
?>
