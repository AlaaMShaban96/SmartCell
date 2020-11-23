@extends('Dashbord/layout/master')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">content_copy</i>
              </div>
              <p class="card-category">Used Space</p>
              <h3 class="card-title">49/50
                <small>GB</small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">warning</i>
                <a href="javascript:;">Get More Space...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Revenue</p>
              <h3 class="card-title">$34,245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Fixed Issues</p>
              <h3 class="card-title">75</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> Tracked from Github
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="fa fa-twitter"></i>
              </div>
              <p class="card-category">Followers</p>
              <h3 class="card-title">+245</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i> Just Updated
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="40" x2="40" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="79.80952671595982" x2="79.80952671595982" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="119.61905343191964" x2="119.61905343191964" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="159.42858014787947" x2="159.42858014787947" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="199.23810686383928" x2="199.23810686383928" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="239.04763357979908" x2="239.04763357979908" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="278.85716029575894" x2="278.85716029575894" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line y1="120" y2="120" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M40,91.2C79.81,79.2,79.81,79.2,79.81,79.2C119.619,103.2,119.619,103.2,119.619,103.2C159.429,79.2,159.429,79.2,159.429,79.2C199.238,64.8,199.238,64.8,199.238,64.8C239.048,76.8,239.048,76.8,239.048,76.8C278.857,28.8,278.857,28.8,278.857,28.8" class="ct-line"></path><line x1="40" y1="91.2" x2="40.01" y2="91.2" class="ct-point" ct:value="12" opacity="1"></line><line x1="79.80952671595982" y1="79.2" x2="79.81952671595982" y2="79.2" class="ct-point" ct:value="17" opacity="1"></line><line x1="119.61905343191964" y1="103.2" x2="119.62905343191964" y2="103.2" class="ct-point" ct:value="7" opacity="1"></line><line x1="159.42858014787947" y1="79.2" x2="159.43858014787946" y2="79.2" class="ct-point" ct:value="17" opacity="1"></line><line x1="199.23810686383928" y1="64.8" x2="199.24810686383927" y2="64.8" class="ct-point" ct:value="23" opacity="1"></line><line x1="239.04763357979908" y1="76.8" x2="239.05763357979907" y2="76.8" class="ct-point" ct:value="18" opacity="1"></line><line x1="278.85716029575894" y1="28.799999999999997" x2="278.86716029575894" y2="28.799999999999997" class="ct-point" ct:value="38" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="39.80952671595982" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 40px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="79.80952671595982" y="125" width="39.80952671595982" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 40px; height: 20px;">T</span></foreignObject><foreignObject style="overflow: visible;" x="119.61905343191964" y="125" width="39.80952671595982" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 40px; height: 20px;">W</span></foreignObject><foreignObject style="overflow: visible;" x="159.42858014787947" y="125" width="39.80952671595982" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 40px; height: 20px;">T</span></foreignObject><foreignObject style="overflow: visible;" x="199.23810686383928" y="125" width="39.809526715959805" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 40px; height: 20px;">F</span></foreignObject><foreignObject style="overflow: visible;" x="239.04763357979908" y="125" width="39.809526715959834" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 40px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" x="278.85716029575894" y="125" width="39.809526715959834" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 40px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" y="96" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="72" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">10</span></foreignObject><foreignObject style="overflow: visible;" y="48" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">20</span></foreignObject><foreignObject style="overflow: visible;" y="24" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">30</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">40</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">50</span></foreignObject></g></svg></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"><line y1="120" y2="120" x1="40" x2="313.6666564941406" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="313.6666564941406" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="313.6666564941406" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="313.6666564941406" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="313.6666564941406" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="313.6666564941406" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><line x1="51.402777353922524" x2="51.402777353922524" y1="120" y2="54.959999999999994" class="ct-bar" ct:value="542" opacity="1"></line><line x1="74.20833206176758" x2="74.20833206176758" y1="120" y2="66.84" class="ct-bar" ct:value="443" opacity="1"></line><line x1="97.01388676961263" x2="97.01388676961263" y1="120" y2="81.6" class="ct-bar" ct:value="320" opacity="1"></line><line x1="119.81944147745769" x2="119.81944147745769" y1="120" y2="26.400000000000006" class="ct-bar" ct:value="780" opacity="1"></line><line x1="142.6249961853027" x2="142.6249961853027" y1="120" y2="53.64" class="ct-bar" ct:value="553" opacity="1"></line><line x1="165.43055089314777" x2="165.43055089314777" y1="120" y2="65.64" class="ct-bar" ct:value="453" opacity="1"></line><line x1="188.23610560099283" x2="188.23610560099283" y1="120" y2="80.88" class="ct-bar" ct:value="326" opacity="1"></line><line x1="211.04166030883786" x2="211.04166030883786" y1="120" y2="67.92" class="ct-bar" ct:value="434" opacity="1"></line><line x1="233.84721501668292" x2="233.84721501668292" y1="120" y2="51.84" class="ct-bar" ct:value="568" opacity="1"></line><line x1="256.652769724528" x2="256.652769724528" y1="120" y2="46.8" class="ct-bar" ct:value="610" opacity="1"></line><line x1="279.45832443237305" x2="279.45832443237305" y1="120" y2="29.28" class="ct-bar" ct:value="756" opacity="1"></line><line x1="302.2638791402181" x2="302.2638791402181" y1="120" y2="12.599999999999994" class="ct-bar" ct:value="895" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="22.80555470784505" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="62.80555470784505" y="125" width="22.80555470784505" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">F</span></foreignObject><foreignObject style="overflow: visible;" x="85.6111094156901" y="125" width="22.805554707845054" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="108.41666412353516" y="125" width="22.805554707845047" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">A</span></foreignObject><foreignObject style="overflow: visible;" x="131.2222188313802" y="125" width="22.805554707845047" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="154.02777353922525" y="125" width="22.80555470784506" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="176.8333282470703" y="125" width="22.805554707845033" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="199.63888295491535" y="125" width="22.80555470784506" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">A</span></foreignObject><foreignObject style="overflow: visible;" x="222.4444376627604" y="125" width="22.80555470784506" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" x="245.24999237060547" y="125" width="22.805554707845033" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">O</span></foreignObject><foreignObject style="overflow: visible;" x="268.0555470784505" y="125" width="22.80555470784506" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 23px; height: 20px;">N</span></foreignObject><foreignObject style="overflow: visible;" x="290.86110178629554" y="125" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">D</span></foreignObject><foreignObject style="overflow: visible;" y="96" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="72" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">200</span></foreignObject><foreignObject style="overflow: visible;" y="48" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">400</span></foreignObject><foreignObject style="overflow: visible;" y="24" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">600</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">800</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1000</span></foreignObject></g></svg></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Email Subscriptions</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="40" x2="40" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="74.83333587646484" x2="74.83333587646484" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="109.66667175292969" x2="109.66667175292969" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="144.50000762939453" x2="144.50000762939453" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="179.33334350585938" x2="179.33334350585938" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="214.16667938232422" x2="214.16667938232422" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="249.00001525878906" x2="249.00001525878906" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="283.8333511352539" x2="283.8333511352539" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line y1="120" y2="120" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="318.66668701171875" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M40,92.4C74.833,30,74.833,30,74.833,30C109.667,66,109.667,66,109.667,66C144.5,84,144.5,84,144.5,84C179.333,86.4,179.333,86.4,179.333,86.4C214.167,91.2,214.167,91.2,214.167,91.2C249,96,249,96,249,96C283.833,97.2,283.833,97.2,283.833,97.2" class="ct-line"></path><line x1="40" y1="92.4" x2="40.01" y2="92.4" class="ct-point" ct:value="230" opacity="1"></line><line x1="74.83333587646484" y1="30" x2="74.84333587646485" y2="30" class="ct-point" ct:value="750" opacity="1"></line><line x1="109.66667175292969" y1="66" x2="109.67667175292969" y2="66" class="ct-point" ct:value="450" opacity="1"></line><line x1="144.50000762939453" y1="84" x2="144.51000762939452" y2="84" class="ct-point" ct:value="300" opacity="1"></line><line x1="179.33334350585938" y1="86.4" x2="179.34334350585937" y2="86.4" class="ct-point" ct:value="280" opacity="1"></line><line x1="214.16667938232422" y1="91.2" x2="214.1766793823242" y2="91.2" class="ct-point" ct:value="240" opacity="1"></line><line x1="249.00001525878906" y1="96" x2="249.01001525878905" y2="96" class="ct-point" ct:value="200" opacity="1"></line><line x1="283.8333511352539" y1="97.2" x2="283.8433511352539" y2="97.2" class="ct-point" ct:value="190" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="34.833335876464844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 35px; height: 20px;">12p</span></foreignObject><foreignObject style="overflow: visible;" x="74.83333587646484" y="125" width="34.833335876464844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 35px; height: 20px;">3p</span></foreignObject><foreignObject style="overflow: visible;" x="109.66667175292969" y="125" width="34.833335876464844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 35px; height: 20px;">6p</span></foreignObject><foreignObject style="overflow: visible;" x="144.50000762939453" y="125" width="34.833335876464844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 35px; height: 20px;">9p</span></foreignObject><foreignObject style="overflow: visible;" x="179.33334350585938" y="125" width="34.833335876464844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 35px; height: 20px;">12p</span></foreignObject><foreignObject style="overflow: visible;" x="214.16667938232422" y="125" width="34.833335876464844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 35px; height: 20px;">3a</span></foreignObject><foreignObject style="overflow: visible;" x="249.00001525878906" y="125" width="34.833335876464844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 35px; height: 20px;">6a</span></foreignObject><foreignObject style="overflow: visible;" x="283.8333511352539" y="125" width="34.833335876464844" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 35px; height: 20px;">9a</span></foreignObject><foreignObject style="overflow: visible;" y="96" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="72" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">200</span></foreignObject><foreignObject style="overflow: visible;" y="48" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">400</span></foreignObject><foreignObject style="overflow: visible;" y="24" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">600</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">800</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1000</span></foreignObject></g></svg></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div>
   
    </div>
  </div>

@endsection