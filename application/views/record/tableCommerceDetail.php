<!-- 
  * tableCommerceDetail					  	   
  * show detail reportSales from db
  * @input -
  * @output show detail reportSales from db                  
  * @author Tappakon Panyang
  * @Create Date 10-02-2564
  -->
  <div class="row">
    <div class="col-lg-12">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th class="text-left">สินค้า</th>
                    <th>จำนวน(ชิ้น)</th>
                    <th>ราคาต่อหน่วย</th>
                    <th>ราคารวม</th>
                </tr>
            </thead>
            <tbody>
                <!-- Start loop show db to table -->
                <?php if (!empty($table)) {
                    $i = 1; //กำหนดลำดับ
                ?>
                    <?php foreach ($table as $key => $val) { ?>
                        <tr class="text-center">
                            <td class="text-left"><?= $val->pd_name ?></td>
                            <td><?= $val->bdt_amount ?></td>
                            <td><?= $val->bdt_sale_price ?></td>
                            <td><?= number_format($val->bdt_amount * $val->bdt_sale_price,2) ?></td>
                        </tr>
                    <?php } ?>

                <?php } ?>
                <!-- End loop -->
            </tbody>
        </table>
    </div>
</div>