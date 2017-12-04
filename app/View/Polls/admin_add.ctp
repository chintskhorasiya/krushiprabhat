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
                            <header class="panel-heading btn-primary">Add Poll</header>
                            <div class="panel-body">
                                <div class="position-center">
                                    <?php
                                    echo $this->Form->create('Poll', array('novalidate', 'type'=>'file'));
                                    
                                    echo $this->Form->input('question', array('class' => 'form-control input-lg'));

                                    echo $this->Form->input('answer1', array('label'=>'Answer 1', 'class' => 'form-control input-lg'));

                                    echo $this->Form->input('answer2', array('label'=>'Answer 2', 'class' => 'form-control input-lg'));

                                    ?>
                                    <div class="form-group col-md-12 padding-left-o">
                                        <label>Status</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="data[Poll][status]" class="form-control-radio" value="1" <?php if($polls_data['Poll']['status'] == "1"){ echo 'checked="checked"'; } ?> />Published
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="data[Poll][status]" class="form-control-radio" value="0" <?php if($polls_data['Poll']['status'] == "0"){ echo 'checked="checked"'; } ?> />Draft
                                            </label>
                                        </div>
                                    </div>

                                    <div class="submit-area">
                                    <?php

                                    echo $this->Form->submit('Submit', array('class' => 'btn btn-info'));
                                    echo $this->Html->link('Cancel', DEFAULT_ADMINURL.'videos/lists', array('class' => 'btn btn-info'));
                                    
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
        /*jQuery('.add-poll-btn').click(function(){
            //console.log(jQuery(this).parent());
            jQuery(this).before('<div class="col-md-12 you-poll-area"><input type="text" name="data[Poll][polls][]" class="form-control" value="" placeholder="Paste Poll URL here" /><input type="button" class="remove-poll-btn btn btn-info" value="Remove"></div>');
        })
        jQuery(function(){
            jQuery('body').on('click', '.remove-poll-btn', function () {
                jQuery(this).parent().remove();
            });
        });*/
        </script>
    <!--main content end-->
    <?php echo $this->element('footer'); ?>
</section>