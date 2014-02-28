            <footer class="footer">
                <ul class="social">
                    <? if(!empty($widgets['widgets']['items'][2]['item'])) : ?>
                        <li class="vk">
                            <a href="<?=$widgets['widgets']['items'][2]['item']->link;?>"><?=$widgets['widgets']['items'][2]['item']->title;?></a>
                        </li>
                    <? endif; ?>
                    <? if(!empty($widgets['widgets']['items'][3]['item'])) : ?>
                        <li class="fb">
                            <a href="<?=$widgets['widgets']['items'][3]['item']->link;?>"><?=$widgets['widgets']['items'][3]['item']->title;?></a>
                        </li>
                    <? endif; ?>
                </ul>
            </footer>
        </div>
        <div class="main_menu">
            <ul class="slide_menu">
                    <li class="menu_item drop_down">
                        <a class="menu_link" href="#">Каталог</a>
                        <? if(!empty($widgets['catalog_menu'])) : ?>
                            <ul class="drop_list">
                                <? foreach($widgets['catalog_menu'] as $itemMenu) : ?>
                                    <li class="drop_item">
                                        <a class="drop_link" href="<? echo 'catalog?page='.$itemMenu['id']; ?>"><?=$itemMenu['pagetitle'];?></a>
                                    </li>
                                <? endforeach; ?>
                            </ul>
                        <? endif; ?>
                    </li>
                    <li class="menu_item drop_down">
                        <a class="menu_link" href="#">Покупателям</a>
                        <ul class="drop_list owner_list">
                            <? if(!empty($widgets['site_menu'][1][6])) : ?>
                                <li>
                                    <a href = '/<?=$widgets['site_menu'][1][6]->url;?>'><?=$widgets['site_menu'][1][6]->title;?></a>
                                </li>
                            <? endif; ?>
                            <? if(!empty($widgets['site_menu'][0][3])) : ?>
                                <li>
                                    <a href = '/<?=$widgets['site_menu'][0][3]->url;?>'><?=$widgets['site_menu'][0][3]->title;?></a>
                                </li>
                            <? endif; ?>
                            <? if(!empty($widgets['site_menu'][1][4])) : ?>
                                <li>
                                    <a href = '/<?=$widgets['site_menu'][1][4]->url;?>'><?=$widgets['site_menu'][1][4]->title;?></a>
                                </li>
                            <? endif; ?>
                            <? if(!empty($widgets['site_menu'][1][5])) : ?>
                                <li>
                                    <a href = '/<?=$widgets['site_menu'][1][5]->url;?>'><?=$widgets['site_menu'][1][5]->title;?></a>
                                </li>
                            <? endif; ?>
                            <? if(!empty($widgets['site_menu'][0][1])) : ?>
                                <li>
                                    <a href = '/<?=$widgets['site_menu'][0][1]->url;?>'><?=$widgets['site_menu'][0][1]->title;?></a>
                                </li>
                            <? endif; ?>
                        </ul>
                    </li>
                    <li class="menu_item drop_down">
                        <a class="menu_link" href="#">Владельцам</a>
                        <ul class="drop_list owner_list">
                            <li>
                                <a href = 'http://nolimitmotors.rg3.su/catalog?page=186'>Аксессуары</a>
                            </li>
                            <li>
                                <a href = 'http://nolimitmotors.rg3.su/catalog?page=185'>Экипировка</a>
                            </li>
                            <? if(!empty($widgets['site_menu'][1][4])) : ?>
                                <li>
                                    <a href = '/<?=$widgets['site_menu'][1][4]->url;?>'><?=$widgets['site_menu'][1][4]->title;?></a>
                                </li>
                            <? endif; ?>
                            <? if(!empty($widgets['site_menu'][1][8])) : ?>
                                <li>
                                    <a href = '/<?=$widgets['site_menu'][1][8]->url;?>'><?=$widgets['site_menu'][1][8]->title;?></a>
                                </li>
                            <? endif; ?>
                            <? if(!empty($widgets['site_menu'][0][1])) : ?>
                                <li>
                                    <a href = '/<?=$widgets['site_menu'][0][1]->url;?>'><?=$widgets['site_menu'][0][1]->title;?></a>
                                </li>
                            <? endif; ?>
                        </ul>
                    </li>
                </ul>
        </div>
    </div>
    
    
    <script type="text/javascript" src="/www_site/js/jquery.js"></script>
    <script type="text/javascript" src="/www_site/js/respond.src.js"></script>
    <script type="text/javascript" src="/www_site/js/modernizr.js"></script>
    <script type="text/javascript" src="/www_site/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="/www_site/js/mobilyslider.js"></script>
    <script type="text/javascript">
        $(function() { 
            var dropDown = $('.drop_down'),
                page = $('.page'),
                overlay = $('.overlay'),
                aside = $('.main_menu'),
                wrap = $('#wrap'),
                dropLists = $('.drop_list');
            $('.slide_menu > li> .menu_link').click(function(){
                var firedEl = $(this).parent().find('.drop_list');
                dropLists.slideUp(500).parent().removeClass('opened');
                if (!firedEl.is(':visible')) {
                firedEl.slideDown(500).parent().addClass('opened');
            }       
                return false;
            });
            $('.menu').on ('click', function () {
                if (overlay.is(':visible')) {
                    page.animate({'marginLeft':0});
                    overlay.fadeOut(500);
                } else {
                    page.animate({'marginLeft': -247});
                    overlay.fadeIn(500);
                }
                return false;
            });

            $('ul.tabs').each(function()
            {
                $(this).find('li').each(function(i){
                    $(this).click(function(){
                        $(this).addClass('current').addClass('selected').siblings().removeClass('current').removeClass('selected')
                            .parents('div.section').find('div.box').eq(i).fadeIn(150).siblings('div.box').hide();
                    });
                });
            });

            $('.slider1').mobilyslider();
            
            
            function hideDropDowns() {
                $('.select_list').slideUp();
            }
            $(document).click(function (e) {
                if ($(e.target).parents().filter('.select_drop_down').length != 1) {
                    hideDropDowns();
                }
            });
            $('.select_drop_down').on('click', function () {
                var firedEl = $(this),
                        dropList = firedEl.find('.select_list'),
                        selectVal = firedEl.find('.select_value');
                if (dropList.is(':visible')) {
                    dropList.slideUp();
                } else {
                    hideDropDowns();
                    dropList.slideDown(500);
                }
                return false;
            });
            $('.select_item').on('click', function () {
                var firedEl = $(this);
                firedEl.parent().slideUp().prev().html(firedEl.text()).addClass('changed');
                return false;
            });         

            $("#setCookieForS").click(function()
            {
                event.preventDefault();
                id = $(this).attr('data');
                setCookie('item_' + id, id);
                alert('Товар добавлен в сравнение!');
                $(this).css({'display':'none'});
                //alert(getCookie('item'));
            });

            function setCookie(name,value)
            {
                argv=setCookie.arguments;
                argc=setCookie.arguments.length;
                expires=(argc>2)?argv[2]:null;
                path=(argc>3)?argv[3]:null;
                domain=(argc>4)?argv[4]:null;
                document.cookie=name+"="+escape(value)+
                ((expires==null)?"":";expires="+expires.toGMTString())+
                ((path==null)?"":";path="+path)+
                ((domain==null)?"":";domain="+domain);
            }

            $(".delCookie").click(function()
            {
                event.preventDefault();
                id = $(this).attr('data');
                var cookieExp = new Date();
                cookieExp.setMonth(cookieExp.getMonth()-1);
                document.cookie = 'item_'+id+'=; expires='+cookieExp.toGMTString()+';';
                location.href = '/cravnenie_modeley';
            });

            $(".delBothCookies").click(function()
            {
                event.preventDefault();
                id = $(this).attr('data');
                idArray = id.split(',');
                var cookieExp = new Date();
                cookieExp.setMonth(cookieExp.getMonth()-1);
                document.cookie = 'item_'+idArray[0]+'=; expires='+cookieExp.toGMTString()+';';
                document.cookie = 'item_'+idArray[1]+'=; expires='+cookieExp.toGMTString()+';';
                location.href = '/cravnenie_modeley';
            });

            $("#submitTest").click(function()
            {
                event.preventDefault();

                var field_1 = $('input[name=fname_1_0]');
                var field_2 = $('input[name=fname_1_1]');
                var field_3 = $('input[name=fname_1_2]');
                var field_4 = $('input[name=fname_1_3]');
                /*var field_2 = $('#fname_1_1');
                var field_3 = $('#fname_1_2');
                var field_4 = $('#fname_1_3');*/
                var field_5 = $('input[name=fname_1_4]');
                var field_6 = $('input[name=fname_1_5]');


                if(field_1.val().length === 0)
                {
                    alert('Не заполненно поле "ФИО"');
                    return 0;
                }
                else if(field_2.val().length === 0)
                {
                    alert('Не указан город!');
                    return 0;
                }
                else if(field_3.val().length === 0)
                {
                    alert('Не указана модель!');
                    return 0;
                }
                else if(field_4.val().length === 0)
                {
                    alert('Не указана марка!');
                    return 0;
                }
                else if(field_5.val().length === 0)
                {
                    alert('Не заполненно поле "Ваш email"');
                    return 0;
                }
                else if(field_6.val().length === 0)
                {
                    alert('Не заполненно поле "Ваш телефон"');
                    return 0;
                }

                /*$('input[name=fname_1_1]').val(field_2.text());
                $('input[name=fname_1_2]').val(field_3.text());
                $('input[name=fname_1_3]').val(field_4.text());*/

                $("#contact_1").submit();
            });

            $("#submitTo").click(function()
            {
                event.preventDefault();

                var field_1 = $('input[name=fname_10_0]');
                var field_2 = $('input[name=fname_10_1]');
                var field_3 = $('input[name=fname_10_2]');
                var field_4 = $('input[name=fname_10_3]');
                /*var field_2 = $('#fname_10_1');
                var field_3 = $('#fname_10_2');
                var field_4 = $('#fname_10_3');*/
                var field_5 = $('input[name=fname_10_4]');
                var field_6 = $('input[name=fname_10_5]');


                if(field_1.val().length === 0)
                {
                    alert('Не заполненно поле "ФИО"');
                    return 0;
                }
                else if(field_2.val().length === 0)
                {
                    alert('Не указан город!');
                    return 0;
                }
                else if(field_3.val().length === 0)
                {
                    alert('Не указана модель!');
                    return 0;
                }
                else if(field_4.val().length === 0)
                {
                    alert('Не указана марка!');
                    return 0;
                }
                else if(field_5.val().length === 0)
                {
                    alert('Не заполненно поле "Ваш email"');
                    return 0;
                }
                else if(field_6.val().length === 0)
                {
                    alert('Не заполненно поле "Ваш телефон"');
                    return 0;
                }

                /*$('input[name=fname_10_1]').val(field_2.text());
                $('input[name=fname_10_2]').val(field_3.text());
                $('input[name=fname_10_3]').val(field_4.text());*/

                $("#contact_10").submit();
            });

            $("#submitContacts").click(function()
            {
                event.preventDefault();

                var field_1 = $('input[name=fname_7_0]');
                var field_2 = $('#fname_7_1');
                var field_3 = $('input[name=fname_7_2]');
                var field_4 = $('input[name=fname_7_3]');
                var field_5 = $('textarea[name=fname_7_4]');


                if(field_1.val().length === 0)
                {
                    alert('Не заполненно поле "ФИО"');
                    return 0;
                }
                else if(field_2.text() === "Город*")
                {
                    alert('Не выбран город!');
                    return 0;
                }
                else if(field_3.val().length === 0)
                {
                    alert('Не заполненно поле "Ваш email"');
                    return 0;
                }
                else if(field_4.val().length === 0)
                {
                    alert('Не заполненно поле "Ваш телефон"');
                    return 0;
                }
                else if(field_5.val().length === 0)
                {
                    alert('Не заполненно поле "Подробности"');
                    return 0;
                }

                $('input[name=fname_7_1]').val(field_2.text());

                $("#contact_7").submit();
            });
            
        });
             
         $(window).load(function(){
            $('#pager').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 101,
                asNavFor: '#slider'
            });
            
            $('#slider').flexslider({
                animation: "slide",
                directionNav: false,
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            }); 
            
            var hPage = $('.page').height();
            var hMenu = $('.main_menu').css('height','100%');  
        });              
    </script>
</body>
</html>
