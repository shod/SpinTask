<?php

/* @var $this yii\web\View */

$this->title = 'Main page';

?>
<div class="ks-dashboard-tabbed-sidebar-widgets">
    <div class="row">
    <div class="col-lg-4">
        <div class="card ks-card-widget ks-widget-payment-card-rate-details">
            <h5 class="card-header">
                Card Rate Details

                <div class="dropdown ks-control">
                    <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-icon la la-ellipsis-h"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Add Card</a>
                        <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
            </h5>
            <div class="card-block">
                <div class="ks-card-widget-datetime">
                    These rates are for the 24-hour period ending <span class="ks-text-bold">Wednesday, Feb 8, 2017</span>
                    23:00 WAT
                </div>

                <table class="table ks-payment-card-rate-details-table">
                    <tbody><tr>
                        <td class="ks-currency">
                            <img src="assets/img/flags/24/United-States.png" class="ks-flag">
                            US Dollar
                        </td>
                        <td class="ks-amount">320.00</td>
                    </tr>
                    <tr>
                        <td class="ks-currency">
                            <img src="assets/img/flags/24/United-Kingdom.png" class="ks-flag">
                            Pounds Sterling
                        </td>
                        <td class="ks-amount">407.59</td>
                    </tr>
                    <tr>
                        <td class="ks-currency">
                            <img src="assets/img/flags/24/European-Union.png" class="ks-flag">
                            Euro
                        </td>
                        <td class="ks-amount">347.83</td>
                    </tr>
                    <tr>
                        <td class="ks-currency">
                            <img src="assets/img/flags/24/Canada.png" class="ks-flag">
                            Canadian Dollar
                        </td>
                        <td class="ks-amount">248.39</td>
                    </tr>
                    <tr>
                        <td class="ks-currency">
                            <img src="assets/img/flags/24/United-Arab-Emirates.png" class="ks-flag">
                            U.A.E. Dirham
                        </td>
                        <td class="ks-amount">88.91</td>
                    </tr>
                </tbody></table>
            </div>
        </div>
        <div class="card ks-card-widget ks-widget-payment-budget">
            <a href="#" class="ks-thumbnail">
                <img src="assets/img/widgets/cover.png" class="embed-responsive">
            </a>
            <a class="card-header">Magazine Images</a>
            <div class="ks-card-widget-datetime">Last update <span class="ks-text-bold">Apr 17, 2017</span></div>
            <div class="card-block">
                <div class="ks-payment-budget-amount-block">
                    <div class="ks-text-action">$44.99</div>
                    <div class="ks-description">Budget</div>
                </div>
                <div class="ks-payment-budget-remaining-block">
                    <div class="ks-text-action">Early Apr 2017</div>
                    <div class="ks-description ks-color-purple">10 days Remaining</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card ks-card-widget ks-widget-payment-earnings">
            <h5 class="card-header">
                Next Payout

                <div class="dropdown ks-control">
                    <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-icon la la-ellipsis-h"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Add Card</a>
                        <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
            </h5>
            <div class="card-block">
                <div class="ks-card-widget-datetime">
                    Activity from <span class="ks-text-bold">Jan 4, 2017</span> to <span class="ks-text-bold">Jan 10, 2017</span>
                </div>

                <div class="ks-payment-earnings-amount">$2.37</div>
                <div class="ks-payment-earnings-amount-description">
                    You’ve made $230 today
                </div>

                <div id="ks-next-payout-chart" class="ks-payment-earnings-chart c3" style="max-height: 155px; position: relative;"><svg width="517.65625" height="155" style="overflow: hidden;"><defs><clipPath id="c3-1523433151652-clip"><rect width="514.65625" height="143"></rect></clipPath><clipPath id="c3-1523433151652-clip-xaxis"><rect x="-31" y="-20" width="576.65625" height="28"></rect></clipPath><clipPath id="c3-1523433151652-clip-yaxis"><rect x="-29" y="-4" width="21" height="167"></rect></clipPath><clipPath id="c3-1523433151652-clip-grid"><rect width="514.65625" height="143"></rect></clipPath><clipPath id="c3-1523433151652-clip-subchart"><rect width="514.65625"></rect></clipPath></defs><g transform="translate(1.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="257.328125" y="71.5" style="opacity: 0;"></text><rect class="c3-zoom-rect" width="514.65625" height="143" style="opacity: 0;"></rect><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip)" class="c3-regions" style="visibility: visible;"></g><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip-grid)" class="c3-grid" style="visibility: visible;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="143" style="visibility: hidden;"></line></g></g><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip)" class="c3-chart"><g class="c3-event-rects c3-event-rects-single" style="fill-opacity: 0;"><rect class=" c3-event-rect c3-event-rect-0" x="-30.761160714285715" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-1" x="53.238839285714285" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-2" x="137.23883928571428" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-3" x="221.23883928571428" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-4" x="305.2388392857143" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-5" x="389.2388392857143" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-6" x="473.2388392857143" y="0" width="73.52232142857143" height="143"></rect></g><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data1 c3-bars c3-bars-data1" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data1 c3-lines c3-lines-data1"><path class=" c3-shape c3-shape c3-line c3-line-data1" d="M6,46.18181818181819L90,62.31818181818183L174,46.18181818181819L258,62.31818181818183L342,30.045454545454554L426,13.909090909090912L510,30.045454545454554" style="stroke: rgb(129, 193, 89); opacity: 1;"></path></g><g class=" c3-shapes c3-shapes-data1 c3-areas c3-areas-data1"><path class=" c3-shape c3-shape c3-area c3-area-data1" d="M6,46.18181818181819L90,62.31818181818183L174,46.18181818181819L258,62.31818181818183L342,30.045454545454554L426,13.909090909090912L510,30.045454545454554L510,143L426,143L342,143L258,143L174,143L90,143L6,143Z" style="fill: rgb(129, 193, 89); opacity: 0.2;"></path></g><g class=" c3-selected-circles c3-selected-circles-data1"></g><g class=" c3-shapes c3-shapes-data1 c3-circles c3-circles-data1" style="cursor: pointer;"><circle class=" c3-shape c3-shape-0 c3-circle c3-circle-0" r="2.5" style="fill: rgb(129, 193, 89); opacity: 0;" cx="6" cy="46.18181818181819"></circle><circle class="c3-shape c3-shape-1 c3-circle c3-circle-1" r="2.5" style="fill: rgb(129, 193, 89); opacity: 0;" cx="90" cy="62.31818181818183"></circle><circle class="c3-shape c3-shape-2 c3-circle c3-circle-2" r="2.5" style="fill: rgb(129, 193, 89); opacity: 0;" cx="174" cy="46.18181818181819"></circle><circle class="c3-shape c3-shape-3 c3-circle c3-circle-3" r="2.5" style="fill: rgb(129, 193, 89); opacity: 0;" cx="258" cy="62.31818181818183"></circle><circle class=" c3-shape c3-shape-4 c3-circle c3-circle-4" r="2.5" style="fill: rgb(129, 193, 89); opacity: 0;" cx="342" cy="30.045454545454554"></circle><circle class=" c3-shape c3-shape-5 c3-circle c3-circle-5" r="2.5" style="fill: rgb(129, 193, 89); opacity: 0;" cx="426" cy="13.909090909090912"></circle><circle class=" c3-shape c3-shape-6 c3-circle c3-circle-6" r="2.5" style="fill: rgb(129, 193, 89); opacity: 0;" cx="510" cy="30.045454545454554"></circle></g></g></g><g class="c3-chart-arcs" transform="translate(257.328125,66.5)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 0;"></text></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-data1"></g></g></g></g><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip-xaxis)" transform="translate(0,143)" style="visibility: hidden; opacity: 1;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="514.65625" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(6, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><g class="tick" transform="translate(90, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">1</tspan></text></g><g class="tick" transform="translate(174, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2</tspan></text></g><g class="tick" transform="translate(258, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">3</tspan></text></g><g class="tick" transform="translate(342, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">4</tspan></text></g><g class="tick" transform="translate(426, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">5</tspan></text></g><g class="tick" transform="translate(510, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">6</tspan></text></g><path class="domain" d="M0,6V0H514.65625V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip-yaxis)" transform="translate(0,0)" style="visibility: hidden; opacity: 1;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,143)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,127)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">1</tspan></text></g><g class="tick" transform="translate(0,111)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">2</tspan></text></g><g class="tick" transform="translate(0,95)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">3</tspan></text></g><g class="tick" transform="translate(0,79)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">4</tspan></text></g><g class="tick" transform="translate(0,63)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">5</tspan></text></g><g class="tick" transform="translate(0,47)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">6</tspan></text></g><g class="tick" transform="translate(0,31)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">7</tspan></text></g><g class="tick" transform="translate(0,14)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">8</tspan></text></g><path class="domain" d="M-6,1H0V143H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(514.65625,0)" style="visibility: hidden; opacity: 1;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,143)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,129)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,115)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,101)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,87)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,72)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,58)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,44)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,30)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,16)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V143H6"></path></g></g><g transform="translate(1.5,155.5)" style="visibility: hidden;"><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip)" class="c3-brush" style="pointer-events: all; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="background" x="0" width="514.65625" style="visibility: hidden; cursor: crosshair;"></rect><rect class="extent" x="0" width="0" style="cursor: move;"></rect><g class="resize e" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g><g class="resize w" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151652-clip-xaxis)" style="visibility: hidden; opacity: 1;"><g class="tick" transform="translate(6, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><g class="tick" transform="translate(90, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">1</tspan></text></g><g class="tick" transform="translate(174, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2</tspan></text></g><g class="tick" transform="translate(258, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">3</tspan></text></g><g class="tick" transform="translate(342, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">4</tspan></text></g><g class="tick" transform="translate(426, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">5</tspan></text></g><g class="tick" transform="translate(510, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">6</tspan></text></g><path class="domain" d="M0,6V0H514.65625V6"></path></g></g><g transform="translate(0,155)" style="visibility: hidden;"></g><text class="c3-title" x="258.828125" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div></div>
            </div>
        </div>
        <div class="card ks-card-widget ks-widget-tasks-overview-progress">
            <h5 class="card-header">
                All Tasks Overview

                <div class="dropdown ks-control">
                    <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ks-icon la la-ellipsis-h"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Add Card</a>
                        <a class="dropdown-item" href="#">Delete</a>
                    </div>
                </div>
            </h5>
            <div class="card-block">
                <div class="ks-card-widget-datetime">
                    Next <span class="ks-text-bold">4 weeks</span>
                </div>
                <div class="ks-tasks-progress-items">
                    <div class="ks-tasks-progress-item">
                        <div class="ks-label">Week 3</div>
                        <div class="ks-progress">
                            <div class="progress ks-progress-xs">
                                <div class="progress-bar ks-task-progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-due-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-qa-bar" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-delegated-bar" role="progressbar" style="width: 40%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="ks-tasks-progress-item">
                        <div class="ks-label">Week 4</div>
                        <div class="ks-progress">
                            <div class="progress ks-progress-xs">
                                <div class="progress-bar ks-task-progress-bar" role="progressbar" style="width: 10%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-due-bar" role="progressbar" style="width: 40%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-qa-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-delegated-bar" role="progressbar" style="width: 30%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="ks-tasks-progress-item">
                        <div class="ks-label">Week 5</div>
                        <div class="ks-progress">
                            <div class="progress ks-progress-xs">
                                <div class="progress-bar ks-task-progress-bar" role="progressbar" style="width: 50%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-due-bar" role="progressbar" style="width: 10%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-qa-bar" role="progressbar" style="width: 30%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-delegated-bar" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="ks-tasks-progress-item">
                        <div class="ks-label">Week 6</div>
                        <div class="ks-progress">
                            <div class="progress ks-progress-xs">
                                <div class="progress-bar ks-task-progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-due-bar" role="progressbar" style="width: 10%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-qa-bar" role="progressbar" style="width: 50%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar ks-task-delegated-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="ks-tasks-progress-item-statuses">
                    <li class="ks-task-progress-bar-status">Progress</li>
                    <li class="ks-task-progress-due-status">Due</li>
                    <li class="ks-task-progress-qa-status">QA</li>
                    <li class="ks-task-progress-delegated-status">Delegated</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ks-card-widget ks-widget-payment-earnings">
                    <h5 class="card-header">
                        Total Earnings

                        <div class="dropdown ks-control">
                            <a class="btn btn-link ks-no-text ks-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="ks-icon la la-ellipsis-h"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="#">Edit</a>
                                <a class="dropdown-item" href="#">Add Card</a>
                                <a class="dropdown-item" href="#">Delete</a>
                            </div>
                        </div>
                    </h5>
                    <div class="card-block">
                        <div class="ks-card-widget-datetime">
                            In <span class="ks-text-bold">12 Months</span>
                        </div>

                        <div class="ks-payment-earnings-amount">$23.54</div>
                        <div class="ks-payment-earnings-amount-description">
                            Last month you’ve made $230
                        </div>

                        <div id="ks-total-earning-chart" class="ks-payment-earnings-chart c3" style="max-height: 155px; position: relative;"><svg width="517.65625" height="155" style="overflow: hidden;"><defs><clipPath id="c3-1523433151706-clip"><rect width="514.65625" height="143"></rect></clipPath><clipPath id="c3-1523433151706-clip-xaxis"><rect x="-31" y="-20" width="576.65625" height="28"></rect></clipPath><clipPath id="c3-1523433151706-clip-yaxis"><rect x="-29" y="-4" width="21" height="167"></rect></clipPath><clipPath id="c3-1523433151706-clip-grid"><rect width="514.65625" height="143"></rect></clipPath><clipPath id="c3-1523433151706-clip-subchart"><rect width="514.65625"></rect></clipPath></defs><g transform="translate(1.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="257.328125" y="71.5" style="opacity: 0;"></text><rect class="c3-zoom-rect" width="514.65625" height="143" style="opacity: 0;"></rect><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip)" class="c3-regions" style="visibility: visible;"></g><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip-grid)" class="c3-grid" style="visibility: visible;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="143" style="visibility: hidden;"></line></g></g><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip)" class="c3-chart"><g class="c3-event-rects c3-event-rects-single" style="fill-opacity: 0;"><rect class=" c3-event-rect c3-event-rect-0" x="-30.761160714285715" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-1" x="53.238839285714285" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-2" x="137.23883928571428" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-3" x="221.23883928571428" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-4" x="305.2388392857143" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-5" x="389.2388392857143" y="0" width="73.52232142857143" height="143"></rect><rect class=" c3-event-rect c3-event-rect-6" x="473.2388392857143" y="0" width="73.52232142857143" height="143"></rect></g><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data1 c3-bars c3-bars-data1" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data1 c3-lines c3-lines-data1"><path class=" c3-shape c3-shape c3-line c3-line-data1" d="M6,46.18181818181819L90,62.31818181818183L174,46.18181818181819L258,62.31818181818183L342,30.045454545454554L426,13.909090909090912L510,30.045454545454554" style="stroke: rgb(78, 84, 168); opacity: 1;"></path></g><g class=" c3-shapes c3-shapes-data1 c3-areas c3-areas-data1"><path class=" c3-shape c3-shape c3-area c3-area-data1" d="M6,46.18181818181819L90,62.31818181818183L174,46.18181818181819L258,62.31818181818183L342,30.045454545454554L426,13.909090909090912L510,30.045454545454554L510,143L426,143L342,143L258,143L174,143L90,143L6,143Z" style="fill: rgb(78, 84, 168); opacity: 0.2;"></path></g><g class=" c3-selected-circles c3-selected-circles-data1"></g><g class=" c3-shapes c3-shapes-data1 c3-circles c3-circles-data1" style="cursor: pointer;"><circle class=" c3-shape c3-shape-0 c3-circle c3-circle-0" r="2.5" style="fill: rgb(78, 84, 168); opacity: 0;" cx="6" cy="46.18181818181819"></circle><circle class=" c3-shape c3-shape-1 c3-circle c3-circle-1" r="2.5" style="fill: rgb(78, 84, 168); opacity: 0;" cx="90" cy="62.31818181818183"></circle><circle class=" c3-shape c3-shape-2 c3-circle c3-circle-2" r="2.5" style="fill: rgb(78, 84, 168); opacity: 0;" cx="174" cy="46.18181818181819"></circle><circle class=" c3-shape c3-shape-3 c3-circle c3-circle-3" r="2.5" style="fill: rgb(78, 84, 168); opacity: 0;" cx="258" cy="62.31818181818183"></circle><circle class=" c3-shape c3-shape-4 c3-circle c3-circle-4" r="2.5" style="fill: rgb(78, 84, 168); opacity: 0;" cx="342" cy="30.045454545454554"></circle><circle class=" c3-shape c3-shape-5 c3-circle c3-circle-5" r="2.5" style="fill: rgb(78, 84, 168); opacity: 0;" cx="426" cy="13.909090909090912"></circle><circle class=" c3-shape c3-shape-6 c3-circle c3-circle-6" r="2.5" style="fill: rgb(78, 84, 168); opacity: 0;" cx="510" cy="30.045454545454554"></circle></g></g></g><g class="c3-chart-arcs" transform="translate(257.328125,66.5)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 0;"></text></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-data1"></g></g></g></g><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip-xaxis)" transform="translate(0,143)" style="visibility: hidden; opacity: 1;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="514.65625" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(6, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><g class="tick" transform="translate(90, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">1</tspan></text></g><g class="tick" transform="translate(174, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2</tspan></text></g><g class="tick" transform="translate(258, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">3</tspan></text></g><g class="tick" transform="translate(342, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">4</tspan></text></g><g class="tick" transform="translate(426, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">5</tspan></text></g><g class="tick" transform="translate(510, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">6</tspan></text></g><path class="domain" d="M0,6V0H514.65625V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip-yaxis)" transform="translate(0,0)" style="visibility: hidden; opacity: 1;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,143)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,127)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">1</tspan></text></g><g class="tick" transform="translate(0,111)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">2</tspan></text></g><g class="tick" transform="translate(0,95)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">3</tspan></text></g><g class="tick" transform="translate(0,79)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">4</tspan></text></g><g class="tick" transform="translate(0,63)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">5</tspan></text></g><g class="tick" transform="translate(0,47)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">6</tspan></text></g><g class="tick" transform="translate(0,31)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">7</tspan></text></g><g class="tick" transform="translate(0,14)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">8</tspan></text></g><path class="domain" d="M-6,1H0V143H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(514.65625,0)" style="visibility: hidden; opacity: 1;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,143)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,129)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,115)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,101)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,87)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,72)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,58)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,44)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,30)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,16)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V143H6"></path></g></g><g transform="translate(1.5,155.5)" style="visibility: hidden;"><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip)" class="c3-brush" style="pointer-events: all; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="background" x="0" width="514.65625" style="visibility: hidden; cursor: crosshair;"></rect><rect class="extent" x="0" width="0" style="cursor: move;"></rect><g class="resize e" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g><g class="resize w" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(file:///C:/tmp/themeforest-19506620-kosmo-multi-purpose-responsive-bootstrap-4-admin-template-ui-framework/dist/admin/sidebar_sections-primary/index.html#c3-1523433151706-clip-xaxis)" style="visibility: hidden; opacity: 1;"><g class="tick" transform="translate(6, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><g class="tick" transform="translate(90, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">1</tspan></text></g><g class="tick" transform="translate(174, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2</tspan></text></g><g class="tick" transform="translate(258, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">3</tspan></text></g><g class="tick" transform="translate(342, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">4</tspan></text></g><g class="tick" transform="translate(426, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">5</tspan></text></g><g class="tick" transform="translate(510, 0)" style="opacity: 1;"><line y2="6" x1="0" x2="0"></line><text y="9" x="0" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">6</tspan></text></g><path class="domain" d="M0,6V0H514.65625V6"></path></g></g><g transform="translate(0,155)" style="visibility: hidden;"></g><text class="c3-title" x="258.828125" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card ks-widget-payment-price-ratio ks-green">
                    <div class="ks-price-ratio-title">
                        Share Price
                    </div>
                    <div class="ks-price-ratio-amount">23.82</div>
                    <div class="ks-price-ratio-progress">
                        <span class="ks-icon ks-icon-circled-up-right"></span>
                        <div class="ks-text">0.32%</div>
                    </div>
                </div>
                <div class="card ks-widget-payment-price-ratio ks-blue">
                    <div class="ks-price-ratio-title">
                        Share Price
                    </div>
                    <div class="ks-price-ratio-amount">23.82</div>
                    <div class="ks-price-ratio-progress">
                        <span class="ks-icon ks-icon-circled-up-right"></span>
                        <div class="ks-text">0.32%</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card ks-widget-payment-price-ratio ks-purple">
                    <div class="ks-price-ratio-title">
                        Share Price
                    </div>
                    <div class="ks-price-ratio-amount">0.23</div>
                    <div class="ks-price-ratio-progress">
                        <span class="ks-icon ks-icon-circled-down-left"></span>
                        <div class="ks-text">1.56%</div>
                    </div>
                </div>
                <div class="card ks-widget-payment-price-ratio ks-yellow">
                    <div class="ks-price-ratio-title">
                        Share Price
                    </div>
                    <div class="ks-price-ratio-amount">0.23</div>
                    <div class="ks-price-ratio-progress">
                        <span class="ks-icon ks-icon-circled-down-left"></span>
                        <div class="ks-text">1.56%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>