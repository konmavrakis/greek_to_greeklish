<?php
/**
 * Copyright (C) 2018 https://github.com/konmavrakis/
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option) any
 * later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * $chars array taken from: https://wordpress.org/plugins/greeklish-permalink/
 */

$chars = array(
  '/[αάΑΆ]/u'   => 'a',
  '/[βΒ]/u'     => 'v',
  '/[γΓ]/u'     => 'g',
  '/[δΔ]/u'     => 'd',
  '/[εέΕΈ]/u'   => 'e',
  '/[ζΖ]/u'     => 'z',
  '/[ηήΗΉ]/u'   => 'i',
  '/[θΘ]/u'     => 'th',
  '/[ιίϊΐΙΊΪ]/u' => 'i',
  '/[κΚ]/u'     => 'k',
  '/[λΛ]/u'     => 'l',
  '/[μΜ]/u'     => 'm',
  '/[νΝ]/u'     => 'n',
  '/[ξΞ]/u'     => 'x',
  '/[οόΟΌ]/u'   => 'o',
  '/[πΠ]/u'     => 'p',
  '/[ρΡ]/u'     => 'r',
  '/[σςΣ]/u'    => 's',
  '/[τΤ]/u'     => 't',
  '/[υύϋΰΥΎΫ]/u' => 'y',
  '/[φΦ]/iu'    => 'f',
  '/[χΧ]/u'     => 'ch',
  '/[ψΨ]/u'     => 'ps',
  '/[ωώ]/iu'    => 'o',
  '/[αΑ][ιίΙΊ]/u'                             => 'e',
  '/[οΟΕε][ιίΙΊ]/u'                           => 'i',
  '/[αΑ][υύΥΎ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'af$1',
  '/[αΑ][υύΥΎ]/u'                             => 'av',
  '/[εΕ][υύΥΎ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u' => 'ef$1',
  '/[εΕ][υύΥΎ]/u'                             => 'ev',
  '/[οΟ][υύΥΎ]/u'                             => 'ou',
  '/(^|\s)[μΜ][πΠ]/u'                         => '$1b',
  '/[μΜ][πΠ](\s|$)/u'                         => 'b$1',
  '/[μΜ][πΠ]/u'                               => 'b',
  '/[νΝ][τΤ]/u'                               => 'nt',
  '/[τΤ][σΣ]/u'                               => 'ts',
  '/[τΤ][ζΖ]/u'                               => 'tz',
  '/[γΓ][γΓ]/u'                               => 'ng',
  '/[γΓ][κΚ]/u'                               => 'gk',
  '/[ηΗ][υΥ]([θΘκΚξΞπΠσςΣτTφΡχΧψΨ]|\s|$)/u'   => 'if$1',
  '/[ηΗ][υΥ]/u'                               => 'iu',
);

$output = [];

$source = isset( $argv[1] ) ? $argv[1] : print_r( 'No source provided' ) . exit;

$stream = fopen( $source, 'r' );

while ( $line = fgets( $stream ) ) {

  //Check if the url is encoded and decode it
  if( preg_match( '~%[0-9A-F]{2}~i', $line ) ){
    $line_encoded = urldecode( $line );
  } else {
    $line_encoded = $line;
  }

  $output[] = preg_replace( array_keys( $chars ), array_values( $chars ), $line_encoded );

}

return isset( $argv[2]) ? file_put_contents( $argv[2], $output ) . print_r( 'File saved!' ) : print_r( $output );

?>
