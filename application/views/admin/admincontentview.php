<style type="text/css">
    .lists,.listssix,.listsnin{
        box-shadow: 0px 0px 5px 0px;
        margin-bottom: 5%;
        padding: 2%;
    }
    .dropdown-toggle,.dropdown-menu{display: none;}
    .formcontrol{
        width: 250px;
        height: 33px;
        border: 1px solid lightgrey;
        border-radius: 5px 5px 5px 5px;
    }
    .ta-formcontrol{
        width: 100%;
        border: 1px solid lightgrey;
        border-radius: 5px 5px 5px 5px;
    }
</style>
<section class="content">
        <div class="container-fluid">
            <!-- <div class="block-header">
                <h2>
                    CAROUSEL
                    <small>All images taken from <a href="https://unsplash.com/" target="_blank">unsplash.com</a></small>
                </h2>
            </div> -->

            
            <div class="row clearfix">
                <h3>Upload slider images here</h3>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="padding:3%;" class="card">
                        <?php if(!empty($upload_data['file_name'])){ ?>
                        <span class="message">You have uploaded file successfully!</span>
                        <?php } ?>
                        <div style="margin-top:13px;">
                            <?php if(!empty($error)){ echo $error; } ?> <!-- Error Message will show up here -->
                            <?php echo form_open_multipart('admin/content/upload');?>
                            <br>
                            <label for="selct cont">Select content</label>
                            <br>
                            <select required="required" class="formcontrol cnt" name="slider_cid">
                                
                                <?php
                                if (!empty($content_data) && count($content_data) > 0) { ?>
                                    <?php
                                    foreach ($content_data as $key => $value) { ?>
                                            <option value="<?= $value['content_id'] ?>"><?= $value['content_page'] ?></option>
                                        <?php } ?>
                                <?php } ?>
                            </select>
                            <br><br><br>
                            <label for="text1">Upload slider image</label>
                            <?php echo "<input required='required' class='btn btn-lg bg-pink waves-effect' type='file' name='userfile' size='20' />"; ?>

                                <div class="body">
                                        
                                        <label for="text1">Text1</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="text1" name="text1" class="ckeditor"></textarea>
                                                <!-- <input required="required" type="text" id="text1" class="form-control" name="text1" placeholder="Enter Text1 text"> -->
                                            </div>
                                        </div>
                                        <label for="text2">Text2</label>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="text2" name="text2" class="ckeditor"></textarea>
                                                <!-- <input required="required" type="text" id="text2" class="form-control" name="text2" placeholder="Enter Text2 text"> -->
                                            </div>
                                        </div>
                                </div>

                            <?php echo "<input style='margin-top:15px;' class='btn btn-lg bg-pink waves-effect' type='submit' name='submit' value='Submit' /> ";?>
                            <?php echo "</form>"?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <?php
                /*print '<pre>';
                print_r($upload_data);
                print '</pre>';*/
                if(!empty($upload_data['file_name'])){ ?>
                <!-- Uploaded file specification will show up here -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="padding:3%;" class="card">
                        <h4>Uploaded file details:</h4>
                        
                        <ul>
                            <?php if(!empty($upload_data)){  foreach ($upload_data as $item => $value):?>
                                        <li><?php echo $item;?>: <?php echo $value;?></li>
                            <?php endforeach; } ?>
                        </ul>
                        <!-- Basic Example -->
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="row clearfix">
                
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div style="padding:3%;" class="card">


                        <div class="header">
                            <h2>
                                SLIDER RECORD
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php
                                /*print '<pre>';
                                print_r($slider_data);
                                print '</pre>';*/
                            ?>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th class="centr">Slider Id</th>
                                            <th class="centr">Content Id</th>
                                            <th class="centr">Slider Image</th>
                                            <th class="centr">Slider Page</th>
                                            <th class="centr">Status</th>
                                            <th class="centr">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php if(!empty($slider_data)){ ?>
                                        <?php
                                         foreach ($slider_data as $item => $value):?>
                                              <?php
                                                if($value['slider_deleted']==0){
                                              ?>
                                                    <tr>
                                                        <td class="centr" style="text-align:center;">
                                                            <?php echo $value['slider_id'] ?>
                                                        </td>
                                                        <td class="centr" style="text-align:center;">
                                                            <?php echo $value['slider_cid'] ?>
                                                        </td>
                                                        <td class="centr" style="text-align:center;">
                                                            <img style="width: 100px; height: 100px;" src="<?php echo base_url() ?>uploads/<?php echo $value['slider_file'] ?>" />
                                                        </td>
                                                        <td class="centr" style="text-align:center;">
                                                            <?php echo $value['content_page'] ?>
                                                        </td>
                                                        <td class="centr">
                                                            <?php
                                                            if($value['slider_status']==1){
                                                                $activeclass="btn btn-primary waves-effect lever";
                                                            }else{
                                                                $activeclass="btn btn-lg bg-pink waves-effect lever";
                                                            }
                                                            ?>
                                                            <button data-id="<?php echo $value['slider_id'] ?>" data-stat="<?php echo $value['slider_status'] ?>" class="<?php echo $activeclass; ?>">Active</button>
                                                        </td>
                                                        <td class="centr"><button class="btn btn-lg bg-pink waves-effect edit" data-toggle="modal" data-target="#myModal" data-id="<?php echo $value['slider_id'] ?>">Edit</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-lg bg-pink waves-effect del" data-id="<?php echo $value['slider_id'] ?>" >Delete</button></td>
                                                    </tr>

                                                    <!-- <li><?php echo $item;?>: <?php echo $value;?></li> -->
                                         <?php } endforeach; } ?>
                                        
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div style="text-align: center;" class="row clearfix">
                <!-- Basic Example -->
                <div class="col-lg-99 col-md-9 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SLIDER PREVIEW</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">

                                    <?php if(!empty($slider_data)){ ?>
                                        <?php
                                        $count=1;
                                         foreach ($slider_data as $item => $value):?>
                                            <?php
                                            if($count==1){
                                                $class='item active';
                                                $count+=1;
                                            }else{
                                                $class='item';
                                            }
                                            ?>
                                                            
                                            <div class="<?php echo $class ?>">
                                                <img style="width: 100%; height: 35%;" src="<?php echo base_url(); ?>uploads/<?php echo $value['slider_file'] ?>" />
                                            </div>
                                         <?php endforeach; 
                                     } ?>

                                    
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Basic Example -->
                <!-- With Captions -->
                <!-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>WITH CAPTIONS</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                               
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic_2" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic_2" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic_2" data-slide-to="2"></li>
                                </ol>
                               
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="<?php echo ASSET_URL; ?>images/image-gallery/10.jpg" />
                                        <div class="carousel-caption">
                                            <h3>First slide label</h3>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo ASSET_URL; ?>images/image-gallery/12.jpg" />
                                        <div class="carousel-caption">
                                            <h3>Second slide label</h3>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="<?php echo ASSET_URL; ?>images/image-gallery/19.jpg" />
                                        <div class="carousel-caption">
                                            <h3>Third slide label</h3>
                                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                        </div>
                                    </div>
                                </div>
                               
                                <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- #END# With Captions -->
            </div>
        </div>
    </section>