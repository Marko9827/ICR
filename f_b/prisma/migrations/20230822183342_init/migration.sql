-- AlterTable
ALTER TABLE `flights` ADD COLUMN `status` INTEGER NOT NULL DEFAULT 0;

-- AlterTable
ALTER TABLE `user` ADD COLUMN `admin` INTEGER NOT NULL DEFAULT 0;
