CREATE DATABASE  IF NOT EXISTS `hg-study` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hg-study`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 10.0.0.103    Database: hg-study
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'SQL','2021-01-27 09:29:02'),(2,'PHP','2021-01-27 09:32:58'),(3,'JavaScript','2021-01-27 09:32:58'),(4,'FireWall','2021-01-27 09:32:58'),(5,'Proxy','2021-01-27 09:32:58'),(6,'Servidores','2021-01-27 09:32:58'),(7,'Pentest','2021-01-27 09:32:58'),(8,'Linux','2021-01-27 09:32:58'),(9,'Criptografia','2021-01-27 09:32:58'),(10,'Bootstrap','2021-01-27 09:32:58'),(11,'jQuery','2021-01-27 09:32:58'),(12,'Design','2021-01-27 09:32:58'),(13,'MySQL','2021-01-27 09:32:58'),(14,'Modelagem de Dados','2021-01-27 09:32:59'),(15,'Android','2021-01-27 09:32:59'),(16,'GO','2021-01-27 09:32:59'),(17,'IOS','2021-01-27 09:32:59'),(18,'Big Data','2021-01-27 09:32:59'),(19,'Python','2021-01-27 09:32:59'),(20,'Análise de Dados','2021-01-27 09:32:59'),(21,'Desenvolvimento','2021-01-27 09:32:59'),(22,'Redes','2021-01-27 09:32:59'),(23,'Segurança','2021-01-27 09:32:59'),(24,'Banco de Dados','2021-01-27 09:32:59'),(25,'Inteligência Artificial','2021-01-27 09:32:59'),(26,'Big Data','2021-01-27 09:32:59');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `certificates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificates`
--

LOCK TABLES `certificates` WRITE;
/*!40000 ALTER TABLE `certificates` DISABLE KEYS */;
INSERT INTO `certificates` VALUES (2,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem deleniti vel non blanditiis labore nostrum incidunt quaerat aspernatur mollitia veritatis numquam quae, sunt ipsa est temporibus, voluptates neque illum repellendus!',1,'2020-07-15 16:02:43'),(3,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem deleniti vel non blanditiis labore nostrum incidunt quaerat aspernatur mollitia veritatis numquam quae, sunt ipsa est temporibus, voluptates neque illum repellendus!',1,'2020-07-15 16:05:36');
/*!40000 ALTER TABLE `certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_post` int NOT NULL,
  `id_user` int NOT NULL,
  `id_comment` int DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_post` (`id_post`),
  KEY `id_user` (`id_user`),
  KEY `comments_ibfk_3` (`id_comment`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Never say goodbye till the end comes!',1,2,NULL,'2020-07-07 20:48:06'),(2,'comentário editado',1,2,NULL,'2020-07-11 17:19:59'),(5,'Gostei desse comentário',1,3,1,'2020-07-11 17:40:17'),(6,'Gostei desse comentário também',1,1,1,'2020-07-11 17:40:41');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `experiences` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `experiences_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiences`
--

LOCK TABLES `experiences` WRITE;
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` VALUES (2,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.',1,'2020-07-09 09:40:48'),(3,'andré Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem deleniti vel non blanditiis labore nostrum incidunt quaerat aspernatur mollitia veritatis numquam quae, sunt ipsa est temporibus, voluptates neque illum repellendus!',1,'2020-07-10 15:44:07'),(4,'andre@teste.com.br',1,'2020-07-10 15:45:29'),(5,'lorem ipsum',1,'2020-07-10 15:46:52'),(7,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem deleniti vel non blanditiis labore nostrum incidunt quaerat aspernatur mollitia veritatis numquam quae, sunt ipsa est temporibus, voluptates neque illum repellendus!',1,'2020-07-10 16:03:55'),(8,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem deleniti vel non blanditiis labore nostrum incidunt quaerat aspernatur mollitia veritatis numquam quae, sunt ipsa est temporibus, voluptates neque illum repellendus!',2,'2020-07-11 17:17:03');
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_post` int NOT NULL,
  `id_category` int NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_post` (`id_post`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `post_categories_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`),
  CONSTRAINT `post_categories_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_post` int NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_post` (`id_post`),
  CONSTRAINT `post_likes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `post_likes_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_likes`
--

LOCK TABLES `post_likes` WRITE;
/*!40000 ALTER TABLE `post_likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quote` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content2` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `picture` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` int NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Cartridge Is Better Than Ever A Discount Toner editado','MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training. \n\nMCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.','eu editei aqui Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government.banking','MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training. \n\nMCSE ','p1.jpg',1,'2020-07-07 20:11:55'),(2,'Cartridge Is Better Than Ever A Discount Toner','MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training. \n\nMCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.','Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government.banking','MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training. \n\nMCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.','p3.jpg',2,'2020-07-15 13:48:41'),(3,'Cartridge Is Better Than Ever A Discount Toner','MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training. \n\nMCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.','Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government.banking','MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training. \n\nMCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.','p2.jpg',2,'2020-07-15 14:14:12'),(4,'Cartridge Is Better Than Ever A Discount Toner','MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training. \n\nMCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.','Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government.banking','MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training. \n\nMCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.','p4.jpg',2,'2020-07-15 14:14:29'),(5,'Minha publicação sobre o Pikachu','Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem eaque rem, atque eligendi placeat tenetur suscipit inventore, deleniti nulla veniam sapiente a fugit repellat ratione ex unde qui at fuga?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem eaque rem, atque eligendi placeat tenetur suscipit inventore, deleniti nulla veniam sapiente a fugit repellat ratione ex unde qui at fuga.','','','27aecfe3d1ed23611cc9cd0df8f86a01.jpg',1,'2021-01-29 19:16:49'),(7,'Teste','cvsdjhnj vnsdvbnsdv','','','post.png',1,'2021-01-29 19:37:34'),(8,'Desenvolvimento de apps: conheça o processo do início ao fim','A cada dia, milhares de aplicativos para celular são publicados nas lojas da Google e da\r\nApple. Alguns deles são jogos, outros são redes sociais e muitos são apps de comércio\r\neletrônico. Mas todos esses aplicativos, se construídos profissionalmente, devem seguir um\r\nprocesso de desenvolvimento semelhante.\r\nNo post de hoje, vamos apresentar as etapas do processo de desenvolvimento de aplicativos do\r\ninício ao fim. Continue a leitura e mãos à obra!\r\nEmbora cada aplicativo móvel comece com uma ideia central, sua premissa inicial\r\nprovavelmente não é suficiente para criar um app que ganhe dinheiro ou obtenha uma\r\naudiência. Você precisa criar um aplicativo que atenda a um mercado suficientemente grande,\r\nmas também seja específico o bastante para ressoar com usuários particulares.\r\nPara tanto, em vez de começar com a fase de design, dedique um tempo para uma extensa\r\npesquisa de mercado. Começando assim, é possível agir com mais assertividade e dar a você,\r\nsua organização e seus investidores a confiança de que seus esforços não serão em vão.\r\nNo final desse processo, você deve ter o escopo do trabalho mapeado e ter determinado\r\nquanto do processo de design será feito em casa.\r\n','','Seus desenvolvedores podem usar uma plataforma de criação de aplicativos, como o\r\nGoodBarber, o Shopgate e o Buildfire, ou configurar o armazenamento, bancos de dados, APIs e\r\nservidores à medida que começam a criar o backend do seu protótipo.\r\nAo chegar aqui, você deve ter configurado contas de desenvolvedores para as lojas de\r\naplicativos onde você planeja publicar o seu.\r\nDurante o estágio, é imperativo que você considere fatores múltiplos, como multitarefa, fator\r\nde forma, dispositivo e fragmentação do sistema operacional. É inútil incorporar recursos e\r\nfunções no app se não forem compatíveis com a maioria dos smartphones.\r\nOs desenvolvedores devem ter em mente as limitações de recursos no celular e, além disso,\r\nescrever códigos para que o app não cobre muito do processador ou da memória.','c6893d0b4492809d41fbe0af52e590a7.jpg',1,'2021-01-29 19:47:10'),(9,'O ciclo de vida e envolvimento dos usuários de aplicativos','Um estudo realizado pela MTV Networks, que analisou a forma como os consumidores\r\ndescobrem e interagem com aplicativos de entretenimento em seus iPhones e dispositivos\r\nAndroid determinaram que o ciclo de vida de um aplicativo com os usuários passa por quatro\r\nfases: descoberta, adoção, avaliação e de abandono ou de uso a longo prazo.\r\n\r\nPara desenvolvedores de aplicativos e profissionais de marketing, estas fases e os resultados\r\nespecíficos deste estudo são vitais; eles fornecem uma visão sobre o que é importante para os\r\nconsumidores e a melhor forma de alcançá-los, de modo que os aplicativos que eles projetam e\r\nde mercado podem tornar-se popular e favoritos.','','Depois que os consumidores baixam e começam a usar um aplicativo, eles se movem para a\r\nfase de julgamento. A fase de julgamento em última instância, determina se a fase final do ciclo\r\nde vida desse aplicativo específico será abandono ou uso a longo prazo.\r\n\r\nO estudo MTV descobriu que as pessoas usam aplicativos por algumas razões. A facilidade de\r\nuso superou todos os outros fatores como o mais importante durante o período experimental.\r\nNo entanto, o conteúdo consistentemente agradável e a aparência limpa também influenciou\r\nno gosto de aplicativos dos entrevistados. Outro fator importante era se os aplicativos são\r\ndivertidos e possuem algo de entretenimento. Mas se o conteúdo, aparência e a usabilidade de\r\num aplicativo não são suportados por uma interface fácil de usar, o aplicativo eventualmente\r\nfalha aos olhos dos consumidores.','a2969aaf31a6d7a56d2c8e7f64882924.png',1,'2021-01-29 19:54:11'),(10,'O mercado de dispositivos móveis na América Latina e os desafios para uma base de consumidores online','Em 2015, uma senhora mexicana de 79 anos chamada Lorenza Solís contou para o jornal El País,\r\num dos mais relevantes para a América Latina, que não sabia o que significava o termo\r\nsmartphone, mas que todos os dias antes de sair de casa, checava as condições do tempo,\r\nmensagens e troca de fotos com a família em seu celular. Uma situação que ilustra bem como a\r\nregião caminha para se tornar o segundo maior mercado de dispositivos móveis no mundo em\r\n2020, de acordo com a GSMA, entidade que atua e monitora o setor.\r\n\r\nNaquela reportagem também chamou a atenção o fato de que nem a senhora Lorenza ou\r\nqualquer outro entrevistado citou o uso destes aparelhos para conversas por voz. O cenário já\r\nse resumia em conteúdo e dados. Hoje, cada vez mais. A comunicação por voz partiu de único\r\nrecurso para apenas uma das muitas possibilidades. Uma mudança cultural, que limita antigos\r\nmodelos, mas que abre um grande número de oportunidades.\r\n\r\nOs serviços de voz foram a principal fonte de receita das operadoras de telecomunicações por\r\num bom tempo. Agora, o grande desafio é entender este movimento, aprender com ele e se\r\nadaptar. É enxergar que a base de aparelhos na América Latina sai de 270 milhões em 2014\r\npara uma expectativa de 605 milhões em 2020 e que junto com o número de smartphones\r\ntambém crescem as oportunidades de negócios, focadas em um novo perfil de público:\r\nconectado, ativo e consumidor.\r\n\r\nAinda segundo a GSMA, o Brasil é o país da América Latina com maior número de smartphones\r\nonline, com 234,6 milhões de conexões sem fio. O México está em segundo lugar, com 108,6\r\nmilhões. Já países como Haiti, El Salvador e Honduras, não chegam a 35% de conexões. E é\r\npossível assegurar que toda esta massa não adquiriu seus aparelhos com foco na comunicação\r\npor voz, mas para estar incluso nos processos digitais, de jogos aos vídeos e interações.\r\n\r\nMas se por um lado o número de dispositivos móveis é enorme (e crescendo) e o maior\r\ninteresse é por dados e conteúdo, uma das principais barreiras para o consumo de aplicativos e\r\noutros formatos é a baixa penetração de cartões de crédito. No Brasil, por exemplo, muitos\r\nusuários móveis não possuem esse meio de pagamento. Sobretudo em linhas pré-pagas, que\r\nhoje representam 66% da base nacional.\r\n\r\nÉ aí que o entendimento do mercado sobre as necessidades do novo perfil de público e a\r\nclareza em relação aos próximos movimentos de negócio entra. Continuará no jogo o player\r\nque buscar parcerias para, primeiro, dar acesso às compras online e, segundo, desburocratizar o\r\nprocesso. Antes, estes acordos não eram interessantes para as empresas de telecomunicações,\r\nmas com a queda nas receitas de voz, SMS e serviços de valor adicionado, a história muda.\r\n\r\nNinguém compra mais pacotes de minutos interurbanos, por exemplo. Aplicativos, filmes, o\r\n“Mário Run” para jogar, o Tinder para se relacionar, são os novos hits. Mas se a loja só aceita\r\ncartão de crédito ou de débito, o consumidor – que quer comprar, mas não tem uma conta em\r\nbanco – ficava de fora.\r\n\r\nO termo ficava, no passado, tem um sentido. Operações em carrier billing (pagamento direto na\r\nconta de telefone), vêm ganhando cada vez mais espaço na região. Um sistema que não é\r\nexatamente novo, mas fundamental para o público desbancarizado e para as empresas que não\r\nquerem perder usuários e, principalmente, aumentar suas receitas.','','','post.png',1,'2021-01-29 19:58:05');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (2,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorem deleniti vel non blanditiis labore nostrum incidunt quaerat aspernatur mollitia veritatis numquam quae, sunt ipsa est temporibus, voluptates neque illum repellendus!',1,'2020-07-10 16:40:27');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_categories`
--

DROP TABLE IF EXISTS `user_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_category` int NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `user_categories_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `user_categories_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_categories`
--

LOCK TABLES `user_categories` WRITE;
/*!40000 ALTER TABLE `user_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `current_job` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `facebook` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `github` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_user` tinyint(1) DEFAULT NULL,
  `picture` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'André','Moura','andre@teste.com.br','202cb962ac59075b964b07152d234b70','Desenvolvedor Web','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','At Home','Guaratinguetá','SP','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','','','','',1,'f9eca4b74fc373c3353683c0b54748c3.jpg','2020-07-05 23:56:34'),(2,'João','Pereira Souza','joao@teste.com.br','123','Analista de Banco de Dados','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','Google','São Paulo','SP','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-05 23:58:14'),(3,'João','Gomes Souza','joao2@teste.com','123','Analista de Redes','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','Facebook','Campinas','SP','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.',NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-05 23:58:14'),(4,'Rodrigo','Barbosa Correia','rodrigo@teste.com.br','123','Analista de Segurança','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','IBM','Presidente Prudente','SP','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.',NULL,NULL,NULL,NULL,1,NULL,'2020-07-14 22:33:29'),(5,'Gustavo','Gonçalves Ribeiro','gustavo@teste.com.br','123','Programador Web','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','Oracle','Várzea Paulista','SP','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.',NULL,NULL,NULL,NULL,1,NULL,'2020-07-14 22:36:06'),(6,'Gabriel','Martins Pereira','gabriel@teste.com.br','123','DBA','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','Sandisk','São Paulo','SP','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.',NULL,NULL,NULL,NULL,1,NULL,'2020-07-14 22:38:32'),(7,'Thaís','Rocha Gonçalves','thais@teste.com.br','123','Desenvolvedor Mobile','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','Gameloft','Porto Alegre','RS','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.',NULL,NULL,NULL,NULL,1,NULL,'2020-07-14 22:40:21'),(8,'Maria','Clara','maria@teste.com.br','123','Analista de Big Data','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.','Twitter','Taubaté','SP','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.',NULL,NULL,NULL,NULL,1,NULL,'2020-07-15 16:13:28'),(9,'Fulano','de Tal','fulano@teste.com','3342949e2e99fc2f304de6fdd626a188','Desenvolvedor PHP','Lorem Ipsum mais texto','Google','Taubaté','SP',NULL,'http://facebook.com','','','',NULL,'2ea8130f9d89f4e0b44a49ad3c9f021f.png','2021-01-27 23:32:30'),(10,'Ciclano','Souza','ciclano@teste.com','fe798a81c2e1eb4fd9695138276e52ed',NULL,NULL,NULL,'Pindamonhangaba','SP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-27 23:34:37'),(11,'Beltrano','Mendes','beltrano@teste.com','e9910cf6ea24255eff7066643c6cb145',NULL,NULL,NULL,'Taubaté','SP',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-27 23:35:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_followers`
--

DROP TABLE IF EXISTS `users_followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_followers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_user_following` int NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_following` (`id_user_following`),
  CONSTRAINT `users_followers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  CONSTRAINT `users_followers_ibfk_2` FOREIGN KEY (`id_user_following`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_followers`
--

LOCK TABLES `users_followers` WRITE;
/*!40000 ALTER TABLE `users_followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_followers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-30 18:37:04
