<?php
    include "header.php";
?>
<form action="index.php">
    <center>
        <input type="hidden" name="page" id="page" method="GET" value="1">
        <br>
        <select name="table" id="table">
            <option value="pelma">πέλματα</option>
            <option value="synalasomenoi">συναλασόμενοι</option>
            <option value="phones">τηλέφωνα</option>
            <option value="prosthiki">αγορές</option>
            <option value="polisi">πωλήσεις</option>
        </select>
        <br><br><br><button type = "submit" class="btn btn-success btn-lg">
            submit
        </button>
    </center>
</form>
<?php
    //echo encrypt($key,'ΚΩΝΣΤΑΝΤΙΝΟΣ(ΔΙΑΜΑΝΤΟΠΟΥΛΟΣ)');
    if(isset($_GET['table']))
    {
        $offset = ($_GET['page']-1)*10;
        $query = "SELECT * FROM ".$_GET['table']." LIMIT $offset,10 ;";
        $result = mysqli_query($connection,$query);
        $counter = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($row==''&&!isset($_GET['status'])){
            header("Location:index.php?page=".$_GET['page']."&table=".$_GET['table']."&status=wrong page");
        }
        else if(isset($_GET['status']));
        else
        {
            echo '<br><br><center><table style="width:100%">
                <tr>';
            foreach (array_keys($row) as $i)
            {
                if(!is_numeric($i))echo "<th>$i</th>";
            }
            if($_GET['table']=='polisi'||$_GET['table']=='prosthiki')
            {
                echo "<th>action</th>";
            }
            echo '</tr><tr>';
            $table=$_GET['table'].".php?ID=";
            foreach ($row as $j=>$i)
            {
                if(!is_numeric($j))
                {
                    if(substr($j,-3)=="Enc"||substr($j,-3)=="enc")
                    {
                        //echo $key;
                        $i=decrypt($key,$i);
                    }
                    echo '<td>'.$i.'</td>';
                }
            }
            $ttmp=$table.$row['ID'];
            if($_GET['table']=='polisi'||$_GET['table']=='prosthiki')
            {
                echo "<td><a href='$ttmp'>more</a></td>";
            }
            echo '</tr>';
            while($row = mysqli_fetch_array($result))
            {
                $ttmp=$table.$row['ID'];
                echo '<tr>';
                foreach ($row as $j=>$i)
                {
                    if(!is_numeric($j))
                    {
                        if(substr($j,-3)=="Enc"||substr($j,-3)=="enc")
                        {
                            //echo $i;
                            $i=decrypt($key,$i);
                        }
                        echo '<td>'.$i.'</td>';
                    }
                }
                if($_GET['table']=='polisi'||$_GET['table']=='prosthiki')
                {
                    echo "<td><a href='$ttmp'>more</a></td>";
                }
                echo '</tr>';
            }
        }
        echo "</center></table>
                page=".$_GET['page']."
                <form action='index.php'>
                    <center>
                        <br><label style='width:50px' for='page'>σελιδα</label>
                        <input type='text' name='page' id='page' method='GET' value = '1' placeholder = 'πηγαινε σελιδα'>
                        <input type='hidden' name='table' id='table' method='GET' value = '".$_GET['table']."'>
                            <button type = 'submit' class='btn btn-success btn-lg'>
                            go
                        </button>
                    </center>
                </form><center>
                ";
            
        if(intval($_GET['page'])>1)
        {
            echo "<form action='index.php'>
                        <br><input type='hidden' name='page' id='page' method='GET' value = '".strval(intval($_GET['page'])-1)."'>
                        <input type='hidden' name='table' id='table' method='GET' value = '".$_GET['table']."'>
                        <button type = 'submit' class='btn btn-success btn-lg'>
                            previous page
                        </button>
                </form>";
        }
        echo"<form action='index.php'>
                <input type='hidden' name='page' id='page' method='GET' value = '".strval(intval($_GET['page'])+1)."'>
                <input type='hidden' name='table' id='table' method='GET' value = '".$_GET['table']."'>
                <button type = 'submit' class='btn btn-success btn-lg'>
                    next page
                </button>
            
        </form></center>";
    }
?>
<form action="bkp.php">
    <center>
        <br><br><br><button type = "submit" class="btn btn-success btn-lg">
            backup
        </button>
    </center>
</form></body></html>