SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE `users` (
  `userid` smallint(4) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `userpassword` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`userid`, `username`, `userpassword`, `name`) VALUES
(1, 'peter', '123peterabc', 'Peter Smith'),
(2, 'mary', '123maryabc', 'Mary Poppins'),
(3, 'jimmy', '123jimmyabc', 'Jimmy Carter'),
(4, 'ada', '123adaabc', 'Ada Yonath');

ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

ALTER TABLE `users`
  MODIFY `userid` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

