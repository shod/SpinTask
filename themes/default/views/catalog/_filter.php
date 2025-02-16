<?php

//dd($tools);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function loadCity(select) {
        // послыаем AJAX запрос, который вернёт список городов для выбранной области
        $.getJSON('<?= yii\helpers\Url::to(['/us/catalog/city/',]); ?>', {
            region_id: select.value
        }, function(cityList) {
            var citySelect = $('select[name="city_id"]');
            citySelect.html('');
            citySelect.niceSelect('destroy');
            citySelect.append('<option value="">' + '<?= Yii::t('region', 'Select city') ?>' + '</option>');
            // заполняем список городов новыми пришедшими данными
            $.each(cityList, function(i) {
                citySelect.append('<option value="' + i + '">' + this + '</option>');
            });
            citySelect.attr('disabled', false);
            citySelect.niceSelect();
        });
    }
</script>
<div class="filter-form">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h3 class="widget-title">filter</h3>
        </div>
    </div>
    <form class="row" action="<?= yii\helpers\Url::to(['/us/catalog/index/',]) ?>">
        <input type="hidden" name="industry_id" value="<?= Yii::$app->request->get('industry_id', 3); ?>" />
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <select class="wide" name="region_id" onchange="loadCity(this)">
                    <option value="0"><?= Yii::t('region', 'Region') ?></option>
                    <?php foreach ($regions as $reg): ?>
                        <option value="<?= $reg->id ?>" <?= (isset($_GET['region_id']) && $reg->id == $_GET['region_id']) ? 'selected' : ''; ?>><?= Yii::t('region', $reg->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <select class="wide" name="city_id" <?= (!count($city)) ? 'disabled' : ''; ?>>
                    <option value=""><?= Yii::t('region', 'City') ?></option>
                    <?php foreach ($city as $ct): ?>
                        <option value="<?= $ct->id ?>" <?= (isset($_GET['city_id']) && $ct->id == $_GET['city_id']) ? 'selected' : ''; ?>><?= Yii::t('region', $ct->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <select class="wide" name="service_id" id="service" onchange="filter_reload('service');">
                    <option data-dispalay=''><?= Yii::t('region', 'List Of Services') ?></option>
                    <?php foreach ($service as $srv): ?>
                        <option value="<?= $srv->id ?>" <?= (isset($_GET['service_id']) && $srv->id == $_GET['service_id']) ? 'selected' : ''; ?>><?= Yii::t('service', $srv->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <?php if (isset($tools) && count($tools)): ?>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <select class="wide" name="service_property_value_id" onchange="filter_reload('work');">
						
                        <?php foreach ($tools as $name => $groups): ?>
							<?php if ($name == ''): ?>
								<option data-dispalay="" value="0">Types Of Work</option>
							
							<?php else: ?>
                            <option value='' disabled ><?= strtoupper(Yii::t('region', $name)) ?></option>
                                <?php foreach ($groups as $srv): ?>
                                    <option value="<?= $srv['id'] ?>" <?= (isset($_GET['service_property_value_id']) && $srv['id'] == $_GET['service_property_value_id']) ? 'selected' : ''; ?>>&nbsp;&nbsp;&nbsp;<?= Yii::t('service', $srv['name']) ?></option>
                                <?php endforeach; ?>                            
							<?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>

            <!-- /.price -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <button class="btn btn-default btn-block" type="submit">Find business</button>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {


    });

    function filter_reload(filter_type = 'default') {
		
		
		console.log(filter_type);
		if(filter_type == 'service'){
			let select = document.querySelector("select[name='service_property_value_id']");
			if (select) {
				select.remove(); // Remove from the DOM before submission
			}
		}		
		
		var form = $('form');        
        form.submit();
    };
</script>