<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Vendor <small>Data Vendor.</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <!--
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a></li>
                            <li><a href="#">Config option 2</a></li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    -->
                </div>
            </div>
            <div class="ibox-content">

                <table class="table table-striped table-hover myTable" >
                    <thead>
                        <tr>
                            <th width='5%'><center>NO</center></th>
                            <th width='25%'><center>VENDOR NAME</center></th>
                            <th width='10%'><center>CATEGORY</center></th>
                            <th width='20%'><center>ADDRESS</center></th>
                            <th width='10%'><center>TELP</center></th>
                            <th width='10%'><center>EMAIL</center></th>
                            <th width='20%'>
                                <?php 
                                $stat = $this->session->userdata('status');
                                    if($stat == 1){ 
                                ?>
                                <center>
                                    <a href="<?php echo base_url();?>index.php/vendor/post" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Input</a>
                                </center>
                                <?php 
                                    } 
                                ?>
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($result as $r){
                                $CI=&get_instance();
                                $CI->load->model('Category_model');
                                $rowCategory    = $CI->Category_model->getCategoriByCategoryId($r->categoryId)->row();
                        ?>
                                <tr>
                                    <td align='center'><?php echo $no;?></td>
                                    <td><?php echo $r->name;?></td>
                                    <td align='center'><?php echo $rowCategory->name;?></td>
                                    <td><?php echo $r->address;?></td>
                                    <td align='center'><?php echo $r->telp;?></td>
                                    <td align='center'><a href="mailto:<?php echo $r->email;?>"><?php echo $r->email;?></a></td>
                                    <td align='center'>
                                        
                                        <?php

                                            
                                            if($stat == 1){
                                                echo anchor('vendor/edit/'.$r->vendorId, '<i class="fa fa-edit"></i>', 'class="btn btn-sm btn-info" title="Edit"')." | ".
                                                anchor('vendor/display/'.$r->vendorId, '<i class="fa fa-eye"></i>', 'class="btn btn-sm btn-warning" title="Display"')." | ".
                                                anchor("vendor/delete/".$r->vendorId, '<i class="fa fa-trash-o"></i>', ["class"=>"btn btn-sm btn-danger", "title"=>'Delete', "onclick"=>"return confirm('Are you sure delete this data?')"])." | ".
                                                anchor("mailbox/compose/".$r->vendorId, '<i class="fa fa-send"></i>', ["class"=>"btn btn-sm btn-success", "title"=>'Send Email']);
                                            }elseif($stat == 2){
                                                echo anchor('vendor/display/'.$r->vendorId, '<i class="fa fa-eye"></i>', 'class="btn btn-sm btn-warning" title="Display"')." | ".
                                                anchor("mailbox/compose/".$r->vendorId, '<i class="fa fa-send"></i>', ["class"=>"btn btn-sm btn-success", "title"=>'Send Email']);
                                            }
                                            
                                        ?>
                                        
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
    </div>
</div>
