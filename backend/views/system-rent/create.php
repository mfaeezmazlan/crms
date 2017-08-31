<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SystemRent */

$this->title = Yii::t('app', 'Create System Rent');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'System Rents'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <div class="system-rent-create">

            <?=
            $this->render('_form', [
                'model' => $model,
            ])
            ?>

        </div>

    </div><!-- /.col -->
</div><!-- /.row -->