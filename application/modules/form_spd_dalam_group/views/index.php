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
            <div class="grid simple ">
              <div class="grid-title no-border">
                <h4>Form <a href="<?php echo site_url('form_spd_dalam_group')?>">Perjalanan Dinas <span class="semi-bold">Dalam Kota (Group)</span></a></h4>
                <div class="tools"> 
                  <a href="<?php echo site_url() ?>form_spd_dalam_group/input" class="config"></a>
                </div>
              </div>
                <div class="grid-body no-border"> 
                        <table class="table table-striped table-flip-scroll cf">
                            <thead>
                              <tr>
                                <th width="90%">Kegiatan</th>
                                <!-- <th width="9%">Pemberi tugas</th>
                                <th width="10%">Waktu</th>
                                <th width="10%">Keterangan</th> -->
                                <th width="10%" colspan="2" class="text-center">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if ($_num_rows > 0) { ?>
                              <?php foreach ($form_spd_dalam_group as $spd) : ?>
                              <?php
                                $peserta = getAll('users_spd_dalam_group', array('id'=>'where/'.$spd->id))->row('task_receiver');
                                $p = explode(",", $peserta);
                                $user_submit = getAll('users_spd_dalam_group', array('id'=>'where/'.$spd->id))->row('user_submit');
                                $receiver_submit = explode(",", $user_submit);
                                $report_num = getAll('users_spd_dalam_report_group', array('user_spd_dalam_group_id'=>'where/'.$spd->id, 'created_by'=>'where/'.$sess_id))->num_rows();

                                $hidden = (!in_array(get_nik($sess_id), $p)) ? 'style="display:none"' : '';
                                $btn_sub = (in_array(get_nik($sess_id), $p) && !in_array(get_nik($sess_id), $receiver_submit)) ? 'Submit' :((in_array(get_nik($sess_id), $p) && in_array(get_nik($sess_id), $receiver_submit))?'Submitted':'');
                                $btn_rep = ($report_num>0)?'View Report':(($report_num < 1 && in_array(get_nik($sess_id), $receiver_submit))?'Create Report':'Report');
                               ?>
                                <tr>
                                  <td>
                                    <a href="<?php echo base_url() ?>form_spd_dalam_group/submit/<?php echo $spd->id ?>"><h4><?php echo $spd->title ?></h4>
                                      <div class="small-text-custom">
                                        <span>Pemberi tugas : </span><?php echo $spd->creator ?><br/>
                                        <span>Penerima tugas : </span>
                                        <?php
                                          for($i=0;$i<sizeof($p);$i++):
                                            $n = get_name($p[$i]).',';
                                        ?>
                                          <a href="<?php echo site_url('form_spd_dalam_group/submit/'.$spd->id)?>"><?php echo $n;?></a>
                                        <?php endfor;?><br/>
                                        <span>Tanggal : </span><?php echo dateIndo($spd->date_spd) .', '. date('H:i',strtotime($spd->start_time)) .' - '. date('H:i',strtotime($spd->end_time)) ?> WIB<br/>
                                        <span>Tempat : </span><?php echo $spd->destination ?>
                                      </div>
                                    </a>
                                  </td>
                                  <td>
                                    <div class="list-actions" class="text-center">
                                      <a href="<?php echo base_url() ?>form_spd_dalam_group/submit/<?php echo $spd->id ?>">
                                        <button class="btn btn-primary btn-cons" type="button" <?php echo $hidden?>>
                                          <i class="icon-ok"></i>
                                           <?php echo $btn_sub; ?>
                                        </button>
                                      </a>
                                        <button class="btn btn-info btn-cons" type="button" onclick='window.location.href="<?php echo base_url()?>form_spd_dalam_group/report/<?php echo $spd->id ?>"'>
                                          <i class="icon-paste"></i>
                                          <?php echo $btn_rep; ?>
                                        </button>
                                      <a href="<?php echo base_url() ?>form_spd_dalam_group/pdf/<?php echo $spd->id ?>">
                                        <button class="btn btn-info btn-cons" type="button">
                                          <i class="icon-print"></i>
                                          Print
                                        </button>
                                      </a>
                                    </div>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
      </div>
    </div>
            
  
    </div>
  
</div>  
<!-- END PAGE -->