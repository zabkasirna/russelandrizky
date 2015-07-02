<?php
/**
 * @package rdt-rnr15
 * @subpackage plugin/rnr-attachment-meta
 * @version 0.0.0
 * @since 0.0.0
 */
/*
Plugin Name: RNR Attachment Meta
Plugin URI: http://github.com/zabkasirna/russelandrizky
Description: Add custom attachment metadata
Author: Sirna
Version: 0.0.0
Author URI: http://github.com/zabkasirna
*/

function rnr_attachment_meta( $form_fields, $post )
{
    $form_fields['rnr_image_meta_layout']['label'] = 'Image Layout';
    $form_fields['rnr_image_meta_layout']['input'] = 'html';
    $form_fields['rnr_image_meta_layout']['html'] = "
        <label><input type=\"radio\" name=\"attachments[{$post->ID}][rnr_image_meta_layout]\" value=\"is_full\">Full</label>
        <label><input type=\"radio\" name=\"attachments[{$post->ID}][rnr_image_meta_layout]\" value=\"is_half\">Half</label>
        <label><input type=\"radio\" name=\"attachments[{$post->ID}][rnr_image_meta_layout]\" value=\"is_gradient\">With gradient</label>
    ";

    return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'rnr_attachment_meta', 10, 2 );

function rnr_attachment_meta_save( $post, $attachment )
{
    if ( isset( $attachment['rnr_attachment_meta'] ) )
        update_post_meta( $post['ID'],
                'rnr_image_meta_layout',
                $attachment['rnr_attachment_meta']
            );
    
    return $post;
}

add_filter( 'attachment_fields_to_save', 'rnr_attachment_meta_save', 10, 2 );

?>