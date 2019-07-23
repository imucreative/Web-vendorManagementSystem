<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Category <small>Data Category Vendor.</small></h5>
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

                <table class="table table-striped table-hover categoryTable" >
                    <thead>
                        <tr>
                            <th width='10%'><center>NO</center></th>
                            <th width='75%'><center>CATEGORY NAME</center></th>
                            <th width='15%'>
                                <center>
                                    <button class="btn btn-primary btn-sm" onclick="addCategory()"><i class="fa fa-plus"></i> Input</button>
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





<div class="modal inmodal" id="modal-form-category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <form action="#" id="form" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Category Form</h4>
                    <small class="font-bold">Category Form</small>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="" name="categoryId"/> 
                    <div class="form-group"><label>* Category Name</label> 
                        <input type="text" name="name" placeholder="Name" class="form-control nameCategory" />
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    <button type="button" class="btn btn-primary"  id="btnSave" onclick="save()"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

