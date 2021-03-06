$(document).ready(function() {
	$(".select2").select2();

    //Date Pickers
      $('.input-append.date').datepicker({
                autoclose: true,
                todayHighlight: true
       });

    $('#btnAdd').on('click', function () {
    $(document).find("select.select2").select2();
    $('.rupiah').maskMoney({precision: 0});
    $('#btnRemove').show();
    });
      
    $('button[data-loading-text]').click(function () {
    $(this).button('loading');
    });

    var url = $.url();
    var baseurl = url.attr('protocol')+'://'+url.attr('host')+'/'+url.segment(1)+'/';
    var uri1 = url.segment(2)+'/do_approve/'+url.segment(4)+'/lv1';
    var uri2 = url.segment(2)+'/do_approve/'+url.segment(4)+'/lv2';
    var uri3 = url.segment(2)+'/do_approve/'+url.segment(4)+'/lv3';
    var uri4 = url.segment(2)+'/do_approve/'+url.segment(4)+'/hrd';
    var uriSubmit = url.segment(2)+'/do_submit/'+url.segment(4);

    $('#btn_submit').click(function(){
        $('#formSpdLuar').submit(function(ev){
            $.ajax({
                type: 'POST',
                url: baseurl+uriSubmit,
                data: $('#formSpdLuar').serialize(),
                success: function() {
                     location.reload()
                }
            });
            ev.preventDefault(); 
        });  
    });

    $('#btn_app_lv1').click(function(){
        $('#formSpdLuar').submit(function(ev){
            $.ajax({
                type: 'POST',
                url: baseurl+uri1,
                data: $('#formSpdLuar').serialize(),
                success: function() {
                     location.reload()
                }
            });
            ev.preventDefault(); 
        });  
    });

    $('#btn_app_lv2').click(function(){
        $('#formSpdLuar').submit(function(ev){
            $.ajax({
                type: 'POST',
                url: baseurl+uri2,
                data: $('#formSpdLuar').serialize(),
                success: function() {
                     location.reload()
                }
            });
            ev.preventDefault(); 
        });  
    });

    $('#btn_app_lv3').click(function(){
        $('#formSpdLuar').submit(function(ev){
            $.ajax({
                type: 'POST',
                url: baseurl+uri3,
                data: $('#formSpdLuar').serialize(),
                success: function() {
                     location.reload()
                }
            });
            ev.preventDefault(); 
        });  
    });

    $('#btn_app_hrd').click(function(){
        $('#formSpdLuar').submit(function(ev){
            $.ajax({
                type: 'POST',
                url: baseurl+uri4,
                data: $('#formSpdLuar').serialize(),
                success: function() {
                     location.reload()
                }
            });
            ev.preventDefault(); 
        });  
    });


    //add spd_luar
    var url = $.url();
    var baseurl = url.attr('protocol')+'://'+url.attr('host')+'/'+url.segment(1)+'/';
    var spd_luar_url = baseurl+'form_spd_luar';
                $('#add_spd_luar').submit(function(response){
                    $.post($('#add_spd_luar').attr('action'), $('#add_spd_luar').serialize(),function(json){
                        if(json.st == 0){
                            $('#MsgBad').html(json.errors).fadeIn();
                        }else{
                            window.location.href = spd_luar_url;
                        }
                    }, 'json');
                    return false;
                });

    //add spd_luar_report
    var url = $.url();
    var baseurl = url.attr('protocol')+'://'+url.attr('host')+'/hris_client/';
    var spd_luar_url = baseurl+'form_spd_luar';
                $('#add_spd_luar_report').submit(function(response){
                    $.post($('#add_spd_luar_report').attr('action'), $('#add_spd_luar_report').serialize(),function(json){
                        if(json.st == 0){
                            $('#MsgBad').html(json.errors).fadeIn();
                        }else{
                            window.location.href = spd_luar_url;
                        }
                    }, 'json');
                    return false;
                });
});	
	 