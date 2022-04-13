<div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div style="border:1px solid">
                             
                                        <ul>
                                            <?php if(!empty($_SESSION)){ ?>
                                                <li>Welcome <b><?php echo $_SESSION['name'] ?></b></li>
                                                <li><a href="<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>account/detail_account/<?php echo $_SESSION['id_user']?>">Account info</li>
                                                <li><a href="<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>login/logout">Logout</a></li> 
                                            <?php }else{ ?>
                                                <li><a href="<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>login/">Login</a></li>
                                            <?php } ?>
                                            
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 </div>