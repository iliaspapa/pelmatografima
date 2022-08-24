<?php
    include "header.php";
    $ID=$_GET['ID'];
    if(!isset($_GET['pelmID']))
    {
        $query = "SELECT * FROM prosthiki WHERE ID='$ID';";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_array($result);
        if($row==0) echo 0;
        $str = "Location: prosthiki.php?";
        foreach ($row as $i=>$j)
        {
            if(!is_numeric($i))
            {
                if(substr($i,-3)=="Enc"||substr($i,-3)=="enc")
                {
                    //echo $key;
                    $j=decrypt($key,$j);
                }
                $str=$str.$i.'='.$j.'&';
            }
        }
        $ID=$row['pelmID'];
        $query = "SELECT * FROM pelma WHERE ID='$ID';";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_array($result);
        foreach ($row as $i=>$j)
        {
            if(!is_numeric($i))
            {
                if(substr($i,-3)=="Enc"||substr($i,-3)=="enc")
                {
                    //echo $key;
                    $j=decrypt($key,$j);
                }
                if($i=="ID")
                {
                    $i="pid";
                }
                $str=$str.$i.'='.$j.'&';
            }
        }
        //echo $str;
        if(isset($_GET['status']))
        {
            $str=$str."status=".$_GET['status'];
        }
        header($str);
    }
    else
    {
        echo '
        <center><h1>Αγορά</h1></center><br>
            <form action = "updatebuy.php" method = "GET" id = "myform" name = "myform" >
            <div align="center">
                <label for="id">ID πέλματος</label>
                <input type = "text" name = "id" id = "id" value = "'.$_GET['ID'].'" readonly>
                <br><label for="fmodel">μοντελο εργοστασίου</label>
                <input type = "text" name = "fmodel" id = "fmodel" placeholder = "μοντελο εργ" value = "'.$_GET['fmodel'].'">
                <br><label for="flot">LOT εργοστασιου</label>
                <input type = "text" name = "flot" id = "flot" placeholder = "LOT εργ" value = "'.$_GET['flot'].'">
                <br><label for="pmodel">μοντελο pelmatografima</label>
                <input type = "text" name = "pmodel" id = "pmodel" placeholder="μοντελο pel" value = "'.$_GET['pmodel'].'">
                <br><label for="plot">LOT pelmatografima</label>
                <input type = "text" name = "plot" id = "plot" placeholder="LOT pel" value = "'.$_GET['plot'].'">
                <br><label for="sizel">ελάχιστο νουμερο πελματος</label>    
                <input type = "text" name = "sizel" id = "sizel" placeholder = "νουμερο" value = "'.$_GET['sizel'].'">
                <br><label for="sizeh">μέγιστο νουμερο πελματος</label>    
                <input type = "text" name = "sizeh" id = "sizeh" placeholder = "νουμερο" value = "'.$_GET['sizeh'].'">
                <br><label for="kataskeuastis">κατασκευαστης</label>
                <input type = "text" name = "kataskeuastis" id = "kataskeuastis" placeholder = "κατασκευαστης" value = "'.$_GET['kataskeuastis'].'">
                <br><label for="perigrafi">περιγραφη</label>
                <input type = "text" name = "perigrafi" id = "perigrafi" placeholder = "περιγραφή" value = "'.$_GET['perigrafi'].'">
                <br><label for="pid">ID συναλαγής</label>
                <input type = "text" name = "pid" id = "pid" value = "'.$_GET['pid'].'" readonly>
                <br><label for="date_in">ημερομηνια αγορας</label>
                <input type = "date" id = "date_in" name = "date_in" placeholder = "Χώρα" value = "'.$_GET['date'].'">
                <br><label for="penc">τιμη αγοράς</label>
                <input type = "text" id = "penc" name = "penc" placeholder = "τιμή" value = "'.$_GET['penc'].'">
                <br><label for="all"> ενημέρωση όλης της παραγγελίας</label>
                <input type="checkbox" id="all" name="all" value="1">
                <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                    update          
                </button>
            </form>   
            </div>  
        </body>
        </html>
    ';
    }
