
<div class=" white-box">
    <div class="nav-month"> 
        <div>
            <a href= "<?php echo $GLOBALS['DEFAUL_DOMAIN']?>invoice/trang_chu/<?php echo strtotime(date('F Y',$data['month']).'- 1 month'); ?>" class="glyphicon glyphicon-menu-left	" aria-hidden="true"></a>
           
        </div>
        <div>
            <h2><?php echo date('F Y',$data['month']);  ?></h2>
        </div>
        <div>
            <a href="<?php echo $GLOBALS['DEFAUL_DOMAIN']?>invoice/trang_chu/<?php echo strtotime(date('F Y',$data['month']).'+ 1 month'); ?>" class="glyphicon glyphicon-menu-right	" aria-hidden="true"></a>
         </div>
    </div>
    <div style="display:flex;justify-content:flex-end">
        <a style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new</a>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm hóa đơn</h4>
                </div>
                <div class="modal-body">
                    
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#Invoice" aria-controls="Invoice" role="tab" data-toggle="tab">Invoice</a>
                            </li>
                            <li role="presentation">
                                <a href="#hr-ns" aria-controls="hr-ns" role="tab" data-toggle="tab">Staff Cost</a>
                            </li>
                        </ul>
                    
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div style="margin-top:30px" role="tabpanel" class="tab-pane active" id="Invoice">
                                <form action="<?php echo $GLOBALS['DEFAUL_DOMAIN']?>invoice/add_invoice" method="POST" role="form">
                                 
                                    <div class="form-group">
                                        <label for="">Mã hóa đơn</label>
                                        <input name="ma_hoa_don" type="text" class="form-control" id="" placeholder="Mã hóa đơn">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ngày</label>
                                        <input type="date" class="form-control" name="date" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nội dung</label>
                                        
                                        <textarea name="noi_dung" id="input" class="form-control" rows="3" required="required"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Số tiền</label>
                                        <input name="bill" type="number" class="form-control" id="" placeholder="Số tiền">
                                        <div class="checkbox">
                                            <label>
                                                <input data-toggle="collapse" data-target="#bill_vat_input" oncheck="" type="checkbox" value="">
                                                Có VAT
                                            </label>
                                        </div>
                                        <div id="bill_vat_input" class="collapse form-group">

                                        <label for="">VAT</label>
                                            <input class=" form-control" type="number" name="bill_vat"  value="0" plageholder= "VAT">
                                        </div>
                                        
                                    </div>
                                    <button name="submit_add_invoice" type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="hr-ns">
                                <form action="<?php echo $GLOBALS['DEFAUL_DOMAIN']?>invoice/add_staff_cost" method="POST" role="form">
                                    <div class="form-group">
                                        <label for="">Tháng</label>
                                        <input type="month" class="form-control" name="month" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nội dung</label>
                                        <textarea name="note" id="input" class="form-control" rows="3" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số tiền</label>
                                        <input name="total" type="number" class="form-control" id="" placeholder="Số tiền">
                                    </div>
                                    <button name="submit_add_staff_cost" type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                  
                    
                </div>
        
            </div>
        </div>
    </div>
  
  <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      <table id="table-class" class="table table-hover">
        <caption><h3>Hóa đơn</h3> </caption>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã hóa đơn</th>
                    <th>Ngày</th>
                    <th>Nội dung</th>
                    <th>VAT</th>
                    <th>Số tiền</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt=1;
                $tong_VAT = 0;
                $tong_bill = 0;
                if(isset($data['data'])){
                    foreach ($data['data']  as $key => $value) {
                    if(date('m-Y',strtotime($value['date']))===date('m-Y',$data['month'])){ ?>
                        <tr id="row_<?php echo $value['id'] ?>">
                            <td><?php echo $stt; ?></td>
                            <td>
                                <a href="#" data-name="code_bill" data-pk="<?php echo $value['id'] ?>" class="edit_invoice_colum"  data-title="Nhập giá trị mới">
                                    <?php echo $value['code_bill']; ?>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="edit_date" data-name="date" data-pk="<?php echo $value['id'] ?>" data-title="Nhập giá trị mới"><?php echo date('d-m-Y',strtotime($value['date']))?></a>
                            </td>
                            <td>
                                <a href="#" data-name="info" data-pk="<?php echo $value['id'] ?>" class="edit_invoice_colum"  data-title="Nhập giá trị mới"><?php echo $value['info']; ?></a>
                            </td>
                            <td>
                                <a href="#" data-name="vat" data-pk="<?php echo $value['id'] ?>" class="edit_invoice_colum vat_value"  data-title="Nhập giá trị mới"><?php echo $value['vat']; ?></a> VNĐ
                            </td>

                            <td>
                                <a href="#" data-name="bill" data-pk="<?php echo $value['id'] ?>" class="edit_invoice_colum bill_value"  data-title="Nhập giá trị mới"><?php echo $value['bill']; ?> </a> VNĐ
                            </td>
                            
                            <td>
                                <button onclick="delete_invoice(<?php echo $value['id'] ?>)" type="button" class="delete_record btn btn-danger">Delete</button>
                            </td>
                        </tr>
                <?php
                $tong_VAT+=$value['vat'];
                $tong_bill +=$value['bill'];
                $stt++; 
                    } ?>
                <?php   } }  ?>
                <tr class="info" style="font-weight:bold">
                    <td colspan="4"><b>Tổng:</b> </td>
                    <td> <?php echo number_format($tong_VAT); ?> VNĐ</td>
                    <td colspan="2"> <?php echo number_format($tong_bill); ?> VNĐ</td>
                </tr>
            </tbody>
    </table>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <table class="table table-hover" >
            <caption><h3>Staff cost</h3></caption>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Month</th>
                    <th>Cost</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            
                <?php $tong_sc = 0;  if(isset($data['data_sc'])){
                    $stt_sc = 1;
                    foreach ($data['data_sc'] as $value) { 
                        if(date('m-Y',strtotime($value['month']))===date('m-Y',$data['month'])){ ?>
                        <tr id="row_sc_<?php echo $value['id'] ?>">
                            <td>  <?php echo $stt_sc ?></td>
                            <td>  <a href="#"  class="edit_staff_cost" data-name="month" data-pk="<?php echo $value['id'] ?>" data-title="Nhập giá trị mới"> <?php echo date('M-Y',strtotime($value['month'])); ?></a></td>
                            <td>  <a href="#"  class="edit_staff_cost" data-name="cost" data-pk="<?php echo $value['id'] ?>" data-title="Nhập giá trị mới"> <?php echo $value['cost'] ?></a></td>
                            <td>  <a href="#"  class="edit_staff_cost" data-name="note" data-pk="<?php echo $value['id'] ?>" data-title="Nhập giá trị mới"><?php echo $value['note'] ?></a></td>
                            <td>    <button onclick="delete_staff_cost(<?php echo $value['id'] ?>)" type="button" class="delete_record btn btn-danger">Delete</button></td>
                        </tr>
                <?php
                $tong_sc+=$value['cost'];
                } $stt_sc++; }  } ?>
                <tr class="success" style="font-weight:bold">
                    <td colspan="2"><b>Tổng:</b> </td>
                    <td colspan="4"> <?php echo number_format($tong_sc) ;  ?> VNĐ</td>
                </tr>
            </tbody>
        </table>
      </div>
  </div>
  
   
     <hr style="margin-top:50px;margin-bottom:50px">
     
     
     
    <style>
        .nav-month{
            display:flex;
            justify-content: space-around;
        }
        .nav-month a{
            font-size:30px;
            font-weight:500;
        }
    </style>
    <script type="text/javascript" language="javascript">
        function delete_invoice(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("row_"+id).style.display = "none";
                }
            };
            xhttp.open("GET", "<?php echo $GLOBALS['DEFAUL_DOMAIN']?>ajax/ajax_delete_invoice/"+id, true);
            xhttp.send();
            }
        function delete_staff_cost(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("row_sc_"+id).style.display = "none";
                }
            };
            xhttp.open("GET", "<?php echo $GLOBALS['DEFAUL_DOMAIN']?>ajax/ajax_delete_staff_cost/"+id, true);
            xhttp.send();
            }
            
   </script>
 
</div>
 
