<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use app\models\Books;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [   
            'attribute' => 'id',
                'value' => 'books.title'
            ],
            [   
            'attribute' => 'id',
                'value' => 'user.username'
            ],
            'rent_date',
            'prev_date',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
