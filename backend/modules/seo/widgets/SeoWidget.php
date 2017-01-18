<?


namespace backend\modules\seo\widgets;

use common\modules\seo\models\Seo;


class SeoWidget extends \yii\base\Widget
{

    public function run()
    {

        $controller = \Yii::$app->controller;
        $module = (isset($controller->module)) ? $controller->module->id : null;

        if(is_null($module))
            return;


        switch ($module) {
            case 'seo':
            case 'set':
                return;
        }

        if(isset($controller->model))
            $model_pk = $controller->model->id;
        else
            $model_pk = null;

        $seo_model = Seo::findOne( [
            'model_pk' => $model_pk,
            'module' => $module,
            'controller' => $controller->id] );


        if(!isset($seo_model))
            $seo_model = new Seo;

        $seo_model->module = $module;
        $seo_model->model_pk = $model_pk;
        $seo_model->controller = $controller->id;


        /*if(!isset($seo_model))
            $seo_model = Seo::find( [
                'module' => null,
                ] );

        if(!isset($seo_model))
            return;*/


        return $this->render('seo',[
            'model' => $seo_model ]);
    }
}