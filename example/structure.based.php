<?php

/**
 * На базе структуры сайта
 */
 
 
/* Базовые настройки показа меню */
$iMenu = 1; // идентификатор меню
$sXsl = 'CssMenuMaker'; // название XSL-шаблона
$bShowInformationsystemGroups = TRUE; // показываем в меню группы инфосистемы (TRUE/FALSE)
$bShowShopGroups = TRUE; // показываем в меню группы магазина (TRUE/FALSE)
$iLevel = 3; // максимальный уровень вложенности меню (0 — если уровень вложенности не ограничен)


/* Код на базе контроллера показа структуры сайта */
$Structure_Controller_Show = new Structure_Controller_Show(
	Core_Entity::factory('Site', CURRENT_SITE));

$Structure_Controller_Show->xsl(Core_Entity::factory('Xsl')
	->getByName($sXsl))
	->showInformationsystemGroups($bShowInformationsystemGroups)
	->showShopGroups($bShowShopGroups)
	->addEntity(Core::factory('Core_Xml_Entity')
		->name('max_level')
		->value($iLevel)
	)
	->menu($iMenu)
	->show();
