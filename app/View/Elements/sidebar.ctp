<!--sidebar start-->
<aside>
    <nav>
        <div id="sidebar" class="nav-collapse">
            <div class="leftside-navigation">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav">
                    <a id="active" class="active" href="<?php echo DEFAULT_ADMINURL ?>users/dashboard">
                        <li class="desh">
                            <i class="fa fa-dashboard"></i>&nbsp;&nbsp;<span>Dashboard</span>
                        </li>
                    </a>
                    <li class="sub-menu">
                        <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>Pages</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>pages/lists/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>View Pages</a>
                            </li>
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>pages/add/<?php echo $encrypt_id;?>"><i class="fa fa-plus"></i>Add Page</a>
                            </li>
                        </ul>
                        <!--<li class="sub-menu"> <a href="javascript:void(0);"> <i class="fa fa-tags"></i> <span>Create Listings</span> </a>
                            <ul class="sub">
                                <li><a href="<?php echo DEFAULT_ADMINURL ?>listings/create_listing/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>Create Listings</a></li>
                                <li><a href="<?php echo DEFAULT_ADMINURL ?>listings/listing_requests/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>Listing Requests</a></li>
                            </ul>
                        </li>-->
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>News Categories</span>
                        </a>
                        <ul class="sub">
                            <!--<li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>newscategories/add/<?php echo $encrypt_id;?>"><i class="fa fa-plus"></i>Add Category</a>
                            </li>-->
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>newscategories/lists/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>News Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>News</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>news/lists/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>View News</a>
                            </li>
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>news/add/<?php echo $encrypt_id;?>"><i class="fa fa-plus"></i>Add News</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>Advertisements</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>advertises/lists/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>View Advertisements</a>
                            </li>
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>advertises/add/<?php echo $encrypt_id;?>"><i class="fa fa-plus"></i>Add Advertisement</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>Photo Gallery</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>galleries/lists/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>View Galleries</a>
                            </li>
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>galleries/add/<?php echo $encrypt_id;?>"><i class="fa fa-plus"></i>Add Gallery</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>Videos</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>videos/lists/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>View Videos</a>
                            </li>
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>videos/add/<?php echo $encrypt_id;?>"><i class="fa fa-plus"></i>Add Video</a>
                            </li>
                        </ul>
                    </li>
                    <!--<li class="sub-menu">
                        <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>E-Papers</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>epapers/lists/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>View E-Papers</a>
                            </li>
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>epapers/add/<?php echo $encrypt_id;?>"><i class="fa fa-plus"></i>Add E-Paper</a>
                            </li>
                        </ul>
                    </li>-->
                    <li class="sub-menu">
                        <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>Polls</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>polls/lists/<?php echo $encrypt_id;?>"><i class="fa fa-eye"></i>View Polls</a>
                            </li>
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL ?>polls/add/<?php echo $encrypt_id;?>"><i class="fa fa-plus"></i>Add Poll</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                         <a href="javascript:void(0);">
                            <i class="fa fa-tags"></i><span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL.'settings/general' ?>"><i class=" fa fa-wrench"></i>General</a>
                            </li>
                            <li>
                                <a href="<?php echo DEFAULT_ADMINURL.'users/change_password' ?>"><i class=" fa fa-suitcase"></i>Change Password</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </nav>
</aside>
<!--sidebar end-->