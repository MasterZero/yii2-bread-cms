<?php

namespace common\modules\page\models;



class PageSearch extends Page
{
  	public function rules()
	{
	    return $this->search_rules();
	}

}


