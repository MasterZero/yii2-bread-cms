<?php

namespace common\modules\news\models;



class NewsCategorySearch extends NewsCategory
{
  	public function rules()
	{
	    return $this->search_rules();
	}

}


