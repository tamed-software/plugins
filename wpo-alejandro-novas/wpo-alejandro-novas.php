<?php
/*
Plugin Name: WPO Alejandro Novás
Plugin URI: https://vivirdetupasion.com
Description: Elimina las cadenas innecesarias.
Author: Alejandro Novás
Version: 1.0
Author URI: https://vivirdetupasion.com
*/
?>
<?php
function _remove_script_version( $src ){
$parts = explode( '?', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
?>