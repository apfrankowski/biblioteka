<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'author',
            'isbn',
            'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn', 
            'buttons' => [
                'rent' => function ($url, $searchModel) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-export"></span>',
                        ['rents/create', 'book_id' => $searchModel->id], 
                        [
                            'title' => 'Wypożycz',
                            'data-pjax' => '0',
                        ]
                    );
                },
                'revert' => function ($url, $searchModel) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-import"></span>',
                        ['rents/close', 'book_id' => $searchModel->id], 
                        [
                            'title' => 'Zwróć',
                            'data-pjax' => '0',
                        ]
                    );
                }
            ],
            'template' => '{view} {rent} {revert}'],
        ],
    ]); ?>

</div>
