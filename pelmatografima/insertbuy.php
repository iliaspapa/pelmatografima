<?php
    include_once "header.php";
    
    $fmodel = $_GET['fmodel'];
    $flot = $_GET['flot'];
    $pmodel = '';
    $plot = '';
    $size = $_GET['size'];
    $kataskeuastis = $_GET['kataskeuastis'];
    $date_in = $_GET['date_in'];
    $penc = $_GET['penc'];
    $quantity = $_GET['quantity'];

    $penc2 = encrypt($key,$penc);

    if($fmodel=='')
    {
        echo 42;
        header("Location: addbuy.php?fmodel=$fmodel&flot=$flot&pmodel=$pmodel&plot=$plot&size=$size&kataskeuastis=$kataskeuastis&date_in=$date_in&penc=$penc&quantity=$quantity&status=το μοντέλο εργοστασίου είναι κενό");
    }
    else if($key==42)
    {
        header("Location: addbuy.php?fmodel=$fmodel&flot=$flot&pmodel=$pmodel&plot=$plot&size=$size&kataskeuastis=$kataskeuastis&date_in=$date_in&penc=$penc&quantity=$quantity&status=δεν εχετε συνδεθεί");
    }
    else if($flot=='')
    {
        header("Location: addbuy.php?fmodel=$fmodel&flot=$flot&pmodel=$pmodel&plot=$plot&size=$size&kataskeuastis=$kataskeuastis&date_in=$date_in&penc=$penc&quantity=$quantity&status=το LOT εργοστασίου είναι κενό");
    }
    else if($size=='')
    {
        header("Location: addbuy.php?fmodel=$fmodel&flot=$flot&pmodel=$pmodel&plot=$plot&size=$size&kataskeuastis=$kataskeuastis&date_in=$date_in&penc=$penc&quantity=$quantity&status=το νούμερο πέλματος είναι κενό");
    }
    else if($kataskeuastis=='')
    {
        header("Location: addbuy.php?fmodel=$fmodel&flot=$flot&pmodel=$pmodel&plot=$plot&size=$size&kataskeuastis=$kataskeuastis&date_in=$date_in&penc=$penc&quantity=$quantity&status=ο κατασκευασατής  είναι κενός");
    }
    else if($quantity=='')
    {
        header("Location: addbuy.php?fmodel=$fmodel&flot=$flot&pmodel=$pmodel&plot=$plot&size=$size&kataskeuastis=$kataskeuastis&date_in=$date_in&penc=$penc&quantity=$quantity&status=επιλεξτε αριθμό τεμαχίων");

    }
    else
    {
        if($date_in=='')$date_in=date('Y-m-d');
        $size2=explode(",",$size);
        foreach($size2 as $i){
            $i=intval($i);
        }
        $sizel=min($size2);
        $sizeh=max($size2);
        for($i=0;$i<$quantity;$i++)
        {
            $query = "INSERT INTO pelma (fmodel,flot,sizel,sizeh,kataskeuastis,perigrafi,date_in,date_out)
                    VALUES ( '$fmodel' , '$flot' , '$sizel' , '$sizeh' , '$kataskeuastis' , NULL,
                    '$date_in' , NULL);";
            mysqli_query($connection,$query);
            //echo mysqli_error($connection);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("Location: addbuy.php?fmodel=$fmodel&flot=$flot&pmodel=$pmodel&plot=$plot&size=$size&kataskeuastis=$kataskeuastis&date_in=$date_in&penc=$penc&quantity=$quantity&status=$errno:$error");
            }
            $query = " SELECT ID FROM pelma ORDER BY ID DESC LIMIT 1;";
            $result = mysqli_query($connection,$query);
            $counter = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            $pid=$row['ID'];
            echo $pid;
            $query = "INSERT INTO prosthiki (pelmID,penc,date) VALUES ('$pid','$penc2','$date_in');";
            mysqli_query($connection,$query);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("Location: addbuy.php?fmodel=$fmodel&flot=$flot&pmodel=$pmodel&plot=$plot&size=$size&kataskeuastis=$kataskeuastis&date_in=$date_in&penc=$penc&quantity=$quantity&status=$errno:$error");
            }
        }
        header("Location: addbuy.php?status=successful&id=$pid&c=πέλμα");
    }