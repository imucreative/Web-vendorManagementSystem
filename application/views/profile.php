<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Information <small>Profile.</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    
                </div>
            </div>
            <div class="ibox-content">
                <?php
                    echo form_open('info/saveProfile', "class='form-horizontal'");
                ?>
                    <input type="hidden" name="userId" value="<?php echo $this->session->userdata('userId');?>" />
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Name</label>
                        <div class="col-sm-11">
                            <input type="text" placeholder="* Name" name="name" class="form-control" value="<?php echo $this->session->userdata('name');?>" required readonly />
                        </div>

                        
                    </div>

                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Username</label>
                        <div class="col-sm-5">
                            <div class="input-group m-b">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span> 
                                <input type="text" placeholder="* Username" name="username" class="form-control" value="<?php echo $this->session->userdata('username');?>" required readonly /> 
                            </div>    
                        </div>

                        <label class="col-sm-1 control-label">Password</label>
                        <div class="col-sm-5">
                            <div class="input-group m-b">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 
                                <input type="password" placeholder="* Password" name="password" class="form-control" value="" maxlength='20' required /> 
                            </div>
                        </div>
                    </div>

                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Status</label>
                        <div class="col-sm-11">
                            
                            <div class="radio i-checks">
                                <label> 
                                    <input type="radio" value="1" <?php echo ($this->session->userdata('status')=='1')?'checked':'disabled' ?> name="status" > <i></i> Administrator 
                                </label>
                            </div>
                            <div class="radio i-checks">
                                <label> 
                                    <input type="radio" value="2" <?php echo ($this->session->userdata('status')=='2')?'checked':'disabled' ?> name="status" > <i></i> Procurement 
                                </label>
                            </div>

                        </div>

                        
                    </div>

                    <!--
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Logo</label>
                        <div class="col-sm-11">
                            <input type="text" placeholder="Logo" name="logo" class="form-control" value="<?php echo $row->logo;?>" />
                        </div>
                    </div>
                    -->

                    <div class="hr-line-dashed"></div>

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
