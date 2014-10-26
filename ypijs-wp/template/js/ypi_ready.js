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
    init.onload = function (options) {        
        for(i=0;i<x.length;i++)
        {  
            x[i].behavior = basicBehavior;
            x[i].onbubble = parseCustomMark;
            avatars[i] = ypi.df.createAvatar(x[i]);
        }
    };
    init.isExprEnabled=true;
    ypi.df.init(init);    
    ypi.df.invokeInit();   
    
    
    var g =$.parseJSON(gotos);
    for(i=0;i<g.length;i++)
    {
        $('#goto_'+i).click({chapterUrl:g[i].chapterUrl,initState:g[i].initState},function(e)
        {            
            //alert('goto:' + e.data.goto);
            ypi.df.gotoChapter({chapterUrl:e.data.chapterUrl,nodeId:e.data.initState})
        });       
    }
 }());