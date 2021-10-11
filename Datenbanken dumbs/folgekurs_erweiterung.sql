ALTER TABLE `f_kurs`
  ADD COLUMN  `f_folgekurs_id` int(11) DEFAULT NULL,
  ADD UNIQUE KEY `f_folgekurs_id_UNIQUE` (`f_folgekurs_id`),
  ADD KEY `fk_f_kurs_f_kurs1_idx` (`f_folgekurs_id`),
  ADD CONSTRAINT `fk_f_kurs_f_kurs1` FOREIGN KEY (`f_folgekurs_id`) REFERENCES `f_kurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION; 