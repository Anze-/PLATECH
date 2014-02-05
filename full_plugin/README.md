PLATECH Full JQ Plugin 
==================================
#Features
With this plugin you'll be able to embed latex using the <latex> tag and also have a menu (right click) which will let you copy the latex code in your clipboard and will also link the latex picture to be more user friendly.

#How to..

+ Have a compiler server

+ Install and configure PLATECH
+ Copy the latex.js and latex.css to a public folder of your web server
+ Edit latex.js so that it points to the PLATEX index.php folder and to the latex.css file using absolute urls
+ Include the JQuery library with something like `<script type="text/javascript" script src = '//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>` in your `head`
+ At the end of the page, between `</body>` and `</html>` include the plugin script with `<script src="../your/path/latex.js"> </script>`
+ You are now ready to use the <latex> tag in your body. To know more about how to use the tag read the [PLATECH main readme](../README.md)

#Notes
+ The clipboard function now needs flash plugin, for non-flash browsers a fallback is automatically enabled
+ To edit the look of the buttons edit the latex.css file
+ A special thank to ZeroClipboard for providing the workaround