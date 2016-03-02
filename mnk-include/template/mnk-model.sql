CREATE TABLE IF NOT EXISTS `mnk_info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `mailAdmin` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `mnk_page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ID_parent` int(11) NOT NULL,
  `var` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hide` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;
