<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Books;

/* @var $this yii\web\View */
/* @var $model app\models\Rents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'book_id')->dropdownList(
        Books::find()->select(['title', 'id'])->indexBy('id')->column()
    ); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
