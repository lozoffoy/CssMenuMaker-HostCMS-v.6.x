<?php

/**
 * На базе интернет-магазина
 */

 
/* Базовые настройки показа меню */
$iShop = 2; // идентификатор интернет-магазна
$sXsl = 'CssMenuMaker'; // название XSL-шаблона
$iLevel = 0; // максимальный уровень вложенности меню (0 — если уровень вложенности не ограничен)


/* Код на базе контроллера показа интернет-магазина */
$Shop_Controller_Show = new Shop_Controller_Show(
	Core_Entity::factory('Shop', $iShop));

$Shop_Controller_Show
	->xsl(Core_Entity::factory('Xsl')
		->getByName($sXsl))
	->addEntity(Core::factory('Core_Xml_Entity')
		->name('max_level')
		->value($iLevel))
	->groupsMode('all')
	->show();
