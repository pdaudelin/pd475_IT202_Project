<?php
ob_start();
require_once("fidgettype.php");
require_once("fidget.php");

// Counts
$totalFidgetTypes = FidgetType::getFidgetTypeCount();
$totalFidgets = Fidget::getFidgetCount();

// Totals
$wholesaleTotal = Fidget::getWholesaleTotal();
$listPriceTotal = Fidget::getListTotal();

$doc = new DOMDocument("1.0");
$root = $doc->createElement("website");
$doc->appendChild($root);

$root->appendChild($doc->createElement("fidgettypes", $totalFidgetTypes));
$root->appendChild($doc->createElement("fidgets", $totalFidgets));
$root->appendChild($doc->createElement("wholesalepricetotal", $wholesaleTotal));
$root->appendChild($doc->createElement("listpricetotal", $listPriceTotal));

header("Content-type: application/xml");
ob_end_clean();
echo $doc->saveXML();
?>