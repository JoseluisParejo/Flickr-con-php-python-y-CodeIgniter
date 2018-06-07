<?php	
	header('Content-Type: text/html; charset=utf-8');
	$url = "https://api.flickr.com/services/feeds/photos_public.gne?tags=sevilla";
        	
	$texto = file_get_contents($url);
	$tree = new SimpleXMLElement($texto);
	$tree->registerXPathNamespace("feed","http://www.w3.org/2005/Atom");
	$links = $tree->xpath("//feed:entry/feed:link[@rel='enclosure']/@href");
	echo "<h1 align='center'>Últimas fotos de Sevilla </h1>";	
        $tabla = "";
        foreach($links as $i => $v) {
  	   $tabla = $tabla."<tr><td><a href='".$links[$i]."'<b>Título</b><br>".$tree->entry[$i]->title."</a></td></tr>";
        }
	echo "<table align='center'bgcolor='#F2F2F2' cellpadding='20px'>".$tabla."</table>";
?>
