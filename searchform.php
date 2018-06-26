<div class="search_top_header">
    <form action="<?php bloginfo('url');?>" method="get">
        <div class="select_item_search">
                <span class="sp1_select">
                <select class="select22">
                    <option>Tất cả</option>
                    <!--
                    <option>Amazon Instant Video</option>
                    <option>Appliances</option>
                    <option>Apps for Android</option>
                    <option>Beauty</option>
                    <option>Amazon Instant Video</option>
                    <option>Appliances</option>
                    <option>Apps for Android</option>
                    <option>Beauty</option>
                    <option>Amazon Instant Video</option>
                    <option>Appliances</option>
                    <option>Apps for Android</option>
                    <option>Beauty</option>
                    <option>Amazon Instant Video</option>
                    <option>Appliances</option>
                    <option>Apps for Android</option>
                    <option>Beauty</option>
                    <option>Amazon Instant Video</option>
                    <option>Appliances</option>
                    <option>Apps for Android</option>
                    <option>Beauty</option>
                    -->
                </select>
            </span>
        </div><!-- End .select_item_search -->
        <div class="select_input_search">                                
            <input class="ipt_s" type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm"/>                                   
        </div><!-- End .select_input_search -->
        <input class="btn_s" type="submit" value="&nbsp;"/>
        <div class="clear"></div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('select.select22').each(function(){
                        var title = $(this).attr('title');
                        if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
                        $(this)
                                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                                .after('<span class="sp2_select">' + title + '</span>')
                                .change(function(){
                                        var val = $('option:selected',this).text();
                                        $(this).next().text(val);
                                });
                });
            });
        </script>

    </form>
</div><!-- End .search_top_header -->