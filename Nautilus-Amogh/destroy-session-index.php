<?php
    session_start();
    echo $_SESSION['exit']['user']['id'];
    if(in_array( $_SESSION['exit']['user']['id'], $_SESSION['arr'])) {
        
        echo "We found your data here";
        $index = array_search($_SESSION['exit']['user']['id'], $_SESSION['arr']);
        echo $index;
        unset($_SESSION['arr'][$index]);
        echo "Parking lot has been cleared now...";
    }
?>