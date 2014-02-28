<div class="content">
	<? if(!empty($page_info['title'])) : ?>
		<h1><?=$page_info['title'];?></h1>
	<? endif; ?>

	<? if(!empty($content)) : ?>
		<?=$content;?>
	<? endif; ?>

	<? if(!empty($page_info['url']) && $page_info['url'] == 'buyers') : ?>
		<nav class="links_main">
			<ul>
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
						<a href = '/contacts'><?=$widgets['site_menu'][1][4]->title;?></a>
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
		</nav>
	<? elseif(!empty($page_info['url']) && $page_info['url'] == 'owners') : ?>
		<nav class="links_main">
			<ul>
				<li>
					<a href = 'http://nolimitmotors.rg3.su/catalog?page=186'>Аксессуары</a>
				</li>
				<li>
					<a href = 'http://nolimitmotors.rg3.su/catalog?page=185'>Экипировка</a>
				</li>
				<? if(!empty($widgets['site_menu'][1][4])) : ?>
					<li>
						<a href = '/contacts'><?=$widgets['site_menu'][1][4]->title;?></a>
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
		</nav>
	<? elseif(!empty($page_info['url']) && $page_info['url'] == 'cravnenie_modeley') : ?>
		<div id = 'message'></div>
		<? if(empty($_GET['item1']) && empty($_GET['item2'])) : ?>
			<script>
				cookieArr = getCookie('item');
				if(cookieArr.length == 0) $('#message').html('<p>Для сравнения товара перейдите в раздел каталога и выберите 2 понравившиеся модели.</p><br><h1>Вы не выбрали ни одного товара для сравнения!</h1>');
				if(cookieArr.length == 1) $('#message').html('<h1>Нужно выбрать еще один товар!</h1>');
				if(cookieArr.length == 2) location.href = '/cravnenie_modeley?item1='+cookieArr[0]+'&item2='+cookieArr[1];

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
		<? else : ?>
			<? if(!empty($widgets['sravnenie'])) : ?>
				<style>
				.box {
					display: none; /* по умолчанию прячем все блоки */
				}
				.box.visible {
					display: block; /* по умолчанию показываем нужный блок */
				}
				.tabsM ul li
				{
					cursor: pointer;
				}
				</style>
				<div class="section">
					<nav class="menu_sub yellow_btn menu_inner tabsM">
						<ul class="tabs">
							<li class="current selected" style = 'padding: 0 27px 0 27px;'><a>Модель №1</a></li>
							<li style = 'width: 48%;'><a>Модель №2</a></li>
						</ul>
					</nav>
					<a style = 'float: right;' href = '#' class = 'delBothCookies' data = '<?=$widgets['sravnenie']['item1'][0]['id'];?>,<?=$widgets['sravnenie']['item2'][0]['id'];?>'>Удалить обе модели из сравнения</a><br><br>
					<?
						$firstIter = true;
						$class = 'visible';
						foreach($widgets['sravnenie'] as $srItem) : ?>
						<?
							$pathToImg = '';
							$price = '';
							$cont = '';
							foreach($srItem[0]['ph'] as $itemWithUrlToImg)
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
							if($firstIter)
								$firstIter = false;
							else
								$class = '';
						?>
						<div class="box <?=$class;?>">
							<div class="item_middle">
								<h2><?=$srItem[0]['pagetitle'];?></h2>
								<a style = 'float: right;' href = '#' class = 'delCookie' data = '<?=$srItem[0]['id'];?>'>Удалить из сравнения</a><br><br>
								<div class="item_image">
									<div id="slider">
										<ul class="slides">
											<li><img src="<?=$pathToImg;?>" alt=""/></li>
										</ul>
									</div>
									
									<p class="price spacer">Цена: <span><?=$price;?></span></p>
								</div>
								
								<div class="item_bottom text_block spacer">
									<?=$cont;?>
									<?=$srItem[0]['content'];?>
								</div>
							</div>
						</div>
					<? endforeach; ?>
				</div><!-- .section -->
			<? endif; ?>
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
