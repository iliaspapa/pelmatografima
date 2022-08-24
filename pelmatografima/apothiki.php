<?php
    include "header.php";

    $query = " SELECT DISTINCT kataskeuastis FROM pelma where date_out is NULL;";
    $result = mysqli_query($connection,$query);
    echo "<center>";
    while($row = mysqli_fetch_array($result))
    {
        echo "<h3>κατασκευαστής: ".$row['kataskeuastis']."</h3><br>";
        $query = "SELECT DISTINCT fmodel, flot FROM (SELECT * FROM pelma WHERE kataskeuastis = '".$row['kataskeuastis']."' AND date_out is NULL ORDER BY flot) as T ORDER BY fmodel;";
        //echo $query;
        $result1 = mysqli_query($connection,$query);
        if(mysqli_error($connection)!='')
        {
            $errno=mysqli_errno($connection);
            $error=mysqli_error($connection);
            $error=preg_replace("/\n/", "%0A", $error);
            $error=preg_replace('/\s+/', '%0A', $error);
            echo "Location: prosthiki.php?ID=$pid&status=$errno:$error";
            header("Location: index.php?ID=$pid&status=$errno:$error");
        }
        while($row1 = mysqli_fetch_array($result1))
        {
            echo "<br><table style='width:80%'   style='border: 1px solid black '>
                    <tr>
                        <th style='width:10%'>μοντέλο</th>
                        <th style='width:10%'>lot</th>";
            $query = "SELECT DISTINCT sizel,sizeh FROM pelma WHERE kataskeuastis = '".$row['kataskeuastis']."' AND 
                        fmodel = '".$row1['fmodel']."' AND flot = '".$row1['flot']."' AND date_out is NULL ORDER BY sizel;";
            $result2 = mysqli_query($connection,$query);
            $cnt = 0;
            $row2[0]=0;
            while($row2[$cnt] = mysqli_fetch_array($result2))
            {
                echo "<th>".$row2[$cnt]['sizel']."-".$row2[$cnt]['sizeh']."</th>";
                $cnt++;
            }
            echo "</tr>
                  <tr>";
            $i=0;
            echo "<td>".$row1['fmodel']."</td><td>".$row1['flot']."</td>";
            while($i<$cnt)
            {
                $query = "SELECT COUNT(*) FROM pelma WHERE kataskeuastis = '".$row['kataskeuastis']."' AND
                            fmodel = '".$row1['fmodel']."' AND flot = '".$row1['flot']."' AND sizel = '".$row2[$i]['sizel']."' AND 
                            sizeh = '".$row2[$i]['sizeh']."' AND date_out is NULL;";
                $res = mysqli_query($connection,$query);
                $ro = mysqli_fetch_array($res);
                echo "<td>".$ro['COUNT(*)']."</td>";
                $i+=1;
            }
            echo "</tr></table>";
        }
        echo "<br><br>";    
    }
    echo "</center><br><br><br></body></html>";
