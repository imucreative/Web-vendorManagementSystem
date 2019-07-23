<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content">
        
            <div class="row">
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-success pull-right">Data All Category</span>
                            <h5><a href="<?php echo base_url();?>index.php/category">Category</a></h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php echo getCountTable("dtbcategory");?></h1>
                            <small>Total</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-info pull-right">Data All Vendor</span>
                            <h5><a href="<?php echo base_url();?>index.php/vendor">Vendor</a></h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php echo getCountTable("dtbvendor");?></h1>
                            <small>Total</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">Sendmail Success</span>
                            <h5><a href="<?php echo base_url();?>index.php/mailbox/sendmail">Sendmail</a></h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?php echo getCountTable("dtremail");?></h1>
                            <small>Total</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content text-center p-md">

                            <h2>
                                <span class="text-navy">Welcome in Vendor Management System <?php echo get_data_info('name');?></span>
                            </h2>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
