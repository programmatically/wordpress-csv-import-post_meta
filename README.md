# wordpress-csv-import-post_meta
A single file script that can add post_meta directly from a CSV file


##Install

Place runme.php and your csv file into the top level of your Wordpress install.

Make sure that $mycsvfile is set to your CSV name.

Change $mypath to your websites install path from server it will be something like /home/mysite.com/.

On line 22 the WP_Query is set up to fech woocommerce posts only, you may need to change "product" to "posts".

You will need to modify line 41 for an identifier in your CSV, in my case _sku refers to the Woocommerce plug-in product attribute and $row[0] is the first row of the CSV file (you can find this out by uncommenting the print_r at the bottom of runme.php if you need more information.

On line 47 you will need to change/add the post_meta you require and as above reference the correct row in the CSV


To activate the script you will need to got to the url on your website where the file is ie. www.mysite.com/runme.php

You may also be able to run the php file via SSH if you encounter problems with large CSV's

