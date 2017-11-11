<?php
namespace console\controllers;


use yii\console\Controller;
use common\models\Comment;
class SmsController extends Controller
{
	public function actionSend()
	{
		$newCommentCount = Comment::find()->where(['remind'=>0,'status'=>1])->count();
		if($newCommentCount>0)
		{
			$content='有'.$newCommentCount.'条新评论等待审核';
			if ($result['status']=='success')
			{
				Comment::updateAll(['remind'=>1]);
				echo '['.date("Y-m-d H:i:s",$result['dt']).']'.$content.'['.$result['length'].']';
			}
			return 0;
		}
	}
	
	protected  function vendorSmsService($content)
	{
		
	}
}