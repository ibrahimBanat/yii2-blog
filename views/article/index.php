<?php

use yii\helpers\Html;
use yii\grid\GridView;
/** @var  $this yii\web\View */
/** @var  $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="article-index">
    <h1><?= Html::encode($this->title)?></h1>
    <?php if (!Yii::$app->user->isGuest && \Yii::$app->user->can('createPost')) : ?>
        <p>
            <?= Html::a('Create Article', ['create'], ['class' => 'btn-btn success']) ?>
        </p>
    <?php endif; ?>

    <?=
    \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_article_item'
    ])

    ?>
</div>
