<?php

/*
* Helpers
* ---
* @author: lboleslavsky [http://boleslavsky.net] 2014
* @license: MIT [link to ypijs.org required]
* @project:
* Your Presentation Interface for JavaScript
* [http://ypijs.org]
*/

class YpiBox
{
    /**
     * Instantiate singleton
     * @return type singleton
     */
    public static function  getInstance()
    {
        if(self::$thisInstance==null)
        {
            self::$thisInstance= new YpiBox();
        }
        return self::$thisInstance;
    }

    /**
     * Set initial parameters (for ypi.df.init method)
     * @param type $params initial parameters
     */
    public function setInitParams($params)
    {
        $this->initParams=$params;  
    }

    /**
     * Get initial parameters (for ypi.df.init method)
     * @return type initial parameters
     */
    public function getInitParams()
    {
        return $this->initParams;
    }

    /**
     * Add avatar parameters (for ypi.df.createAvatar)
     * @param type $params avatar parameters
     */
    public function addAvatar($params)
    {
        $this->rendered[$params[Resource::PARAM_NAME]]=true;
        $this->avatars[] = $params;
    }
    
    /**
     * Return true if contains key
     * @param type $key key
     * @return type true if contains key 
     */
    public function contains($key)
    {
        return $this->rendered[$key]==true;
    }

    /**
     * Get array of avatars parameters
     * @return type array of avatars parameters
     */
    public function getAvatars()
    {
        return $this->avatars;
    }
    
    // array of avatars parameters
    private $avatars = array();  
    // avatar flags
    private $rendered = array();
    // initial parameters  
    private $initParams=null;
    // singleton
    private static $thisInstance = null;    
}

/**
 * Renderer
 */
class YpiRender
{
    private static $thisInstance = null;
    private $canRenderPanel= true;
    public static function getInstance()
    {
        if(self::$thisInstance==null)
        {
            self::$thisInstance=new YpiRender();
        }
        return self::$thisInstance;
    }  
    
    /**
     * Render avatar
     * @param string $params avatar parameters
     * @param type $classes css class
     * @return string HTML
     */
    public function renderAvatar($params,$classes='')
    {
        if($params[Resource::PARAM_NAME]==null||YpiBox::getInstance()->contains($params[Resource::PARAM_NAME])==true)
        {
            return Resource::DEFAULT_EMPTY;
        }        
        if($params[Resource::PARAM_BUBBLE_ID]==null)
        {
            $params[Resource::PARAM_BUBBLE_ID] = Resource::DEFAULT_NPC_PREFIX.$params[Resource::PARAM_NAME]; 
        }        
        if($params[Resource::PARAM_AVATAR_IMG]!=null)
        {
            $w = Resource::DEFAULT_AVATAR_W;
            $h = Resource::DEFAULT_AVATAR_H;       
            if($params[Resource::PARAM_AVATAR_W]>0&&$params[Resource::PARAM_AVATAR_W]<=Resource::MAX_AVATAR_W)
            {
                $w = $params[Resource::PARAM_AVATAR_W];
            }
            if($params[Resource::PARAM_AVATAR_H]>0&&$params[Resource::PARAM_AVATAR_H]<=Resource::MAX_AVATAR_H)
            {
                $h = $params[Resource::PARAM_AVATAR_H];
            }            
            $avatarContent = '<img id="'.$params[Resource::PARAM_NAME].'" class="'.Resource::DEFAULT_AVATAR_CSS_CLASS.'" src="'.$params[Resource::PARAM_AVATAR_IMG].'" width="'.$w.'" height="'.$h.'" />';
        }
        else
        {
            $avatarContent = '<div id="'.$params[Resource::PARAM_NAME].'" class="'.Resource::DEFAULT_AVATAR_CSS_CLASS.'"></div>';
        }        
        $content = '<div class="region '.$classes.'">'.$avatarContent.'<div id="'.$params[Resource::PARAM_BUBBLE_ID].'" class="'.Resource::DEFAULT_BUBBLE_CSS_CLASS.'"></div></div>';
        YpiBox::getInstance()->addAvatar($params);
        return $content;
    }
    
    /**
     * Render panel 
     * @return string HTML
     */
    public function renderPanel($params)
    {    
        if($this->canRenderPanel==false)
        {
            return Resource::DEFAULT_EMPTY;
        } 
        $this->canRenderPanel=false;                                
        return Resource::RENDER_CONTENT_PANEL;
    }   
    
    /**
     * Render input field
     * @param type $id field id
     * @param type $name field name 
     * @param type $value field value
     * @return string HTML
     */
    public function renderInputField($id, $name,$value)
    {
        $content='<input type="text" class="widefat" name='.$name.' id="'.$id.'" value="'.$value.'"></input>'; 
        return $content;
    }
    
    /**
     * Render label
     * @param type $name field name
     * @param type $value label value
     * @return string HTML
     */
    public function renderLabel($name,$value)
    {
        $content = '<label for="'.$name.'">'.$value.'</label>';
        return $content;
    }
    
    /**
     * If panel render is allowed
     * @return type true/false
     */
    public function isPanelRenderAllowed()
    {
        return $this->canRenderPanel;
    }
}