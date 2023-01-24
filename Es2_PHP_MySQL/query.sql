CREATE TABLE `utenti` (
  `ID_Utente` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Livello` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `utenti` (`Nome`, `Cognome`, `Username`, `Password`) 
VALUES ('Nicholas', 'Valenzano', 'NichoZ', '123456');