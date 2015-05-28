<?php
/**
 * Product Loop End
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
<?php if ( powc_cat_is('heirloom') ) :?>
    </div>
        </ul>
<?php elseif ( powc_cat_is('scarve') ) :?>
    </div>
        </ul>
<?php else: ?>
    </ul >
<?php endif; ?>