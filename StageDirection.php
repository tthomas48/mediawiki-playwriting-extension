<?php
 # Example WikiMedia extension
 # with WikiMedia's extension mechanism it is possible to define 
 # new tags of the form 
 # <TAGNAME> some text </TAGNAME>
 # the function registered by the extension gets the text between the 
 # tags as input and can transform it into arbitrary HTML code.
 # Note: The output is not interpreted as WikiText but directly 
 #       included in the HTML output. So Wiki markup is not supported.
 # To activate the extension, include it from your LocalSettings.php
 # with: include("extensions/ExampleExt.php"); 
 $wgExtensionFunctions[] = "wfStageDirection";
 
 function wfStageDirection() {
     global $wgParser;
     # register the extension with the WikiText parser
     # the first parameter is the name of the new tag. 
     # In this case it defines the tag <example> ... </example>
     # the second parameter is the callback function for 
     # processing the text between the tags
     $wgParser->setHook( "sd", "renderStageDirection" );
     $wgParser->setHook( "isd", "renderInlineStageDirection" );
 }
 
 # The callback function for converting the input text to HTML output
 function renderStageDirection( $input, $argv ) {
     # $argv is an array containing any arguments passed to the extension like <example argument="foo" bar>..
     $output = "<div class=\"stage-direction\">($input)</div>";
     return $output;
 }
 function renderInlineStageDirection( $input, $argv ) {
     # $argv is an array containing any arguments passed to the extension like <example argument="foo" bar>..
     $output = "<span class=\"inline-stage-direction\">($input)</span>";
     return $output;
 }

 ?>

