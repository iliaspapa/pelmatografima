<?php
    include_once "header.php";
    
    $pid = $_GET['pid'];
    $fmodel = $_GET['fmodel'];
    $flot = $_GET['flot'];
    $pmodel = $_GET['pmodel'];
    $plot = $_GET['plot'];
    $sizeh = $_GET['sizeh'];
    $sizel = $_GET['sizel'];
    $kataskeuastis = $_GET['kataskeuastis'];
    $id = $_GET['id']; 
    $date_in = $_GET['date_in'];
    $penc = $_GET['penc'];
    $all = isset($_GET['all']);

    $penc2 = encrypt($key,$penc);

    if($fmodel=='')
    {
        echo 42;
        header("Location: prosthiki.php?ID=$pid&status=το μοντέλο εργοστασίου είναι κενό");
    }
    else if($key==42)
    {
        header("Location: prosthiki.php?ID=$pid&status=δεν εχετε συνδεθεί");
    }
    else if($flot=='')
    {
        header("Location: prosthiki.php?ID=$pid&status=το LOT εργοστασίου είναι κενό");
    }
    else if($pmodel=='')
    {
        header("Location: prosthiki.php?ID=$pid&status=το μοντέλο pelmatografima είναι κενό");
    }
    else if($plot=='')
    {
        header("Location: prosthiki.php?ID=$pid&status=το LOT pelmatgrafima είναι κενό");
    }
    else if($sizeh=='')
    {
        header("Location: prosthiki.php?ID=$pid&status=το νούμερο πέλματος είναι κενό");
    }
    else if($sizel=='')
    {
        header("Location: prosthiki.php?ID=$pid&status=το νούμερο πέλματος είναι κενό");
    }
    else if($kataskeuastis=='')
    {
        header("Location: prosthiki.php?ID=$pid&status=ο κατασκευασατής  είναι κενός");
    }
    else
    {
        if($date_in=='')
        {
            header("Location: prosthiki.php?ID=$pid&status=η μέρα αγοράς είναι κενή");
        }
        if($all)
        {
            $query = " SELECT * FROM pelma WHERE ID = '$id';";
            $result=mysqli_query($connection,$query);
            //echo mysqli_error($connection);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("Location: prosthiki.php?ID=$pid&status=$errno:$error");
            }
            $counter = mysqli_num_rows($result);
            echo $counter;
            $row = mysqli_fetch_array($result);


            $query = " UPDATE pelma 
                        SET fmodel = '$fmodel',flot = '$flot',pmodel = '$pmodel',plot = '$plot',sizel = '$sizel',sizeh = '$sizeh'
                        ,kataskeuastis = '$kataskeuastis',date_in = '$date_in' 
                        WHERE fmodel = '".$row['fmodel']."' AND flot = '".$row['flot']."' AND pmodel = '".$row['pmodel']."' AND 
                        plot = '".$row['plot']."' AND sizeh = '".$row['sizeh']."' AND sizel = '".$row['sizel']."' AND 
                        kataskeuastis = '".$row['kataskeuastis']."' AND date_in = '".$row['date_in']."';";
        }
        else
        {
            $query = " UPDATE pelma 
                        SET fmodel = '$fmodel',flot = '$flot',pmodel = '$pmodel',plot = '$plot',sizel = '$sizel',sizeh = '$sizeh'
                        ,kataskeuastis = '$kataskeuastis',date_in = '$date_in'
                        WHERE ID=$id;";
        }
        mysqli_query($connection,$query);
        echo $query;
        if(mysqli_error($connection)!='')
        {
            $errno=mysqli_errno($connection);
            $error=mysqli_error($connection);
            $error=preg_replace("/\n/", "%0A", $error);
            $error=preg_replace('/\s+/', '%0A', $error);
            header("Location: prosthiki.php?ID=$pid&status=$errno:$error");
        }
       
        if($all)
        {


            $query = " UPDATE prosthiki PR,
                        pelma PE 
                        SET penc = '$penc2',date = '$date_in'
                        WHERE PE.ID = PR.pelmID AND PE.fmodel = '".$row['fmodel']."' AND PE.flot = '".$row['flot']."' AND 
                        PE.pmodel = '".$row['pmodel']."' AND PE.plot = '".$row['plot']."' AND PE.sizeh = '".$row['sizeh']."' AND 
                        PE.sizel = '".$row['sizel']."' AND PE.kataskeuastis = '".$row['kataskeuastis']."' AND PE.date_in = '".$row['date_in']."';";
        }
        else
        {
            $query = " UPDATE prosthiki PR
                        SET PR.penc = '$penc2',PR.date = '$date_in'
                        WHERE ID=$pid;";
        }
        mysqli_query($connection,$query);
        if(mysqli_error($connection)!='')
        {
            $errno=mysqli_errno($connection);
            $error=mysqli_error($connection);
            $error=preg_replace("/\n/", "%0A", $error);
            $error=preg_replace('/\s+/', '%0A', $error);
            header("Location: prosthiki.php?ID=$pid&status=$errno:$error");
        }   
        header("Location: prosthiki.php?status=successful&ID=$pid&c=πέλμα");
    }