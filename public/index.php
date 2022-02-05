<?php
require_once realpath("../vendor/autoload.php");
use src\models\Book;
$dvd = new Book();

?>

<form action="/Book/insertTest" method="post">
    <label name="sku">Insert you name</label>
    <textarea name="sku"></textarea>
    <input type="submit" name="submit" value="Save">
</form>
