CREATE TABLE IF NOT EXISTS `tbl_teste` (
`id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tbl_teste`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_teste`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;