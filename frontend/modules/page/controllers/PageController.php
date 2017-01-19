<?
namespace frontend\modules\page\controllers;

class PageController extends \frontend\components\FrontendController
{
	public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['?','@'],
                    ],
                    [
                        'allow' => false,
                    ],
                ],
            ],
        ];
    }
}