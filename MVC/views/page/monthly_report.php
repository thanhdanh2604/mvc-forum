
<div class="report_layout">
    <div class="header">
          <div class="header_img">
            <img style="width:100%" src="<?php  echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/img/logo-edu(trang).png" alt="Logo intertu">
          </div>
          <div class="header_title">
            <h1>Business Monthly Report</h1>
          </div>
    </div>
    <div class="page">
      <!-- Input date  -->
        <div class="input_date">
          <div class="input_start_date">
            <label for="">From</label>
            <input type="date" id="start_date" name="start_date">
          </div>
          <div class="input_end_date">
          <label for="">To</label>
            <input type="date" id="end_date" name="end_date">
          </div>
          
        </div>
      <!-- End input date -->
        <div class="content">
          <div id="page_left">
            <h3>Cash flow</h3>
            <table class="">
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>Student name</th>
                </tr>
              </thead>
              <tbody>
                <?php $total_cf=0; $stt=1; foreach ($data['data_cash_flow'] as $cash_flow) {
                  echo "<tr>";
                  echo "<td>".$stt."</td>";
                  echo "<td>".$cash_flow->ngay_nhan."</td>";
                  echo "<td class=\"amount_cash_flow\">".number_format($cash_flow->so_tien)."</td>";
                  echo "<td>".$cash_flow->ten_hoc_sinh."</td>";
                  echo "</tr>";
                  $stt++;
                  $total_cf+=$cash_flow->so_tien;
                } ?>
                <tr>
                  <td colspan="2">Tổng</td>
                  <td id="total_amount_cf" colspan="2"><?php echo number_format($total_cf); ?></td>
                </tr>
              </tbody>
            </table>
            <div id="chart_cf">
            </div>
            <h3>Revenue</h3>
              <table>
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Date</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $stt=0; $totalRevenue=0; foreach ($data['data_revenue_month'] as $key=>$value) { ?>
                    <tr>
                      <td><?php echo $stt; ?></td>
                      <td><?php echo $key; ?></td>
                      <td><?php echo $value; $totalRevenue+=$value; ?></td>
                    </tr>
                  <?php $stt++; } ?>
                    <tr>
                      <td colspan=2>Total</td>
                      <td><?php echo $totalRevenue; ?></td>
                    </tr>
                </tbody>
              </table>
            <div id="chart_doanh_thu"></div>
            <h3>Cost</h3>
            <table>
              <thead>
                <tr>
                  <th>Order</th>
                  <th>Cost type</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Operation</td>
                  <td><?php echo $data['totalOperation'] ?></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Re-invest</td>
                  <td><?php echo $data['totalReinvest'] ?></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>HRs</td>
                  <td><?php echo $data['totalStaffCost'] ?></td>
                </tr>
                <tr>
                  <td colspan=2>Total</td>
                  <td><?php echo $data['totalOperation']+ $data['totalReinvest']+$data['totalStaffCost'] ?></td>
                </tr>
              </tbody>
            </table>
            <div id="chart_cost"></div>
          </div>
          <div id="page_right">
            <h3>Revenue - Cost Chart</h3>
            <div id="chart_dau_ra_dau_vao"></div>
            <h3>Gross Profit</h3>
            <div id="chart_dt_goc"></div>
            <h3>Teaching Hours Count</h3>
            <p class="warning">Giáo viên tháng đó không có giờ dạy sẽ không hiển thị</p>
            <div id="teaching_hours">
              <table>
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Name</th>
                    <th>Teaching hours</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $stt=1; $total_teaching_hours=0; foreach ($data['teaching_hours'] as $key => $teaching_hours) { ?>
                    <tr>
                      <td><?php echo $stt; $stt++ ?></td>
                      <td><?php echo $key ?></td>
                      <td><?php echo $teaching_hours; $total_teaching_hours+=$teaching_hours ?></td>
                    </tr>
                 <?php } ?>
                 <tr>
                   <td colspan=2>Total</td>
                   <td> <?php echo $total_teaching_hours ?></td>
                 </tr>
                </tbody>
              </table>
              
            </div>
            <div id="teaching_chart">

            </div>
          </div>
        </div>
    </div>
</div>
    
