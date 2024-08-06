<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240806123752 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, color_id INT NOT NULL, vehicle_manufacturer_id INT NOT NULL, driver_car_id INT DEFAULT NULL, number_place_id INT DEFAULT NULL, model VARCHAR(50) NOT NULL, licence_plate VARCHAR(50) NOT NULL, commercial_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', energy TINYINT(1) NOT NULL, is_animal TINYINT(1) NOT NULL, INDEX IDX_773DE69D7ADA1FB5 (color_id), INDEX IDX_773DE69D2EECF171 (vehicle_manufacturer_id), INDEX IDX_773DE69D86992827 (driver_car_id), INDEX IDX_773DE69D8DB457E6 (number_place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, color VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE covoit (id INT AUTO_INCREMENT NOT NULL, diver_user_id INT NOT NULL, date_start DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', time_start TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', place_start VARCHAR(50) NOT NULL, date_end DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', time_end TIME NOT NULL COMMENT \'(DC2Type:time_immutable)\', place_end VARCHAR(50) NOT NULL, status VARCHAR(50) NOT NULL, price_passenger DOUBLE PRECISION NOT NULL, INDEX IDX_CA482A5D3DCDF185 (diver_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE covoit_number (covoit_id INT NOT NULL, number_id INT NOT NULL, INDEX IDX_FAE54B1A15497D93 (covoit_id), INDEX IDX_FAE54B1A30A1DE10 (number_id), PRIMARY KEY(covoit_id, number_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE number (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstmane VARCHAR(50) NOT NULL, lastname VARCHAR(50) NOT NULL, phone VARCHAR(13) NOT NULL, adresse VARCHAR(150) NOT NULL, zipcode VARCHAR(5) NOT NULL, country VARCHAR(150) NOT NULL, birth_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', pseudo VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle_manufacturer (id INT AUTO_INCREMENT NOT NULL, constructor VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D7ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D2EECF171 FOREIGN KEY (vehicle_manufacturer_id) REFERENCES vehicle_manufacturer (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D86992827 FOREIGN KEY (driver_car_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D8DB457E6 FOREIGN KEY (number_place_id) REFERENCES number (id)');
        $this->addSql('ALTER TABLE covoit ADD CONSTRAINT FK_CA482A5D3DCDF185 FOREIGN KEY (diver_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE covoit_number ADD CONSTRAINT FK_FAE54B1A15497D93 FOREIGN KEY (covoit_id) REFERENCES covoit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE covoit_number ADD CONSTRAINT FK_FAE54B1A30A1DE10 FOREIGN KEY (number_id) REFERENCES number (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D7ADA1FB5');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D2EECF171');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D86992827');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D8DB457E6');
        $this->addSql('ALTER TABLE covoit DROP FOREIGN KEY FK_CA482A5D3DCDF185');
        $this->addSql('ALTER TABLE covoit_number DROP FOREIGN KEY FK_FAE54B1A15497D93');
        $this->addSql('ALTER TABLE covoit_number DROP FOREIGN KEY FK_FAE54B1A30A1DE10');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE covoit');
        $this->addSql('DROP TABLE covoit_number');
        $this->addSql('DROP TABLE number');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE vehicle_manufacturer');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
