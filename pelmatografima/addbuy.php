<?php
    include "header.php";
?>
<?php
    if(isset($_GET['fmodel']))
    {
        echo '
                <center><h1>Προσθήκη αγοράς</h1></center><br>
                    <form action = "insertbuy.php" method = "GET" id = "myform" name = "myform" >
                    <div align="center">
                        <label for="fmodel">μοντελο εργοστασίου</label>
                        <input type = "text" name = "fmodel" id = "fmodel" placeholder = "μοντελο εργ" value = "'.$_GET['fmodel'].'">
                        <br><label for="flot">LOT εργοστασιου</label>
                        <input type = "text" name = "flot" id = "flot" placeholder = "LOT εργ" value = "'.$_GET['flot'].'">
                        <br><label for="size">νουμερο πελματος</label>    
                        <input type = "text" name = "size" id = "size" placeholder = "νουμερο1,νουμερο2,..." value = "'.$_GET['size'].'">
                        <br><label for="kataskeuastis">κατασκευαστης</label>
                        <input type = "text" name = "kataskeuastis" id = "kataskeuastis" placeholder = "κατασκευαστης" value = "'.$_GET['kataskeuastis'].'">
                        <br><label for="date_in">ημερομηνια αγορας</label>
                        <input type = "date" id = "date_in" name = "date_in" placeholder = "Χώρα" value = "'.$_GET['date_in'].'">
                        <br><label for="penc">τιμη αγοράς</label>
                        <input type = "text" id = "penc" name = "penc" placeholder = "τιμή" value = "'.$_GET['penc'].'">
                        <br><label for="quantity">τεμάχια</label>
                        <input type = "text" id = "quantity" name = "quantity" placeholder = "ποσότητα" value = "'.$_GET['quantity'].'">
                        <br><br><br><button type = "submit" class="btn btn-success btn-lg">
                            submit
                        </button>
                    </form>   
                    </div>  
                </body>
                </html>
            ';
    }
    else
    {
        echo
        '
            <center><h1>Προσθήκη αγοράς</h1></center><br>
                <form action = "insertbuy.php" method = "GET" id = "myform" name = "myform">
                <div align="center">
                <label for="fmodel">μοντελο εργοστασίου</label>
                <input type = "text" name = "fmodel" id = "fmodel" placeholder = "μοντελο εργ">
                <br><label for="flot">LOT εργοστασιου</label>
                <input type = "text" name = "flot" id = "flot" placeholder = "LOT εργ">
                <br><label for="size">νουμερο πελματος</label>    
                <input type = "text" name = "size" id = "size" placeholder = "νουμερο1,νουμερο2,...">
                <br><label for="kataskeuastis">κατασκευαστης</label>
                <input type = "text" name = "kataskeuastis" id = "kataskeuastis" placeholder = "κατασκευαστής">
                <br><label for="date_in">ημερομηνια αγορας</label>
                <input type = "date" id = "date_in" name = "date_in" placeholder = "Χώρα">
                <br><label for="penc">τιμη αγοράς</label>
                <input type = "text" id = "penc" name = "penc" placeholder = "τιμή">
                <br><label for="quantity">τεμάχια</label>
                <input type = "text" id = "quantity" name = "quantity" placeholder = "ποσότητα">
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
