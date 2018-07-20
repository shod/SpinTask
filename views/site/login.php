<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\LoginForm $model
 */
$this->title = 'Login';
?>



<div class="ks-page">
    <div class="ks-page-header">
        <a href="/" class="ks-logo"><?= Yii::$app->name ?></a>
    </div>
    <div class="ks-page-content">
        <!--div class="ks-logo"><?= Yii::$app->name ?></div-->

        <div class="card panel panel-default ks-light ks-panel ks-login">
            <div class="card-block">
                <?php
                    if (Yii::$app->getSession()->hasFlash('error')) {
                        echo '<div class="alert alert-danger">'.Yii::$app->getSession()->getFlash('error').'</div>';
                    }
                ?>
                <?php $form = ActiveForm::begin(array('options' => array('class' => 'form-container', 'id' => 'login-form'))); ?>
                    <h4 class="ks-header">Login</h4>
                    <div class="form-group">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <?= $form->field($model, 'username')->textInput(['class' => "form-control", 'placeholder' => 'username'])->label(false); ?>
                            <span class="icon-addon">
                                <span class="la la-at"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <?= $form->field($model, 'password')->passwordInput(['class' => "form-control", 'placeholder' => 'Password'])->label(false); ?>
                            <span class="icon-addon">
                                <span class="la la-key"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <?= $form->field($model, 'rememberMe')->checkbox()->label(false); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?php echo Html::submitButton('Login', array('class' => 'btn btn-primary btn-block')); ?>
                    </div>
                 
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="ks-footer">
        <span class="ks-copyright">&copy; <?= Yii::$app->name ?></span>
    </div>
</div>







<!--

<?php $form = ActiveForm::begin(array('options' => array('class' => 'form-horizontal', 'id' => 'login-form'))); ?>
	<?php echo $form->field($model, 'username')->textInput(); ?>
	<?php echo $form->field($model, 'password')->passwordInput(); ?>
	<?php echo $form->field($model, 'rememberMe')->checkbox(); ?>
	<div class="form-actions">
		<?php echo Html::submitButton('Login', array('class' => 'btn btn-primary')); ?>
	</div>
<?php ActiveForm::end(); ?>


-->