<?php
session_start();
$id = $_SESSION["id"];

?>
<html>
    <body>
        <p><?= $id ?> さんはログインしています</p>
    </body>
</html>