<?php
use yii\helpers\Html;

?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <p>
            <?= Html::a('Industry', ['/admin/industry/',], ['class' => 'btn btn-success']) ?>
        </p>
        <p>
            <?= Html::a('Service', ['/admin/service/',], ['class' => 'btn btn-success']) ?>
        </p>
        
        <p>
            <?= Html::a('Buisness', ['/buisness/',], ['class' => 'btn btn-success']) ?>
        </p>
        
        <p>
            <?= Html::a('Seo Pattern', ['/admin/seopattern/',], ['class' => 'btn btn-success']) ?>
        </p>
    </p>
</div>
