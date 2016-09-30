<?php
/**
 * wp-config.php
 *
 * @package WordPress
 */

// check if development config file exists
if ( file_exists( dirname( __FILE__ ) . '/dev-config.php' ) ) {

  // include development config file
  include( dirname( __FILE__ ) . '/dev-config.php' );

} else {

  // include production config file
  include( dirname( __FILE__ ) . '/prd-config.php' );

}
