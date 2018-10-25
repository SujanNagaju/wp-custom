<?php 

//Create custom post type slider 
add_action( 'init', 'create_slider_post_type' );
function create_slider_post_type() {
	$labels = array(
		'name'               => _x( 'Slider', 'Sliders', 'hotel-reservation' ),
		'singular_name'      => _x( 'Slider', 'post type singular name', 'hotel-reservation' ),
		'menu_name'          => _x( 'Slider', 'admin menu', 'hotel-reservation' ),
		'name_admin_bar'     => _x( 'Slider', 'add new on admin bar', 'hotel-reservation' ),
		'add_new'            => _x( 'Add New Slider', 'hotel-reservation' ),
		'add_new_item'       => __( 'Add New Slider', 'hotel-reservation' ),
		'new_item'           => __( 'New Slider', 'hotel-reservation' ),
		'edit_item'          => __( 'Edit Slider', 'hotel-reservation' ),
		'view_item'          => __( 'View Slider', 'hotel-reservation' ),
		'all_items'          => __( 'All Slider', 'hotel-reservation' ),
		'search_items'       => __( 'Search Slider', 'hotel-reservation' ),
		'parent_item_colon'  => __( 'Parent Slider:', 'hotel-reservation' ),
		'not_found'          => __( 'No Slider found.', 'hotel-reservation' ),
		'not_found_in_trash' => __( 'No Slider found in Trash.', 'hotel-reservation' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'hotel-reservation' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slider' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'slider', $args );
}

//Create custom post type Room 
add_action( 'init', 'create_room_post_type' );
function create_room_post_type() {
	$labels = array(
		'name'               => _x( 'Room', 'Rooms', 'hotel-reservation' ),
		'singular_name'      => _x( 'Room', 'Room', 'hotel-reservation' ),
		'menu_name'          => _x( 'Room', 'room', 'hotel-reservation' ),
		'name_admin_bar'     => _x( 'Room', 'add new room', 'hotel-reservation' ),
		'add_new'            => _x( 'Add New Room', 'hotel-reservation' ),
		'add_new_item'       => __( 'Add New Room', 'hotel-reservation' ),
		'new_item'           => __( 'New Room', 'hotel-reservation' ),
		'edit_item'          => __( 'Edit Room', 'hotel-reservation' ),
		'view_item'          => __( 'View Room', 'hotel-reservation' ),
		'all_items'          => __( 'All Room', 'hotel-reservation' ),
		'search_items'       => __( 'Search Room', 'hotel-reservation' ),
		'parent_item_colon'  => __( 'Parent Room:', 'hotel-reservation' ),
		'not_found'          => __( 'No Room found.', 'hotel-reservation' ),
		'not_found_in_trash' => __( 'No Room found in Trash.', 'hotel-reservation' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'These are the available rooms in the Yeti Guest House.', 'hotel-reservation' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'room' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'comments' )
	);

	register_post_type( 'room', $args );
}


//Create custom post type Food 
add_action( 'init', 'create_food_post_type' );
function create_food_post_type() {
	$labels = array(
		'name'               => _x( 'Food', 'Foods', 'hotel-reservation' ),
		'singular_name'      => _x( 'Food', 'post type singular name', 'hotel-reservation' ),
		'menu_name'          => _x( 'Food', 'admin menu', 'hotel-reservation' ),
		'name_admin_bar'     => _x( 'Food', 'add new on admin bar', 'hotel-reservation' ),
		'add_new'            => _x( 'Add New Food', 'hotel-reservation' ),
		'add_new_item'       => __( 'Add New Food', 'hotel-reservation' ),
		'new_item'           => __( 'New Food', 'hotel-reservation' ),
		'edit_item'          => __( 'Edit Food', 'hotel-reservation' ),
		'view_item'          => __( 'View Food', 'hotel-reservation' ),
		'all_items'          => __( 'All Food', 'hotel-reservation' ),
		'search_items'       => __( 'Search Food', 'hotel-reservation' ),
		'parent_item_colon'  => __( 'Parent Food:', 'hotel-reservation' ),
		'not_found'          => __( 'No Food found.', 'hotel-reservation' ),
		'not_found_in_trash' => __( 'No Food found in Trash.', 'hotel-reservation' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'hotel-reservation' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'food' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'comments' )
	);

	register_post_type( 'food', $args );
}

//create taxonimies for food post type 
add_action( 'init', 'create_food_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_food_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Mains', 'taxonomy general name', 'hotel-reservation' ),
		'singular_name'     => _x( 'Main', 'taxonomy singular name', 'hotel-reservation' ),
		'search_items'      => __( 'Search Mains', 'hotel-reservation' ),
		'all_items'         => __( 'All Mains', 'hotel-reservation' ),
		'parent_item'       => __( 'Parent Main', 'hotel-reservation' ),
		'parent_item_colon' => __( 'Parent Main:', 'hotel-reservation' ),
		'edit_item'         => __( 'Edit Main', 'hotel-reservation' ),
		'update_item'       => __( 'Update Main', 'hotel-reservation' ),
		'add_new_item'      => __( 'Add New Main', 'hotel-reservation' ),
		'new_item_name'     => __( 'New Main Name', 'hotel-reservation' ),
		'menu_name'         => __( 'Main', 'hotel-reservation' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'main' ),
	);

	register_taxonomy( 'main', array( 'food' ), $args );
}

//Create custom post type customer testimonilas
add_action( 'init', 'create_testimonilas_post_type' );
function create_testimonilas_post_type() {
	$labels = array(
		'name'               => _x( 'Testimonail', 'Testimonails', 'hotel-reservation' ),
		'singular_name'      => _x( 'Testimonail', 'post type singular name', 'hotel-reservation' ),
		'menu_name'          => _x( 'Testimonail', 'admin menu', 'hotel-reservation' ),
		'name_admin_bar'     => _x( 'Testimonail', 'add new on admin bar', 'hotel-reservation' ),
		'add_new'            => _x( 'Add New Testimonail', 'hotel-reservation' ),
		'add_new_item'       => __( 'Add New Testimonail', 'hotel-reservation' ),
		'new_item'           => __( 'New Testimonail', 'hotel-reservation' ),
		'edit_item'          => __( 'Edit Testimonail', 'hotel-reservation' ),
		'view_item'          => __( 'View Testimonail', 'hotel-reservation' ),
		'all_items'          => __( 'All Testimonail', 'hotel-reservation' ),
		'search_items'       => __( 'Search Testimonail', 'hotel-reservation' ),
		'parent_item_colon'  => __( 'Parent Testimonail:', 'hotel-reservation' ),
		'not_found'          => __( 'No Testimonail found.', 'hotel-reservation' ),
		'not_found_in_trash' => __( 'No Testimonail found in Trash.', 'hotel-reservation' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Customer feedbacks', 'hotel-reservation' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimony' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'comments' )
	);

	register_post_type( 'testimony', $args );
}

//create post type aminities
add_action( 'init', 'create_aminities_post_type' );
function create_aminities_post_type() {
	$labels = array(
		'name'               => _x( 'Aminities', 'Aminities', 'hotel-reservation' ),
		'singular_name'      => _x( 'Aminities', 'post type singular name', 'hotel-reservation' ),
		'menu_name'          => _x( 'Aminities', 'admin menu', 'hotel-reservation' ),
		'name_admin_bar'     => _x( 'Aminities', 'add new on admin bar', 'hotel-reservation' ),
		'add_new'            => _x( 'Add New Aminities', 'hotel-reservation' ),
		'add_new_item'       => __( 'Add New Aminities', 'hotel-reservation' ),
		'new_item'           => __( 'New Aminities', 'hotel-reservation' ),
		'edit_item'          => __( 'Edit Aminities', 'hotel-reservation' ),
		'view_item'          => __( 'View Aminities', 'hotel-reservation' ),
		'all_items'          => __( 'All Aminities', 'hotel-reservation' ),
		'search_items'       => __( 'Search Aminities', 'hotel-reservation' ),
		'parent_item_colon'  => __( 'Parent Aminities:', 'hotel-reservation' ),
		'not_found'          => __( 'No Aminities found.', 'hotel-reservation' ),
		'not_found_in_trash' => __( 'No Aminities found in Trash.', 'hotel-reservation' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Aminities', 'hotel-reservation' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'aminities' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'comments' )
	);

	register_post_type( 'aminities', $args );
}

//Create custom post type slider 
add_action( 'init', 'create_booking_post_type' );
function create_booking_post_type() {
	$labels = array(
		'name'               => _x( 'Booking', 'Bookings', 'hotel-reservation' ),
		'singular_name'      => _x( 'Booking', 'post type singular name', 'hotel-reservation' ),
		'menu_name'          => _x( 'Booking', 'admin menu', 'hotel-reservation' ),
		'name_admin_bar'     => _x( 'Booking', 'add new on admin bar', 'hotel-reservation' ),
		'add_new'            => _x( 'Add New Booking', 'hotel-reservation' ),
		'add_new_item'       => __( 'Add New Booking', 'hotel-reservation' ),
		'new_item'           => __( 'New Booking', 'hotel-reservation' ),
		'edit_item'          => __( 'Edit Booking', 'hotel-reservation' ),
		'view_item'          => __( 'View Booking', 'hotel-reservation' ),
		'all_items'          => __( 'All Booking', 'hotel-reservation' ),
		'search_items'       => __( 'Search Booking', 'hotel-reservation' ),
		'parent_item_colon'  => __( 'Parent Booking:', 'hotel-reservation' ),
		'not_found'          => __( 'No Booking found.', 'hotel-reservation' ),
		'not_found_in_trash' => __( 'No Booking found in Trash.', 'hotel-reservation' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'hotel-reservation' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'booking' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'comments', 'author' )
	);

	register_post_type( 'booking', $args );
}