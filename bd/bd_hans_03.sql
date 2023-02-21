-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Jan-2023 às 21:13
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_hans`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `id_pac` varchar(30) NOT NULL,
  `local` varchar(200) NOT NULL,
  `data` datetime NOT NULL,
  `resumo` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `comentario` varchar(500) DEFAULT NULL,
  `exame` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id_pac`, `local`, `data`, `resumo`, `status`, `comentario`, `exame`, `id`, `id_usuario`) VALUES
('38684576512', '/hanseniase/application/views/acompanhamento/historico', '2023-01-03 14:49:00', '', '', '                                   \n                                    ', 'endogena', 36, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico', '2023-01-03 14:49:02', '', '', '                                   \n                                    ', 'exogena', 37, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico', '2023-01-03 14:49:04', '', '', '                                   \n                                    ', 'termica', 38, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico', '2023-01-03 14:49:07', '', '', '                                   \n                                    ', 'dolorosa', 39, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico', '2023-01-03 14:49:09', '', '', '                                   \n                                    ', 'tatil', 40, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico', '2023-01-03 14:49:11', '', '', '                                   \n                                    ', 'sudoral', 41, 0),
('F01254862', '/hanseniase/application/views/acompanhamento/historico', '2023-01-03 14:49:28', '', '', '                                   \n                                    ', 'tatil', 42, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico/', '2023-01-03 14:57:12', '', '', '                                   \n                                    ', 'endogena', 43, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico/38684576512', '2023-01-03 14:57:52', '', '', '                                   \n                                    ', 'endogena', 44, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico/38684576512', '2023-01-03 15:36:19', '', '', '                                   \n                                    ', 'endogena', 45, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico/38684576512', '2023-01-03 15:36:44', '', '', '                                   \n                                    ', 'endogena', 46, 0),
('38684576512', '/hanseniase/application/views/acompanhamento/historico/38684576512', '2023-01-03 15:38:04', '', '', '                                   \n                                    ', 'sudoral', 47, 57);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imgs`
--

DROP TABLE IF EXISTS `imgs`;
CREATE TABLE IF NOT EXISTS `imgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `area` varchar(11) NOT NULL,
  `topico` varchar(100) DEFAULT NULL,
  `metodo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imgs`
--

INSERT INTO `imgs` (`id`, `local`, `nome`, `descricao`, `area`, `topico`, `metodo`) VALUES
(1, '/hanseniase/application/views/diagnostico/textos/histamina/img_endo.jpg', 'Fig 3', 'B1) Incompleta: Imediatamente após riscos lineares e contínuos, observa-se eritema tênue, tornando a mancha hansênica mais desenhada e evidente (setas); <br>\nB2) Após 30-60 segundos, observa-se eritema reflexo mais intenso e delimitando melhor a mancha hansênica (setas); <br>\nB3) Sinal do dermografismo – pápula (*) após 3-5 minutos dos riscos, mantendo ainda o eritema reflexo em torno da mancha hansênica; <br>\nB4) Completa: Resposta completa demonstrada pelo eritema linear (0,5 a 1cm laterais ao risco) sobre as manchas hipocrômicas cicatriciais semelhantes às áreas normais;<br><br>\nFontes: Prof. Dr. Marco Andrey Cipriani Frade.', 'histamina', 'Teste', 'endogena'),
(2, '/hanseniase/application/views/diagnostico/textos/histamina/img_exo_1.jpg', 'Fig 1', 'COMPLETA com eritema ao redor da pápula na pele normal à esquerda (Triangulo) e INCOMPLETA devido a ausência de eritema na mancha à direita;<br><br>\nFontes: Instituto Lauro Souza Lima. \n', 'histamina', 'Teste', 'exogena'),
(3, '/hanseniase/application/views/diagnostico/textos/histamina/img_exo_2.jpg', 'Fig 2', 'COMPLETA com eritema intenso na região do abdome nas áreas de lesões de nevos congênitos acrômicos (losangulo) e pele normal (triangulo), enquanto INCOMPLETA na região do braço (setas) com ausência de eritema sobre área hipocrômica hansênica.<br><br>\nFontes: Prof. Dr. Marco Andrey Cipriani Frade.', 'histamina', 'Teste', 'exogena'),
(4, '/hanseniase/application/views/hanseniase/tipos/indeterminada.jpg', 'Fig 1 – Manifestações de hanseníase indeterminada', 'Manchas brancas lisas, mal delimitadas, que não coçam, não ardem, não queimam, não doem, não desaparecem, “não pegam poeira” por não suar na respectiva área, e tem diminuição de sensibilidade. Não há comprometimento de troncos nervosos nem grau de incapacidade.<br><br>\r\nFonte: Instituto Lauro Souza Lima.', 'hanseniase', NULL, 'Indeterminada'),
(5, '/hanseniase/application/views/hanseniase/tipos/tuberculoide_1.jpg', 'Fig 2 – Manifestações de hanseníase tuberculóide', 'Criança com lesão anular bem delimitada\r\ne totalmente anestésica.<br><br>\r\nFonte: Instituto Lauro Souza Lima.', 'hanseniase', NULL, 'tuberculoide'),
(6, '/hanseniase/application/views/hanseniase/tipos/tuberculoide_2.jpg', 'Fig 3 – Manifestações de hanseníase tuberculóide', 'Adulto com necrose inflamatória (abscesso) de parte do nervo\r\nmediano, causando hipoestesia e atrofia de músculo da mão.', 'hanseniase', NULL, 'tuberculoide'),
(7, '/hanseniase/application/views/hanseniase/tipos/dimorfa_1.jpg', 'Fig 4 – Manifestações d e hanseníase dimorfa', 'Lesão avermelhada elevada, mal delimitada, com centro irregular e “esburacado”, anestésica (perda total da sensibilidade) ou hipoestésica (perda parcial da sensibilidade).\r\n<br><br>Fontes: Fotos a, b e c: Instituto Lauro Souza Lima. Foto d: Prof. Dr. Marco Andrey Cipriani Frade', 'hanseniase', NULL, 'dimorfa'),
(8, '/hanseniase/application/views/hanseniase/tipos/dimorfa_2.jpg', 'Fig 5 – Manifestações d e hanseníase dimorfa', 'Presença de espessamento do nervo fibular superficial na região anterolateral da perna, no terço inferior.\r\n<br><br>Fontes: Fotos a, b e c: Instituto Lauro Souza Lima. Foto d: Prof. Dr. Marco Andrey Cipriani Frade', 'hanseniase', NULL, 'dimorfa'),
(9, '/hanseniase/application/views/hanseniase/tipos/dimorfa_3.jpg', 'Fig 6 – Manifestações d e hanseníase dimorfa', 'Várias lesões elevadas bem delimitadas,avermelhadas nas bordas e com centro branco, com perda total da sensibilidade.\r\n<br><br>Fontes: Fotos a, b e c: Instituto Lauro Souza Lima. Foto d: Prof. Dr. Marco Andrey Cipriani Frade', 'hanseniase', NULL, 'dimorfa'),
(10, '/hanseniase/application/views/hanseniase/tipos/dimorfa_4.jpg', 'Fig 7 – Manifestações d e hanseníase dimorfa', 'Múltiplas manchas hipocrômicas, com bordas imprecisas, sensibilidade e sudorese diminuídas e/ou ausentes.\r\n<br><br>Fontes: Fotos a, b e c: Instituto Lauro Souza Lima. Foto d: Prof. Dr. Marco Andrey Cipriani Frade', 'hanseniase', NULL, 'dimorfa'),
(11, '/hanseniase/application/views/hanseniase/tipos/virchowiana_1.jpg', 'Fig 8 – Tipos de manifestação de hanseníase virchowiana', 'Face infiltrada, presença de múltiplos hansenomas\r\n(pápulas), assimetria de sobrancelhas (lesão parcial\r\ndo nervo facial esquerdo) e rarefação dos pelos das\r\nlaterais das sobrancelhas (madarose parcial).\r\n<br>Fontes: Foto a: Prof. Dr. Marco Andrey Cipriani Frade. Fotos b, c e d: Instituto Lauro Souza Lima.', 'hanseniase', NULL, 'virchowiana'),
(12, '/hanseniase/application/views/hanseniase/tipos/virchowiana_2.jpg', 'Fig 9 – Tipos de manifestação de hanseníase virchowiana', 'Falta de sobrancelhas e cílios, osso do nariz alargado e\r\nachatado, obstrução nasal.\r\n<br>Fontes: Foto a: Prof. Dr. Marco Andrey Cipriani Frade. Fotos b, c e d: Instituto Lauro Souza Lima.', 'hanseniase', NULL, 'virchowiana'),
(13, '/hanseniase/application/views/hanseniase/tipos/virchowiana_3.jpg', 'Fig 10 – Tipos de manifestação de hanseníase virchowiana', 'Pele lisa, sem pelos, seca, quase totalmente avermelhada e inchada (menos no meio da coluna lombar),\r\ncom vasinhos visíveis; não há manchas.\r\n<br>Fontes: Foto a: Prof. Dr. Marco Andrey Cipriani Frade. Fotos b, c e d: Instituto Lauro Souza Lima.', 'hanseniase', NULL, 'virchowiana'),
(14, '/hanseniase/application/views/hanseniase/tipos/virchowiana_4.jpg', 'Fig 11 – Tipos de manifestação de hanseníase virchowiana', 'Caroços duros nas coxas, que não doem e não coçam,\r\nalguns ulcerados, de vários meses de duração; note\r\nque ainda há pelos.\r\n<br>Fontes: Foto a: Prof. Dr. Marco Andrey Cipriani Frade. Fotos b, c e d: Instituto Lauro Souza Lima.', 'hanseniase', NULL, 'virchowiana'),
(15, '/hanseniase/application/views/hanseniase/historia/transmissao_1.jpg', 'Fig 1 - Fotos de uma criança com hanseníase.', 'Criança na fase inicial da doença, e sua evolução lenta e progressiva ao longo dos anos.\r\nFonte: Banco de imagens do Instituto Lauro de Souza Lima, Bauru, SP.', 'historia', 'transmissao', NULL),
(16, '/hanseniase/application/views/hanseniase/historia/tratamento_1.jpg', 'Fig 2 – Cartelas de Poliquimioterapia', 'À direita, esquema para pacientes adultos multibacilares (MB) e à esquerda esquema para pacientes paucibacilares (PB).\r\n<br>Fonte: Coordenação-Geral de Hanseníase e Doenças em Eliminação – CGHDE/DEVIT/SVS/MS.', 'historia', 'tratamento', NULL),
(17, '/hanseniase/application/views/diagnostico/sudoral/sudoral_1.jpg', 'Fig 1 - Área extensa de anidrose (setas) circunscrita por áreas de normoidrose.', 'Fonte: Prof. Dr. Marco Andrey Cipriani Frade.', 'sudoral', NULL, NULL),
(18, '/hanseniase/application/views/diagnostico/sudoral/sudoral_2.jpg', 'Fig 2 - Área de anidrose (seta) coincidente à área de hipocromia e sudorese profusa periférica. ', 'Fonte: Prof. Dr. Marco Andrey Cipriani Frade.', 'sudoral', NULL, NULL),
(19, '/hanseniase/application/views/diagnostico/dolorosa/dolorosa_1.jpg', 'Fig 1 ', 'Encoste a ponta da agulha (Foto a) e o plástico (Foto b), e pergunte ao paciente se ele sente a diferença.<br>\r\nFonte: Banco de imagens do Instituto Lauro de Souza Lima', 'dolorosa', 'introducao', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `data` date DEFAULT NULL,
  `cod` varchar(50) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `data`, `cod`, `id_usuario`, `data_nasc`) VALUES
(1, 'João Paulo', '2022-12-01', '38684576512', 57, NULL),
(2, 'Pedro Luiz', '2022-12-14', 'F01254862', 57, NULL),
(3, 'antonio luiz', '2023-01-03', '212021f022f12', 57, '0000-00-00'),
(4, 'hghghgh', '2023-01-03', 'hghghgh', 57, '2023-01-19'),
(5, 'kkkkk', '2023-01-03', 'ffffff', 57, '0000-00-00'),
(6, 'jjjj', '2023-01-03', 'hello', 57, '2023-01-31'),
(7, 'joão', '2023-01-03', 'hhhhh', 57, '0000-00-00'),
(8, 'kkkkk', NULL, 'jjjjjj', NULL, '0000-00-00'),
(9, 'kkkkk', NULL, '14141414', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `textos`
--

DROP TABLE IF EXISTS `textos`;
CREATE TABLE IF NOT EXISTS `textos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(10000) NOT NULL,
  `area` varchar(11) NOT NULL,
  `topico` varchar(11) DEFAULT NULL,
  `metodo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `textos`
--

INSERT INTO `textos` (`id`, `texto`, `area`, `topico`, `metodo`) VALUES
(1, 'A prova de histamina endógena também permite avaliar a função vascular por meio da liberação de histamina endógena, sendo mais acessivel, simples e de facil execução que a prova de histamina exogena. ', 'histamina', 'Introducao', 'endogena'),
(2, 'Consiste em traçar uma reta na pele do paciente utilizando-se de um instrumento rombo (tampa de caneta esferográfica, cotonete, chave, etc). \r\n\r\nO traçado deve ser aplicado com moderada força e de maneira contínua, iniciando na região supostamente normal superior, passando pela área de lesão e terminando distalmente sobre área de normalidade. \r\n\r\nDeve-se ficar atento às mesmas fases descritas na prova de histamina exogena, esperando-se um eritema reflexo linear e homogêneo de 0,5 a 1cm de largura junto ao traço. \r\n\r\n', 'histamina', 'Teste', 'endogena'),
(3, 'Nas lesões de hanseníase, esse eritema não acontece internamente e as manchas se tornam mais definidas em contraste ao eritema externo intenso nas áreas periféricas normais.', 'histamina', 'Conclusao', 'endogena'),
(4, 'A prova de histamina exógena consiste numa prova funcional para avaliar a resposta vasorreflexa à droga, indicando integridade e viabilidade do sistema nervoso autonômico de dilatar os vasos cutâneos superficiais, o que resulta no eritema. <br>Quando disponível, a prova de histamina exógena aplica-se ao diagnóstico de hanseníase e aos diagnósticos diferenciais em lesões hipocrômicas.\n', 'histamina', 'Introducao', 'exogena'),
(5, 'Como resposta ao difosfato de histamina 1,5%, em áreas normais, são esperados três sinais típicos que caracterizam a tríplice reação de Lewis:<br><br>\n\n1. Sinal da punctura: lesões puntiformes avermelhadas que surgem quase que imediato (até 15 segundos) à escarificação por agulha de insulina dentro da gota aplicada sobre a área hipocrômica;<br>\n\n2. Eritema reflexo: eritema que atinge de 2 a 8cm ao redor da área com limites fenestrados percebido a partir de 30 a 60 segundos após a escarificação;<br>\n\n3. Pápula: caracteriza-se por lesão intumecida lenticular que surge após 2 a 3 minutos no local da punctura/escarificação.<br><br>\n\nO teste deve ser feito também em uma área de pele não comprometida, para controle positivo, onde a prova deve ser completa (observa-se as 3 fases descritas anteriormente)\n', 'histamina', 'Teste', 'exogena'),
(6, 'Se não ocorrer o eritema, não sendo uma lesão de nascença (nervo anêmico), ou se o paciente não estiver utilizando antialérgicos, essa ocorrência (prova da histamina incompleta) é altamente sugestiva de hanseníase. \n<br>\nNo entanto, com a falta de produção industrial e, consequentemente, escassez de histamina exógena, o teste da histamina endógena tem sua aplicação bastante reconhecida, pois também permite avaliar a função vascular por meio da liberação de histamina endógena. \n', 'histamina', 'Conclusao', 'exogena'),
(7, 'Todos os pacientes passam por essa fase no início da doença. Entretanto, ela\r\npode ser ou não perceptível. Geralmente afeta crianças abaixo de 10 anos, ou mais\r\nraramente adolescentes e adultos que foram contatos de pacientes com hanseníase. A\r\nfonte de infecção, normalmente um paciente com hanseníase multibacilar não diagnosticado, ainda convive com o doente, devido ao pouco tempo de doença.<br>\r\nA lesão de pele geralmente é única, mais clara do que a pele ao redor (mancha),\r\nnão é elevada (sem alteração de relevo), apresenta bordas mal delimitadas, e é seca\r\n(“não pega poeira” – uma vez que não ocorre sudorese na respectiva área). Há perda\r\nda sensibilidade (hipoestesia ou anestesia) térmica e/ou dolorosa, mas a tátil (habilidade de sentir o toque) geralmente é preservada. A prova da histamina é incompleta na\r\nlesão, a biópsia de pele frequentemente não confirma o diagnóstico e a baciloscopia é\r\nnegativa. Portanto, os exames laboratoriais negativos não afastam o diagnóstico clínico. Atenção deve ser dada aos casos com manchas hipocrômicas grandes e dispersas,\r\nocorrendo em mais de um membro, ou seja, lesões muito distantes, pois pode se tratar de um caso de hanseníase dimorfa macular (forma multibacilar); nesses casos, é\r\ncomum o paciente queixar-se de formigamentos nos pés e mãos, e/ou câimbras, e na\r\npalpação dos nervos frequentemente se observa espessamentos. ', 'hanseniase', NULL, 'indeterminada'),
(8, 'É a forma da doença em que o sistema imune da pessoa consegue destruir os bacilos espontaneamente. Assim como na hanseníase indeterminada, a doença também\r\npode acometer crianças (o que não descarta a possibilidade de se encontrar adultos\r\ndoentes), tem um tempo de incubação de cerca de cinco anos, e pode se manifestar até\r\nem crianças de colo, onde a lesão de pele é um nódulo totalmente anestésico na face ou\r\ntronco (hanseníase nodular da infância).<br>\r\nMais frequentemente, manifesta-se por uma placa (mancha elevada em relação à\r\npele adjacente) totalmente anestésica ou por placa com bordas elevadas, bem delimitadas e centro claro (forma de anel ou círculo). Com menor frequência, pode se apresentar como um único nervo espessado com perda total de sensibilidade no seu território\r\nde inervação. Nesses casos, a baciloscopia é negativa e a biópsia de pele quase sempre\r\nnão demonstra bacilos, e nem confirma sozinha o diagnóstico. Sempre será necessário\r\nfazer correlação clínica com o resultado da baciloscopia e/ou biópsia, quando for imperiosa a realização desses exames. Os exames subsidiários raramente são necessários\r\npara o diagnóstico, pois sempre há perda total de sensibilidade, associada ou não à\r\nalteração de função motora, porém de forma localizada.', 'hanseniase', NULL, 'tuberculoide'),
(9, 'Caracteriza-se, geralmente, por mostrar várias manchas de pele avermelhadas ou\r\nesbranquiçadas, com bordas elevadas, mal delimitadas na periferia, ou por múltiplas\r\nlesões bem delimitadas semelhantes à lesão tuberculóide, porém a borda externa é esmaecida (pouco definida). Há perda parcial a total da sensibilidade, com diminuição de\r\nfunções autonômicas (sudorese e vasorreflexia à histamina). É comum haver comprometimento assimétrico de nervos periféricos, as vezes visíveis ao exame clínico, cujos\r\nrespectivos locais e técnicas de palpação, funções e consequências do dano estão descritos no Quadro 1 no item 4.1. É a forma mais comum de apresentação da doença (mais\r\nde 70% dos casos). Ocorre, normalmente, após um longo período de incubação (cerca\r\nde 10 anos ou mais), devido à lenta multiplicação do bacilo (que ocorre a cada 14 dias,\r\nem média).<br>\r\nA baciloscopia da borda infiltrada das lesões (e não dos lóbulos das orelhas e cotovelos), quando bem coletada e corada, é frequentemente positiva, exceto em casos raros\r\nem que a doença está confinada aos nervos. Todavia, quando o paciente é bem avaliado\r\nclinicamente, os exames laboratoriais quase sempre são desnecessários. Esta forma da\r\ndoença também pode aparecer rapidamente, podendo ou não estar associada à intensa\r\ndor nos nervos, embora estes sintomas ocorram mais comumente após o início do tratamento ou mesmo após seu término (reações imunológicas em resposta ao tratamento).', 'hanseniase', NULL, 'dimorfa'),
(10, 'É a forma mais contagiosa da doença. O paciente virchowiano não apresenta\r\nmanchas visíveis; a pele apresenta-se avermelhada, seca, infiltrada, cujos poros apresentam-se dilatados (aspecto de “casca de laranja”), poupando geralmente couro cabeludo, axilas e o meio da coluna lombar (áreas quentes).<br>\r\nNa evolução da doença, é comum aparecerem caroços (pápulas e nódulos) escuros, endurecidos e assintomáticos (hansenomas). Quando a doença encontra-se em\r\nestágio mais avançado, pode haver perda parcial a total das sobrancelhas (madarose) e\r\ntambém dos cílios, além de outros pelos, exceto os do couro cabeludo. A face costuma\r\nser lisa (sem rugas) devido a infiltração, o nariz é congesto, os pés e mãos arroxeados\r\ne edemaciados, a pele e os olhos secos. O suor está diminuído ou ausente de forma\r\ngeneralizada, porém é mais intenso nas áreas ainda poupadas pela doença, como o\r\ncouro cabeludo e as axilas.<br>\r\nSão comuns as queixas de câimbras e formigamentos nas mãos e pés, que entretanto apresentam-se aparentemente normais. “Dor nas juntas” (articulações) também são comuns e, frequentemente, o paciente tem o diagnóstico clínico e laboratorial\r\nequivocado de “reumatismo” (artralgias ou artrites), “problemas de circulação ou de\r\ncoluna”. Os exames reumatológicos frequentemente resultam positivos, como FAN,\r\nFR, assim como exame para sífilis (VDRL). É importante ter atenção aos casos de\r\npacientes jovens com hanseníase virchowiana que manifestam dor testicular devido a\r\norquites. Em idosos do sexo masculino, é comum haver comprometimento dos testículos, levando à azospermia (infertilidade), ginecomastia (crescimento das mamas) e\r\nimpotência.<br>\r\nOs nervos periféricos e seus ramos superficiais estão simetricamente espessados,\r\no que dificulta a comparação. Por isso, é importante avaliar e buscar alterações de\r\nsensibilidade térmica, dolorosa e tátil no território desses nervos (facial, ulnar, fibular,\r\ntibial), e em áreas frias do corpo, como cotovelos, joelhos, nádegas e pernas.\r\nNa hanseníase virchowiana o diagnóstico pode ser confirmado facilmente pela\r\nbaciloscopia dos lóbulos das orelhas e cotovelos.', 'hanseniase', NULL, 'virchowiana'),
(11, 'A Hanseníase é uma doença infectocontagiosa crônica cujos registros existem desde os tempos mais primórdios da sociedade, por volta de 4300 anos a.C na África e Oriente médio. A hanseníase é causada pelo Mycobacterium leprae (ou bacilo de Hansen), um bacilo que infecta os nervos periféricos e, mais especificamente, as células de Schwann. A doença acomete principalmente os nervos superficiais da pele e troncos nervosos periféricos (localizados na face, pescoço, terço médio do braço e abaixo do cotovelo e dos joelhos), mas também pode afetar os olhos e órgãos internos. (Ministério da Saúde, 2017).\n<br><br>\n\nA doença acomete principalmente os nervos superficiais da pele e troncos nervosos periféricos (localizados na face, pescoço, terço médio do braço e abaixo do cotovelo\ne dos joelhos), mas também pode afetar os olhos e órgãos internos (mucosas, testículos, ossos, baço, fígado, etc.).<br>A doença atinge pessoas de qualquer sexo ou faixa etária, podendo apresentar evolução lenta e progressiva e, quando não tratada, pode causar deformidades e incapacidades físicas, muitas vezes irreversíveis. \n', 'historia', 'Introducao', ''),
(15, 'No mundo, foram reportados à Organização Mundial da Saúde (OMS) 208.619 casos novos da doença em 2018. Desses, 30.957 ocorreram na região das Américas e 28.660 (92,6% do total das Américas) foram notificados no Brasil. \r\nDo total de casos novos diagnosticados no país, 1.705 (5,9%) ocorreram em menores de 15 anos. Quanto ao Grau de Incapacidade Física (GIF), entre os 24.780 (86,5) avaliados no diagnóstico, 2.109 (8,5%) apresentaram deformidades visíveis (GIF2). \r\nDiante desse cenário, o Brasil é classificado como um país de alta carga para a doença, ocupando o segundo lugar na relação de países com maior número de casos no mundo, estando atrás apenas da Índia (Ministério da saúde, 2020).\r\n<br><br>\r\nA dificuldade no diagnóstico da doença e a falta de disponibilidade de recursos em diversos serviços de saúde do país são os grandes pilares que dificultam o diagnóstico e retardam o início do tratamento, que por sua vez é inteiramente gratuito através do Sistema Único de Saúde - SUS\r\n<br><br>', 'historia', 'visao', ''),
(12, 'Os pacientes diagnosticados com hanseníase têm direito a tratamento gratuito\ncom a poliquimioterapia (PQT-OMS), disponível em qualquer unidade de saúde. O\ntratamento interrompe a transmissão em poucos dias e cura a doença.', 'historia', 'tratamento', ''),
(13, 'A hanseníase é transmitida por meio de contato próximo e prolongado de uma\npessoa suscetível (com maior probabilidade de adoecer) com um doente com hanseníase que não está sendo tratado. Normalmente, a fonte da doença é um parente próximo que não sabe que está doente, como avós, pais, irmãos, cônjuges, etc.<br><br>\nA bactéria é transmitida pelas vias respiratórias (pelo ar), e não pelos objetos\nutilizados pelo paciente. Estima-se que a maioria da população possua defesa natural\n(imunidade) contra o M. leprae. Portanto, a maior parte das pessoas que entrarem em\ncontato com o bacilo não adoecerão. É sabido que a susceptibilidade ao M. leprae possui influência genética. Assim, familiares de pessoas com hanseníase possuem maior\nchance de adoecer.<br><br>Nas imagens abaixo, é possível observar a lenta evolução natural da doença,\ndesde a fase inicial até a forma disseminada, em uma paciente diagnosticada antes da\nera dos antibióticos e da utilização da Poliquimioterapia (PQT-OMS)<br><br>', 'historia', 'transmissao', ''),
(17, 'A hanseníase pode levar a alteração da função sudoral (suor), que pode ser percebida pelo achado de áreas secas, que geralmente tornam-se mais evidentes porque não permitem o acumular de poeira.<br>\r\nÉ importante lembrar que, semelhante ao que ocorre com as alterações de sensibilidade, a alteração da função sudoral também ocorre em ilhotas, ou seja, são áreas de hipoidrose ou anidrose circunscritas por periferia de normoidrose conforme figuras a seguir. ', 'sudoral', 'introducao', ''),
(16, 'Os principais sinais e sintomas da hanseníase são:<br><br><br>\n• Áreas da pele, ou manchas esbranquiçadas (hipocrômicas), acastanhadas ou avermelhadas, com alterações de sensibilidade ao calor e/ou dolorosa, e/ou ao tato<br><br>\n• Formigamentos, choques e câimbras nos braços e pernas, que evoluem para dormência – a pessoa se queima ou se machuca sem perceber<br><br>\n• Pápulas, tubérculos e nódulos (caroços), normalmente sem sintomas;<br><br>\n• Diminuição ou queda de pelos, localizada ou difusa, especialmente nas sobrancelhas (madarose);<br><br>\n• Pele infiltrada (avermelhada), com diminuição ou ausência de suor no local.<br><br><br>\nAlém dos sinais e sintomas mencionados, pode-se observar:<br><br><br>\n• Dor, choque e/ou espessamento de nervos periféricos;<br><br>\n• Diminuição e/ou perda de sensibilidade nas áreas dos nervos afetados, principalmente nos olhos, mãos e pés;<br><br>\n• Diminuição e/ou perda de força nos músculos inervados por estes nervos, principalmente nos membros superiores e inferiores e, por vezes, pálpebras;<br><br>\n• Edema de mãos e pés com cianose (arroxeamento dos dedos) e ressecamento da pele;<br><br>\n• Febre e artralgia, associados a caroços dolorosos, de aparecimento súbito;<br><br>\n• Aparecimento súbito de manchas dormentes com dor nos nervos dos cotovelos (ulnares), joelhos (fibulares comuns) e tornozelos (tibiais posteriores);<br><br>\n• Entupimento, feridas e ressecamento do nariz;<br><br>\n• Ressecamento e sensação de areia nos olhos.', 'sintomas', '', ''),
(18, 'Embora a sensibilidade tátil seja frequentemente a última a ser perdida, deve-se buscar as diferenças de sensibilidade sobre a área a ser examinada e a pele normal circunvizinha, utilizando-se algodão, fio dental ou o monofilamento verde (0.05g) do kit estesiométrico.<br>\nO uso do estesiômetro permite avaliar a sensibilidade protetora das mãos e pés, tendo grande aplicação na avaliação do grau de incapacidade física e para fins de prevenção de incapacidades, sendo seu uso importante para avaliação e seguimento dos casos. <br><br>\n', 'sens', 'introducao', 'tatil'),
(19, 'Nem sempre perda de sensibilidade é devido a hanseníase! Existem outras doenças que podem apresentar perda de sensibilidade nas lesões. <br>A mais comum é a notalgia parestésica, que se trata de uma lesão acastanhada localizada entre as escápulas, que às vezes também coça e arde. <br>A outra doença é a esclerodermia, que se apresenta também sobre a forma de uma lesão castanhada, porém a pele é dura e afundada no centro.', 'sens', 'importante', 'tatil'),
(20, 'Faça o teste da sensibilidade dolorosa utilizando uma agulha de insulina. Encoste a ponta nas lesões de pele com uma leve pressão, tendo o cuidado de não perfurar o paciente, nem provocar sangramento. Faça isso alternando área interna e externa à lesão, observando expressão facial e queixa de respostas à picada. Certifique-se de que a sensibilidade sentida é de dor através da manifestação de “ai!” ou retirada imediata da região que é estimulada pela agulha. A insensibilidade (anestesia) ou sensibilidade diminuída (hipoestesia) dentro da área de lesão confirma o diagnóstico.<br>\r\nPode-se ainda avaliar a sensibilidade dolorosa alternando a ponta da agulha e o cabo da agulha (parte plástica). Observe se o paciente percebe a diferença entre a ponta da agulha e o cabo. Do contrário, isso é sinal de alteração da sensibilidade dolorosa naquela área da pele. Esse cenário também confirma o diagnóstico.', 'dolorosa', 'introducao', ''),
(21, 'Faça o teste de sensibilidade térmica nas áreas suspeitas: <br><br>• Lesões de pele não elevadas (manchas) ou elevadas (placas, nódulos); <br>• Áreas de pele secas ou áreas referidas pelo paciente como regiões com alteração de sensibilidade; <br>• Territórios dos nervos ulnar (quarto e quinto dedos da mão), do nervo radial (dorso da mão até o terceiro dedo), do nervo fibular (lateral da perna e dorso do pé), do nervo tibial (região plantar).<br>• Evite áreas “calosas” (com calosidades ou queratósicas).<br><br>\nTeste os tubos primeiro em você mesmo, e depois na face do paciente para verificar se os tubos estão em temperatura adequada. Pergunte o que ele sente (morno, frio, ou quente). Em seguida, faça o teste nas áreas da pele com lesões. Compare com a área de pele normal contralateral ou adjacente. Se houver diferença na percepção da temperatura nas lesões (hipo ou anestesia) circundada por áreas periféricas de sensibilidade normal (normoestesia) é sinal de alteração da sensibilidade térmica.<br>\nConfirma-se, então, o diagnóstico, apenas com alteração definida de uma das sensibilidades, não necessitando fazer os testes de sensibilidade dolorosa ou tátil.', 'termica', 'introducao', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nome` varchar(250) NOT NULL,
  `nome_social` varchar(250) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  `papel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `email`, `nome`, `nome_social`, `data_de_nascimento`, `ativo`, `papel`) VALUES
(57, 'admin', '1234', 'admin', 'admin', 'admin', '2022-12-28', 1, 'admin'),
(58, 'user', 'user', 'user', 'user', 'user', NULL, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
