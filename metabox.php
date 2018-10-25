<?php 

add_action('add_meta_boxes', 'subtitle_meta_box_add');
function subtitle_meta_box_add(){
	add_meta_box(
		'subtitle_meta_box_id',
		'Subtitle',
		'subtitle_meta_box_cb',
		'slider',
		'normal',
		'default'
	);
}

function subtitle_meta_box_cb(){
	global $post;
	$subtitle = get_post_meta($post->ID, 'subtitle_meta_key',true);
	
	?>
	<p>
		<label>Subtitle</label>
		<textarea name = "subtitle" class="widefat"> <?php echo $subtitle ?> </textarea>
		
	</p>
	

	<?php
}

add_action('save_post', 'subtitle_meta_box_save',10,1);
function subtitle_meta_box_save($post_id){
	$post_type = get_post_type($post_id);

	if('slider' != $post_type){
		return;
	}
	if(isset($_POST['subtitle'])){
		update_post_meta($post_id, 'subtitle_meta_key', sanitize_text_field($_POST['subtitle']));
	}
}

//create metabox for buttons know more and view details 
add_action('add_meta_boxes', 'button_meta_box_add');
function button_meta_box_add(){
	add_meta_box(
		'button_meta_box_id',
		'Button Link',
		'button_metabox_cb',
		'slider',
		'normal',
		'default'
	);
}
function button_metabox_cb(){
	global $post;
	$know_more = get_post_meta($post->ID, 'know_more_meta_key', true);
	$view_detail = get_post_meta($post->ID, 'view_detail_meta_key', true);
	?>
	<p>
		<label for="button_link">Links for know more </label>
		<input type="text" name="know_more" id="button_link" value="<?php echo $know_more; ?>">
	</p>

	<p>
		<label for="button_link">Links for View Details </label>
		<input type="text" name="view_detail" id="button_link" value="<?php echo $view_detail; ?>">
	</p>
	<?php
}
add_action('save_post', 'button_meta_save');
function button_meta_save($post_id){
	$post_type = get_post_type($post_id);
	if ('slider' != $post_type) {
		return;
	}
	if(isset($_POST['know_more'])){
		update_post_meta($post_id, 'know_more_meta_key', sanitize_text_field($_POST['know_more']));
	}
	if(isset($_POST['view_detail'])){
		update_post_meta($post_id, 'view_detail_meta_key', sanitize_text_field($_POST['view_detail']));
	}
}

//add metabox for front page specific
add_action('add_meta_boxes', 'add_post_information_meta');
function add_post_information_meta()
{
    global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'tmpl/tmpl-home.php' )
        {
            add_meta_box(
                'post_information_meta', // $id
                'Post Information', // $title
                'post_information_cb', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}

function post_information_cb()
{
	global $post;
	$class1 = get_post_meta($post->ID, 'icon_class_meta_key1', true);
	$class2 = get_post_meta($post->ID, 'icon_class_meta_key2', true);
	$class3 = get_post_meta($post->ID, 'icon_class_meta_key3', true);
	$class4 = get_post_meta($post->ID, 'icon_class_meta_key4', true);

	$title1 = get_post_meta($post->ID, 'post_title_meta_key1', true);
	$title2 = get_post_meta($post->ID, 'post_title_meta_key2', true);
	$title3 = get_post_meta($post->ID, 'post_title_meta_key3', true);
	$title4 = get_post_meta($post->ID, 'post_title_meta_key4', true);

	$content1 = get_post_meta($post->ID, 'post_content_meta_key1', true);
	$content2 = get_post_meta($post->ID, 'post_content_meta_key2', true);
	$content3 = get_post_meta($post->ID, 'post_content_meta_key3', true);
	$content4 = get_post_meta($post->ID, 'post_content_meta_key4', true);

	
    // Add the HTML for the post meta
    ?>
	<p>
		<label for="icon_class1">Icon Class1</label>
		<input type="text" name="icon_class1" id="icon_class1" value="<?php echo $class1 ?>">
	</p>
	<p>
		<label for="icon_class2">Icon Class2</label>
		<input type="text" name="icon_class2" id="icon_class2" value="<?php echo $class2 ?>">
	</p>
	<p>
		<label for="icon_class3">Icon Class3</label>
		<input type="text" name="icon_class3" id="icon_class3" value="<?php echo $class3 ?>">
	</p>
	<p>
		<label for="icon_class4">Icon Class4</label>
		<input type="text" name="icon_class4" id="icon_class4" value="<?php echo $class4 ?>">
	</p>

	<p>
		<label for="post_title1">Post Title1</label>
		<input type="text" name="post_title1" id="post_title1" value="<?php echo $title1 ?>">
	</p>
	<p>
		<label for="post_title2">Post Title2</label>
		<input type="text" name="post_title2" id="post_title2" value="<?php echo $title2 ?>">
	</p>
	<p>
		<label for="post_title3">Post Title3</label>
		<input type="text" name="post_title3" id="post_title3" value="<?php echo $title3 ?>">
	</p>
	<p>
		<label for="post_title4">Post Title4</label>
		<input type="text" name="post_title4" id="post_title4" value="<?php echo $title4 ?>">
	</p>

	<p>
		<label for="post_content1">Content1</label>
		<textarea name="post_content1" id="post_content1"><?php echo $content1; ?></textarea>
	</p>
	<p>
		<label for="post_content2">Content2</label>
		<textarea name="post_content2" id="post_content2"><?php echo $content2; ?></textarea>
	</p>
	<p>
		<label for="post_content3">Content3</label>
		<textarea name="post_content3" id="post_content3"><?php echo $content3; ?></textarea>
	</p>
	<p>
		<label for="post_content4">Content4</label>
		<textarea name="post_content4" id="post_content4"><?php echo $content4; ?></textarea>
	</p>

    <?php
   
}
add_action('save_post', 'content_meta_save');
function content_meta_save($post_id){
	$post_type = get_post_type($post_id);
	if('page' != $post_type ){
		return;
	} 
	if(isset($_POST['icon_class1'])){
		update_post_meta($post_id, 'icon_class_meta_key1', sanitize_text_field($_POST['icon_class1']));
	}
	if(isset($_POST['icon_class2'])){
		update_post_meta($post_id, 'icon_class_meta_key2', sanitize_text_field($_POST['icon_class2']));
	}
	if(isset($_POST['icon_class3'])){
		update_post_meta($post_id, 'icon_class_meta_key3', sanitize_text_field($_POST['icon_class3']));
	}
	if(isset($_POST['icon_class4'])){
		update_post_meta($post_id, 'icon_class_meta_key4', sanitize_text_field($_POST['icon_class4']));
	}

	if(isset($_POST['post_title1'])){
		update_post_meta($post_id, 'post_title_meta_key1', sanitize_text_field($_POST['post_title1']));
	}
	if(isset($_POST['post_title2'])){
		update_post_meta($post_id, 'post_title_meta_key2', sanitize_text_field($_POST['post_title2']));
	}
	if(isset($_POST['post_title3'])){
		update_post_meta($post_id, 'post_title_meta_key3', sanitize_text_field($_POST['post_title3']));
	}
	if(isset($_POST['post_title4'])){
		update_post_meta($post_id, 'post_title_meta_key4', sanitize_text_field($_POST['post_title4']));
	}

	if(isset($_POST['post_content1'])){
		update_post_meta($post_id, 'post_content_meta_key1', sanitize_text_field($_POST['post_content1']));
	}
	if(isset($_POST['post_content2'])){
		update_post_meta($post_id, 'post_content_meta_key2', sanitize_text_field($_POST['post_content2']));
	}
	if(isset($_POST['post_content3'])){
		update_post_meta($post_id, 'post_content_meta_key3', sanitize_text_field($_POST['post_content3']));
	}
	if(isset($_POST['post_content4'])){
		update_post_meta($post_id, 'post_content_meta_key4', sanitize_text_field($_POST['post_content4']));
	}
}


//Add Meta Box for Room post type and display title and content of the website 
add_action('add_meta_boxes', 'add_room_information_meta');
function add_room_information_meta()
{
    global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'tmpl/tmpl-home.php' )
        {
            add_meta_box(
                'room_information_meta', // $id
                'Hotel Information', // $title
                'hotel_information_cb', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}

function hotel_information_cb(){
	global $post;
	$room_title = get_post_meta($post->ID, 'room_title_meta_key', true);
	$room_content = get_post_meta($post->ID, 'room_content_meta_key', true);
	$menu_title = get_post_meta($post->ID, 'menu_title_meta_key', true);
	$menu_description = get_post_meta($post->ID, 'menu_description_meta_key', true);
	$blog_title = get_post_meta($post->ID, 'blog_title_meta_key', true);
	$blog_content = get_post_meta($post->ID, 'blog_content_meta_key', true);
	$feedback_title = get_post_meta($post->ID, 'feedback_title_meta_key', true);
	$feedback_content = get_post_meta($post->ID, 'feedback_content_meta_key', true);



	?>
	<p>
		<label for="room_title"> Room Title</label>
		<input type="text" name="room_title" id="room_title" value="<?php echo $room_title ?>" class="widefat">
	</p>
	<p>
		<label for="room_content">Content</label>
		<textarea name="room_content" id="room_content" class="widefat"><?php echo $room_content ?></textarea>
	</p>
	<p>
		<label for="menu_name">Menu Name</label>
		<input class="widefat" type="text" name="menu_title" id="menu_name" value="<?php echo $menu_title ?>">
	</p>
	<p>
		<label for="menu_description" > Menu Description</label>
		<textarea name="menu_description" id="menu_description" class="widefat"><?php echo $menu_description ?></textarea>
	</p>
	<p>
		<label for="blog_title">Blog title</label>
		<input class="widefat" type="text" name="blog_title" id="blog_title" value="<?php echo $blog_title ?>">
	</p>
	<p>
		<label for="blog_content" > Blog Content</label>
		<textarea name="blog_content" id="blog_content" class="widefat"><?php echo $blog_content ?></textarea>
	</p>
	<p>
		<label for="feedback_title">Feedback Title</label>
		<input class="widefat" type="text" name="feedback_title" id="feedback_title" value="<?php echo $feedback_title ?>">
	</p>
	<p>
		<label for="feedback_content" > Feedback Content</label>
		<textarea name="feedback_content" id="feedback_content" class="widefat"><?php echo $feedback_content ?></textarea>
	</p>
	<?php
}

add_action('save_post', 'save_room_information');
function save_room_information($post_id){
	$post_type = get_post_type($post_id);

	if('page' != $post_type){
		return;
	}
	if(isset($_POST['room_title'])){
		update_post_meta($post_id,'room_title_meta_key', sanitize_text_field($_POST['room_title']));
	}
	if(isset($_POST['room_content'])){
		update_post_meta($post_id, 'room_content_meta_key', sanitize_text_field($_POST['room_content']));
	}
	if(isset($_POST['menu_title'])){
		update_post_meta($post_id, 'menu_title_meta_key', sanitize_text_field($_POST['menu_title']));
	}
	if(isset($_POST['menu_description'])){
		update_post_meta($post_id, 'menu_description_meta_key', sanitize_text_field($_POST['menu_description']));
	}
	if(isset($_POST['blog_title'])){
		update_post_meta($post_id, 'blog_title_meta_key', sanitize_text_field($_POST['blog_title']));
	}
	if(isset($_POST['blog_content'])){
		update_post_meta($post_id, 'blog_content_meta_key', sanitize_text_field($_POST['blog_content']));
	}
	if(isset($_POST['feedback_title'])){
		update_post_meta($post_id, 'feedback_title_meta_key', sanitize_text_field($_POST['feedback_title']));
	}
	if(isset($_POST['feedback_content'])){
		update_post_meta($post_id, 'feedback_content_meta_key', sanitize_text_field($_POST['feedback_content']));
	}

}

//register metabox for post type room
add_action('add_meta_boxes', 'add_room_description');
function add_room_description(){
            add_meta_box(
                'room_description_meta', // $id
                'Room Description', // $title
                'room_description_cb', // $callback
                'room', // $page
                'normal', // $context
                'default' // $priority
        	);
}
//Callback function for metabox room description
function room_description_cb(){
	global $post;
	$price = get_post_meta($post->ID, 'room_price_meta_key', true);
	$status = get_post_meta($post->ID, 'room_status', true);
	$room_no = get_post_meta($post->ID, 'available_rooms', true);

	//echo '<pre>'; print_r( get_post_meta( $post->ID ) ); echo '</pre>';

	?>
		<p>
			<label>Price</label>
			<input type="text" name="price" value="<?php echo $price ?>" class="widefat">
		</p>
		<p>
			<label>Status</label>
			<select name="status" class="widefat">
				<option value="available" <?php selected($status, 'available'); ?>>Available </option>
				<option value="not_available" <?php selected($status, 'not_available'); ?>>Not Available</option>
			</select>
		</p>
		<p>
			<label>No Of Rooms Available</label>
			<input type="text" name="rooms_available" value ="<?php  echo $room_no; ?>" class="widefat">
		</p>
	<?php
}

//save_metabox data 
add_action('save_post','save_room_description_meta');
function save_room_description_meta($post_id){
	$post_type = get_post_type($post_id);

	if( 'room' != $post_type ){
		return;
	}


	if(isset($_POST['price'])){
		update_post_meta($post_id,'room_price_meta_key', sanitize_text_field(($_POST['price'])));
	}
	if(isset($_POST['status'])){
		update_post_meta($post_id, 'room_status', sanitize_text_field($_POST['status']));
	}
	if(isset($_POST['rooms_available'])){
		update_post_meta($post_id, 'available_rooms', sanitize_text_field($_POST['rooms_available']));
	}
}

//add_metaboxes to the post type food 
add_action('add_meta_boxes', 'add_food_price_metabox');
function add_food_price_metabox () {
	add_meta_box(
		'food_price_id',
		'Food Price',
		'food_price_cb',
		'food',
		'normal',
		'default'
	);
}

function food_price_cb(){
	global $post;
	$food_price = get_post_meta($post->ID,'save_food_price_meta', true);
	?>
		<p>
			<label for="food_price">Price Of Food</label>
			<input id="food_price"  type="text" class="widefat" name="food_price" value="<?php echo $food_price ?>">
		</p>
	<?php
}
add_action('save_post', 'save_price_meta');
function save_price_meta($post_id){
	$post_type = get_post_type($post_id);

	if('food' != $post_type){
		return;
	}
	if(isset($_POST['food_price'])){
		update_post_meta($post_id, 'save_food_price_meta', sanitize_text_field($_POST['food_price']));
	}
}

//create meta box for post type aminities
add_action('add_meta_boxes', 'aminities_meta_box_add');
function aminities_meta_box_add(){
	add_meta_box(
		'aminities_price_id',
		'Aminities Description',
		'aminities_information_cb',
		'aminities',
		'normal',
		'default'
	);
}

function aminities_information_cb(){
	global $post;
	$price = get_post_meta($post->ID, 'save_aminities_price_meta_key', true);
	$price_description = get_post_meta($post->ID, 'save_aminities_price_description_meta_key', true);
	?>
	<p>
	<label for="price">Price </label>
	<input type="text" name="price" id="price" class="widefat" value="<?php echo $price ?>">
	</p>
	<p>
		<label for="price_description">Price Description</label>
		<input type="text" name="price_description" id="price_description" class="widefat" value="<?php echo $price_description ?>">
	</p>
	<?php
}

add_action('save_post', 'save_aminities_info');
function save_aminities_info($post_id){
	$post_type = get_post_type($post_id);
	if('aminities' != $post_type){
		return;
	}
	if(isset($_POST['price'])){
		update_post_meta($post_id, 'save_aminities_price_meta_key', sanitize_text_field($_POST['price']));
	}
	if(isset($_POST['price_description'])){
		update_post_meta($post_id, 'save_aminities_price_description_meta_key', sanitize_text_field($_POST['price_description']));
	}
}

//create metabox for the post type bookings
add_action('add_meta_boxes', 'booking_meta_box_add');
function booking_meta_box_add(){
	add_meta_box(
		'booking_meta_box_id',
		'Booking Information',
		'booking_meta_box_cb',
		'booking',
		'normal',
		'default'
	);
}
function booking_meta_box_cb(){
	global $post;
	$fname = get_post_meta($post->ID, 'fname_meta_key', true);
	$lname = get_post_meta($post->ID, 'lname_meta_key', true);
	$address = get_post_meta($post->ID, 'address_meta_key', true);
	$contact = get_post_meta($post->ID, 'contact_meta_key', true);
	$email = get_post_meta($post->ID, 'email_meta_key', true);
	$status = get_post_meta($post->ID, 'status_meta_key', true);
	$id = get_post_meta($post->ID, 'hidden_field_meta_key', true);
	$room_no = get_post_meta($post->ID, 'room_numbers', true);
	$check_in = get_post_meta($post->ID, 'check_in_date', true);
	$check_out = get_post_meta($post->ID, 'check_out_date', true);
	//var_dump(intval($room_no));
?>
	<input type="hidden" name="hidden_field" value="<?php echo $id; ?>">
	<p>
		<label for="fname">First Name</label>
		<input type="text" name="fname" id="fname" class="widefat" value="<?php echo $fname; ?>">
	</p>
	<p>
		<label for="lname">Last Name</label>
		<input type="text" name="lname" id="lname" class="widefat" value="<?php echo $lname; ?>">
	</p>
	<p>
		<label for="address">Address</label>
		<input type="text" name="address" id="address" class="widefat" value="<?php echo $address; ?>">
	</p>
	<p>
		<label for="contact"> Contact</label>
		<input type="text" name="contact" id="contact" class="widefat" value="<?php echo $contact; ?>">
	</p>
	<p>
		<label for="email"> Email</label>
		<input type="email" name="email" id="email" class="widefat" value="<?php echo $email; ?>">
	</p>
	<p>
		<label>No Of Rooms</label>
		<select name="room_no" class="widefat">
			<?php for ($i=1; $i <=5 ; $i++) { ?>
			<option value="<?php echo $i ?>" <?php selected($room_no, $i) ?>><?php echo $i; ?></option>
			<?php } ?>
		</select>
	</p>
	<p>
		<label for="check_in_date">Check-in:</label>
		<input type="text" id="check_in_date" name="check_in" class="widefat" value="<?php echo $check_in; ?>" >
	</p>
	<p>
		<label for="check_out_date">Check-out:</label>
		<input type="text" id="check_out_date" name="check_out" class="widefat" value="<?php echo $check_out; ?>"  >
	</p>
	<p>
		<label for="booking_status">Booking Status</label>
		<select name="status" id="booking_status" class="widefat">
			<option value="pending" <?php selected($status, 'pending') ?> >Pending</option>
			<option value="approve" <?php selected($status, 'approve') ?> >Approve</option>
			<option value="cancel" <?php selected($status, 'cancel') ?> >Cancel</option>
		</select>
	</p>
	
	<?php
}
add_action('save_post','save_booking_information', 10, 3);
function save_booking_information($post_id, $post, $updated ){

	$post_type = get_post_type($post_id);
	if('booking' != $post_type){
		return;
	}

	// echo '<pre>'; print_r( $_POST ); die;
	$available_rooms = 0;
	$booked_room = '';
	if(isset($_POST['hidden_field'])){
		$booked_room = $_POST['hidden_field'];
		update_post_meta($post_id, 'hidden_field_meta_key', sanitize_text_field($_POST['hidden_field']));
		$available_rooms = get_post_meta( $_POST['hidden_field'], 'available_rooms', true );
	}

	if(isset($_POST['fname'])){
		update_post_meta($post_id, 'fname_meta_key', sanitize_text_field($_POST['fname']));
	}

	if(isset($_POST['lname'])){
		update_post_meta($post_id, 'lname_meta_key', sanitize_text_field($_POST['lname']));
	}

	if(isset($_POST['address'])){
		update_post_meta($post_id, 'address_meta_key', sanitize_text_field($_POST['address']));
	}

	if(isset($_POST['email'])){
		update_post_meta($post_id, 'email_meta_key', sanitize_text_field($_POST['email']));
	}

	if(isset($_POST['contact'])){
		update_post_meta($post_id, 'contact_meta_key', sanitize_text_field($_POST['contact']));
	}

	if(isset($_POST['status'])){
		update_post_meta($post_id, 'status_meta_key', sanitize_text_field($_POST['status']));
	}
	if(isset($_POST['check_in'])){
		update_post_meta($post_id, 'check_in_date', sanitize_text_field($_POST['check_in']));
	}
	if(isset($_POST['check_out'])){
		update_post_meta($post_id, 'check_out_date', sanitize_text_field($_POST['check_out']));
		update_post_meta($post_id, 'check_out_date', sanitize_text_field($_POST['check_out']));
	}
	
	if(isset($_POST['room_no'])){
		update_post_meta($post_id, 'room_numbers', sanitize_text_field($_POST['room_no']));
		if( ! $updated ) {
			if( ! empty( $booked_room )  && ($_POST['room_no'] <= $available_rooms) ) {
				$booked_no = $_POST['room_no'];
				update_post_meta( $booked_room, 'available_rooms', ( $available_rooms - $booked_no ) );
			}
		}
	}
	if(isset($_POST['status']) && $_POST['status'] == 'approve'){
		$to = $_POST['email'];
		$message = 'Your booking has been successful';
		$subject = 'Hotel Booking';
		wp_mail($to, $subject, $message);
		die(var_dump(wp_mail($to, $subject, $message)));
	}

}
