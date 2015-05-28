<?php 
function printrr( $data, $exit = FALSE ) {
    if ( $data ) {
        print '<pre>';
        print_r($data);
        print '</pre>';
    }

    if ( $exit ) exit;
}
?>