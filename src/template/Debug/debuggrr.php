<?php

/**
 * Sirna Debuggrr function
 * @author sirna <https://github.com/zabkasirna>
 * @since 0.0.0
 * @depends DCarbone\DOMPlus
 */

use DCarbone\DOMPlus\DOMDocumentPlus;
use DCarbone\DOMPlus\DOMElementPlus;


/**
 *  1 - Check if #debugger-container exists
 *  2 - If not exists
 *  3 - append #debugger-container to document
 *  4 - If exists
 *  5 - Append .debugger-item to #debugger-container
 *  6 - Save #debugger-container as returned variable
 *  7 - return
 */

function debuggrr( $data, $is_info = TRUE, $exit = FALSE ) {

    $data = isset( $data ) ? $data : 'EMPTY LOG';

    if ( is_array( $data ) || is_object( $data ) ) $data = json_encode($data, JSON_PRETTY_PRINT);

    $dom = new DOMDocumentPlus;

    $div  = $dom -> createElement('pre');
    $div -> setAttribute( 'class', 'debugger-item' );

    $content = $dom -> createTextNode( $data );

    $span = $dom -> createElement('span');
    $span -> setAttribute( 'class', 'debugger-info' );

    $dbt = debug_backtrace();
    $fn = basename( reset( $dbt )['file'] );
    $ln = basename( reset( $dbt )['line'] );

    $info = $dom -> createTextNode( $fn . ' [' . $ln . '] ' );

    if ( $is_info ) $span -> appendChild($info);
    $div  -> appendChild($span);
    $div  -> appendChild($content);

    echo $dom -> saveHTMLExact( $div );

    if ( $exit ) exit;
}

?>