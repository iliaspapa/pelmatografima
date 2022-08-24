<?php
    include_once "header.php";

    $id = $_GET['id'];
    $peid=$_GET['peid'];
    $pnEnc=$_GET['pnEnc'];
    $plnEnc=$_GET['plnEnc'];
    $pstreet=$_GET['pstreet'];
    $pnumber=$_GET['pnumber'];
    $ptown=$_GET['ptown'];
    $ptk=$_GET['ptk'];
    $pcountry=$_GET['pcountry'];
    $phone1=$_GET['phone1'];
    $country_code_1=$_GET['country_code_1'];
    $type1=$_GET['type1'];
    $phone2=$_GET['phone2'];
    $country_code_2=$_GET['country_code_2'];
    $type2=$_GET['type2'];
    $phone3=$_GET['phone3'];
    $country_code_3=$_GET['country_code_3'];
    $type3=$_GET['type3'];
    $sid=$_GET['sid'];
    $snEnc=$_GET['snEnc'];                                                                  
    $slnEnc=$_GET['slnEnc'];
    $sstreet=$_GET['sstreet'];
    $snumber=$_GET['snumber'];
    $stown=$_GET['stown'];
    $stk=$_GET['stk'];
    $scountry=$_GET['scountry'];
    $sphone1=$_GET['sphone1'];
    $scountry_code_1=$_GET['scountry_code_1'];
    $stype1=$_GET['stype1'];
    $sphone2=$_GET['sphone2'];
    $scountry_code_2=$_GET['scountry_code_2'];
    $stype2=$_GET['stype2'];
    $sphone3=$_GET['sphone3'];
    $scountry_code_3=$_GET['scountry_code_3'];
    $stype3=$_GET['stype3'];
    $pid=$_GET['pid'];
    $perigrafi=$_GET['perigrafi'];
    $date_out=$_GET['date'];
    $penc=$_GET['penc'];
    $inmov=isset($_GET['inmov']);
    $counter=1;
    $counter2=1;
    $counter1=1;
    if($peid!='')
    {
        $query = "SELECT * FROM synalasomenoi WHERE ID='$peid';";
        $result = mysqli_query($connection,$query);
        $counter = mysqli_num_rows($result);
    }
    if($sid!='')
    {
        $query = "SELECT * FROM synalasomenoi WHERE ID='$sid';";
        $result = mysqli_query($connection,$query);
        $counter1 = mysqli_num_rows($result);
    }
    if($pid!='')
    {
        $query = "SELECT * FROM pelma WHERE ID='$pid';";
        $result = mysqli_query($connection,$query);
        $counter2 = mysqli_num_rows($result);
    }
    if($pid=='')
    {
        header("location: polisi.php?ID=$id&status=πρέπει να βάλετε πέλμα");
    }
    else if($peid==''&&($pnEnc==''||$plnEnc==''))
    {
        header("location: polisi.php?ID=$id&status=πρέπει να βάλετε πελάτη");
    }
    else if($date_out=='')
    {
        header("location: polisi.php?ID=$id&status=κενή ημερομηνία");
    }
    else if($key==42)
    {
        header("location: polisi.php?ID=$id&status=δεν είστε συνδεδεμένοι");
    }
    else if($phone1!=''&&($phone1>9999999999||$phone1<1000000000))
    {
        header("location: polisi.php?ID=$id&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($phone2!=''&&($phone2>9999999999||$phone2<1000000000))
    {
        header("location: polisi.php?ID=$id&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($phone3!=''&&($phone3>9999999999||$phone3<1000000000))
    {
        header("location: polisi.php?ID=$id&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    // else if($sid==''&&($snEnc==''||$slnEnc==''))
    // {
    //     header("location: polisi.php?ID=$id&status=πρέπει να βάλετε συνεργάτη");
    // }
    else if($sphone1!=''&&($sphone1>9999999999||$sphone1<1000000000))
    {
        header("location: polisi.php?ID=$id&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($sphone2!=''&&($sphone2>9999999999||$sphone2<1000000000))
    {
        header("location: polisi.php?ID=$id&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($sphone3!=''&&($sphone3>9999999999||$sphone3<1000000000))
    {
        header("location: polisi.php?ID=$id&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($counter==0)
    {
        header("location: polisi.php?ID=$id&status=δεν υπάρχει αυτός ο πελάτης");
    }
    else if($counter1==0)
    {
        header("location: polisi.php?ID=$id&status=δεν υπάρχει αυτός ο συνεργάτης");
    }
    else if($counter2==0)
    {
        header("location: polisi.php?ID=$id&status=δεν υπάρχει αυτό το πέλμα");
    }
    else
    {
        $query = "SELECT * FROM polisi WHERE ID=$id;";
        $result = mysqli_query($connection,$query);
        $old = mysqli_fetch_array($result);
        if($peid==$old['idpel'])
        {
            //echo encrypt($key,$pnEnc);
            $query = "UPDATE synalasomenoi 
                      SET  nEnc='".encrypt($key,$pnEnc)."',lnEnc='".encrypt($key,$plnEnc)."',street='$pstreet',
                      number='$pnumber',town='$ptown',tk='$ptk',country='$pcountry',paroxos='0',dateofadmition='$date_out'
                      WHERE ID='$peid';";
            mysqli_query($connection,$query);
            echo mysqli_error($connection);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("location: polisi.php?ID=$id&status=peid->$errno:$error");
            }
            $query = "SELECT * FROM phones WHERE owner_id='$peid';";
            $result = mysqli_query($connection,$query);
            $cnt = mysqli_num_rows($result);
            for($i=1;$i<=$cnt;$i++)
            {
                if($_GET['phone'.$i]!='')
                {
                    $p=$_GET['phone'.$i];
                    $t=$_GET['type'.$i];
                    $c=$_GET['country_code_'.$i];
                    // echo "$p<br>";
                    // echo "$c<br>";
                    // echo "$t<br>";
                    $query = "SELECT ID FROM phones WHERE owner_id='$peid' LIMIT ".strval($i-1).",1;";
                    $result=mysqli_query($connection,$query);
                    $r=mysqli_fetch_array($result);
                    $query = "UPDATE phones 
                              SET number='$p',owner_id='$peid',type='$t',country_code='$c'
                              WHERE ID='".$r['ID']."'";
                    // echo $query;
                    
                    echo $query." $i<br>";
                    mysqli_query($connection,$query);
                    echo mysqli_error($connection);
                    if(mysqli_error($connection)!='')
                    {
                        $errno=mysqli_errno($connection);
                        $error=mysqli_error($connection);
                        $error=preg_replace("/\n/", "%0A", $error);
                        $error=preg_replace('/\s+/', '%0A', $error);
                        header("location: polisi.php?ID=$id&status=phone->$errno:$error");
                    }
                }
            }
            for($i=$cnt+1;$i<4;$i++)
            {
                if($_GET['phone'.$i]!='')
                {
                    $p=$_GET['phone'.$i];
                    $t=$_GET['type'.$i];
                    $c=$_GET['country_code_'.$i];
                    // echo "$p<br>";
                    // echo "$c<br>";
                    // echo "$t<br>";
                    $query = "INSERT INTO phones (number,owner_id,type,country_code)
                              VALUES ('$p','$peid','$t','$c');";
                    echo $query." $i<br>";
                    mysqli_query($connection,$query);
                    // echo mysqli_error($connection);
                    if(mysqli_error($connection)!='')
                    {
                        $errno=mysqli_errno($connection);
                        $error=mysqli_error($connection);
                        $error=preg_replace("/\n/", "%0A", $error);
                        $error=preg_replace('/\s+/', '%0A', $error);
                        header("location: polisi.php?ID=$id&status=sphone->$errno:$error");
                    }
                }
            }
        }
        if($sid==$old['idsun'] && $sid!='')
        {
            $query = "UPDATE synalasomenoi 
                      SET  nEnc='".encrypt($key,$snEnc)."',lnEnc='".encrypt($key,$slnEnc)."',street='$sstreet',
                      number='$snumber',town='$stown',tk='$stk',country='$scountry',paroxos='0',dateofadmition='$date_out'
                      WHERE ID='$sid';";
            mysqli_query($connection,$query);
            echo mysqli_error($connection);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("location: polisi.php?ID=$id&status=sid->$errno:$error");
            }
            $query = "SELECT * FROM phones WHERE owner_id='$sid';";
            $result = mysqli_query($connection,$query);
            $cnt = mysqli_num_rows($result);
            for($i=1;$i<=$cnt;$i++)
            {
                if($_GET['sphone'.$i]!='')
                {
                    $p=$_GET['sphone'.$i];
                    $t=$_GET['stype'.$i];
                    $c=$_GET['scountry_code_'.$i];
                    $query = "SELECT ID FROM phones WHERE owner_id='$peid' LIMIT ".strval($i-1).",1;";
                    $result=mysqli_query($connection,$query);
                    $r=mysqli_fetch_array($result);
                    $query = "UPDATE phones 
                              SET number='$p',owner_id='$sid',type='$t',country_code='$c'
                              WHERE ID='".$r['ID']."'";
                    echo $query." $i<br>";
                    mysqli_query($connection,$query);
                    echo mysqli_error($connection);
                    if(mysqli_error($connection)!='')
                    {
                        $errno=mysqli_errno($connection);
                        $error=mysqli_error($connection);
                        $error=preg_replace("/\n/", "%0A", $error);
                        $error=preg_replace('/\s+/', '%0A', $error);
                        header("location: polisi.php?ID=$id&status=sphone->$errno:$error");
                    }
                }
            }
            for($i=$cnt+1;$i<4;$i++)
            {
                if($_GET['sphone'.$i]!='')
                {
                    $p=$_GET['sphone'.$i];
                    $t=$_GET['stype'.$i];
                    $c=$_GET['scountry_code_'.$i];
                    $query = "INSERT INTO phones (number,owner_id,type,country_code)
                              VALUES ('$p','$sid','$t','$c');";
                    echo $query." $i<br>";
                    mysqli_query($connection,$query);
                    echo mysqli_error($connection);
                    if(mysqli_error($connection)!='')
                    {
                        $errno=mysqli_errno($connection);
                        $error=mysqli_error($connection);
                        $error=preg_replace("/\n/", "%0A", $error);
                        $error=preg_replace('/\s+/', '%0A', $error);
                        header("location: polisi.php?ID=$id&status=sphone->$errno:$error");
                    }
                }
            }
        }
        if($sid=='')
        {
            $sid="NULL";
        }
        else{
            $sid="'".$sid."'";
        }
        $query = "UPDATE polisi 
                  SET idpel='$peid',idsun=$sid,idpelm='$pid',penc='".encrypt($key,$penc)."',date='$date_out',inmov='$inmov'
                  WHERE ID=$id;";
        mysqli_query($connection,$query);
        echo mysqli_error($connection);
        if(mysqli_error($connection)!='')
        {
            $errno=mysqli_errno($connection);
            $error=mysqli_error($connection);
            $error=preg_replace("/\n/", "%0A", $error);
            $error=preg_replace('/\s+/', '%0A', $error);
            header("location: polisi.php?ID=$id&status=$errno:$error");
        }
        if($pid==$old['idpelm'])
        {
            $query = "UPDATE pelma SET date_out='$date_out',perigrafi='$perigrafi' WHERE ID='$pid';";
            echo $query."<br>";
            mysqli_query($connection,$query);
            echo mysqli_error($connection);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("location: polisi.php?ID=$id&status=pid->$errno:$error");
            }
        }
        else
        {
            $query = "UPDATE pelma SET date_out=NULL,perigrafi=NULL WHERE ID='".$old['idpelm']."';";
            mysqli_query($connection,$query);
            echo mysqli_error($connection);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("location: polisi.php?ID=$id&status=pid->$errno:$error");
            }
        }
        header("location: polisi.php?ID=$id&status=successful&id=$id&c=πελάτη");
    }
    