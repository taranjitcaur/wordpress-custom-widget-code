<?php
class ShowBlogs extends WP_Widget
{
    function ShowBlogs(){
		$widget_ops = array('description' => 'Show Blogs');
		$control_ops = array('width' => 200, 'height' => 200);
		parent::WP_Widget(false,$name='Show Blogs',$widget_ops,$control_ops);
    }

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		$posts_number = empty($instance['posts_number']) ? '' : $instance['posts_number'];
		echo $before_widget;
?>

<p class="span" ><?php echo $title; ?></p>
<div class="projects">
  <?php query_posts( array('showposts'=>"$posts_number",'order'=> 'DESC')); ?>
  <?php if( have_posts()){ ?>
  <?php while( have_posts()): the_post(); ?>
  <div class="project-row"><?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('footer_images')  ?>
    </a>
    <?php } else  { ?>
    <?php $attachment_id = get_field('blog_video_id'); ?>
    <a href="<?php the_permalink(); ?>"><img src="<?php echo "http://img.youtube.com/vi/$attachment_id/0.jpg" ?>" width="51" height="50"/></a>
    <?php } ?>
    <div class="col-right">
      <?php $excerpt = get_the_excerpt(); ?>
     <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      <!--<a href="<?php //the_permalink(); ?>" title="<?php //the_title_attribute(); ?>"> about <?php //echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></a>--> 
     <span class="twitter-timestamp"><?php echo get_the_date('M j Y'); ?></span>
    </div>
    <!--col-right closed--> 
  </div>
  
  <!--project-row closed-->
  <?php endwhile; ?>
  <?php }  ?>
  <a href="<?php echo site_url('blog'); ?>" class="read-more">View All</a>
</div>
<!--projects closed-->

<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['posts_number'] = stripslashes($new_instance['posts_number']);
		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'Recent Blogs','posts_number'=>'1') );

		$title = htmlspecialchars($instance['title']);
		$posts_number = (int) $instance['posts_number'];

		$width= (int) $instance['width'];

		$height= (int) $instance['height'];
				
		# Title

		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" /></p>';

echo '<p><label for="' . $this->get_field_id('posts_number') . '">' . 'Number of Posts:' . '</label><input class="widefat" id="' . $this->get_field_id('posts_number') . '" name="' . $this->get_field_name('posts_number') . '" type="text" value="' . esc_attr($posts_number) . '" /></p>';
			
		?>
<?php
	}

}
function ShowBlogsInit() {
  register_widget('ShowBlogs');
}
add_action('widgets_init', 'ShowBlogsInit');
