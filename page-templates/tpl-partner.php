<?php if(tie_get_option('show_partner')):?>
<div class="f_dt">
            	<ul id="foo5">
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img20.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img21.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img22.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img24.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img20.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img21.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img22.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img24.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img20.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img21.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img22.png" alt=""/>
                            </a>
                        </div>
                    </li>
                	<li>
                    	<div>
                            <a href="#" title="">
                                <img src="<?php echo get_template_directory_uri();?>/images/layout/img_demos/img24.png" alt=""/>
                            </a>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
                
                <a id="prev2" class="prev pagenavi" href="#"><img alt="slide thumb" src="<?php echo get_template_directory_uri();?>/modules/slider-thumb/button-previous.png" /></a>
                <a id="next2" class="next pagenavi" href="#"><img alt="slide thumb" src="<?php echo get_template_directory_uri();?>/modules/slider-thumb/button-next.png" /></a>
                <!--<div id="pager2" class="pager"></div>-->
                
                <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/modules/slider-thumb/jquery.carouFredSel-6.2.0.js"></script>
                <script type="text/javascript" language="javascript">
                        $(function() {
                                $('#foo5').carouFredSel({
                                       
                                        width: '100%',
                                        prev: '#prev2',
					next: '#next2',
					pagination: "#pager2",
                                        responsive: false,
                                        mousewheel: true,                                        
					swipe: {
						onMouse: true,
						onTouch: true
					},
                                        scroll : {
                                                items			: 1,
                                                effect			: "easeOutBounce",
                                                duration		: 1000,							
                                                pauseOnHover	: true
                                        }
                                });	
                        });
                </script>
            </div><!-- End .f_dt -->
            
<?php endif;?>            