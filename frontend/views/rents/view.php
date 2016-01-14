<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rents */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Powrót', ['book/index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'books.title',
            'user.username',
            'rent_date',
            'prev_date',
            'status',
        ],
    ]) ?>

</div>
