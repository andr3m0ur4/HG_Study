-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jun-2019 às 10:28
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hg_study`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigo`
--

CREATE TABLE `artigo` (
  `id_artigo` int(11) NOT NULL,
  `screenshot` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `content1` text,
  `citacao` text,
  `content2` text,
  `id_orientador` int(11) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `artigo`
--

INSERT INTO `artigo` (`id_artigo`, `screenshot`, `date`, `title`, `content1`, `citacao`, `content2`, `id_orientador`, `approved`) VALUES
(1, NULL, '2019-04-28', 'O ciclo de vida e envolvimento dos usuários de aplicativos edit', 'andreUm estudo realizado pela MTV Networks, que analisou a forma como os consumidores\r\ndescobrem e interagem com aplicativos de entretenimento em seus iPhones e dispositivos\r\nAndroid determinaram que o ciclo de vida de um aplicativo com os usuários passa por quatro\r\nfases: descoberta, adoção, avaliação e de abandono ou de uso a longo prazo.\r\nPara desenvolvedores de aplicativos e profissionais de marketing, estas fases e os resultados\r\nespecíficos deste estudo são vitais; eles fornecem uma visão sobre o que é importante para os\r\nconsumidores e a melhor forma de alcançá-los, de modo que os aplicativos que eles projetam e\r\nde mercado podem tornar-se popular e favoritos.', 'minha citação', 'heiUm aplicativo não tem uma janela exata ou tempo para fazer um impacto sobre os\r\nconsumidores. Especificamente, o estudo constatou que, se os usuários excluem um aplicativo,\r\n38% o fizeram nas primeiras 3 semanas após baixá-lo. Embora a exclusão de um aplicativo pode\r\nvir de perda de interesse, 55% disseram que haviam excluído porque eles encontraram uma\r\nalternativa melhor.\r\nAlguns consumidores não apagam realmente os aplicativos, mas abandona mesmo assim. 74%\r\ndos respondentes indicaram que eles mantêm aplicativos antigos em seus telefones, mesmo\r\nquando eles já não usam mais. E 78% foram capazes de substituir esses aplicativos antigos por\r\nnovos que se encaixam melhor as suas necessidades, mesmo mantendo os antigos aplicativos\r\nsem usá-los.\r\nQuando os consumidores encontram um aplicativo que eles amam, eles realmente se\r\nidentificam. A maioria dos entrevistados disse que os aplicativos que utilizam são um reflexo de\r\nsi mesmos. Além disso, os entrevistados disseram que os aplicativos estão presentes em quase\r\n24h por dia. E 91% dos entrevistados concordaram que os aplicativos ajudam a descobrir coisas\r\nnovas.\r\nTais atitudes positivas para aplicativos indicam a sua capacidade de se tornar uma parte da vida\r\ndas pessoas e se espalham de forma viral bem como os usuários recomendam e compartilham\r\nseus favoritos com os outros.', 1, 1),
(2, 'desenvolvimentodeapp.jpg', '2019-04-27', 'Desenvolvimento de apps: conheça o processo do início ao fim', 'A cada dia, milhares de aplicativos para celular são publicados nas lojas da Google e da\r\nApple. Alguns deles são jogos, outros são redes sociais e muitos são apps de comércio\r\neletrônico. Mas todos esses aplicativos, se construídos profissionalmente, devem seguir um\r\nprocesso de desenvolvimento semelhante.\r\nNo post de hoje, vamos apresentar as etapas do processo de desenvolvimento de aplicativos do\r\ninício ao fim. Continue a leitura e mãos à obra!\r\nIdeia\r\nEmbora cada aplicativo móvel comece com uma ideia central, sua premissa inicial\r\nprovavelmente não é suficiente para criar um app que ganhe dinheiro ou obtenha uma\r\naudiência. Você precisa criar um aplicativo que atenda a um mercado suficientemente grande,\r\nmas também seja específico o bastante para ressoar com usuários particulares.\r\nPara tanto, em vez de começar com a fase de design, dedique um tempo para uma extensa\r\npesquisa de mercado. Começando assim, é possível agir com mais assertividade e dar a você,\r\nsua organização e seus investidores a confiança de que seus esforços não serão em vão.\r\nNo final desse processo, você deve ter o escopo do trabalho mapeado e ter determinado\r\nquanto do processo de design será feito em casa.', 'Durante o estágio, é imperativo que você considere fatores múltiplos, como multitarefa, fator\r\nde forma, dispositivo e fragmentação do sistema operacional. É inútil incorporar recursos e\r\nfunções no app se não forem compatíveis com a maioria dos smartphones.', 'Pós-lançamento\r\nO desenvolvimento de aplicativos não termina no lançamento! À medida que seu app cai nas\r\nmãos dos usuários, o feedback vai derramar e você precisará incorporar essas sugestões,\r\nreclamações e críticas em futuras versões do aplicativo.\r\nSe você está começando, pode demorar algum tempo para se acostumar com o processo. Mas,\r\nao repetir as etapas, o desenvolvimento de aplicativos se tornará cada vez mais previsível. E\r\nentão, pronto para começar?', 5, 1),
(3, 'artigo2.png', '2019-04-24', 'O ciclo de vida e envolvimento dos usuários de aplicativos edit', 'Um estudo realizado pela MTV Networks, que analisou a forma como os consumidores\r\ndescobrem e interagem com aplicativos de entretenimento em seus iPhones e dispositivos\r\nAndroid determinaram que o ciclo de vida de um aplicativo com os usuários passa por quatro\r\nfases: descoberta, adoção, avaliação e de abandono ou de uso a longo prazo.\r\nPara desenvolvedores de aplicativos e profissionais de marketing, estas fases e os resultados\r\nespecíficos deste estudo são vitais; eles fornecem uma visão sobre o que é importante para os\r\nconsumidores e a melhor forma de alcançá-los, de modo que os aplicativos que eles projetam e\r\nde mercado podem tornar-se popular e favoritos.', '', '===========Um aplicativo não tem uma janela exata ou tempo para fazer um impacto sobre os\r\nconsumidores. Especificamente, o estudo constatou que, se os usuários excluem um aplicativo,\r\n38% o fizeram nas primeiras 3 semanas após baixá-lo. Embora a exclusão de um aplicativo pode\r\nvir de perda de interesse, 55% disseram que haviam excluído porque eles encontraram uma\r\nalternativa melhor.\r\nAlguns consumidores não apagam realmente os aplicativos, mas abandona mesmo assim. 74%\r\ndos respondentes indicaram que eles mantêm aplicativos antigos em seus telefones, mesmo\r\nquando eles já não usam mais. E 78% foram capazes de substituir esses aplicativos antigos por\r\nnovos que se encaixam melhor as suas necessidades, mesmo mantendo os antigos aplicativos\r\nsem usá-los.\r\nQuando os consumidores encontram um aplicativo que eles amam, eles realmente se\r\nidentificam. A maioria dos entrevistados disse que os aplicativos que utilizam são um reflexo de\r\nsi mesmos. Além disso, os entrevistados disseram que os aplicativos estão presentes em quase\r\n24h por dia. E 91% dos entrevistados concordaram que os aplicativos ajudam a descobrir coisas\r\nnovas.\r\nTais atitudes positivas para aplicativos indicam a sua capacidade de se tornar uma parte da vida\r\ndas pessoas e se espalham de forma viral bem como os usuários recomendam e compartilham\r\nseus favoritos com os outros.', 9, 1),
(4, 'artigo2.png', '2019-04-19', 'O ciclo de vida e envolvimento dos usuários de aplicativos edit', 'andreUm estudo realizado pela MTV Networks, que analisou a forma como os consumidores\r\ndescobrem e interagem com aplicativos de entretenimento em seus iPhones e dispositivos\r\nAndroid determinaram que o ciclo de vida de um aplicativo com os usuários passa por quatro\r\nfases: descoberta, adoção, avaliação e de abandono ou de uso a longo prazo.\r\nPara desenvolvedores de aplicativos e profissionais de marketing, estas fases e os resultados\r\nespecíficos deste estudo são vitais; eles fornecem uma visão sobre o que é importante para os\r\nconsumidores e a melhor forma de alcançá-los, de modo que os aplicativos que eles projetam e\r\nde mercado podem tornar-se popular e favoritos.', 'minha citação', 'heiUm aplicativo não tem uma janela exata ou tempo para fazer um impacto sobre os\r\nconsumidores. Especificamente, o estudo constatou que, se os usuários excluem um aplicativo,\r\n38% o fizeram nas primeiras 3 semanas após baixá-lo. Embora a exclusão de um aplicativo pode\r\nvir de perda de interesse, 55% disseram que haviam excluído porque eles encontraram uma\r\nalternativa melhor.\r\nAlguns consumidores não apagam realmente os aplicativos, mas abandona mesmo assim. 74%\r\ndos respondentes indicaram que eles mantêm aplicativos antigos em seus telefones, mesmo\r\nquando eles já não usam mais. E 78% foram capazes de substituir esses aplicativos antigos por\r\nnovos que se encaixam melhor as suas necessidades, mesmo mantendo os antigos aplicativos\r\nsem usá-los.\r\nQuando os consumidores encontram um aplicativo que eles amam, eles realmente se\r\nidentificam. A maioria dos entrevistados disse que os aplicativos que utilizam são um reflexo de\r\nsi mesmos. Além disso, os entrevistados disseram que os aplicativos estão presentes em quase\r\n24h por dia. E 91% dos entrevistados concordaram que os aplicativos ajudam a descobrir coisas\r\nnovas.\r\nTais atitudes positivas para aplicativos indicam a sua capacidade de se tornar uma parte da vida\r\ndas pessoas e se espalham de forma viral bem como os usuários recomendam e compartilham\r\nseus favoritos com os outros.', 5, 1),
(5, 'artigo2.png', '2019-04-26', 'O ciclo de vida e envolvimento dos usuários de aplicativos edit', 'andreUm estudo realizado pela MTV Networks, que analisou a forma como os consumidores\r\ndescobrem e interagem com aplicativos de entretenimento em seus iPhones e dispositivos\r\nAndroid determinaram que o ciclo de vida de um aplicativo com os usuários passa por quatro\r\nfases: descoberta, adoção, avaliação e de abandono ou de uso a longo prazo.\r\nPara desenvolvedores de aplicativos e profissionais de marketing, estas fases e os resultados\r\nespecíficos deste estudo são vitais; eles fornecem uma visão sobre o que é importante para os\r\nconsumidores e a melhor forma de alcançá-los, de modo que os aplicativos que eles projetam e\r\nde mercado podem tornar-se popular e favoritos.', 'minha citação', 'heiUm aplicativo não tem uma janela exata ou tempo para fazer um impacto sobre os\r\nconsumidores. Especificamente, o estudo constatou que, se os usuários excluem um aplicativo,\r\n38% o fizeram nas primeiras 3 semanas após baixá-lo. Embora a exclusão de um aplicativo pode\r\nvir de perda de interesse, 55% disseram que haviam excluído porque eles encontraram uma\r\nalternativa melhor.\r\nAlguns consumidores não apagam realmente os aplicativos, mas abandona mesmo assim. 74%\r\ndos respondentes indicaram que eles mantêm aplicativos antigos em seus telefones, mesmo\r\nquando eles já não usam mais. E 78% foram capazes de substituir esses aplicativos antigos por\r\nnovos que se encaixam melhor as suas necessidades, mesmo mantendo os antigos aplicativos\r\nsem usá-los.\r\nQuando os consumidores encontram um aplicativo que eles amam, eles realmente se\r\nidentificam. A maioria dos entrevistados disse que os aplicativos que utilizam são um reflexo de\r\nsi mesmos. Além disso, os entrevistados disseram que os aplicativos estão presentes em quase\r\n24h por dia. E 91% dos entrevistados concordaram que os aplicativos ajudam a descobrir coisas\r\nnovas.\r\nTais atitudes positivas para aplicativos indicam a sua capacidade de se tornar uma parte da vida\r\ndas pessoas e se espalham de forma viral bem como os usuários recomendam e compartilham\r\nseus favoritos com os outros.', 5, 1),
(6, NULL, '2019-04-29', 'O mercado de dispositivos móveis na América Latina e os desafios para uma base de consumidores onlin', 'Em 2015, uma senhora mexicana de 79 anos chamada Lorenza Solís contou para o jornal El País,\r\num dos mais relevantes para a América Latina, que não sabia o que significava o termo\r\nsmartphone, mas que todos os dias antes de sair de casa, checava as condições do tempo,\r\nmensagens e troca de fotos com a família em seu celular. Uma situação que ilustra bem como a\r\nregião caminha para se tornar o segundo maior mercado de dispositivos móveis no mundo em\r\n2020, de acordo com a GSMA, entidade que atua e monitora o setor.\r\nNaquela reportagem também chamou a atenção o fato de que nem a senhora Lorenza ou\r\nqualquer outro entrevistado citou o uso destes aparelhos para conversas por voz. O cenário já\r\nse resumia em conteúdo e dados. Hoje, cada vez mais. A comunicação por voz partiu de único\r\nrecurso para apenas uma das muitas possibilidades. Uma mudança cultural, que limita antigos\r\nmodelos, mas que abre um grande número de oportunidades.', '', 'É aí que o entendimento do mercado sobre as necessidades do novo perfil de público e a\r\nclareza em relação aos próximos movimentos de negócio entra. Continuará no jogo o player\r\nque buscar parcerias para, primeiro, dar acesso às compras online e, segundo, desburocratizar o\r\nprocesso. Antes, estes acordos não eram interessantes para as empresas de telecomunicações,\r\nmas com a queda nas receitas de voz, SMS e serviços de valor adicionado, a história muda.\r\nNinguém compra mais pacotes de minutos interurbanos, por exemplo. Aplicativos, filmes, o\r\n“Mário Run” para jogar, o Tinder para se relacionar, são os novos hits. Mas se a loja só aceita\r\ncartão de crédito ou de débito, o consumidor – que quer comprar, mas não tem uma conta em\r\nbanco – ficava de fora.\r\nO termo ficava, no passado, tem um sentido. Operações em carrier billing (pagamento direto na\r\nconta de telefone), vêm ganhando cada vez mais espaço na região. Um sistema que não é\r\nexatamente novo, mas fundamental para o público desbancarizado e para as empresas que não\r\nquerem perder usuários e, principalmente, aumentar suas receitas.', 3, 1),
(7, NULL, '2019-04-17', 'Dispositivos móveis no mercado de e-commerce brasileiro', 'A indústria de e-commerce, sem dúvidas, revolucionou o segmento do varejo tradicional, com\r\nas vendas online crescendo de forma consistente em todas as partes. Graças ao amplo uso dos\r\ndispositivos móveis ao redor do mudo, tanto a indústria de e-commerce como a forma como as\r\npessoas se conectam a internet também estão se transformando. Com o crescente uso dos\r\nsmartphones, cada dia mais e mais pessoas têm acesso à internet, o que está ocasionando \r\nmudanças no comportamento de navegação e compra dos consumidores. No Brasil, o cenário\r\nnão é diferente. Apesar de que a maior parte das vendas online no país ainda sejam\r\ncompletadas no desktop, o m-commerce está crescendo rapidamente, o que reflete a\r\nimportância de ter os dispositivos móveis em conta para uma estratégia de e-commerce de sucesso.', 'Escrito por: Bianca Lopez (2017)', 'Sobre o comportamento do consumidor brasileiro com relação aos dispositivos móveis e\r\nacesso à internet, Euromonitor identificou que quase 75% dos brasileiros se sentem perdidos\r\nsem a internet e 21% executa, pelo menos, quatro destas sete atividades relativas ao comércio\r\nem seus smartphones semanalmente:\r\n• Comprar um produto ou serviço\r\n• Comparar preços estando em uma loja\r\n• Fazer um pagamento com o celular fisicamente\r\n• Pedir comida ou bebida online para buscar ou com entrega a domicílio\r\n• Solicitar ou reservar um serviço de ride-sharing\r\n• Ler resenhas\r\n• Usar um serviço bancário\r\nO potencial das estratégias focadas nos dispositivos móveis para o mercado de e-commerce\r\nbrasileiro é inegável. Além de ser essencial contar com um site responsivo ou um aplicativo\r\neficiente, oferecer aos compradores uma experiência de pagamento sem atritos e com\r\nmétodos de pagamentos adaptados para smartphones e tablets, como o boleto responsivo ou a\r\ncompra em um clique, é fundamental. Se você ainda não começou a elaborar sua estratégia de\r\nm-commerce ainda, sem dúvida é hora de aproveitar a excelente oportunidade de crescimento\r\ndo m-commerce no Brasil.', 5, 1),
(8, NULL, '2019-04-18', 'Dispositivos móveis no mercado de e-commerce brasileiro', 'A indústria de e-commerce, sem dúvidas, revolucionou o segmento do varejo tradicional, com\r\nas vendas online crescendo de forma consistente em todas as partes. Graças ao amplo uso dos\r\ndispositivos móveis ao redor do mudo, tanto a indústria de e-commerce como a forma como as\r\npessoas se conectam a internet também estão se transformando. Com o crescente uso dos\r\nsmartphones, cada dia mais e mais pessoas têm acesso à internet, o que está ocasionando \r\nmudanças no comportamento de navegação e compra dos consumidores. No Brasil, o cenário\r\nnão é diferente. Apesar de que a maior parte das vendas online no país ainda sejam\r\ncompletadas no desktop, o m-commerce está crescendo rapidamente, o que reflete a\r\nimportância de ter os dispositivos móveis em conta para uma estratégia de e-commerce de sucesso.', 'Escrito por: Bianca Lopez (2017)', 'Sobre o comportamento do consumidor brasileiro com relação aos dispositivos móveis e\r\nacesso à internet, Euromonitor identificou que quase 75% dos brasileiros se sentem perdidos\r\nsem a internet e 21% executa, pelo menos, quatro destas sete atividades relativas ao comércio\r\nem seus smartphones semanalmente:\r\n• Comprar um produto ou serviço\r\n• Comparar preços estando em uma loja\r\n• Fazer um pagamento com o celular fisicamente\r\n• Pedir comida ou bebida online para buscar ou com entrega a domicílio\r\n• Solicitar ou reservar um serviço de ride-sharing\r\n• Ler resenhas\r\n• Usar um serviço bancário\r\nO potencial das estratégias focadas nos dispositivos móveis para o mercado de e-commerce\r\nbrasileiro é inegável. Além de ser essencial contar com um site responsivo ou um aplicativo\r\neficiente, oferecer aos compradores uma experiência de pagamento sem atritos e com\r\nmétodos de pagamentos adaptados para smartphones e tablets, como o boleto responsivo ou a\r\ncompra em um clique, é fundamental. Se você ainda não começou a elaborar sua estratégia de\r\nm-commerce ainda, sem dúvida é hora de aproveitar a excelente oportunidade de crescimento\r\ndo m-commerce no Brasil.', 7, 1),
(9, 'Tulips.jpg', '2019-04-28', 'Dispositivos móveis no mercado de e-commerce brasileiro', 'A indústria de e-commerce, sem dúvidas, revolucionou o segmento do varejo tradicional, com\r\nas vendas online crescendo de forma consistente em todas as partes. Graças ao amplo uso dos\r\ndispositivos móveis ao redor do mudo, tanto a indústria de e-commerce como a forma como as\r\npessoas se conectam a internet também estão se transformando. Com o crescente uso dos\r\nsmartphones, cada dia mais e mais pessoas têm acesso à internet, o que está ocasionando \r\nmudanças no comportamento de navegação e compra dos consumidores. No Brasil, o cenário\r\nnão é diferente. Apesar de que a maior parte das vendas online no país ainda sejam\r\ncompletadas no desktop, o m-commerce está crescendo rapidamente, o que reflete a\r\nimportância de ter os dispositivos móveis em conta para uma estratégia de e-commerce de sucesso.', 'Escrito por: Bianca Lopez (2017) casa', 'Sobre o comportamento do consumidor brasileiro com relação aos dispositivos móveis e\r\nacesso à internet, Euromonitor identificou que quase 75% dos brasileiros se sentem perdidos\r\nsem a internet e 21% executa, pelo menos, quatro destas sete atividades relativas ao comércio\r\nem seus smartphones semanalmente:\r\n• Comprar um produto ou serviço\r\n• Comparar preços estando em uma loja\r\n• Fazer um pagamento com o celular fisicamente\r\n• Pedir comida ou bebida online para buscar ou com entrega a domicílio\r\n• Solicitar ou reservar um serviço de ride-sharing\r\n• Ler resenhas\r\n• Usar um serviço bancário\r\nO potencial das estratégias focadas nos dispositivos móveis para o mercado de e-commerce\r\nbrasileiro é inegável. Além de ser essencial contar com um site responsivo ou um aplicativo\r\neficiente, oferecer aos compradores uma experiência de pagamento sem atritos e com\r\nmétodos de pagamentos adaptados para smartphones e tablets, como o boleto responsivo ou a\r\ncompra em um clique, é fundamental. Se você ainda não começou a elaborar sua estratégia de\r\nm-commerce ainda, sem dúvida é hora de aproveitar a excelente oportunidade de crescimento\r\ndo m-commerce no Brasil.', 5, 1),
(10, 'p1.jpg', '2019-04-28', 'Cartridge Is Better Than Ever A Discount Toner', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.', '', '', 2, 1),
(11, 'p2.jpg', '2019-04-28', 'Cartridge Is Better Than Ever A Discount Toner', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.', '', '', 6, 1),
(12, 'p3.jpg', '2019-04-28', 'Cartridge Is Better Than Ever A Discount Toner', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.', '', '', 2, 1),
(13, 'p4.jpg', '2019-04-28', 'Cartridge Is Better Than Ever A Discount Toner', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed MCSE training.', '', '', 4, 1),
(14, NULL, '2019-05-03', 'O mercado de dispositivos móveis na América Latina e os desafios para uma base de consumidores online', 'Em 2015, uma senhora mexicana de 79 anos chamada Lorenza Solís contou para o jornal El País,\r\num dos mais relevantes para a América Latina, que não sabia o que significava o termo\r\nsmartphone, mas que todos os dias antes de sair de casa, checava as condições do tempo,\r\nmensagens e troca de fotos com a família em seu celular. Uma situação que ilustra bem como a\r\nregião caminha para se tornar o segundo maior mercado de dispositivos móveis no mundo em\r\n2020, de acordo com a GSMA, entidade que atua e monitora o setor.\r\nNaquela reportagem também chamou a atenção o fato de que nem a senhora Lorenza ou\r\nqualquer outro entrevistado citou o uso destes aparelhos para conversas por voz. O cenário já\r\nse resumia em conteúdo e dados. Hoje, cada vez mais. A comunicação por voz partiu de único\r\nrecurso para apenas uma das muitas possibilidades. Uma mudança cultural, que limita antigos\r\nmodelos, mas que abre um grande número de oportunidades.', '', '', 11, 1),
(15, 'Penguins.jpg', '2019-05-18', 'Ok, vamos falar sobre os pinguins', 'Os pinguins são aves marinhas que não voam e que podem ser encontradas na Antártida, Nova Zelândia, sul da África, Austrália e América do Sul. Bons caçadores, os pinguins se alimentam de crustáceos, moluscos, peixes e pequenos animais marinhos. Todas as espécies possuem o peito branco com as costas e a cabeça na cor preta. Nas patas dos pinguins, podemos encontrar quatro dedos unidos por uma membrana, o que ajuda muito durante a natação do animal. Por serem aves, esses animais possuem penas, mas elas são mais curtas e ocorrem em maior número do que nas outras aves. Esses animais mudam as penas duas vezes ao ano, e durante essa muda eles não entram na água.\r\nTodos os pinguins possuem uma plumagem lisa, densa e gordurosa, para que o seu corpo fique impermeável. Sob a pele, esses animais possuem uma grossa camada de gordura que serve como isolante térmico, impedindo que o animal perca calor para o ambiente. Podem medir desde 40 cm a 1 metro e pesar de 3 a 35 kg, podendo viver de 30 a 35 anos.\r\n\r\nOs pinguins são animais extremamente mansos e só atacam quando algum animal se aproxima de seus ovos ou filhotes. Além de mansinhos, os pinguins são animais fiéis e só trocam de companheiro quando há problemas de reprodução.', '', 'Quando a fêmea de um pinguim põe um ovo, ele demora cerca de 5 a 6 semanas para eclodir. Durante esse período, machos e fêmeas se revezam na busca de alimento, para que o ovo nunca fique sozinho. Depois que o filhote nasce, ele se alimenta de alimentos já digeridos pelos pais e fica sempre protegido do ataque de gaivotas e de outros pinguins. Somente quando o filhote adquire o tamanho do pai e troca as penugens por penas, é que os pais os ensinam a nadar e deixam que ele procure alimento sozinho. A partir daí o filhote já não tem mais a ajuda dos pais e deve se virar sozinho.\r\nOs pinguins são excelentes nadadores. Nadando com a ajuda das asas e dos pés, podem atingir a velocidade de até 40km/h na água. Passam a maior parte da vida dentro da água, onde nadam sempre em bandos com centenas de pinguins e conseguem realizar todas suas funções vitais, até mesmo dormir.\r\n\r\nAo beber água do mar, o corpo dos pinguins absorve sal em excesso. Mas isso não é um problema para eles, porque todas as aves marinhas possuem uma glândula chamada glândula de sal que se localiza próxima aos olhos e que retira o excesso de sal absorvido por eles.', 6, 1),
(16, NULL, '2019-06-05', 'O que é PHP', 'PHP é uma linguagem que permite criar sites WEB dinâmicos, possibilitando uma interação com o usuário através de formulários, parâmetros da URL e links. A diferença de PHP com relação a linguagens semelhantes a Javascript é que o código PHP é executado no servidor, sendo enviado para o cliente apenas html puro. Desta maneira é possível interagir com bancos de dados e aplicações existentes no servidor, com  a vantagem de não expor o código fonte para o cliente. Isso pode ser útil quando o programa está lidando com senhas ou qualquer tipo de informação confidencial. O que diferencia PHP de um script CGI escrito em C ou Perl é que o código PHP fica embutido no próprio HTML, enquanto no outro caso é necessário que o script CGI gere todo o código HTML, ou leia de um outro arquivo.', '', 'A linguagem PHP foi concebida durante o outono de 1994 por Rasmus Lerdorf. As primeiras versões não foram disponibilizadas, tendo sido utilizadas em sua home-page apenas para que ele pudesse ter informações sobre as visitas que estavam sendo feitas. A primeira versão utilizada por outras pessoas foi disponibilizada em 1995, e ficou conhecida como “Personal Home Page Tools” (ferramentas para página pessoal). Era composta por um sistema bastante simples que interpretava algumas macros e alguns utilitários que rodavam “por trás” das home-pages: um livro de visitas, um contador e algumas outras coisas.\r\n\r\nEm meados de 1995 o interpretador foi reescrito, e ganhou o nome de PHP/FI, o “FI” veio de um outro pacote escrito por Rasmus que interpretava dados de formulários HTML (Form Interpreter). Ele combinou os scripts do pacote Personal Home Page Tools com o FI e adicionou suporte a mySQL, nascendo assim o PHP/FI, que cresceu bastante, e as pessoas passaram a contribuir com o projeto. \r\n\r\nEstima-se que em 1996 PHP/FI estava sendo usado por cerca de 15.000 sites pelo mundo, e em meados de 1997 esse número subiu para mais de 50.000. Nessa época houve uma mudança no desenvolvimento do PHP.', 24, 1),
(17, NULL, '2019-06-05', 'Torne seu SQL mais seguro', 'SQL pode ser uma coisa linda, mas também pode ser uma coisa perigosa. Se você está usando SQL para acessar um banco de dados para um aplicativo que é usado por centenas, milhares ou até mesmo milhões de usuários, você precisa tomar cuidado - porque você poderia acidentalmente danificar ou apagar todos os dados. Contudo, há várias técnicas que você pode usar para tornar seu SQL mais seguro.', '', 'Quando emitimos um comando SQL que altera nosso banco de dados de alguma forma, ele começa o que chamamos de uma \"transação.\" Uma transação é uma sequência de operações tratadas como uma parte lógica única (como uma transação bancária) e, no mundo dos bancos de dados, uma transação deve seguir os princípios \"ACID\" para garantir que ela seja processada de forma confiável.\r\nSempre que emitimos um comando como CREATE, UPDATE, INSERT ou DELETE, estamos automaticamente iniciando uma transação. Contudo, se quisermos, podemos também agrupar vários comandos em uma transação maior. Pode ser que só queiramos que um UPDATE aconteça se outro UPDATE também acontecer, então colocamos ambos na mesma transação.\r\nNesse caso, podemos agrupar os comandos em BEGIN TRANSACTION e COMMIT:\r\nBEGIN TRANSACTION;\r\nUPDATE pessoas SET marido= \"Winston\" WHERE user_id = 1;\r\nUPDATE pessoas SET esposa = \"Winnefer\" WHERE user_id = 2;\r\nCOMMIT;\r\nSe o banco de dados não puder emitir ambos os comandos UPDATE por alguma razão, ele vai reverter a transação e deixar o banco de dados como ele estava quando foi iniciado.\r\nTambém usamos transações quando queremos garantir que todos os nossos comandos operem na mesma visão dos dados - quando queremos garantir que nenhuma outra transação opere no mesmo dado enquanto a sequência de comandos é executada. Quando você estiver olhando para uma sequência de comandos que você quer executar, pergunte-se o que aconteceria se outro usuário emitisse comandos ao mesmos tempo. Seus dados poderiam acabar em um estado estranho? Nesse caso, você deve executá-los em uma transação.\r\nPor exemplo, os seguintes comandos criam uma linha que indica que um usuário ganhou uma medalha e então atualiza as atividades recentes do usuário para descrever isso:\r\nINSERT INTO medalhas_usuario VALUES (1, \"SQL Master\", \"16h\");\r\nUPDATE usuarios SET atividade_recente = \"Ganhou medalha SQL Master\" WHERE id = 1;\r\nAo mesmo tempo, outro usuário ou processo pode estar fazendo a emissão de uma segunda medalha:\r\nINSERT INTO medalhas_usuario VALUES (1, \"Bom ouvinte\", \"16:05\");\r\nUPDATE usuarios SET atividade_recente = \"Ganhou medalha Bom Ouvinte\" WHERE id = 1;\r\nEsses comandos poderiam na verdade ser emitidos nessa ordem:\r\nINSERT INTO medalhas_usuario VALUES (1, \"SQL Master\");\r\nINSERT INTO medalhas_usuario VALUES (1, \"Bom ouvinte\");\r\nUPDATE usuarios SET atividade_recente = \"Ganhou medalha Bom Ouvinte\" WHERE id = 1;\r\nUPDATE usuarios SET atividade_recente = \"Ganhou medalha SQL Master\" WHERE id = 1;\r\nSua atividade recente agora poderia ser \"Earned SQL Master badge\" mesmo que a medalha inserida mais recentemente fosse \"Great listener\". Isso não é o fim do mundo, mas isso provavelmente também não é o que esperávamos.\r\nAo invés disso, poderíamos executar os comandos em uma transação, para garantir que nenhuma outra transação aconteça no meio:\r\nBEGIN TRANSACTION;\r\nINSERT INTO medalhas_usuario VALUES (1, \"SQL Master\");\r\nUPDATE usuarios SET atividade_recente = \"Ganhou medalha SQL Master\" WHERE id = 1;\r\nCOMMIT;', 14, 1),
(18, NULL, '2019-06-05', 'Introdução ao Javascript', 'Este artigo visa fazer uma introdução de forma simples e não extremamente formal a esta linguagem de scripting que vêm se firmando como uma das bases de toda aplicação web. Você já deve ter ouvido falar neste nome, mas não faz ideia de o que é ou para que sirva, correto? Então este artigo é feito para que você entenda de forma simples como funciona e como fazer seu primeiro script nesta linguagem.\r\n\r\nEm primeiro lugar, o termo JavaScript nada tem haver com a linguagem de programação Java, esta é uma grande confusão feita pela comunidade de desenvolvimento web, principalmente por quem nunca trabalhou com a tecnologia, mas vamos pular contextos históricos e discursos sobre como surgiu o nome, vamos ao que importa.\r\n\r\nA linguagem JavaScript é uma linguagem do tipo Client Side, ou seja, ela é executada no computador do usuário. Esta é uma das definições mais importantes desta linguagem, pois isto explica muita coisa!', 'Nota: Este curso é uma introdução ao JavaScript, onde aprenderemos conceitos básicos e as principais funções dessa linguagem.', 'Neste momento já aprendemos o óbvio: a linguagem JavaScript depende do computador do usuário para funcionar corretamente. Ela é interpretada pelo browser, ou navegador, que o nosso usuário estiver usando, entendido? Sim, este conceito é extremamente importante, acredite!\r\n\r\nO que JavaScript faz afinal?\r\nJavaScript consegue interagir com, praticamente, todos os elementos de uma página HTML, trabalhar com variáveis, gerar resultados, alterar a aparência de elementos e o melhor, sem a necessidade de ficar recarregando a página. Existem aplicativos inteiros feitos somente usando JavaScript, e ouso dizer que estes aplicativos passarão a ser cada vez mais comuns com o passar do tempo e a evolução desta linguagem.\r\n\r\nNão ficou muito claro, não é mesmo? Este conceito vai melhorar conforme formos exercitando, praticando e, principalmente, programando.', 14, 1),
(19, 'Post-papel-do-firewall-nos-computadores.png', '2019-06-05', 'Afinal, qual é o papel do firewall nos computadores?', 'Garantir a segurança de uma rede de computadores envolve muitos fatores. Engana-se quem pensa que o combate a ameaças e invasões, nas empresas, se limita apenas a instalação de antivírus. Existe também o Firewall.\r\n\r\nVocê já se perguntou como o firewall pode contribuir para a segurança de dados da sua empresa?\r\n\r\nO que é o firewall?\r\nÉ possível definir o firewall como uma porta de entrada e saída entre uma rede de computadores e a internet. Ele funciona como uma espécie de “catraca” que controla os acessos.\r\n\r\nO firewall permitirá apenas que usuários e aplicações autorizadas possam se comunicar entre si.\r\n\r\nSendo assim, ele fará o papel de mediar a troca de dados entre uma rede externa (internet) e uma rede interna (no caso, a rede de computadores de uma empresa).\r\n\r\nÉ crescente aumento de usuários maliciosos na web. Através da internet eles roubam informações, infectam computadores e, até mesmo, sequestram dados.\r\n\r\nNesse cenário, o firewall é uma boa alternativa para fazer uma primeira triagem dessas ameaças.\r\n\r\nComo é o funcionamento de um firewall em uma rede de computadores?\r\nEsse recurso funciona como uma barreira de acesso entre o roteador e a conexão de internet.\r\n\r\nUsualmente, ele é um equipamento com 02 portas de rede – uma LAN (rede interna) e uma WAN (rede externa) –, sendo configurado por uma interface.\r\n\r\nNessa interface, serão configuradas as informações de segurança. Entre elas, quais usuários internos acessarão à internet, os horários de acesso e recursos disponíveis (e-mail, Skype, redes sociais, etc.).\r\n\r\nDa mesma forma acontece com os acessos externos. Nesse ambiente, será definido quais dados vindos de fora poderão se comunicar com alguma máquina da rede interna (LAN).', '', 'Qual tipo de firewall devo usar em minha empresa?\r\nExistem diversas opções dessa ferramenta no mercado. Caso tenha uma rede pequena, provavelmente o firewall que está dentro do roteador será suficiente para bloquear acessos indesejados, basta configurá-lo adequadamente.\r\n\r\nJá que, em redes menores, provavelmente não será necessário ter um controle tão minucioso de acesso dos usuários à internet. Já em empresas de médio ou grande porte a situação é bem diferente.\r\n\r\nComo possuem um volume maior de equipamentos conectados à mesma rede, um firewall dedicado é o mais indicado.\r\n\r\nUm equipamento exclusivo para essa função terá uma capacidade maior para processar os dados de todos os usuários.\r\n\r\nRoteadores de marcas como D-Link, TP-Link e Asus já acompanham o firewall. Contudo, são adequados apenas para uso doméstico ou redes de pequeno porte.\r\n\r\nPara os ambientes corporativos, é possível encontrar um firewall dedicado de marcas como Cisco e Extreme, líderes desse mercado.\r\n\r\nNão esqueça também de definir qual o tipo de rede que você utilizará na sua empresa, Wi-Fi ou cabeada, se você quer saber qual a melhor, leia também nosso artigo sobre redes.\r\n\r\nO firewall é um recurso básico de segurança.\r\nVale ressaltar que o firewall é um recurso básico de segurança para as redes de computadores. Para garantir uma proteção completa, é preciso investir em uma série de ações.\r\n\r\nEntretanto, ele é uma ferramenta absolutamente necessária atualmente. Não contar com ele em uma rede, é como manter a porta de casa aberta.\r\n\r\nQualquer pessoa, mesmo que sem a sua autorização, poderá entrar e fazer o que bem entender.', 16, 1),
(20, 'servidor-proxy-o-que-1024x536.png', '2019-06-05', 'SERVIDOR PROXY – TUDO SOBRE A SOLUÇÃO QUE PROMETE RESOLVER O PROBLEMA DE LENTIDÃO DE ACESSO', 'Dependendo do tempo de experiência que você tenha com o uso de Internet, certamente já ouviu falar em servidor proxy. A minha convicção não se dá por acaso; afinal o proxy é uma tecnologia intrínseca à web e amplamente utilizada em redes de computadores.\r\n\r\nUm exemplo de uso de proxy recorrente é a criação de blacklist de sites potencialmente maliciosos ou, em muitos casos, inapropriados para os usuários. Tal recurso é bastante aplicado em ambientes de estudos (escolas e universidades) e, principalmente, corporativos.\r\n\r\nTodavia, o proxy pode ser adotado para diversas outras funções, tais como: melhorias no desempenho da Internet; controle do consumo de banda larga; e configurações de privacidade.', '', 'O QUE É SERVIDOR PROXY?\r\nA função do servidor proxy, conforme sugere a etimologia do termo, substituir o servidor principal de uma determinada função — sendo esta a conexão entre os usuários e a Internet.\r\n\r\nMesmo pelo fato de ser um servidor, o proxy pode ser implantado a partir de uma infraestrutura física (servidor físico) ou, também, por meio de software. Em ambos os casos o servidor faz a intermediação entre a rede local e redes de larga escala.\r\n\r\nO que é possível fazer com um servidor proxy? Evidentemente, as oportunidades variam conforme os recursos oferecidos pela solução instalada. Porém, em todos os casos, o administrador de sistemas ganha muito em opções de gerenciamento.', 16, 0),
(21, NULL, '2019-06-05', 'teste', 'jkvbkjvdfbvsdbvsdbvsjk', '', '', 2, 0),
(22, 'o-que-e-monetizacao-sites-723x309.jpg', '2019-06-05', 'O que é monetização de sites e como ela funciona', 'Muita gente ainda se pergunta sobre o que é monetização de sites, uma expressão muito comum em artigos sobre ganhar dinheiro online, mas que muita gente ainda desconhece ou tem uma noção distorcida sobre o assunto. Para dar uma visão exata do que seja monetização de sites, elaboramos este artigo, para que você possa ter uma noção da força deste negócio.\r\n\r\nO problema de você não saber o que é monetização de sites é que você pode estar perdendo uma ótima oportunidade de ganhar um bom dinheiro com o seu blog ou site de conteúdo. Quando você insere ferramentas de monetização em seu blog ou site, ele pode se tornar uma ótima fonte de receita.\r\n\r\nVamos mostrar que através da monetização de sites é possível encontrar uma série de anunciantes para o seu site e com isso ganhar por cliques que são dados nestes anúncios ou por compras que tiveram como origem os anúncios exibidos no seu blog ou site.', '', 'Como funciona a monetização de sites\r\nSaiba o que é monetização de sites\r\nSaiba o que é monetização de sites e como funciona\r\n\r\nA definição clássica de monetização é o ato de transformar bens, serviços, metais, títulos, fatos, informações e acontecimentos em dinheiro.\r\n\r\nChamamos de monetização de sites a geração de receita por um blog ou qualquer outro site de conteúdo através da inserção de anúncios, links ou qualquer outro tipo de parceria que gere uma receita para o site.\r\n\r\nO tempo do blog romântico já vai longe. Os blogs de hoje são extremamente profissionais e por isso mesmo precisam gerar receita.\r\n\r\nUm bom exemplo disso são as blogueiras de moda, que criaram uma indústria milionária, que vem garantindo a elas um bom retorno financeiro e projeção no segmento.\r\n\r\nAtravés de Programas de Afiliados, podemos fazer de parcerias com sistemas de distribuição de anúncios, conhecidos como Ad Servers, e inserir estes anúncios em um blog ou site, em troca de uma remuneração, geralmente em função de acessos gerados por este anúncios ou vendas efetivas.\r\n\r\nFormas de monetização de sites\r\nAgora que você já sabe o que é monetização de sites, vamos ver quais são suas opções. Existem diversas opções para monetizar o seu site:\r\n\r\nInserção de anúncios de terceiros no site\r\nVenda de infoprodutos e produtos físicos\r\nGeração de tráfego para outros site\r\nExistem diversos programas de afiliados que podem ser utilizados na monetização de sites. O importante é encontrar aquele que melhor se adapta ao público do seu site e que possa ser integrado de maneira, não só como propaganda, mas sim, como parte do conteúdo.\r\n\r\nO conceito acima é muito importante e por isso mesmo, em nosso Curso de AdSense, discutimos exaustivamente esta questão, pois incorporar de maneira a que o anúncio passe a fazer parte do fluxo de informação do site, é um dos grandes segredos para ganhar dinheiro com programas de afiliados.\r\n\r\nPrincipais ferramentas para monetização de sites\r\nVamos agora discutir quais são as melhores ferramentas para a monetização do seu site, pois de nada adianta saber o que é monetização de sites se você não sabe quais são as melhores ferramentas para atingir seus objetivos.\r\n\r\nO programa de afiliados mais conhecido pelos blogueiros é o Google AdSense, o programa do Google para afiliados na distribuição dos anúncios contratados na sua plataforma AdWords. Se afiliando ao AdSense, você poderá exibir diversos tipos de anúncios em seu site e ganhar a cada vez que eles forem clicados.\r\n\r\nO programa é um dos mais antigos e faz parte de qualquer projeto de monetização de site, já que o Google AdSense é bastante flexível em termos de formatos de anúncios, o que facilita bastante em termos de posicionamento nas diversas áreas para exposição de propagandas em um blog ou site.\r\n\r\nO AdSense paga por número de exibição e cliques nestes anúncios. O pagamento é registrado em dólares e creditado em sua conta em Reais, pela cotação da data de transferência. É a melhor opção para quem quer ganhar dinheiro com um blog ou outro tipo de site de conteúdo.\r\n\r\nOutro programa bastante utilizado é o Lomadee, criado pela BuscaPé. Nele você encontrará diversos anunciantes que oferecem anúncios nos mais variados formatos, como banners e também links de afiliados. É uma alternativa interessante como complementação do AdSense, pois possibilita trabalhar com mais anunciantes.\r\n\r\nO Lomadee trabalha de forma diferente do Google, e na maioria das vezes, a remuneração segue o modelo CPA – Custo Por Aquisição, ou seja, você receberá um percentual sobre as vendas que forem originadas em cliques nestes anúncios.\r\n\r\nNão se trata apenas de compreender o que é monetização, mas também, como adaptar essas ferramentas ao seu site, de forma a torná-la um complementação da informação, ao mesmo tempo em que gera receita.\r\n\r\nOutro programa de afiliados, que vem crescendo ultimamente é o da Hotmart, onde você encontra diversos infoprodutos como cursos online e e-books. O Hotmart paga uma comissão sobre a venda de seus produtos, no modelo CPA apresentado anteriormente.\r\n\r\nEm um infográfico sobre monetização de sites que publicamos aqui em nosso site você poderá ter uma boa ideia sobre as diversas opções de monetização de um site.\r\n\r\nEsperamos ter dado uma boa ideia sobre o que é monetização. E agora? O que acha de implementar algumas dessas ferramentas em seu blog ou site e ganhar dinheiro com elas?', 25, 0),
(23, 'Hydrangeas.jpg', '2019-06-06', 'Meu novo titulo', 'A tecnologia começou a surgir em um período muito distante. Podemos dizer que as primeiras invenções foram às ferramentas que o homem pré-histórico desenvolveu para aperfeiçoar a sua caça e assim obter alimento com mais facilidade. Logo veio a descoberta do fogo, que pode ser considerada como a primeira descoberta de grande importância, e como invenção, é claro que não podemos deixar de citar a roda, sendo responsável por um grande progresso nesta fase inicial.\r\n\r\nA tecnologia visa aprimorar algo e tornar a vida em sociedade mais fácil. O telefone, por exemplo, possibilitou que duas pessoas conversassem, mesmo que elas estejam a milhares de quilômetros afastados. E o telefone hoje se tornou em uma verdadeira máquina, onde podemos ouvir músicas, fazer download e tirar fotos, jogar, assistir TV, e de vez em quando faz uma ligação. A música é um exemplo fácil de mostrar como a evolução tecnológica é rápida. Primeiro surgiu a vitrola com os discos de vinil, depois as fitas K7, em seguida o Compact Disc, (CD), e por último o MP3. Podemos armazenar as músicas que ouvimos durante toda a nossa vida, ou de uma geração', '', '', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `biografia`
--

CREATE TABLE `biografia` (
  `id_biografia` int(11) NOT NULL,
  `experiencia` text,
  `participacao_projeto` text,
  `formacao_academica` text,
  `id_orientador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `biografia`
--

INSERT INTO `biografia` (`id_biografia`, `experiencia`, `participacao_projeto`, `formacao_academica`, `id_orientador`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam. ', 'eu sou Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.', '1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.', 1),
(2, ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.andre', 'minha casa Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.', '2 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquaut enim ad minim veniam.', 1),
(3, 'dinossauroLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, '3Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1),
(4, '', NULL, NULL, 1),
(5, 'veremos se dá certo dessa vez', NULL, NULL, 1),
(6, NULL, 'nova participação', NULL, 1),
(7, NULL, NULL, 'nova formação acadêmica.', 1),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, NULL, 2),
(9, NULL, '1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', NULL, 2),
(10, NULL, NULL, 'Nova formação academica', 2),
(11, 'Esse é um novo tópico', NULL, NULL, 2),
(12, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 2),
(13, 'vou inserir um novo tópico', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descricao`) VALUES
(1, 'SQL'),
(2, 'PHP'),
(3, 'JAVASCRIPT'),
(4, 'Firewall'),
(5, 'Proxy'),
(6, 'Servidores'),
(7, 'Inteligência Artificial'),
(8, 'Linux'),
(9, 'Criptografia'),
(10, 'Bootstrap'),
(11, 'Jquery'),
(12, 'Design'),
(13, 'MySQL'),
(14, 'Modelagem'),
(15, 'Android'),
(16, 'GO'),
(17, 'IOS'),
(18, 'Big Data'),
(19, 'Python'),
(20, 'Banco de Dados'),
(21, 'Redes'),
(22, 'Segurança Digital'),
(23, 'Java'),
(24, 'C#'),
(25, 'HTML'),
(26, 'CSS'),
(27, 'C'),
(28, 'C++'),
(29, 'Desenvolvimento'),
(30, 'Assembly');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_artigo`
--

CREATE TABLE `categoria_artigo` (
  `id_categoria_artigo` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_artigo` int(11) NOT NULL,
  `resposta` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_artigo`
--

INSERT INTO `categoria_artigo` (`id_categoria_artigo`, `id_categoria`, `id_artigo`, `resposta`) VALUES
(1, 1, 14, 0),
(2, 2, 14, 0),
(3, 3, 14, 0),
(4, 4, 14, 0),
(5, 5, 14, 0),
(6, 6, 14, 0),
(7, 7, 14, 0),
(8, 8, 14, 0),
(9, 9, 14, 0),
(10, 10, 14, 0),
(11, 11, 14, 0),
(12, 12, 14, 0),
(13, 13, 14, 0),
(14, 14, 14, 0),
(15, 15, 14, 1),
(16, 16, 14, 1),
(17, 17, 14, 0),
(18, 18, 14, 0),
(19, 19, 14, 0),
(20, 20, 14, 0),
(21, 21, 14, 0),
(22, 22, 14, 0),
(23, 23, 14, 0),
(24, 24, 14, 0),
(25, 25, 14, 0),
(26, 26, 14, 0),
(27, 27, 14, 0),
(28, 28, 14, 0),
(30, 1, 13, 0),
(31, 2, 13, 0),
(32, 3, 13, 0),
(33, 4, 13, 1),
(34, 5, 13, 1),
(35, 6, 13, 1),
(36, 7, 13, 0),
(37, 8, 13, 0),
(38, 9, 13, 0),
(39, 10, 13, 0),
(40, 11, 13, 0),
(41, 12, 13, 0),
(42, 13, 13, 0),
(43, 14, 13, 0),
(44, 15, 13, 0),
(45, 16, 13, 0),
(46, 17, 13, 0),
(47, 18, 13, 0),
(48, 19, 13, 0),
(49, 20, 13, 0),
(50, 21, 13, 0),
(51, 22, 13, 0),
(52, 23, 13, 0),
(53, 24, 13, 0),
(54, 25, 13, 0),
(55, 26, 13, 0),
(56, 27, 13, 0),
(57, 28, 13, 0),
(58, 1, 15, 0),
(59, 2, 15, 0),
(60, 3, 15, 0),
(61, 4, 15, 0),
(62, 5, 15, 0),
(63, 6, 15, 0),
(64, 7, 15, 0),
(65, 8, 15, 0),
(66, 9, 15, 0),
(67, 10, 15, 0),
(68, 11, 15, 0),
(69, 12, 15, 1),
(70, 13, 15, 0),
(71, 14, 15, 0),
(72, 15, 15, 0),
(73, 16, 15, 0),
(74, 17, 15, 0),
(75, 18, 15, 0),
(76, 19, 15, 0),
(77, 20, 15, 0),
(78, 21, 15, 0),
(79, 22, 15, 0),
(80, 23, 15, 0),
(81, 24, 15, 0),
(82, 25, 15, 1),
(83, 26, 15, 1),
(84, 27, 15, 0),
(85, 28, 15, 0),
(86, 29, 15, 0),
(87, 1, 16, 0),
(88, 2, 16, 1),
(89, 3, 16, 0),
(90, 4, 16, 0),
(91, 5, 16, 0),
(92, 6, 16, 0),
(93, 7, 16, 0),
(94, 8, 16, 0),
(95, 9, 16, 0),
(96, 10, 16, 0),
(97, 11, 16, 0),
(98, 12, 16, 0),
(99, 13, 16, 0),
(100, 14, 16, 0),
(101, 15, 16, 0),
(102, 16, 16, 0),
(103, 17, 16, 0),
(104, 18, 16, 0),
(105, 19, 16, 0),
(106, 20, 16, 0),
(107, 21, 16, 0),
(108, 22, 16, 0),
(109, 23, 16, 0),
(110, 24, 16, 0),
(111, 25, 16, 0),
(112, 26, 16, 0),
(113, 27, 16, 0),
(114, 28, 16, 0),
(115, 29, 16, 1),
(116, 1, 17, 1),
(117, 2, 17, 0),
(118, 3, 17, 0),
(119, 4, 17, 0),
(120, 5, 17, 0),
(121, 6, 17, 0),
(122, 7, 17, 0),
(123, 8, 17, 0),
(124, 9, 17, 0),
(125, 10, 17, 0),
(126, 11, 17, 0),
(127, 12, 17, 0),
(128, 13, 17, 0),
(129, 14, 17, 0),
(130, 15, 17, 0),
(131, 16, 17, 0),
(132, 17, 17, 0),
(133, 18, 17, 0),
(134, 19, 17, 0),
(135, 20, 17, 0),
(136, 21, 17, 0),
(137, 22, 17, 0),
(138, 23, 17, 0),
(139, 24, 17, 0),
(140, 25, 17, 0),
(141, 26, 17, 0),
(142, 27, 17, 0),
(143, 28, 17, 0),
(144, 29, 17, 0),
(145, 1, 18, 0),
(146, 2, 18, 0),
(147, 3, 18, 1),
(148, 4, 18, 0),
(149, 5, 18, 0),
(150, 6, 18, 0),
(151, 7, 18, 0),
(152, 8, 18, 0),
(153, 9, 18, 0),
(154, 10, 18, 0),
(155, 11, 18, 0),
(156, 12, 18, 0),
(157, 13, 18, 0),
(158, 14, 18, 0),
(159, 15, 18, 0),
(160, 16, 18, 0),
(161, 17, 18, 0),
(162, 18, 18, 0),
(163, 19, 18, 0),
(164, 20, 18, 0),
(165, 21, 18, 0),
(166, 22, 18, 0),
(167, 23, 18, 0),
(168, 24, 18, 0),
(169, 25, 18, 0),
(170, 26, 18, 0),
(171, 27, 18, 0),
(172, 28, 18, 0),
(173, 29, 18, 0),
(174, 1, 19, 0),
(175, 2, 19, 0),
(176, 3, 19, 0),
(177, 4, 19, 1),
(178, 5, 19, 0),
(179, 6, 19, 0),
(180, 7, 19, 0),
(181, 8, 19, 0),
(182, 9, 19, 0),
(183, 10, 19, 0),
(184, 11, 19, 0),
(185, 12, 19, 0),
(186, 13, 19, 0),
(187, 14, 19, 0),
(188, 15, 19, 0),
(189, 16, 19, 0),
(190, 17, 19, 0),
(191, 18, 19, 0),
(192, 19, 19, 0),
(193, 20, 19, 0),
(194, 21, 19, 0),
(195, 22, 19, 1),
(196, 23, 19, 0),
(197, 24, 19, 0),
(198, 25, 19, 0),
(199, 26, 19, 0),
(200, 27, 19, 0),
(201, 28, 19, 0),
(202, 29, 19, 0),
(203, 1, 1, 0),
(204, 2, 1, 0),
(205, 3, 1, 0),
(206, 4, 1, 0),
(207, 5, 1, 0),
(208, 6, 1, 0),
(209, 7, 1, 0),
(210, 8, 1, 0),
(211, 9, 1, 0),
(212, 10, 1, 0),
(213, 11, 1, 1),
(214, 12, 1, 0),
(215, 13, 1, 0),
(216, 14, 1, 0),
(217, 15, 1, 1),
(218, 16, 1, 0),
(219, 17, 1, 0),
(220, 18, 1, 0),
(221, 19, 1, 0),
(222, 20, 1, 0),
(223, 21, 1, 0),
(224, 22, 1, 0),
(225, 23, 1, 0),
(226, 24, 1, 0),
(227, 25, 1, 0),
(228, 26, 1, 0),
(229, 27, 1, 0),
(230, 28, 1, 0),
(231, 29, 1, 0),
(232, 1, 10, 0),
(233, 2, 10, 0),
(234, 3, 10, 0),
(235, 4, 10, 0),
(236, 5, 10, 0),
(237, 6, 10, 0),
(238, 7, 10, 0),
(239, 8, 10, 0),
(240, 9, 10, 1),
(241, 10, 10, 0),
(242, 11, 10, 0),
(243, 12, 10, 0),
(244, 13, 10, 0),
(245, 14, 10, 0),
(246, 15, 10, 1),
(247, 16, 10, 0),
(248, 17, 10, 0),
(249, 18, 10, 0),
(250, 19, 10, 0),
(251, 20, 10, 0),
(252, 21, 10, 0),
(253, 22, 10, 1),
(254, 23, 10, 0),
(255, 24, 10, 0),
(256, 25, 10, 0),
(257, 26, 10, 0),
(258, 27, 10, 0),
(259, 28, 10, 0),
(260, 29, 10, 0),
(261, 1, 12, 0),
(262, 2, 12, 0),
(263, 3, 12, 0),
(264, 4, 12, 0),
(265, 5, 12, 0),
(266, 6, 12, 0),
(267, 7, 12, 1),
(268, 8, 12, 0),
(269, 9, 12, 0),
(270, 10, 12, 0),
(271, 11, 12, 0),
(272, 12, 12, 0),
(273, 13, 12, 0),
(274, 14, 12, 0),
(275, 15, 12, 0),
(276, 16, 12, 0),
(277, 17, 12, 0),
(278, 18, 12, 1),
(279, 19, 12, 0),
(280, 20, 12, 0),
(281, 21, 12, 0),
(282, 22, 12, 0),
(283, 23, 12, 0),
(284, 24, 12, 0),
(285, 25, 12, 0),
(286, 26, 12, 0),
(287, 27, 12, 0),
(288, 28, 12, 0),
(289, 29, 12, 0),
(290, 1, 6, 0),
(291, 2, 6, 0),
(292, 3, 6, 0),
(293, 4, 6, 0),
(294, 5, 6, 0),
(295, 6, 6, 0),
(296, 7, 6, 0),
(297, 8, 6, 0),
(298, 9, 6, 0),
(299, 10, 6, 0),
(300, 11, 6, 0),
(301, 12, 6, 0),
(302, 13, 6, 0),
(303, 14, 6, 0),
(304, 15, 6, 1),
(305, 16, 6, 1),
(306, 17, 6, 1),
(307, 18, 6, 0),
(308, 19, 6, 0),
(309, 20, 6, 0),
(310, 21, 6, 0),
(311, 22, 6, 0),
(312, 23, 6, 0),
(313, 24, 6, 0),
(314, 25, 6, 0),
(315, 26, 6, 0),
(316, 27, 6, 0),
(317, 28, 6, 0),
(318, 29, 6, 0),
(319, 29, 13, 0),
(320, 1, 9, 0),
(321, 2, 9, 0),
(322, 3, 9, 0),
(323, 4, 9, 0),
(324, 5, 9, 0),
(325, 6, 9, 0),
(326, 7, 9, 0),
(327, 8, 9, 0),
(328, 9, 9, 0),
(329, 10, 9, 0),
(330, 11, 9, 1),
(331, 12, 9, 1),
(332, 13, 9, 0),
(333, 14, 9, 0),
(334, 15, 9, 1),
(335, 16, 9, 0),
(336, 17, 9, 0),
(337, 18, 9, 0),
(338, 19, 9, 0),
(339, 20, 9, 0),
(340, 21, 9, 0),
(341, 22, 9, 0),
(342, 23, 9, 0),
(343, 24, 9, 0),
(344, 25, 9, 0),
(345, 26, 9, 0),
(346, 27, 9, 0),
(347, 28, 9, 0),
(348, 29, 9, 0),
(349, 1, 2, 0),
(350, 2, 2, 0),
(351, 3, 2, 0),
(352, 4, 2, 0),
(353, 5, 2, 0),
(354, 6, 2, 0),
(355, 7, 2, 0),
(356, 8, 2, 0),
(357, 9, 2, 0),
(358, 10, 2, 0),
(359, 11, 2, 0),
(360, 12, 2, 0),
(361, 13, 2, 0),
(362, 14, 2, 0),
(363, 15, 2, 0),
(364, 16, 2, 0),
(365, 17, 2, 0),
(366, 18, 2, 0),
(367, 19, 2, 0),
(368, 20, 2, 0),
(369, 21, 2, 0),
(370, 22, 2, 0),
(371, 23, 2, 0),
(372, 24, 2, 0),
(373, 25, 2, 1),
(374, 26, 2, 1),
(375, 27, 2, 0),
(376, 28, 2, 0),
(377, 29, 2, 1),
(378, 1, 5, 0),
(379, 2, 5, 0),
(380, 3, 5, 0),
(381, 4, 5, 0),
(382, 5, 5, 0),
(383, 6, 5, 0),
(384, 7, 5, 0),
(385, 8, 5, 0),
(386, 9, 5, 0),
(387, 10, 5, 0),
(388, 11, 5, 0),
(389, 12, 5, 0),
(390, 13, 5, 0),
(391, 14, 5, 0),
(392, 15, 5, 1),
(393, 16, 5, 1),
(394, 17, 5, 1),
(395, 18, 5, 0),
(396, 19, 5, 0),
(397, 20, 5, 0),
(398, 21, 5, 0),
(399, 22, 5, 0),
(400, 23, 5, 0),
(401, 24, 5, 0),
(402, 25, 5, 0),
(403, 26, 5, 0),
(404, 27, 5, 0),
(405, 28, 5, 0),
(406, 29, 5, 0),
(407, 1, 4, 0),
(408, 2, 4, 0),
(409, 3, 4, 0),
(410, 4, 4, 0),
(411, 5, 4, 0),
(412, 6, 4, 0),
(413, 7, 4, 0),
(414, 8, 4, 1),
(415, 9, 4, 0),
(416, 10, 4, 0),
(417, 11, 4, 0),
(418, 12, 4, 0),
(419, 13, 4, 0),
(420, 14, 4, 0),
(421, 15, 4, 0),
(422, 16, 4, 0),
(423, 17, 4, 0),
(424, 18, 4, 0),
(425, 19, 4, 0),
(426, 20, 4, 0),
(427, 21, 4, 0),
(428, 22, 4, 0),
(429, 23, 4, 0),
(430, 24, 4, 0),
(431, 25, 4, 0),
(432, 26, 4, 0),
(433, 27, 4, 0),
(434, 28, 4, 0),
(435, 29, 4, 0),
(436, 1, 7, 0),
(437, 2, 7, 0),
(438, 3, 7, 0),
(439, 4, 7, 0),
(440, 5, 7, 0),
(441, 6, 7, 0),
(442, 7, 7, 0),
(443, 8, 7, 0),
(444, 9, 7, 0),
(445, 10, 7, 1),
(446, 11, 7, 0),
(447, 12, 7, 0),
(448, 13, 7, 0),
(449, 14, 7, 0),
(450, 15, 7, 1),
(451, 16, 7, 0),
(452, 17, 7, 0),
(453, 18, 7, 0),
(454, 19, 7, 0),
(455, 20, 7, 0),
(456, 21, 7, 0),
(457, 22, 7, 0),
(458, 23, 7, 0),
(459, 24, 7, 0),
(460, 25, 7, 0),
(461, 26, 7, 0),
(462, 27, 7, 0),
(463, 28, 7, 0),
(464, 29, 7, 0),
(465, 1, 11, 0),
(466, 2, 11, 0),
(467, 3, 11, 0),
(468, 4, 11, 0),
(469, 5, 11, 1),
(470, 6, 11, 0),
(471, 7, 11, 1),
(472, 8, 11, 0),
(473, 9, 11, 0),
(474, 10, 11, 0),
(475, 11, 11, 0),
(476, 12, 11, 0),
(477, 13, 11, 0),
(478, 14, 11, 0),
(479, 15, 11, 0),
(480, 16, 11, 0),
(481, 17, 11, 0),
(482, 18, 11, 0),
(483, 19, 11, 0),
(484, 20, 11, 0),
(485, 21, 11, 0),
(486, 22, 11, 0),
(487, 23, 11, 0),
(488, 24, 11, 0),
(489, 25, 11, 0),
(490, 26, 11, 0),
(491, 27, 11, 0),
(492, 28, 11, 0),
(493, 29, 11, 0),
(494, 1, 8, 0),
(495, 2, 8, 0),
(496, 3, 8, 0),
(497, 4, 8, 0),
(498, 5, 8, 0),
(499, 6, 8, 0),
(500, 7, 8, 0),
(501, 8, 8, 0),
(502, 9, 8, 0),
(503, 10, 8, 0),
(504, 11, 8, 1),
(505, 12, 8, 0),
(506, 13, 8, 0),
(507, 14, 8, 0),
(508, 15, 8, 0),
(509, 16, 8, 0),
(510, 17, 8, 0),
(511, 18, 8, 0),
(512, 19, 8, 0),
(513, 20, 8, 0),
(514, 21, 8, 0),
(515, 22, 8, 0),
(516, 23, 8, 0),
(517, 24, 8, 0),
(518, 25, 8, 1),
(519, 26, 8, 1),
(520, 27, 8, 0),
(521, 28, 8, 0),
(522, 29, 8, 0),
(523, 1, 3, 0),
(524, 2, 3, 0),
(525, 3, 3, 0),
(526, 4, 3, 0),
(527, 5, 3, 0),
(528, 6, 3, 0),
(529, 7, 3, 0),
(530, 8, 3, 0),
(531, 9, 3, 0),
(532, 10, 3, 0),
(533, 11, 3, 0),
(534, 12, 3, 0),
(535, 13, 3, 0),
(536, 14, 3, 0),
(537, 15, 3, 0),
(538, 16, 3, 0),
(539, 17, 3, 1),
(540, 18, 3, 0),
(541, 19, 3, 1),
(542, 20, 3, 0),
(543, 21, 3, 0),
(544, 22, 3, 0),
(545, 23, 3, 0),
(546, 24, 3, 0),
(547, 25, 3, 0),
(548, 26, 3, 0),
(549, 27, 3, 0),
(550, 28, 3, 0),
(551, 29, 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_orientador`
--

CREATE TABLE `categoria_orientador` (
  `id_categoria_orientador` int(11) NOT NULL,
  `id_orientador` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `resposta` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_orientador`
--

INSERT INTO `categoria_orientador` (`id_categoria_orientador`, `id_orientador`, `id_categoria`, `resposta`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 1, 7, 0),
(8, 1, 8, 0),
(9, 1, 9, 0),
(10, 1, 10, 0),
(11, 1, 11, 0),
(12, 1, 12, 0),
(13, 1, 13, 0),
(14, 1, 14, 0),
(15, 1, 15, 0),
(16, 1, 16, 0),
(17, 1, 17, 0),
(18, 1, 18, 0),
(19, 1, 19, 0),
(20, 1, 20, 0),
(21, 1, 21, 1),
(22, 1, 22, 0),
(23, 1, 23, 0),
(24, 1, 24, 0),
(25, 1, 25, 0),
(26, 1, 26, 0),
(27, 1, 27, 0),
(28, 1, 28, 0),
(29, 7, 1, 0),
(30, 7, 2, 0),
(31, 7, 3, 0),
(32, 7, 4, 0),
(33, 7, 5, 1),
(34, 7, 6, 1),
(35, 7, 7, 0),
(36, 7, 8, 0),
(37, 7, 9, 0),
(38, 7, 10, 0),
(39, 7, 11, 0),
(40, 7, 12, 0),
(41, 7, 13, 0),
(42, 7, 14, 0),
(43, 7, 15, 0),
(44, 7, 16, 0),
(45, 7, 17, 0),
(46, 7, 18, 0),
(47, 7, 19, 0),
(48, 7, 20, 0),
(49, 7, 21, 1),
(50, 7, 22, 0),
(51, 7, 23, 0),
(52, 7, 24, 0),
(53, 7, 25, 0),
(54, 7, 26, 0),
(55, 7, 27, 0),
(56, 7, 28, 0),
(57, 10, 1, 0),
(58, 10, 2, 1),
(59, 10, 3, 0),
(60, 10, 4, 0),
(61, 10, 5, 0),
(62, 10, 6, 0),
(63, 10, 7, 0),
(64, 10, 8, 0),
(65, 10, 9, 0),
(66, 10, 10, 0),
(67, 10, 11, 0),
(68, 10, 12, 0),
(69, 10, 13, 1),
(70, 10, 14, 0),
(71, 10, 15, 0),
(72, 10, 16, 0),
(73, 10, 17, 0),
(74, 10, 18, 0),
(75, 10, 19, 0),
(76, 10, 20, 0),
(77, 10, 21, 0),
(78, 10, 22, 0),
(79, 10, 23, 0),
(80, 10, 24, 0),
(81, 10, 25, 0),
(82, 10, 26, 0),
(83, 10, 27, 0),
(84, 10, 28, 0),
(85, 6, 1, 1),
(86, 6, 2, 0),
(87, 6, 3, 0),
(88, 6, 4, 0),
(89, 6, 5, 0),
(90, 6, 6, 0),
(91, 6, 7, 0),
(92, 6, 8, 0),
(93, 6, 9, 0),
(94, 6, 10, 0),
(95, 6, 11, 0),
(96, 6, 12, 0),
(97, 6, 13, 0),
(98, 6, 14, 0),
(99, 6, 15, 0),
(100, 6, 16, 0),
(101, 6, 17, 0),
(102, 6, 18, 1),
(103, 6, 19, 0),
(104, 6, 20, 0),
(105, 6, 21, 0),
(106, 6, 22, 0),
(107, 6, 23, 0),
(108, 6, 24, 0),
(109, 6, 25, 0),
(110, 6, 26, 0),
(111, 6, 27, 0),
(112, 6, 28, 0),
(113, 6, 29, 1),
(114, 11, 1, 0),
(115, 11, 2, 0),
(116, 11, 3, 0),
(117, 11, 4, 0),
(118, 11, 5, 0),
(119, 11, 6, 0),
(120, 11, 7, 0),
(121, 11, 8, 0),
(122, 11, 9, 0),
(123, 11, 10, 1),
(124, 11, 11, 0),
(125, 11, 12, 1),
(126, 11, 13, 0),
(127, 11, 14, 0),
(128, 11, 15, 0),
(129, 11, 16, 0),
(130, 11, 17, 0),
(131, 11, 18, 0),
(132, 11, 19, 0),
(133, 11, 20, 0),
(134, 11, 21, 0),
(135, 11, 22, 0),
(136, 11, 23, 0),
(137, 11, 24, 0),
(138, 11, 25, 0),
(139, 11, 26, 1),
(140, 11, 27, 0),
(141, 11, 28, 0),
(142, 11, 29, 0),
(143, 12, 1, 0),
(144, 12, 2, 0),
(145, 12, 3, 0),
(146, 12, 4, 1),
(147, 12, 5, 1),
(148, 12, 6, 1),
(149, 12, 7, 0),
(150, 12, 8, 0),
(151, 12, 9, 0),
(152, 12, 10, 0),
(153, 12, 11, 0),
(154, 12, 12, 0),
(155, 12, 13, 0),
(156, 12, 14, 0),
(157, 12, 15, 0),
(158, 12, 16, 0),
(159, 12, 17, 0),
(160, 12, 18, 0),
(161, 12, 19, 0),
(162, 12, 20, 0),
(163, 12, 21, 0),
(164, 12, 22, 0),
(165, 12, 23, 0),
(166, 12, 24, 0),
(167, 12, 25, 0),
(168, 12, 26, 0),
(169, 12, 27, 0),
(170, 12, 28, 0),
(171, 12, 29, 0),
(172, 4, 1, 0),
(173, 4, 2, 0),
(174, 4, 3, 0),
(175, 4, 4, 0),
(176, 4, 5, 0),
(177, 4, 6, 0),
(178, 4, 7, 0),
(179, 4, 8, 0),
(180, 4, 9, 0),
(181, 4, 10, 0),
(182, 4, 11, 0),
(183, 4, 12, 0),
(184, 4, 13, 1),
(185, 4, 14, 1),
(186, 4, 15, 0),
(187, 4, 16, 0),
(188, 4, 17, 0),
(189, 4, 18, 1),
(190, 4, 19, 0),
(191, 4, 20, 0),
(192, 4, 21, 0),
(193, 4, 22, 0),
(194, 4, 23, 0),
(195, 4, 24, 0),
(196, 4, 25, 0),
(197, 4, 26, 0),
(198, 4, 27, 0),
(199, 4, 28, 0),
(200, 4, 29, 0),
(201, 8, 1, 0),
(202, 8, 2, 0),
(203, 8, 3, 0),
(204, 8, 4, 0),
(205, 8, 5, 0),
(206, 8, 6, 0),
(207, 8, 7, 0),
(208, 8, 8, 0),
(209, 8, 9, 0),
(210, 8, 10, 0),
(211, 8, 11, 1),
(212, 8, 12, 0),
(213, 8, 13, 0),
(214, 8, 14, 0),
(215, 8, 15, 1),
(216, 8, 16, 0),
(217, 8, 17, 1),
(218, 8, 18, 0),
(219, 8, 19, 0),
(220, 8, 20, 0),
(221, 8, 21, 0),
(222, 8, 22, 0),
(223, 8, 23, 0),
(224, 8, 24, 0),
(225, 8, 25, 0),
(226, 8, 26, 0),
(227, 8, 27, 0),
(228, 8, 28, 0),
(229, 8, 29, 0),
(230, 5, 1, 0),
(231, 5, 2, 0),
(232, 5, 3, 0),
(233, 5, 4, 0),
(234, 5, 5, 1),
(235, 5, 6, 1),
(236, 5, 7, 0),
(237, 5, 8, 0),
(238, 5, 9, 0),
(239, 5, 10, 0),
(240, 5, 11, 0),
(241, 5, 12, 0),
(242, 5, 13, 0),
(243, 5, 14, 0),
(244, 5, 15, 0),
(245, 5, 16, 0),
(246, 5, 17, 0),
(247, 5, 18, 0),
(248, 5, 19, 0),
(249, 5, 20, 0),
(250, 5, 21, 1),
(251, 5, 22, 0),
(252, 5, 23, 0),
(253, 5, 24, 0),
(254, 5, 25, 0),
(255, 5, 26, 0),
(256, 5, 27, 0),
(257, 5, 28, 0),
(258, 5, 29, 0),
(259, 9, 1, 1),
(260, 9, 2, 0),
(261, 9, 3, 0),
(262, 9, 4, 0),
(263, 9, 5, 0),
(264, 9, 6, 0),
(265, 9, 7, 0),
(266, 9, 8, 0),
(267, 9, 9, 0),
(268, 9, 10, 0),
(269, 9, 11, 0),
(270, 9, 12, 0),
(271, 9, 13, 0),
(272, 9, 14, 0),
(273, 9, 15, 0),
(274, 9, 16, 0),
(275, 9, 17, 0),
(276, 9, 18, 1),
(277, 9, 19, 0),
(278, 9, 20, 1),
(279, 9, 21, 0),
(280, 9, 22, 0),
(281, 9, 23, 0),
(282, 9, 24, 0),
(283, 9, 25, 0),
(284, 9, 26, 0),
(285, 9, 27, 0),
(286, 9, 28, 0),
(287, 9, 29, 0),
(288, 3, 1, 0),
(289, 3, 2, 0),
(290, 3, 3, 0),
(291, 3, 4, 0),
(292, 3, 5, 0),
(293, 3, 6, 0),
(294, 3, 7, 0),
(295, 3, 8, 0),
(296, 3, 9, 0),
(297, 3, 10, 0),
(298, 3, 11, 0),
(299, 3, 12, 0),
(300, 3, 13, 0),
(301, 3, 14, 0),
(302, 3, 15, 0),
(303, 3, 16, 0),
(304, 3, 17, 0),
(305, 3, 18, 0),
(306, 3, 19, 1),
(307, 3, 20, 0),
(308, 3, 21, 0),
(309, 3, 22, 0),
(310, 3, 23, 1),
(311, 3, 24, 0),
(312, 3, 25, 0),
(313, 3, 26, 0),
(314, 3, 27, 0),
(315, 3, 28, 0),
(316, 3, 29, 1),
(317, 2, 1, 0),
(318, 2, 2, 0),
(319, 2, 3, 1),
(320, 2, 4, 0),
(321, 2, 5, 0),
(322, 2, 6, 1),
(323, 2, 7, 1),
(324, 2, 8, 0),
(325, 2, 9, 0),
(326, 2, 10, 0),
(327, 2, 11, 0),
(328, 2, 12, 0),
(329, 2, 13, 0),
(330, 2, 14, 0),
(331, 2, 15, 0),
(332, 2, 16, 0),
(333, 2, 17, 0),
(334, 2, 18, 0),
(335, 2, 19, 0),
(336, 2, 20, 0),
(337, 2, 21, 0),
(338, 2, 22, 0),
(339, 2, 23, 0),
(340, 2, 24, 0),
(341, 2, 25, 0),
(342, 2, 26, 0),
(343, 2, 27, 0),
(344, 2, 28, 0),
(345, 2, 29, 0),
(346, 1, 29, 0),
(347, 14, 1, 1),
(348, 14, 2, 0),
(349, 14, 3, 1),
(350, 14, 4, 0),
(351, 14, 5, 0),
(352, 14, 6, 0),
(353, 14, 7, 0),
(354, 14, 8, 0),
(355, 14, 9, 0),
(356, 14, 10, 0),
(357, 14, 11, 0),
(358, 14, 12, 0),
(359, 14, 13, 0),
(360, 14, 14, 0),
(361, 14, 15, 0),
(362, 14, 16, 0),
(363, 14, 17, 0),
(364, 14, 18, 0),
(365, 14, 19, 0),
(366, 14, 20, 1),
(367, 14, 21, 0),
(368, 14, 22, 0),
(369, 14, 23, 0),
(370, 14, 24, 0),
(371, 14, 25, 0),
(372, 14, 26, 0),
(373, 14, 27, 0),
(374, 14, 28, 0),
(375, 14, 29, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacao_orientador`
--

CREATE TABLE `classificacao_orientador` (
  `id_class_ori` int(11) NOT NULL,
  `id_estudante` int(11) DEFAULT NULL,
  `id_orientador` int(11) DEFAULT NULL,
  `id_ori_rating` int(11) NOT NULL,
  `classificacao` tinyint(4) NOT NULL DEFAULT '0',
  `id_artigo` text NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `classificacao_orientador`
--

INSERT INTO `classificacao_orientador` (`id_class_ori`, `id_estudante`, `id_orientador`, `id_ori_rating`, `classificacao`, `id_artigo`, `count`) VALUES
(1, NULL, 5, 25, 2, '', 0),
(2, NULL, 5, 2, 5, '23 - 10 - 12 - ', 3),
(3, NULL, 5, 24, 0, '16 - ', 1),
(4, 1, NULL, 5, 5, '9 - 2 - 7 - 4 - 5 - ', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_artigo` int(11) DEFAULT NULL,
  `data` datetime DEFAULT CURRENT_TIMESTAMP,
  `assunto` varchar(100) DEFAULT NULL,
  `mensagem` varchar(250) DEFAULT NULL,
  `id_estudante` int(11) DEFAULT NULL,
  `id_orientador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_artigo`, `data`, `assunto`, `mensagem`, `id_estudante`, `id_orientador`) VALUES
(1, 14, '2019-05-18 09:51:31', 'meu comentario', 'gfbgffggfhyjhyhrfghhythyhtyhty', NULL, 2),
(2, 14, '2019-05-18 09:51:31', 'Meu novo comentario', 'jcsdkjbsdbsdnsdnjvskfjnvfjkvnjfkvbfjkvnjfkvnfjvnfjdvndfnvnvdjvndjvndjk', NULL, 2),
(3, 13, '2019-05-18 09:51:31', 'Farei um comentario', 'vfvfd,vnfdvnfd df vm,  ,ffnfvnfvnf', NULL, 2),
(4, 9, '2019-05-18 09:51:31', 'mdmdmdmfmf', 'o texto da mensagem', 1, NULL),
(5, 14, '2019-05-18 09:52:45', 'meu assunto', 'estou digitando texto aqui!', 1, NULL),
(6, 15, '2019-05-18 13:56:26', 'meu assunto', 'Sim, eu amo os pinguins', NULL, 6),
(7, 15, '2019-05-18 21:05:45', 'oi', 'Que palhaçada é essa?', NULL, 12),
(8, 9, '2019-06-05 08:44:11', NULL, 'meu segundo comentário', NULL, 5),
(9, 16, '2019-06-06 09:03:56', NULL, 'Eu sou o andré', 1, NULL),
(10, 18, '2019-06-06 11:33:45', NULL, 'Eu sou o Drax', NULL, 24),
(11, 16, '2019-06-06 13:55:47', NULL, 'meu novo comentário!', 6, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estudante`
--

CREATE TABLE `estudante` (
  `id_estudante` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `question` varchar(50) NOT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `frase` varchar(200) DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `log_in` varchar(7) NOT NULL DEFAULT 'Offline',
  `vip` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estudante`
--

INSERT INTO `estudante` (`id_estudante`, `nome`, `sobrenome`, `email`, `senha`, `question`, `cidade`, `frase`, `foto`, `active`, `log_in`, `vip`) VALUES
(1, 'André', 'Moura', 'mouraandre2500@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Lucas', 'Guaratinguetá', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'andrePerfil.jpg', 1, 'Online', 1),
(3, 'Matheus', 'Evergard', 'matheus@breakneckpizza.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Astolfo', 'Guaratinguetá', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'jasonpic.jpg', 1, 'Offline', 0),
(4, 'Maria', 'Hill', 'agente@marvel.com', 'e21fc56c1a272b630e0d1439079d0598cf8b8329', 'Coulson', 'São José dos Campos', NULL, 'susannahpic.jpg', 1, 'Offline', 0),
(5, 'Clint', 'Barton', 'gaviao@arrow&bow.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Tulipa', 'São José dos Campos', NULL, NULL, 1, 'Offline', 0),
(6, 'Eduardo', 'Pereira', 'augusto.pereira@protonmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'andre', 'Guaratinguetá', NULL, NULL, 1, 'Offline', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orientador`
--

CREATE TABLE `orientador` (
  `id_orientador` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `question` varchar(50) NOT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `profissao_ori` varchar(45) DEFAULT NULL,
  `frase` varchar(200) DEFAULT NULL,
  `trabalho_atual` varchar(50) DEFAULT NULL,
  `descricao` text,
  `linkedln` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `youtube` varchar(200) DEFAULT NULL,
  `github` varchar(200) DEFAULT NULL,
  `foto` varchar(40) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `log_in` varchar(7) NOT NULL DEFAULT 'Offline',
  `vip` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orientador`
--

INSERT INTO `orientador` (`id_orientador`, `nome`, `sobrenome`, `email`, `senha`, `question`, `cidade`, `profissao_ori`, `frase`, `trabalho_atual`, `descricao`, `linkedln`, `twitter`, `youtube`, `github`, `foto`, `active`, `log_in`, `vip`) VALUES
(1, 'Steve', 'Rogers', 'capitaoamerica@marvel.com', '8fb09d058e0b38ea8945eb23037aeb63069284ba', '', 'São Paulo', 'Analista de Segurança', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Trabalho Atual: IBM', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'http://meulinknolinkedln', '', '', '', 'johanpic.jpg', 1, 'Offline', 0),
(2, 'Tony', 'Stark', 'augusto.pereira@protonmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '', 'São Paulo', 'Desenvolvedor Senior', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Indústrias Stark', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur.\\r\\n\\r\\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.\\r\\n\\r\\nObrigado por ler!', 'http://linkdin.com', 'http://twitter.com', 'http://youtube.com', 'http://github.com', 'Tony_Stark.jpg', 1, 'Offline', 0),
(3, 'Thor', 'Odinson', 'ragnarok@marvel.com', '14051859736dd70525af7cbbbadfb687c175ca12', '', 'Lorena', 'Programador WEB', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Dell', '', '', NULL, NULL, NULL, 'thor.jpg', 1, 'Offline', 0),
(4, 'Carol', 'Danvers', 'capita@gmail.com', '6e0d250280dc6f85df8b41d16fbec85ed58017d6', '', 'Taubaté', 'Analista de Banco', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Google', '', '', NULL, NULL, NULL, 'dierdrepic.jpg', 1, 'Offline', 0),
(5, 'Peter', 'Parker', 'aranha@net.com', '3e8ea8a915fa7dce3346b94f1261dd8b29d84805', '', 'Guaratinguetá', 'Analista de redes', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Parker', 'Sou o homem aranha!', '', NULL, NULL, NULL, 'andrePerfil.jpg', 1, 'Offline', 0),
(6, 'Bruce', 'Banner', 'hulk@smash.com', 'c829575cb9bdd27191cb3377c4f2e1794d6dd236', '', 'Lorena', 'Programador WEB', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Google', '', '', NULL, NULL, NULL, 't1.jpg', 1, 'Offline', 0),
(7, 'Wanda', 'Maximoff', 'feiticeira@escarlate.com', 'd65aabb13754fce42ebcd0f861528b1636b08d1a', '', 'Guaratinguetá', 'Administrador de Banco', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Sandisk', '', '', NULL, NULL, NULL, 'susannahpic.jpg', 1, 'Offline', 0),
(8, 'Ethel', 'Pym', 'formiga@bug.com', '60427db7b982fb742964b5a63c93eaf6d23dea4f', '', 'Aparecida', 'Desenvolvedor Mobile', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'IBM', 'Proin nonummy, lacus eget pulvinar lacinia, pede felis dignissim leo, vitae tristique magna lacus sit amet eros. Nullam ornare. Praesent odio ligula, dapibus sed, tincidunt eget, dictum ac, nibh. Nam quis lacus. Nunc eleifend molestie velit. Morbi lobortis quam eu velit. Donec euismod vestibulum massa. Donec non lectus. Aliquam commodo lacus sit amet nulla. Cras dignissim elit et augue. Nullam non diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In hac habitasse platea dictumst. Aenean vestibulum. Sed lobortis elit quis lectus. Nunc sed lacus at augue bibendum dapibus.\r\n\r\nFusce convallis, mauris imperdiet gravida bibendum, nisl turpis suscipit mauris, sed placerat ipsum urna sed risus. In convallis tellus a mauris. Curabitur non elit ut libero tristique sodales. Mauris a lacus. Donec mattis semper leo. In hac habitasse platea dictumst. Vivamus facilisis diam at odio. Mauris dictum, nisi eget consequat elementum, lacus ligula molestie metus, non feugiat orci magna ac sem. Donec turpis. Donec vitae metus. Morbi tristique neque eu mauris. Quisque gravida ipsum non sapien. Proin turpis lacus, scelerisque vitae, elementum at, lobortis ac, quam. Aliquam dictum eleifend risus. In hac habitasse platea dictumst. Etiam sit amet diam. Suspendisse odio. Suspendisse nunc. In semper bibendum libero.\r\n\r\nCurabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://linkdln.com', 'http://twitter', 'http://youtube', 'http://github', 'ethelpic.jpg', 1, 'Offline', 0),
(9, 'T\'', 'Challa', 'pantera@black.com', '032ae6fb38dbd72a84c55f56b498f5cb480d51fd', '', '', 'Analista de Big Data', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Challa', '', '', NULL, NULL, NULL, 'jasonpic.jpg', 1, 'Offline', 0),
(10, 'Scott', 'Summers', 'ciclope@xmen.com', 'c2579f105da49d2e178f2b3ca44ed7dda0fb633b', '', 'Guaratinguetá', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(11, 'Clint', 'Barton', 'gaviao@arqueiro.com', '39d26bed83e0e6a52537ec07590c78637a6c7ffe', '', 'Guaratinguetá', 'Designer', 'vksjdbdkjbvdjksvbs djkbjksdjksdnjksdbcdksjb dcdcbsdjkbcsdjkc bsdcsdbjksdbcsdbc djkcbsdjkb cdsjkbcsdkjbcdsbcdkbckdjbds', 'Oracle', 'Estrategista e preciso em seus objetivos.', '', NULL, NULL, NULL, 't3.jpg', 1, 'Offline', 0),
(12, 'Nicy', 'Fury', 'diretorshield.com', 'a381c49be4281e966501440a58ef30914abc4b37', '', 'São Paulo', 'Chefe de TI', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Fury', '', '', NULL, NULL, NULL, 'alexpic.jpg', 1, 'Offline', 0),
(13, 'Natasha', 'Romanoff', 'viuva@negra.com', '3d09ba44760d450f0971fb182d8911721f6e01fa', 'Kevin', 'São Paulo', 'Hacker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Facebook', '', 'http://lkd.fghrtsj', '', '', 'http://mygythub.baby', 'rubypic.jpg', 1, 'Offline', 0),
(14, 'Bucky', 'Barnes', 'soldado@invernal.com', '18d44db7dbff3a3598b37c767f63212a9d30cd24', 'Steve', 'Guaratinguetá', 'Analista de Banco de Dados', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Oracle', '', '', '', '', '', NULL, 1, 'Offline', 0),
(15, 'Pepper', 'Potts', 'resgate@iron.com', 'c01c85ae08ff5c254a17f19eeaa8742337d7949d', 'John', 'São Paulo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(16, 'Valquíria', 'Brunnhilde', 'andremoura2500@gmail.com', '42a20484ea5a250f9bfe24a1a25db6ff795b384c', 'Pegaso', 'Taubaté', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', '', '', '', '', '', '', 'sidneypic.jpg', 1, 'Offline', 0),
(17, 'Scott', 'Lang', 'homem@formiga.com', '6f94b81caba75c48259156463ca97840424e4eed', 'Peter', 'Aparecida', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(18, 'Sam', 'Wilson', 'falcao@marvel.com', '5e6d5ce9d1ea4e9b579501f0dc000350b79743b8', 'Gregory', 'Guaratinguetá', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(19, 'Stephen', 'Strange', 'doutor@estranho.com', 'f9172720433decd32669c5b47ebffea4208e4253', 'Alberto', 'São José dos Campos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(20, 'Peter', 'Quill', 'lord@stars.com', '0cb26e2242f1e2f5cbbc8204af141dee67d5fa79', 'Jason', 'Taubaté', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(21, 'Gamora', 'Titan', 'gamora@marvel.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'John', 'Lorena', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(22, 'Rocket', 'Raccoon', 'guaxinim@rocket.com', '4e38bf3ea345a0e71ba6226827a818a974a7ce71', 'Ted', 'Guaratinguetá', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(23, 'Groot', 'Flora', 'grooooot@guardiao.com', 'a0745ef751b4a2916ab1e10e3029f374c98e75f1', 'Reiner', 'São José dos Campos', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'Offline', 0),
(24, 'Arthur', 'Douglas', 'drax@destruidor.com', '9028b85a2f000de528ab8621371f912423d5e3ad', 'Freddy', 'Guaratinguetá', 'Desnvolvedor WEB', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'Facebook', '', '', '', '', '', NULL, 1, 'Offline', 0),
(25, 'Odin', 'Borson', 'odin@asgard.com', 'a12bf2c17c422acccb707fa811f07e743a9293d8', 'Caos', 'Guaratinguetá', 'Professor', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut dolore magna aliqua.', 'ETEC', '', '', '', '', '', 'odin.jpg', 1, 'Offline', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_seguidor`
--

CREATE TABLE `perfil_seguidor` (
  `id_perfil_seguidor` int(11) NOT NULL,
  `id_perfil_estudante` int(11) DEFAULT NULL,
  `id_perfil_orientador` int(11) DEFAULT NULL,
  `id_orientador` int(11) DEFAULT NULL,
  `resposta` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil_seguidor`
--

INSERT INTO `perfil_seguidor` (`id_perfil_seguidor`, `id_perfil_estudante`, `id_perfil_orientador`, `id_orientador`, `resposta`) VALUES
(1, NULL, 2, 4, 1),
(2, NULL, 2, 9, 1),
(3, NULL, 2, 7, 1),
(4, NULL, 11, 1, 1),
(5, NULL, 11, 6, 1),
(6, NULL, 11, 10, 1),
(7, NULL, 11, 8, 0),
(8, NULL, 11, 12, 0),
(9, 1, NULL, 1, 1),
(10, 1, NULL, 7, 1),
(11, 1, NULL, 2, 1),
(12, NULL, 4, 2, 1),
(13, NULL, 1, 3, 1),
(14, NULL, 4, 3, 1),
(15, NULL, 4, 10, 1),
(16, NULL, 4, 12, 1),
(17, NULL, 4, 7, 1),
(18, NULL, 1, 7, 1),
(19, NULL, 8, 2, 1),
(20, NULL, 5, 2, 1),
(21, NULL, 5, 6, 1),
(22, NULL, 7, 6, 0),
(23, NULL, 7, 24, 1),
(24, 6, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(1, 'André Moura', 'Steve Rogers', 'Olá Capitão', 'unread', '2019-06-19 07:39:57'),
(2, 'André Moura', 'Steve Rogers', 'cade minha mensagem?', 'unread', '2019-06-19 08:21:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artigo`
--
ALTER TABLE `artigo`
  ADD PRIMARY KEY (`id_artigo`);

--
-- Indexes for table `biografia`
--
ALTER TABLE `biografia`
  ADD PRIMARY KEY (`id_biografia`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `categoria_artigo`
--
ALTER TABLE `categoria_artigo`
  ADD PRIMARY KEY (`id_categoria_artigo`),
  ADD KEY `fk_categoria` (`id_categoria`),
  ADD KEY `fk_artigo` (`id_artigo`);

--
-- Indexes for table `categoria_orientador`
--
ALTER TABLE `categoria_orientador`
  ADD PRIMARY KEY (`id_categoria_orientador`),
  ADD KEY `fk_orientador_has_categoria_categoria1` (`id_categoria`),
  ADD KEY `orientador_id_orientador` (`id_orientador`,`id_categoria`) USING BTREE;

--
-- Indexes for table `classificacao_orientador`
--
ALTER TABLE `classificacao_orientador`
  ADD PRIMARY KEY (`id_class_ori`),
  ADD KEY `fk_class_est` (`id_estudante`),
  ADD KEY `fk_class_ori` (`id_orientador`),
  ADD KEY `fk_rating_ori` (`id_ori_rating`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_artigo` (`id_artigo`),
  ADD KEY `fk_id_estudante` (`id_estudante`),
  ADD KEY `fk_id_orientador` (`id_orientador`);

--
-- Indexes for table `estudante`
--
ALTER TABLE `estudante`
  ADD PRIMARY KEY (`id_estudante`);

--
-- Indexes for table `orientador`
--
ALTER TABLE `orientador`
  ADD PRIMARY KEY (`id_orientador`);

--
-- Indexes for table `perfil_seguidor`
--
ALTER TABLE `perfil_seguidor`
  ADD PRIMARY KEY (`id_perfil_seguidor`),
  ADD KEY `id_perfil_estudante` (`id_perfil_estudante`),
  ADD KEY `id_perfil_orientador` (`id_perfil_orientador`),
  ADD KEY `id_orientador` (`id_orientador`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artigo`
--
ALTER TABLE `artigo`
  MODIFY `id_artigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `biografia`
--
ALTER TABLE `biografia`
  MODIFY `id_biografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `categoria_artigo`
--
ALTER TABLE `categoria_artigo`
  MODIFY `id_categoria_artigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=552;

--
-- AUTO_INCREMENT for table `categoria_orientador`
--
ALTER TABLE `categoria_orientador`
  MODIFY `id_categoria_orientador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;

--
-- AUTO_INCREMENT for table `classificacao_orientador`
--
ALTER TABLE `classificacao_orientador`
  MODIFY `id_class_ori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `estudante`
--
ALTER TABLE `estudante`
  MODIFY `id_estudante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orientador`
--
ALTER TABLE `orientador`
  MODIFY `id_orientador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `perfil_seguidor`
--
ALTER TABLE `perfil_seguidor`
  MODIFY `id_perfil_seguidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categoria_artigo`
--
ALTER TABLE `categoria_artigo`
  ADD CONSTRAINT `fk_artigo` FOREIGN KEY (`id_artigo`) REFERENCES `artigo` (`id_artigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `categoria_orientador`
--
ALTER TABLE `categoria_orientador`
  ADD CONSTRAINT `fk_orientador_has_categoria_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orientador_has_categoria_orientador` FOREIGN KEY (`id_orientador`) REFERENCES `orientador` (`id_orientador`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `classificacao_orientador`
--
ALTER TABLE `classificacao_orientador`
  ADD CONSTRAINT `fk_class_est` FOREIGN KEY (`id_estudante`) REFERENCES `estudante` (`id_estudante`),
  ADD CONSTRAINT `fk_class_ori` FOREIGN KEY (`id_orientador`) REFERENCES `orientador` (`id_orientador`),
  ADD CONSTRAINT `fk_rating_ori` FOREIGN KEY (`id_ori_rating`) REFERENCES `orientador` (`id_orientador`);

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_id_artigo` FOREIGN KEY (`id_artigo`) REFERENCES `artigo` (`id_artigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_estudante` FOREIGN KEY (`id_estudante`) REFERENCES `estudante` (`id_estudante`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_orientador` FOREIGN KEY (`id_orientador`) REFERENCES `orientador` (`id_orientador`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `perfil_seguidor`
--
ALTER TABLE `perfil_seguidor`
  ADD CONSTRAINT `fk_perfil_estudante` FOREIGN KEY (`id_perfil_estudante`) REFERENCES `estudante` (`id_estudante`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_perfil_orientador` FOREIGN KEY (`id_perfil_orientador`) REFERENCES `orientador` (`id_orientador`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreignkey_id_orientador` FOREIGN KEY (`id_orientador`) REFERENCES `orientador` (`id_orientador`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
