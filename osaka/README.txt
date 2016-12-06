===========
VO Landing Page
===========

Folder Structure:
======
en
|__index.php
public_html
|__css, images, js, json
resources
|__library
|__templates
	|__all japanese templates
	|__en
	      |__all english templates
index.php
README.txt


How to edit a deal: 
Go to "\Dropbox (Servcorp)\Web Strategy Shared\Servcorp Japan\Projects\Main site 2016\Source\json files\locations.json"
	-Find desired location
	-Change "hasVoDeal" property to 'false' to take off deal
	-Change "hasVoDeal" property to 'true' to turn on deal


How to edit location information:
	-In the file above, find the desired property and edit accordingly


How to edit text:
Go to the respective english templates or japanese templates and edit the HTML/PHP directly.
A very small amount of text inside of the dynamic parts (deal boxes) is inside of supporting functions found in the "resources/library/locations_functions.php" file.