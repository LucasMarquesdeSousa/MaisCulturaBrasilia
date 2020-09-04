CREATE DATABASE  IF NOT EXISTS `bdevento` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bdevento`;

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `autorizado` char(1) DEFAULT '0',
  `data_hora` datetime DEFAULT NULL,
  `usuario_cpf` bigint(11) NOT NULL,
  `evento_cod` int(11) DEFAULT NULL,
  `espaco_cod` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_comentario_usuario1_idx` (`usuario_cpf`),
  KEY `fk_comentario_evento1_idx` (`evento_cod`),
  KEY `fk_comentario_usuario _idx` (`espaco_cod`),
  CONSTRAINT `fk_comentario_espaco_cultural1` FOREIGN KEY (`espaco_cod`) REFERENCES `espaco_cultural` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_comentario_evento1` FOREIGN KEY (`evento_cod`) REFERENCES `evento` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_comentario_usuario1` FOREIGN KEY (`usuario_cpf`) REFERENCES `usuario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (34,'                                      Teste teste    ','N',NULL,80227708172,9,NULL),(35,'                                \r\n                             teste','0',NULL,980227708172,NULL,5);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `espaco_cultural`
--

DROP TABLE IF EXISTS `espaco_cultural`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `espaco_cultural` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `descricao` varchar(1000) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `usuario_cpf` bigint(11) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_espaco_cultural_usuario1_idx` (`usuario_cpf`),
  CONSTRAINT `fk_espaco_cultural_usuario1` FOREIGN KEY (`usuario_cpf`) REFERENCES `usuario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `espaco_cultural`
--

LOCK TABLES `espaco_cultural` WRITE;
/*!40000 ALTER TABLE `espaco_cultural` DISABLE KEYS */;
INSERT INTO `espaco_cultural` VALUES (5,'Planetário','(61) 3361-6810.','Setor de Difusão Cultural – Via N1 (Eixo Monumenta','De terça-feira a sexta-feira, 17h30 e 19h; De sábado a domingo, 10h, 11h, 14h, 15h, 16h30, 17h30 e 1','O Planetário de Brasília começou a projetar as estrelas para a população em 15 de março de 1974. Sem demora, passou a ser um dos pontos turísticos mais visitados de Brasília. O prédio foi projetado pelo arquiteto carioca Sérgio Bernardes. Sua estrutura remete à imagem de um disco voador pousado sobre o gramado do Eixo Monumental.                    O Planetário de Brasília é um centro científico, cultural, histórico e de entretenimento. Trata-se de uma ferramenta pública capaz de levar imagens sobre o universo e a vida pelas lentes de modernos equipamentos de projeção. As projeções são capazes de propocionar ao público momentos únicos, tanto para diversão, quanto para a construção do saber. O edifício também oferece espaço para eventos, oficinas e palestras.                    Para balancear o respeito ao passado e a necessidade de busca pelo futuro, o Planetário conta com o equipamento de projeção original, o SpaceMaster, assim como um novo modelo atualizado, o Power Dome VIII. Os apa','planetario.jpg',80227708172),(6,'Catetinho','(61) 3338-8803','Museu do CatetinhoBR 040 – Saída Sul; Park Way/DF ','Terça a Domingo (inclusive feriados) – 9h às 17h.','O Catetinho foi a primeira residência oficial do presidente Juscelino Kubitschek. O projeto museográfico procura retomar                     as referências de época, preservando-se alguns objetos e o mobiliário original. Imagens fotográficas, bem como outros objetos, complementam                     as ambientações com o objetivo de propiciar ao público um testemunho vivo da grande aventura que foi a construção de Brasília.     ','catetinho.jpg',80227708172),(7,'Teatro SESC Newton Rossi','(61) 3379-9500','QNN 27, Lote B, s/n, Ceilândia Norte, CEP 72225-27','Não informaddo.','Localizados em diversos pontos da cidade, os espaços culturais do Sesc-DF são responsáveis por viabilizar o acesso à cultura                    de qualidade no DF. Frequentemente recebe grupos de teatro, dança e música que se apresentam para o público local, levando o que há de melhor                    das artes e promovendo a inclusão social de sua clientela. Além disso, é possível expor trabalhos nos espaços.                    Espaço cultural da cidade de Ceilândia-DF, oferece uma diversificada programação:                    apresentações de dança, teatro, show, cinema, oficinas, exposições, aulas de dança do ventre, dança de salão, ballet, baby class, aula de violão.                    A maioria das apresentações tem entrada franca, as aulas tem o valor conforme a modalidade.','teatro_sesc.jpg',80227708172);
/*!40000 ALTER TABLE `espaco_cultural` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `faixa_etaria` int(11) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `local` varchar(50) DEFAULT NULL,
  `horario` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `usuario_cpf` bigint(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `fk_evento_usuario1_idx` (`usuario_cpf`),
  CONSTRAINT `fk_evento_usuario1` FOREIGN KEY (`usuario_cpf`) REFERENCES `usuario` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'Favela Sounds',16,'favela@gmail.com','Museu Naciona e Sol Nascente',12:00:00,'favela.jpg','(61)999594734','Gratuito. A 4ª edição do Favela Sounds está chegando! Com programação gratuita, o evento tem atrações musicais e também atividades formativas. Uma das programações já anunciadas é o artista plástico  ',80227708172,'N',12-04-2021),(3,'Galerias Piccola I e II',livre,'www@gmail.com','CAIXA Cultural Brasília - SBS, Quadra 4',17:00:00,'exposicao.jpg','(61) 3206-6456','15 de Outubro a 15 de Dezembro de 2019. As Galerias Piccola I e II da CAIXA Cultural Brasília recebem, de 15 de outubro a 15 de dezembro, a exposição Fernando Lopes – 50 anos de desenho. São mais de 2',80227708172,'N',12-09-2021),(4,'A Volta aos Anos 80',18,'https://festa80.com.','CAIXA Cultural Brasília - SBS, Quadra 4',18:00:00,'festa3.png','(61)985151903','A Volta aos Anos 80 acontece dia 9 de Novembro no Clube AABB em Brasília. Não perca! Está aberta a venda de ingressos para a festa mais #oitentista de Brasília!',80227708172,'N',15-03-2021);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `cod` int(11) NOT NULL,
  `perfil` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'adm'),(2,'usu');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `sobrenome` varchar(50) DEFAULT NULL,
  `senha` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dt_nascimento` date DEFAULT NULL,
  `perfil_cod` int(11) NOT NULL,
  PRIMARY KEY (`cpf`),
  KEY `fk_usuario_perfil1_idx` (`perfil_cod`),
  CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`perfil_cod`) REFERENCES `perfil` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (80227708172,'lucas','marques','	
202cb962ac59075b964b07152d234b70','lucassss@gmail.com','2000-02-01',1),(06347980142,'lucas','marques','123','lucas@gmail.com','1999-01-01',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-06 16:30:18
