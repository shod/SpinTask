<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
//$this->title = 'Main page';

?>
<script>
    function loadCity(select)
    {
        
        // послыаем AJAX запрос, который вернёт список городов для выбранной области
        $.getJSON('<?= yii\helpers\Url::to(['/site/city/',]); ?>', {region_id:select.value}, function(cityList){
            var citySelect = $('select[name="city_id"]');
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
            <?php foreach($industry as $data): ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                    <div class="real-wedding-block  text-center">
                                <!-- real wedding block -->
                        <div class="real-wedding-img">
                                    <!-- real wedding img -->
                                    <a href="<?= Url::to(['site/catalog', 'industry_id' => (string)$data->id]); ?>"><img src="img/industry/<?= $data->image; ?>" alt="<?= $data->name; ?>" class="img-fluid"></a>
                        </div>
                                <!-- /.real wedding img -->
                        <div class="real-wedding-content">
                            <!-- real wedding content -->
                            <h3 class="real-wedding-title"><a href="<?= Url::to(['site/catalog', 'industry_id' => $data->id]); ?>" class="title"><?= $data->name; ?></a></h3>
                        
                        </div>
                                <!-- /.real wedding img -->
                    </div>
                            <!-- /.real wedding block -->
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
