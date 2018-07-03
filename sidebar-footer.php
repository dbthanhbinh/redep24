<?php
$footer_widgets = tie_get_option( 'footer_widgets' ) ? tie_get_option( 'footer_widgets' ) : "footer-3c" ;
$gclass1 = '';
$gclass2 = '';
$gclass3 = '';
$gclass4 = '';

$isFirst = false;
$isSecond = false;
$isThird = false;
$isfourth = false;

switch(tie_get_option( 'footer_widgets' )) {
	case 'footer-1c':
		$gclass1 = 'col-lg-12 col-md-12 mb-12';
		$isFirst = true;
		$isSecond = false;
		$isThird = false;
		$isfourth = false;
	break;	
	case 'footer-2c':
		$gclass1 = $gclass2 = 'col-lg-6 col-md-6 mb-6';
		$isFirst = true;
		$isSecond = true;
		$isThird = false;
		$isfourth = false;
	break;
	case 'narrow-wide-2c':
		$gclass1 = 'col-lg-3 col-md-3 mb-3';
		$gclass2 = 'col-lg-9 col-md-9 mb-9';
		$isFirst = true;
		$isSecond = true;
		$isThird = false;
		$isfourth = false;
	break;
	case 'wide-narrow-2c':
		$gclass1 = 'col-lg-9 col-md-9 mb-9';
		$gclass2 = 'col-lg-3 col-md-3 mb-3';		
		$isFirst = true;
		$isSecond = true;
		$isThird = false;
		$isfourth = false;
	break;
	case 'footer-3c':
		$gclass1 = $gclass2 = $gclass3 = 'col-lg-4 col-md-4 mb-4';	
		$isFirst = true;
		$isSecond = true;
		$isThird = true;
		$isfourth = false;
	break;
	case 'wide-left-3c':
		$gclass1 = 'col-lg-6 col-md-6 mb-6';
		$gclass2 = $gclass3 = 'col-lg-3 col-md-3 mb-3';		
		$isFirst = true;
		$isSecond = true;
		$isThird = true;
		$isfourth = false;
	break;
	case 'wide-right-3c':		
		$gclass1 = $gclass2 = 'col-lg-3 col-md-3 mb-3';		
		$gclass3 = 'col-lg-6 col-md-6 mb-6';
		$isFirst = true;
		$isSecond = true;
		$isThird = true;
		$isfourth = false;
	break;
	case 'footer-4c':
		$gclass1 = $gclass2 = $gclass3 = $gclass4 = 'col-lg-3 col-md-3 mb-3';				
		$isFirst = true;
		$isSecond = true;
		$isThird = true;
		$isfourth = true;
	break;
}

if( $footer_widgets != 'disable' ): ?>
	<div class="row">
		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) && $isFirst) : ?>
			<div class="footer-widgets-box <?= $gclass1 ?>">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'second-footer-widget-area' ) && $isSecond ) : ?>
			<div class="footer-widgets-box <?= $gclass2 ?>">
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
			</div><!-- #second .widget-area -->
		<?php endif; ?>


		<?php if ( is_active_sidebar( 'third-footer-widget-area' ) && $isThird ) : ?>
			<div class="footer-widgets-box <?= $gclass3 ?>">
				<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
			</div><!-- #third .widget-area -->
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) && $isfourth ) : ?>
			<div class="footer-widgets-box <?= $gclass4 ?>">
				<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
			</div><!-- #fourth .widget-area -->
		<?php endif; ?>
	</div>
<?php endif; ?>