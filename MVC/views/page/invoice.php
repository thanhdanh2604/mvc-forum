<?php ?>
<div class="container white-box">
    
    <a class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new</a>
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
                                    <input oncheck="" type="checkbox" value="">
                                    Có VAT
                                </label>
                            </div>
                            <input class="form-control" type="number" name="bill_vat" id="" value="0" plageholder= "VAT">
                        </div>
                        <button name="submit_add_invoice" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
        
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã hóa đơn</th>
                <th>Ngày</th>
                <th>Nội dung</th>
                <th>Số tiền</th>
                <th>VAT</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt=1; foreach ($data['data']  as $key => $value) { ?>
                <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $value['code_bill']; ?></td>
                <td><?php echo $value['date']; ?></td>
                <td><?php echo $value['info']; ?></td>
                <td><?php echo $value['bill']; ?></td>
                <td><?php echo $value['vat']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>
