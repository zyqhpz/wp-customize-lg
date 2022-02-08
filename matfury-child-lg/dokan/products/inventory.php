<div class="dokan-product-inventory dokan-edit-row <?php echo esc_attr( $class ); ?>">
    <div class="dokan-section-heading" data-togglehandler="dokan_product_inventory">
        <h2><i class="fa fa-cubes" aria-hidden="true"></i> <?php esc_html_e( 'Inventory', 'dokan-lite' ); ?></h2>
        <p><?php esc_html_e( 'Manage inventory for this product.', 'dokan-lite' ); ?></p>
        <a href="#" class="dokan-section-toggle">
            <i class="fa fa-sort-desc fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">

        <div class="content-half-part dokan-form-group">
            <label for="_sku" class="form-label"><?php esc_html_e( 'SKU', 'dokan-lite' ); ?> <span><?php esc_html_e( '(Stock Keeping Unit)', 'dokan-lite' ); ?></span></label>
            <?php dokan_post_input_box( $post_id, '_sku' ); ?>
        </div>

        <div class="content-half-part hide_if_variable hide_if_external">
            <label for="_stock_status" class="form-label"><?php esc_html_e( 'Stock Status', 'dokan-lite' ); ?></label>

            <?php dokan_post_input_box( $post_id, '_stock_status', array( 'options' => array(
                'instock'     => __( 'In Stock', 'dokan-lite' ),
                'outofstock'  => __( 'Out of Stock', 'dokan-lite' ),
                'onbackorder' => __( 'On Backorder', 'dokan-lite' ),
            ) ), 'select' ); ?>
        </div>

        <div class="dokan-clearfix"></div>

        <?php if ( 'yes' === get_option( 'woocommerce_manage_stock' ) ) : ?>
        <div class="dokan-form-group hide_if_grouped hide_if_external">
            <?php dokan_post_input_box( $post_id, '_manage_stock', array( 'label' => __( 'Enable product stock management', 'dokan-lite' ) ), 'checkbox' ); ?>
        </div>

        <div class="show_if_stock dokan-stock-management-wrapper dokan-form-group dokan-clearfix">

            <div class="content-half-part">
                <label for="_stock" class="form-label"><?php esc_html_e( 'Stock quantity', 'dokan-lite' ); ?></label>
                <input type="number" class="dokan-form-control" name="_stock" placeholder="<?php esc_attr__( '1', 'dokan-lite' ); ?>" value="<?php echo esc_attr( wc_stock_amount( $_stock ) ); ?>" min="0" step="1">
            </div>

            <?php if ( version_compare( WC_VERSION, '3.4.7', '>' ) ) : ?>
            <div class="content-half-part">
                <label for="_low_stock_amount" class="form-label"><?php esc_html_e( 'Low stock threshold', 'dokan-lite' ); ?></label>
                <input type="number" class="dokan-form-control" name="_low_stock_amount" placeholder="<?php esc_attr__( '1', 'dokan-lite' ); ?>" value="<?php echo esc_attr( wc_stock_amount( $_low_stock_amount ) ); ?>" min="0" step="1">
            </div>
            <?php endif; ?>
            
            <div class="content-half-part last-child">
                <label for="_backorders" class="form-label"><?php esc_html_e( 'Allow Backorders', 'dokan-lite' ); ?></label>
                
                <?php dokan_post_input_box( $post_id, '_backorders', array( 'options' => array(
                    'no'     => __( 'Do not allow', 'dokan-lite' ),
                    'notify' => __( 'Allow but notify customer', 'dokan-lite' ),
                    'yes'    => __( 'Allow', 'dokan-lite' )
                    ) ), 'select' ); ?>
            </div>

            <!-- ADD NEW HERE (Haziq - 06/02/2022) - add hook for uom -->
            <div class="content-half-part" style="padding-left: 10px;">
                <?php
                do_action('uom_dokan_fields', $post_id);
                ?>
            </div>

            <div class="dokan-clearfix"></div>
        </div><!-- .show_if_stock -->
        <?php endif; ?>

        <div class="dokan-form-group hide_if_grouped hide_if_external">
            <label class="" for="_sold_individually">
                <input name="_sold_individually" id="_sold_individually" value="yes" type="checkbox" <?php checked( $_sold_individually, 'yes' ); ?>>
                <?php esc_html_e( 'Allow only one quantity of this product to be bought in a single order', 'dokan-lite' ) ?>
            </label>
        </div>

        <?php if ( $post_id ): ?>
            <?php do_action( 'dokan_product_edit_after_inventory' ); ?>
        <?php endif; ?>

        <?php do_action( 'dokan_product_edit_after_downloadable', $post, $post_id ); ?>
        <?php do_action( 'dokan_product_edit_after_sidebar', $post, $post_id ); ?>
        <?php do_action( 'dokan_single_product_edit_after_sidebar', $post, $post_id ); ?>

    </div><!-- .dokan-side-right -->
</div><!-- .dokan-product-inventory -->

<?php // ADD NEW HERE (Haziq - 06/02/2022) - add hook for product-knowledge ?>
<div class="dokan-product-product-knowledge dokan-edit-row <?php echo esc_attr( $class ); ?>">
    <div class="dokan-section-heading" data-togglehandler="dokan_product_inventory">
        <h2><i class="fa fa-info-circle" aria-hidden="true"></i> <?php esc_html_e( 'Product Knowledge', 'dokan-lite' ); ?></h2>
        <p><?php esc_html_e( 'Manage product info for this product.', 'dokan-lite' ); ?></p>
        <a href="#" class="dokan-section-toggle">
            <i class="fa fa-sort-desc fa-flip-vertical" aria-hidden="true"></i>
        </a>
        <div class="dokan-clearfix"></div>
    </div>

    <div class="dokan-section-content">
        <?php do_action( 'dokan_extra_product_knowledge', $post_id ); ?>
    </div>
    
</div>