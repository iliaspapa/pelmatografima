<?php include "header.php";
    if(isset($_SESSION['Key'])&&$_SESSION['Key']!=42){
        $_SESSION['Key'] = 42;
        header("Location: index.php");
    }
    else{
        echo '<h1><center><b>Input the key</b></center></h1>
            <center>
                <form action = "index.php" method = "POST" id = "myform" name = "myform">
                    <input type = "password" name = "Key" placeholder = "key">
                    <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                        submit
                    </button>
                </form> 
            
            </center>';
    }
?>


