CREATE TABLE IF NOT EXISTS `burndown` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `description` text,
  `effort` int(11) DEFAULT NULL,
  `start` text,
  `deadline` int(11) DEFAULT NULL,
  `progress` decimal(10,0) DEFAULT NULL,
  `time` text,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `burndown`
--

INSERT INTO `burndown` (`key`, `pid`, `description`, `effort`, `start`, `deadline`, `progress`, `time`) VALUES
(1, 1, 'this is test description', 10, '12', 14, 123, '3');

-- --------------------------------------------------------

--
-- Table structure for table `gantt`
--

CREATE TABLE IF NOT EXISTS `gantt` (
  `key` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `description` text NOT NULL,
  `start` decimal(10,0) NOT NULL,
  `end` decimal(10,0) NOT NULL,
  `done` int(11) NOT NULL,
  `neededby` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gantt`
--

INSERT INTO `gantt` (`key`, `pid`, `description`, `start`, `end`, `done`, `neededby`) VALUES
(1, 1, 'this is test description', 12, 14, 123, 12);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `membername` varchar(500) NOT NULL,
  `startdate` varchar(500) NOT NULL,
  `enddate` varchar(500) NOT NULL,
  `createddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `pid`, `membername`, `startdate`, `enddate`, `createddate`) VALUES
(1, 1, 'Mrinalini', '12-12-2016', '14-12-2016', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `projectnames`
--

CREATE TABLE IF NOT EXISTS `projectnames` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectname` varchar(500) NOT NULL,
  `createddate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projectnames`
--

INSERT INTO `projectnames` (`id`, `projectname`, `createddate`) VALUES
(1, 'project1', '0000-00-00 00:00:00'),
(2, 'project2', '0000-00-00 00:00:00'),
(3, 'project3', '0000-00-00 00:00:00'),
(4, 'project3', '0000-00-00 00:00:00'),
(5, 'project4', '0000-00-00 00:00:00');
