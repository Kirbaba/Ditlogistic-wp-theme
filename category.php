<?php get_header(); ?>

<!-- Intro Header -->
<header class="introNews">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1><span>Новости</span></h1>                   
                </div>
                <a href="#whatWeDo" class="smoothScroll">
                    <div class="scroll-down">
            <span>
                <i class="butArrow"><!--<img src="<?php /*bloginfo('template_directory'); */?>/img/toBot.png" alt=""/>--></i>
            </span>
                    </div>
                </a>

            </div>


        </div>
    </div>

<div class="navigBot  navbar-custom" data-type="absolute">
  <!--  <nav class="navbar-custom" role="navigation">-->

        <ul class="menu_m">
            <li><a href="#we" class="smoothScroll">О нас</a></li>
            <li><a href="#serv" class="smoothScroll">наши услуги</a></li>
            <li><a href="#photorev" class="smoothScroll">отзывы</a></li>
            <li><a data-toggle="modal" href="#callme">расчет перевозки</a></li>
            <li><a href="#faq" class="smoothScroll">галерея</a></li>

        </ul>

</div>
  <!--  </nav>-->
</header>

<div class="content">  
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="post-box">
            <div class="img-box">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(array(208, 148), array('class'=>'new-img-pr')); ?>
                </a>
                <!--<img src="<?php /*bloginfo('template_directory'); */?>/images/new-prev.png" alt="" height="148px" width="208px"/>-->
                <div class="date-box"><?php the_time('d.m.Y'); ?></div>
            </div>
            <div class="post-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_title(); ?>
                </a>
            </div>
            <div class="post-content">
                <?php $content = get_the_excerpt(); ?>
                <?php $content = substr($content, 0, 150);
                /*$content = rtrim($content, "!,.-");*/
                echo $content;?>
            </div>
            <!--<div class="author-box">
                Author: <?php /*echo get_the_author(); */?>
            </div>-->
        </div>
        <?php endwhile; ?>
        <div style="float: left; width: 100%; padding-left: 60px">
            <?php my_pagenavi(); ?>
        </div>
    </div>   
</div>
<?php get_footer(); ?>