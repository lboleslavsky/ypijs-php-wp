<?php
/*
Plugin Name: YPI WP plugin
Plugin URI: http://ypijs.org
Description: Make Your Presentation Interface available for WordPress
Version: 1.1
Author: lboleslavsky
Author URI: http://boleslavsky.net
License: MIT
*/
require_once __DIR__.'/resources.php';
require_once __DIR__.'/helpers.php';
require_once __DIR__.'/widgets.php';

/**
 * Register and enqueue scripts
 */
function on_script_required()
{
    wp_register_style(Resource::INCLUDE_YPI_CSS_KEY, plugins_url(Resource::PATH_TO_CSS_FILE,__FILE__));
    wp_register_script(Resource::INCLUDE_YPI_MIN_KEY,plugins_url(Resource::PATH_TO_YPI_MIN_FILE,__FILE__),array(Resource::INCLUDE_JQUERY_KEY),  Resource::DEFAULT_VERSION,true);
    wp_register_script(Resource::INCLUDE_CUSTOM_KEY, plugins_url(Resource::PATH_TO_CUSTOM_FILE, __FILE__),array(Resource::INCLUDE_YPI_MIN_KEY),Resource::DEFAULT_VERSION,true);
    wp_register_script(Resource::INCLUDE_YPI_READY_KEY,plugins_url(Resource::PATH_TO_YPI_READY_FILE,__FILE__),array(Resource::INCLUDE_CUSTOM_KEY),Resource::DEFAULT_VERSION,true);
    wp_enqueue_style(Resource::INCLUDE_YPI_CSS_KEY);
    wp_enqueue_script(Resource::INCLUDE_YPI_MIN_KEY);    
    wp_enqueue_script(Resource::INCLUDE_CUSTOM_KEY);
    wp_enqueue_script(Resource::INCLUDE_YPI_READY_KEY);
}

/**
 * Render ypi avatar shortcode
 * @param type $attr shortcode attributes
 * @return type avatar content
 */
function render_ypi_avatar($attr)
{
    $p = shortcode_atts(
              array(Resource::SHORT_TAG_ATTR_SPEED=>  Resource::DEFAULT_SPEED,  Resource::SHORT_TAG_ATTR_ALIAS=>Resource::DEFAULT_EMPTY,
                    Resource::SHORT_TAG_ATTR_NAME=>  Resource::DEFAULT_AVATAR_NAME,Resource::SHORT_TAG_ATTR_BUBBLE_ID=>null, Resource::SHORT_TAG_ATTR_PANEL_ID=>  Resource::DEFAULT_PANEL_ID,
                    Resource::SHORT_TAG_CUSTOM_CSS=>  Resource::DEFAULT_EMPTY, Resource::SHORT_TAG_AVATAR_IMG=>  Resource::DEFAULT_AVATAR_IMG,  Resource::SHORT_TAG_AVATAR_H=>null, Resource::SHORT_TAG_AVATAR_W=>null, Resource::SHORT_TAG_BUBBLE_DISTANCE=>Resource::DEFAULT_BUBBLE_DISTANCE,Resource::SHORT_TAG_ATTR_ABOUT=>Resource::DEFAULT_EMPTY), $attr);        
    
    $x = YpiRender::getInstance()->getSanitizedArray($p);    
    
    $params = array(Resource::PARAM_SPEED=>$x[Resource::SHORT_TAG_ATTR_SPEED],  Resource::PARAM_NAME=>$x[Resource::SHORT_TAG_ATTR_NAME],  Resource::PARAM_BUBBLE_ID=>$x[Resource::SHORT_TAG_ATTR_BUBBLE_ID],Resource::PARAM_PANEL_ID=>$x[Resource::SHORT_TAG_ATTR_PANEL_ID],  
                    Resource::PARAM_ALIAS=>$x[Resource::SHORT_TAG_ATTR_ALIAS], Resource::PARAM_ABOUT=>$x[Resource::SHORT_TAG_ATTR_ABOUT], Resource::PARAM_AVATAR_IMG=>$x[Resource::SHORT_TAG_AVATAR_IMG],  Resource::PARAM_AVATAR_W=>$x[Resource::SHORT_TAG_AVATAR_W], Resource::PARAM_BUBBLE_DISTANCE=>$x[Resource::SHORT_TAG_BUBBLE_DISTANCE],
                    Resource::PARAM_AVATAR_H=>$x[Resource::SHORT_TAG_AVATAR_H]);
    
    $content = YpiRender::getInstance()->renderAvatar($params,$x[Resource::SHORT_TAG_CUSTOM_CSS]); 
    return $content;
}

/**
 * Render ypi panel shortcode
 * @param type $attr shortcode attributes
 * @return type panel content
 */
function render_ypi_panel($attr)
{
    $p = shortcode_atts(array(Resource::SHORT_TAG_ATTR_ID=>null,Resource::SHORT_TAG_CHAPTER_URL=>null,  Resource::SHORT_TAG_IS_AUTOSTART=>true,  Resource::SHORT_TAG_INIT_STATE=>  Resource::DEFAULT_INIT_STATE,  Resource::SHORT_TAG_IS_SOUND_ENABLED=>false), $attr);
    $x = YpiRender::getInstance()->getSanitizedArray($p);   
    $params =  array(Resource::PARAM_PANEL_ID=>$x[Resource::SHORT_TAG_ATTR_ID],Resource::PARAM_IS_AUTOSTART=>$x[Resource::SHORT_TAG_IS_AUTOSTART],  Resource::PARAM_INIT_STATE=>$x[Resource::SHORT_TAG_INIT_STATE],  Resource::PARAM_CHAPTER_URL=>$x[Resource::SHORT_TAG_CHAPTER_URL]);    
    if($params[Resource::PARAM_CHAPTER_URL]!=null)
    {    
        YpiBox::getInstance()->setInitParams($params);
    }    
    $content = YpiRender::getInstance()->renderPanel($params);   
    return $content;
}

function render_ypi_goto($attr)
{
    $p = shortcode_atts(array(Resource::SHORT_TAG_ATTR_NAME=>null, Resource::SHORT_TAG_ATTR_TARGET=>null,Resource::SHORT_TAG_CHAPTER_URL=>null, Resource::SHORT_TAG_GOTO_TITLE=>null,  Resource::SHORT_TAG_INIT_STATE=>  Resource::DEFAULT_INIT_STATE), $attr);
    $x = YpiRender::getInstance()->getSanitizedArray($p);   
    $params =  array(Resource::PARAM_NAME=>$x[Resource::SHORT_TAG_ATTR_NAME], Resource::PARAM_TARGET=>$x[Resource::SHORT_TAG_ATTR_TARGET], Resource::PARAM_GOTO_TITLE=>$x[Resource::SHORT_TAG_GOTO_TITLE],Resource::PARAM_INIT_STATE=>$x[Resource::SHORT_TAG_INIT_STATE],  Resource::PARAM_CHAPTER_URL=>$x[Resource::SHORT_TAG_CHAPTER_URL]);    
    $content = YpiRender::getInstance()->renderGotoHref($params);
    return $content;
}

/**
 * Register widgets
 */
function register_ypi_widgets()
{
    register_widget(Resource::CLASSNAME_PANEL_WIDGET);
    register_widget(Resource::CLASSNAME_AVATAR_WIDGET);
}

/**
 * Render javascript variables
 */
function on_footer()
{
    wp_localize_script(Resource::INCLUDE_YPI_READY_KEY, Resource::VARIABLE_YPI_INIT,  YpiBox::getInstance()->getInitParams());
    wp_localize_script(Resource::INCLUDE_YPI_READY_KEY, Resource::VARIABLE_AVATARS, json_encode(YpiBox::getInstance()->getAvatars()));
    wp_localize_script(Resource::INCLUDE_YPI_READY_KEY, Resource::VARIABLE_GOTOS,json_encode(YpiBox::getInstance()->getGotoHrefs()));
}

/**
 * Shortcodes
 */
add_shortcode(Resource::SHORT_TAG_PANEL_NAME, Resource::FUNC_RENDER_YPI_PANEL);
add_shortcode(Resource::SHORT_TAG_AVATAR_NAME, Resource::FUNC_RENDER_YPI_AVATAR);
add_shortcode(Resource::SHORT_TAG_GOTO_NAME, Resource::FUNC_RENDER_YPI_GOTO_MARK);

/**
 * Actions
 */
add_action(Resource::ACTION_WIDGETS_INIT, Resource::FUNC_REGISTER_YPI_WIDGETS);
add_action(Resource::ACTION_WP_ENQUEUE_SCRIPTS, Resource::FUNC_ON_SCRIPT_REQUIRED);
add_action(Resource::ACTION_WP_FOOTER_KEY,Resource::FUNC_ON_FOOTER);

?>
