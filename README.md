YPI plugin for WordPress
============

Installation 
-------------------
- Place ypijs-wp plugin into your WordPress plugin directory
- Activate plugin in WordPress plugin admin page
- Place widgets or shortcode to page content(or both). 

Shortcode
-------------------
- Insert shortcode anywhere to WP content post

**[ypi_avatar]**
- Avatar (can be multiple)

| Attribute     | Description      |           
| ------------- |:----------------:|
| name          | avatar's ID      |
| alias         | avatar's alias   |
| img           | URL to image     |
| w             | image width      |
| h             | image height     |
| speed         | speech speed     |
| class         | css classname    |

**[ypi_panel]**
- Panel with reactions and YPI script base

| Attribute     | Description      |           
| ------------- |:----------------:|
| chapterUrl    | path to XML file |
| initState     | case number      |

Widgets
-------------------
- Place the widget to specified content panel and set corresponding options. There are two kinds of widgets.

**YPI Avatar**
- Avatar (can be multiple)

**YPI Panel**
- Panel with reactions and YPI script base 

Usage
-------------------
It is possible to combine both ways too. However, shortcode inputs overrides widget options. 

```txt
 [ypi_panel chapterUrl="http://localhost/content/welcome.xml"]
```


