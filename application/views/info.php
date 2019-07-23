<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Information <small>Company.</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    
                </div>
            </div>
            <div class="ibox-content">
                <?php
                    echo form_open('info', "class='form-horizontal'");
                ?>
                    <input type="hidden" name="infoId" value="<?php echo $row->infoId;?>" />
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Name</label>
                        <div class="col-sm-7">
                            <input type="text" placeholder="* Name" name="name" class="form-control" value="<?php echo $row->name;?>" required />
                        </div>

                        <label class="col-sm-1 control-label">Alias</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="* Alias" name="alias" class="form-control" value="<?php echo $row->alias;?>" required />
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Address</label>
                        <div class="col-sm-11">
                            <input type="text" placeholder="* Address" name="address" class="form-control" value="<?php echo $row->address;?>" required /> 
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Telp.</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="* Telp" name="telp" class="form-control" value="<?php echo $row->telp;?>" required />
                        </div>

                        <label class="col-sm-1 control-label">Fax.</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="* Fax" name="fax" class="form-control" value="<?php echo $row->fax;?>" required />
                        </div>

                        <label class="col-sm-1 control-label">Email</label>
                        <div class="col-sm-3">
                            <input type="text" placeholder="* Email" name="email" class="form-control" value="<?php echo $row->email;?>" required />
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
<!--
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Logo</label>
                        <div class="col-sm-1">
                            <img width='100%' src="<?php //echo base_url();?>uploads/<?php //echo $row->logo;?>"/>
                        </div>
                        <div class="col-sm-7">
							<input type="file" id="form-field-6" name="userfile" class="file-input" required/>
                        </div>
                        
                    </div>
                    <div class="hr-line-dashed"></div>
-->

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-1">
                            <button class="btn btn-primary" name="submit" type="submit"><div class="fa fa-save"></div> Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>