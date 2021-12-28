CREATE TABLE `join_subjects` (
  `id` int(11) NOT NULL,
  `publications_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
);

INSERT INTO `join_subjects` (`id`, `publications_id`, `subject_id`) VALUES
(3, 10, 2),
(13, 11, 1),
(14, 11, 2),
(15, 11, 3),
(16, 11, 4),
(18, 2, 2),
(19, 2, 5);
CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `abstract` text DEFAULT NULL,
  `type` enum('Laporan KP/Magang','TA/Skripsi','Tesis/Disertasi','Jurnal/Buku','Laporan Pasca Pelatihan') NOT NULL,
  `file` varchar(255) NOT NULL,
  `access` int(11) NOT NULL DEFAULT 0,
  `posted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
);

INSERT INTO `publications` (`id`, `title`, `year`, `author`, `abstract`, `type`, `file`, `access`, `posted_at`, `updated_at`) VALUES
(2, 'Judul 1 - revisi', 2019, 'Author 1', 'Abstract 1', 'Laporan Pasca Pelatihan', '', 0, '2021-12-06 13:13:27', '2021-12-06 13:14:55'),
(3, 'Judul 1', 2019, 'Author 1', 'Abstract 1', '', '', 0, '2021-12-06 13:13:27', '2021-12-06 13:14:55'),
(4, 'Judul 1', 2019, 'Author 1', 'Abstract 1', '', '', 0, '2021-12-06 13:13:27', '2021-12-06 13:14:55'),
(5, 'Judul 1', 2019, 'Author 1', 'Abstract 1', '', '', 0, '2021-12-06 13:13:27', '2021-12-06 13:14:55'),
(6, 'Judul 1', 2019, 'Author 1', 'Abstract 1', 'Laporan KP/Magang', 'test', 0, '2021-12-06 13:13:27', '2021-12-06 13:14:55'),
(7, 'asdfg', 2019, 'asdf', '', 'Laporan KP/Magang', '2019 - Sri Ethicawati52.pdf', 0, '2021-12-08 13:46:38', '2021-12-08 13:46:38'),
(8, 'asdfg', 2019, 'asdf', '', 'Laporan KP/Magang', '2019 - Sri Ethicawati52.pdf', 0, '2021-12-08 13:48:26', '2021-12-08 13:48:26'),
(9, '1233', 2021, '1233', '', 'Laporan KP/Magang', '2021 - Widya Aprilini.pdf', 0, '2021-12-08 13:53:33', '2021-12-08 13:53:33'),
(10, '123', 1234, '1234', '1234', 'Laporan KP/Magang', '1234 - Sri Ethicawati52.pdf', 0, '2021-12-11 23:08:50', '2021-12-11 23:08:50'),
(11, '12344', 1234, '12344', '', 'Laporan Pasca Pelatihan', '1234 - 563-1234 - Sri Ethicawati52.pdf', 0, '2021-12-11 23:10:16', '2021-12-11 23:10:16'),
(12, 'TEST REVISI 1', 2022, 'TEST REVISI 1', '', 'Jurnal/Buku', '82-2022 - Untitled project.pdf', 0, '2021-12-12 10:45:01', '2021-12-12 10:45:01');
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
);
INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(1, 'Psikologi'),
(2, 'Komputer'),
(3, 'Komunikasi'),
(4, 'Farmasi'),
(5, 'Manajemen'),
(6, 'Kesehatan');
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
);

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, '123', '$2y$10$K1vKFUdHUWIodVDHy6UyTezeabEAJsDoFgzurn7QjMiQfG8Hemy16'),
(2, 'sifalibadmin', '$2y$10$fgX.fJ0iZk3VkGwMbj9J7udGo2O9WkDBzuAg.T35Kt4xu4.xa/ki2');
ALTER TABLE `join_subjects`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `join_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;