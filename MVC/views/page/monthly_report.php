<div class="btn-export" onclick=CreatePDFfromHTML()>Export Report</div>
<div class="report_layout">
    <div class="header">
          <div class="header_img">
            <img src="<?php  echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/img/logo-edu(trang).png" alt="Logo intertu">
          </div>
          <div class="header_title">
            <h1>Business Monthly Report</h1>
          </div>
    </div>
    <div class="page">
      <!-- Input date  -->
        <div class="input_date">
          <div class="input_start_date">
            <label for="">Month</label>
            <input value="<?php echo $data['year'].'-'.$data['month'] ?>" type="month" id="change_month" name="month">
            <input type="submit" id="submit_button" value="Duyệt">
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
                  <td colspan="2">Total</td>
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
                  <?php $stt=1; $totalRevenue=0; foreach ($data['data_revenue_month'] as $key=>$value) { ?>
                    <tr>
                      <td><?php echo $stt; ?></td>
                      <td><?php echo $key; ?></td>
                      <td><?php echo number_format($value); $totalRevenue+=$value; ?></td>
                    </tr>
                  <?php $stt++; } ?>
                   
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan=2>Total</td>
                    <td><?php echo number_format($totalRevenue); ?></td>
                  </tr>
                </tfoot>
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
                  <td><?php echo number_format($data['totalOperation']); ?></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Re-invest</td>
                  <td><?php echo number_format($data['totalReinvest']) ?></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>HRs</td>
                  <td><?php echo number_format($data['totalStaffCost']) ?></td>
                </tr>
                
              </tbody>
              <tfoot>
                  <tr>
                    <td colspan=2>Total</td>
                    <td><?php echo number_format($data['totalOperation']+ $data['totalReinvest']+$data['totalStaffCost']) ?></td>
                  </tr>
              </tfoot>
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
                  <?php $stt=1; $total_teaching_hours=0; foreach ($data['teaching_hours'] as $key => $teaching_hours) { 
                    if($teaching_hours!=0){?>
                    <tr>
                      <td><?php echo $stt; $stt++ ?></td>
                      <td><?php echo $key ?></td>
                      <td><?php echo $teaching_hours; $total_teaching_hours+=$teaching_hours ?></td>
                    </tr>
                 <?php } } ?>
                 
                </tbody>
                <tfoot>
                  <tr>
                   <td colspan=2>Total</td>
                   <td > <?php echo number_format($total_teaching_hours)  ?></td>
                 </tr>
                </tfoot>
              </table>
              
            </div>
            <div id="teaching_chart">

            </div>
          </div>
        </div>
    </div>
</div>

<script>
document.getElementById('submit_button').addEventListener("click", send_link)
function send_link(){
  var value = document.querySelector('[type="month"]').value
  var year = value.slice(0,4);
  var month = value.slice(5,7);
  if(window.location.hostname=='localhost'){
    link ='http://localhost/mvc-summary/';
  }else{
    link ='https://'+window.location.hostname+'/';
  }
  var fulllink = link + 'report_monthly/trang_chu' +'/'+month+'/'+year
  window.location.href= fulllink;
}
//Create PDf from HTML...
function CreatePDFfromHTML() {
    var HTML_Width = $(".report_layout").width();
    var HTML_Height = $(".report_layout").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($(".report_layout")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("intertu-monthly-report-<?php echo $data['month'].'-'.$data['year'] ?>.pdf");
        //$(".report_layout").hide();
    });
}

</script>

