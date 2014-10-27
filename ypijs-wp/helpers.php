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
     * Add goto href parameters
     * @param type $params
     */
    public function addGotoHref($params)
    {
        $this->hrefs[] = $params;
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
    
    public function getGotoHrefs()
    {
        return $this->hrefs;
    }

    // array of avatars parameters
    private $avatars = array();      
    // avatar flags
    private $rendered = array();
    // array of goto href
    private $hrefs = array();
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
    private $gotoCnt = 0;
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
            $avatarContent = '<img id="'.$params[Resource::PARAM_NAME].'" class="'.Resource::DEFAULT_AVATAR_CSS_CLASS.'" src="'.$params[Resource::PARAM_AVATAR_IMG].'" title="'.$params[Resource::PARAM_ALIAS].'" width="'.$w.'" height="'.$h.'" />';
            $style='style="position:absolute;bottom:'.($h + $params[Resource::PARAM_BUBBLE_DISTANCE]).'px;"';
        }
        else
        {
            $avatarContent = '<div id="'.$params[Resource::PARAM_NAME].'" class="'.Resource::DEFAULT_AVATAR_CSS_CLASS.'"></div>';
        }         
        $content = /*'<a name="'.$params[Resource::PARAM_NAME].'_area"></a>'.*/'<div class="region '.$classes.'">'.$avatarContent.'<div id="'.$params[Resource::PARAM_BUBBLE_ID].'" class="'.Resource::DEFAULT_BUBBLE_CSS_CLASS.'" '.$style.'></div></div>';
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
        if($params[Resource::PARAM_PANEL_ID]!=null)
        {
            return '<div id="dialog"><ul id="'.$params[Resource::PARAM_PANEL_ID].'"></ul></div>';
        }
        return Resource::RENDER_CONTENT_PANEL;
    } 
    
    /**
    * Render goto href 
    * @return string HTML
    */
    public function renderGotoHref($params)
    {               
        $content = '<a id="goto_'.$this->gotoCnt.'" href="#'.$params[Resource::PARAM_TARGET].'" class="tag" title="'.$params[Resource::PARAM_GOTO_TITLE].'">'.$params[Resource::PARAM_NAME].'</a>';
        YpiBox::getInstance()->addGotoHref($params);
        $this->gotoCnt++;
        return $content;
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
        $content='<input type="text" class="widefat" name='.esc_attr($name).' id="'.esc_attr($id).'" value="'.esc_attr($value).'"></input>'; 
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
    
    /**
     * Sanitize whole array
     * @param type $x array
     * @return type sanizized array
     */
    public function getSanitizedArray($x)
    {
        $y = array();
        foreach($x as $key=>$value)
        {
            $y[$key] = esc_attr($value);
        }
        return $y;
    }
}