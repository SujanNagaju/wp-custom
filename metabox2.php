/*add_action('add_meta_boxes', 'project_information_meta_box_add');
function project_information_meta_box_add(){
	add_meta_box(
		'project_information',
		'Project Information',
		'project_information_metabox_cb',
		'post',
		'normal',
		'default'
	);
}

function project_information_metabox_cb(){
	global $post;
	$status_meta = get_post_meta($post->ID, 'project_status_meta_key',true);
	//var_dump($status_meta);
	$summary_meta = get_post_meta($post->ID, 'summary_meta_key', true);
	$revenue_meta = get_post_meta($post->ID,'revenue_meta_key', true);
	$expenses_meta = get_post_meta($post->ID,'expenses_meta_key', true);
	$queries_meta = get_post_meta($post->ID,'queries_meta_key',true);
	
	//for interest meta
	$interests = array('music', 'sports', 'coding');
	$test = get_post_meta($post->ID, 'interest_meta_key', true);
	$interest_meta = ( $test ) ? $test : array();

	//for color meta 
	$color_meta = get_post_meta($post->ID, 'color_meta_key', true);

	
	?>
	<p>
		<label for="project_status">Project Status</label>
		<input type="radio" name="project_status" <?php echo ( $status_meta == 'design' ) ? 'checked' : ''; ?> value="design">Design &nbsp
		<input type="radio" name="project_status" <?php echo ( $status_meta == 'development' ) ? 'checked' : ''; ?> value="development">Development &nbsp
		<input type="radio" name="project_status" <?php echo ( $status_meta == 'edit' ) ? 'checked' : ''; ?> value="edit">Edit 
	</p>

	<p>
		<label>Status Summary</label>
		<input type="textarea" name="summary" class="widefat" value="<?php echo $summary_meta ?>"/>
	</p>

	<p>
		<label>Revenue $</label>
		<input type="text" name="revenue" value="<?php echo $revenue_meta ?>">
	</p>

	<p>
		<label>Expenses $</label>
		<input type="text" name="expenses" value="<?php echo $expenses_meta ?>">
	</p>

	<p>
		<label>Queuries</label>
		<textarea rows="4" name="queries" class="widefat" ><?php echo $queries_meta ?></textarea>
	</p>

	<p>
		<?php
		foreach ( $interests as $interest ) {
			?>
			<input type="checkbox" name="interest[]" value="<?php echo $interest; ?>" <?php checked( ( in_array( $interest, $interest_meta ) ) ? $interest : '', $interest ); ?> /><?php echo $interest; ?> <br />
			<?php
		}
		?>
	</p>
	<p>
		  
		<label for="color">Color</label>  
		<select name="color" id="color">  
			<option value="red" <?php selected ($color_meta, 'red'); ?>>Red</option>  
			<option value="blue" <?php selected ($color_meta, 'blue'); ?>>Blue</option>  
		</select>  
		
	</p>

	<?php 
}

add_action('save_post', 'save_project_information',10,1);
function save_project_information($post_id){
	$post_type = get_post_type($post_id);

	if("post" != $post_type){
		return;
	}

	if(isset($_POST['project_status'])){
		update_post_meta($post_id, 'project_status_meta_key', sanitize_text_field($_POST['project_status']));
	}

	if(isset($_POST['summary'])){
		update_post_meta($post_id, 'summary_meta_key', sanitize_text_field($_POST['summary']));
	}

	if(isset($_POST['revenue'])){
		update_post_meta($post_id, 'revenue_meta_key', sanitize_text_field($_POST['revenue']));
	}

	if(isset($_POST['expenses'])){
		update_post_meta($post_id, 'expenses_meta_key', sanitize_text_field($_POST['expenses']));
	}

	if(isset($_POST['queries'])){
		update_post_meta($post_id, 'queries_meta_key', sanitize_textarea_field($_POST['queries']) );
	}

	if(isset($_POST['interest'])){
		update_post_meta($post_id, 'interest_meta_key', $_POST['interest']);
	}
	else{
		update_post_meta($post_id, 'interest_meta_key', '');
	}

	if (isset($_POST['color'])) {
		update_post_meta($post_id, 'color_meta_key',$_POST['color']);
	}
	
}*/

add_action('add_meta_boxes', 'page_list_meta_box_add');
function page_list_meta_box_add(){
	add_meta_box(
		'page_list_meta_box_id',
		'List of pages',
		'page_list_meta_box_cb',
		'post',
		'normal',
		'default'
	);
}

//create call back function for metabox List of pages
function page_list_meta_box_cb(){
	global $post;
	$value = get_post_meta($post->ID, 'page_save_meta_key', true);
	$class_meta = get_post_meta($post->ID, 'class_meta_key', true);
	echo $class_meta;
	//var_dump($value);

	$query = new WP_Query(
		array(
			'post_type' =>'page',
			

		)
	);

	if($query->have_posts()){
		?>
		<p>
			<label>Pages</label>
			<select name="pages">
				<option value = "">Select Page</option>
				<?php 
				while ($query->have_posts()) {
					$query->the_post();?>
					<option value="<?php echo get_the_ID(); ?>" <?php selected($value, get_the_ID()) ?>><?php echo get_the_title(); ?></option>
					<?php
				}
				?>
			</select>
		</p>
		

		<?php } ?>
	
	<p>
			<label> Post Class </label>
			<input type="text" name="class" value="<?php echo $class_meta ?>">
		</p>
		<?php
}

add_action('save_post', 'page_list_save',10,1);
function page_list_save($post_id){
	$post_type = get_post_type($post_id);

	if("post" != $post_type){
		return;
	}

	if(isset($_POST['pages'])){
		update_post_meta($post_id, 'page_save_meta_key', sanitize_text_field($_POST['pages']));
	}
	if(isset($_POST['class'])){
		update_post_meta($post_id, 'class_meta_key', sanitize_text_field($_POST['class']));
	}
	
}

//meta box registration for post type page 
add_action('add_meta_boxes', 'text_meta_box_add');
function text_meta_box_add(){
	add_meta_box(
		'text_meta_box_id', 
		'Review', 
		'text_meta_box_cb',
		 'page',
		 'normal',
		 'default'
	);
}

function text_meta_box_cb(){
	global $post;
	$review_meta = get_post_meta($post->ID, 'review_meta_key', true);
	
	echo $review_meta;
	?>
	<p>
		<label>Review</label>
		<input type="text" name="review" class="widefat" value="<?php echo $review_meta; ?>">
	</p>

	<?php
}

add_action('save_post', 'text_meta_box_save',10,1);
function text_meta_box_save($post_id){
	$post_type = get_post_type($post_id);

	if("page" != $post_type){
		return;
	}

	if(isset($_POST['review'])){
		update_post_meta($post_id, 'review_meta_key', sanitize_text_field($_POST['review']));
	}
	
}

add_action('add_meta_boxes', 'work_meta_box_add');
function work_meta_box_add(){
	add_meta_box(
		'work_meta_box_id',
		'Work Details',
		'work_meta_box_cb',
		'work',
		'normal',
		'default'
	);
}

function work_meta_box_cb(){
	global $post;
	$class = get_post_meta($post->ID, 'work_class_meta_key',true);
	$data_id = get_post_meta($post->ID, 'work_data_id_meta_key',true);
	$data_type = get_post_meta($post->ID, 'work_data_type_meta_key',true);
	?>
	<p>
		<label>class</label>
		<input type="text" name="class" value="<?php echo $class ;?>">
	</p>
	<p>
		<label>data_id</label>
		<input type="text" name="data_id" value=" <?php echo $data_id; ?>">
	</p>
	<p>
		<label>data_type</label>
		<input type="text" name="data_type" value=" <?php echo $data_type; ?>">
	</p>

	<?php
}

add_action('save_post', 'work_meta_box_save',10,1);
function work_meta_box_save($post_id){
	$post_type = get_post_type($post_id);

	if('work' != $post_type){
		return;
	}
	if(isset($_POST['class'])){
		update_post_meta($post_id, 'work_class_meta_key', sanitize_text_field($_POST['class']));
	}
	if(isset($_POST['data_id'])){
		update_post_meta($post_id, 'work_data_id_meta_key', sanitize_text_field($_POST['data_id']));
	}
	if(isset($_POST['data_type'])){
		update_post_meta($post_id, 'work_data_type_meta_key', sanitize_text_field($_POST['data_type']));
	}
}
