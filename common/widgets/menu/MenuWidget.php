<?
namespace common\widgets\menu;


use yii\helpers\Html;
use Yii;

class MenuWidget extends \yii\base\Widget
{

    public $items = [];

    public function run()
    {

        foreach (yii::$app->modules as $key => $value) {

            if(is_array($value))
                $moduleName = $value['class'];
            else
            {
                //var_dump($value->icon);

                if(!$value->hasMethod('getIcon') )
                    continue;
                
                $moduleName = $value::className();
            }

            

            $this->items[] = [
                'url' => ["/$key"],
                'icon' => $moduleName::getIcon(),
                'label' => $moduleName::getName(),
            ];

        }


        $this->items[] = [
            'url' => ["/site/elfinder"],
            'icon' => 'file-text',
            'label' => 'Файловый менеджер',
        ];



    	foreach ($this->items as $key => $item) {
    		if(isset($item['icon']) &&
    			!empty($item['icon']))
    		{

    			$this->items[$key]['linkOptions']['title'] = 
    				$item['label'];

    			$this->items[$key]['label'] = 
    				'<i class="fa fa-'.$item['icon'].'"></i>';
    		}
    			
    	}


    	//Yii::$app->user->identity->name

    	$this->items[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    '<i class="fa fa-sign-out"></i>',
                    ['class' => 'btn btn-link logout',
                    'title' => 'Выйти']
                )
                . Html::endForm()
                . '</li>';



        return $this->render('menu',[
            'items' => $this->items ]);
    }
}
