<?php
namespace common\modules\user\models;


class UserSearch extends User
{
    public function rules()
    {
        return $this->search_rules();
    }
}
