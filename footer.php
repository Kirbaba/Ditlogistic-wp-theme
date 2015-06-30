<footer>
    <div class="container">

        <a href="#"><i class="footLogo"></i></a>

        <ul class="footMenu">
            <li><a href="#we" class="smoothScroll">О нас</a></li>
            <li><a href="#serv" class="smoothScroll">наши услуги</a></li>
            <li><a href="#faq" class="smoothScroll">галерея</a></li>
        </ul>
        <ul class="footMenu">
            <li><a data-toggle="modal" href="#callme">Расчет перевозки</a></li>
            <li><a href="#photorev" class="smoothScroll">отзывы</a></li>
            <li><a href="#progs" class="smoothScroll">новости</a></li>
        </ul>
        <ul class="footMenu">
            <li><a href="#cont" class="smoothScroll">Контакты</a></li>
        </ul>
        <ul class="footSoc">
            <p>Мы в соц. сетях</p>
            <li><a href="#"><i class="vk"></i></a></li>
            <li><a href="#"><i class="inst"></i></a></li>
        </ul>
        <ul class="footSoc">
            <p>о всем вопросам:</p>
            <a href="mailto:help@starlogistic.ru">help@starlogistic.ru</a>
        </ul>

    </div>
</footer>

<div class="modal fade" id="callme" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><!--&times;--></button>
            <h1>РАСЧЕТ СТОИМОСТИ  ПЕРЕВОЗКИ</h1>
            <div class="underH"></div>
            <p>Заполните форму и мы перезвоним Вам</p>
            <?php echo do_shortcode("[contact-form-7 id='124' title='calcPopupForm']"); ?>
        </div>
        <!--<div class="modal-content">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 call_content">

            </div>
        </div>-->
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>