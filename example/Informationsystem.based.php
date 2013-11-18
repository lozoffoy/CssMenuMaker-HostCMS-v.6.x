<?php

/***
 * На базе информационной системы
 **/
 
 
/* Базовые настройки показа меню */
$iIS = 1; // идентификатор информационной системы
$sXsl = 'CssMenuMaker'; // название XSL-шаблона
$iLevel = 0; // максимальный уровень вложенности меню (0 — если уровень вложенности не ограничен)


/* Код на базе контроллера показа информационной системы */
$Informationsystem_Controller_Show = new Informationsystem_Controller_Show(
	Core_Entity::factory('Informationsystem', $iIS)
);

$Informationsystem_Controller_Show
	->xsl(Core_Entity::factory('Xsl')
		->getByName($sXsl))
	->addEntity(Core::factory('Core_Xml_Entity')
		->name('max_level')
		->value($iLevel))
	->groupsMode('all')
	->show();
