-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.14 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela sistema_votacao.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `evento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_evento_idx` (`evento_id`),
  CONSTRAINT `fk_categoria_evento` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sistema_votacao.categoria: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema_votacao.evento
CREATE TABLE IF NOT EXISTS `evento` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `capa` varchar(100) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sistema_votacao.evento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema_votacao.opcao
CREATE TABLE IF NOT EXISTS `opcao` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `responsavel` varchar(45) DEFAULT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evento_categoria_idx` (`categoria_id`),
  CONSTRAINT `fk_evento_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sistema_votacao.opcao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `opcao` DISABLE KEYS */;
/*!40000 ALTER TABLE `opcao` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema_votacao.voto
CREATE TABLE IF NOT EXISTS `voto` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `identidade` varchar(9) NOT NULL,
  `opcao_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identidade_UNIQUE` (`identidade`),
  KEY `fk_voto_opcao_idx` (`opcao_id`),
  CONSTRAINT `fk_voto_opcao` FOREIGN KEY (`opcao_id`) REFERENCES `opcao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela sistema_votacao.voto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `voto` DISABLE KEYS */;
/*!40000 ALTER TABLE `voto` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
