<?php

if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('Numeric_Pagination')) {

    class Numeric_Pagination
    {

        public $li_classes = array('ends' => 'page-item', 'default' => 'page-item active');
        public $a_classes = array('default' => 'page-link', 'prev' => 'prev', 'next' => 'next', 'current' => 'current');
        public $prevnext_text = array('prev' => '<i class="ti-angle-left"></i>', 'next' => '<i class="ti-angle-right"></i>');

        public function __construct($a_classes = null, $li_classes = null, $prevnext_text = null)
        {

            global $wp_query;

// Exit early if no need for pagination.
            if ($wp_query->max_num_pages <= 1)
                return;

// Set defaults
            if (null !== $a_classes) {
                $this->a_classes = $a_classes;
            }
            if (null !== $li_classes) {
                $this->li_classes = $li_classes;
            }
            if (null !== $prevnext_text) {
                $this->prevnext_text = $prevnext_text;
            }
        }


        public function __toString()
        {
            global $wp_query;

            $big = 999999999; // need an unlikely integer
            $pages = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'type' => 'array',
                'end_size' => 2,
                'mid_size' => 3,
                'prev_next' => true,
                'prev_text' => $this->prevnext_text['prev'],
                'next_text' => $this->prevnext_text['next']
            ));

            $output = '<nav class="blog-pagination justify-content-center d-flex"><ul class="pagination">';

            if (is_array($pages) && count($pages) > 0) {

                $paged = (0 === get_query_var('paged')) ? 1 : get_query_var('paged');

                foreach ($pages as $k => $page) {

                    $li_class = (0 === $k || (count($pages) - 1) === $k) ? $this->li_classes['ends'] : $this->li_classes['default'];
                    $output .= '<li class="' . $li_class . '">' . $this->replace_anchor_classes($page) . '</li>';
                }
                $output .= '</ul></nav>';
            }
            return $output;
        }

        function replace_anchor_classes($anchor)
        {

            $anchor = preg_replace('/page-numbers/', $this->a_classes['default'], $anchor);
            $anchor = preg_replace('/prev/', $this->a_classes['prev'], $anchor);
            $anchor = preg_replace('/next/', $this->a_classes['next'], $anchor);
            $anchor = preg_replace('/current/', $this->a_classes['current'], $anchor);

            return $anchor;
        }
    }
}

