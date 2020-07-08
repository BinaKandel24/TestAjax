
--
-- Table structure for table `tbl_employee`
--
CREATE TABLE `inventory` (
  `Item_ID` int(100) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Item_Detail` varchar(100) NOT NULL,
  `CP` int(100) NOT NULL,
  `SP` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Item_ID`, `Item_Name`, `Item_Detail`, `CP`, `SP`) VALUES
(1, 'Mobile', 'Huwawei', 4000, 7000),
(2, 'TV', 'Sony', 5000, 7000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Item_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Item_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
