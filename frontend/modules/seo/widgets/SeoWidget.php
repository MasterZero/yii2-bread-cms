<?


namespace frontend\modules\seo\widgets;

use common\modules\seo\models\Seo;


class SeoWidget extends \yii\base\Widget
{

    public function run()
    {

        $controller = \Yii::$app->controller;
        $module = (isset($controller->module)) ? $controller->module->id : null;

        if(is_null($module))
            return;


        $url = \Yii::$app->request->get('url');

        if(!isset($url))
            $model_pk = null;
        else
        {
            $model = $controller->modelName()::findOne([ 'url' => $url ]);

           //echo $model->name;

            if($model)
                $model_pk = $model->id;
            else
                $model_pk = null;
        }


        var_dump($model_pk);


        $seo_model = Seo::findOne( [
            'model_pk' => $model_pk,
            'module' => $module,
            'controller' => $controller->id] );


        if(!isset($seo_model))
            $seo_model = Seo::findOne( [
            'module' => $module,
            'controller' => $controller->id,
            'model_pk' => $model_pk,] );

        if(!isset($seo_model))
            $seo_model = Seo::findOne( [
            'module' => null] );

        if(!isset($seo_model))
            return;


        return $this->render('seo',[
            'model' => $seo_model ]);
    }
}