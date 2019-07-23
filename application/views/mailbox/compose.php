<div class="row">
    <?php
        $vendorId = $this->uri->segment(3);
        $attributes = array('class' => 'form-horizontal', 'id' => 'form');
        echo form_open_multipart('mailbox/compose', $attributes);
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
                <div class="pull-right tooltip-demo">
                <button type="submit" name="submit" class="btn btn-sm btn-primary send" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Send</button>
                </div>
                <h2>
                    Compose mail
                </h2>
            </div>
            <div class="mail-box">
                <div class="mail-body">
                    
                    <input type="hidden" name="vendorId" class="form-control to" value="<?php echo $row->vendorId;?>" />

                    <div class="form-group form-group-from"><label class="col-sm-2 control-label">From:</label>
                        <div class="col-sm-10"><input type="text" name="from" class="form-control from" value="<?php echo get_data_info('email');?>" required /></div>
                    </div>
                    <div class="form-group form-group-to"><label class="col-sm-2 control-label">To:</label>
                        <div class="col-sm-10">
                            
                            <input type="text" name="to" class="form-control to" value="<?php echo $row->email;?>" placeholder="*" required />
                            
                            <?php
                            /*
                            <select class="form-control" name="to">
                                <?php
                                    foreach ($email as $e){
                                        echo "<option value='$e->email' ";
                                        echo $e->email==$row->email?'selected':'';
                                        echo ">$e->name - $e->email</option>";
                                    }
                                ?>
                            </select>
                            */
                            ?>
                        </div>
                    </div>
                    <div class="form-group form-group-cc"><label class="col-sm-2 control-label">Cc:</label>
                        <div class="col-sm-10"><input type="text" name="cc" class="form-control cc" value="" placeholder="*" /></div>
                    </div>
                    <div class="form-group form-group-subject"><label class="col-sm-2 control-label">Subject:</label>
                        <div class="col-sm-10"><input type="text" name="subject" class="form-control subject" value="" placeholder="*" required /></div>
                    </div>
                    <div class="form-group form-group-subject"><label class="col-sm-2 control-label">Attachment:</label>
                        <div class="col-sm-10" valign="center"><input type="file" name="attachment" class="file-input" /></div>
                    </div>

                    

                </div>
    

                <div class="mail-text h-300">
                    
                    <textarea id="compose-textarea" class="form-control message" style="height: 300px" name="message" required >
                      
                    </textarea>

                    
                    <div class="clearfix"></div>
                </div>
                <div class="mail-body text-right tooltip-demo">
                    <button type="submit" name="submit" class="btn btn-sm btn-primary send" data-toggle="tooltip" data-placement="top" title="Send"><i class="fa fa-reply"></i> Send</button>
                </div>
                <div class="clearfix"></div>

            </div>
        </div>
    </form>
</div>
