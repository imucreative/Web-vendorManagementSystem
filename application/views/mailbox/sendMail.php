<div class="row">
    <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'form');
        echo form_open('#', $attributes);
    ?>
        
        <?php
        /*
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content mailbox-content">
                    <div class="file-manager">
                        <a class="btn btn-block btn-primary compose-mail" href="<?php echo base_url();?>index.php/mailbox/compose">Compose Mail</a>
                        <div class="space-25"></div>
                        <h5>Folders</h5>
                        <ul class="folder-list m-b-md" style="padding: 0">
                            <li><a href="<?php echo base_url();?>index.php/mailbox/sendMail"> <i class="fa fa-envelope-o"></i> Send Mail <span class="label label-danger pull-right">2</span></a></li>
                        </ul>
                        
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        */
        ?>
        
        <div class="col-lg-12 animated fadeInRight">
            
        
            <div class="mail-box-header">
                
                <h2>
                    Send Mail (<?php echo getCountTable("dtremail");?>) <?php //echo $error;?>
                </h2>
            </div>
            <div class="ibox-content">

                <table class="table table-hover table-striped myTable">
                    <thead>
                        <tr>
                            <th width='5%'><center>NO</center></th>
                            <th width='15%'><center>DATE</center></th>
                            <th width='40%'><center>TO</center></th>
                            <th width='30%'><center>SUBJECT</center></th>
                            <th width="10%"></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        

                        <?php
                            $no=1;
                            foreach ($result as $r){
                                $CI=&get_instance();
                                $CI->load->model('Vendor_model');
                                $CI->load->model('Category_model');
                                $rowVendor      = $CI->Vendor_model->getVendorById($r->vendorId)->row();
                                $rowCategory    = $CI->Category_model->getCategoriByCategoryId($rowVendor->categoryId)->row();
                        ?>

                            <tr >
                                <td class='text-center' >
                                    <?php echo $no;?>.
                                </td>
                                <td class="text-center mail-date"><?php echo tgl_indo($r->date);?></td>
                                <td ><?php echo $rowVendor->name;?>
                                    <span class="label label-info pull-right"><?php echo $r->sendTo;?></span>
                                </td>
                                <td ><?php echo $r->subject;?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url();?>index.php/mailbox/detail/<?php echo $r->id;?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Display</a>
                                </td>
                            </tr>

                        <?php
                        $no++;
                            }
                        ?>
                        
                    </tbody>
                </table>


            </div>
        


        </div>
    </form>
</div>
