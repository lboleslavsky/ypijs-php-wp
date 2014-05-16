<?php

/*
* Widgets
* ---
* @author: lboleslavsky [http://boleslavsky.net] 2014
* @license: MIT [link to ypijs.org required]
* @project:
* Your Presentation Interface for JavaScript
* [http://ypijs.org]
*/

class YpiBaseWidget extends WP_Widget
{
    /**
     * Construct Base widget
     * @param type $id_base widget base key
     * @param type $name widget name 
     * @param type $widget_options widget options
     * @param type $control_options control options
     */
    public function __construct($id_base, $name, $widget_options = array(), $control_options = array()) {
        parent::__construct($id_base, $name, $widget_options, $control_options);
    }
    
    protected function getInputField($name,$value,$label)
    {
        $content=Resource::TAG_P_BEGIN;
        $content.=YpiRender::getInstance()->renderLabel($this->get_field_id($name),$label);
        $content.=YpiRender::getInstance()->renderInputField($this->get_field_id($name),$this->get_field_name($name),esc_attr($value));
        $content.=Resource::TAG_P_END;
        return $content;
    }
    
    protected function getFieldOrDefault($name,$instance,$value)
    {
        if(isset($instance[$name]))
        {
            return $instance[$name];
        }
        return __($value,  Resource::FIELD_DOMAIN_TEXT);
    }
    
    protected function getValueOrDefault($name,$instance,$value)
    {
        if($instance[$name]==null)
        {
            return $value; 
        }
        return $instance[$name];
    }
}

/**
 * Panel widget
 */
class YpiPanelWidget extends YpiBaseWidget {

    /**
     * Construct
     */
    public function __construct() {
        parent::__construct(Resource::WIDGET_YPI_PANEL_KEY,  __(Resource::WIDGET_YPI_PANEL_TITLE, Resource::FIELD_DOMAIN_TEXT), array(Resource::WIDGET_PARAM_DESCR=>__(Resource::WIDGET_YPI_PANEL_DESCR, Resource::FIELD_DOMAIN_TEXT)));
    }
    
    /**
     * Widget front
     * @param type $args arguments
     * @param type $instance fields data
     */
    public function widget($args,$instance)
    {  
        $initState = $this->getValueOrDefault(Resource::PARAM_INIT_STATE,$instance,Resource::DEFAULT_INIT_STATE);
        $chapterUrl = $this->getValueOrDefault(Resource::PARAM_CHAPTER_URL,$instance,Resource::DEFAULT_CHAPTER_URL);       
        $params = array(Resource::PARAM_IS_AUTOSTART=>true,Resource::PARAM_INIT_STATE=>$initState,Resource::PARAM_CHAPTER_URL=>$chapterUrl);              
        if(YpiBox::getInstance()->getInitParams()==null)
        {               
            YpiBox::getInstance()->setInitParams($params);            
        }      
        echo YpiRender::getInstance()->renderPanel($params);                  
    }
    
     /**
     * Widget edit form
     * @param type $instance fields data
     */
    public function form($instance)
    {   
        $chapterUrl = $this->getFieldOrDefault(Resource::PARAM_CHAPTER_URL, $instance, Resource::DEFAULT_CHAPTER_URL);        
        $initState = $this->getFieldOrDefault(Resource::PARAM_INIT_STATE, $instance, Resource::DEFAULT_INIT_STATE);                       
        $content = $this->getInputField(Resource::PARAM_CHAPTER_URL,$chapterUrl, Resource::WIDGET_OPTIONS_CHAPTER);
        $content.= $this->getInputField(Resource::PARAM_INIT_STATE,$initState, Resource::WIDGET_OPTIONS_INIT_STATE);
        echo $content;
    }  
}

/**
 * Avatar widget
 */
class YpiAvatarWidget extends YpiBaseWidget
{
    /**
     * Construct
     */
    public function __construct() {
        parent::__construct(Resource::WIDGET_AVATAR_KEY, __(Resource::WIDGET_AVATAR_TITLE,  Resource::FIELD_DOMAIN_TEXT), array(Resource::WIDGET_PARAM_DESCR=>__(Resource::WIDGET_AVATAR_DESCR,Resource::FIELD_DOMAIN_TEXT)));;
    }
    
    /**
     * Widget front
     * @param type $args arguments
     * @param type $instance fields data
     */
    public function widget($args, $instance) {
        if($instance[Resource::PARAM_NAME]==null||YpiBox::getInstance()->contains($instance[Resource::PARAM_NAME]))
        {
            return;                    
        }        
        $name = $this->getValueOrDefault(Resource::PARAM_NAME, $instance, Resource::DEFAULT_AVATAR_NAME);
        $speed= $this->getValueOrDefault(Resource::PARAM_SPEED, $instance, Resource::DEFAULT_SPEED);
        $alias = $this->getValueOrDefault(Resource::PARAM_ALIAS, $instance, Resource::DEFAULT_EMPTY);        
        $params = array(Resource::PARAM_SPEED=> $speed, Resource::PARAM_NAME=>$name,Resource::PARAM_ALIAS=>$alias);        
        echo YpiRender::getInstance()->renderAvatar($params);                                     
    }
    
    /**
     * Widget edit form
     * @param type $instance fields data
     */
    public function form($instance) {        
        $name=$this->getFieldOrDefault(Resource::PARAM_NAME,$instance, Resource::DEFAULT_AVATAR_NAME);
        $alias = $this->getFieldOrDefault(Resource::PARAM_ALIAS,$instance, Resource::DEFAULT_EMPTY);
        $speed = $this->getFieldOrDefault(Resource::PARAM_SPEED,$instance, Resource::DEFAULT_SPEED);                
        $content=$this->getInputField(Resource::PARAM_NAME, $name,  Resource::WIDGET_OPTIONS_AVATAR_ID);
        $content.=$this->getInputField(Resource::PARAM_SPEED, $speed, Resource::WIDGET_OPTIONS_SPEED);
        $content.=$this->getInputField(Resource::PARAM_ALIAS, $alias, Resource::WIDGET_OPTIONS_ALIAS);
        echo $content;
    }
}