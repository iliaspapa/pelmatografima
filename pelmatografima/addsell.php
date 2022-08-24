<?php
    include "header.php";
    if(isset($_GET['pid']))
    {
        search_by_model_bar("addsell.php","pelma");
        search_by_name_bar("addsell.php","sunalasomenoi");
        show_res("addsell.php");
        //if(!isset($_GET['table']))
        echo
        '
            <center><h1>Προσθήκη πώλησης</h1></center><br>
                <form action = "insertsell.php" method = "GET" id = "myform" name = "myform">
                <div align="center"> 
                <br><label for="peid">ID πελάτη</label>
                <input type = "text" id = "peid" name = "peid" placeholder = "ID πελάτη" value = "'.$_GET['peid'].'">
                <br>ή
                <fieldset>
                    <legend>Νέος Πελατης</legend>
                    <label for="pnEnc">Όνομα</label>
                    <input type = "text" id = "pnEnc" name = "pnEnc" placeholder = "Όνομα πελάτη" value = "'.$_GET['pnEnc'].'">
                    <br><label for="plnEnc">Επώνυμο</label>
                    <input type = "text" id = "plnEnc" name = "plnEnc" placeholder = "Επώνυμο πελάτη" value = "'.$_GET['plnEnc'].'">
                    <br><label for="pstreet">Δρόμος</label>
                    <input type = "text" id = "pstreet" name = "pstreet" placeholder = "Δρόμος πελάτη" value = "'.$_GET['pstreet'].'">
                    <br><label for="pnumber">Αριθμός</label>
                    <input type = "text" id = "pnumber" name = "pnumber" placeholder = "Αριθμός πελάτη" value = "'.$_GET['pnumber'].'">
                    <br><label for="ptown">Πόλη</label>
                    <input type = "text" id = "ptown" name = "ptown" placeholder = "Πόλη πελάτη" value = "'.$_GET['ptown'].'">
                    <br><label for="ptk">τ.κ.</label>
                    <input type = "text" id = "ptk" name = "ptk" placeholder = "τκ πελάτη" value = "'.$_GET['ptk'].'">
                    <br><label for="pcountry">Χώρα</label>
                    <input type = "text" id = "pcountry" name = "pcountry" placeholder = "Χώρα πελάτη" value = "'.$_GET['pcountry'].'">
                    <br><label>τηλέφωνα</label><br>
                    <input type = "text" id = "phone1" name = "phone1" placeholder = "τηλεφωνο 1" value = "'.$_GET['phone1'].'">
                    <input type = "text" id = "country_code_1" name = "country_code_1" placeholder = "κωδικός χώρας" value = "'.$_GET['country_code_1'].'">
                    <select name= "type1" value = "'.$_GET['type1'].'">
                    <option value="st"';
                    if($_GET['type1']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>Σταθερό</option>
                    <option value="mob"';
                    if($_GET['type1']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>Κινητό</option>
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
                    echo '>Άλλο</option>
                    </select><br>
                    <input type = "text" id = "phone2" name = "phone2" placeholder = "τηλεφωνο 2" value = "'.$_GET['phone2'].'">
                    <input type = "text" id = "country_code_2" name = "country_code_2" placeholder = "κωδικός χώρας" value = "'.$_GET['country_code_2'].'">
                    <select name= "type2" value = "'.$_GET['type2'].'">
                    <option value="st"';
                    if($_GET['type2']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>Σταθερό</option>
                    <option value="mob"';
                    if($_GET['type2']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>Κινητό</option>
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
                    echo '>Άλλο</option>
                    </select><br>
                    <input type = "text" id = "phone3" name = "phone3" placeholder = "τηλεφωνο 3" value = "'.$_GET['phone3'].'">
                    <input type = "text" id = "country_code_3" name = "country_code_3" placeholder = "κωδικός χώρας" value = "'.$_GET['country_code_3'].'">
                    <select name= "type3" value = "'.$_GET['type3'].'">
                    <option value="st"';
                    if($_GET['type3']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>Σταθερό</option>
                    <option value="mob"';
                    if($_GET['type3']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>Κινητό</option>
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
                    echo '>Άλλο</option>
                    </select><br>
                </fieldset>
                <br><label for="sid">ID Συνεργάτη</label>
                <input type = "text" id = "sid" name = "sid" placeholder = "ID συνεργάτη" value = "'.$_GET['sid'].'" >
                <fieldset>
                    <legend>Νέος Συνεργάτης</legend>
                    <label for="snEnc">Όνομα</label>
                    <input type = "text" id = "snEnc" name = "snEnc" placeholder = "Όνομα συνεργάτη" value = "'.$_GET['snEnc'].'">
                    <br><label for="slnEnc">Επώνυμο</label>
                    <input type = "text" id = "slnEnc" name = "slnEnc" placeholder = "Επώνυμο συνεργάτη" value = "'.$_GET['slnEnc'].'">
                    <br><label for="pstreet">Δρόμος</label>
                    <input type = "text" id = "sstreet" name = "sstreet" placeholder = "Δρόμος συνεργάτη" value = "'.$_GET['sstreet'].'">
                    <br><label for="snumber">Αριθμός</label>
                    <input type = "text" id = "snumber" name = "snumber" placeholder = "Αριθμός συνεργάτη" value = "'.$_GET['snumber'].'">
                    <br><label for="ptown">Πόλη</label>
                    <input type = "text" id = "stown" name = "stown" placeholder = "Πόλη συνεργάτη" value = "'.$_GET['stown'].'">
                    <br><label for="stk">τ.κ.</label>
                    <input type = "text" id = "stk" name = "stk" placeholder = "τκ συνεργάτη" value = "'.$_GET['stk'].'">
                    <br><label for="pcountry">Χώρα</label>
                    <input type = "text" id = "scountry" name = "scountry" placeholder = "Χώρα συνεργάτη" value = "'.$_GET['scountry'].'">
                    <br><label>τηλέφωνα</label><br>
                    <input type = "text" id = "sphone1" name = "sphone1" placeholder = "τηλεφωνο 1" value = "'.$_GET['sphone1'].'">
                    <input type = "text" id = "scountry_code_1" name = "scountry_code_1" placeholder = "κωδικός χώρας" value = "'.$_GET['scountry_code_1'].'">
                    <select name= "stype1" value = "'.$_GET['stype1'].'">
                    <option value="st"';
                    if($_GET['stype1']=='st')
                    {
                        echo 'selected';
                    }
                    echo '>Σταθερό</option>
                    <option value="mob"';
                    if($_GET['stype1']=='mob')
                    {
                        echo 'selected';
                    }
                    echo '>Κινητό</option>
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
                    echo '>Άλλο</option>
                    </select><br>
                    <input type = "text" id = "sphone2" name = "sphone2" placeholder = "τηλεφωνο 2" value = "'.$_GET['sphone2'].'">
                    <input type = "text" id = "scountry_code_2" name = "scountry_code_2" placeholder = "κωδικός χώρας" value = "'.$_GET['scountry_code_2'].'">
                    <select name= "stype2" value = "'.$_GET['stype2'].'">
                        <option value="st"';
                        if($_GET['stype2']=='st')
                        {
                            echo 'selected';
                        }
                        echo '>Σταθερό</option>
                        <option value="mob"';
                        if($_GET['stype2']=='mob')
                        {
                            echo 'selected';
                        }
                        echo '>Κινητό</option>
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
                        echo '>Άλλο</option>
                    </select><br>
                </fieldset>
                <br><label for="pid">ID πέλματος</label>
                <input type = "text" id = "pid" name = "pid" placeholder = "ID πέλματος" value = "'.$_GET['pid'].'">
                <br><label for="pmodel">μοντελο pelmatografima</label>
                <input type = "text" name = "pmodel" id = "pmodel" placeholder="μοντελο pel" value = "'.$_GET['pmodel'].'">
                <br><label for="plot">LOT pelmatografima</label>
                <input type = "text" name = "plot" id = "plot" placeholder="LOT pel" value = "'.$_GET['plot'].'">
                <br><label for="perigrafi">περιγραφη</label>
                <input type = "text" name = "perigrafi" id = "perigrafi" placeholder = "περιγραφή" value = "'.$_GET['perigrafi'].'">
                <br><label for="date_out">ημερομηνια πώλησης</label>
                <input type = "date" id = "date_out" name = "date_out" placeholder = "ημερομηνια" value = "'.$_GET['date_out'].'">
                <br><label for="penc">τιμη πώλησης</label>
                <input type = "text" id = "penc" name = "penc" placeholder = "τιμή" value = "'.$_GET['penc'].'">
                <br><label for="inmov"> εσωτερική μετακίνηση</label>
                <input type="checkbox" id="inmov" name="inmov" value="1"  ';
        if($_GET['inmov']=='1')
        {
            echo 'checked';
        }
        echo        '>
                
                <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                    submit
                </button>
                </div>
                </form>
            </body>
            </html>
        ';
    }
    else
    {
        search_by_model_bar("addsell.php","pelma");
        search_by_name_bar("addsell.php","sunalasomenoi");
        show_res("addsell.php");
        //if(!isset($_GET['table']))
        echo
        '
            <center><h1>Προσθήκη πώλησης</h1></center><br>
                <form action = "insertsell.php" method = "GET" id = "myform" name = "myform">
                <div align="center"> 
                <br><label for="peid">ID πελάτη</label>
                <input type = "text" id = "peid" name = "peid" placeholder = "ID πελάτη">
                <br>ή
                <fieldset>
                    <legend>Νέος Πελατης</legend>
                    <label for="pnEnc">Όνομα</label>
                    <input type = "text" id = "pnEnc" name = "pnEnc" placeholder = "Όνομα πελάτη">
                    <br><label for="plnEnc">Επώνυμο</label>
                    <input type = "text" id = "plnEnc" name = "plnEnc" placeholder = "Επώνυμο πελάτη">
                    <br><label for="pstreet">Δρόμος</label>
                    <input type = "text" id = "pstreet" name = "pstreet" placeholder = "Δρόμος πελάτη">
                    <br><label for="pnumber">Αριθμός</label>
                    <input type = "text" id = "pnumber" name = "pnumber" placeholder = "Αριθμός πελάτη">
                    <br><label for="ptown">Πόλη</label>
                    <input type = "text" id = "ptown" name = "ptown" placeholder = "Πόλη πελάτη">
                    <br><label for="ptk">τ.κ.</label>
                    <input type = "text" id = "ptk" name = "ptk" placeholder = "τκ πελάτη">
                    <br><label for="pcountry">Χώρα</label>
                    <input type = "text" id = "pcountry" name = "pcountry" placeholder = "Χώρα πελάτη">
                    <br><label>τηλέφωνα</label><br>
                    <input type = "text" id = "phone1" name = "phone1" placeholder = "τηλεφωνο 1">
                    <input type = "text" id = "country_code_1" name = "country_code_1" placeholder = "κωδικός χώρας">
                    <select name= "type1">
                        <option value="st">Σταθερό</option>
                        <option value="mob">Κινητό</option>
                        <option value="fax">Fax</option>
                        <option value="other">Άλλο</option>
                    </select><br>
                    <input type = "text" id = "phone2" name = "phone2" placeholder = "τηλεφωνο 2">
                    <input type = "text" id = "country_code_2" name = "country_code_2" placeholder = "κωδικός χώρας">
                    <select name= "type2">
                        <option value="st">Σταθερό</option>
                        <option value="mob">Κινητό</option>
                        <option value="fax">Fax</option>
                        <option value="other">Άλλο</option>
                    </select><br>
                    <input type = "text" id = "phone3" name = "phone3" placeholder = "τηλεφωνο 3">
                    <input type = "text" id = "country_code_3" name = "country_code_3" placeholder = "κωδικός χώρας">
                    <select name= "type3">
                        <option value="st">Σταθερό</option>
                        <option value="mob">Κινητό</option>
                        <option value="fax">Fax</option>
                        <option value="other">Άλλο</option>
                    </select><br>
                </fieldset>
                <br><label for="sid">ID Συνεργάτη</label>
                <input type = "text" id = "sid" name = "sid" placeholder = "ID συνεργάτη">
                <br>ή
                <fieldset>
                    <legend>Νέος συνεργάτης</legend>
                    <label for="snEnc">Όνομα</label>
                    <input type = "text" id = "snEnc" name = "snEnc" placeholder = "Όνομα συνεργάτη">
                    <br><label for="slnEnc">Επώνυμο</label>
                    <input type = "text" id = "slnEnc" name = "slnEnc" placeholder = "Επώνυμο συνεργάτη">
                    <br><label for="sstreet">Δρόμος</label>
                    <input type = "text" id = "sstreet" name = "sstreet" placeholder = "Δρόμος συνεργάτη">
                    <br><label for="snumber">Αριθμός</label>
                    <input type = "text" id = "snumber" name = "snumber" placeholder = "Αριθμός συνεργάτη">
                    <br><label for="stown">Πόλη</label>
                    <input type = "text" id = "stown" name = "stown" placeholder = "Πόλη συνεργάτη">
                    <br><label for="stk">τ.κ.</label>
                    <input type = "text" id = "stk" name = "stk" placeholder = "τκ συνεργάτη">
                    <br><label for="scountry">Χώρα</label>
                    <input type = "text" id = "scountry" name = "scountry" placeholder = "Χώρα συνεργάτη">
                    <br><label>τηλέφωνα</label><br>
                    <input type = "text" id = "sphone1" name = "sphone1" placeholder = "τηλεφωνο 1">
                    <input type = "text" id = "scountry_code_1" name = "scountry_code_1" placeholder = "κωδικός χώρας">
                    <select name= "stype1">
                        <option value="st">Σταθερό</option>
                        <option value="mob">Κινητό</option>
                        <option value="fax">Fax</option>
                        <option value="other">Άλλο</option>
                    </select><br>
                    <input type = "text" id = "sphone2" name = "sphone2" placeholder = "τηλεφωνο 2">
                    <input type = "text" id = "scountry_code_2" name = "scountry_code_2" placeholder = "κωδικός χώρας">
                    <select name= "stype2">
                        <option value="st">Σταθερό</option>
                        <option value="mob">Κινητό</option>
                        <option value="fax">Fax</option>
                        <option value="other">Άλλο</option>
                    </select><br>
                    <input type = "text" id = "sphone3" name = "sphone3" placeholder = "τηλεφωνο 3">
                    <input type = "text" id = "scountry_code_3" name = "scountry_code_3" placeholder = "κωδικός χώρας">
                    <select name= "stype3">
                        <option value="st">Σταθερό</option>
                        <option value="mob">Κινητό</option>
                        <option value="fax">Fax</option>
                        <option value="other">Άλλο</option>
                    </select><br>
                </fieldset>
                <br><label for="pid">ID πέλματος</label>
                <input type = "text" id = "pid" name = "pid" placeholder = "ID πέλματος">
                <br><label for="pmodel">μοντελο pelmatografima</label>
                <input type = "text" name = "pmodel" id = "pmodel" placeholder="μοντελο pel">
                <br><label for="plot">LOT pelmatografima</label>
                <input type = "text" name = "plot" id = "plot" placeholder="LOT pel">
                <br><label for="perigrafi">περιγραφη</label>
                <input type = "text" name = "perigrafi" id = "perigrafi" placeholder = "περιγραφή">       
                <br><label for="date_out">ημερομηνια πώλησης</label>
                <input type = "date" id = "date_out" name = "date_out" placeholder = "Χώρα">
                <br><label for="penc">τιμη πώλησης</label>
                <input type = "text" id = "penc" name = "penc" placeholder = "τιμή">
                <br><label for="inmov"> εσωτερική μετακίνηση</label>
                <input type="checkbox" id="inmov" name="inmov" value="1">   
                
                <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                    submit
                </button>
                </div>
                </form>
            </body>
            </html>
        ';
    }
?>
