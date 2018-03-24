<?php

use Template\Template;

require_once './vendor/autoload.php';

$name  = "Your name goes here";
$stuff = [ [ "Thing" => "roses", "Desc"  => "red" ],
           [ "Thing" => "violets", "Desc"  => "blue"  ],
           [ "Thing" => "you",  "Desc"  => "able to see this" ],
           [ "Thing" => "we", "Desc"  => "showing this for you" ] ];

$file = $_FILES["file"]["tmp_name"];

echo "aqui 1";
/**
 * @string
 */
$fileName = rand(1,50000) . date("YmdHis");

echo "aqui 2";
move_uploaded_file( $file, 'temp/' . $fileName . '.tmpl');
echo "aqui 3";

$template = new Template(['Name' => $name, 'Stuff'=> $stuff]);
echo "aqui 4";
// You can add variable like this
//$template->addVariable('Name', $Name);
//$template->addVariable('Stuff', $Stuff);
// If your views are in a different path you can set your base path views
//$template->setPath( 'src/views/');
$template->render('temp/'.$fileName);
echo "aqui 5";

unlink( 'temp/' . $fileName . '.tmpl');

?>


