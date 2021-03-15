
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>  
       
        <div class="sparkline-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="about-sparkline responsive-mg-b-30">
                                    <div class="sparkline-hd">
                                        <div class="main-spark-hd">
                                            <h1>Doanh thu ngày hôm nay</h1>
                                        </div>
                                    </div>
                                    <div class="counter">
                                    <h2 style="color:#006DF0">
                                    <?php echo number_format($data['tuition_today']);
                                    ?> VNĐ
                                    </h2> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="about-sparkline responsive-mg-b-30">
                                    <div class="sparkline-hd">
                                        <div class="main-spark-hd">
                                            <h1>Doanh thu hôm qua</h1>
                                        </div>
                                    </div>
                                    <div class="sparkline-content">
                                    <h2 style="color:#65b12d">
                                        <?php echo number_format($data['tuition_yesterday']) ;?> VNĐ
                                    </h2>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="sparkline-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="analysis-progrebar">
                                    <h3>Doanh thu theo ngày</h3>
                                    <div id="chart-day">
                                    </div>
                                </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline-list">
                             <div class="sparkline7-hd">
                                <div class="main-spark7-hd">
                                    <h1><span class="c3-ds-n">Lợi nhuận trước thuế ( theo tháng )</span></h1>
                                </div>
                            </div>
                            <div class="sparkline7-graph">
                                <div id="chart_dt_goc"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pie-bar-line-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="sparkline7-list responsive-mg-b-30">
                            <div class="sparkline7-hd">
                                <div class="main-spark7-hd">
                                    <h1><span class="c3-ds-n">Doanh thu thuần ( theo tháng )</span></h1>
                                </div>
                            </div>
                            <div class="sparkline7-graph">
                                <div id="chart_dt"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1><span class="c3-ds-n">chi phí văn phòng ( theo tháng )</span></h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div id="chart_vp"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1><span class="c3-ds-n">chi phí nhân sự ( theo tháng )</span></h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div id="chart_ns"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
       
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>