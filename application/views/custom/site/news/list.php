<? if (!empty($news_list)) :?>
    <div class="offers">
    <? foreach ($news_list as $key => $news) : ?>
        <div class="offer">
            <div class="spacer">
                <p class="title"><a href="#"><a href="<?='/'.$page_url.'?news_id='.$news['id'].'&per_page='.$offset;?>"><?=$news['title'];?></a></p>
                <? if(!empty($news['filename'])): ?>
                    <div class="banner"><a href="<?='/'.$page_url.'?news_id='.$news['id'].'&per_page='.$offset;?>"><img src="/upload/images/news/<?=$news['filename'];?>" alt=""/></a></div>
                <? endif; ?>
                <p><?=$news['anno'];?></p>
                <p class="more"><a href="<?='/'.$page_url.'?news_id='.$news['id'].'&per_page='.$offset;?>">Читать полностью</a></p>
            </div>
        </div>
    <? endforeach; ?>
    </div>
    <?=!empty($paginator) ? '<div class="pager">'.$paginator.'</div>' : ''; ?>
<? endif; ?>

