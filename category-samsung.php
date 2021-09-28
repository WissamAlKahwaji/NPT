<?php get_header(); ?>

    
<div class="container category-info">

        <h1 class="text-center"><?php single_cat_title()?></h1>
    <div class="category-description"><?php echo category_description()?></div>
            <br>
                <form role="search" method="get" id="searchform" class="searchform" action=".">
					<label class="screen-reader-text" for="s">Search for:</label>
					<input autocomplete="off" type="search" placeholder="Write here the phone model number" aria-label="Search" value="" name="s" id="s" >
                    <input type="submit" id="searchsubmit" value="Search">
                    </form>
            </div>

            <?php include(get_template_directory() . '/includes/breadcrumbs-category.php'); //Include Breadcrumb 
?>

<div class="container home-page ">
    <div class="row">
<?php
             if(have_posts()){ // Check if There's Posts
                    
                while(have_posts()){ //loop Therought Posts
                        
                    the_post(); ?>
                
                <div class="col-md-3 ">
                    <div class="main-post ">
                        <div> <?php the_post_thumbnail('',['class' => 'imgz'],'') ?>
                    </div>
                        <h3 class="post-title ">
                            <a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
                            <div class="post-content ">
                            <?php the_excerpt() ?>
                            </div>
                            <div class="read-more ">
                                <a href="<?php the_permalink()?>">Read More</a>
                                </div>
                </div>
            </div>
                    
                    

        <?php 
            }   //End While Loop
            
        }   //End If Condition
        ?>
    </div>
</div>


<div class="post-pagination "><?php echo num_samsung ();?></div>


<?php get_footer(); ?>