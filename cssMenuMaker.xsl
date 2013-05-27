<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE xsl:stylesheet>
<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:hostcms="http://www.hostcms.ru/"
	exclude-result-prefixes="hostcms">
	<xsl:output xmlns="http://www.w3.org/TR/xhtml1/strict" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" encoding="utf-8" indent="yes" method="html" omit-xml-declaration="no" version="1.0" media-type="text/xml"/>

	<xsl:template match="/site">
		<div id="cssmenu">
			<ul>
				<!-- Выбираем узлы структуры первого уровня -->
				<xsl:apply-templates select="*[@id][show=1][active=1]" />
			</ul>
		</div>
	</xsl:template>

	<!-- Запишем в константу ID структуры, данные для которой будут выводиться пользователю -->
	<xsl:variable name="current_structure_id" select="/site/current_structure_id"/>

	<xsl:template match="*">
		<!-- Шаблон выборки дочерних узлов -->
		<xsl:variable name="sub" select="*[@id][show=1][active=1]" />

		<li>
			<xsl:attribute name="class">
				<xsl:if test="$current_structure_id = @id or count(.//structure[@id=$current_structure_id]) = 1">active </xsl:if>
				<xsl:if test="position() = last()">last </xsl:if>
				<xsl:if test="$sub">has-sub</xsl:if>
			</xsl:attribute>

			<!-- Определяем адрес ссылки -->
			<xsl:variable name="link">
				<xsl:choose>
					<!-- Если внутренняя ссылка -->
					<xsl:when test="link != ''">
						<xsl:value-of disable-output-escaping="yes" select="link"/>
					</xsl:when>
					<!-- Если внешняя ссылка -->
					<xsl:otherwise>
						<xsl:value-of disable-output-escaping="yes" select="url"/>
					</xsl:otherwise>
				</xsl:choose>
			</xsl:variable>

			<!-- Показывать ссылку? -->
			<a href="{$link}">
				<span><xsl:value-of disable-output-escaping="yes" select="name"/></span>
			</a>
			
			<!-- Подузлы -->
			<xsl:if test="$sub">
				<ul>
					<xsl:apply-templates select="$sub" />
				</ul>
			</xsl:if>
		</li>
	</xsl:template>
</xsl:stylesheet>
