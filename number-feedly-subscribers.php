<?php
/*
Plugin Name: Number of Feedly Subscribers
Description: Displays the number of subscribers of your website's feed in Feedly via the shortcode [fns]. Use [fns network=twitter] or [fns network=facebook] to display the number of followers in these networks via the Feedly API.
Author: Enrique J. Ros
Author URI: https://www.enriquejros.com/
Version: 1.1
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: number-feedly-subscribers
*/

/*
    Copyright 2016 Enrique J. Ros (email: info@enriquejros.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function ejr_suscriptores ($atts) {

	extract (shortcode_atts (array ('network' => 'feedly'), $atts));

        $feedurl = get_bloginfo ('wpurl').'/feed/';
        $feedlyurl = 'http://cloud.feedly.com/v3/search/feeds?query='.$feedurl;

	if ($ch = curl_init ($feedlyurl)) {

		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		$contenido = curl_exec ($ch);
		curl_close ($ch	);
		}

	switch ($network) {

		case 'feedly':
			$clave = '"subscribers":';
			break;

		case 'twitter':
			$clave = '"twitterFollowers":';
			break;

		case 'facebook':
			$clave = '"facebookLikes":';
			break;

		default:
			$clave = '"subscribers":';
		}

      	$posini = strpos ($contenido, $clave);
	$contenido = substr ($contenido, $posini + strlen ($clave));
	$posfin = strpos ($contenido, ',');
	$suscriptores = substr ($contenido, 0, $posfin);

	if (!strcmp ($suscriptores, 'url"')) //Es lo que sale cuando Feedly nunca ha hecho un retrieve del feed
		$suscriptores = 0;

        return $suscriptores;

        }

add_shortcode ('fns', 'ejr_suscriptores');

//Permitimos el shortcode en widgets
add_filter ('widget_text', 'do_shortcode');


//Los enlaces de acción
function ejr_enlaces_accion ($damelinks, $plugin_file) {

	static $fns;

	if (!isset ($fns))
		$fns = plugin_basename (__FILE__);

	if ($fns == $plugin_file) {
		$mienlace = array ('support' => '<a href="http://www.enriquejros.com/" target="_blank">Visit me</a>');

		$damelinks = array_merge ($mienlace, $damelinks);
		}
		
	return $damelinks;
}

add_filter ('plugin_action_links', 'ejr_enlaces_accion', 10, 5);
