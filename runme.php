<?php

$mycsvfile = 'file.csv';

$mypath = "/home/mysite/";

//define('WP_DEBUG', false);
set_time_limit(0);
date_default_timezone_set("Europe/London");
error_reporting(E_ALL);

define( 'ABSPATH', $mypath . 'public_html/' );
require_once( $mypath . 'wp-config.php' );
require_once( $mypath . 'public_html/wp-includes/load.php' );
require_once( $mypath . 'public_html/wp-includes/default-constants.php' );
require_once( $mypath . 'public_html/wp-includes/version.php' );
require_once( $mypath . 'public_html/wp-admin/includes/image.php');

global $wpdb;
$mytheme_get_brands = array();
$mytheme_get_brands['posts_per_page'] = -1;
$mytheme_get_brands['post_type'] = 'product';
$mytheme_get_brands['post_status'] = 'publish';
$x = new WP_Query( $mytheme_get_brands );

$csv = array_map('str_getcsv', file($mycsvfile));

$p = array();

foreach ($x->posts as $product)
{
  $p[$product->ID] = get_the_title($product->ID);
}

$x=null; // get rid of that to save ram

  foreach($csv as $row)
  {
    foreach($p as $key => $var)
    {
      if(get_post_meta($key, '_sku', true)==$row[1] || $var==$row[0])
      {
          echo $row[0].'<br/>';

          //delete_post_meta($key,'Brand');

          add_post_meta($key,'Brand',$row[1],true);
      }
    }
  }


/*
echo "<br/>----------------------------<br/>";
echo "<pre>";
print_r($csv);
echo "<pre>";
*/
?>
