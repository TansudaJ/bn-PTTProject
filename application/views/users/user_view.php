<!-- <div class="row">
        <div class="col-md-12 col-xs-12">
          
          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?> -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title "><?php echo $navbar_name?></h4>
                </div>
                <div class="card-body">
                <div class="text-right">
                <div class="table-responsive">
                  <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">รหัสพนักงาน</th>
                            <th class="text-center">ชื่อ-นามสกุล</th>
                            <th class="text-center">สถานะ</th>
                            <th class="text-center">สิทธิการใช้งาน</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody> 	
                    <?php foreach ($userView as $row){?>
                        <tr>
                            <td class="text-center"><?php echo $row->employeeID; ?></td>
                            <td><?php echo $row->f_name ." ".$row->l_name; ?></td>
                            
                            <td class="text-center">
                                <?php if($row->activeflag == '1') { ?>
                                  <span class="badge badge-success">Active</span>
                                  
                                <?php } 
                                else { ?>
                                <span class="badge badge-danger">Inactive</span>
                                  
                                <?php } ?>
                            </td>
                            <td class="text-center"><?php echo $row->n_authority; ?></td>
                            <td class="text-center">
                                  <button type="button" title="View" class="btn btn-info btn-sm"  href="<?php echo site_url("Users/view"); ?>"><i class="material-icons">info</i></button>
                                  <button type="button" title="Edit" class="btn btn-warning btn-sm" ><i class="material-icons">edit</i></button>    
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                  </div>
    
                  
                </div>
              </div>
            </div>
          </div>
          </div>
          
     
      <!-- </div> -->

 