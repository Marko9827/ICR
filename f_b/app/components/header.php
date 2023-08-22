<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $this->pginfo($_GET['p']); ?></title>
  <!-- Include Bootstrap CSS -->
  <style type="text/css"> 
     <?php 
     
     $this->include("components/css/main.css");
     ?>
  </style>
  <link href="/f_b/node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>