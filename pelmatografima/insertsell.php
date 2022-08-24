<?php
    include_once "header.php";

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
    $pmodel=$_GET['pmodel'];
    $plot=$GET['plot'];
    $perigrafi=$_GET['perigrafi'];
    $date_out=$_GET['date_out'];
    $penc=$_GET['penc'];
    $inmov=isset($_GET['inmov']);
    $counter=1;
    $counter2=1;
    $counter1=1;
    if($date_out=='')$date_out=date("Y-m-d");
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
    else
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=πρέπει να βάλετε πέλμα");
    }
    if($peid==''&&($pnEnc==''||$plnEnc==''))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=πρέπει να βάλετε πελάτη");
    }
    else if($key==42)
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=δεν είστε συνδεδεμένοι");
    }
    else if($peid!=''&&($pnEnc!=''||$plnEnc!=''))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=πρέπει να διαλέξετε είτε παλιό είτε νέο πελάτη");
    }
    else if($phone1!=''&&($phone1>9999999999||$phone1<1000000000))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($phone2!=''&&($phone2>9999999999||$phone2<1000000000))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($phone3!=''&&($phone3>9999999999||$phone3<1000000000))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($sid==''&&($snEnc==''||$slnEnc==''))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=πρέπει να βάλετε συνεργάτη");
    }
    else if($sid!=''&&($snEnc!=''||$slnEnc!=''))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=πρέπει να διαλέξετε είτε παλιό είτε νέο συνεργάτη");
    }
    else if($sphone1!=''&&($sphone1>9999999999||$sphone1<1000000000))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($sphone2!=''&&($sphone2>9999999999||$sphone2<1000000000))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($sphone3!=''&&($sphone3>9999999999||$sphone3<1000000000))
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=το τηλέφωνο πρέπει να είναι 10 ψηφία");
    }
    else if($counter==0)
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=δεν υπάρχει αυτός ο πελάτης");
    }
    else if($counter1==0)
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=δεν υπάρχει αυτός ο συνεργάτης");
    }
    else if($counter2==0)
    {
        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=δεν υπάρχει αυτό το πέλμα");
    }
    else
    {
        if($peid=='')
        {
            echo encrypt($key,$pnEnc);
            $query = "INSERT INTO synalasomenoi (nEnc,lnEnc,street,number,town,tk,country,paroxos,dateofadmition) 
                      VALUES ('".encrypt($key,$pnEnc)."','".encrypt($key,$plnEnc)."','$pstreet','$pnumber','$ptown',
                      '$ptk','$pcountry','0','$date_out');";
            mysqli_query($connection,$query);
            echo mysqli_error($connection);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=peid->$errno:$error");
            }
            $query = " SELECT ID FROM synalasomenoi ORDER BY ID DESC LIMIT 1;";
            $result = mysqli_query($connection,$query);
            $counter = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            $peid=$row['ID'];
            for($i=1;$i<4;$i++)
            {
                if($_GET['phone'.$i]!='')
                {
                    $p=$_GET['phone'.$i];
                    $t=$_GET['type'.$i];
                    $c=$_GET['country_code_'.$i];
                    echo "$p<br>";
                    echo "$c<br>";
                    echo "$t<br>";
                    $query = "INSERT INTO phones (number,owner_id,type,country_code)
                              VALUES ('$p','$peid','$t','$c');";
                    echo $query;
                    mysqli_query($connection,$query);
                    echo mysqli_error($connection);
                    if(mysqli_error($connection)!='')
                    {
                        $errno=mysqli_errno($connection);
                        $error=mysqli_error($connection);
                        $error=preg_replace("/\n/", "%0A", $error);
                        $error=preg_replace('/\s+/', '%0A', $error);
                        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=phone->$errno:$error");
                    }
                }
            }
        }
        if($sid=='')
        {
            $query = "INSERT INTO synalasomenoi (nEnc,lnEnc,street,number,town,tk,country,paroxos,dateofadmition) 
                      VALUES ('".encrypt($key,$snEnc)."','".encrypt($key,$slnEnc)."','$sstreet','$snumber','$stown',
                      '$stk','$scountry','1','$date_out');";
            mysqli_query($connection,$query);
            echo mysqli_error($connection);
            if(mysqli_error($connection)!='')
            {
                $errno=mysqli_errno($connection);
                $error=mysqli_error($connection);
                $error=preg_replace("/\n/", "%0A", $error);
                $error=preg_replace('/\s+/', '%0A', $error);
                header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=sid->$errno:$error");
            }
            $query = " SELECT ID FROM synalasomenoi ORDER BY ID DESC LIMIT 1;";
            $result = mysqli_query($connection,$query);
            $counter = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            $sid=$row['ID'];
            for($i=1;$i<4;$i++)
            {
                if($_GET['sphone'.$i]!='')
                {
                    $p=$_GET['sphone'.$i];
                    $t=$_GET['stype'.$i];
                    $c=$_GET['scountry_code_'.$i];
                    $query = "INSERT INTO phones (number,owner_id,type,country_code)
                              VALUES ('$p','$sid','$t','$c');";
                    mysqli_query($connection,$query);
                    echo mysqli_error($connection);
                    if(mysqli_error($connection)!='')
                    {
                        $errno=mysqli_errno($connection);
                        $error=mysqli_error($connection);
                        $error=preg_replace("/\n/", "%0A", $error);
                        $error=preg_replace('/\s+/', '%0A', $error);
                        header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=sphone->$errno:$error");
                    }
                }
            }
        }
        $query = "INSERT INTO polisi (idpel,idsun,idpelm,penc,date,inmov) 
                  VALUES ('$peid','$sid','$pid','".encrypt($key,$penc)."','$date_out','$inmov');";
        mysqli_query($connection,$query);
        echo mysqli_error($connection);
        if(mysqli_error($connection)!='')
        {
            $errno=mysqli_errno($connection);
            $error=mysqli_error($connection);
            $error=preg_replace("/\n/", "%0A", $error);
            $error=preg_replace('/\s+/', '%0A', $error);
            header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=$errno:$error");
        }
        $query = "UPDATE pelma SET date_out='$date_out',perigrafi='$perigrafi',pmodel='$pmodel',plot='$plot' WHERE ID='$pid';";
        mysqli_query($connection,$query);
        echo mysqli_error($connection);
        if(mysqli_error($connection)!='')
        {
            $errno=mysqli_errno($connection);
            $error=mysqli_error($connection);
            $error=preg_replace("/\n/", "%0A", $error);
            $error=preg_replace('/\s+/', '%0A', $error);
            header("location: addsell.php?peid=$peid&pnEnc=$pnEnc&plnEnc=$plnEnc&pstreet=$pstreet&pnumber=$pnumber&ptown=$ptown&ptk=$ptk&pcountry=$pcountry&phone1=$phone1&country_code_1=$country_code_1&type1=$type1&phone2=$phone2&country_code_2=$country_code_2&type2=$type2&phone3=$phone3&country_code_3=$country_code_3&type3=$type3&sid=$sid&snEnc=$snEnc&slnEnc=$slnEnc&sstreet=$sstreet&snumber=$snumber&stown=$stown&stk=$stk&scountry=$scountry&sphone1=$sphone1&scountry_code_1=$scountry_code_1&stype1=$stype1&sphone2=$sphone2&scountry_code_2=$scountry_code_2&stype2=$stype2&sphone3=$sphone3&scountry_code_3=$scountry_code_3&stype3=$stype3&pid=$pid&pmodel=$pmodel&plot=$plot&perigrafi=$perigrafi&date_out=$date_out&penc=$penc&inmov=$inmov&status=pid->$errno:$error");
        }
        header("location: addsell.php?status=successful&id=$peid&c=πελάτη");
    }
    