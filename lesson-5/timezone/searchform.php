<form action="<?php echo home_url( '/' ) ?>" method="get" role="search" >
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control"
                   value="<?php echo get_search_query() ?>" name="s" id="s"
                   placeholder='Search Keyword'
                   onfocus="this.placeholder = ''"
                   onblur="this.placeholder = 'Search Keyword'">
            <div class="input-group-append">
                <button class="btns" type="button"><i class="ti-search"></i></button>
            </div>
        </div>
    </div>
    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
            type="submit"><?php _e('Search')?></button>
</form>