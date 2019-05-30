<?php
class ShowLinksSidebar extends WP_Widget
{
    function ShowLinksSidebar(){
		$widget_ops = array('description' => 'Social Links');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::WP_Widget(false,$name='Social Links',$widget_ops,$control_ops);
    }

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);

		$facebook_url = empty($instance['facebook_url']) ? '' : $instance['facebook_url'];

		$twitter_url = empty($instance['twitter_url']) ? '' : $instance['twitter_url'];
		
		$yt_url = empty($instance['yt_url']) ? '' : $instance['yt_url'];
		
		echo $before_widget;
?>		
          
		  <ul class="social-icons">
					<li><a href="<?php echo $facebook_url;?>" class="s-ico facebk"></a></li>
					<li><a href="#" class="s-ico twiter"></a></li>
					<li><a href="#" class="s-ico pin"></a></li>
					<li><a href="#" class="s-ico gplus"></a></li>
					<li><a href="#" class="s-ico insta"></a></li>
					<li><a href="#" class="s-ico play"></a></li>
					<li><a href="#" class="s-ico in"></a></li>
					<li><a href="#" class="s-ico rss"></a></li>
				</ul><!--social-icons-->
		  
		  
		  
		  
		  
		  
		  
		  <ul class="icons">
						<li><a href="<?php echo $facebook_url; ?>" target ="_blank"><img src="<?php bloginfo('template_url')?>/images/facebook.png"/></a></li>
						<li><a href="<?php echo $twitter_url; ?>" target ="_blank"><img src="<?php bloginfo('template_url')?>/images/twitter.png"/></a></li>
						<li><a href="<?php echo $yt_url; ?>" target ="_blank"><img src="<?php bloginfo('template_url')?>/images/instagram.png"/></a></li>
					</ul>
<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);

		$instance['facebook_url'] = $new_instance['facebook_url'];
		
		$instance['twitter_url'] = $new_instance['twitter_url'];
		 
		$instance['yt_url'] = $new_instance['yt_url'];
		
		return $instance;
	}

  /*Creates the form for the widget in the back-end*/
   function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'My Social Networks', 'facebook_url'=>'http://www.facebook.com', 'twitter_url'=>'https://twitter.com/', 'yt_url'=>'https://youtube.com/') );

		$title = htmlspecialchars($instance['title']);
		$desc = $instance['desc'];
		$facebook_url = $instance['facebook_url'];
		$twitter_url = $instance['twitter_url'];		
		$yt_url = $instance['yt_url'];
	
		
		# Title

		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" /></p>';

		echo '<p><label for="' . $this->get_field_id('facebook_url') . '">' . 'Facebook URL:' . '</label><input class="widefat" id="' . $this->get_field_id('facebook_url') . '" name="' . $this->get_field_name('facebook_url') . '" type="text" value="' . esc_attr($facebook_url) . '" /></p>';

	   	echo '<p><label for="' . $this->get_field_id('twitter_url') . '">' . 'Twitter URL:' . '</label><input class="widefat" id="' . $this->get_field_id('twitter_url') . '" name="' . $this->get_field_name('twitter_url') . '" type="text" value="' . esc_attr($twitter_url) . '" /></p>';
		
		
		echo '<p><label for="' . $this->get_field_id('yt_url') . '">' . 'Youtube URL:' . '</label><input class="widefat" id="' . $this->get_field_id('yt_url') . '" name="' . $this->get_field_name('yt_url') . '" type="text" value="' . esc_attr($yt_url) . '" /></p>';
		
	
		?>
      <?php
	}

}
function ShowLinksSidebarInit() {
  register_widget('ShowLinksSidebar');
}
add_action('widgets_init', 'ShowLinksSidebarInit');