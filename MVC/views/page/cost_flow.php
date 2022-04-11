<?php

?>
<div class="white-box">
  <!-- Input date  -->
<div class="input_date">
  <div class="input_start_date">
    <label for="">Month</label>
    <input value="<?php echo $data['year'].'-'.$data['month'] ?>" type="month" id="change_month" name="month">
    <input type="submit" id="submit_button" value="Duyệt">
  </div>
</div>
      <!-- End input date -->
<table id="table-class" class="table table-hover">
  <thead>
    <tr>
      <th>Tên</th>
      <th>Mã NKGD</th>
      <th>Số hóa đơn</th>
      <th>Số giờ</th>
      <th>Số tiền</th>
      <th>Ngày bắt đầu</th>
      <th>Ngầy nhận</th>
    </tr>
  </thead>
  <tbody>
    <?php $tong_tien =0; foreach ($data['data_cost_flow'] as $value) { ?>
      
    <tr>
      <td><?php echo $value->ten_hoc_sinh; ?></td>
      <td><a target="__blank" href="https://qlhv.intertu.edu.vn/chi-tiet-nhat-ky.php?id=<?php echo $value->ma_nkgd; ?>">Nkgd</a></td>
      <td><?php echo $value->so_hoa_don; ?></td>
      <td><?php echo $value->so_gio; ?></td>
      <td><?php echo $value->so_tien; ?></td>
      <td><?php echo $value->ngay_bat_dau; ?></td>
      <td><?php echo $value->ngay_nhan; ?></td>
    </tr>
    <?php $tong_tien+=$value->so_tien; }?>
    <tr>
      <td colspan=3>Tổng</td>
      <td colspan=3><?php echo $tong_tien; ?></td>
    </tr>
  </tbody>
</table>



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
  var fulllink = link + 'cost_flow/trang_chu' +'/'+month+'/'+year
  window.location.href= fulllink;
}
</script>
</div>
 



