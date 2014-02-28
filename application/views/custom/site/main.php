<div class="content">
    <div class="banner_main">
        <? if(!empty($widgets['widgets']['items'][5]['item'])) : ?>
            <?=$widgets['widgets']['items'][5]['item']->description;?>
        <? endif; ?>
      <div style = 'clear:both;'></div>
    </div>
    <nav class="links_main">
        <ul>
            <?=$menu;?>
        </ul>
    </nav>

    <div class="connect spacer">
        Свяжитесь с ближайшим салоном
        <div class="citi-tel yellow_btn row">
            <div class="city">Новосибирск</div> <a href="tel:+7(383)2-300-400" class="tel">+7(383)2-300-400</a>
        </div>
    </div>

    <? if(!empty($widgets['site_menu'][1][1])) : ?>
        <div class="other other_main">
            <a href="<?=$widgets['site_menu'][1][1]->url;?>"><?=$widgets['site_menu'][1][1]->title;?></a>
        </div>
    <? endif; ?>
    
    <? if(!empty($widgets['widgets']['items'][1]['item'])) : ?>
        <div class="go2site">
            <a href="<?=$widgets['widgets']['items'][1]['item']->link;?>"><?=$widgets['widgets']['items'][1]['item']->title;?></a>
        </div>
    <? endif; ?>
</div>
