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
    <div class="paginTop">
        <div class="container">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <div class="paginationUpBack">
                <a href="#"><span>Назад</span></a>
                /<a href=""><span>Вперед</span></a>
            </div>
        </div>
    </div>
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
        <div class="post-box">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail(array(), array('class'=>'new-img-pr')); ?>
                </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                     <div class="date-box"><?php the_time('d.m.Y'); ?></div>
                     <div class="post-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                        <?php the_title(); ?>
                        </a>
                    </div>
                    <div class="post-content">
                        <?php $content = get_the_excerpt(); ?>
                        <?php $content = substr($content, 0, 450);
                        echo $content;?>
                         <div class="anons"><?php  the_excerpt(); ?></div>
                    </div>
                </div>
                </div>
            </div>
            </div>         
        </div>
        <?php endwhile; ?>
        
    </div>
    <div class="paginBot">
        <div class="container">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <div class="paginationUpBack">
                <a href="#"><span>Назад</span></a>
                /<a href=""><span>Вперед</span></a>
            </div>
        </div>
</div>   

<?php get_footer(); ?>