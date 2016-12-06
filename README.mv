#VO LANDING PAGE

This guide is meant for people editing Servcorp's Virtual Office landing page.

##How to Use
Simply copy the files to an apache server with default settings.



##About

This section will talk about important files, how to set up, and how to edit. It is meant to be a guide for those needing to maintain or alter this site.


###Important Files / Construction

*./index.php*
- This file defines the language of the page, retrieves the configuration file, and loads in the templates.
- The language determines which templates will be used ("English" or "Japanese") and also the output of the functions in the "./resources/library" folder.

*./resources/config.php*
- This file is responsible for most of the global and environment variables used throughout the page.
- It also defines functions that may be specific to that language / region (the osaka page changes the order of certain arrays here)
- This file also loads in "locations.json", which is the data file that where all information about each Servcorp location is stored. You can think of it like a small database.
- This file also determines the lowest VO prices by searching through all the locations for the lowest price. If necessary, this price can be hardcoded into the template at "./resources/templates/slider.php", etc.

*./resources/library/locations_functions.php*
- This file contains almost all of the logic that modifies data from variables and the "locations.json" file.

*./resources/library/Location.php ./resources/library/City.php*
- These are the files which hold the Location and City classes.
- These hold most if not all of the logic of how the locations section looks and the information contained within that section. If you need to edit how the markup is outputted, do your changes here.


###Editing
*locations.json*
The data file is set to read from the same file whether it is Main landing page or Osaka landing page. It just needs to be updated and uploaded to the main landing page's "./public_html/json/locations.json"

*CSS, images*
As of writing this, CSS files and Static resources are exactly the same. However, I have kept all static resources seperate so that these can be maintained seperately, if ncessary.

*Slider photos*
Background photos in the slide have the same name, but are different for main landing and osaka landing. They can be edited in their respective "./public_html/images" folder.


- Aaron Burdick, 06-12-2016