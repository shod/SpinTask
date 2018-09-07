
<?php 

//dd($model);

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
<div class="filter-form">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form class="row" action="<?= yii\helpers\Url::to(['/site/catalog/',]) ?>">
                    <!-- venue-type -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide" name="region"  onchange="loadCity(this)" >
                            <option  disabled ><?= Yii::t('region', 'select state') ?></option>
                            <?php foreach ($regions as $reg): ?>
                                <option value="<?= $reg->id ?>" <?= (isset($_GET['region']) && $reg->id == $_GET['region']) ? 'selected' : ''; ?> ><?= Yii::t('region', $reg->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- /.venue-type -->
                    <!-- distance km -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide" name="city">
                            <?php foreach ($city as $ct): ?>
                                <option value="<?= $ct->id ?>" <?= (isset($_GET['city']) && $ct->id == $_GET['city']) ? 'selected' : ''; ?> ><?= Yii::t('region', $ct->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- /.distance km -->
                    <!-- price -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide" name="service">
                            <?php foreach ($service as $srv): ?>
                                <option value="<?= $srv->id ?>" <?= (isset($_GET['service']) && $srv->id == $_GET['service']) ? 'selected' : ''; ?> ><?= Yii::t('service', $srv->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- /.price -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 ">
                        <button class="btn btn-default btn-block" type="submit">Find Venue</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-3 col-sm-12 col-12 mt-1">
                        <a class="btn-primary-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"> Advance Option </a>
                        <div class="collapse" id="collapseExample">
                            <div class="aminities">
                                <div class="row">
                                    <!-- checkbox -->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1"> Groom Lounge</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2"> Bridal Suite</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Table and chairs</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                            <label class="custom-control-label" for="customCheck4"> Get Ready Rooms</label>
                                        </div>
                                    </div>
                                    <!-- /.checkbox -->
                                    <!-- checkbox -->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                            <label class="custom-control-label" for="customCheck5">Event Rentals</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                                            <label class="custom-control-label" for="customCheck6">Outside Vendors</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                                            <label class="custom-control-label" for="customCheck7"> Bar Services</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck8">
                                            <label class="custom-control-label" for="customCheck8"> Catering Services</label>
                                        </div>
                                    </div>
                                    <!-- /.checkbox -->
                                    <!-- checkbox -->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck9">
                                            <label class="custom-control-label" for="customCheck9"> Clean Up</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck10">
                                            <label class="custom-control-label" for="customCheck10">Event Planner</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck11">
                                            <label class="custom-control-label" for="customCheck11">Wifi</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck12">
                                            <label class="custom-control-label" for="customCheck12">Pet Friendly</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck13">
                                            <label class="custom-control-label" for="customCheck13">Accommodations</label>
                                        </div>
                                    </div>
                                    <!-- /.checkbox -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>