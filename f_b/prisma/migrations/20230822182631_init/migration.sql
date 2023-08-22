/*
  Warnings:

  - You are about to drop the `cms_admin` table. If the table is not empty, all the data it contains will be lost.

*/
-- DropTable
DROP TABLE `cms_admin`;

-- CreateTable
CREATE TABLE `user` (
    `id` INTEGER NOT NULL,
    `date_time` VARCHAR(191) NULL,
    `username` VARCHAR(191) NOT NULL,
    `email` VARCHAR(191) NOT NULL,
    `password` VARCHAR(191) NULL,
    `adress` VARCHAR(191) NULL,
    `phone` BIGINT NOT NULL,
    `plane_best` INTEGER NOT NULL,
    `login_history` INTEGER NOT NULL,

    UNIQUE INDEX `user_id_key`(`id`),
    UNIQUE INDEX `user_phone_key`(`phone`),
    PRIMARY KEY (`id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `rezerved` (
    `rezerved_id` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    `time` INTEGER NOT NULL,

    PRIMARY KEY (`rezerved_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `flights` (
    `flights_id` INTEGER NOT NULL,
    `name` VARCHAR(191) NOT NULL,
    `loc_a` VARCHAR(191) NOT NULL,
    `loc_b` VARCHAR(191) NOT NULL,
    `airport_a` VARCHAR(191) NOT NULL,
    `airport_b` VARCHAR(191) NOT NULL,
    `descr` VARCHAR(191) NOT NULL,
    `image` VARCHAR(191) NOT NULL,
    `class_flights` VARCHAR(191) NOT NULL,
    `price` BIGINT NOT NULL,
    `time_flight` DATETIME(3) NOT NULL,
    `reactions` INTEGER NOT NULL,

    PRIMARY KEY (`flights_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CreateTable
CREATE TABLE `Journal` (
    `flights_id` INTEGER NOT NULL,
    `name` VARCHAR(191) NOT NULL,
    `loc_a` VARCHAR(191) NOT NULL,
    `loc_b` VARCHAR(191) NOT NULL,
    `airport_a` VARCHAR(191) NOT NULL,
    `airport_b` VARCHAR(191) NOT NULL,
    `descr` VARCHAR(191) NOT NULL,
    `image` VARCHAR(191) NOT NULL,
    `class_flights` VARCHAR(191) NOT NULL,
    `price` BIGINT NOT NULL,
    `time_flight` VARCHAR(191) NOT NULL,
    `reactions` INTEGER NOT NULL,

    PRIMARY KEY (`flights_id`)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- AddForeignKey
ALTER TABLE `rezerved` ADD CONSTRAINT `rezerved_user_id_fkey` FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
