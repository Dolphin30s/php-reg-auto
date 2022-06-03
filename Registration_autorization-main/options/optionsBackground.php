<?php 
    session_start();
?>

<form action="setNewBackground.php" method="post" enctype="multipart/form-data">
    <input type="file" name="bacground">
    <button type="submit">изменить</button>
</form>