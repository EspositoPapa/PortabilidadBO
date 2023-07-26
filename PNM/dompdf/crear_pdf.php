<?php
//c:\htdocs\dompdf\sample.php

print ("I see this in HTML output");

require_once("dompdf_config.inc.php");

print("Can't see this... and nothing that follows of course!");

$html = '<html><body><p>Hello world!</p></body></html>';

$dompdf = new DOMPDF(); 
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream("sample.pdf");
?>