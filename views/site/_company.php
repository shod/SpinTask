<?php 

//dd($model);

?>


<div class="card panel panel-default ks-project">
    <div class="ks-project-body">
        <a href="<?= yii\helpers\Url::to(['site/buisness', 'id' => $model->id])?>" class="ks-name">
            <?php if($model->image): ?>
                <img src="<?= \app\models_ex\Company::getImageUrl() . $model->image; ?>" width="55" height="55" class="ks-image">
            <?php endif; ?>
            <span class="ks-text"><?= $model->name; ?></span>
        </a>
        <div class="ks-description">
            Google is an American multinational technology company specializing in Internet-related services and products that include online advertising technologie…
        </div>
    </div>
</div>