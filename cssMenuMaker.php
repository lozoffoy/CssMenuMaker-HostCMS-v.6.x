<?php
/* Базовые настройки показа меню */
$iMenu = 1; // идентификатор меню
$sXsl = 'CssMenuMaker'; // название XSL-шаблона
$bShowInformationsystemGroups = TRUE; // показываем в меню группы инфосистемы (TRUE/FALSE)
$bShowShopGroups = TRUE; // показываем в меню группы магазина (TRUE/FALSE)

/* Код показа */
$Structure_Controller_Show = new Structure_Controller_Show(
	Core_Entity::factory('Site', CURRENT_SITE));

$Structure_Controller_Show->xsl(Core_Entity::factory('Xsl')
	->getByName($sXsl))
	->showInformationsystemGroups($bShowInformationsystemGroups)
	->showShopGroups($bShowShopGroups)
	->menu($iMenu)
	->show();
?>