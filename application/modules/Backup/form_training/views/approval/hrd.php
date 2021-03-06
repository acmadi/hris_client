<!-- BEGIN PAGE CONTAINER-->
<div class="page-content"> 
  <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
  <div id="portlet-config" class="modal hide">
    <div class="modal-header">
      <button data-dismiss="modal" class="close" type="button"></button>
      <h3>Widget Settings</h3>
    </div>
    <div class="modal-body"> Widget settings form goes here </div>
  </div>
  <div class="clearfix"></div>
  <div class="content">  
    
    
    <div id="container">
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4>View Permintaan <span class="semi-bold">Pelatihan</span></h4>
            </div>
            
            <div class="grid-body no-border">
            <form class="form-no-horizontal-spacing" id="formAppLv2"> 
              <?php
              if($form_training->num_rows()>0){
                foreach($form_training->result() as $user){
                  if($user->is_app_lv2 != 0){
                    $disabled = 'disabled="disabled"';
                  }else{
                    $disabled = '';
                  }

                  $approval_id = $user->approval_status_id_lv2;
                  $notes_hrd = $user->note_app_lv2;
                ?>
              <div class="row column-seperation">
                <div class="col-md-12">
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">NIK</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control" name="start_training" value="<?php echo (!empty($user_info))?$user_info['EMPLID']:'-';?>" disabled="disabled">
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Nama</label>
                    </div>
                    <div class="col-md-9">
                      <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->name?>" disabled="disabled">
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Jabatan</label>
                    </div>
                    <div class="col-md-9">
                      <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo (!empty($user_info))?$user_info['POSITION']:'-';?>" disabled="disabled">
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Dept/Bagian</label>
                    </div>
                    <div class="col-md-9">
                      <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama" value="<?php echo (!empty($user_info))?$user_info['ORGANIZATION']:'-';?>" disabled="disabled">
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Nama Program Pelatihan</label>
                    </div>
                    <div class="col-md-9">
                      <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Nama program pelatihan" value="<?php echo $user->training_name?>" disabled="disabled">
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Tujuan Pelatihan</label>
                    </div>
                    <div class="col-md-9">
                      <input name="form3LastName" id="form3LastName" type="text"  class="form-control" placeholder="Tujuan pelatihan" value="<?php echo $user->tujuan_training?>" disabled="disabled">
                    </div>
                  </div>
                </div>
              </div>

              <div clas="row column-seperation">
                <div class="col-md-12">
                  <div class="grid-title no-border">
                    <h4>Diisi oleh HRD</h4>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Penyelenggara</label>
                    </div>
                    <div class="col-md-9">
                      <div class="radio">
                          <?php if($penyelenggara->num_rows()>0){
                          foreach($penyelenggara->result() as $row){
							             $checked = ($user->penyelenggara_id<>0 && $user->penyelenggara_id == $row->id) ? 'checked = checked' : '';
                        ?>
                        <input id="penyelenggara<?php echo $row->id?>" type="radio" name="penyelenggara" value="<?php echo $row->id?>" <?php echo $disabled?> <?php echo $checked?>>
                        <label for="penyelenggara<?php echo $row->id?>"><?php echo $row->title?></label>
                        <?php }}else{?>
                        <input id="penyelenggara" type="radio" name="penyelenggara" value="0" checked="checked" <?php echo $disabled?> required>
                        <label for="penyelenggara">No Data</label>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Pembiayaan</label>
                    </div>
                    <div class="col-md-9">
                      <select name="pembiayaan" class="select2" id="pembiayaan" style="width:100%" <?php echo $disabled?>>
                          <?php if($pembiayaan->num_rows()>0){
                              foreach ($pembiayaan->result_array() as $key => $value) {
                              $selected = ($user->pembiayaan_id <> 0 && $user->pembiayaan_id == $value['id']) ? 'selected = selected' : '';
                              echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                              }}else{
                              echo '<option value="0">'.'No Data'.'</option>';
                              }
                              ?>

                      </select>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label for="besar_biaya" class="form-label text-right">Besar Biaya (Rp.)</label>
                    </div>
                    <div class="col-md-9">
                      <input name="besar_biaya" id="besar_biaya" type="text"  class="form-control" placeholder="Besar biaya (Rp.)" value="<?php echo $user->besar_biaya?>" <?php echo $disabled?> required>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Tempat Pelaksanaan</label>
                    </div>
                    <div class="col-md-9">
                      <input name="tempat" id="tempat" type="text"  class="form-control" placeholder="Tempat Pelaksanaan" value="<?php echo $user->tempat?>" <?php echo $disabled?> required>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Waktu Pelaksanaan</label>
                    </div>
                    <div class="col-md-9">
                      <div class="input-with-icon right">
                          <div class="input-append success date no-padding">
                              <input type="text" class="datepicker" id="training_date" name="tanggal" value="<?php echo $user->tanggal?>" <?php echo $disabled?> required>
                              <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Jam</label>
                    </div>
                    
                    <div class="col-md-9">
                      <div class="input-append bootstrap-timepicker">
                        <input name="jam" id="timepicker2" type="text" class="timepicker-24" value="<?php echo $user->jam?>" <?php echo $disabled?> required>
                        <span class="add-on">
                            <i class="icon-time"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <?php if(!empty($user->approval_status_id_lv2)){?>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Approval Status</label>
                    </div>
                    <div class="col-md-9">
                      <input name="approval_status" id="alamat_cuti" type="text"  class="form-control" placeholder="Nama" value="<?php echo $user->approval_status_lv2; ?>" disabled="disabled">
                    </div>
                  </div>
                  <?php } ?>

                  <?php if(!empty($user->note_app_lv2)){?>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Note (HRD) : </label>
                    </div>
                    <div class="col-md-9">
                      <textarea name="notes_hrd_update" class="custom-txtarea-form" placeholder="Note supervisor isi disini"><?=$notes_hrd?></textarea>
                    </div>
                  </div>
                  <?php } ?>

                </div>
              </div>
              <!-- end separation -->

              <div class="form-actions">
                <div class="col-md-12 text-center">
                  <div class="row wf-training">
                    <div class="col-md-4">
                      Diusulkan oleh,<br/><br/>
                       <p class="wf-approve-sp">
                          <span class="semi-bold"><?php echo $user->name?></span><br/>
                          <span class="small"><?php echo $user->created_on?></span><br/>
                        </p>
                    </div>
                    <div class="col-md-4">
                      Persetujuan atasan,<br/><br/>
                      <p class="wf-approve-sp">
                        <?php if ($user->is_app_lv1 == 1) { ?>
                        <span class="semi-bold"><?php echo $name_app_lv1?></span><br/>
                        <span class="small"><?php echo $user->date_app_lv1?></span>
                        <?php }else{?>
                        <span class="semi-bold"></span><br/>
                        <span class="small"></span>
                        <?php } ?>
                      </p>
                    </div>
                    <div class="col-md-4">
                          Mengetahui HRD,<br/><br/>
                          <?php if($user->is_app_lv2 == 1 && is_admin() == true){?>
                          <span class="semi-bold"><?php echo $name_app_lv2?></span><br/>
                          <span class="small"><?php echo $user->date_app_lv2?></span>
                          <br />
                          <button type='button' class='btn btn-info btn-small' title='Edit Approval' data-toggle="modal" data-target="#edittrainingModal"><i class='icon-paste'></i></button>
                          <?php }elseif($user->is_app_lv2 == 1 && is_admin() == false){?>
                          <span class="semi-bold"><?php echo $name_app_lv2?></span><br/>
                          <span class="small"><?php echo $user->date_app_lv2?></span>
                          <?php }else{
                            if(is_admin()){?>
                          <button class="btn btn-success btn-cons" id="btn_app_lv2" type=""><i class="icon-ok"></i>Approve</button>
                          <div class="btn btn-danger btn-cons" data-toggle="modal" data-target="#notapprovetrainingModal"><i class="icon-remove"></i>Not Approve</div>
                          <?php }}?>
                    </div>
                  </div>
                </div>
                </div>
                <?php }}?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- END PAGE --> 
  </div>
</div>

<!-- Edit approval training Modal -->
<div class="modal fade" id="notapprovetrainingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modaldialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Approval Form training</h4>
      </div>
      <p class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
      <div class="modal-body">
        <form class="form-no-horizontal-spacing" method="POST" action="<?php echo site_url('form_training/not_approve_hrd/'.$this->uri->segment(3))?>">
            <div class="row form-row">
              <div class="col-md-12">
                <label class="form-label text-left">Status Approval </label>
              </div>
              <div class="col-md-12">
                <div class="radio">
                  <?php 
                  if($approval_status->num_rows() > 0){
                    foreach($approval_status->result() as $app){
                      $checked = ($app->id <> 0 && $app->id == $approval_id) ? 'checked = "checked"' : '';
                      ?>
                  <input id="app_status<?php echo $app->id?>" type="radio" name="app_status" value="<?php echo $app->id?>" <?php echo $checked?>>
                  <label for="app_status<?php echo $app->id?>"><?php echo $app->title?></label>
                  <?php }}else{?>
                  <input id="app_status" type="radio" name="app_status" value="0">
                  <label for="app_status">No Data</label>
                    <?php } ?>
                </div>
              </div>
            </div>
            <div class="row form-row">
              <div class="col-md-12">
                <label class="form-label text-left">Note (HRD) : </label>
              </div>
              <div class="col-md-12">
                <textarea name="note_hrd" class="custom-txtarea-form" placeholder="Note supervisor isi disini"><?=$notes_hrd?></textarea>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>&nbsp;<?php echo lang('close_button')?></button> 
        <button type="submit"  class="btn btn-success btn-cons"><i class="icon-ok-sign"></i>&nbsp;<?php echo lang('save_button')?></button>
      </div>
        <?php echo form_close()?>
    </div>
  </div>
</div>
<!--end edit modal--> 


<!-- Edit approval training Modal -->
<div class="modal fade" id="edittrainingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modaldialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Approval HRD - Form training</h4>
      </div>
      <p class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
      <div class="modal-body">
        <form class="form-no-horizontal-spacing" method="POST" action="<?php echo site_url('form_training/update_approve_hrd/'.$this->uri->segment(3))?>">
            <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Penyelenggara</label>
                    </div>
                    <div class="col-md-9">
                      <div class="radio">
                          <?php if($penyelenggara->num_rows()>0){
                          foreach($penyelenggara->result() as $row){
                           $checked = ($user->penyelenggara_id<>0 && $user->penyelenggara_id == $row->id) ? 'checked = checked' : '';
                        ?>
                        <input id="penyelenggara<?php echo $row->id?>" type="radio" name="penyelenggara_update" value="<?php echo $row->id?>"  <?php echo $checked?>>
                        <label for="penyelenggara<?php echo $row->id?>"><?php echo $row->title?></label>
                        <?php }}else{?>
                        <input id="penyelenggara" type="radio" name="penyelenggara_update" value="0" checked="checked"  required>
                        <label for="penyelenggara">No Data</label>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Pembiayaan</label>
                    </div>
                    <div class="col-md-9">
                      <select name="pembiayaan_update" class="select2" id="pembiayaan" style="width:100%" >
                          <?php if($pembiayaan->num_rows()>0){
                              foreach ($pembiayaan->result_array() as $key => $value) {
                              $selected = ($user->pembiayaan_id <> 0 && $user->pembiayaan_id == $value['id']) ? 'selected = selected' : '';
                              echo '<option value="'.$value['id'].'" '.$selected.'>'.$value['title'].'</option>';
                              }}else{
                              echo '<option value="0">'.'No Data'.'</option>';
                              }
                              ?>

                      </select>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label for="besar_biaya" class="form-label text-right">Besar Biaya (Rp.)</label>
                    </div>
                    <div class="col-md-9">
                      <input name="besar_biaya_update" id="besar_biaya_update" type="text"  class="form-control" placeholder="Besar biaya (Rp.)" value="<?php echo $user->besar_biaya?>"  required>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Tempat Pelaksanaan</label>
                    </div>
                    <div class="col-md-9">
                      <input name="tempat_update" id="tempat" type="text"  class="form-control" placeholder="Tempat Pelaksanaan" value="<?php echo $user->tempat?>"  required>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Waktu Pelaksanaan</label>
                    </div>
                    <div class="col-md-9">
                      <div class="input-with-icon right">
                          <div class="input-append success date no-padding">
                              <input type="text" class="datepicker" id="training_date_update" name="tanggal_update" data-date-format="yyyy-mm-dd" value="<?php echo $user->tanggal?>"  required>
                              <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-right">Jam</label>
                    </div>
                    
                    <div class="col-md-9">
                      <div class="input-append bootstrap-timepicker">
                        <input name="jam_update" id="timepicker2" type="text" class="timepicker-24" value="<?php echo $user->jam?>"  required>
                        <span class="add-on">
                            <i class="icon-time"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="row form-row">
                    <div class="col-md-3">
                      <label class="form-label text-left">Status Approval </label>
                    </div>
                    <div class="col-md-9">
                      <div class="radio">
                        <?php 
                        if($approval_status->num_rows() > 0){
                          foreach($approval_status->result() as $app){
                            $checked = ($app->id <> 0 && $app->id == $approval_id) ? 'checked = "checked"' : '';
                            ?>
                        <input id="app_status_update<?php echo $app->id?>" type="radio" name="app_status_update" value="<?php echo $app->id?>" <?php echo $checked?>>
                        <label for="app_status_update<?php echo $app->id?>"><?php echo $app->title?></label>
                        <?php }}else{?>
                        <input id="app_status_update" type="radio" name="app_status_update" value="0">
                        <label for="app_status_update">No Data</label>
                          <?php } ?>
                      </div>
                    </div>
                  </div>

                  <div class="row form-row">
                    <div class="col-md-12">
                      <label class="form-label text-left">Note (HRD) : </label>
                    </div>
                    <div class="col-md-12">
                      <textarea name="note_hrd_update" class="custom-txtarea-form" placeholder="Note supervisor isi disini"><?=$notes_hrd?></textarea>
                    </div>
                  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>&nbsp;<?php echo lang('close_button')?></button> 
        <button type="submit"  class="btn btn-success btn-cons"><i class="icon-ok-sign"></i>&nbsp;<?php echo lang('save_button')?></button>
      </div>
        <?php echo form_close()?>
    </div>
  </div>
</div>
<!--end edit modal--> 


