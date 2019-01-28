<?php
/*
Plugin Name: Meminz Add-ons
Plugin URI: https://demowp.cththemes.net/meminz/
Description: A custom plugin for Meminz - WordPress Theme
Version: 1.0
Author: CTHthemes
Author URI: http://themeforest.net/user/cththemes
Text Domain: meminz-add-ons
Domain Path: /languages/
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
if ( ! defined('ABSPATH') ) {
    die(__('Please do not load this file directly!','meminz-add-ons'));
}
define ('CTH_MEMINZ_DIR',plugin_dir_path(__FILE__ ));
define ('CTH_MEMINZ_DIR_URL',plugin_dir_url(__FILE__ ));


function meminz_add_ons_init() {
    $plugin_dir = basename(dirname(__FILE__));
    load_plugin_textdomain( 'meminz-add-ons', false, $plugin_dir . '/languages' );
}
add_action('plugins_loaded', 'meminz_add_ons_init');

/* Enable shortcode in widget text content */
add_filter('widget_text', 'do_shortcode');

add_shortcode('gallery', '__return_false');



if (!function_exists('row_sc')) {
    $columnArray = array();

    function row_sc( $atts, $content="" ){
        global $columnArray;
        $id='';
        
        $params = shortcode_atts(array(
              'id' => '',
              'class' => '',
              'animation'=>'0',
              'effect'=>'fadeInDown',
              'delay'=>''
         ), $atts);
        
        if ($params['id']) 
            $id = 'id="' . $params['id'] . '"'; 
        $class = 'row';
        if(!empty($params['class'])){
            $class .= ' '.$params['class'];
        }

        if($params['animation'] == '1'){
            $class .= ' wow '.$params['effect'];
        }

        $class = 'class="'.$class.'"';
        if(!empty($params['delay'])){
            $class .=' data-wow-delay="'.$params['delay'].'"';
        }
        
        do_shortcode( $content );
        
        //Row
        $html = '<div '. $class . ' ' . $id . '>';
        //Columns
        foreach ($columnArray as $key=>$col){
            // Column effect
            //echo'<pre>';var_dump($col);die;
            if(!empty($col['class'])){
                $class = $col['class'];
            }else{
                $class = 'col-md-12';
            }

            if($col['animation'] == '1'){
                $class .= ' wow '.$col['effect'];
            }

            $class = 'class="'.$class.'"';
            if(!empty($col['delay'])){
                $class .=' data-wow-delay="'.$col['delay'].'"';
            }

            $html .='<div ' . $class . '>' . do_shortcode($col['content']) . '</div>';
        }

        $html .='</div>';
    
        $columnArray = array(); 
        return $html;
    }
    
    add_shortcode( 'row', 'row_sc' );
        
    //Column Items
    function column_sc( $atts, $content="" ){
        global $columnArray;

        if(is_array($atts)){
            $class = isset($atts['class']) ? $atts['class'] : '';
            $animation = isset($atts['animation']) ? $atts['animation'] : '0';
            $effect = isset($atts['effect']) ? $atts['effect'] : 'fadeInLeft';
            $delay = isset($atts['delay']) ? $atts['class'] : '';
        }else{
            $class = '';
            $animation = '0';
            $effect = 'fadeInLeft';
            $delay = '';
        }


        $columnArray[] = array(
            'class'=>$class,
            'animation'=>$animation,
            'effect'=>$effect,
            'delay'=>$delay,
            'content'=> $content
        );
    }

    add_shortcode( 'column', 'column_sc' ); 
}

if(!function_exists('icon_sc')) {

    function icon_sc( $atts, $content="" ) {
    
        extract(shortcode_atts(array(
               'name' =>"diamond"
         ), $atts));
        
        return '<i><span class="icon icon-'.$name.'"></span></i>'. $content;
     
    }
        
    add_shortcode( 'icon', 'icon_sc' );
}

if (!function_exists('link_sc')) {

    function link_sc( $atts, $content="" ){
        
        extract(shortcode_atts(array(
            'id'=>'',
            'class' => '',
            'link' => '#',
         ), $atts));
        
        if (!empty($id)) 
            $id = 'id="' . $id . '"'; 
        $classes = 'iconlink';
        if(!empty($class)){
            $classes .= ' '.$class;
        }

        $html = '<a href="'.$link.'" '.$classes.'>'.do_shortcode($content ).'</a>';

        return $html;
    }

    add_shortcode( 'link', 'link_sc' );
}

if (!function_exists('iconlink_sc')) {

    function iconlink_sc( $atts, $content="" ){
        
        extract(shortcode_atts(array(
            'id'=>'',
            'class' => '',
            'link' => '#',
            'animation'=>'0',
            'effect'=>'bounceInDown',
            'delay'=>'',
            'iconclass'=>'fa fa-magic'
         ), $atts));
        
        if (!empty($id)) 
            $id = 'id="' . $id . '"'; 
        $classes = 'iconlink';
        if(!empty($class)){
            $classes .= ' '.$class;
        }

        if($animation === '1'){
            $classes .= ' wow '.$effect;
        }

        $classes = 'class="'.$classes.'"';
        if(!empty($delay)){
            $classes .=' data-wow-delay="'.$delay.'"';
        }

        $html = '<a href="'.$link.'" '.$classes.'><i class="'.$iconclass.'"></i></a>' . $content;

        return $html;
    }

    add_shortcode( 'iconlink', 'iconlink_sc' );
}

if (!function_exists('paragraph_sc')) {

    function paragraph_sc( $atts, $content="" ){
        
        extract(shortcode_atts(array(
            'id'=>'',
            'class' => '',
            'wrapper'=>'p'
         ), $atts));
        
        if (!empty($id)) 
            $id = 'id="' . $id . '"'; 
        if(!empty($class)){
            $class = 'class="'.$class.'"';
        }

        $html = '<'.$wrapper.' '.$id.' '.$class.'>' . do_shortcode($content ).'</'.$wrapper.'>';

        return $html;
    }

    add_shortcode( 'paragraph', 'paragraph_sc' );
}

//Client
if(!function_exists('client_sc')){

    $clientItems = array();
    
    function client_sc($atts, $content = null){
        extract(shortcode_atts(array(   
            'el_class' =>   '',
            //'el_id' =>    'testimonials-slider',
            'count' =>'5',
        ), $atts));

        global $clientItems;

        do_shortcode( $content );
        $count=(int)$count;

        $html = '';
        $html .= "\n\t".'<ul class="client-list clients-per-row-'.$count.'"">';
            
                
                    foreach ($clientItems as $key => $attachID) {
                        if($key === 0|| ($key % $count === 0)){
                            if(($key) >= (count($clientItems)- $count)){
                                $html .= "\n\t".'<li class="bottom-list">';
                            }else{
                                $html .= "\n\t".'<li>';
                            }
                            
                                $html .= "\n\t".'<ul>';
                        }
                        if(($key +1) % $count === 0){
                            $html .= "\n\t".'<li class="last">';
                        }else{
                            $html .= "\n\t".'<li>';
                        }                                   
                            $html .= "\n\t".'<a href="'.$attachID['cl_link'].'" class="client-link" target="_blank">';
                                $html .= "\n\t".'<span class="logo-hover"><img src="'.wp_get_attachment_url($attachID['cl_hover']).'" alt="" /></span>';
                                $html .= "\n\t".'<img src="'.wp_get_attachment_url($attachID['cl_image']).'" class="client-logo" alt="" />';
                            $html .= "\n\t".'</a>';
                        $html .= "\n\t".'</li>';

                        if(($key +1) % $count === 0){
                                $html .= "\n\t".'</ul>';
                            $html .= "\n\t".'</li>';
                        }
                    }                           
                
        $html .= "\n\t".'</ul>';
        $clientItems = array();


        return $html;
    }

    add_shortcode('client','client_sc');

    // End Client

    function client_item_sc($atts, $content = null){

        global $clientItems;

        $clientItems[] = array('el_class'=>(isset($atts['el_class'])? $atts['el_class'] : ''),'cl_image'=>(isset($atts['cl_image'])? $atts['cl_image'] : ''),'cl_hover'=>(isset($atts['cl_hover'])? $atts['cl_hover'] : ''),'cl_link'=>(isset($atts['cl_link'])? $atts['cl_link'] : ''),'content'=>$content);//'el_class'=>(isset($atts['el_class'])? $atts['el_class']: ''),'link'=>(isset($atts['sl_link'])? $atts['sl_link'] : ''),

    }

    add_shortcode('client_item','client_item_sc');

    // End Client Items
}