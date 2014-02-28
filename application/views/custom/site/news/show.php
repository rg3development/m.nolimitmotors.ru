<?php if (!empty($news)) : ?>
<div class="list-block">
    <div class="list-item two-blocks">
    	<div class="n-entry">
            <div class="tlt"><h3><?=$news['title'];?></h3></div>
            <span class="date"><?=date('d.m.y', $news['created'])?></span>
			<div class="cont">
        		<?=$news['description'];?>
        		<div class="line"></div>
        	</div>
        </div>
        <a href="<?=base_url().$page_url.'?news_id=0&per_page='.$offset?>">вернуться к полноу списку статей...</a>
    </div>
</div>
<?php endif; ?>