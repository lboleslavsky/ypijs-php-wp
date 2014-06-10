(function(){       
    
    if(init==undefined)
    {
        return;    
    }
    
    if($==undefined)
    {
        $=jQuery;    
    }
    
    var x = $.parseJSON(globalArray);
    avatars = [];
    //params.behavior = basicBehavior;
    
    init.onload = function (options) {        
        for(i=0;i<x.length;i++)
        {  
            x[i].behavior = basicBehavior;
            avatars[i] = ypi.df.createAvatar(x[i]);
        }
    };
    init.isExprEnabled=true;
    ypi.df.init(init);    
    ypi.df.invokeInit();   
    //alert(initParams.isEnabled);
 }());