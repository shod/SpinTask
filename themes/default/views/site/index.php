<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Main page';

?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        <?= Yii::t('app', 'This is the view content for action')?> "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p><b>themes/MAIN</b></p>
    <p>
        You may customize this page by editing the following file:<br>
        <p>
            <?= Html::a('Admin', ['/admin/',], ['class' => 'btn btn-success']) ?>
        </p>
        <p>
            <?= Html::a('Catalog', ['/site/catalog/',], ['class' => 'btn btn-success']) ?>
        </p>
    </p>
</div>
