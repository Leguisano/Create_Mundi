CREATE DATABASE createmundi;
Use createmundi;

CREATE TABLE `faccoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL,
  `idMundo` int(11) NOT NULL
);


INSERT INTO `faccoes` (`id`, `nome`, `descricao`, `idMundo`) VALUES
(17, 'Abecedario', 'Loucura', 15),
(19, 'Equipe', 'Pega a Carga dos outros', 15),
(23, 'História Fnaf', 'A Pizzaria Freddy Fazbear foi um restaurante popular para crianças e igualmente para adultos. No entanto, inúmeros incidentes - incluindo o sequestro de cinco crianças por um homem vestindo um traje de animatrônico vazio, queixas ao Departamento de Saúde sobre inúmeros relatos de sujeira e \"A Mordida de 87\" - fizeram a pizzaria cair em tempos difíceis. A Pizzaria Freddy Fazbear foi sancionada a fechar até final do ano, já que potenciais compradores não queriam seus nomes associados ao restaurante.\r\nOs quatro mascotes - Freddy Fazbear, Bonnie, o Coelho, Chica, a Galinha e Foxy, a Raposa Pirata - fediam e excretavam algo que parecia ser \"sangue e muco\" em torno de suas bocas e olhos, sendo chamados de \"cadáveres reanimados\" por pais que frequentavam o local.\r\nO Cara do Telefone diz, na primeira noite, que os animatrônicos não foram lavados em mais de 20 anos de serviço, o que explicaria o odor desagradável. O mau cheiro também pode ser atribuído a uma teoria popular de que as crianças desaparecidas foram colocadas dentro dos trajes dos animatrônicos, e que seus corpos em decomposição provocavam um cheiro repulsivo.\r\nDevido aos riscos dos mecanismos animatrônicos travarem, eles foram colocados em modo livre durante a noite ao longo dos anos. Eles também costumavam estar em modo livre durante o dia, mas A Mordida de 87 fez com que a pizzaria deixasse esse habito.\r\nO Cara do Telefone, infelizmente, desapareceu, como é ouvido em sua gravação da quarta noite, e é provável que ele tenha sido enfiado em um traje animatrônico. Existem muitas teorias de sobre o que aconteceu com ele depois da ligação ter sido cortada, mas uma coisa é certa: ele foi atacado.\r\nHá também especulações sobre uma versão mais complicada e torcida do enredo, devido à gravação de telefone ouvida durante quinta noite.', 15),
(24, 'Grupo da traira', 'gostam de peixe', 21),
(25, 'Fans de Linux', 'Espere, eles estão criando uma pasta, de mais 5 minutos', 22);



CREATE TABLE `mundos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL,
  `idUser` int(11) NOT NULL
); 

INSERT INTO `mundos` (`id`, `nome`, `descricao`, `idUser`) VALUES
(15, 'Dromedario de fogo', 'Maneirasso', 5),
(20, 'Mundo Aristocrata', 'Um Mundo onde a aristocracia reina', 5),
(21, 'Terra média', 'Bem mediana mesmo', 6),
(22, 'Lore de Oolacile', 'A antiga terra perdida de Oolacile, reduzida a cinzas há muito tempo, era uma terra de antigas feitiçarias. Seus feiticeiros eram conhecidos por sua capacidade de controlar a luz, criar ilusões de ótica e suavizar feitiços de sobrevivência em geral. Princesa Dusk de Oolacile, a última sobrevivente de sua espécie, foi tirada de sua casa e banida para um plano de distorção. Desde então, ela permaneceu presa em um golem de cristal. Seu povo uma vez acreditou e foi guiado pelas Grandes Chamas. Algumas pessoas afirmam que a Floresta Darkroot era Oolacile antes de ser destruída, explicando a localização de Dusk e as ruínas na floresta.', 6);

CREATE TABLE `personagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `idfaccao` int(11) NOT NULL
); 


INSERT INTO `personagens` (`id`, `nome`, `descricao`, `idfaccao`) VALUES
(21, 'Luizana', 'Luiz e ana', 17),
(22, 'Artorias The Abysswalker', 'Sir Artorias the Abysswalker was one of the Four Knights of Lord Gwyn. He only makes an appearance in the past, as he is deceased by the time the Chosen Undead escapes the Undead Asylum.\r\n\r\nKnight Artorias wore distinctive armor, as well as the Wolf Ring, and brandished his Greatsword and Greatshield. He is known to have been a friend to Alvina of the Forest Hunter covenant. Sif, the Great Grey Wolf was his companion, now guarding his grave and keeping the Covenant of Artorias ring in his possession.\r\n\r\nArtorias hunted the Darkwraiths and was able to traverse the Abyss with the power of his ring, which he obtained after making a covenant with the beasts there, preventing him from being swallowed by the void, but cursing his sword in the process. In recognition of his actions, he was awarded one of Anor Londo\'s treasures - a Silver Pendant that allowed him to repel Dark sorceries.\r\n\r\nWhen Oolacile became threatened by the Abyss created by Manus, Artorias and his wolf companion Sif arrived there in an attempt to save Oolacile and rescue the abducted Princess Dusk. However, the two were overwhelmed, and Artorias sacrificed himself to protect Sif using his Cleansing Greatshield, erecting a barrier around the young wolf. Swallowed by the Dark, he became corrupted along with his already-cursed sword. He was then laid to rest by the Chosen Undead after their encounter in the coliseum of Oolacile.\r\n\r\nOnce defeated, Hawkeye Gough mentions the player defeating Artorias, and speaks of him when talked to multiple times.\r\n\r\nHis legacy as a hero lasted for centuries. By the time of Lothric, there was the Undead Legion of Farron, who were commonly called the Abyss Watchers. They partook of wolf blood, and it is said that their souls are bound together and are one with the soul of the \"wolf blood master\", who is Artorias. Wielding greatswords modeled after his, and fighting in wild ferocious styles, the Legion fought a veritable war with the dark of the Abyss that their master had fought ages past.', 24),
(23, 'Cortês', 'Do sofrimento surge a cortesia', 25);



CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `adm` tinyint(1) NOT NULL
) ;


INSERT INTO `usuario` (`id`, `username`, `email`, `senha`, `adm`) VALUES
(5, 'Goiabinha', 'Goiaba@gmail.com', '25d55ad283aa400af464c76d713c07ad', 1),
(6, 'Miguel', 'nicolassumerrs@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
(7, 'Nicolas', 'nicolasdasilveiraveloso@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0),
(8, 'Henrique', 'HenriqueLeguisano@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0);


ALTER TABLE `faccoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMundo` (`idMundo`);

ALTER TABLE `mundos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idfaccao` (`idfaccao`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);


ALTER TABLE `faccoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

ALTER TABLE `mundos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;


ALTER TABLE `personagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `faccoes`
  ADD CONSTRAINT `faccoes_ibfk_1` FOREIGN KEY (`idMundo`) REFERENCES `mundos` (`id`) ON DELETE CASCADE;


ALTER TABLE `mundos`
  ADD CONSTRAINT `mundos_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

ALTER TABLE `personagens`
  ADD CONSTRAINT `personagens_ibfk_1` FOREIGN KEY (`idfaccao`) REFERENCES `faccoes` (`id`) ON DELETE CASCADE;
