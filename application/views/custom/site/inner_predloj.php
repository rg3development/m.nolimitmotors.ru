<?
	/*$otobeajat = 4;
	if(!empty($widgets['specpredloj']))
	{
		$kolvo = count($widgets['specpredloj']);
		$tmp = ceil($kolvo / $otobeajat);
		echo $tmp;
	}*/
?>


<div class="content">
	<? if(!empty($page_info['title'])) : ?>
		<h1><?=$page_info['title'];?></h1>
	<? endif; ?>

	<pre><? //print_r($widgets['specpredloj']); ?></pre>

	<? if(!empty($_GET['item']) && is_numeric($_GET['item'])) : ?>
		<? if(!empty($widgets['catalog_item'])) : ?>
			<p>
				<?
					echo str_replace('src="', 'src="http://nolimitmotors.ru/',$widgets['catalog_item'][0]['content']);
				?>
			</p>
		<? endif; ?>
	<? else : ?>
		<div class="offers">
			<? if(!empty($widgets['specpredloj'])) : ?>
				<? foreach($widgets['specpredloj'] as $item) : ?>
					<div class="offer">
						<div class="spacer">
							<p class="title"><a href="/<?=$page_info['url'].'?item='.$item['id'];?>"><?=$item['pagetitle'];?></a></p>
							<?
								$pathToImg = '';
								foreach($item['ph'] as $itemWithUrlToImg)
								{
									if (strpos($itemWithUrlToImg['value'], '.jpg') !== false ||
										strpos($itemWithUrlToImg['value'], '.gif') !== false ||
										strpos($itemWithUrlToImg['value'], '.png') !== false)
										$pathToImg = $itemWithUrlToImg['value'];
								}
							?>
							<? if(!empty($pathToImg)) : ?>
								<div class="banner"><a href="/<?=$page_info['url'].'?item='.$item['id'];?>"><img src="<?=$pathToImg;?>" alt=""/></a></div>
							<? endif; ?>
							<p><?=$item['introtext'];?></p>
							<p class="more"><a href="/<?=$page_info['url'].'?item='.$item['id'];?>">Читать полностью</a></p>
						</div>
					</div>
				<? endforeach; ?>
			<? endif; ?>
		</div>
	<? endif; ?>
	
	<!-- <div class="pager">
		<span><a href="#" class="prev">пред.</a></span>
		<a href="#">1</a>
		<span>2</span>
		<a href="#">3</a>
		<a href="#">4</a>
		<a href="#" class="next">след.</a>
	</div> -->

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