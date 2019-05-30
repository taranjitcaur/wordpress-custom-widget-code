<?php
class ShowIcons extends WP_Widget
{
    function ShowIcons(){
		$widget_ops = array('description' => 'Social Icons');
		$control_ops = array('width' => 400, 'height' => 300);
		parent::WP_Widget(false,$name='Social Icons',$widget_ops,$control_ops);
    }

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);

		$facebook_url = empty($instance['facebook_url']) ? '' : $instance['facebook_url'];

		$twitter_url = empty($instance['twitter_url']) ? '' : $instance['twitter_url'];
		
		$yt_url = empty($instance['yt_url']) ? '' : $instance['yt_url'];
		
		$insta_url = empty($instance['insta_url']) ? '' : $instance['insta_url'];
		
		$pinin_url= empty($instance['pinin_url']) ? '' : $instance['pinin_url'];
		
		$gplus_url = empty($instance['gplus_url']) ? '' : $instance['gplus_url'];
		
		$In_url = empty($instance['In_url']) ? '' : $instance['In_url'];
		
		$rss_url = empty($instance['rss_url']) ? '' : $instance['rss_url'];
		
		echo $before_widget;
?>		
          <ul class="social-icons">
					<li><a href="<?php echo $facebook_url; ?>" class="s-ico facebk"></a></li>
					<li><a href="<?php echo $twitter_url;?>" class="s-ico twiter"></a></li>
					<li><a href="<?php echo $pinin_url;?>" class="s-ico pin"></a></li>
					<li><a href="<?php echo $gplus_url;?>" class="s-ico gplus"></a></li>
					<li><a href="<?php echo $insta_url;?>" class="s-ico insta"></a></li>
					<li><a href="<?php echo $yt_url; ?>" class="s-ico play"></a></li>
					<li><a href="<?php echo $In_url;?>" class="s-ico in"></a></li>
					<li><a href="<?php echo $rss_url;?>" class="s-ico rss"></a></li>
				</ul><!--social-icons-->
<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		//$instance['title'] = stripslashes($new_instance['title']);

		$instance['facebook_url'] = $new_instance['facebook_url'];
        
		$instance['twitter_url'] = $new_instance['twitter_url'];
		
		$instance['pinin_url'] = $new_instance['pinin_url'];
		
		$instance['gplus_url'] = $new_instance['gplus_url'];
		
		$instance['insta_url'] = $new_instance['insta_url'];
		
		$instance['yt_url'] = $new_instance['yt_url'];
		
		$instance['In_url'] = $new_instance['In_url'];
		
		$instance['rss_url'] = $new_instance['rss_url'];
		
		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		//$instance = wp_parse_args( (array) $instance, array('title'=>'Follow Us Online:', 'facebook_url'=>'http://www.facebook.com', 'twitter_url'=>'https://twitter.com/', 'gp_url'=>'https://plus.google.com/', 'in_url'=>'http://www.linkedin.com/') );

		//$title = htmlspecialchars($instance['title']);
		$desc = $instance['desc'];
		$facebook_url = $instance['facebook_url'];
		$twitter_url = $instance['twitter_url'];
	    $yt_url = $instance['yt_url'];
		
		# Title

		//echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '" /></p>';

		echo '<p><label for="' . $this->get_field_id('facebook_url') . '">' . 'Facebook URL:' . '</label><input class="widefat" id="' . $this->get_field_id('facebook_url') . '" name="' . $this->get_field_name('facebook_url') . '" type="text" value="' . esc_attr($facebook_url) . '" /></p>';

	   	echo '<p><label for="' . $this->get_field_id('twitter_url') . '">' . 'Twitter URL:' . '</label><input class="widefat" id="' . $this->get_field_id('twitter_url') . '" name="' . $this->get_field_name('twitter_url') . '" type="text" value="' . esc_attr($twitter_url) . '" /></p>';
		
		echo '<p><label for="' . $this->get_field_id('yt_url') . '">' . 'Youtube URL:' . '</label><input class="widefat" id="' . $this->get_field_id('yt_url') . '" name="' . $this->get_field_name('yt_url') . '" type="text" value="' . esc_attr($yt_url) . '" /></p>';
		?>
      <?php
	}

}
function ShowIconssInit() {
  register_widget('ShowLinks');
}
add_action('widgets_init', 'ShowIconsInit');