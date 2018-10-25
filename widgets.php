<?php 

//create custom widget that shows recent blog posts
class Class_blog_posts_Widget extends WP_Widget{
	function __construct(){
		parent ::__construct('hotel-reservation-sample-widget', __('Blog Posts', 'hotel-reservation'), array( 'description' => __('widget for showing recent posts from blog', 'hotel-reservation'), )
			);

	}
	//create widget backend
	public function form($instance){
		if(isset($instance['title'])){
			$title = $instance['title'];
		}
		else{
			$title = '';
		}
		$select = isset( $instance['select'] ) ? $instance['select'] : '3';
	
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>">
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('number') ?>">No Of Posts To Show</label>
		<select name="<?php echo $this->get_field_name('number') ?>" id="<?php echo $this->get_field_id('number') ?>">
			<?php 
			for($i=1; $i<=4; $i++){
			?>
				<option value="<?php echo $i; ?>" <?php selected($select, $i); ?>><?php echo $i; ?></option>
			<?php }//end for loop
			 ?>
		</select>
		</p>
		<?php
	}

	//update instances of the widget
	public function update($new_instance, $old_instance){
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? $new_instance['title'] : '';
		$instance['select'] = (!empty($new_instance['number'])) ? $new_instance['number'] : '';
		return $instance;
	}

	//Create widget Frontend
	public function widget($args, $instance){
		$select = isset( $instance['select'] ) ? $instance['select'] : '3';
		$title = $instance['title'];
		echo $args['before_widget'];
		if(isset($title)){
			echo $args['before_title'].$title.$args['after_title'];
		}
		$blogs = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page' => $select,
			));
			if($blogs->have_posts()){
			 ?>				
				<ul class="colorlib-footer-links">
					<?php 
						
						while($blogs->have_posts()){
							$blogs->the_post();
					 ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
					<?php 
					} //endwhile
					wp_reset_postdata();
					 ?>
					
				</ul>
			<?php } //endif 

		echo $args['after_widget'];

	}
}

function blog_posts_Widget(){
	register_widget('Class_blog_posts_Widget');
}
add_action('widgets_init', 'blog_posts_Widget');


//create next widget to list the child menu items
class Class_children_menu_Widget extends WP_Widget{
	function __construct(){
		parent ::__construct('hotel-reservation-sample-widget', __('Children Menu', 'hotel-reservation'), array( 'description' => __('widget for showing children menu items', 'hotel-reservation'), )
			);

	}
}

//widgets to show Quick Links

class Class_quick_links_Widget extends WP_Widget{
	function __construct(){
		parent ::__construct('hotel-reservation-quick_links-widget', __('Quick Links', 'hotel-reservation'), array( 'description' => __('widget for showing quick Links', 'hotel-reservation'), )
			);

	}
	//create widget backend
	public function form($instance){
		if(isset($instance['title'])){
			$title = $instance['title'];
		}
		else{
			$title = '';
		}
	?>	
	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
		<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title') ?>" value="<?php echo $title; ?>">
	</p>
	<?php
	}


	//update widget instances
	public function update($new_instance, $old_instance){
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? $new_instance['title'] : '';
		return $instance;
	}

	public function widget($args, $instance){
		$title = $instance['title'];
		echo $args['before_widget'];
			if(isset($title)){
				echo $args['before_title'].$title.$args['after_title'];
			}
			$blogs = new WP_Query(array(
				'post_type' => 'page',
				'posts_per_page' => 4,
				'order' => 'ASC'
			));
			if($blogs->have_posts()){
			 ?>				
				<ul class="colorlib-footer-links">
					<?php 
						
						while($blogs->have_posts()){
							$blogs->the_post();
					 ?>
					<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
					<?php 
					} //endwhile
					wp_reset_postdata();
					 ?>
					
				</ul>
			<?php } //endif 

		echo $args['after_widget'];

	}
}
function quick_links_Widget(){
	register_widget('Class_quick_links_Widget');
}
add_action('widgets_init', 'quick_links_Widget');


//create widget for contact information
class Class_contact_information_Widget extends WP_Widget{
	function __construct(){
		parent ::__construct('hotel-reservation-contact-widget', __('Contact Information', 'hotel-reservation'), array( 'description' => __('widget for showing contact information', 'hotel-reservation'), )
			);

	}
	//create widget backend
	public function form($instance){
		(isset($instance['title'])) ? $title = $instance['title'] : $title = '';
		$address = $instance['address'];
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
				<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $title; ?>">
			</p>
			<p>
				<label>Address</label>
				<textarea name="<?php echo $this->get_field_name('address'); ?>"><?php echo $address; ?></textarea>
			</p>
		<?php
	}

//update widget instances
	public function update($new_instance, $old_instance){
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? $new_instance['title'] : '';
		$instance['address'] = (!empty($new_instance['address'])) ? $new_instance['address'] : '';
		return $instance;
	}
//create widget frontend
public function widget($args, $instance){
	$title = $instance['title'];
	$address = $instance['address'];
	echo $args['before_widget'];
	if(isset($title)){
		echo $args['before_title'].$title.$args['after_title'];
	}
	echo $address;

	echo $args['after_widget'];
}
 
}

function contact_information_Widget(){
	register_widget('Class_contact_information_Widget');
}
add_action('widgets_init', 'contact_information_Widget');