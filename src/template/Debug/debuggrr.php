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

function debuggrr( $data, $title_text = "", $is_info = TRUE, $exit = FALSE ) {

    $data = isset( $data ) ? $data : 'EMPTY LOG';

    if ( is_array( $data ) || is_object( $data ) ) $data = json_encode($data, JSON_PRETTY_PRINT);

    $dom = new DOMDocumentPlus;

    // div.debugger-item
    $div  = $dom -> createElement('pre');
    $div -> setAttribute( 'class', 'debugger-item' );

    // div.debugger-item textnode
    $content = $dom -> createTextNode( $data );

    // span.debugger-title
    $span1 = $dom -> createElement('span');
    $span1 -> setAttribute( 'class', 'debugger-title' );

    // span.debugger-title textnode
    $title = $dom -> createTextNode( $title_text . ": \n" );

    // span.debugger-info
    $span2 = $dom -> createElement('span');
    $span2 -> setAttribute( 'class', 'debugger-info' );

    // File Name & Code Line
    $dbt = debug_backtrace();
    $fn = basename( reset( $dbt )['file'] );
    $ln = basename( reset( $dbt )['line'] );

    // span.debugger-info text-node
    $info = $dom -> createTextNode( $fn . ' [' . $ln . '] ' );

    // Appendings
    if ( $is_info ) $span2 -> appendChild($info);
    if ( $title_text !== "" ) $span1 -> appendChild($title);
    $div  -> appendChild($span2);
    $div  -> appendChild($span1);
    $div  -> appendChild($content);

    // Render DOM
    echo $dom -> saveHTMLExact( $div );

    if ( $exit ) exit;
}

?>