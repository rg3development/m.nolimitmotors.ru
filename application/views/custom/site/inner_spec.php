<div class="content">
	<? if(!empty($widgets['catalog_item']) && $widgets['catalog_item'] != 0) : ?>
		<div class="item_top">
			<a href = '/catalog?page=<? if(!empty($widgets['catalog_item'][0]['parent'])) echo $widgets['catalog_item'][0]['parent']; ?>'><h1><? if(!empty($_GET['pagetitle'])) echo $_GET['pagetitle']; ?></h1></a>
			<?
				$pathToImg = '';
				$price = '';
				$cont = '';
				foreach($widgets['catalog_item'][0]['ph'] as $itemWithUrlToImg)
				{
					if (strpos($itemWithUrlToImg['value'], '.png') !== false)
						$pathToImg = $itemWithUrlToImg['value'];
					if (strpos($itemWithUrlToImg['value'], 'руб.') !== false)
						$price = $itemWithUrlToImg['value'];
					if (strpos($itemWithUrlToImg['value'], 'iframe') !== false)
						continue;
					if (strpos($itemWithUrlToImg['value'], '<p>') !== false)
							$cont = $itemWithUrlToImg['value'];
				}
			?>
			<img style = 'bottom: -120px;' src="<?=$pathToImg;?>" alt="<?=$_GET['pagetitle'];?>"/>
		</div>
		<style>
			.slides li img
			{
				height: 100%;
			}
		</style>
		<div class="item_middle">
			<h2><?=$widgets['catalog_item'][0]['pagetitle'];?></h2>
			<div class="item_image">
				<div id="slider">
					<ul class="slides">
						<li><img src="<?=$pathToImg;?>" alt=""/></li>
						<? if(!empty($widgets['catalog_item'][0]['slider'])) : ?>
							<? foreach($widgets['catalog_item'][0]['slider'] as $imageItem) : ?>
								<li><img src="<?=$imageItem['filename'];?>" alt=""/></li>
							<? endforeach; ?>
						<? endif; ?>
					</ul>
				</div>
				<div id="pager">
					<ul class="slides">
						<? if(!empty($widgets['catalog_item'][0]['slider'])) : ?>
							<li><img src="<?=$pathToImg;?>" alt=""/></li>
							<? foreach($widgets['catalog_item'][0]['slider'] as $imageItem) : ?>
								<li><img src="<?=$imageItem['filename'];?>" alt=""/></li>
							<? endforeach; ?>
						<? endif; ?>
					</ul>
				</div>
			</div>
			
			<? if(!empty($price)) : ?>
				<p class="price spacer">Цена: <span><?=$price;?></span></p>
			<? endif; ?>
		</div>
		
		<div class="item_bottom text_block spacer">
			<div class="row"><a class="yellow_btn btn" href="/test-drayv">Записатсья на тест-драйв</a></div>

			<!-- <div class="row"><a class="yellow_btn btn" href="#">Узнать подробности</a></div> -->
			<? if(!empty($widgets['catalog_item'][0]['content']) && empty($cont)) : ?>
				<?
					if (strpos($widgets['catalog_item'][0]['content'], '.pdf') !== false)
						if (strpos($widgets['catalog_item'][0]['content'], 'http://') !== false)
							$widgets['catalog_item'][0]['content'] = '<a href = "'.$widgets['catalog_item'][0]['content'].'">Читать</a>';
				?>
				<?=$widgets['catalog_item'][0]['content'];?>
			<? else : ?>
				<?
					if (strpos($cont, '.pdf') !== false)
						if (strpos($cont, 'http://') !== false)
							$cont = '<a href = "'.$cont.'">Читать</a>';
				?>
				<?=$cont;?>
			<? endif; ?>
			<? if(!empty($price)) : ?>
				<div class="row" id = 'getItemFS'><a id = 'setCookieForS' data = '<? if(!empty($widgets['catalog_item'][0]['id'])) echo $widgets['catalog_item'][0]['id']; ?>' class="yellow_btn btn" href="#">Сравнить</a></div>
			<? endif; ?>
			<script>
				cookieArr = getCookie('item');
				if(cookieArr.length == 2)
					$('#getItemFS').css({'display':'none'});
				else
					$('#getItemFS').css({'display':''});
				function getCookie(cName)
				{
					// разделение куков
					var cookieStr = document.cookie; // получаем строку куков
					cookieArray = cookieStr.split(';'); // вспоминаем о чудесном методе split и разбиваем строку с куками на упорядоченый массив по разделителю ";"
					var i, j;
					// удалим пробельные символы (если они, вдруг, есть) в начале и в конце у каждой куки
					for (j=0; j<cookieArray.length; j++)
						cookieArray[j] = cookieArray[j].replace(/(\s*)\B(\s*)/g, '');
					var cookieNameArray = new Array({name: '', value: new Array()});
					// обрабатываем каждую куку
					for (i=0; i<cookieArray.length; i++)
					{
						var keyValue = cookieArray[i].split('='); // разделяем имя и значение
						cookieVal = unescape(keyValue[1]).split(';'); // разделяем значения, если они заданы перечнем
						// удаляем пробельные символы  (если они, вдруг, есть) у значений в начале и в конце
						for (j=0; j<cookieVal.length; j++) cookieVal[j] = cookieVal[j].replace(/(\s*)[\B*](\s*)/g, '');
						keyValue[0] = keyValue[0].replace(/(\s*)[\B]*(\s*)/g, '');
						// вот получился такой cookie-объект
						cookieNameArray[i] = {
							name: keyValue[0],
							value: cookieVal
						};
					};
					var cookieNALen = cookieNameArray.length;    // размер полученного массива
					// выбираем нужную куку
					var resArray = [];
					var h = 0;
					if (!cName) return cookieNameArray;
					else
					{
						for (i=0; i<cookieNALen; i++)
						{
							if(cookieNameArray[i].name.indexOf(cName) + 1) {
								resArray[h] = cookieNameArray[i].value;
								h++;
							}
						}
						return resArray;
					}
					return false;
				};
			</script>
		</div>
	<? elseif(!empty($widgets['catalog_page']) && $widgets['catalog_page'] != 0) : ?>
		<div class="catalog_top" style = 'overflow: hidden; max-height: 140px;'>
			<? if(!empty($widgets['catalog_page']['getLogoImg'][0]['pagetitle'])) : ?>
				<h1><?=$widgets['catalog_page']['getLogoImg'][0]['pagetitle'];?></h1>
			<? endif; ?>
			<?
				$pathToImg = '';
				foreach($widgets['catalog_page']['getLogoImg'][0]['ph'] as $itemWithUrlToImg)
				{
					if (strpos($itemWithUrlToImg['value'], '.png') !== false)
						$pathToImg = $itemWithUrlToImg['value'];
				}
			?>
			<img style = 'margin-top: -60px;' width = '320px' src="<?=$pathToImg;?>" alt="<?=$widgets['catalog_page']['getLogoImg'][0]['pagetitle'];?>"/>
		</div>

		<ul class="catalog_box">
			<? foreach($widgets['catalog_page']['sections'] as $itemC) : ?>
			<?
				$pathToImg = '';
				$price = '';
				foreach($itemC['ph'] as $itemWithUrlToImg)
				{
					if (strpos($itemWithUrlToImg['value'], '.png') !== false)
						$pathToImg = $itemWithUrlToImg['value'];
					if (strpos($itemWithUrlToImg['value'], 'руб.') !== false)
						$price = $itemWithUrlToImg['value'];
				}
			?>
			<li>
				<div class="image"><img style = 'min-width: 146px; min-height: 119px;' width = '146px' height = '119px' src="<?=$pathToImg;?>" alt=""/></div>
				<div class="bottom">
					<a href="<? if(!empty($page_info['url'])) echo $page_info['url'].'?item='.$itemC['id'].'&pagetitle='.$widgets['catalog_page']['getLogoImg'][0]['pagetitle']; ?>"><?=$itemC['pagetitle'];?></a>
					<? if(!empty($price)) : ?>
						<p class="price">Цена: <span><?=$price;?></span></p>
					<? endif; ?>
				</div>
			</li>
			<? endforeach; ?>

			<? if(!empty($widgets['catalog_page']['imgs'])) : ?>
				<? foreach($widgets['catalog_page']['imgs'] as $itemI) : ?>
					<? if (strpos($itemI['filename'], 'upload') !== false) : ?>
						<li><img src="<?=$itemI['filename'];?>" alt=""/></li>
					<? endif; ?>
				<? endforeach; ?>
			<? endif; ?>
		</ul>
	<? else : ?>
		<? if(!empty($page_info['title'])) : ?>
			<h1><?=$page_info['title'];?></h1>
		<? endif; ?>

		<? if(!empty($widgets['catalog_menu'])) : ?>
			<ul class="catalog_line">
				<? foreach($widgets['catalog_menu'] as $itemMenu) : ?>
					<?
						$pathToImg = '';
						foreach($itemMenu['ph'] as $itemWithUrlToImg)
						{
							if (strpos($itemWithUrlToImg['value'], '.png') !== false)
								$pathToImg = $itemWithUrlToImg['value'];
						}
					?>
					<? if(!empty($page_info['url']) && $page_info['url'] == 'catalog') : ?>
						<li>
							<a href="<? if(!empty($page_info['url'])) echo $page_info['url'].'?page='.$itemMenu['id']; ?>"><img height = '60px' width = '60px' class="prew" src="<?=$pathToImg;?>" alt=""/></a>
							<a href="<? if(!empty($page_info['url'])) echo $page_info['url'].'?page='.$itemMenu['id']; ?>"><?=$itemMenu['pagetitle'];?></a>
						</li>
					<? else : ?>
						<? if($itemMenu['id'] == 75 || $itemMenu['id'] == 76 || $itemMenu['id'] == 77 || $itemMenu['id'] == 78) : ?>
							<li>
								<a href="<? if(!empty($page_info['url'])) echo $page_info['url'].'?page='.$itemMenu['id']; ?>"><img height = '60px' width = '60px' class="prew" src="<?=$pathToImg;?>" alt=""/></a>
								<a href="<? if(!empty($page_info['url'])) echo $page_info['url'].'?page='.$itemMenu['id']; ?>"><?=$itemMenu['pagetitle'];?></a>
							</li>
						<? endif; ?>
					<? endif; ?>
				<? endforeach; ?>
			</ul>
		<? endif; ?>
	<? endif; ?>

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