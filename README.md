Php LATEx Cache Holder
==================================

This php script is intended to use with the clsipy latex compiler server display method available on github at https://github.com/Anze-/clsipy

#Purposes
The purpose is to quicken up the load times of webpages containing embedded compiled latex pictures (even dinamically requested), cut down the number of requests to the compiler and decrease the webpage bandwith usage thanks to saving the compiled latex outputs to a local folder with a unique name, and looking for a saved image before sending the request the the clsipy server.

#New!


+ Added a jQuery script to embed latex compiled images using the <latex dpi="integer">your \LatexCode</latex>.

+ Added `<latex>` default class as .latex ; now you can even set custom class and/or id to the latex tag to call it via js or css or whatever you want!

+ Added full LaTeX support (now even arrays and matrices will work!) using urlencoding.

##Steps to get `<latex>` tag working:

1. Install PLATECH
2. Copy/Paste the html in latex_tag.html (the comments will help you) to your `<head>`
3. Edit the 'server' variable to match your PLATECH install folder ( e.g. `var server = "http://yourdom.ain/myfolder";` )
4. Use the `<latex>` tag freely in your doument `<body>`!

# Installation
1. Check for php to be enabled and create folder named e.g. 'myfolder'
2. Place the index.php in 'myfolder'
3. Create a subfolder called e.g. 'mycache'
4. Now edit the php settings of the file index.php as suggested in comments

you are done!

# How To..

To embed a latex formula e.g. the command \LaTeX with a resolution of 300 dpi you can use:
~~~~~~~~~~~~~~~~
	<img src="http://yourdom.ain/myfolder?l=\LaTeX&d=300">
~~~~~~~~~~~~~~~~
and here you go!


# License
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

[Copyright](http://anze.mit-license.org/) © 2014 Alberto Anzellotti - alberto.anzellotti@gmail.com
