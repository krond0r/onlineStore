<!--        <footer id="footer">
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Footer</p>
                        <p class="pull-right">sdfsdfs</p>
                    </div>
                </div>
            </div>
        </footer>-->

        <footer>
            <div class="footer-top1">
                <div class="container">
                    <p>
                        <span class="footer-top-title">Интернет магазин LoremIpsum™</span><br>
                        Вас интересует компьютерная техника? Вы можете приобрести её прямо сейчас
                        и при этом сэкономив уйму времени! Интернет-магазин LoremIpsum™ с радостью поможет
                        вам избежать необходимости посещать десятки магазинов. Вы можете заказать товар,
                        не вставая со своего кресла, а наш курьер вовремя доставит покупку по указанному адресу.
                        Наш Интернет магазин действует на территории всей Украина. Жители любых городов могут без
                        лишних хлопот посетить наш интернет-магазин и купить желаемый товар. Приятных покупок!
                    </p>
                </div>
<!--                <p>
                    <span class="footer-top-title">Интернет магазин LoremIpsum™</span><br>
                    Вас интересует компьютерная техника? Вы можете приобрести её прямо сейчас
                    и при этом сэкономив уйму времени! Интернет-магазин LoremIpsum™ с радостью поможет
                    вам избежать необходимости посещать десятки магазинов. Вы можете заказать товар,
                    не вставая со своего кресла, а наш курьер вовремя доставит покупку по указанному адресу.
                    Наш Интернет магазин действует на территории всей Украина. Жители любых городов могут без
                    лишних хлопот посетить наш интернет-магазин и купить желаемый товар. Приятных покупок!
                </p>-->
            </div>
            <div class="footer-middle1">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3>Горячая линия</h3>
                            <span class="footer-middle-number">(095) 616-90-81</span>
                            <p>
                                с 8:00 до 21:00 (без выходных)
                                <br><br>
                                Бесплатно со стационарных 
                                и мобильных телефонов в Украине
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <h3>Почтовый ящик</h3>
                            <p>
                                Также Вы можете написать нам. Отвечаем всегда быстро.
                                Рады услышать Ваше мнение о работе магазина. Пишите нам!
                                <br><br>
                                lorem_ipsum@gmail.com
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <h3>Следите за нами</h3>
                            <div class="footer-icon">
                                <a href="#"><i class="fa fa-google-plus footer"></i></a>
                                <a href="#"><i class="fa fa-facebook footer"></i></a>
                                <a href="#"><i class="fa fa-twitter footer"></i></i></a>
                                <a href="#"><i class="fa fa-vk footer"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom1 text-center">
                <p>Created by GK Copyright © 2018</p>
            </div>
        </footer>
        
        
        <script src="/template/js/jquery.js"></script>
        <script src="/template/js/jquery.cycle2.min.js"></script>
        <script src="/template/js/jquery.cycle2.carousel.min.js"></script>
        <script src="/template/js/bootstrap.min.js"></script>
        <script src="/template/js/jquery.scrollUp.min.js"></script>
        <script src="/template/js/price-range.js"></script>
        <script src="/template/js/jquery.prettyPhoto.js"></script>
        <script src="/template/js/main.js"></script>
        <script>
            $(document).ready(function(){
                $(".add-to-cart").click(function () {
                    var id = $(this).attr("data-id");
                    $.post("/cart/addAjax/"+id, {}, function (data) {
                        $("#cart-count").html(data);
                    });
                    return false;
                });
            });
        </script>
        
        <script>
                $(function () { 
                        $('.g-activ a').each(function () {
                                var location = window.location.href;
                                var link = this.href; 
                                if(location == link) {
                                        $(this).addClass('g-menu-activ ');
                                }
                        });
                });
        </script>
        
        
    </body>
</html>
