<?php get_header(); ?>

<?php include(get_template_directory() . '/includes/breadcrumb.php'); //Include Breadcrumb 
?>

<div class="container singl-page">
    <div class="row">
<?php
                
             if(have_posts()){ // Check if There's Posts
                    
                while(have_posts()){ //loop Therought Posts
                        
                    the_post(); ?>
                
                    <div class="main-post single-post col-md-12">
                        <h3 class="post-title"><?php the_title() ?></h3>
                            <div class="post-content">
                            <?php the_content() ?>
                            <div class="category">
                            <?php the_category(',')?>
                        </div>
                            <div class="tags">
                            <?php the_tags('tags: ',)?>
                            </div>
                        </div>
                            </div>
                            
            
        <?php 
            }   //End While Loop
        }   //End If Condition
?>
        <?php get_sidebar(); ?>
</div>
</div>

<?php get_footer(); ?>
