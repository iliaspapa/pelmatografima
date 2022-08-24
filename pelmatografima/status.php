<?php
    if(isset($_GET['status'])){
        $error = $_GET['status'];
        if($error == 'successful')
        {
            if(isset($_GET['id']))
            {
                $type = 'success';
                $id=$_GET['id'];
                $entity=$_GET['c'];
                echo "<center> <h1> <div class='alert alert-$type' role='alert'>
                        $error το id του $entity είναι
                         id=$id 
                        </div> <h1> </center>";
            }
            else{
                $type = 'success';
                echo "<center> <h1> <div class='alert alert-$type' role='alert'>
                        $error 
                        </div> <h1> </center>";
            }
           
        }
        else
        {
            $type = 'danger';
            echo "<center> <h1> <div class='alert alert-$type' role='alert'>
                    $error
                    </div> <h1> 
                  </center>";
        }
    }