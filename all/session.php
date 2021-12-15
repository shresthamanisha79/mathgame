<?php

    session_start();

    if (isset($_SESSION['page_count']))
    {
        $_SESSION['page_count'] += 1;
        
    }
    else
    {
        $SESSION['page_count'] = 1;
    }

    echo '<br> Your visitor number'.$SESSION['page_count'];

?>