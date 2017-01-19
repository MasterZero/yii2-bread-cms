<?
namespace backend\modules\seo\controllers;
use yii\filters\AccessControl;

class SeoController extends \common\components\DefaultController/*\yii\web\Controller*/
{
	public $defaultAction = 'seo';


	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        //'actions' => ['login', 'error'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        //'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


	public function actionSeo($module = null, $controller = null, $model_pk = null)
	{
		$modelName = self::modelName();

		$model = $modelName::findOne( [
			'module' => $module,
			'controller' => $controller,
			'model_pk' =>$model_pk] );

		if(!$model)
			$model = new $modelName;

        if ($model->load(\Yii::$app->request->post()))
        {
        	$model->module = $module;
        	$model->controller = $controller;
        	$model->model_pk = $model_pk;
        	
        	$model->save();
			return $this->redirect(\Yii::$app->request->referrer);
        }

        return $this->render('update', [
            'model' => $model]);
	}


	public function actionDelete($id)
	{
		$modelName = self::modelName();


		$model = $modelName::findOne($id);
        
        if($model)
        	$model->delete();

        return $this->redirect(\Yii::$app->request->referrer);
	}


}