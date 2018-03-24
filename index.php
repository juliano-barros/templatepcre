<?php

use Template\Template;

require_once './vendor/autoload.php';

$name  = "Your name goes here";
$stuff = [ [ "Thing" => "roses", "Desc"  => "red" ],
           [ "Thing" => "violets", "Desc"  => "blue"  ],
           [ "Thing" => "you",  "Desc"  => "able to see this" ],
           [ "Thing" => "we", "Desc"  => "showing this for you" ] ];

$file = $_FILES["file"]["tmp_name"];

/**
 * @string
 */
$fileName = rand(1,50000) . date("YmdHis");

move_uploaded_file( $file, $fileName . '.tmpl');

$template = new Template(['Name' => $name, 'Stuff'=> $stuff]);
// You can add variable like this
//$template->addVariable('Name', $Name);
//$template->addVariable('Stuff', $Stuff);
// If your views are in a different path you can set your base path views
//$template->setPath( 'src/views/');
$template->render($fileName);

echo file_exists($fileName. '.tmpl');

unlink( $fileName . '.tmpl');

?>


