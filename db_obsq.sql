-- Structure de la table `usr_obsq`
--

CREATE TABLE IF NOT EXISTS `usr_obsq` (
`id` int(11) NOT NULL,
  `nom` varchar(1000) NOT NULL,
  `user` varchar(50) NOT NULL,
  `m2p` varchar(500) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usr_obsq`
--

INSERT INTO `usr_obsq` (`id`, `nom`, `user`, `m2p`) VALUES
(1, 'Superviseur de la Base', 'admin', '12345678'),
(2, 'Centre Appel Obseque', 'CDAO', '5d14a4cbce9f017fcee273c76be816ef'),
(3, 'ServicePrestations UMS', 'PRESTA', '961d0ed387d6b9aabbdd93bce4085df5');

--
-- Index pour les tables exportées
--0693970796

--
-- Index pour la table `dc`
--
--ALTER TABLE `dc`
-- ADD PRIMARY KEY (`ID_DC`);

--  INSERT INTO `dc` (`ID_DC`, `D_DC`, `LIEU_D`, `LIEU_D_P`, `LIEU_I`, `LIEU_I_P`, `NOM_PC`, `PRENOM_PC`, `TEL`, `TEL2`, `PAR_NO`, `NUM_ADH`, `NOM_ADH`, `PRENOM_ADH`, `DAT_CREA`, `PF`) VALUES
-- INSERT INTO `lst_file_obsq` (`id`, `idX`, `ENTREPRISE`, `CONTRAT`, `IDENTIFIANT`, `NUM_CONTRAT`, `CATEGORIE`, `NOM`, `PRENOM`, `DATE_2_NAISSANCE`, `INSEE`, `ADRS`, `CODE_POSTAL`, `VILLE`, `SITUATION`, `INSCRIPTION`, `EFFET`, `CARENCE`, `RAPATRIMENT`, `file_name`)
CREATE TABLE dc(
ID DC int(11) NOT NULL, 
D_DC  varchar(11) NOT NULL,
LIEU_D text NOT NULL, 
LIEU_D_P text NOT NULL, 
LIEU_I text  NOT NULL, 
LIEU_I_P text NOT NULL,
NOM PC text NOT NULL, 
PRENOM_PC text  NOT NULL,
TEL varchar(13) NOT NULL,
TEL2 varchar(13) DEFAULT NULL;
PAR_NO int(30) NOT NULL,
NUM_ADH int(8) NOT NULL, 
NOM_ADH text NOT NULL,
PRENOM_ADH text NOT NULL,
DAT_CREA timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
PF text NOT NULL
)
-- CREATE TABLE 'dc_tmp'(
-- 'ID DC'int(11) NOT NULL, 
-- 'D_DC' varchar(11) NOT NULL,
-- 'LIEU_D' text NOT NULL, 
-- 'LIEU_D_P' text NOT NULL, 
-- 'LIEU_I' text  NOT NULL, 
-- 'LIEU_I_P' text NOT NULL,
-- 'NOM PC' text NOT NULL, 
-- 'PRENOM_PC' text  NOT NULL,
-- 'TEL' varchar(10) NOT NULL,
-- 'PAR_NO' int(30) NOT NULL,
-- )

CREATE TABLE 'lst_file_obsq' (
'id' int(11) NOT NULL, 
'idX' int(11) DEFAULT NULL, 
'ENTREPRISE' VARCHAR(200) DEFAULT NULL,
'CONTRAT' varchar(200) DEFAULT NULL,
'IDENTIFIANT' varchar(200) DEFAULT NULL, 
'NUM_CONTRAT' varchar(200) DEFAULT NULL, 
'CATEGORIE' varchar(200) DEFAULT NULL, 
'NOM' varchar(200) DEFAULT NULL, 
'PRENOM' varchar(200) DEFAULT NULL, 
'DATE_2_NAISSANCE' varchar(200) DEFAULT NULL,
'INSEE' varchar(200) DEFAULT NULL,
'ADRS' varchar(2000) DEFAULT NULL, 
'CODE_POSTAL' varchar(200) DEFAULT NULL, 
'VILLE' varchar(200) DEFAULT NULL, 
'SITUATION' varchar(200) DEFAULT NULL, 
'INSCRIPTION' date DEFAULT NULL,
'EFFET' date DEFAULT NULL, 
'CARENCE' varchar(200) DEFAULT NULL, 
'RAPATREMENT' varchar(200) DEFAULT NULL,
'file_name' varchar(200) DEFAULT NULL;
)

-- CREATE TABLE 'lst_file_obsq_tmp' (
-- 'id' int(11) NOT NULL, 
-- 'idX' int(11) DEFAULT NULL, 
-- 'ENTREPRISE' VARCHAR(200) DEFAULT NULL,
-- 'CONTRAT' varchar(200) DEFAULT NULL,
-- 'IDENTIFIANT' varchar(200) DEFAULT NULL, 
-- 'NUM_CONTRAT' varchar(200) DEFAULT NULL, 
-- 'CATEGORIE' varchar(200) DEFAULT NULL, 
-- 'NOM' varchar(200) DEFAULT NULL, 
-- 'PRENOM' varchar(200) DEFAULT NULL, 
-- 'DATE_2_NAISSANCE' varchar(200) DEFAULT NULL,
-- 'INSEE' varchar(200) DEFAULT NULL,
-- 'ADRS' varchar(2000) DEFAULT NULL, 
-- 'CODE_POSTAL' varchar(200) DEFAULT NULL, 
-- 'VILLE' varchar(200) DEFAULT NULL, 
-- 'SITUATION' varchar(200) DEFAULT NULL, 
-- 'INSCRIPTION' date DEFAULT NULL,
-- 'EFFET' date DEFAULT NULL, 
-- 'CARENCE' varchar(200) DEFAULT NULL, 
-- 'RAPATREMENT' varchar(200) DEFAULT NULL,
-- 'file_name' varchar(200) DEFAULT NULL;
-- )
--
-- Index pour la table `dc_tmp`
-- Insert into 'lst_file_obsq_tmp'(`id`, `idX`, `ENTREPRISE`, `CONTRAT`, `IDENTIFIANT`, `NUM_CONTRAT`, `CATEGORIE`, `NOM`, `PRENOM`, `DATE_2_NAISSANCE`, `INSEE`, `ADRS`, `CODE_POSTAL`, `VILLE`, `SITUATION`, `INSCRIPTION`, `EFFET`, `CARENCE`, `RAPATRIMENT`, `file_name`)
--
ALTER TABLE `dc_tmp`
 ADD PRIMARY KEY (`ID_DC`);

--
-- Index pour la table `lst_file_obsq`
--
--ALTER TABLE `lst_file_obsq`
 --ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lst_file_obsq_tmp`
--
ALTER TABLE `lst_file_obsq_tmp`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usr_obsq`
--
ALTER TABLE `usr_obsq`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `dc`
--
ALTER TABLE `dc`
MODIFY `ID_DC` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1963;
--
-- AUTO_INCREMENT pour la table `dc_tmp`
--
-- ALTER TABLE `dc_tmp`
-- MODIFY `ID_DC` int(11) NOT NULL AUTO_INCREMENT;
-- --
-- AUTO_INCREMENT pour la table `lst_file_obsq`
--
ALTER TABLE `lst_file_obsq`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81109894;
--
-- AUTO_INCREMENT pour la table `lst_file_obsq_tmp`
-- --
-- ALTER TABLE `lst_file_obsq_tmp`
-- MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=302270;
-- --
-- AUTO_INCREMENT pour la table `usr_obsq`
--
CREATE TABLE 'dc' (
'ID_DC' int(11) NOT NULL,
'D_DC' varchar(11) NOT NULL, 
'LIEU'
)
ALTER TABLE `usr_obsq`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;