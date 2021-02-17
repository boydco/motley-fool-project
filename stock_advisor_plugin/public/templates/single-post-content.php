<?php
/**
 * The view for the post content used on the single post
 */

?>


<div class="content-post" itemtype="description">

<?php 
if (!is_singular('company')) {
    ?>
    
    <div class="author-container">
        <div class="byline">By <?php the_author_posts_link(); ?></div>
        <div class="article-date"><?php the_time('F jS, Y'); ?> <?php the_category(', '); ?> </div>
        <span class="author-editor-button"><?php edit_post_link(__('{Edit}'), ''); ?></span>
        

    </div>
        
       
    <?php
}
?>
</div>

