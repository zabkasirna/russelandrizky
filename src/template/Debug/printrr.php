<?php

function printrr( $data, $exit = FALSE ) {
    if ( $data ) {
        print '<pre class="debugger">';
        print_r($data);
        print '</pre>';
    }

    if ( $exit ) exit;
}

?>