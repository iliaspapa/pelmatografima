<?php 
    session_start();
    include_once "dbhandler.php";
?>
<html>
<head>
  <title>Πελατολόγιο</title>
  <meta name="viewport" content="width=device-width, initial-scale=1",charset=utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    fieldset {
        background-color: #eeeeee;
        width:500px;
    }

    legend {
        background-color: gray;
        color: white;
        padding: 5px 10px;
    }
    label {
        display: inline-block;
        width: 240px;
        text-align: center;
    }​
    input[type=text] {
        width: 15%;
        box-sizing: border-box;
    }
    input[type=date] {
        width: 13%;
        box-sizing: border-box;
    }
    table, th, td {
    border: 1px solid black;
    }
    white-space: pre-wrap;  
  </style>
</head>
<body>

<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }   
    $key = "42";
    include "ecnryption.php";
    //echo encrypt("1234","σωστός κωδικός!");
    if(isset($_POST['Key']))
    {
        $key = $_POST['Key'];
        echo decrypt($key,"a0xLbUVnYXBiL1BIZE5xS29IQVdtSXhCWVVrWWFEdUlvUHdXcWptdUNKRT06Or+yUCKhCObKCcMrceRgPy4=");
        $_SESSION['Key'] = $key;
    }
    else if(isset($_SESSION['Key']))
    {
        $key = $_SESSION['Key'];
            echo decrypt($key,"a0xLbUVnYXBiL1BIZE5xS29IQVdtSXhCWVVrWWFEdUlvUHdXcWptdUNKRT06Or+yUCKhCObKCcMrceRgPy4=");
    }
    header('Content-Type: text/html; charset=utf-8');
    ?>
<header>
    <center>                                            
        <a class="btn btn-primary btn-lg" href="index.php">HOME</a>
        <a class="btn btn-info btn-lg" href="addbuy.php">προθηκη αγορας</a> 
        <a class="btn btn-warning btn-lg" href="addsell.php">προσθηκη πωλησης</a>
        <a class="btn btn-success btn-lg" href="apothiki.php">αποθήκη</a> 
<?php 
    if (isset($_SESSION['Key'])&&$_SESSION['Key']!=42){
        echo '<a class="btn btn-danger btn-lg" href="login.php">logout</a>';
    }
    else{
        echo '<a class="btn btn-danger btn-lg" href="login.php">login</a>';
    }
?>
    </center>

</header>
<?php
    include_once "functions.php";
    include "status.php";
?>
