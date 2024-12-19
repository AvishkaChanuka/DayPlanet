<?php

    function ShowAlert($msg){
        $alert = "<div class='alert alert-primary' role='alert'>
                    $msg
                </div>";
        echo($alert);
    }

    function ShowWarning($msg){
        $alert = "<div class='alert alert-warning' role='alert'>
                    $msg
                </div>";
        echo($alert);
    }

    function ShowError($msg){
        $alert = "<div class='alert alert-danger' role='alert'>
                    $msg
                </div>";
        echo($alert);
    }

    function ShowSuccess($msg){
        $alert = "<div class='alert alert-success' role='alert'>
                    $msg
                </div>";
        echo($alert);
    }

?>