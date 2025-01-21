#!/usr/bin/php -q
<?php
/*
 *     @(#) $Header: /opt2/ena/metal/sasl/documentation/build.php,v 1.1 2004/10/05 04:09:05 mlemos Exp $
 *
 */

	require("../../xmlparser/xml_parser.php");
	require("../../metal/metal_compiler.php");

	set_time_limit(0);
	$compiler=new metal_compiler_class;
	if(!$compiler->Compile(array(
		"Output"=>"documentation.output",
		"Input"=>"documentation.input",
		"Bindings"=>"include/php.bindings",
		"TargetLanguage"=>"PHP",
		"CacheDirectory"=>"cache",
		"CacheParsedFiles"=>1,
		"IncludePath"=>array("../../metal")
	),$result))
	{
		echo "Error: ".$compiler->error." (File \"".$compiler->error_file."\", Line ".$compiler->error_line.", Column ".$compiler->error_column.", Byte ".$compiler->error_byte_index.").\n";
		exit;
	}
	echo sprintf("OK. Timer: %.2fs\n",$compiler->timer);
?>