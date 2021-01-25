<?php ?>
<div class="container white-box">
    <div class="nav-month"> 
    
    <span class="glyphicon glyphicon-menu-left	" aria-hidden="true"></span>
    <?php echo date('F Y',strtotime(date('F Y',$data['month']).'- 1 month'));  ?>
    <?php echo date('F Y',$data['month']);  ?>
    <?php echo date('F Y',strtotime(date('F Y',$data['month']).'+ 1 month'));  ?>
    <span class="glyphicon glyphicon-menu-right	" aria-hidden="true"></span>
    </div>
    
    <a style="float:right" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new</a>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm hóa đơn</h4>
                </div>
                <div class="modal-body">
                    
                    <form action="./invoice/add_invoice" method="POST" role="form">

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
        
            </div>
        </div>
    </div>
  
    <table id="table-class" class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã hóa đơn</th>
                <th>Ngày</th>
                <th>Nội dung</th>
                <th>Số tiền</th>
                <th>VAT</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt=1;
            if(isset($data['data'])){ foreach ($data['data']  as $key => $value) { ?>
                <tr id="row_<?php echo $value['id'] ?>">
                <td><?php echo $stt; ?></td>
                <td>
                    <a href="#" data-name="code_bill" data-pk="<?php echo $value['id'] ?>" class="edit_invoice_colum"  data-title="Nhập giá trị mới">
                        <?php echo $value['code_bill']; ?>
                    </a>
                </td>
                <td>
                <a href="#" class="edit_date" data-name="date" data-pk="<?php echo $value['id'] ?>" data-title="Nhập giá trị mới"><?php echo $value['date']; ?></a>
                </td>
                <td>
                <a href="#" data-name="info" data-pk="<?php echo $value['id'] ?>" class="edit_invoice_colum"  data-title="Nhập giá trị mới"><?php echo $value['info']; ?></a>
                </td>
                <td>
                <a href="#" data-name="bill" data-pk="<?php echo $value['id'] ?>" class="edit_invoice_colum"  data-title="Nhập giá trị mới"><?php echo $value['bill']; ?> </a> VNĐ
                </td>
                <td><a href="#" data-name="vat" data-pk="<?php echo $value['id'] ?>" class="edit_invoice_colum"  data-title="Nhập giá trị mới"><?php echo $value['vat']; ?></a> VNĐ</td>
                <td>
                 <button onclick="delete_invoice(<?php echo $value['id'] ?>)" type="button" class="delete_record btn btn-danger">Delete</button>
                </td>
                </tr>
            <?php $stt++; }} ?>
        </tbody>
    </table>

    <script type="text/javascript" language="javascript">
        function delete_invoice(id) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("row_"+id).style.display = "none";
                }
            };
            xhttp.open("GET", "./ajax/ajax_delete_invoice/"+id, true);
            xhttp.send();
            }
   </script>
</div>
 
