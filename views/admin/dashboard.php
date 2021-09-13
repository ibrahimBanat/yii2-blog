<?php

/** @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider;
 */

use yii\helpers\Html;
use \yii\widgets\ListView;
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="dashboard">
    <h1><?= Html::encode($this->title) ?></h1>
    <?=
        ListView::widget([
                'dataProvider' =>$dataProvider,
                'itemView' => 'article_item'
        ])
    ?>
?>
</div>
