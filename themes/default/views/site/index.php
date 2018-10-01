<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
//$this->title = 'Main page';

?>
<script>
    function loadCity(select)
    {
        
        // послыаем AJAX запрос, который вернёт список городов для выбранной области
        $.getJSON('<?= yii\helpers\Url::to(['/site/city/',]); ?>', {region_id:select.value}, function(cityList){
            var citySelect = $('select[name="city"]');
            citySelect.html('');
            citySelect.niceSelect('destroy');

            // заполняем список городов новыми пришедшими данными
            $.each(cityList, function(i){
                citySelect.append('<option value="' + i + '">' + this + '</option>');
            });
            citySelect.niceSelect();
        });
    }
</script>

<div class="hero-section">
     <div class="container">
         <div class="row">
             <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 col-md-12 col-sm-12 col-12">
                 <!-- search-block -->
                 <div class="search-block">
                     <div class="text-center search-head">
                         <h1 class="search-head-title">Find Local Service</h1>
                         <p class="d-none d-xl-block d-lg-block d-sm-block">Browse the best wedding vendors in your area — from venues and photographers, to wedding planners, caterers, florists and more.</p>
                     </div>
                     <!-- /.search-block -->
                     <!-- search-form -->
                     <div class="search-form">
                         <form class="" action="<?= yii\helpers\Url::to(['site/catalog',]) ?>">
                             <div class="row">
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                     <!-- select -->
                                    <select class="wide" name="region"  onchange="loadCity(this)" >
                                        <option  disabled selected><?= Yii::t('region', 'select state') ?></option>
                                        <?php foreach ($regions as $reg): ?>
                                            <option value="<?= $reg->id ?>"><?= Yii::t('region', $reg->name) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                 </div>
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                     <!-- select -->
                                     <select class="wide" name="city">
                                         <?php //foreach ($city as $cit): ?>
                                        <?php //endforeach; ?>
                                     </select>
                                 </div>
                                 <!-- button -->
                                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                     <button class="btn btn-default btn-block" type="submit">Find Service</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                     <!-- /.search-form -->
                 </div>
             </div>
         </div>
     </div>
 </div>
