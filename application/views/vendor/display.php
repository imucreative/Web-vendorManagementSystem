<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Vendor <small>Display vendor.</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    
                </div>
            </div>
            <div class="ibox-content">
                
                <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'myform');
                    echo form_open('vendor/edit', $attributes);
                ?>
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Vendor</label>
                        <div class="col-sm-2">
                            <input type="text" name="vendorId" class="form-control" placeholder="* Code" value="<?php echo $row->vendorId;?>" readonly required/>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="* Name" value="<?php echo $row->name;?>" readonly required/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Category</label>
                        <div class="col-sm-11">
                            <input type="text" name="categoryId" class="form-control" placeholder="* Category" value="<?php echo $category->name;?>" readonly required/>

                            
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-1 control-label">Description</label>
                        <div class="col-sm-11">
                            <input type="text" name="description" class="form-control" placeholder="* Description" value="<?php echo $row->description;?>" readonly required/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Address</label>
                        <div class="col-sm-11">
                            <input type="text" name="address" class="form-control" placeholder="* Address" value="<?php echo $row->address;?>" readonly required/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Telp.</label>
                        <div class="col-sm-5">
                            <input type="text" name="telp" class="form-control" placeholder="* Telp" value="<?php echo $row->telp;?>" readonly required/>
                        </div>
                        <label class="col-sm-1 control-label">Fax</label>
                        <div class="col-sm-5">
                            <input type="text" name="fax" class="form-control" placeholder="* Fax" value="<?php echo $row->fax;?>" readonly required/>
                        </div>
                        
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" name="email" class="form-control" placeholder="* Email" value="<?php echo $row->email;?>" readonly required/>
                        </div>
                        <label class="col-sm-1 control-label">NPWP</label>
                        <div class="col-sm-5">
                            <input type="text" name="npwp" class="form-control" placeholder="* NPWP" value="<?php echo $row->npwp;?>" readonly required/>
                        </div>
                        
                    </div>
                    <div class="hr-line-dashed"></div>
                    
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-1">
                            <a href="<?php echo base_url();?>index.php/vendor" class="btn btn-white" ><i class='fa fa-arrow-left'></i> Cancel</a>
                            
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Catalog Vendor <small>Input.</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    
                </div>
            </div>
            <div class="ibox-content">

                <table class="table table-striped table-hover myTable" >
                    <thead>
                        <tr>
                            <th width='5%'><center>NO</center></th>
                            <th width='70%'><center>NAME</center></th>
                            <th width='25%'>
                                <center>
                                #
                                </center>
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($catalog as $rCatalog){
                        ?>
                                <tr>
                                    <td align='center'><?php echo $no;?></td>
                                    <td><?php echo $rCatalog->name;?></td>
                                    <td align='center'>
                                        <a href="<?php echo base_url();?>uploads/catalog/<?php echo $rCatalog->file;?>" target="_blank" class="btn btn-info btn-sm" ><i class='fa fa-download'></i> Download</a>
                                        
                                        
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
