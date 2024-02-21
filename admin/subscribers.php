<?php
include_once "../config.php";

?>

<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin</title>
    <?php include_once "includes/head.php"?>
</head>

<body class="crm_body_bg">

        <?php include_once "includes/navbar.php" ?>

        <section class="main_content dashboard_part large_header_bg">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Subscribers</th>
      <th scope="col">Sent mail</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM subscribers";
    $run = mysqli_query($conn , $sql);
    while($sub = mysqli_fetch_assoc($run)){
     ?>
        <tr>
            <th scope="row"><?=$sub['id']?></th>
            <td><?=$sub['mail']?></td>
            <td><a href="mailto:<?=$sub['mail']?>"><i class="fa-sharp fa-solid fa-paper-plane"></i></a></td>
        </tr>
     <?php
    }
    ?>
    
  </tbody>
</table>
        </section>


    <?php include_once "includes/library.php"?>
</body>

</html>