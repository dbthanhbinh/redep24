<?php
$footer_widgets = tie_get_option( 'footer_widgets' ) ? tie_get_option( 'footer_widgets' ) : "footer-3c" ;
if( $footer_widgets != 'disable' ): ?>
	<div class="row">
		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
			<div class="footer-widgets-box col-lg-3 col-md-6 mb-3">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
			<div class="footer-widgets-box  col-lg-3 col-md-6 mb-3">
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
			</div><!-- #second .widget-area -->
		<?php endif; ?>


		<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
			<div class="footer-widgets-box  col-lg-3 col-md-6 mb-3">
				<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
			</div><!-- #third .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
			<div class="footer-widgets-box  col-lg-3 col-md-6 mb-3">
				<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
			</div><!-- #fourth .widget-area -->
		<?php endif; ?>
	</div>
<?php endif; ?>