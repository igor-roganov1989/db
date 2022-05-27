<?
	$settings = new SiteSettings();
	
	$site = IblockSiteContent::getInstance();
	$site->setDirSEO();
	$index = ( $APPLICATION->GetCurPage() == '/')? true:false;
?>

<!doctype html>
<html lang="ru">
	<head>
		<? $APPLICATION->ShowHead(); ?>	
		<meta charset="UTF-8">
		<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>
			<? $APPLICATION->ShowTitle(); ?>
		</title>
		<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/css/main.css">
		
		<?#$APPLICATION->SetPageProperty("title",$site->GetField('NAME'));?>
		
		<?#$APPLICATION->SetPageProperty("description","dewdwedew");?>
		
	</head>
	<body>
		<? $APPLICATION->ShowPanel(); ?>
		<section class="header" id="header">
			<div class="container">
				<div class="header__logo">
					<a href="https://<?=$_SERVER['HTTP_HOST']?>"><img class="header__logo-image" src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo.svg" alt=""></a>
					<p class="header__logo-text"><?=$site->GetField('NAME')?></p>
				</div>
				<div class="header-col header-time">
					<svg class="header-col__icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#clock"></use></svg>
					<div class="header-col-info">
						<p class="header__main-text"><?=$site->GetProperty('CHASY_RABOTY')['~VALUE']['TEXT']?></p>
						<!--<p class="header__sub-text">Ежедневно</p>-->
					</div>
				</div>
				<div class="header-col header-place">
					<svg class="header-col__icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#place"></use></svg>
					<div class="header-col-info">
						<p class="header__main-text"><?=$site->GetProperty('ADRES')['~VALUE']['TEXT']?></p>
						<!--<p class="header__sub-text">21-й км Киевского шоссе</p>-->
					</div>
				</div>
				<div class="header-col header-phone">
					<svg class="header-col__icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#phone"></use></svg>
					<div class="header-col-info">
						<a href="tel:84951817092" class="header__main-text">8 (495) 181-70-92</a>
						<p class="header__sub-text">Круглосуточная консультация</p>
					</div>
				</div>
				<div class="header__mobile-icon" id="burger">
					<div class="header__mobile-icon-line"></div>
					<div class="header__mobile-icon-line"></div>
					<div class="header__mobile-icon-line"></div>
				</div>
			</div>
		</section>
		<section class="menu">
			<div class="container">
				<? $APPLICATION->IncludeComponent(
					"bitrix:news.list", 
					"menu", 
					array(
					"IBLOCK_ID" => $settings::IBLOCK_SITE_PAGES,
					"PARENT_SECTION" => $settings::getContentSectionBySiteID(),
					"COMPONENT_TEMPLATE" => "menu",
					"IBLOCK_TYPE" => "-",
					"NEWS_COUNT" => "20",
					"SORT_BY1" => "ACTIVE_FROM",
					"SORT_ORDER1" => "DESC",
					"SORT_BY2" => "SORT",
					"SORT_ORDER2" => "ASC",
					"FILTER_NAME" => "",
					"FIELD_CODE" => array(
					0 => "",
					1 => "",
					),
					"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
					),
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"PREVIEW_TRUNCATE_LEN" => "",
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "Y",
					"SET_META_KEYWORDS" => "Y",
					"SET_META_DESCRIPTION" => "Y",
					"SET_LAST_MODIFIED" => "N",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"ADD_SECTIONS_CHAIN" => "N",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"PARENT_SECTION_CODE" => "",
					"INCLUDE_SUBSECTIONS" => "Y",
					"STRICT_SECTION_CHECK" => "N",
					"DISPLAY_DATE" => "Y",
					"DISPLAY_NAME" => "Y",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "Y",
					"PAGER_TEMPLATE" => ".default",
					"DISPLAY_TOP_PAGER" => "N",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"PAGER_TITLE" => "Новости",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"SET_STATUS_404" => "N",
					"SHOW_404" => "N",
					"MESSAGE_404" => ""
					),
					false
				); ?>
				
			</div>
		</section>
		
		<? if ( $index ):?>
		
		<section class="banner" style="background-image:url('/upload/all_foto/<?=$site->GetProperty('KARTINKA_SHAPKA')['~VALUE']?>')">
			<div class="container">
				<h1 class="banner__title"><?=$site->GetField('NAME')?></h1>
				<p class="banner__description"><?=$site->GetProperty('SHAPKA_ANONS')['~VALUE']?></p>
				
				
				<!--<ul class="banner-list">
					<li class="banner-list__item">
					<svg class="banner-list__item-mark"><use xlink:href="assets/img/icons.svg#mark"></use></svg>
					Площадь: 16,5 га
					</li>
					<li class="banner-list__item">
					<svg class="banner-list__item-mark"><use xlink:href="assets/img/icons.svg#mark"></use></svg>
					Действующий некрополь закрытого типа
					</li>
					<li class="banner-list__item">
					<svg class="banner-list__item-mark"><use xlink:href="assets/img/icons.svg#mark"></use></svg>
					Доступны родственные под захоронения
					</li>
					<li class="banner-list__item">
					<svg class="banner-list__item-mark"><use xlink:href="assets/img/icons.svg#mark"></use></svg>
					Действующий открытый колумбарий
					</li>
				</ul>-->
				<p class="banner__description"><?=$site->GetProperty('PODROBNEE')['~VALUE']['TEXT']?></p>
				<a href="/kak-dobratsya/" class="primary-btn">Посмотреть схему</a>
			</div>
		</section>
		<section class="attention">
			<div class="container">
				<svg class="attention__icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#attention"></use></svg>
				<div class="attention-info">
					<p class="attention-info__title">Внимание!</p>
					<p class="attention-info__text"><?=$site->GetProperty('VNIMANIE')['~VALUE']['TEXT']?></p>
				</div>
			</div>
		</section>
		<section class="about">
			<div class="container">
				<h3 class="title">О кладбище</h3>
				<p class="subtitle"><?=$site->GetField('NAME')?></p>
				<div class="about-row">
					<p class="about__text">
						
					<?=$site->GetProperty('OSNOVNOY_TEKST')['~VALUE']['TEXT']?></p>
					<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/about.png" alt="" class="about__image">
				</div>
			</div>
		</section>
		<section class="documents">
			<div class="container">
				<div class="documents-left">
					<h3 class="title">Документы</h3>
					<p class="subtitle">Которые необходимо собрать для погребения</p>
					<img class="documents__photo" src="<?=SITE_TEMPLATE_PATH?>/assets/img/documents.png" alt="">
				</div>
				<ul class="documents-list">
					<li class="documents-list__item">
						<svg class="documents-list__item-icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#file"></use></svg>
						<div class="header-col-info">
							<p class="header__main-text">Протокол осмотра тела</p>
							<p class="header__sub-text">Выдается сотрудником полиции, телефон 02 (102 с мобильного телефона)</p>
						</div>
					</li>
					<li class="documents-list__item">
						<svg class="documents-list__item-icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#file"></use></svg>
						<div class="header-col-info">
							<p class="header__main-text">Справку o констатации смерти</p>
							<p class="header__sub-text">Выдается врачом поликлиники или бригадой скорой помощи, телефон 03 (103 с мобильного)</p>
						</div>
					</li>
					<li class="documents-list__item">
						<svg class="documents-list__item-icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#file"></use></svg>
						<div class="header-col-info">
							<p class="header__main-text">Врачебное свидетельство o смерти</p>
							<p class="header__sub-text">Выдается врачом поликлиники или работниками морга</p>
						</div>
					</li>
					<li class="documents-list__item">
						<svg class="documents-list__item-icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#file"></use></svg>
						<div class="header-col-info">
							<p class="header__main-text">Гербовое свидетельство o смерти органов ЗАГС</p>
							<p class="header__sub-text">Выдается работником органа ЗАГС</p>
						</div>
					</li>
					<li class="documents-list__item">
						<svg class="documents-list__item-icon"><use xlink:href="assets/img/icons.svg#file"></use></svg>
						<div class="header-col-info">
							<p class="header__main-text">Справка на получение государственного пособия на погребение</p>
							<p class="header__sub-text">Выдается работником органа ЗАГС</p>
						</div>
					</li>
					<li class="documents-list__item">
						<svg class="documents-list__item-icon"><use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/icons.svg#file"></use></svg>
						<div class="header-col-info">
							<p class="header__main-text">Договор об оказании ритуальных услуг</p>
							<p class="header__sub-text">Оформляется сотрудником похоронной службы</p>
						</div>
					</li>
				</ul>
				<p><?#=$site->GetProperty('DOKUMENTY')['~VALUE']['TEXT']?></p>
				
				
			</div>
		</section>
		
		<? else: ?>
		
		<section class="page">
			<div class="container">
				
				<? $APPLICATION->IncludeComponent(
					"bitrix:breadcrumb", 
					"main", 
					array(
					"COMPONENT_TEMPLATE" => "main",
					"START_FROM" => "0",
					"PATH" => "",
					"SITE_ID" => "k1"
					),
					false
				); ?>
				
				
				
				<h1 class="page-title"><?=$APPLICATION->ShowTitle(false) ?></h1>
				<p class="subtitle"><?=$site->GetField('NAME')?></p>
				<p class="page-text">
					
					
					
					
					
				<? endif; ?>																												