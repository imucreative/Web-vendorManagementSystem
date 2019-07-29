<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Users <small>Data Users.</small></h5>
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

                <table class="table table-striped table-hover usersTable" >
                    <thead>
                        <tr>
                            <th width='10%'><center>NO</center></th>
                            <th width='30%'><center>NAME</center></th>
                            <th width='20%'><center>USERNAME</center></th>
                            <th width='10%'><center>STATUS</center></th>
                            <th width='15%'>
                                <center>
                                    <button class="btn btn-primary btn-sm" onclick="addUsers()"><i class="fa fa-plus"></i> Input</button>
                                </center>
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        
                    </tbody>
                    
                </table>

            </div>
        </div>
    </div>
</div>


<div class="modal inmodal" id="modal-form-users" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <form action="#" id="form" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Users Form</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="" name="userId"/> 
                    <div class="form-group"><label>* Name</label> 
                        <input type="text" name="name" placeholder="Name" class="form-control name" />
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group"><label>* Username</label> 
                    <div class="form-group has-feedback">
                        <input type="text" name="username" placeholder="Username" class="form-control username" />
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                        <span class="help-block"></span>
                    </div>
                    <div class="form-group"><label>* Password</label> 
                        <div class="form-group has-feedback">
                        <input type="password" name="password" placeholder="Password" class="form-control password" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <span class="help-block"></span>
                    </div>
                    

                    <div class="form-group statusUser"><label>* Status</label> 
                    <select class="form-control" name="status">
                        <?php
                            foreach ($status as $stat){
                                echo "<option value='$stat->statusId'>$stat->name</option>";
                            }
                        ?>
                    </select>
                    </div>

                    

                    <div class="form-group dispStatusUser"><label>* Status</label> 
                    <input type="text" readonly placeholder="Status" class="form-control status" />
                    </div>

                    <div class="form-group dispVendor"><label>* Vendor</label> 
                    <input type="text" readonly placeholder="Vendor" class="form-control vendorName" />
                    </div>

                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="button" class="btn btn-primary"  id="btnSave" onclick="save()"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
