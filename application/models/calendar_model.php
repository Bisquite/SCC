<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {
   function __construct() {
       parent::__construct();
   }

   
   /* ------------------------------------------
    * Add news article to database
   * ------------------------------------------*/
   public function process_create_news($data) { 
   	if ($this->db->insert('news', $data)) {
   		return true;
   	} else {
   		return false;
   	}
   }
   
   
   /* ------------------------------------------
    * Return most recent news articles
   * ------------------------------------------*/
   public function get_recent_news() {
   	
   	   $query = "	select *
					from news
					order by news_created_date desc
					limit 5;";
        return $this->db->query($query);
   }
   
   
   /* ------------------------------------------
    * Dropdown lists
   * ------------------------------------------*/
   public function get_news_category_dropdown() {
   	$query = "
   			select news_category_id, news_category_name
			from news_categories;";
   	return $this->db->query($query);
   }
   
}
