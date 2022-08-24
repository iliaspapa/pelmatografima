<?php
    include "header.php";
    ini_set('max_execution_time', '0');
    $oldkey = $_GET['oldkey'];
    $newkey = $_GET['newkey'];
    $newkey2 = $_GET['newkey2'];
    $query = "SELECT * FROM synalasomenoi;";        
    $result =mysqli_query($connection,$query);
    $cnt = mysqli_num_rows($result);
    $count = 0;
    while($row = mysqli_fetch_array($result))
    {
        if(decrypt($oldkey,$row['nEnc'])!=false&&decrypt($oldkey,$row['lnEnc'])!=false)$count++;
        else echo $row['ID'].'<br>';
    }
    echo $cnt.' '.$count.'<br>';
    
    if($cnt!=$count)
    {
        // header("Location: login.php?status=λαθος παλιος κωδικος");
    }
    else if($newkey!=$newkey2)
    {
        header("Location: login.php?status=δεν τεριαζουν οι κωδικοι");
    }
    else
    {
        // $newkey='1234';
        $query = "SELECT * FROM synalasomenoi;";
        $result =mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($result))
        {
            $name = encrypt($newkey,decrypt($oldkey,$row['nEnc']));
            $lname = encrypt($newkey,decrypt($oldkey,$row['lnEnc']));
            // echo $name;
            // echo '<br>';
            // echo $lname;
            // echo '<br>';
            $ID = $row['ID'];
            $query = "UPDATE synalasomenoi SET nEnc='$name' , lnEnc='$lname' WHERE ID='$ID';";
            // echo $query;        
            // echo '<br>';
            mysqli_query($connection,$query);
        }
        $query = "SELECT * FROM polisi;";
        $result =mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($result))
        {
            $name = encrypt($newkey,decrypt($oldkey,$row['penc']));
            // echo $name;
            // echo '<br>';
            // echo $lname;
            // echo '<br>';
            $ID = $row['ID'];
            $query = "UPDATE polisi SET penc='$name' WHERE ID='$ID';";
            // echo $query;        
            // echo '<br>';
            mysqli_query($connection,$query);
        }
        // $query = "SELECT * FROM agora;";
        // $result =mysqli_query($connection,$query);
        // while($row=mysqli_fetch_array($result))
        // {
        //     $name = encrypt($newkey,decrypt($oldkey,$row['penc']));
        //     // echo $name;
        //     // echo '<br>';
        //     // echo $lname;
        //     // echo '<br>';
        //     $ID = $row['ID'];
        //     $query = "UPDATE agora SET penc='$name' WHERE ID='$ID';";
        //     // echo $query;        
        //     // echo '<br>';
        //     mysqli_query($connection,$query);
        // }
    }
    // header("Location: index.php");
//     BEGIN;
// DELETE FROM polisi;
// DELETE FROM synalasomenoi;
// DELETE FROM pelma;
// ALTER TABLE polisi AUTO_INCREMENT = 1;
// ALTER TABLE synalasomenoi AUTO_INCREMENT = 1;
// ALTER TABLE pelma AUTO_INCREMENT = 1;
// COMMIT;