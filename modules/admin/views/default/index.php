<?php
use yii\helpers\Html;

?>
<div class="admin-default-index">
    <h1>Admin page</h1>
    
          
        <p>
            <?= Html::a('Buisness', ['/buisness/',], ['class' => 'btn btn-success']) ?>
        </p>
        
        <p>
            <?= Html::a('Industry', ['/admin/industry/',], ['class' => 'btn btn-success']) ?>
        </p>
        <p>
            <?= Html::a('Service', ['/admin/service/',], ['class' => 'btn btn-success']) ?>
        </p>
        <hr/>
            <h3>System</h3>
            <p>
                <?= Html::a('City', ['/admin/city/',], ['class' => 'btn btn-success']) ?>
            </p>
        <hr/>
            <h3>Seo</h3>
            <p>
                <?= Html::a('Seo Pattern', ['/admin/seopattern/',], ['class' => 'btn btn-success']) ?>
            </p>
        <hr/>
        <p>
            <?= Html::a('Quote', ['/admin/quote/',], ['class' => 'btn btn-success']) ?>
        </p>
</div>
