<div class="edgtf-post-info-category">
    <?php
    if($post_info_category_boxed == 'yes') {
        the_category(' ');
    } else {
        the_category(', ');
    }
    ?>
</div>