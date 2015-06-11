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

function debuggrr( $data, $exit = FALSE ) {

    if ( !isset( $data ) ) return;

    if ( is_array( $data ) ) $data = json_encode($data);

    $dom = new DOMDocumentPlus;

    $div  = $dom -> createElement('pre');
    $div -> setAttribute( 'class', 'debugger-item' );
    $text = $dom -> createTextNode( $data );
    $div  -> appendChild($text);

    echo $dom -> saveHTMLExact( $div );

    if ( $exit ) exit;
}

?>