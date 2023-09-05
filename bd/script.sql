-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.4.28-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para desafio
CREATE DATABASE IF NOT EXISTS `desafio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `desafio`;

-- Copiando estrutura para tabela desafio.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela desafio.cargos: ~2 rows (aproximadamente)
INSERT INTO `cargos` (`id`, `cargo`, `descricao`) VALUES
	(1, 'Gerente Geral', 'Administrar todo o negócio e promover a interoberabilidade.'),
	(2, 'Desenvolvedor BackEnd', 'Responsável pelo desenvolvimento de software de backend.'),
	(7, 'Supervisor Administrativo', 'Supervisionar Pessoal e Suprimentos'),
	(8, 'Analista de Sistemas', 'Analisa os processos e dá suporte ao uso do Sistema');

-- Copiando estrutura para tabela desafio.funcionarios
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `idCargo` int(11) DEFAULT NULL,
  `dtnasc` date DEFAULT NULL,
  `salario` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_funcionarios_cargos` (`idCargo`),
  CONSTRAINT `FK_funcionarios_cargos` FOREIGN KEY (`idCargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela desafio.funcionarios: ~0 rows (aproximadamente)
INSERT INTO `funcionarios` (`id`, `nome`, `sobrenome`, `idCargo`, `dtnasc`, `salario`) VALUES
	(1, 'Marcus', 'Lima', 1, '1986-09-05', 8000),
	(3, 'Francisco', 'Chagas', 1, '1988-04-14', 18000),
	(4, 'Maria', 'Peralta', 8, '1988-05-14', 10000);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
