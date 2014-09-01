Langkah Merubah Tipe Data Constrain :


1. Hapus semua Constrain tabel yang menggunakannya. dengan Query ini: 

// _ibfk_1 adalah inno db foreign key just namming convention. the number is 1 first create, etc.

ALTER TABLE `biayalastmilevendors`
DROP FOREIGN KEY `biayalastmilevendors_ibfk_1`;

ALTER TABLE `costumercircuits`
DROP FOREIGN KEY `lastmiles_ibfk_4`;


2. Merubah Semua Jenis Datanya seperti query di bawah ini:

ALTER TABLE `lastmiles`
CHANGE `circuitidlastmile` `circuitidlastmile` varchar(255) COLLATE 'utf8_unicode_ci' NULL AFTER `id`,
COMMENT='';

ALTER TABLE `biayalastmilevendors`
CHANGE `circuitidlastmile` `circuitidlastmile` varchar(255) COLLATE 'utf8_unicode_ci' NULL AFTER `id`,
COMMENT='';

ALTER TABLE `costumercircuits`
CHANGE `circuitidlastmile` `circuitidlastmile` varchar(255) COLLATE 'utf8_unicode_ci' NULL AFTER `id`,
COMMENT='';


3. Buat Kembali Constrainnya dengan query di bawah ini:

ALTER TABLE `biayalastmilevendors`
ADD FOREIGN KEY (`circuitidlastmile`) REFERENCES `lastmiles` (`circuitidlastmile`) ON UPDATE CASCADE;

ALTER TABLE `costumercircuits`
ADD FOREIGN KEY (`circuitidlastmile`) REFERENCES `lastmiles` (`circuitidlastmile`) ON UPDATE CASCADE;