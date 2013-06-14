README.txt
===============================================================
Modules
===============================================================
Standard module procedures. All CSS and JavaScript need to be 
written into the specific files

module/css/styles.css
module/js/module_functions.js

The contents of these files are injected into the header when
you're viewing the module.

All menu items need to be placed into the menu.php file

All Modules must have

module/models/model_[module]

AND they all MUST HAVE

the search function.

This ensures that the search bar in the header is able to search through each module.

** If your module does not require this please leave the function empty returning nothing. **

All Controllers extend MX_Controller rather than CI_Controller
