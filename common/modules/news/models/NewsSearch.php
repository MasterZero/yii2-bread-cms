<?php

namespace common\modules\news\models;



class NewsSearch extends News
{
  	public function rules()
	{
	    return $this->search_rules();
	}

}


