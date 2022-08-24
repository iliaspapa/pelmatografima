<?php
    include "header.php";
    echo "0%<br>";
    $myfile = fopen("backup/backup.csv", "w") or die("Unable to open file!");
    fwrite($myfile,"\xEF\xBB\xBF"."Πέλματα\n");
    $query = "SELECT * FROM pelma;";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$i.';');
    }
    fwrite($myfile,"\n");
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
        else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
    }
    fwrite($myfile,"\n");
    while($row = mysqli_fetch_array($result))
    {
        foreach($row as $i=>$j)
        {
            if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
            else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".str_replace(";",',',$j).';')  ;
        }
        fwrite($myfile,"\n");
    }
    echo "20%<br>";
    fwrite($myfile,"\xEF\xBB\xBF"."συναλασώμενοι\n");
    $query = "SELECT * FROM synalasomenoi;";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$i.';');
    }
    fwrite($myfile,"\n");
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))
        {
            fwrite($myfile,mb_convert_encoding("\xEF\xBB\xBF".decrypt($key,$j).';','utf8'));
            echo mb_convert_encoding(decrypt($key,$j).';','utf8');
        }
        else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
    }
    fwrite($myfile,"\n");
    while($row = mysqli_fetch_array($result))
    {
        foreach($row as $i=>$j)
        {
            if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
            else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
        }
        fwrite($myfile,"\n");
    }
    echo "40%<br>";
    fwrite($myfile,"τηλέφωνα\n");
    $query = "SELECT * FROM phones;";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$i.';');
    }
    fwrite($myfile,"\n");
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
        else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
    }
    fwrite($myfile,"\n");
    while($row = mysqli_fetch_array($result))
    {
        foreach($row as $i=>$j)
        {
            if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
            else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
        }
        fwrite($myfile,"\n");
    }
    echo "60%<br>";
    fwrite($myfile,"αγορες\n");
    $query = "SELECT * FROM prosthiki;";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$i.';');
    }
    fwrite($myfile,"\n");
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
        else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
    }
    fwrite($myfile,"\n");
    while($row = mysqli_fetch_array($result))
    {
        foreach($row as $i=>$j)
        {
            if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
            else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
        }
        fwrite($myfile,"\n");
    }
    echo "80%<br>";
    fwrite($myfile,"Πωλήσεις\n");
    $query = "SELECT * FROM polisi;";
    $result = mysqli_query($connection,$query);
    $row = mysqli_fetch_array($result);
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$i.';');
    }
    fwrite($myfile,"\n");
    if($row!=false)foreach($row as $i=>$j)
    {
        if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
        else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
    }
    fwrite($myfile,"\n");
    while($row = mysqli_fetch_array($result))
    {
        foreach($row as $i=>$j)
        {
            if(!is_numeric($i)&&(substr($i,-3)=="Enc"||substr($i,-3)=="enc"))fwrite($myfile,"\xEF\xBB\xBF".decrypt($key,$j).';');
            else if(!is_numeric($i))fwrite($myfile,"\xEF\xBB\xBF".$j.';');
        }
        fwrite($myfile,"\n");
    }
    // $txt = "John Doe\n";
    // fwrite($myfile, $txt);
    // $txt = "Jane Doe\n";
    // fwrite($myfile, $txt);
    fclose($myfile);
    echo "100%<br>";
    if($row==false)header("Location: index.php");