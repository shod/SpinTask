
<?php 

//dd($model);

?>

<div class="filter-form">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <form class="row">
                    <!-- venue-type -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide">
                            <option value="Venue Type">Venue Type</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Restaurant">Restaurant</option>
                            <option value="Castle">Castle</option>
                            <option value="Barns">Barns</option>
                            <option value="Resort">Resort</option>
                            <option value="Church">Church</option>
                            <option value="In Door">In Door</option>
                        </select>
                    </div>
                    <!-- /.venue-type -->
                    <!-- distance km -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide">
                            <option value="Guest">Guest</option>
                            <option value="1 - 100">1 - 100</option>
                            <option value="1 - 200">100 - 200</option>
                            <option value="1 - 500">200 - 500</option>
                            <option value="1 - 1000">500 - 1000</option>
                        </select>
                    </div>
                    <!-- /.distance km -->
                    <!-- price -->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                        <select class="wide">
                            <option value="Price">Price</option>
                            <option value="$100 tp $500">$100 to $500</option>
                            <option value="$500 tp $2000">$500 to $2000</option>
                            <option value="$2000 tp $3500">$2000 to $3500</option>
                            <option value="$3500 tp $4500">$3500 to $4500</option>
                            <option value="$4500 tp $5500">$4500 to $5500</option>
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