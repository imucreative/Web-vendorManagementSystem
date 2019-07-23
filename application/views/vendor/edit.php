<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Vendor <small>Form edit vendor.</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    
                </div>
            </div>
            <div class="ibox-content">
                
                <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'myform');
                    echo form_open_multipart('vendor/edit', $attributes);
                ?>
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Vendor</label>
                        <div class="col-sm-2">
                            <input type="text" name="vendorId" class="form-control" placeholder="* Code" value="<?php echo $row->vendorId;?>" readonly required/>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="* Name" value="<?php echo $row->name;?>" required/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Category</label>
                        <div class="col-sm-11">
                            <select class="form-control" name="categoryId">
                                <?php
                                    foreach ($category as $cat){
                                        echo "<option value='$cat->categoryId' ";
                                        echo $cat->categoryId==$row->categoryId?'selected':'';
                                        echo ">$cat->name</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Description</label>
                        <div class="col-sm-11">
                            <input type="text" name="description" class="form-control" placeholder="* Description" value="<?php echo $row->description;?>" required/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Address</label>
                        <div class="col-sm-11">
                            <input type="text" name="address" class="form-control" placeholder="* Address" value="<?php echo $row->address;?>" required/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Telp.</label>
                        <div class="col-sm-5">
                            <input type="text" name="telp" class="form-control" placeholder="* Telp" value="<?php echo $row->telp;?>" required/>
                        </div>
                        <label class="col-sm-1 control-label">Fax</label>
                        <div class="col-sm-5">
                            <input type="text" name="fax" class="form-control" placeholder="* Fax" value="<?php echo $row->fax;?>" required/>
                        </div>
                        
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" placeholder="* Email" value="<?php echo $row->email;?>" required/>
                        </div>
                        <label class="col-sm-1 control-label">NPWP</label>
                        <div class="col-sm-5">
                            <input type="text" name="npwp" class="form-control" placeholder="* NPWP" value="<?php echo $row->npwp;?>" required/>
                        </div>
                        
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Catalog</label>
                        <div class="col-sm-4">
                            <input type="file" name="catalog" class="file-input" />
                        </div>
                        <div class="col-sm-7">
                            <font color="red"><?php echo $gagalInputCatalog;?></font>
                        </div>
                        
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-1">
                            <a href="<?php echo base_url();?>index.php/vendor" class="btn btn-white" ><i class='fa fa-arrow-left'></i> Cancel</a>
                            <button class="btn btn-primary" type="submit" name="submit"><i class='fa fa-save'></i> Save</button>
                            <?php
                                if($row->catalog){
                            ?>
                                <a href="<?php echo base_url();?>uploads/catalog/<?php echo $row->catalog;?>" class="btn btn-info" ><i class='fa fa-search'></i> Download Catalog</a>
                            <?php
                                }
                            ?>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
