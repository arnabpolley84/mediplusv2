<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <p>Please wait...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!-- Modal -->
<style type="text/css">
  .form-group .form-control {
            border: 1px solid silver !important;
        }
</style>
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Reply to Email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo form_open('appointmentreply'); ?>
            <!-- <input type="hidden" name="appointment_type" class="appointment_type" value="A"> -->

           <input type="hidden" name="amsgr" class="amsgr" value="">
           <input type="hidden" name="app_idr" class="app_idr" value="">
           <input type="hidden" name="app_fullnamer" class="app_fullr" value="">
           <input type="hidden" name="app_emailr" class="app_emailr" value="">
           <input type="hidden" name="app_typer" class="app_typer" value="">
           <input type="hidden" name="app_createdonr" class="app_createdonr" value="">

              <!-- <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_fname" class="text-black">First Name</label>
                    <input type="text" required="required"  class="form-control" name="fname" id=fname">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_lname" class="text-black">Last Name</label>
                    <input type="text" required="required"  name="lname" class="form-control" id="lname">
                  </div>
                </div>
              </div> -->

              <!-- <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input required="required" type="text" class="form-control" name="fname" id="appointment_name">
              </div> -->
              <div class="form-group">
                <label for="appointment_to" class="text-black">To</label>
                <input type="email" required="required"  class="form-control" name="appointment_to" id="appointment_to">
              </div>
              <div class="form-group">
                <label for="appointment_cc" class="text-black">Cc</label>
                <input type="email" required="required"  class="form-control" name="appointment_cc" id="appointment_cc">
              </div>
              <div class="form-group">
                <label for="appointment_subject" class="text-black">Subject</label>
                <input type="appointment_subject" required="required"  class="form-control" name="appointment_subject" id="appointment_subject">
              </div>
              <!-- <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" required="required"  class="form-control" name="date" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" required="required"  name="time" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div> -->
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea required="required"  name="appointment_message" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="sendmessage" value="Send Reply" class="btn btn-primary">
              </div>
            <?php echo form_close(); ?>
          </div>
          
        </div>
      </div>
    </div>












<!-- Jquery Core Js -->

    <script src="<?php echo ASSET_URL; ?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo ASSET_URL; ?>plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <!-- <script src="<?php echo ASSET_URL; ?>plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo ASSET_URL; ?>plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo ASSET_URL; ?>plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo ASSET_URL; ?>plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo ASSET_URL; ?>plugins/flot-charts/jquery.flot.time.js"></script>
 -->
    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo ASSET_URL; ?>plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo ASSET_URL; ?>js/admin.js"></script>
    <!-- <script src="<?php echo ASSET_URL; ?>js/pages/index.js"></script> -->

    <!-- Demo Js -->
    <script src="<?php echo ASSET_URL; ?>js/demo.js"></script>

    <script src="<?php echo ASSET_URL; ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo ASSET_URL; ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    

    <!-- Custom Js -->
    
    <script src="<?php echo ASSET_URL; ?>js/pages/tables/jquery-datatable.js"></script>



    <!-- Ckeditor -->
    <!-- <script src="<?php echo ASSET_URL; ?>plugins/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      
      CKEDITOR.config.colorButton_backStyle = {
  element: 'span',
  styles: { 'background-color': '#(color)' }
};

CKEDITOR.config.colorButton_colors = '1ABC9C,2ECC71,3498DB,9B59B6,4E5F70,F1C40F,' +
  '16A085,27AE60,2980B9,8E44AD,2C3E50,F39C12,' +
  'E67E22,E74C3C,ECF0F1,95A5A6,DDD,FFF,' +
  'D35400,C0392B,BDC3C7,7F8C8D,999,000';
    </script> -->


    <!--Tinymceeditor-->

    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=qagffr3pkuv17a8on1afax661irst1hbr4e6tbv888sz91jc"></script>
    <script type="text/javascript">
      
    tinymce.init({
      selector: 'textarea',
      plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help',
      toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
      image_advtab: true,
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tiny.cloud/css/codepen.min.css'
      ],
      link_list: [
        { title: 'My page 1', value: 'http://www.tinymce.com' },
        { title: 'My page 2', value: 'http://www.moxiecode.com' }
      ],
      image_list: [
        { title: 'My page 1', value: 'http://www.tinymce.com' },
        { title: 'My page 2', value: 'http://www.moxiecode.com' }
      ],
      image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
      ],
      importcss_append: true,
      height: 300,
      file_picker_callback: function (callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
          callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }

        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
          callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }

        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
          callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
      },
      templates: [
        { title: 'Some title 1', description: 'Some desc 1', content: 'My content' },
        { title: 'Some title 2', description: 'Some desc 2', content: '<div class="mceTmpl"><span class="cdate">cdate</span><span class="mdate">mdate</span>My content2</div>' }
      ],
      template_cdate_format: '[CDATE: %m/%d/%Y : %H:%M:%S]',
      template_mdate_format: '[MDATE: %m/%d/%Y : %H:%M:%S]',
      image_caption: true,
      
      spellchecker_dialog: true,
      spellchecker_whitelist: ['Ephox', 'Moxiecode']
     });

    </script>

    <script type="text/javascript">
      function applyTinyMce(elm=false){
      //applying tinymce settings after cloning from last elem

                          //tinymce.remove('textarea.ta-formcontrol');
                          /*$("."+elm+":last").find('textarea').removeClass('ta-formcontrol');
                          $("."+elm+"last").find('textarea').addClass('tinym');*/
                          //tinymce.remove('textarea.ta-formcontrol');
                          var lasttextarea=$("."+elm+":last").find('textarea');
                          lasttextarea.each(function() {
                            var counter=1;
                            var tid=$( this ).attr('id');
                            //alert('tid is : '+tid);
                            $( this ).attr('id',tid+counter);
                            counter++;
                            /*tinymce.get(tid).setContent(' ');
                            $( this ).val(' ');*/
                          });
                          $("."+elm+":last").find("form").attr('novalidate', 'novalidate');
                          /*var mysettings = $(".tinymce").last().GETEDITORSETTINGS;
                          $(".button").click(function(){
                             mysettings.selector = ".newtextarea";
                             tinyMCE.init(mysettings);
                          });*/
                          
                          /*tinymce.init({selector:".tinym"});
                          var settings = tinymce.activeEditor.settings;
                          settings.selector='.tinym';
                          tinymce.init(settings);*/

                          //reinitializing the settings
                          tinymce.init({
                            selector: 'textarea',
                            plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount tinymcespellchecker a11ychecker imagetools textpattern help',
                            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
                            image_advtab: true,
                            content_css: [
                              '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                              '//www.tiny.cloud/css/codepen.min.css'
                            ],
                            link_list: [
                              { title: 'My page 1', value: 'http://www.tinymce.com' },
                              { title: 'My page 2', value: 'http://www.moxiecode.com' }
                            ],
                            image_list: [
                              { title: 'My page 1', value: 'http://www.tinymce.com' },
                              { title: 'My page 2', value: 'http://www.moxiecode.com' }
                            ],
                            image_class_list: [
                              { title: 'None', value: '' },
                              { title: 'Some class', value: 'class-name' }
                            ],
                            importcss_append: true,
                            height: 300,
                            file_picker_callback: function (callback, value, meta) {
                              /* Provide file and text for the link dialog */
                              if (meta.filetype === 'file') {
                                callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                              }

                              /* Provide image and alt text for the image dialog */
                              if (meta.filetype === 'image') {
                                callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                              }

                              /* Provide alternative source and posted for the media dialog */
                              if (meta.filetype === 'media') {
                                callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                              }
                            },
                            templates: [
                              { title: 'Some title 1', description: 'Some desc 1', content: 'My content' },
                              { title: 'Some title 2', description: 'Some desc 2', content: '<div class="mceTmpl"><span class="cdate">cdate</span><span class="mdate">mdate</span>My content2</div>' }
                            ],
                            template_cdate_format: '[CDATE: %m/%d/%Y : %H:%M:%S]',
                            template_mdate_format: '[MDATE: %m/%d/%Y : %H:%M:%S]',
                            image_caption: true,
                            
                            spellchecker_dialog: true,
                            spellchecker_whitelist: ['Ephox', 'Moxiecode']
                           });


                          //tinymce.init({selector:".tinym"});
                          $("."+elm+":last").find('textarea').removeClass('tinym');
                          $("."+elm+":last").find('textarea').addClass('ta-formcontrol');
      }

      function removeTinyMce(elm=false){
        //removing tinymce settings before cloning from last elem
                    $("."+elm+":last").find('textarea').removeClass('ta-formcontrol');
                    $("."+elm+":last").find('textarea').addClass('tinym');
                    tinymce.remove('textarea.tinym');
      }
    </script>
    



    <script type="text/javascript">
        $(document).ready(function(){
          $("form").attr('novalidate', 'novalidate');
              /*$('.menu_link').prop("disabled", true);*/
              //$('.pageset').change(function(){
              $(document).on("change",".pageset",function(){
                //alert('clicked');
                //$(".pageset option:selected").prop('selected' , false)
                var pageid=$('select.pageset option:selected').val();
                var pagename=$('select.pageset option:selected').text();
                if(!pageid){
                  var pageid=$(this).val();
                }
                //alert(pageid);
                //return false;
                $('.menu_link').val(pagename + '/' + pageid);
                $('.menu_link_hid').val(pagename + '/' + pageid);  
                return false;
              });

              $(document).on("change",".editpageset",function(){
                //alert('clicked');
                //$(".pageset option:selected").prop('selected' , false)
                var pageid=$('select.editpageset option:selected').val();
                var pagename=$('select.editpageset option:selected').text();
                if(!pageid){
                  var pageid=$(this).val();
                }
                //alert(pageid);
                //return false;
                $('.edit_menu_link').val(pagename + '/' + pageid);
                $('.edit_menu_link_hid').val(pagename + '/' + pageid);  
                return false;
              });
              
            
                                      
                                    
            $(".message").delay(5000).fadeOut(800);
                
                $(document).on('click','.lever',function(){ 
                    var setstatus=0;
                    if($(this).attr('data-stat')==0) {
                        $(this).attr('data-stat',1);
                        var setstatus=1;
                    }else{
                        $(this).attr('data-stat',0);
                        var setstatus=0;
                    }
                    var status = setstatus; 
                    var msg = (status=='0')? 'Deactivate' : 'Activate'; 
                    if(confirm("Are you sure to "+ msg))
                    { 
                        var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        url = "<?php echo base_url().'admin/content/update_status'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id,"status":status}, 
                              success: function(data) { 
                                //alert(data);
                              location.reload();
                        } });
                     }  
                 });

                $(document).on('click','.del',function(){ 
                    
                    var delstatus = 1; 
                    var msg = 'delete this?'; 
                    if(confirm("Are you sure to "+ msg))
                    { 
                        var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        url = "<?php echo base_url().'admin/content/update_delete_status'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id,"status":delstatus}, 
                              success: function(data) { 
                                //alert(data);
                              location.reload();
                        } });
                     }  
                 });

                $(document).on('click','.edit',function(){ 
                    var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        //alert(id);
                        url = "<?php echo base_url().'admin/content/edit_slider_view'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id}, 
                              success: function(data) { 
                                //alert(data);
                                $('.modal-body').html(data);
                                
                              //location.reload();
                    } });
                      
                 });

    
                  //fourth section
                  $(".addmore").click(function(){
                    var del="<p class='dele'><input style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect delt' type='button' name='' value='Delete this' /></p>";
                    
                    
                    removeTinyMce('lists');

                    

                    var cnt=$('.lists').length;
                    var listid=$(".lists:last").find('.listid').val();
                    var listidnext=(parseInt(listid) + 1);
                    if(cnt == 1){
                        //$('.dele:last').remove();
                        $(".lists:last").clone().val('').appendTo(".containerclone").find('input:last').val('');
                        //tinymce.EditorManager.execCommand('mceRemoveControl',true, cnt);
                        //count++;
                        
                        //$('textarea:nth-last-child(3)').html('');
                        $(".lists:last").find('textarea').html('');
                        
                        

                        $(".lists:last").find('textarea').val('');

                        

                        $(".lists:last").find('select').prop('selectedIndex',0);
                        $(".lists:last").prepend( del );
                        $(".lists:last").find('.listid').val(listidnext);
                        $('.lists:last').find('.isdeleted').val('0');
                    }else{
                        $(".lists:last").clone().val('').appendTo(".containerclone").find('input:last').val('');
                        //tinymce.EditorManager.execCommand('mceRemoveControl',true, cnt);
                        //count++;
                        //$('textarea:nth-last-child(3)').html('');
                        $(".lists:last").find('textarea').html('');
                        
                        

                        $(".lists:last").find('textarea').val('');
                        


                        $(".lists:last").find('select').prop('selectedIndex',0);
                        $(".lists:last").find('.listid').val(listidnext);
                        $('.lists:last').find('.isdeleted').val('0');
                    }
                    $(".lists:last").find('.contentdetails_id').val('');
                    

                    applyTinyMce('lists');


                  });

                  $(document).on("click",".delt",function(){
                        if(confirm('Are you sure you want to delete this?')){
                            $(this).parents('.lists').find('.isdeleted').val('1');
                            
                            var form=$(this).parents('.lists').find('.sbmt');
                            form.click();
                            $(this).parents('.lists').remove();

                        }
                  })

                  //sixth section
                  $(".addmoresix").click(function(){
                    var del="<p class='delesix'><input style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect deltsix' type='button' name='' value='Delete this' /></p>";
                    
                    removeTinyMce('listssix');
                    var cnt=$('.listssix').length;
                    //alert("<?= base_url(); ?>uploads/noimg.png");
                    var listid=$(".listssix:last").find('.listid').val();
                    var listidnext=(parseInt(listid) + 1);
                    if(cnt == 1){
                        //$('.dele:last').remove();
                        $(".listssix:last").clone().val('').appendTo(".containerclonesix").find('input').val('');
                        //$('textarea:nth-last-child(3)').html('');
                        $(".listssix:last").find('textarea').html('');
                        $(".listssix:last").find('textarea').val('');
                        $(".listssix:last").find('select').prop('selectedIndex',0);
                        $(".listssix:last").prepend( del );
                        
                        $(".listssix:last").find('.listid').val(listidnext);
                        $(".listssix:last").find('img').attr('src','<?= base_url() ?>uploads/noimg.png');
                        $('.listssix:last').find('.isdeleted').val('0');
                    }else{
                        $(".listssix:last").clone().val('').appendTo(".containerclonesix").find('input').val('');
                        //$('textarea:nth-last-child(3)').html('');
                        $(".listssix:last").find('textarea').html('');
                        $(".listssix:last").find('textarea').val('');
                        $(".listssix:last").find('select').prop('selectedIndex',0);
                        $(".listssix:last").find('.listid').val(listidnext);
                        $(".listssix:last").find('img').attr('src','<?= base_url() ?>uploads/noimg.png');
                        $('.listssix:last').find('.isdeleted').val('0');
                    }
                    applyTinyMce('listssix');
                    
                  });

                  $(document).on("click",".deltsix",function(){
                        if(confirm('Are you sure you want to delete this?')){
                            $(this).parents('.listssix').find('.isdeleted').val('1');
                            
                            var form=$(this).parents('.listssix').find('.sbmt');
                            form.click();
                            $(this).parents('.listssix').remove();
                        }
                  })

                  //ninth section
                  //sixth section
                  $(".addmorenin").click(function(){
                    var del="<p class='delenin'><input style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect deltnin' type='button' name='' value='Delete this' /></p>";
                    
                    removeTinyMce('listsnin');
                    var cnt=$('.listsnin').length;
                    //alert("<?= base_url(); ?>uploads/noimg.png");
                    var listid=$(".listsnin:last").find('.listid').val();
                    var listidnext=(parseInt(listid) + 1);
                    if(cnt == 1){
                        //$('.dele:last').remove();
                        $(".listsnin:last").clone().val('').appendTo(".containerclonenin").find('input').val('');
                        //$('textarea:nth-last-child(3)').html('');
                        $(".listsnin:last").find('textarea').html('');
                        $(".listsnin:last").find('textarea').val('');
                        $(".listsnin:last").find('select').prop('selectedIndex',0);
                        $(".listsnin:last").prepend( del );
                        
                        $(".listsnin:last").find('.listid').val(listidnext);
                        $(".listsnin:last").find('img').attr('src','<?= base_url() ?>uploads/noimg.png');
                        $('.listsnin:last').find('.isdeleted').val('0');
                    }else{
                        $(".listsnin:last").clone().val('').appendTo(".containerclonenin").find('input').val('');
                        //$('textarea:nth-last-child(3)').html('');
                        $(".listsnin:last").find('textarea').html('');
                        $(".listsnin:last").find('textarea').val('');
                        $(".listsnin:last").find('select').prop('selectedIndex',0);
                        $(".listsnin:last").find('.listid').val(listidnext);
                        $(".listsnin:last").find('img').attr('src','<?= base_url() ?>uploads/noimg.png');
                        $('.listsnin:last').find('.isdeleted').val('0');
                    }
                    applyTinyMce('listsnin');
                    
                  });

                  $(document).on("click",".deltnin",function(){
                        if(confirm('Are you sure you want to delete this?')){
                            $(this).parents('.listsnin').find('.isdeleted').val('1');
                            
                            var form=$(this).parents('.listsnin').find('.sbmt');
                            form.click();
                            $(this).parents('.listsnin').remove();
                        }
                  })


                  //editing content
                  $(document).on('click','.vapp',function(){ 
                    var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        data=$('.amsg'+id).val();
                        $('#myModal .modal-body').html(data);
                  });


                  //editing content
                  $(document).on('click','.editcontent',function(){ 
                    var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        //alert(id);
                        url = "<?php echo base_url().'admin/content/edit_page_view'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id}, 
                              success: function(data) { 
                                //alert(data);
                                $('.modal-body').html(data);
                                
                              //location.reload();
                    } });
                      
                 });

                 //for edit change status for page
                 $(document).on('click','.leverpage',function(){ 
                    var setstatus=0;
                    if($(this).attr('data-stat')==0) {
                        $(this).attr('data-stat',1);
                        var setstatus=1;
                    }else{
                        $(this).attr('data-stat',0);
                        var setstatus=0;
                    }
                    var status = setstatus; 
                    var msg = (status=='0')? 'Deactivate' : 'Activate'; 
                    if(confirm("Are you sure to "+ msg))
                    { 
                        var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        url = "<?php echo base_url().'admin/content/update_page_status'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id,"status":status}, 
                              success: function(data) { 
                                //alert(data);
                              location.reload();
                        } });
                     }  
                 });

                 //for delete page
                 $(document).on('click','.delpage',function(){ 
                    
                    var delstatus = 1; 
                    var msg = 'delete this?'; 
                    if(confirm("Are you sure to "+ msg))
                    { 
                        var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        url = "<?php echo base_url().'admin/content/update_delete_page_status'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id,"status":delstatus}, 
                              success: function(data) { 
                                //alert(data);
                              location.reload();
                        } });
                     }  
                 });

                 //for change status for page
                 $(document).on('change','.pge',function(){ 
                        var contentid=$(this).val();
                        //alert(contentid);
                        $('.content_details_cid').val(contentid);
                        //alert($('.content_details_cid').val());
                        return false;
                 });

                 $(document).on('click','.sbmt',function(){ 
                        var contentid=$(this).parents('.lists').find('.content_details_cid').val();
                        var pagename=$("#page").val();
                        //alert(contentid);
                        if(pagename == 'about' || pagename == 'news'){
                            return true;
                        }
                        if(!contentid){
                            alert('Please select page to edit!');
                            return false;
                        }else{
                            return true;
                        }
                        
                        return false;
                 });

                 //menu
                 //editing menu
                  $(document).on('click','.editmenu',function(){ 
                    var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        //alert(id);
                        url = "<?php echo base_url().'admin/content/edit_menu_view'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id}, 
                              success: function(data) { 
                                //alert(data);
                                $('.modal-body').html(data);
                                
                              //location.reload();
                    } });
                      
                 });

                 //editing footer menu
                  $(document).on('click','.editfmenu',function(){ 
                    var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        //alert(id);
                        url = "<?php echo base_url().'admin/content/edit_fmenu_view'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id}, 
                              success: function(data) { 
                                //alert(data);
                                $('.modal-body').html(data);
                                
                              //location.reload();
                    } });
                      
                 });

                  //for edit change status for menu
                 $(document).on('click','.levermenu',function(){ 
                    var setstatus=0;
                    if($(this).attr('data-stat')==0) {
                        $(this).attr('data-stat',1);
                        var setstatus=1;
                    }else{
                        $(this).attr('data-stat',0);
                        var setstatus=0;
                    }
                    var status = setstatus; 
                    var msg = (status=='0')? 'Deactivate' : 'Activate'; 
                    if(confirm("Are you sure to "+ msg))
                    { 
                        var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        url = "<?php echo base_url().'admin/content/update_menu_status'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id,"status":status}, 
                              success: function(data) { 
                                //alert(data);
                              location.reload();
                        } });
                     }  
                 });

                 //for edit change status for footer menu
                 $(document).on('click','.leverfmenu',function(){ 
                    var setstatus=0;
                    if($(this).attr('data-stat')==0) {
                        $(this).attr('data-stat',1);
                        var setstatus=1;
                    }else{
                        $(this).attr('data-stat',0);
                        var setstatus=0;
                    }
                    var status = setstatus; 
                    var msg = (status=='0')? 'Deactivate' : 'Activate'; 
                    if(confirm("Are you sure to "+ msg))
                    { 
                        var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        url = "<?php echo base_url().'admin/content/update_fmenu_status'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id,"status":status}, 
                              success: function(data) { 
                                //alert(data);
                              location.reload();
                        } });
                     }  
                 });

                 //for delete menu
                 $(document).on('click','.delmenu',function(){ 
                    
                    var delstatus = 1; 
                    var msg = 'delete this?'; 
                    if(confirm("Are you sure to "+ msg))
                    { 
                        var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        url = "<?php echo base_url().'admin/content/update_delete_menu_status'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id,"status":delstatus}, 
                              success: function(data) { 
                                //alert(data);
                              location.reload();
                        } });
                     }  
                 });
                 //for footer menu
                 $(document).on('click','.delfmenu',function(){ 
                    
                    var delstatus = 1; 
                    var msg = 'delete this?'; 
                    if(confirm("Are you sure to "+ msg))
                    { 
                        var current_element = $(this); 
                        var id = $(current_element).attr('data-id');
                        url = "<?php echo base_url().'admin/content/update_delete_fmenu_status'?>"; 
                            $.ajax({
                              type:"POST",
                              url: url, 
                              data: {"id":id,"status":delstatus}, 
                              success: function(data) { 
                                //alert(data);
                              location.reload();
                        } });
                     }  
                 });


                 //other second section
                  $(".addmoreoth").click(function(){
                    var del="<p class='dele'><input style='margin-top:10px;margin-bottom:10px;' class='btn btn-lg bg-pink waves-effect delt' type='button' name='' value='Delete this' /></p>";
                    
                    
                    removeTinyMce('listsoth');

                    

                    var cnt=$('.listsoth').length;
                    var listid=$(".listsoth:last").find('.listid').val();
                    var listidnext=(parseInt(listid) + 1);
                    if(cnt == 1){
                        //$('.dele:last').remove();
                        $(".listsoth:last").clone().val('').appendTo(".containerothclone").find('input:last').val('');
                        //tinymce.EditorManager.execCommand('mceRemoveControl',true, cnt);
                        //count++;
                        
                        //$('textarea:nth-last-child(3)').html('');
                        $(".listsoth:last").find('textarea').html('');
                        
                        

                        $(".listsoth:last").find('textarea').val('');

                        

                        $(".listsoth:last").find('select').prop('selectedIndex',0);
                        $(".listsoth:last").prepend( del );
                        $(".listsoth:last").find('.listid').val(listidnext);
                        $('.listsoth:last').find('.isdeleted').val('0');
                    }else{
                        $(".listsoth:last").clone().val('').appendTo(".containerothclone").find('input:last').val('');
                        //tinymce.EditorManager.execCommand('mceRemoveControl',true, cnt);
                        //count++;
                        //$('textarea:nth-last-child(3)').html('');
                        $(".listsoth:last").find('textarea').html('');
                        
                        

                        $(".listsoth:last").find('textarea').val('');
                        


                        $(".listsoth:last").find('select').prop('selectedIndex',0);
                        $(".listsoth:last").find('.listid').val(listidnext);
                        $('.listsoth:last').find('.isdeleted').val('0');
                    }
                    $(".listsoth:last").find('.contentdetails_id').val('');
                    

                    applyTinyMce('listsoth');


                  });

                  $(document).on("click",".deltoth",function(){
                        if(confirm('Are you sure you want to delete this?')){
                            $(this).parents('.listsoth').find('.isdeleted').val('1');
                            
                            var form=$(this).parents('.listsoth').find('.sbmt');
                            form.click();
                            $(this).parents('.listsoth').remove();

                        }
                  })

                  $(document).on("click",".replyapp",function(){
                        
                        var current_element=$(this);
                        var current_element_id=current_element.attr('data-id');
                        //alert(current_element_id);
                        /*alert($('.amsg18').val());
                        alert($('.amsg'+current_element_id).val());*/
                        var current_element_amsg=$('.amsg'+current_element_id).val();
                        //alert(current_element_amsg);
                        var current_element_app_id=$('.app_id'+current_element_id).val();
                        var current_element_fullname=$('.app_fullname'+current_element_id).val();
                        var current_element_email=$('.app_email'+current_element_id).val();
                        //alert(current_element_email);
                        var current_element_type=$('.app_type'+current_element_id).val();
                        var current_element_createdon=$('.app_createdon'+current_element_id).val();

                        $('.amsgr').val(current_element_amsg);
                        $('.app_idr').val(current_element_app_id);
                        $('.app_fullnamer').val(current_element_fullname);
                        $('.app_emailr').val(current_element_email);
                        $('.app_typer').val(current_element_type);
                        $('.app_createdonr').val(current_element_createdon);

                        $('#appointment_to').val(current_element_email);
                        $('#appointment_subject').val('With ref to appointment made by '+current_element_fullname+' on '+current_element_createdon+', we have a feedback.');

                        
                  })




        });
        function changestatus(){

        }
    </script>
    
    <style type="text/css">
        .cke_contents { height: 100% !important; }
    </style>


</body>

</html>
