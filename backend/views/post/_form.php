<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use yii\helpers\ArrayHelper;
use common\models\Adminuser;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>
    <?php $psObjs = Poststatus::find()->all();
      $allStatus = ArrayHelper::map($psObjs,'id','name');
    ?>

    <?= $form->field($model, 'status')->dropDownList($allStatus,['prompt'=>'请选择状态']); ?>

  <?php $auObj = Adminuser::find()->all();
      $allAuth = ArrayHelper::map($auObj,'id','nickname'); ?>
 

    <?= $form->field($model, 'author_id')->dropDownList($allAuth,['prompt'=>'请选择状态']);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
