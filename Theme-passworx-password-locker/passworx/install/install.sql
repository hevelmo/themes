CREATE TABLE IF NOT EXISTS `activity` (
  `activityId` int(5) NOT NULL AUTO_INCREMENT,
  `userId` int(5) DEFAULT '0',
  `activityType` int(2) DEFAULT NULL,
  `activityTitle` text,
  `activityDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `markDeleted` int(1) DEFAULT '0',
  `ipAddress` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`activityId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `categories` (
  `catId` int(5) NOT NULL AUTO_INCREMENT,
  `userId` int(5) DEFAULT '0',
  `catTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `catDesc` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `catDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `ipAddress` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `components` (
  `compId` int(5) NOT NULL AUTO_INCREMENT,
  `compTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `compDesc` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `compDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `compVersion` int(5) DEFAULT '0',
  `lastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `ipAddress` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`compId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `entries` (
  `entryId` int(5) NOT NULL AUTO_INCREMENT,
  `catId` int(5) DEFAULT '0',
  `userId` int(5) DEFAULT '0',
  `entryTitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `entryDesc` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `entryUsername` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `entryPass` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `entryUrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `entryNotes` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `entryDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `ipAddress` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`entryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `sitesettings` (
  `installUrl` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `siteName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `siteEmail` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `localization` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'english',
  `saltCode` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `allowRegistrations` int(1) DEFAULT '1',
  `calLocalization` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'en',
  `avatarFolder` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'avatars/',
  `userDocsPath` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'docs/',
  `avatarTypesAllowed` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'jpg,png',
  `fileTypesAllowed` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'jpg,png,gif,txt,pdf,xls,xlsx,doc,docx,zip,rar',
  `weatherLoc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT 'Washington, DC',
  `weekStart` int(1) DEFAULT '0',
  `lastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`installUrl`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(9) NOT NULL AUTO_INCREMENT,
  `superUser` int(1) DEFAULT '0',
  `userEmail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `firstName` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_bin DEFAULT 'Washington, DC',
  `userFolder` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `userAvatar` varchar(100) COLLATE utf8_bin DEFAULT 'userAvatar.png',
  `joinDate` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `recEmails` int(1) DEFAULT '0',
  `isActive` int(1) DEFAULT '0',
  `hash` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `lastVisited` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdated` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;
