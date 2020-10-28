<?php
$xml = simplexml_load_file("sitemap.xml");
echo"<table border='1'>";
echo "<tr> <th></th><th colspan='3'>".$xml->getName()."</th> </tr>";
foreach($xml->children() as $child)
{
echo "<tr bgcolor='purple' style='color:white'><td colspan='3'>".$child->getName()."</td></tr>";
foreach($child->children() as $child2)
{
echo "<tr><td bgcolor='pink'style='color:black'> ".$child2->getName()."</td>
<td>".$child2."</td>
</tr>";
}
}
echo"</table>";
?>