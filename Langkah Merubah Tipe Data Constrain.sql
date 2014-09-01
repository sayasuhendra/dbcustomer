Langkah Merubah Tipe Data Constrain :


1. Hapus semua Constrain tabel yang menggunakannya. dengan Query ini: 

// _ibfk_1 adalah inno db foreign key just namming convention. the number is 1 first create, etc.

ALTER TABLE `biayabackhaulvendors`
DROP FOREIGN KEY `biayabackhaulvendors_ibfk_1`;

ALTER TABLE `costumercircuits`
DROP FOREIGN KEY `lastmiles_ibfk_4`;

ALTER TABLE `lastmiles`
DROP FOREIGN KEY `lastmiles_ibfk_4`;


2. Merubah Semua Jenis Datanya seperti query di bawah ini:

ALTER TABLE `backhauls`
CHANGE `circuitidbackhaul` `circuitidbackhaul` varchar(255) COLLATE 'utf8_unicode_ci' NULL AFTER `id`,
COMMENT='';

ALTER TABLE `biayabackhaulvendors`
CHANGE `circuitidbackhaul` `circuitidbackhaul` varchar(255) COLLATE 'utf8_unicode_ci' NULL AFTER `id`,
COMMENT='';

ALTER TABLE `costumercircuits`
CHANGE `circuitidbackhaul` `circuitidbackhaul` varchar(255) COLLATE 'utf8_unicode_ci' NULL AFTER `id`,
COMMENT='';

ALTER TABLE `lastmiles`
CHANGE `circuitidbackhaul` `circuitidbackhaul` varchar(255) COLLATE 'utf8_unicode_ci' NULL AFTER `id`,
COMMENT='';


3. Buat Kembali Constrainnya dengan query di bawah ini:

ALTER TABLE `biayabackhaulvendors`
ADD FOREIGN KEY (`circuitidbackhaul`) REFERENCES `backhauls` (`circuitidbackhaul`) ON UPDATE CASCADE;

ALTER TABLE `costumercircuits`
ADD FOREIGN KEY (`circuitidbackhaul`) REFERENCES `backhauls` (`circuitidbackhaul`) ON UPDATE CASCADE;

ALTER TABLE `lastmiles`
ADD FOREIGN KEY (`circuitidbackhaul`) REFERENCES `backhauls` (`circuitidbackhaul`) ON UPDATE CASCADE;