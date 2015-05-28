<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>

<div class="price-outer" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p class="price"><?php echo $product->get_price_html(); ?></p>

	<meta itemprop="price" content="<?php echo $product->get_price(); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />

</div>

<?php if ( powc_cat_is( 'heirloom' ) ) : ?>

    <div class="sizeguide-toggle">
        <a href="#" class="sizeguide-toggle-link">SIZE GUIDES</a>
    </div>

    <div class="sizeguides">

        <div class="sizeguide-tables">

            <table class="sg">
              <tr>
                <th class="sg-country">france</th>
                <th class="sg-number">30</th>
                <th class="sg-number">32</th>
                <th class="sg-number">34</th>
                <th class="sg-number">36</th>
                <th class="sg-number">38</th>
                <th class="sg-number">40</th>
              </tr>
              <tr>
                <td class="sg-country">italy</td>
                <td class="sg-number">38</td>
                <td class="sg-number">40</td>
                <td class="sg-number">42</td>
                <td class="sg-number">44</td>
                <td class="sg-number">46</td>
                <td class="sg-number">48</td>
              </tr>
              <tr>
                <td class="sg-country">us</td>
                <td class="sg-number">2</td>
                <td class="sg-number">4</td>
                <td class="sg-number">6</td>
                <td class="sg-number">8</td>
                <td class="sg-number">10</td>
                <td class="sg-number">12</td>
              </tr>
              <tr>
                <td class="sg-country">international</td>
                <td class="sg-number">XXS</td>
                <td class="sg-number">XS</td>
                <td class="sg-number">S</td>
                <td class="sg-number">M</td>
                <td class="sg-number">L</td>
                <td class="sg-number">XL</td>
              </tr>
            </table>

            <a href="#" class="sizeguide-close">×</a>
        </div>
    </div>

<?php endif; ?>
