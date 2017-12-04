<section id="container">
    <!--header start-->
    <?php echo $this->element('header'); ?>
    <!--header end-->

    <!--sidebar start-->
    <?php echo $this->element('sidebar'); ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                        //print_r($_SESSION);
                        if(!empty($_SESSION['error_msg'])){
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $_SESSION['error_msg'];unset($_SESSION['error_msg']); ?>
                            </div>
                            <?php
                        }

                        if(!empty($_SESSION['warning_msg'])){
                            ?>
                            <div class="alert alert-warning" style="display: none;">
                                <?php
                                echo $_SESSION['warning_msg'];
                                unset($_SESSION['warning_msg']);
                                ?>
                            </div>
                            <?php
                        }

                        if(!empty($_SESSION['success_msg'])){
                            ?>
                            <div class="alert alert-success">
                                <?php echo $_SESSION['success_msg'];unset($_SESSION['success_msg']); ?>
                            </div>
                            <?php
                        }
                        ?>
                        <section class="panel  border-o">
                            <header class="panel-heading btn-primary">Add News</header>
                            <div class="panel-body">
                                <div class="position-center">
                                    <?php
                                    echo $this->Form->create('News', array('novalidate', 'type'=>'file'));
                                    
                                    $all_categories = $news_data['News']['all_categories'];
                                    $options = array();
                                    $selected = array();
                                    if(count($all_categories) > 0)
                                    {
                                        //echo '<div class="form-group">';
                                        //echo '<label for="sel1">Select Categories</label>';
                                        //echo '<select name="data[News][categories][]" class="form-control" id="" multiple>';
                                        foreach ($all_categories as $alcat_key => $alcat_data) {
                                            $options[$alcat_data['NewsCategory']['id']] = $alcat_data['NewsCategory']['name'];
                                            //echo '<option value="'.$alcat_data['NewsCategory']['id'].'">'.$alcat_data['NewsCategory']['name'].'</option>';
                                        }
                                        //echo '</select>';
                                        //echo '</div>';

                                        echo $this->Form->input('categories', array('multiple' => true, 'class' => 'form-control', 'options' => $options, 'selected' => $selected));
                                    }

                                    echo $this->Form->input('title', array('class' => 'form-control input-lg'));

                                    echo $this->Form->input('slug', array('class' => 'form-control input-lg'));
                                    
                                    //echo $this->Form->input('content', array('rows' => '10', 'class' => 'form-control input-lg'));

                                    echo $this->Tinymce->input('News.content', array(
                                                'label' => 'Content',
                                                'class' => 'tinymce-textarea form-control input-lg'
                                                ),array(
                                                        'language'=>'en'
                                                ),
                                                'bbcode'
                                    );

                                    echo '<label>Images</label>';
                                    echo $this->Form->input('images.', array('type' => 'file', 'multiple'));

                                    ?>
                                    <div class="form-group col-md-12 padding-left-o">
                                        <label>Videos</label>
                                        <p>(e.g. https://www.youtube.com/watch?v=n0hvKL6V3AI OR http://youtu.be/-wtIMTCHWuI etc)</p>
                                        <div class="col-md-12 you-video-area">
                                            <input type="text" name="data[News][videos][]" class="form-control" value="" placeholder="Paste Video URL here" />
                                            <input type="button" class="remove-video-btn btn btn-info" value="Remove">
                                        </div>
                                        <input type="button" class="add-video-btn btn btn-info" value="Add More">
                                    </div>
                                    
                                    <div class="form-group col-md-12 padding-left-o">
                                        <label>Status</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="data[News][status]" class="form-control-radio" value="1" <?php if($news_data['News']['status'] == "1"){ echo 'checked="checked"'; } ?> />Published
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="data[News][status]" class="form-control-radio" value="0" <?php if($news_data['News']['status'] == "0"){ echo 'checked="checked"'; } ?> />Draft
                                            </label>
                                        </div>
                                    </div>

                                    <h5>SEO Details</h5>
                                    <hr>
                                    <?php
                                    echo $this->Form->input('seo_title', array('label'=>'SEO Title','type'=>'text', 'class' => 'form-control input-lg'));
                                    ?>
                                    <?php
                                    echo $this->Form->input('seo_desc', array('label'=>'SEO Description','class' => 'form-control input-lg'));
                                    ?>
                                    <?php
                                    echo $this->Form->input('seo_keywords', array('label'=>'SEO Keywords','class' => 'form-control input-lg'));
                                    ?>
                                    <hr>

                                    <div class="submit-area">
                                    <?php

                                    echo $this->Form->submit('Submit', array('class' => 'btn btn-info'));
                                    echo $this->Html->link('Cancel', DEFAULT_ADMINURL.'news/lists', array('class' => 'btn btn-info'));
                                    
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </section>
        <script type="text/javascript">
        jQuery('.add-video-btn').click(function(){
            //console.log(jQuery(this).parent());
            jQuery(this).before('<div class="col-md-12 you-video-area"><input type="text" name="data[News][videos][]" class="form-control" value="" placeholder="Paste Video URL here" /><input type="button" class="remove-video-btn btn btn-info" value="Remove"></div>');
        })
        jQuery(function(){
            jQuery('body').on('click', '.remove-video-btn', function () {
                jQuery(this).parent().remove();
            });
        });
        </script>
    <!--main content end-->
    <?php echo $this->element('footer'); ?>
</section>