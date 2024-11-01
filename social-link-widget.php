<?php
/*
Plugin Name: Social link widget
Author: Raihan
Description: With this plugin you can easily create a social media link. After install, you can show up on the wordpress website from the widget.
Version: 1.0
Text Domain: rsocial
Domain Path: /languages
*/

class Rsocial_cls {
    
    public function __construct(){
        define('RCSSF',trailingslashit('vendor/css'));
        define('RICONSF',trailingslashit('vendor/icons'));
        add_action('wp_enqueue_scripts',array($this,'rsocial_link_css'));
        add_action('init',array($this,'rsocial_textdomain_reg'));
        add_action('widgets_init',array($this,'rsocial_link_widget_reg'));
        add_shortcode('rsocial-link-widget', array($this,'rsocial_link_widget_func'));
    }
    
    public function rsocial_link_css() {
        wp_enqueue_style('rsocial-css', plugins_url(RCSSF.'rsocial-link.css',__FILE__));
    }
    public function rsocial_textdomain_reg() {
        load_plugin_textdomain('rsocial', false, dirname(__FILE__).'/language');
    }
    
    //Register widget
    public function rsocial_link_widget_reg(){
        register_widget('Rsocial_link');
    }
    
    public function rsocial_link_widget_func($rsocial_ats , $rsocial_cnt = null){
        extract(shortcode_atts(array(
            'rstitle' => '',
            'facebook' => '',
            'twitter' => '',
            'googleplus' => '',
            'youtube' => '',
            'instagram' => '',
            'linkedin' => '',
            'pinterest' => '',
            'plurk' => '',
            'dribbble' => '',
            'behance' => '',
            'vimeo' => '',
            'tumblr' => '',
        ),$rsocial_ats))
        ?>
    <div class="rsocial-link">
       <?php if($rstitle): ?>
        <h4 class="rsl-title"><?php echo esc_html($rstitle); ?></h4>
        <?php endif; ?>
        <ul>
           <?php if($facebook): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($facebook); ?>"><img src="<?php echo plugins_url(RICONSF.'facebook.png',__FILE__); ?>" alt="facebook"></a>
            </li>
            <?php endif; ?>
            <?php if($twitter): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($twitter); ?>"><img src="<?php echo plugins_url(RICONSF.'twitter.png',__FILE__); ?>" alt="twitter"></a>
            </li>
            <?php endif; 
            if($googleplus): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($googleplus); ?>"><img src="<?php echo plugins_url(RICONSF.'google-plus.png',__FILE__); ?>" alt="google+"></a>
            </li>
            <?php endif; 
            if($youtube): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($youtube); ?>"><img src="<?php echo plugins_url(RICONSF.'youtube.png',__FILE__); ?>" alt="youtube"></a>
            </li>
            <?php endif; 
            if($instagram): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($instagram); ?>"><img src="<?php echo plugins_url(RICONSF.'instagram.png',__FILE__); ?>" alt="instagram"></a>
            </li>
            <?php endif; 
            if($linkedin): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($linkedin); ?>"><img src="<?php echo plugins_url(RICONSF.'linkedin.png',__FILE__); ?>" alt="linkedin"></a>
            </li>
            <?php endif; 
            if($pinterest): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($pinterest); ?>"><img src="<?php echo plugins_url(RICONSF.'pinterest.png',__FILE__); ?>" alt="pinterest"></a>
            </li>
            <?php endif; 
            if($plurk): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($plurk); ?>"><img src="<?php echo plugins_url(RICONSF.'plurk.png',__FILE__); ?>" alt="pinterest"></a>
            </li>
            <?php endif;
            if($dribbble): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($dribbble); ?>"><img src="<?php echo plugins_url(RICONSF.'dribbble.png',__FILE__); ?>" alt="dribbble"></a>
            </li>
            <?php endif; 
            if($behance): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($behance); ?>"><img src="<?php echo plugins_url(RICONSF.'behance.png',__FILE__); ?>" alt="behance"></a>
            </li>
            <?php endif;
            if($vimeo): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($vimeo); ?>"><img src="<?php echo plugins_url(RICONSF.'vimeo.png',__FILE__); ?>" alt="behance"></a>
            </li>
            <?php endif; 
            if($tumblr): ?>
            <li>
                <a target="_blank" href="<?php echo esc_url($tumblr); ?>"><img src="<?php echo plugins_url(RICONSF.'tumblr.png',__FILE__); ?>" alt="behance"></a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
    <?php
    }
    
}
new Rsocial_cls();



//For widget
class Rsocial_link extends WP_Widget{
    public function __construct(){
        
        $rsocial_ops = array( 
			'classname' => 'Rsocial_link',
			'description' => esc_html__('This plugin is a Social link for widget','rsocial'),
		);
        parent::__construct( 'Rsocial_link', esc_html__('Social link widget','rsocial'), $rsocial_ops );
    }
    
    public function form($svalue){
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('rs_titleid')); ?>"><?php echo esc_html__('Title:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('rs_titlevl')) ?>" value="<?php echo esc_attr($svalue['rs_titlevl']); ?>" id="<?php echo esc_attr($this->get_field_id('rs_titleid')); ?>" class="widefat">
        </p>
        <span><?php echo esc_html__('Enter your social url:','rsocial'); ?></span>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebookid')); ?>"><?php echo esc_html__('Facebook:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php echo esc_attr($svalue['facebook']); ?>" id="<?php echo esc_attr($this->get_field_id('facebookid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('twitterid')); ?>"><?php echo esc_html__('Twitter:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" value="<?php echo esc_attr($svalue['twitter']); ?>" id="<?php echo esc_attr($this->get_field_id('twitterid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('googleplusid')); ?>"><?php echo esc_html__('Google+:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>" value="<?php echo esc_attr($svalue['googleplus']); ?>" id="<?php echo esc_attr($this->get_field_id('googleplusid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('youtubeid')); ?>"><?php echo esc_html__('Youtube:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr($svalue['youtube']); ?>" id="<?php echo esc_attr($this->get_field_id('youtubeid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('instagramid')); ?>"><?php echo esc_html__('Instagram:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" value="<?php echo esc_attr($svalue['instagram']); ?>" id="<?php echo esc_attr($this->get_field_id('instagramid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('linkedinid')); ?>"><?php echo esc_html__('Linkedin:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" value="<?php echo esc_attr($svalue['linkedin']); ?>" id="<?php echo esc_attr($this->get_field_id('linkedinid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('pinterestid')); ?>"><?php echo esc_html__('Pinterest:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr($svalue['pinterest']); ?>" id="<?php echo esc_attr($this->get_field_id('pinterestid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('plurkid')); ?>"><?php echo esc_html__('Plurk:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('plurk')); ?>" value="<?php echo esc_attr($svalue['plurk']); ?>" id="<?php echo esc_attr($this->get_field_id('plurkid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('dribbbleid')); ?>"><?php echo esc_html__('Dribbble:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" value="<?php echo esc_attr($svalue['dribbble']); ?>" id="<?php echo esc_attr($this->get_field_id('dribbbleid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('behanceid')); ?>"><?php echo esc_html__('Behance:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('behance')); ?>" value="<?php echo esc_attr($svalue['behance']); ?>" id="<?php echo esc_attr($this->get_field_id('behanceid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('vimeoid')); ?>"><?php echo esc_html__('Vimeo:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" value="<?php echo esc_attr($svalue['vimeo']); ?>" id="<?php echo esc_attr($this->get_field_id('vimeoid')); ?>" class="widefat">
            
            <label for="<?php echo esc_attr($this->get_field_id('tumblrid')); ?>"><?php echo esc_html__('Tumblr:','rsocial'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" value="<?php echo esc_attr($svalue['tumblr']); ?>" id="<?php echo esc_attr($this->get_field_id('tumblrid')); ?>" class="widefat">
            
        </p>
        <?php
        
    }
    
    public function update($new , $old){
        $old['rs_titlevl'] = $new['rs_titlevl'];
        $old['facebook'] = $new['facebook'];
        $old['twitter'] = $new['twitter'];
        $old['googleplus'] = $new['googleplus'];
        $old['youtube'] = $new['youtube'];
        $old['instagram'] = $new['instagram'];
        $old['linkedin'] = $new['linkedin'];
        $old['pinterest'] = $new['pinterest'];
        $old['plurk'] = $new['plurk'];
        $old['dribbble'] = $new['dribbble'];
        $old['behance'] = $new['behance'];
        $old['vimeo'] = $new['vimeo'];
        $old['tumblr'] = $new['tumblr'];
        
        return $old;
    }
    
    
    ///Widget output
    public function widget($args,$value) {
        echo do_shortcode('[rsocial-link-widget rstitle="'.$value['rs_titlevl'].'" facebook="'.$value['facebook'].'" twitter="'.$value['twitter'].'" googleplus="'.$value['googleplus'].'" youtube="'.$value['youtube'].'" instagram="'.$value['instagram'].'" linkedin="'.$value['linkedin'].'" pinterest="'.$value['pinterest'].'" plurk="'.$value['plurk'].'" dribbble="'.$value['dribbble'].'" behance="'.$value['behance'].'" vimeo="'.$value['vimeo'].'" tumblr="'.$value['tumblr'].'"]');
    }
    
}
