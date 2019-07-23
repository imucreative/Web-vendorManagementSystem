<div class="row">
    
        
        <?php
            $attributes = array('class' => 'form-horizontal', 'id' => 'form');
            echo form_open('mailbox/compose', $attributes);
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
                <div class="pull-right tooltip-demo">
                    <?php
                        if($row->attachment){
                    ?>
                        <a href="<?php echo base_url();?>uploads/email/<?php echo $row->attachment;?>" class="btn btn-info" ><i class='fa fa-search'></i> Download Attachment</a>
                    <?php
                        }
                    ?>
                    <a href="<?php echo base_url();?>index.php/mailbox/sendMail" class="btn btn-white" ><i class='fa fa-arrow-left'></i> Back</a>
                </div>
                <h2>
                    View Message
                </h2>
            </div>
            <div class="mail-box">
                <div class="mail-body">
                    
                    <input type="hidden" name="vendorId" class="form-control to" value="<?php echo $row->vendorId;?>" />

                    <div class="form-group form-group-from"><label class="col-sm-2 control-label">From:</label>
                        <div class="col-sm-10"><input type="text" name="from" class="form-control from" value="<?php echo $row->sendFrom;?>" readonly required /></div>
                    </div>
                    <div class="form-group form-group-to"><label class="col-sm-2 control-label">To:</label>
                        <div class="col-sm-10">
                            
                            <input type="text" name="to" class="form-control to" value="<?php echo $vendor->name;?> - <?php echo $row->sendTo;?>" readonly required />
                            
                            
                        </div>
                    </div>
                    <div class="form-group form-group-cc"><label class="col-sm-2 control-label">Cc:</label>
                        <div class="col-sm-10"><input type="text" name="cc" class="form-control cc" value="<?php echo $row->sendCc;?>" readonly /></div>
                    </div>
                    <div class="form-group form-group-subject"><label class="col-sm-2 control-label">Subject:</label>
                        <div class="col-sm-10"><input type="text" name="subject" class="form-control subject" value="<?php echo $row->subject;?>" readonly required /></div>
                    </div>

                </div>
    

                <div class="mail-text h-300">
                    
                    <textarea id="compose-textarea" class="form-control message" style="height: 300px" name="message" readonly required >
                        <?php echo $row->message;?>
                    </textarea>

                    
                    <div class="clearfix"></div>
                </div>
                <div class="mail-body text-right tooltip-demo">
                    <?php
                        if($row->attachment){
                    ?>
                        <a href="<?php echo base_url();?>uploads/email/<?php echo $row->attachment;?>" class="btn btn-info" ><i class='fa fa-search'></i> Download Attachment</a>
                    <?php
                        }
                    ?>
                    <a href="<?php echo base_url();?>index.php/mailbox/sendMail" class="btn btn-white" ><i class='fa fa-arrow-left'></i> Back</a>
                </div>
                
                <div class="clearfix"></div>

            </div>
        </div>
    </form>
</div>
