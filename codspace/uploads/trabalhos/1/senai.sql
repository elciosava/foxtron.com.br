-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/10/2025 às 22:56
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `senai`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `entregas`
--

CREATE TABLE `entregas` (
  `id` int(11) NOT NULL,
  `id_tarefa` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `resposta` text DEFAULT NULL,
  `arquivo` varchar(255) DEFAULT NULL,
  `data_entrega` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `prazo` date NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('professor','aluno') DEFAULT 'aluno',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`, `criado_em`, `foto`) VALUES
(0, 'Guilherme Jarosz Voznei', 'jaroszguilherme@gmail.com', '$2y$10$FVDqAH7JsvbyrR.8TE23E.H2MDwmxEOk54mHgVGq55lY3MgMf629W', 'aluno', '2025-08-24 00:38:06', '../uploads/fotos/aluno_0.jpg'),
(1, 'Elcio Sava', 'elciosava@outlook.com', '$2y$10$zWE9Q0iPx4eDKi7eEKRioeUyI7mQ5JIGcN/6oUf0LG1E4UqvSeEBC', 'aluno', '2025-08-24 00:35:53', '../uploads/fotos/aluno_1.png'),
(2, 'Elcio Sava', 'elcio.sava@sistemafiep.org.br', '$2y$10$douQy25L0MnjyttzFKwmzuSSDgD8RYOAzVYV64fg9AXjWpq4HQG5m', 'professor', '2025-08-24 00:37:17', '../uploads/fotos/professor_2.jpg'),
(4, 'Marcel Ferreira Martins', 'martinsmarcel544@gmail.com', '$2y$10$YKMQPvA.yu/knPiI24iAneZD3kGSycmhC1JTS97eR/T4niRbjxMOG', 'aluno', '2025-09-09 19:13:45', '../uploads/fotos/aluno_4.jpg'),
(5, 'Helen Vitoria de Souza Assunção', 'hdesouzaassuncao@gmail.com', '$2y$10$3eF5/MeYMrN0FQH/u8VVt.FT/YzxD8NQ8IeWRwkks0aEPu7CoIIT6', 'aluno', '2025-09-16 17:18:05', NULL),
(6, 'Raul Karvat', 'karvatraul@gmail.com', '$2y$10$hbi/RAsp0h2jFfhXQAUwne1CPqbAZW1XFBE8T6.B87WaP5vDmA63i', 'aluno', '2025-09-16 17:18:05', NULL),
(7, 'Andrei de Souza Scheid', 'zegota8098@gmail.com', '$2y$10$4DjIqbwUXqg7qPFZWKBdWepY/ZzsKxxHqTIuhXpUSrFiz9.p3I/o2', 'aluno', '2025-09-16 17:18:07', '../uploads/fotos/aluno_7.jpg'),
(8, 'luiz francisco sloboda', 'luizsloboda48@gmail.com', '$2y$10$RxO8koWP1viKH/fkhROmQOos3yREW5ecSISkBiG5DpoxCffMZd8YC', 'aluno', '2025-09-16 17:18:11', '../uploads/fotos/aluno_8.jpeg'),
(9, 'Ana Karla Rocha Stelmach', 'anakarlarochastelmach@gmail.com', '$2y$10$aIbj28jjat15ZEQs0VhC/eeZ0rqPcd/qo04McOWjQDQFt.FZ8jtoq', 'aluno', '2025-09-16 17:18:26', '../uploads/fotos/aluno_9.webp'),
(10, 'Luiz Otávio Santos', 'luiz983q@gmail.com', '$2y$10$whY7Hs7MSXfuyb2xocQMMOTsjDZP6aVyq7Z0XYLtJRcu5mECXyCzq', 'aluno', '2025-09-16 17:18:35', '../uploads/fotos/aluno_10.webp'),
(11, 'vinicius gabriel braun', 'viniciusbraun43@gmail.com', '$2y$10$zNVwlB3UUrXT5mW.y3w70ebYJPYR/SZkUIF6hj.GZ50dcVk8rY9xG', 'aluno', '2025-09-16 17:18:36', '../uploads/fotos/aluno_11.webp'),
(12, 'Pedro Henrique Dias Pacheco', 'pedro.henrique.dias.pacheco@smepu.com.br', '$2y$10$ECQiigdmdTj.BbY4.1WehOChf2MbtLGLifBzeHbh5cqTppjQNSB1a', 'aluno', '2025-09-16 17:19:04', '../uploads/fotos/aluno_12.webp'),
(13, 'victhor ribeiro', 'batistazk79@gmail.com', '$2y$10$FGZZMnggK.SepVsPQ6pzceGmmqhXHFWCkPvBYlZhYjEg/kbyJczyW', 'aluno', '2025-09-16 17:19:07', '../uploads/fotos/aluno_13.jpg'),
(14, 'João Vitor Zaparoli dos Santos', 'pitocozaparoli@gmail.com', '$2y$10$VRgX9BZANn.cZrhboNDG4.zltV3o95JzjsoHpDjZEGMl3d4Epee.S', 'aluno', '2025-09-16 17:19:14', '../uploads/fotos/aluno_14.jpg'),
(15, 'Flavia Suelen Padilha', 'flavinha.tjs1969@gmail.com', '$2y$10$nRWVhThEi9FFEgQofDpkU.IpUnaBj/Qcr.PaF.v3f1xN3YCWxhY9i', 'aluno', '2025-09-16 17:19:15', '../uploads/fotos/aluno_15.jpg'),
(16, 'Joel Alves Junior', 'joelalvesjunior423@gmail.com', '$2y$10$8l7Nn4UcAj4xp2rQ74mdTOnJy1oUuh7F07W3GIJ..wdoNfXLyfwZW', 'aluno', '2025-09-16 17:19:20', '../uploads/fotos/aluno_16.avif'),
(17, 'Giovani Emerson Goncalves', 'giovanieifpr2014@gmail.com', '$2y$10$ZehGpqXCAvyqLmaKmYoX9.h0vk2fjGCJhRLwZh2shnr7zzvtZiYxG', 'aluno', '2025-09-16 17:19:21', '../uploads/fotos/aluno_17.jpg'),
(19, 'Flavia Suelen Padilha', 'flavia.suelen.padilha@escola.pr.gov.br', '$2y$10$riCUbI3rC3KY0TuuRmd/y.INhUyiIvfElL9EA9eULoOOZbHyaTpMq', 'aluno', '2025-09-16 17:19:58', NULL),
(20, 'Hugo Alfred Caratchuk', 'hugo@hugo', '$2y$10$ntbs/6mMEkKBug/CdcbOquugCltnUYZOnlIAymjcA3QtwOeDVzYMu', 'aluno', '2025-09-16 17:20:10', '../uploads/fotos/aluno_20.webp'),
(21, 'Henrique Alfred Caratchuk', 'henriquealfred@henriquealfred', '$2y$10$wChBhCDc5BCcNshX3L7jJ.F.MbzjCX0eR9iXbOJ5uYg4iZNmEd526', 'aluno', '2025-09-16 17:20:11', '../uploads/fotos/aluno_21.webp'),
(22, 'Gabriel Ryan Mattos Roscher', 'mattosroscher@gmail.com', '$2y$10$4g5hGSNT1wm6bgtp9JLLiexKXO1xS.7hldIapvZ4V907ciN/J3av2', 'aluno', '2025-09-16 17:20:14', '../uploads/fotos/aluno_22.jpg'),
(23, 'Pedro Hnerique Karas Anzoategui', 'kanzoategui.pedro@gmail.com', '$2y$10$exL/id8e7/vh7ojIO.8aGeJLr.930vTor55O6rUNYYh/GvMCbcAo.', 'aluno', '2025-09-16 17:20:14', '../uploads/fotos/aluno_23.jpg'),
(24, 'Ana Klara Holovaty', 'holovatinilmar@gmail.com', '$2y$10$laiVKsjuPLn9Nucfu8gWWOiTFoaTRlEp1P.jASJuwwgJAx0DKx.i6', 'aluno', '2025-09-16 17:20:15', '../uploads/fotos/aluno_24.png'),
(25, 'lucas barbosa', 'lucasjj809@gmail.com', '$2y$10$uHS5sJao5TI98NFB383fweTAIXe2kpyoABKukQ4v8whiST3bPCv4y', 'aluno', '2025-09-16 17:20:24', '../uploads/fotos/aluno_25.jpg'),
(26, 'João Augusto Sivick da Silva', 'onaganordestino@gmail.com', '$2y$10$6vQbxOQXuF/8H/EhxzbEBeTJvk.FZ2Ep0JNUhzELG.w5u75lQSy6a', 'aluno', '2025-09-16 17:21:51', '../uploads/fotos/aluno_26.png'),
(27, 'Isabelle Ribeiro de Deus Moreira Batista', 'isabelleribeirodedeusbatista@gmail.com', '$2y$10$IwY/YTskfS.khZTbCK60Rey4n/x9lpXbFbgYv1rSZywvQ1fWnZ2Oa', 'aluno', '2025-09-16 17:21:54', '../uploads/fotos/aluno_27.webp'),
(28, 'Daniel Yohanan Branco Freire', 'danielfreirejr2006@gmil.com', '$2y$10$0Kxsrg/GtEQte/yUn8mL..ogSpxYjGDfPvegLdu0B11wP4hkp1mG.', 'aluno', '2025-09-16 17:22:13', '../uploads/fotos/aluno_28.jpg'),
(29, 'Gabriel Olimpio Marschalk', 'gabrielmarschalk5@gmail.com', '$2y$10$rHC6JrqWQWNKK16ycaAWK.BFgMkfQQSNNJpQDmVw0.BMA5KHoOAn2', 'aluno', '2025-09-16 17:22:21', '../uploads/fotos/aluno_29.jpg'),
(30, 'guilherme staciaki', 'ffn058@gmail.com', '$2y$10$Zyk6aSKwhJC81i.On8SBe.yxGizZlu0ZImd8XrDF0lo86vlOGylAW', 'aluno', '2025-09-16 17:22:30', '../uploads/fotos/aluno_30.jpg'),
(31, 'Felipe Lourenço da costa', 'felipelourenco847@gmail.com', '$2y$10$/3zH92ikcst2JjvwZeGJE.jkuVgtXJxnUGx728TiHBCEf7AOrnyS2', 'aluno', '2025-09-16 17:22:40', '../uploads/fotos/aluno_31.jpg'),
(32, 'renan antunes lipinski', 'renan.antunes.lipinski2211@gmail.com', '$2y$10$YVsFNRswLXwOFv.0PxZ34O.WlhFa69AieJ3JvWAmctBrdJUjGBfdm', 'aluno', '2025-09-16 17:22:46', '../uploads/fotos/aluno_32.webp'),
(33, 'Isabele Nakalski Bonquerner', 'a.nakalski10@gmail.com', '$2y$10$S8m31oMC7yDKIrFhcIrH/ufrej84IWG89VbU/NQO.6fPUaw0/9F9C', 'aluno', '2025-09-16 17:22:56', '../uploads/fotos/aluno_33.jpg'),
(34, 'Heriberto Wagenfuhr Junior', 'hwjrrw@gmail.com', '$2y$10$dayo/d6dvMZ.RkPwqbCdj.sB9SHUb8WvZPuBTpV7MBF.eFxu9Holm', 'aluno', '2025-09-16 17:23:43', '../uploads/fotos/aluno_34.jpg'),
(35, 'Anderson Fernandes', 'tioeevee37@email.com', '$2y$10$GYS1yxhJwLWHngIoSbpM0eT/79ct3UcnlNwssR64uPWDd/qpKuLJK', 'aluno', '2025-09-16 17:24:12', '../uploads/fotos/aluno_35.jpg'),
(37, 'Anderson Fernandes', 'tioeevee27@email.com', '$2y$10$IrWz.7QWyI4FUlmA7.IXrexTrHp.nHmzWCXsmg45ViUMqmuce6m/a', 'aluno', '2025-09-16 17:24:33', NULL),
(38, 'erick gabriel da silva santos', 'erickgabrielklg7@gmail.com', '$2y$10$rTYa0B40.1Z.BZZ/43XovurtYjgNOnLBaUZfroXYbmvxq4FDXplCO', 'aluno', '2025-09-16 17:25:50', '../uploads/fotos/aluno_38.avif'),
(39, 'liedson gil barth', 'liedsonbarth43@gmail.com', '$2y$10$LOPiE1i0ZZM6pmG1hBELqO/OH7dTszEUufCwGXBi8p2Jg6VpxISOm', 'aluno', '2025-09-16 17:26:41', '../uploads/fotos/aluno_39.webp'),
(40, 'naiara cristina', 'amarelamelancia26@gmail.com', '$2y$10$Rw3dKfLw7OiqcTglz7Xhn./rNEnqhG9AtOf1Jl3nVAMqGsn8vVZx6', 'aluno', '2025-09-16 17:26:55', '../uploads/fotos/aluno_40.jpg'),
(41, 'henrique renan pelechate', 'henriquepelechate15v@gmail.com', '$2y$10$bkUmMjWuWmlh2cEPuBRa2OgCH8nh7bdQRS.FnmUuy3T/2gMiaQoj6', 'aluno', '2025-09-16 17:30:40', '../uploads/fotos/aluno_41.jpg'),
(43, 'daniel freire', 'danielfreirejr2006@gmail.com', '$2y$10$UIArINPRPCffmnm5huVAdO94uYGyjES3ro0ufRKoV7HbZe91iIlWe', 'aluno', '2025-09-19 20:18:31', '../uploads/fotos/aluno_43.webp'),
(44, 'Heriberto Wagenguhr Junior', 'hwjrrw@gmaiil.com', '$2y$10$uoeWxzjZ2UQCHN/WcE5jHOTc5Z7w8YQ1oFyALg2y4779rGE4.Vdom', 'aluno', '2025-09-19 20:20:50', NULL),
(45, 'Anderson', 'tioeevee37@gmail.com', '$2y$10$TtjJaDlxuO9Uzdsbwwu4B.uDMV06DlbOqfHx6mIzZto/CVzvRerdi', 'aluno', '2025-09-19 20:25:30', NULL),
(46, 'Helen Vitoria', 'hdesouzaassucao@gmail.com', '$2y$10$jjab9j5Ek8H42L89vKFZN.Yy03P40uYHeUuRzO29ulT4qnwJ2MK.y', 'aluno', '2025-09-23 20:19:12', NULL),
(47, 'saimon evan', 'saimon.0285@aluno.pr.senac.br', '$2y$10$iwjnNpf3xGKwDIAkgZoM2egjTSV5qrkcPdKKneUIrLlprCeEAt7LC', 'aluno', '2025-09-24 18:57:03', '../uploads/fotos/aluno_47.webp'),
(51, 'Helen Souza', 'cirlei539@gmail.com', '$2y$10$OwgavFTfQAiScenQlNMakeb0uNns3wwXMQkwrgekB8I7/YJMG2E8W', 'aluno', '2025-09-24 19:16:37', '../uploads/fotos/aluno_51.jpg'),
(52, 'naiara', 'amarelamelancia26@escola.pr.goc.br', '$2y$10$xg8HT/KYXs.CqtFqwnZeCuh2bXz4nR2P/Y6wy8H69FfzR6Hn2KSn6', 'aluno', '2025-09-25 16:35:07', NULL),
(53, 'Gleison Dvojatzki', 'gleisondvojatzki@gmail.com', '$2y$10$NrSpVzIvLxgqGNYSMh2Brewv4oeOiSTohWtC9TtyRoxHyin0M1aru', 'professor', '2025-09-30 18:40:33', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tarefa` (`id_tarefa`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `entregas`
--
ALTER TABLE `entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`id_tarefa`) REFERENCES `tarefas` (`id`),
  ADD CONSTRAINT `entregas_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
