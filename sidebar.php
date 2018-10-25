<?php 
add_action( 'widgets_init', 'hotel_reservation_widgets_init' );
function hotel_reservation_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'hotel-reservation' ),
		'id' => 'recent-blog-sidebar',
		'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'hotel-reservation' ),
		'before_widget' => '<div class="col-md-3 colorlib-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		'menu_class' => 'colorlib-footer-links'
	) );
}