<?php

/* @var $this yii\web\View */

$this->title = 'Buisness page';


$this->params['breadcrumbs'][] = ['label' => 'buisness list', 'url' => ['/site/catalog']];
$this->params['breadcrumbs'][] = $model->name;
?>

<div class="ks-page-content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <div class="card ks-crm-contact-user-column">
                    <div class="ks-crm-contact-user-column-main-info">
                        <section>
                            <img src="<?= \app\models_ex\Company::getImageUrl() . $model->image; ?>" width="100" height="100" class="ks-crm-contact-user-avatar rounded-circle">
                        </section>
                        <section>
                            <div class="ks-crm-contact-user-name"><?= $model->name; ?></div>
                            <div class="ks-crm-contact-user-location">New York, USA</div>
                            <div class="ks-crm-contact-user-rating">
                                <i class="la la-star ks-star" aria-hidden="true"></i>
                                <i class="la la-star ks-star" aria-hidden="true"></i>
                                <i class="la la-star ks-star" aria-hidden="true"></i>
                                <i class="la la-star ks-star" aria-hidden="true"></i>
                                <i class="la la-star-half-o ks-star" aria-hidden="true"></i>
                            </div>
                        </section>
                    </div>
                    <div class="ks-crm-contact-user-column-main-info">
                        <section>
                            <button class="btn btn-success ks-rounded">Send request</button>
                        </section>
                    </div>
                    <div class="ks-crm-contact-user-column-custom-info">
                        <h6 class="ks-custom-info-header">Contact Information</h6>
                        <div class="ks-custom-info-item">
                            <div class="ks-custom-info-item-name">Email</div>
                            <div class="ks-custom-info-item-content">skarlett.78@gmail.com</div>
                        </div>
                        <div class="ks-custom-info-item">
                            <div class="ks-custom-info-item-name">Phone Number</div>
                            <div class="ks-custom-info-item-content">657-662-0825</div>
                        </div>
                        <div class="ks-custom-info-item">
                            <div class="ks-custom-info-item-name">Address</div>
                            <div class="ks-custom-info-item-content">1135 Reynolds Passage</div>
                        </div>
                    </div>
                    <div class="ks-crm-contact-user-column-custom-info">
                        <h6 class="ks-custom-info-header">Custom Information</h6>
                        <div class="ks-custom-info-item">
                            <div class="ks-custom-info-item-name">Facebook</div>
                            <div class="ks-custom-info-item-content"><a href="#">@skarlett.78</a></div>
                        </div>
                        <div class="ks-custom-info-item">
                            <div class="ks-custom-info-item-name">Personal Phone Number</div>
                            <div class="ks-custom-info-item-content">480-947-8193</div>
                        </div>
                    </div>
                    <div class="ks-crm-contact-user-column-custom-info">
                        <h6 class="ks-custom-info-header">Tags</h6>
                        <div class="ks-custom-info-item">
                            <span class="badge badge-default-outline">Tag 1</span>
                            <span class="badge badge-default-outline">Tag 2</span>
                        </div>
                    </div>
                    <div class="ks-crm-contact-user-column-custom-info">
                        <h6 class="ks-custom-info-header">Owner</h6>
                        <div class="ks-custom-info-item ks-user">
                            <img src="assets/img/avatars/avatar-9.jpg" class="ks-custom-info-item-user-avatar" width="25" height="25">
                            <div class="ks-custom-info-item-user-name">Joyce Henry</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="ks-crm-contact-user-tabs-column">
                    <div class="ks-tabs-container ks-tabs-default ks-tabs-no-separator">
                        <ul class="nav ks-nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-toggle="tab" data-target="#crm-tab-activity" aria-expanded="true">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-notes" aria-expanded="false">Notes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-events" aria-expanded="false">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-tasks" aria-expanded="false">Tasks</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-deals" aria-expanded="false">Deals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-campaigns" aria-expanded="false">Campaigns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="tab" data-target="#crm-tab-documents" aria-expanded="false">Documents</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane ks-scrollable active jspScrollable" id="crm-tab-activity" role="tabpanel" aria-expanded="true" data-height="735" style="height: 775px; overflow: hidden; padding: 0px; width: 847px;" tabindex="0">

                            <div class="jspContainer" style="width: 847px; height: 700px;">
                                <div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 837px;">
                                    <div class="ks-crm-user-view-activity-block">
                                        <?php foreach ($companyService as $cService) : ?>
                                            <h4 class="ks-crm-user-view-activity-header"><?= $cService->service->name; ?></h4>
                                            <div class="ks-crm-user-view-activity-item-action-description">
                                                <?= $cService->description; ?>
                                            </div>
                                            <div class="ks-crm-user-view-activity-items">
                                                <?php foreach ($cService->companyServiceValues as $serviceValues) : ?>
                                                    <div class="ks-crm-user-view-activity-item">
                                                        <div class="ks-crm-user-view-activity-item-badge">
                                                            <span class="badge ks-circle badge-info"></span>
                                                        </div>
                                                        <div class="ks-crm-user-view-activity-item-date">
                                                            <?= $serviceValues->servicePropertyValue->value; ?>
                                                            <?= $serviceValues->servicePropertyValue->serviceProperty->measure; ?>
                                                        </div>
                                                        <div class="ks-crm-user-view-activity-item-action">
                                                            <div class="ks-crm-user-view-activity-item-action-name">
                                                                <span class="ks-icon la la-check-circle-o"></span>
                                                                <span class="ks-text">Task added</span>
                                                            </div>
                                                            <div class="ks-crm-user-view-activity-item-action-description">
                                                                Prepare for a bi-weekly meeting to discuss new features
                                                            </div>
                                                            <div class="ks-crm-user-view-activity-item-action-time">12:22 PM</div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="jspVerticalBar"><div class="jspCap jspCapTop"></div><div class="jspTrack" style="height: 775px;"><div class="jspDrag" style="height: 679px;"><div class="jspDragTop"></div><div class="jspDragBottom"></div></div></div><div class="jspCap jspCapBottom"></div></div></div></div>
                            <div class="tab-pane" id="crm-tab-notes" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px;">
                                Content 2
                            </div>
                            <div class="tab-pane" id="crm-tab-events" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px;">
                                Content 3
                            </div>
                            <div class="tab-pane" id="crm-tab-tasks" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px;">
                                Content 3
                            </div>
                            <div class="tab-pane" id="crm-tab-deals" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px;">
                                Content 3
                            </div>
                            <div class="tab-pane" id="crm-tab-campaigns" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px;">
                                Content 3
                            </div>
                            <div class="tab-pane" id="crm-tab-documents" role="tabpanel" aria-expanded="false" data-height="735" style="height: 775px;">
                                Content 3
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>