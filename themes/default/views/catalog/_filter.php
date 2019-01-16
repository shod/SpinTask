<?php 

//dd($model);

?>
<script>
       
    function loadCity(select)
    {
        // послыаем AJAX запрос, который вернёт список городов для выбранной области
        $.getJSON('<?= yii\helpers\Url::to(['/catalog/city/',]); ?>', {region_id:select.value}, function(cityList){
            var citySelect = $('select[name="city_id"]');
            citySelect.html('');
            citySelect.niceSelect('destroy');
            citySelect.append('<option value="">' + '<?= Yii::t('region', 'select city') ?>' + '</option>');
            // заполняем список городов новыми пришедшими данными
            $.each(cityList, function(i){
                citySelect.append('<option value="' + i + '">' + this + '</option>');
            });
            citySelect.attr('disabled', false);
            citySelect.niceSelect();
        });
    }
</script>
<div class="filter-form">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form class="row" action="<?= yii\helpers\Url::to(['/catalog/index/',]) ?>">
                    <input type="hidden" name="industry_id" value="<?= Yii::$app->request->get('industry_id');?>"/>
                    <!-- venue-type -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide" name="region_id"  onchange="loadCity(this)" >
                            <option  ><?= Yii::t('region', 'select state') ?></option>
                            <?php foreach ($regions as $reg): ?>
                                <option value="<?= $reg->id ?>" <?= (isset($_GET['region_id']) && $reg->id == $_GET['region_id']) ? 'selected' : ''; ?> ><?= Yii::t('region', $reg->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- /.venue-type -->
                    <!-- distance km -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide" name="city_id" <?= (!count($city))?'disabled': ''; ?> >
                            <option  value="" ><?= Yii::t('region', 'select city') ?></option>
                            <?php foreach ($city as $ct): ?>
                                <option value="<?= $ct->id ?>" <?= (isset($_GET['city_id']) && $ct->id == $_GET['city_id']) ? 'selected' : ''; ?> ><?= Yii::t('region', $ct->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- /.distance km -->
                    <!-- price -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide" name="service_id">
                        <option value = '' ><?= Yii::t('region', 'select service') ?></option>
                            <?php foreach ($service as $srv): ?>
                                <option value="<?= $srv->id ?>" <?= (isset($_GET['service_id']) && $srv->id == $_GET['service_id']) ? 'selected' : ''; ?> ><?= Yii::t('service', $srv->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- /.price -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 ">
                        <button class="btn btn-default btn-block" type="submit">Find buisness</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>