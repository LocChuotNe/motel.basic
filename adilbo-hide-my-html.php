<?php /* 190 Lines */

//  CHECK ENVIRONMENT
if (version_compare(phpversion(), '4.0') < 0) {
	die(adilbo_error('PHP 4.0 or greater is required!'));
}

//  ENVIRONMENT SETUP
ini_set('memory_limit', '-1');
set_time_limit(0);

//  WORK
ob_start('adilbo_hide_my_html');

//  RANDOM-HELPER
function adilbo_hideMyHtmlRandom($len = 0)
{
	if ($len == 0) {
		$len = mt_rand(3, 12);
	}

	$char = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';
	$return = '';

	for ($i = 0; $i < $len; $i++) {
		$return .= $char[mt_rand(0, 51)];
	}

	return $return;
}

//  WORK-HELPER
function adilbo_hide_my_html($buffer)
{
	$configFile = basename(__FILE__, '.php') . '-config.php';

	if (!file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . $configFile)) {
		return adilbo_error('Can\'t find ' . dirname(__FILE__) . DIRECTORY_SEPARATOR . $configFile . ' File');
	}

	require dirname(__FILE__) . DIRECTORY_SEPARATOR . $configFile;

	if (isset($ADILBO_DEBUG) && $ADILBO_DEBUG === true) {
		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	} else {
		error_reporting(0);
	}

	$randVal = mt_rand(0, $ADILBO_RANDOM_CRYPT_FACTOR);

	$outName = 'adilbo_o' . adilbo_hideMyHtmlRandom();
	$varName = 'adilbo_v' . adilbo_hideMyHtmlRandom();
	$funcName = 'adilbo_f' . adilbo_hideMyHtmlRandom();

	if (isset($ADILBO_DEBUG) && $ADILBO_DEBUG === 'adilbo') {
		$jsCode = $varName . '.split(\'.\').forEach(function ' . $funcName . '(value){';
		$jsCode .= $outName . '+=String.fromCharCode(parseInt(atob(value).replace(/\D/g,\'\'))-' . $randVal . ');});';
		$jsCode .= 'document.write(decodeURIComponent(escape(' . $outName . ')));' . PHP_EOL;
		return ('<xmp>' . $jsCode);
	}

	if ($ADILBO_ADD_FAKE_DATA < 0 || $ADILBO_ADD_FAKE_DATA > 10) {
		return adilbo_error('See ' . $configFile . ' File Line: $ADILBO_ADD_FAKE_DATA = ' . $ADILBO_ADD_FAKE_DATA . '; // NOTE: Value must be between 0 and 10');
	}

	if ($ADILBO_CHUNKS_PER_LINE < 1 || $ADILBO_CHUNKS_PER_LINE > 100) {
		return adilbo_error('See ' . $configFile . ' File Line: $ADILBO_CHUNKS_PER_LINE = ' . $ADILBO_CHUNKS_PER_LINE . '; // NOTE: Value must be between 1 and 100');
	}

	if ($ADILBO_RANDOM_CRYPT_FACTOR < 0 || $ADILBO_RANDOM_CRYPT_FACTOR > 100000) {
		return adilbo_error('See ' . $configFile . ' File Line: $ADILBO_RANDOM_CRYPT_FACTOR = ' . $ADILBO_RANDOM_CRYPT_FACTOR . '; // NOTE: Value must be between 0 and 100000');
	}

	$output .= '<script type="text/javascript" language="Javascript">' . PHP_EOL;

	if (isset($ADILBO_HINT) && $ADILBO_HINT === true) {
		$output .= '/** ' . PHP_EOL;
		if (isset($ADILBO_HINT_TEXT) and !empty($ADILBO_HINT_TEXT)) {
			$ADILBO_HINT_TEXT = str_replace(array('*/', '/*', '#', '//'), '', $ADILBO_HINT_TEXT);
			$output .= ' *  ' . $ADILBO_HINT_TEXT . PHP_EOL;
		} else {
			$output .= ' *  Checksum: ' . md5(adilbo_hideMyHtmlRandom()) . PHP_EOL;
		}
		$output .= ' **/ ' . PHP_EOL;
		$output .= PHP_EOL;
	}

	$output .= 'var ' . $outName . ' =\'\';' . PHP_EOL;
	$output .= 'var ' . $varName . ' =' . PHP_EOL;
	$output .= PHP_EOL;
	$output .= '\'' . adilbo_hideMyHtmlEncoder($buffer, $randVal, $ADILBO_CHUNKS_PER_LINE, $ADILBO_ADD_FAKE_DATA) . '\';' . PHP_EOL;

	// https://javascript-obfuscator.org/
	$jsCode = "\"use strict\";";
	$jsCode .= "var _0x0dd0=['\x66\x72\x6f\x6d\x43\x68\x61\x72\x43\x6f\x64\x65','\x72\x65\x70\x6c\x61\x63\x65','\x77\x72\x69\x74\x65','\x66\x6f\x72\x45\x61\x63\x68'];";
	$jsCode .= "(function(_0x4792fc,_0x352491){var _0xd23cef=function(_0x332eb8){while(--_0x332eb8){_0x4792fc['\x70\x75\x73\x68'](_0x4792fc['\x73\x68\x69\x66\x74']());}};";
	$jsCode .= "_0xd23cef(++_0x352491);}(_0x0dd0,0x1cf));var _0x00dd=function(_0x3ed1af,_0x3dd1fe){_0x3ed1af=_0x3ed1af-0x0;var _0x3da43e=_0x0dd0[_0x3ed1af];return _0x3da43e;};";
	$jsCode .= $varName . "['\x73\x70\x6c\x69\x74']('\x2e')[_0x00dd('0x0')](function " . $funcName . "(_0x5fd69b){" . $outName;
	$jsCode .= "+=String[_0x00dd('0x1')](parseInt(atob(_0x5fd69b)[_0x00dd('0x2')](/\D/g,''))-" . $randVal . ");});document[_0x00dd('0x3')](decodeURIComponent(escape(";
	$jsCode .= $outName . ")));";

	// https://deobfuscate.io/
	if (isset($ADILBO_DEOBFUSCATE) and $ADILBO_DEOBFUSCATE == true) {
		$jsCode = "\"use strict\";" . PHP_EOL;
		$jsCode .= "var commands = ['fromCharCode', 'replace', 'write', 'forEach'];" . PHP_EOL;
		$jsCode .= "(function (parameter, counter) {" . PHP_EOL;
		$jsCode .= "  var loop = function (count) {" . PHP_EOL;
		$jsCode .= "    while (--count) {" . PHP_EOL;
		$jsCode .= "      parameter.push(parameter.shift());" . PHP_EOL;
		$jsCode .= "    }" . PHP_EOL;
		$jsCode .= "  };" . PHP_EOL;
		$jsCode .= "  loop(++counter);" . PHP_EOL;
		$jsCode .= "}(commands, 463));" . PHP_EOL;
		$jsCode .= "var adilbo = function (parameter) {" . PHP_EOL;
		$jsCode .= "  parameter = parameter - 0;" . PHP_EOL;
		$jsCode .= "  var result = commands[parameter];" . PHP_EOL;
		$jsCode .= "  return result;" . PHP_EOL;
		$jsCode .= "};" . PHP_EOL;
		$jsCode .= $varName . ".split('.')[adilbo('0x0')](function " . $funcName . "(data) {" . PHP_EOL;
		$jsCode .= "  " . $outName . " += String[adilbo('0x1')](parseInt(atob(data)[adilbo('0x2')](/\D/g, '')) - " . $randVal . ");" . PHP_EOL;
		$jsCode .= "});" . PHP_EOL;
		$jsCode .= "document[adilbo('0x3')](decodeURIComponent(escape(" . $outName . ")));" . PHP_EOL;
	}

	$output .= $jsCode . '</script>' . PHP_EOL;

	if (isset($ADILBO_DEBUG) && $ADILBO_DEBUG === true) {
		$output .= '<xmp>' . $buffer . '</xmp>';
	}

	$no_script = '<noscript style="display:block;background:crimson;color:white;font:x-large monospace;padding:20px;text-align:center">';
	$no_script .= 'For functionality of this site it is necessary to enable JavaScript.<br>';
	$no_script .= '<br>Here are the ';
	$no_script .= '<a style="color:white" href="http://www.enable-javascript.com/">instructions how to enable JavaScript in your web browser</a>.';
	$no_script .= '</noscript>';
	return ($output . $no_script);
}

// ERROR-HELPER
function adilbo_error($string)
{
	$html = "<body><pre>\n\n\n\t<b>ERROR</b> ";
	return $html . $string;
}

// ENCODER-HELPER
function adilbo_hideMyHtmlEncoder($data, $rand, $chunks, $add)
{
	foreach (str_split($data) as $char) {
		++$i;
		$return .= rtrim(base64_encode(adilbo_hideMyHtmlRandom($add) . (ord($char) + $rand) . adilbo_hideMyHtmlRandom($add)), '=') . '.';

		if ($i == $chunks) {
			$i = 0;
			$return .= '\'+' . PHP_EOL . '\'';
		}
	}

	return rtrim($return, '.');
}
/* EOF - end of file */
