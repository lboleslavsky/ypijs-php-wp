//@author ypijs.org#license 2014
function g(b){var a={I:[],ta:[]};a.name=b.Name;a.Ya=b.Alias;a.Db=b.TextAbout;a.speed=b.Speed;a.Ea=b.IdleInterval;a.ia=b.FadeOutSpeed;void 0==a.ia&&(a.ia="slow");a.message=void 0;a.ra=1;a.Qb=void 0;a.J="#"+b.BubbleId;a.p=b.PanelId;a.pa=b.onbubble;a.Ma=b.onplay;a.Qa=b.onstop;a.La=b.onmute;a.Yb=b.onaction;a.Oa=b.onseek;a.Pa=b.onsetter;a.Y=b.onfinish;a.fa=b.behavior;a.N=!1;a.v=0;a.k=0;a.q=0;a.Ab=function(b){a.ta=b.split("\\n");a.q=0;a.k=0};a.zb=function(b){a.qa=b};a.getParams=function(){return a.qa};
a.getName=function(){return a.name};a.getAlias=function(){return a.Ya};a.getPanelId=function(){return a.p};a.Da=function(){return a.k<a.ta.length};a.tb=function(){if(a.Da())return a.k+=1,a.ta[a.k-1]};a.registerCustomAction=function(b,f){a.I[b]=f};a.update=function(b,f){a.Gb();return void 0==a.I[b]||void 0==a.I[b].Va||a.I[b].m!=f.m?!1:a.I[b].Va(void 0,f)};a.Gb=function(){a.ra=1;void 0!=a.V&&clearTimeout(a.V)};a.D=function(b,f){void 0!=f&&(a.first=f.va,a.v=0);a.q=0;a.message=b;void 0!=a.V&&clearTimeout(a.V);
a.N&&(clearTimeout(a.timeout),a.N=!1);a.Ab(b);a.Ta()};a.Ta=function(){retVal=!0;void 0!=a.Ma&&h.M&&(retVal=!a.Ma(a));retVal&&a.show()};a.show=function(){a.Ha?a.Aa=!0:a.ab(a.tb())};a.skip=function(){clearTimeout(a.timeout);a.mute()};a.repeat=function(){a.D(a.message);a.ra++};a.about=function(b){temp=a.message;a.D(b);a.message=temp};a.getTextAbout=function(){return a.Db};a.getTextId=function(){return a.q};a.ab=function(b){void 0!=b&&(void 0!=a.pa?(px={},px.Text=b,px.Element=$(a.J),a.pa(px,a)):$(a.J).text(b),
retVal=a.N=!0,void 0!=a.Oa&&h.M&&(retVal=!a.Oa(a)),retVal&&(a.timeout=setTimeout(function(){a.N&&a.mute()},b.length*a.speed)),$(a.J).fadeIn(30,function(){a.first&&(a.v+=h.Bb(a.qa,a.p),a.first=!1);a.v+=h.Eb(a.qa,a.q)}))};a.isSpeaking=function(){return a.N};a.mute=function(){void 0!=a.La&&a.La(a);a.Ha=!0;$(a.J).fadeOut(a.ia,a.sb)};a.getReactCnt=function(){return a.v};a.sb=function(){a.Ha=!1;a.Aa?(a.Aa=!1,a.show()):a.Da()?(a.q+=1,a.Ta()):h.Ia()||a.Fb()};a.Fb=function(){void 0!=a.Qa&&a.Qa(a);a.q=0;void 0!=
a.Ea&&(a.V=setTimeout(function(){void 0!=h.S&&void 0!=h.S.s?h.Q(h.S.s):a.repeat()},a.Ea*a.ra))};return a}function k(){return hR={update:function(b){$("#history").empty();$.each(b.oa,function(){historyItem=this;$("<strong>"+historyItem.ua+"</strong><p>"+historyItem.b+"</p>").appendTo("#history")});$hide=$("<a>hide</a>");$hide.click(function(){b.hide();$("#history_panel").fadeOut("fast");$("#history").empty()}).appendTo("#history")},wb:function(b){$("#history_panel").fadeIn("fast");hR.update(b)}}}
function l(){mH={oa:{},Ua:{},$b:{},Ra:void 0,na:!1};mH.f=k();mH.k=0;mH.Sa=function(b){mH.Ua[b.u]=!0;mH.oa[mH.k]=b;mH.k++;mH.update()};mH.yb=function(b){mH.Ra=b};mH.Rb=function(){return mH.Ra};mH.qb=function(b){return!0==mH.Ua[b]};mH.show=function(){mH.na=!0;mH.f.wb(mH)};mH.update=function(){mH.na&&mH.f.update(mH)};mH.hide=function(){mH.na=!1};return mH}
function m(){aU={j:[],r:[]};var b=l();aU.register=function(a,b){aU.j[a]=b;void 0!=b.fa&&b.fa(b)};aU.reset=function(){aU.r=[]};aU.sa=function(a){if(isNaN(a.H))return!1;void 0==aU.r[a.i]&&(aU.r[a.i]=0);if("+="==a.ca)aU.r[a.i]+=Number(a.H);else if("="==a.ca)aU.r[a.i]=Number(a.H);else return!1;void 0!=aU.O&&aU.O(a);return!0};aU.U=function(a){return aU.r[a]};aU.nb=function(){for(var a in aU.j)void 0!=aU.j[a].Pa&&aU.j[a].Pa()};aU.Ba=function(a){return aU.j[a]};aU.B=function(){return b};aU.D=function(a,
c){void 0!=c.t&&void 0!=aU.j[c.t]&&($v=$(aU.j[c.t].J),void 0!=$v&&"hide"!=c.Wa&&(b.Sa({ua:c.t,b:a}),aU.j[c.t].D(a,c)))};return aU}
function n(b,a){pR={};pR.e=a;pR.ma=void 0;pR.L=b.initState;pR.W=b.isAutostart;pR.xml=void 0;pR.load=function(a){pR.ma=!1;$.ajax({type:"GET",url:a,dataType:"xml",success:function(a){pR.xml=$(a);pR.ma=!0;void 0!=pR.W&&void 0!=pR.L&&pR.W&&pR.e.Q(pR.L)},error:function(){void 0!=pR.e.Ja&&pR.e.Ja(a)}})};pR.Ca=function(a){var b={};$.each(pR.e.Za,function(e,d){b[d.charAt(0).toUpperCase()+d.substring(1)]=a.getAttribute(d)});b.b=b.Text;b.c=b.Target;b.ba=b.Invoke;b.Kb=b.Overtime;b.Mb=b.Timeout;b.F=b.Condition;
b.m=b.Scope;b.da=b.Sound;b.G=b.Id;void 0!=pR.e.wa&&$.each(pR.e.wa,function(e,d){b[d.charAt(0).toUpperCase()+d.substring(1)]=a.getAttribute(d)});return void 0==b.b?void 0:b};pR.ib=function(){var a=element,b={};b.l=a.getAttribute("prop");$.each(pR.e.$a,function(e,d){b[d.charAt(0).toUpperCase()+d.substring(1)]=a.getAttribute(d)});b.s=b.Goto;b.b=b.Text;b.F=b.Condition;b.l=b.Prop;b.R=b.Setter;b.da=b.Sound;b.ba=b.Invoke;b.m=b.Scope;void 0!=pR.e.xa&&$.each(pR.e.xa,function(e,d){b[d.charAt(0).toUpperCase()+
d.substring(1)]=a.getAttribute(d)});return void 0==b.b&&void 0==GotoId?void 0:b};pR.rb=function(a,b,e){diff=100-b;0<diff&&(p=Math.floor(diff/e),$.each(a,function(){void 0==this.l&&(this.l=p)}))};pR.ub=function(b){tokens=b.split(";");for(i=0;i<tokens.length;i++)0==tokens[i].indexOf("_")&&0<tokens[i].indexOf("=")&&(variables=tokens[i].split("="),isNaN(variables[1])?alert(tokens[i]+": invalid number format"):variables[0].indexOf("+")==variables[0].length-1?a.h.sa({i:variables[0].substring(0,variables[0].length-
1),ca:"+=",H:variables[1]}):a.h.sa({i:variables[0],ca:"=",H:variables[1]}));a.h.nb()};pR.gb=function(a){var b=Math.floor(100*Math.random()+1),e=void 0,d=0;$.each(a,function(){if(pR.pb(this,b,d))return e=this,!1;d+=Number(this.l);return!0});return e};pR.pb=function(a,b,e){return b>e&&b<=e+Number(a.l)};pR.ka=function(){return pR.xml};pR.hb=function(a,b){if(void 0==b)return a;x=a.lastIndexOf(".");if(0>=x)return a;prefix=a.substring(0,x);suffix=a.substring(x,a.length);return prefix+"_"+b+suffix};return pR}
function q(b){iN={data:"",index:0,lastIndex:0,oa:"",T:0,O:void 0};void 0!=b&&void 0!=b.onvariable&&(iN.O=b.onvariable);iN.log=function(){};iN.evaluate=function(a){iN.data=decodeURI(a.replace(/\^/g,"&"));iN.index=0;iN.T=0;return r=iN.A()};iN.A=function(){expected=iN.next();if("("==expected){iN.T++;tmp=iN.A();expected=iN.next();if(")"==expected)return iN.T--,expected=iN.next(),"|"==expected?tmp|=iN.A():")"==expected?iN.P():"&"==expected?tmp&=iN.A():iN.C()||iN.d(expected,"& or |"),tmp;iN.d(expected,
")")}else{if("_"==expected)return tmp=iN.cb(),expected=iN.next(),"|"==expected?tmp|=iN.A():"&"==expected?tmp&=iN.A():")"==expected?(0>=iN.T&&iN.d(expected,"unexpected )"),iN.P()):iN.C()||iN.d(expected,"& or |"),tmp;iN.d(expected,"_ or (")}};iN.cb=function(){variable=iN.U();val=0;void 0!=iN.O&&(val=iN.O("_"+variable),void 0==val&&(val=0));expected=iN.next();"="==expected?tmp=val==iN.ja():">"==expected?tmp=val>iN.ja():"<"==expected?tmp=val<iN.ja():iN.d("bad operator","expected ><=");return tmp};iN.Tb=
function(a){return"x"==a?1:0};iN.U=function(){for(str="";;){expected=iN.next();if("="==expected||">"==expected||"<"==expected)return iN.P(),""==str?iN.d("empty name of property"):iN.log("got variable "+str),str;if("\n"==expected||iN.C()){iN.d(expected);break}else str+=expected}};iN.ja=function(){str="";expected=iN.next();for("-"==expected?str+=expected:iN.P();;)if(expected=iN.next(),"1"==expected||"2"==expected||"3"==expected||"4"==expected||"5"==expected||"6"==expected||"7"==expected||"8"==expected||
"9"==expected||"0"==expected)str+=expected;else{if("&"==expected||"|"==expected||"\n"==expected||")"==expected||","==expected||"+"==expected||iN.C())return iN.P(),""==str&&iN.d("empty constant"),str;iN.d(expected,"");break}};iN.d=function(a,b){throw'error: "'+a+'",'+b;};iN.C=function(){return iN.index+1>iN.data.length};iN.P=function(){iN.index=iN.lastIndex};iN.Cb=function(){for(;!(iN.index++,iN.C()||"\r"!=iN.data.charAt(iN.index-1)&&" "!=iN.data.charAt(iN.index-1)););};iN.next=function(){return iN.C()?
null:(iN.lastIndex=iN.index,iN.Cb(),iN.data.charAt(iN.index-1))};return iN}
function t(){return rd={za:function(b,a){if(b.ob||a.X&&void 0!=b.F&&1!=a.evaluate(b.F))return!1;cssClass="";a.B().qb(b.u)&&(cssClass="class=visited");if(void 0!=b)return s=void 0,void 0!=a.Na&&(s=a.Na(b)),void 0==s&&(s=$("<li "+cssClass+"></li>").html('<a href="#'+b.c+'_area">'+b.b+"</a>")),s.click({b:b.b,s:b.s,u:b.u,aa:b.aa,R:b.R,Xa:b},function(b){a.B().yb(b.data.aa);a.B().Sa({ua:"you",b:b.data.b,u:b.data.u});void 0!=b.data.R&&a.a.ub(b.data.R);a.Q(b.data.s);void 0!=a.Ka&&a.Ka(b.data.Xa)}),s.appendTo(a.ha),
b.ob=!0},xb:function(b){return b},Fa:function(){$('<ul id="answers"></ul>').appendTo("#dialog")}}}
var h=function(){var b={init:function(a){b.a=void 0;b.f=void 0;b.h=m();b.w=void 0;b.K=a.chapterUrl;b.Ga=a.onload;b.Ka=a.onanswer;b.Na=a.onrender;b.Ja=a.on404;b.Z=a.onsound;b.Y=a.onfinish;b.wa=a.attrCase;b.xa=a.attrReact;b.Za="id text target sound overtime timeout invoke scope condition setter".split(" ");b.$a="text goto condition invoke sound setter scope prop".split(" ");b.language=a.language;b.p=a.PanelId;void 0==b.p&&(b.p="answers");b.ha="#"+b.p;b.a=n(a,b);b.f=t();b.M=!1;b.M=a.isSoundEnabled;b.X=
!0;b.la=void 0;!1==a.isExprEnabled&&(b.X=!1);b.ya=a.disableBubbleRender;b.ea=1;b.$=0},invokeInit:function(){if(void 0==b.Ga||void 0==b.a)return!1;b.f.Fa();b.Ga();b.lb();void 0!=b.K&&(b.X&&(b.la=q({onvariable:b.h.U})),b.a.load(b.a.hb(b.K,b.language)))},reset:function(){b.h.reset();b.Q(b.a.L);temp=avatar.message},o:function(){return b.h},Sb:function(){return b.f()},createAvatar:function(a){void 0==a.BubbleId&&(a.BubbleId="npc_bubble_"+b.ea);void 0==a.Name&&(a.Name="avatar_"+b.ea);a=g(a);if(void 0!=
a&&void 0!=b.o())return b.o().register(a.name,a),b.ea++,a},B:function(){return b.o().B()},gotoChapter:function(a){void 0!=a.nodeId&&(b.h.reset(),void 0!=a.chapterUrl&&a.chapterUrl!=b.K?(b.a.L=a.nodeId,b.K=a.chapterUrl,b.a.W=!0,b.a.load(b.K)):b.Q(a.nodeId))},Q:function(a){if(void 0==b.a||!0!=b.a.ma)return!1;$(b.ha).empty();var c;b.a.ka().find("case[id="+a+"]").each(function(){c=this});a=b.a.Ca(c);if(void 0==a)return!1;b.fb(a);b.eb(a);b.$=0;b.ga=a;void 0!=a.n?b.Ia():b.show(a)},Ia:function(){if(void 0==
b.ga.n||b.$>=b.ga.n.length)return!1;params=b.ga.n[b.$];params.Target!=params.c&&void 0!=params.Target&&(params.c=params.Target);b.$++;b.show(params);return!0},fb:function(a){tCnt=0;b.a.ka().find("txt[rel="+a.G+"]").each(function(){element=this;params=b.a.Ca(element);void 0!=params.b&&b.X&&void 0!=params.F&&1!=b.evaluate(params.F)||(void 0==a.n&&(a.n=[],void 0!=a.b&&0<a.b.length?(a.n[tCnt]=a,tCnt++):(params.c=a.c,params.G=a.G)),a.n[tCnt]=params,tCnt++)})},Bb:function(a,c){key="unsorted";b.ha=void 0==
c?"#"+b.p:"#"+c;cnt=0;if(void 0==b.g||void 0==b.g[key])return cnt;$.each(b.g[key],function(a,c){b.f.za(c,b)&&cnt++});return cnt},Eb:function(a,c){cnt=0;if(void 0==a.m)return cnt;key="t_"+a.m+"_"+c;if(void 0==b.g||void 0==b.g[key])return cnt;$.each(b.g[key],function(a,c){b.f.za(c,b)&&cnt++});return cnt},eb:function(a){var c=0,f=0,e=0;reactions=[];b.S=void 0;b.g={};nodeId=a.G;b.a.ka().find("react[rel="+nodeId+"]").each(function(){element=this;params=b.a.ib();params.u=nodeId+""+params.s;params.aa=nodeId;
params.c=a.c;void 0!=params.l?e+=Number(params.l):f+=1;reactions[c]=params;b.vb(params);c++});b.S=b.jb(reactions,e,f)},vb:function(a){key=b.kb(a);void 0==b.g[key]&&(b.g[key]=[]);b.g[key].push(a)},kb:function(a){return void 0==a.m?"unsorted":"t_"+a.m},show:function(a){b.mb(a)},jb:function(a,c,f){if(0<c)return b.a.rb(a,c,f),b.a.gb(a)},update:function(a,c){0==c&&void 0!=b.Y&&b.Y(a)},invokeActions:function(a){avatar=h.o().Ba(b.w);void 0!=avatar&&void 0!=a.ba&&avatar.update(a.ba,a)},mb:function(a){a.c!=
b.w&&void 0!=a.c&&(b.o().D("",{t:b.w,Wa:"hide",va:!0}),b.w=a.c);if(void 0==b.ya||!1==b.ya)a.b=b.f.xb(a.b);avatar=h.o().Ba(b.w);avatar.zb(a);b.o().D(a.b,{t:b.w,va:!0})},Ub:function(){b.B().show()},lb:function(){if(!b.M||void 0==b.Z)return!1;px={Type:"INIT"};b.Z(px)},Zb:function(a){if(!b.M||void 0==b.Z||void 0==a.da)return!1;px={Type:"PLAY"};px.Id=a.G;px.Sound=a.da;px.Param=a;b.Z(px)},getVariable:function(a){return b.h.U(a)},setVariable:function(a,c){b.h.sa({i:a,H:c})},evaluate:function(a){if(void 0==
b.la||void 0==a||3>=a.length)return null;try{return r=b.la.evaluate(a)}catch(c){return null}}};return b}(""),ypi={};ypi.df=h;