<?
namespace common\widgets\navigation;

class NavigationWidget extends \yii\base\Widget
{

    public $items = [];

    public function run()
    {

        $activeButtons = [];

        if(!is_array($this->items))
            return;

    	foreach ($this->items as $key => $button) {

            if(!is_array($button))
            {
                switch ($button) {
                    case 'add':
                        $button = [
                            'icon' => 'plus',
                            'label' => 'Добавить',
                            'url' => ['update'],
                            'btn_class' => 'btn-success',
                        ];
                        break;
                    case 'trash':
                        $button = [
                            'icon' => 'trash',
                            'label' => 'Корзина',
                            'url' => ['list','trash' => true ],
                            'btn_class' => 'btn-warning',
                        ];
                        break;

                    case 'list':
                        $button = [
                            'icon' => 'reorder',
                            'label' => 'Назад к списку',
                            'url' => ['list'],
                            'btn_class' => 'btn-success',
                        ];
                        break;

                    case 'back':
                        $button = [
                            'icon' => 'arrow-left',
                            'label' => 'Назад',
                            'url' => \Yii::$app->request->referrer,
                            'btn_class' => 'btn-info',
                        ];
                        break;

                    case 'category':
                        $button = [
                            'icon' => 'book',
                            'label' => 'Категории',
                            'url' => ['category/'],
                            'btn_class' => 'btn-success',
                        ];
                        break;

                    case 'base':
                        $button = [
                            'icon' => 'reorder',
                            'label' => 'Назад к элементам',
                            'url' => ['module/'],
                            'btn_class' => 'btn-success',
                        ];
                        break;

                        
                    
                    default:
                        continue;
                }
            }

            $activeButtons[] = $button;
        }


        return $this->render('navigation',[
            'items' => $activeButtons ]);
    }
}
