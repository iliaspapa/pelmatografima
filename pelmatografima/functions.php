<?php
    function search_by_model_bar($file,$table){
        if(!isset($_GET['table']))
        {
            echo   '<center>
                    <br><br><br>
                    <b><h2>Aναζήτηση Πέλματος</h2></b>
                    <br>
                    <form action = "'.$file.'" method = "GET" id = "myform" name = "myform">
                        <input type = "hidden" name = "table" value="'.$table.'">
                        <input type = "text" name = "fmodel" placeholder = "μοντέλο εργοστασίου">
                        <input type = "text" name = "flot" placeholder = "LOT εργοστασίου">
                        <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                            search
                        </button>
                    </form> 
                </center>
                </body>
                </html>';
        }
    }
    function show_res($file){
        global $connection,$key;
        if(isset($_GET['table']))
        {
            $table = $_GET['table'];
            if($table=="sunalasomenoi")
            {
                $nEnc = '%'.$_GET['nEnc'].'%';
                $lnEnc = '%'.$_GET['lnEnc'].'%';
                $nEnc = str_replace("%","[A-Za-zΑ-Ωα-ωΉΆΌΊΎΈΏίϊΐόάέύϋΰήώ \']*",$nEnc);
                $nEnc = "/^".$nEnc."$/u";
                $lnEnc = str_replace("%","[A-Za-zΑ-Ωα-ωΉΆΌΊΎΈΏίϊΐόάέύϋΰήώ \']*",$lnEnc);
                $lnEnc = "/^".$lnEnc."$/u";
                //echo "$nEnc<br>";
                $names=array();
                if($_GET['nEnc'] == ''&&$_GET['lnEnc'] == ''){
                    header("Location: ".$file."?status=χρειάζεται να έχετε τουλάχιστον όνομα ή επώνυμο");
                }
                else{
                    $query = " SELECT * FROM synalasomenoi;";
                    $result = mysqli_query($connection,$query);
                    if($result==false){
                        echo "<center> <br><div class='alert alert-danger' role='alert'>
                                Δεν υπάρχει αυτός ο συναλασώμενος
                                </div> </center>";
                    }
                    else
                    {
                        while($row = mysqli_fetch_assoc($result)){
                            // echo $LName;
                            if((preg_match($nEnc,decrypt($key,$row['nEnc']))||$_GET['nEnc']=='')&&(preg_match($lnEnc,decrypt($key,$row['lnEnc']))||$_GET['lnEnc']=='')){
                                array_push($names,$row);
                                // echo 1;
                            }
                        }
                        // echo $names[0][1];
                        if(count($names)==0){
                            echo "<center> <br><div class='alert alert-danger' role='alert'>
                                    Δεν υπάρχει αυτός ο συναλασώμενος
                                    </div> </center>";
                        }
                        else
                        {
                            echo '<br><center><table style="width:50%">
                                    <tr>
                                        <th>ID</th>
                                        <th>Όνομα</th>
                                        <th>Επώνυμο</th>
                                        <th>Ημερομηνία εισαγωγής</th>
                                        <th>πελάτης</th>
                                    </tr>';
                            for($i=0;$i<count($names);$i++)
                            {  
                                if($names[$i]['paroxos'])
                                {
                                    $paroxos="συνεργάτης";
                                }
                                else
                                {
                                    $paroxos="πελάτης";
                                }
                                echo '          <tr>
                                                        <td>'. $names[$i]['ID'].'</td>
                                                        <td>'. decrypt($key,$names[$i]['nEnc']).'</td>
                                                        <td>'. decrypt($key,$names[$i]['lnEnc']).'</td>
                                                        <td>'. $names[$i]['dateofadmition'].'</td>
                                                        <td>'. $paroxos.'</td>
                                                </tr>';
                            }    
                            echo '</center></table>';                       
                        }
                    }
                }
            }
            else if($table=="pelma")
            {
                $fmodel = $_GET['fmodel'];
                $flot = $_GET['flot'];
                if($fmodel == ''&&$flot==''){
                    header("Location: ".$file."?FaName=$FaName&status=χρειάζεται να συμπληρώσετε ένα από τα δύο πεδία τουλάχιστον");
                }
                else{
                    $fmodel='%'.$fmodel.'%';
                    $flot='%'.$flot.'%';
                    $query = " SELECT * FROM pelma WHERE fmodel like '$fmodel' and flot like '$flot' and date_out is NULL;";  
                    $result =  mysqli_query($connection,$query);
                    $counter = mysqli_num_rows($result);
                    if($counter <= 0) {
                        echo "<center> <div class='alert alert-danger' role='alert'>
                                    Δεν υπάρχει τέτοιο πέλμα!!
                                    </div> </center>";
                    } 
                    else{
                        echo '<br><br><center><table style="width:50%">
                                <tr>
                                    <th>id</th>
                                    <th>μοντελο permatografima</th>
                                    <th>LOT pelmatografima</th>
                                    <th>νούμερο</th>
                                    <th>ημερομηνία αγοράς</th>
                                </tr>';
                            while($row=mysqli_fetch_assoc($result))
                            {  
                                echo '          <tr>
                                                    <td>'. $row['ID'] .'</td>
                                                    <td>'. $row['pmodel'].' </td>
                                                    <td>'.$row['plot'].' </td>
                                                    <td>'. $row['sizel'].'-'.$row['sizeh'].' </td>
                                                    <td>'.$row['date_in'].'</td>
                                                </tr>';
                            }    
                        echo '</table></center>';                       
                    }
                }
            }
            echo   '<center>
                        <form action = "'.$file.'" method = "GET" id = "myform" name = "myform">
                            <button type = "submit" class="btn btn-success btn-lg">
                                οκ
                            </button>
                        </form> 
                    </center>'; 
        }
    }
    function search_by_name_bar($file,$table){
        if(!isset($_GET['table']))
        {
            echo   '<center>
                    <br><br><br>
                    <b><h2>Aναζήτηση συνεργάτη</h2></b> 
                    <br>
                    <form action = "'.$file.'" method = "GET" id = "myform" name = "myform">
                        <input type = "hidden" name = "table" value="'.$table.'">
                        <input type = "text" name = "nEnc" placeholder = "όνομα">
                        <input type = "text" name = "lnEnc" placeholder = "επώνυμο">
                        <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                            search
                        </button>
                    </form> 
                </center>
                </body>
                </html>';
        }
    }
