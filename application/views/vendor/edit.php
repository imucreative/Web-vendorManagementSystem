<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Vendor <small>Form edit vendor.</small></h5>
                <?php
                    if($this->uri->segment(4)=="error"){
                ?>
                    <h5>&nbsp;&nbsp; <font color="red">* Required document only & Space Min 10Mb</font></h5>
                <?php
                    }
                ?>
                
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
                        <?php /* <div class="col-sm-2">
                            <input type="text" name="vendorId" class="form-control" placeholder="* Code" value="<?php echo $row->vendorId;?>" readonly required/>
                        </div> */ ?>
                        <div class="col-sm-11">
                            <input type="hidden" name="vendorId" value="<?php echo $row->vendorId;?>" readonly/>
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
                        <label class="col-sm-1 control-label">Provinsi.</label>
                        <div class="col-sm-5">
                            <input type="text" name="provinsi" class="form-control" placeholder="* Provinsi" value="<?php echo $row->provinsi;?>" required/>
                        </div>
                        <label class="col-sm-1 control-label">Kota</label>
                        <div class="col-sm-5">
                            <input type="text" name="kota" class="form-control" placeholder="* Kota" value="<?php echo $row->kota;?>" required/>
                        </div>
                        
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-1 control-label">Kelurahan.</label>
                        <div class="col-sm-11">
                            <input type="text" name="kelurahan" class="form-control" placeholder="* Kelurahan" value="<?php echo $row->kelurahan;?>" required/>
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

                    <?php
                    /*
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
                    */
                    ?>
                    
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-1">
                            <a href="<?php echo base_url();?>index.php/vendor" class="btn btn-white" ><i class='fa fa-arrow-left'></i> Cancel</a>
                            <button class="btn btn-primary" type="submit" name="submit"><i class='fa fa-save'></i> Save</button>
                            
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
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-form-catalog"><i class="fa fa-plus"></i> Input Catalog</a>
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
                                        <?php
                                            echo anchor("catalog/delete/".$rCatalog->vendorId."/".$rCatalog->catalogId, '<i class="fa fa-trash-o"></i>', ["class"=>"btn btn-danger btn-sm", "title"=>'Delete', "onclick"=>"return confirm('Are you sure delete this data?')"]);
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


<div class="modal inmodal" id="modal-form-catalog" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form');
                echo form_open_multipart('catalog/post', $attributes);
            ?>                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Input Catalog Vendor</h4>
                    <small class="font-bold">Input</small>
                </div>
                <div class="modal-body">
                    <div class="form-group"><label>* Catalog Name</label> 
                        <input type="hidden" name="vendorId" value="<?php echo $row->vendorId;?>" />
                        <input type="text" name="name" placeholder="* Name" class="form-control" required />
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group"><label>* File</label> 
                        <input type="file" name="catalog" placeholder="*" class="form-control" required />
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="submit" name="submit" class="btn btn-primary"  id="btnSave" ><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
