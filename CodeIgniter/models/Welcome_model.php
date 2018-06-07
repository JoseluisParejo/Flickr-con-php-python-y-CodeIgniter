<?php
	class Welcome_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}
		public function get($id){
			$query = $this->db->get('product');
			return $query->result_array();
		}
        public function linefile($id){
            return fgets(fopen($id,'r'));
        }
        public function getFliker(){
            $url = "https://api.flickr.com/services/feeds/photos_public.gne?tags=sevilla";
            $texto = file_get_contents($url);
            $tree = new SimpleXMLElement($texto);
            $tree->registerXPathNamespace("feed","http://www.w3.org/2005/Atom");
            $links = $tree->xpath("//feed:entry/feed:link[@rel='enclosure']/@href");
            $lista = array();
            foreach ($links as $key => $value) {
                $lista[$key]['link'] = $value;
                $lista[$key]['title'] = $tree->entry[$key]->title;
            }
            return $lista;
        }
    } 
?>
  