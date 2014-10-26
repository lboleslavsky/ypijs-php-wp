<?php

/*
* Resource
* ---
* @author: lboleslavsky [http://boleslavsky.net] 2014
* @license: MIT [link to ypijs.org required]
* @project:
* Your Presentation Interface for JavaScript
* [http://ypijs.org]
*/

class Resource {
    
    /*
     * shortcode
     */
    const SHORT_TAG_AVATAR_NAME = 'ypi_avatar';
    const SHORT_TAG_PANEL_NAME = 'ypi_panel';    
    const SHORT_TAG_GOTO_NAME = 'ypi_goto';
    const SHORT_TAG_ATTR_NAME = 'name';
    const SHORT_TAG_ATTR_TARGET = 'target';
    const SHORT_TAG_ATTR_BUBBLE_ID = 'bubbleid';
    const SHORT_TAG_ATTR_SPEED = 'speed';
    const SHORT_TAG_ATTR_ALIAS = 'alias';
    const SHORT_TAG_ATTR_ABOUT = 'about';
    const SHORT_TAG_CHAPTER_URL = 'chapterurl';
    const SHORT_TAG_INIT_STATE = 'initstate';
    const SHORT_TAG_GOTO_TITLE = 'title';
    const SHORT_TAG_IS_AUTOSTART = 'isautostart';
    const SHORT_TAG_IS_SOUND_ENABLED = 'issoundenabled';   
    const SHORT_TAG_CUSTOM_CSS = 'class';
    const SHORT_TAG_AVATAR_IMG = 'img';
    const SHORT_TAG_BUBBLE_DISTANCE='delta';
    const SHORT_TAG_AVATAR_W = 'w';
    const SHORT_TAG_AVATAR_H = 'h';
      
    /*
     * parameters
     */
    const PARAM_NAME = 'Name';
    const PARAM_BUBBLE_ID = 'BubbleId';
    const PARAM_SPEED = 'Speed';
    const PARAM_ALIAS = 'Alias';
    const PARAM_ABOUT='TextAbout';
    const PARAM_CHAPTER_URL = 'chapterUrl';
    const PARAM_INIT_STATE = 'initState';
    const PARAM_TARGET = 'Target';
    const PARAM_GOTO_TITLE = 'title';
    const PARAM_IS_AUTOSTART='isAutostart';
    const PARAM_IS_SOUND_ENABLED = 'isSoundEnabled';
    const PARAM_CUSTOM_CSS='class';
    const PARAM_AVATAR_IMG ='img';
    const PARAM_BUBBLE_DISTANCE = 'delta';
    const PARAM_AVATAR_W = 'w';
    const PARAM_AVATAR_H = 'h';
    const WIDGET_PARAM_DESCR = 'description';
    
    /*
     * variables
     */
    const VARIABLE_YPI_INIT = 'init';
    const VARIABLE_AVATARS = 'globalArray';
    const VARIABLE_GOTOS = 'gotos';
    
    /*
     * classname
     */
    const CLASSNAME_AVATAR_WIDGET = 'YpiAvatarWidget';
    const CLASSNAME_PANEL_WIDGET = 'YpiPanelWidget';
    
    /*
     * default strings
     */
    const DEFAULT_AVATAR_NAME = 'avatar1';
    const DEFAULT_CHAPTER_URL = 'default';
    const DEFAULT_INIT_STATE = 'n1';
    const DEFAULT_SPEED = 120;
    const DEFAULT_EMPTY = '';
    const DEFAULT_VERSION = '1.6.3';
    const DEFAULT_NPC_PREFIX = 'npc_';
    const DEFAULT_BUBBLE_CSS_CLASS = 'bubble';
    const DEFAULT_AVATAR_CSS_CLASS = 'avatar'; 
    const DEFAULT_AVATAR_IMG = 'http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=34';
    const DEFAULT_AVATAR_W = 30;
    const DEFAULT_AVATAR_H = 30;
    const MAX_AVATAR_W = 100;
    const MAX_AVATAR_H = 100;
    const DEFAULT_BUBBLE_DISTANCE = 20;
    const RENDER_CONTENT_PANEL='<div id="dialog"></div>'; 
    const TAG_P_BEGIN = '<p>';
    const TAG_P_END = '</p>';
    
    /*
     * include keys
     */
    const INCLUDE_JQUERY_KEY = 'jquery';
    const INCLUDE_YPI_CSS_KEY = 'ypi_css';
    const INCLUDE_YPI_MIN_KEY = 'ypi_min';
    const INCLUDE_CUSTOM_KEY = 'custom';
    const INCLUDE_YPI_READY_KEY = 'ypi_ready';   
    
    /*
     * include paths
     */
    const PATH_TO_CSS_FILE = 'template/css/dialog.css';
    const PATH_TO_YPI_MIN_FILE ='template/js/ypi_min-1.6.3.js';
    const PATH_TO_CUSTOM_FILE='template/js/custom.js';
    const PATH_TO_YPI_READY_FILE='template/js/ypi_ready.js';    
    
    /*
     * function names
     */
    const FUNC_RENDER_YPI_PANEL = 'render_ypi_panel';
    const FUNC_RENDER_YPI_AVATAR = 'render_ypi_avatar';
    const FUNC_RENDER_YPI_GOTO_MARK = 'render_ypi_goto';
    const FUNC_REGISTER_YPI_WIDGETS = 'register_ypi_widgets';
    const FUNC_ON_SCRIPT_REQUIRED = 'on_script_required';
    const FUNC_ON_FOOTER='on_footer';    
    
    /*
     * action names
     */
    const ACTION_WIDGETS_INIT = 'widgets_init';
    const ACTION_WP_ENQUEUE_SCRIPTS = 'wp_enqueue_scripts';
    const ACTION_WP_FOOTER_KEY = 'wp_footer';
    
    /*
     * field domain
     */
    const FIELD_DOMAIN_TEXT = 'text_domain';
    
    /*
     * widget keys
     */
    const WIDGET_YPI_PANEL_KEY = 'ypi_panel_widget';
    const WIDGET_AVATAR_KEY='ypi_avatar_widget';           
    
    /*
     * widget info
     */
    const WIDGET_YPI_PANEL_TITLE = 'YPI Panel';
    const WIDGET_YPI_PANEL_DESCR ='YPI panel widget';
    const WIDGET_AVATAR_TITLE = 'YPI Avatar';
    const WIDGET_AVATAR_DESCR = 'YPI Avatar widget';
    const WIDGET_OPTIONS_CHAPTER = 'Chapter URL';
    const WIDGET_OPTIONS_INIT_STATE='Init Case';
    const WIDGET_OPTIONS_AVATAR_ID = 'Avatar ID'; 
    const WIDGET_OPTIONS_SPEED = 'Speech speed';
    const WIDGET_OPTIONS_ALIAS = 'Alias';
    const WIDGET_OPTIONS_ABOUT = 'About';
    const WIDGET_OPTIONS_CSS = 'CSS class';
    const WIDGET_OPTIONS_IMG = 'Image URL';
    const WIDGET_OPTIONS_W = 'Image Width';
    const WIDGET_OPTIONS_H = 'Image Height';
    const WIDGET_OPTIONS_BUBBLE_DISTANCE='Bubble distance';
}
