<?php
    include "header.php";
    $ID=$_GET['ID'];
    if(!isset($_GET['pid']))
    {
        $query = "SELECT * FROM polisi WHERE ID='$ID';";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_array($result);
        $str = "Location: polisi.php?";
        $str = $str."id=".$ID."&";
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
        $ID=$row['idpelm'];
        $pid=$row['idpel'];
        $sid=$row['idsun'];
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
        $query = "SELECT * FROM synalasomenoi WHERE ID='$pid';";//pelatess
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
                    $i="eid";
                }
                $str=$str.'p'.$i.'='.$j.'&';
            }
        }
        $query = "SELECT * FROM phones WHERE owner_id='$pid';";
        $result = mysqli_query($connection,$query);
        $counter = mysqli_num_rows($result);
        for($i=1;$i<4;$i++)
        {
            $row = mysqli_fetch_array($result);
            $str = $str.'phone'.$i.'=';
            if($i<=$counter)
            {
                $str = $str.$row['number'];
            }
            $str = $str.'&';
            $str = $str.'country_code_'.$i.'=';
            if($i<=$counter)
            {
                $str = $str.$row['country_code'];
            }
            $str = $str.'&';
            $str = $str.'type'.$i.'=';
            if($i<=$counter)
            {
                $str = $str.$row['type'];
            }
            $str = $str.'&';
        }
        // $row = mysqli_fetch_array($result);
        $query = "SELECT * FROM synalasomenoi WHERE ID='$sid';";//sunergates
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_array($result);
        if($row==false)
        {
            $query = "SELECT * FROM synalasomenoi WHERE ID='15';";//sunergates
            $result = mysqli_query($connection,$query);
            $row = mysqli_fetch_array($result);
            foreach ($row as $i=>$j)
            {
                echo 42;
                if(!is_numeric($i))
                {
                    if($i=="ID")
                    {
                        $i="id";
                    }
                    $str=$str.'s'.$i."=&";
                }
            }
        }
        else
        {
            foreach ($row as $i=>$j)
            {
                //echo 42;
                if(!is_numeric($i))
                {
                    if(substr($i,-3)=="Enc"||substr($i,-3)=="enc")
                    {
                        //echo $key;
                        $j=decrypt($key,$j);
                    }
                    if($i=="ID")
                    {
                        $i="id";
                    }
                    $str=$str.'s'.$i.'='.$j.'&';
                }
            }
        }
        
        $query = "SELECT * FROM phones WHERE owner_id='$sid';";
        $result = mysqli_query($connection,$query);
        $counter = mysqli_num_rows($result);
        for($i=1;$i<4;$i++)
        {
            $row = mysqli_fetch_array($result);
            $str = $str.'sphone'.$i.'=';
            if($i<=$counter)
            {
                $str = $str.$row['number'];
            }
            $str = $str.'&';
            $str = $str.'scountry_code_'.$i.'=';
            if($i<=$counter)
            {
                $str = $str.$row['country_code'];
            }
            $str = $str.'&';
            $str = $str.'stype'.$i.'=';
            if($i<=$counter)
            {
                $str = $str.$row['type'];
            }
            $str = $str.'&';
        }
        if(isset($_GET['status']))
        {
            $str=$str."status=".$_GET['status'];
        }
        if(isset($_GET['c']))
        {
            $str=$str."&c=".$_GET['c'];
        }
        echo $str;
        header($str);
    }
    else
    {
        echo
        '
            <center><h1>????????????</h1></center><br>
                <form action = "updatesell.php" method = "GET" id = "myform" name = "myform">
                <div align="center"> 
                <br><label for="id">ID ??????????????</label>
                <input type = "text" id = "id" name = "id" placeholder = "ID ????????????" value = "'.$_GET['id'].'" >
                <br><label for="peid">ID ????????????</label>
                <input type = "text" id = "peid" name = "peid" placeholder = "ID ????????????" value = "'.$_GET['peid'].'" >
                <fieldset>
                    <legend>??????????????</legend>
                    <label for="pnEnc">??????????</label>
                    <input type = "text" id = "pnEnc" name = "pnEnc" placeholder = "?????????? ????????????" value = "'.$_GET['pnEnc'].'">
                    <br><label for="plnEnc">??????????????</label>
                    <input type = "text" id = "plnEnc" name = "plnEnc" placeholder = "?????????????? ????????????" value = "'.$_GET['plnEnc'].'">
                    <br><label for="pstreet">????????????</label>
                    <input type = "text" id = "pstreet" name = "pstreet" placeholder = "???????????? ????????????" value = "'.$_GET['pstreet'].'">
                    <br><label for="pnumber">??????????????</label>
                    <input type = "text" id = "pnumber" name = "pnumber" placeholder = "?????????????? ????????????" value = "'.$_GET['pnumber'].'">
                    <br><label for="ptown">????????</label>
                    <input type = "text" id = "ptown" name = "ptown" placeholder = "???????? ????????????" value = "'.$_GET['ptown'].'">
                    <br><label for="ptk">??.??.</label>
                    <input type = "text" id = "ptk" name = "ptk" placeholder = "???? ????????????" value = "'.$_GET['ptk'].'">
                    <br><label for="pcountry">????????</label>
                    <input type = "text" id = "pcountry" name = "pcountry" placeholder = "???????? ????????????" value = "'.$_GET['pcountry'].'">
                    <br><label>????????????????</label><br>
                    <input type = "text" id = "phone1" name = "phone1" placeholder = "???????????????? 1" value = "'.$_GET['phone1'].'">
                    <input type = "text" id = "country_code_1" name = "country_code_1" placeholder = "?????????????? ??????????" value = "'.$_GET['country_code_1'].'">
                    <select name= "type1" value = "'.$_GET['type1'].'">
                    <option value="st"';
                    if($_GET['type1']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>??????????????</option>
                    <option value="mob"';
                    if($_GET['type1']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>????????????</option>
                    <option value="fax"';
                    if($_GET['type1']=='fax')
                    {
                        echo 'selected';
                    }
                    echo '>Fax</option>
                    <option value="other"';
                    if($_GET['type1']=='other')
                    {
                        echo 'selected';
                    }
                    echo '>????????</option>
                    </select><br>
                    <input type = "text" id = "phone2" name = "phone2" placeholder = "???????????????? 2" value = "'.$_GET['phone2'].'">
                    <input type = "text" id = "country_code_2" name = "country_code_2" placeholder = "?????????????? ??????????" value = "'.$_GET['country_code_2'].'">
                    <select name= "type2" value = "'.$_GET['type2'].'">
                    <option value="st"';
                    if($_GET['type2']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>??????????????</option>
                    <option value="mob"';
                    if($_GET['type2']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>????????????</option>
                    <option value="fax"';
                    if($_GET['type2']=='fax')
                    {
                        echo 'selected';
                    }
                    echo '>Fax</option>
                    <option value="other"';
                    if($_GET['type2']=='other')
                    {
                        echo 'selected';
                    }
                    echo '>????????</option>
                    </select><br>
                    <input type = "text" id = "phone3" name = "phone3" placeholder = "???????????????? 3" value = "'.$_GET['phone3'].'">
                    <input type = "text" id = "country_code_3" name = "country_code_3" placeholder = "?????????????? ??????????" value = "'.$_GET['country_code_3'].'">
                    <select name= "type3" value = "'.$_GET['type3'].'">
                    <option value="st"';
                    if($_GET['type3']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>??????????????</option>
                    <option value="mob"';
                    if($_GET['type3']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>????????????</option>
                    <option value="fax"';
                    if($_GET['type3']=='fax')
                    {
                        echo 'selected';
                    }
                    echo '>Fax</option>
                    <option value="other"';
                    if($_GET['type3']=='other')
                    {
                        echo 'selected';
                    }
                    echo '>????????</option>
                    </select><br>
                </fieldset>
                <br><label for="sid">ID ??????????????????</label>
                <input type = "text" id = "sid" name = "sid" placeholder = "ID ??????????????????" value = "'.$_GET['sid'].'" >
                <fieldset>
                    <legend>????????????????????</legend>
                    <label for="snEnc">??????????</label>
                    <input type = "text" id = "snEnc" name = "snEnc" placeholder = "?????????? ??????????????????" value = "'.$_GET['snEnc'].'">
                    <br><label for="slnEnc">??????????????</label>
                    <input type = "text" id = "slnEnc" name = "slnEnc" placeholder = "?????????????? ??????????????????" value = "'.$_GET['slnEnc'].'">
                    <br><label for="pstreet">????????????</label>
                    <input type = "text" id = "sstreet" name = "sstreet" placeholder = "???????????? ??????????????????" value = "'.$_GET['sstreet'].'">
                    <br><label for="snumber">??????????????</label>
                    <input type = "text" id = "snumber" name = "snumber" placeholder = "?????????????? ??????????????????" value = "'.$_GET['snumber'].'">
                    <br><label for="ptown">????????</label>
                    <input type = "text" id = "stown" name = "stown" placeholder = "???????? ??????????????????" value = "'.$_GET['stown'].'">
                    <br><label for="stk">??.??.</label>
                    <input type = "text" id = "stk" name = "stk" placeholder = "???? ??????????????????" value = "'.$_GET['stk'].'">
                    <br><label for="pcountry">????????</label>
                    <input type = "text" id = "scountry" name = "scountry" placeholder = "???????? ??????????????????" value = "'.$_GET['scountry'].'">
                    <br><label>????????????????</label><br>
                    <input type = "text" id = "sphone1" name = "sphone1" placeholder = "???????????????? 1" value = "'.$_GET['sphone1'].'">
                    <input type = "text" id = "scountry_code_1" name = "scountry_code_1" placeholder = "?????????????? ??????????" value = "'.$_GET['scountry_code_1'].'">
                    <select name= "stype1" value = "'.$_GET['stype1'].'">
                    <option value="st"';
                    if($_GET['stype1']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>??????????????</option>
                    <option value="mob"';
                    if($_GET['stype1']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>????????????</option>
                    <option value="fax"';
                    if($_GET['stype1']=='fax')
                    {
                        echo 'selected';
                    }
                    echo '>Fax</option>
                    <option value="other"';
                    if($_GET['stype1']=='other')
                    {
                        echo 'selected';
                    }
                    echo '>????????</option>
                    </select><br>
                    <input type = "text" id = "sphone2" name = "sphone2" placeholder = "???????????????? 2" value = "'.$_GET['sphone2'].'">
                    <input type = "text" id = "scountry_code_2" name = "scountry_code_2" placeholder = "?????????????? ??????????" value = "'.$_GET['scountry_code_2'].'">
                    <select name= "stype2" value = "'.$_GET['stype2'].'">
                        <option value="st"';
                        if($_GET['stype2']=='st')
                        {
                            echo 'selected';
                        }
                        echo '>??????????????</option>
                        <option value="mob"';
                        if($_GET['stype2']=='mob')
                        {
                            echo 'selected';
                        }
                        echo '>????????????</option>
                        <option value="fax"';
                        if($_GET['stype2']=='fax')
                        {
                            echo 'selected';
                        }
                        echo '>Fax</option>
                        <option value="other"';
                        if($_GET['stype2']=='other')
                        {
                            echo 'selected';
                        }
                        echo '>????????</option>
                    </select><br>
                    <input type = "text" id = "sphone3" name = "sphone3" placeholder = "???????????????? 3" value = "'.$_GET['sphone3'].'">
                    <input type = "text" id = "scountry_code_3" name = "scountry_code_3" placeholder = "?????????????? ??????????" value = "'.$_GET['scountry_code_3'].'">
                    <select name= "stype3" value = "'.$_GET['stype3'].'">
                    <option value="st"';
                    if($_GET['stype3']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>??????????????</option>
                    <option value="mob"';
                    if($_GET['stype3']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>????????????</option>
                    <option value="fax"';
                    if($_GET['stype3']=='fax')
                    {
                        echo 'selected';
                    }
                    echo '>Fax</option>
                    <option value="other"';
                    if($_GET['stype3']=='other')
                    {
                        echo 'selected';
                    }
                    echo '>????????</option>
                    </select><br>
                </fieldset>
                <br><label for="perigrafi">??????????????????</label>
                <input type = "text" name = "perigrafi" id = "perigrafi" placeholder = "??????????????????" value = "'.$_GET['perigrafi'].'">
                <br><label for="pid">ID ????????????????</label>
                <input type = "text" id = "pid" name = "pid" placeholder = "ID ????????????????" value = "'.$_GET['pid'].'">
                <br><label for="pmodel">?????????????? pelmatografima</label>
                <input type = "text" name = "pmodel" id = "pmodel" placeholder="?????????????? pel" value = "'.$_GET['pmodel'].'">
                <br><label for="plot">LOT pelmatografima</label>
                <input type = "text" name = "plot" id = "plot" placeholder="LOT pel" value = "'.$_GET['plot'].'">
                <br><label for="date">???????????????????? ??????????????</label>
                <input type = "date" id = "date" name = "date" placeholder = "????????????????????" value = "'.$_GET['date'].'">
                <br><label for="penc">???????? ??????????????</label>
                <input type = "text" id = "penc" name = "penc" placeholder = "????????" value = "'.$_GET['penc'].'">
                <br><label for="inmov"> ?????????????????? ????????????????????</label>
                <input type="checkbox" id="inmov" name="inmov" value="1" ';
        if($_GET['inmov']=='1')
        {
            echo 'checked';
        }
        echo        '>  
                    <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                    update          
                </button> 
                </div>
                </form>
            </body>
            </html>
        ';
    }