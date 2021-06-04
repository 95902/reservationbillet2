<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210604104347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `Cart` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, reference VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, delivery_address LONGTEXT NOT NULL, is_paid TINYINT(1) NOT NULL, more_informations LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, quantity INT NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_AB912789A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, full_name VARCHAR(255) NOT NULL, campany VARCHAR(255) DEFAULT NULL, address LONGTEXT NOT NULL, complement LONGTEXT DEFAULT NULL, phone INT NOT NULL, city VARCHAR(255) NOT NULL, code_postal INT NOT NULL, contry VARCHAR(255) NOT NULL, INDEX IDX_D4E6F81A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agence_location_voitures (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_jours DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agence_location_voitures_voitures (agence_location_voitures_id INT NOT NULL, voitures_id INT NOT NULL, INDEX IDX_229E024839DDBC (agence_location_voitures_id), INDEX IDX_229E02CCC4661F (voitures_id), PRIMARY KEY(agence_location_voitures_id, voitures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agence_location_voitures_destinations (agence_location_voitures_id INT NOT NULL, destinations_id INT NOT NULL, INDEX IDX_7C7EE0684839DDBC (agence_location_voitures_id), INDEX IDX_7C7EE068912C90D4 (destinations_id), PRIMARY KEY(agence_location_voitures_id, destinations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cart_details (id INT AUTO_INCREMENT NOT NULL, carts_id INT NOT NULL, product_name VARCHAR(255) NOT NULL, product_price DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_89FCC38DBCB5C6F5 (carts_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compagnies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destinations (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, nom_pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotels (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_nuit DOUBLE PRECISION NOT NULL, is_all_include TINYINT(1) DEFAULT NULL, is_spa TINYINT(1) DEFAULT NULL, is_wifi TINYINT(1) DEFAULT NULL, is_piscine TINYINT(1) DEFAULT NULL, addresse VARCHAR(255) NOT NULL, maps LONGTEXT NOT NULL, prix VARCHAR(255) DEFAULT NULL, is_plage TINYINT(1) DEFAULT NULL, is_clim TINYINT(1) DEFAULT NULL, is_sport TINYINT(1) DEFAULT NULL, is_bar TINYINT(1) DEFAULT NULL, is_restaurant TINYINT(1) DEFAULT NULL, is_parking TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotels_destinations (hotels_id INT NOT NULL, destinations_id INT NOT NULL, INDEX IDX_14EC86B2F42F66C8 (hotels_id), INDEX IDX_14EC86B2912C90D4 (destinations_id), PRIMARY KEY(hotels_id, destinations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, reference VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, delivery_address LONGTEXT NOT NULL, is_paid TINYINT(1) NOT NULL, more_informations LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, quantity INT NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_F5299398A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_details (id INT AUTO_INCREMENT NOT NULL, orders_id INT NOT NULL, product_name VARCHAR(255) NOT NULL, product_price DOUBLE PRECISION NOT NULL, quantity INT NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_845CA2C1CFFE9AD6 (orders_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE related_voyage (id INT AUTO_INCREMENT NOT NULL, voyage_id INT NOT NULL, INDEX IDX_9351F1F368C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews_product (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, voyage_id INT NOT NULL, note INT NOT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_E0851D6CA76ED395 (user_id), INDEX IDX_E0851D6C68C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_vols (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voitures (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, is_clim TINYINT(1) DEFAULT NULL, is_auto TINYINT(1) NOT NULL, is_manuel TINYINT(1) DEFAULT NULL, is_bagage TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols (id INT AUTO_INCREMENT NOT NULL, ville_depart_id INT NOT NULL, ville_arrive_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_2CDFA86C497832A6 (ville_depart_id), INDEX IDX_2CDFA86C13784AA5 (ville_arrive_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols_compagnies (vols_id INT NOT NULL, compagnies_id INT NOT NULL, INDEX IDX_BEA8033B573E0EFC (vols_id), INDEX IDX_BEA8033B5F9EE3CE (compagnies_id), PRIMARY KEY(vols_id, compagnies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols_type_vols (vols_id INT NOT NULL, type_vols_id INT NOT NULL, INDEX IDX_F5CB3F2B573E0EFC (vols_id), INDEX IDX_F5CB3F2B7F1F6109 (type_vols_id), PRIMARY KEY(vols_id, type_vols_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix INT NOT NULL, duree INT NOT NULL, image VARCHAR(255) NOT NULL, is_special_offert TINYINT(1) DEFAULT NULL, quantite INT NOT NULL, created_at DATETIME NOT NULL, tags LONGTEXT DEFAULT NULL, slug VARCHAR(255) NOT NULL, maps LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages_destinations (voyages_id INT NOT NULL, destinations_id INT NOT NULL, INDEX IDX_F21C3E96A170CAB9 (voyages_id), INDEX IDX_F21C3E96912C90D4 (destinations_id), PRIMARY KEY(voyages_id, destinations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages_hotels (voyages_id INT NOT NULL, hotels_id INT NOT NULL, INDEX IDX_4561FF8BA170CAB9 (voyages_id), INDEX IDX_4561FF8BF42F66C8 (hotels_id), PRIMARY KEY(voyages_id, hotels_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages_agence_location_voitures (voyages_id INT NOT NULL, agence_location_voitures_id INT NOT NULL, INDEX IDX_F25821CBA170CAB9 (voyages_id), INDEX IDX_F25821CB4839DDBC (agence_location_voitures_id), PRIMARY KEY(voyages_id, agence_location_voitures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages_vols (voyages_id INT NOT NULL, vols_id INT NOT NULL, INDEX IDX_B0421D5A170CAB9 (voyages_id), INDEX IDX_B0421D5573E0EFC (vols_id), PRIMARY KEY(voyages_id, vols_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `Cart` ADD CONSTRAINT FK_AB912789A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE agence_location_voitures_voitures ADD CONSTRAINT FK_229E024839DDBC FOREIGN KEY (agence_location_voitures_id) REFERENCES agence_location_voitures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agence_location_voitures_voitures ADD CONSTRAINT FK_229E02CCC4661F FOREIGN KEY (voitures_id) REFERENCES voitures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agence_location_voitures_destinations ADD CONSTRAINT FK_7C7EE0684839DDBC FOREIGN KEY (agence_location_voitures_id) REFERENCES agence_location_voitures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agence_location_voitures_destinations ADD CONSTRAINT FK_7C7EE068912C90D4 FOREIGN KEY (destinations_id) REFERENCES destinations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cart_details ADD CONSTRAINT FK_89FCC38DBCB5C6F5 FOREIGN KEY (carts_id) REFERENCES `Cart` (id)');
        $this->addSql('ALTER TABLE hotels_destinations ADD CONSTRAINT FK_14EC86B2F42F66C8 FOREIGN KEY (hotels_id) REFERENCES hotels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotels_destinations ADD CONSTRAINT FK_14EC86B2912C90D4 FOREIGN KEY (destinations_id) REFERENCES destinations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE order_details ADD CONSTRAINT FK_845CA2C1CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE related_voyage ADD CONSTRAINT FK_9351F1F368C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyages (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reviews_product ADD CONSTRAINT FK_E0851D6CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reviews_product ADD CONSTRAINT FK_E0851D6C68C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyages (id)');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C497832A6 FOREIGN KEY (ville_depart_id) REFERENCES destinations (id)');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C13784AA5 FOREIGN KEY (ville_arrive_id) REFERENCES destinations (id)');
        $this->addSql('ALTER TABLE vols_compagnies ADD CONSTRAINT FK_BEA8033B573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_compagnies ADD CONSTRAINT FK_BEA8033B5F9EE3CE FOREIGN KEY (compagnies_id) REFERENCES compagnies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_type_vols ADD CONSTRAINT FK_F5CB3F2B573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_type_vols ADD CONSTRAINT FK_F5CB3F2B7F1F6109 FOREIGN KEY (type_vols_id) REFERENCES type_vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_destinations ADD CONSTRAINT FK_F21C3E96A170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_destinations ADD CONSTRAINT FK_F21C3E96912C90D4 FOREIGN KEY (destinations_id) REFERENCES destinations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_hotels ADD CONSTRAINT FK_4561FF8BA170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_hotels ADD CONSTRAINT FK_4561FF8BF42F66C8 FOREIGN KEY (hotels_id) REFERENCES hotels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_agence_location_voitures ADD CONSTRAINT FK_F25821CBA170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_agence_location_voitures ADD CONSTRAINT FK_F25821CB4839DDBC FOREIGN KEY (agence_location_voitures_id) REFERENCES agence_location_voitures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_vols ADD CONSTRAINT FK_B0421D5A170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_vols ADD CONSTRAINT FK_B0421D5573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cart_details DROP FOREIGN KEY FK_89FCC38DBCB5C6F5');
        $this->addSql('ALTER TABLE agence_location_voitures_voitures DROP FOREIGN KEY FK_229E024839DDBC');
        $this->addSql('ALTER TABLE agence_location_voitures_destinations DROP FOREIGN KEY FK_7C7EE0684839DDBC');
        $this->addSql('ALTER TABLE voyages_agence_location_voitures DROP FOREIGN KEY FK_F25821CB4839DDBC');
        $this->addSql('ALTER TABLE vols_compagnies DROP FOREIGN KEY FK_BEA8033B5F9EE3CE');
        $this->addSql('ALTER TABLE agence_location_voitures_destinations DROP FOREIGN KEY FK_7C7EE068912C90D4');
        $this->addSql('ALTER TABLE hotels_destinations DROP FOREIGN KEY FK_14EC86B2912C90D4');
        $this->addSql('ALTER TABLE vols DROP FOREIGN KEY FK_2CDFA86C497832A6');
        $this->addSql('ALTER TABLE vols DROP FOREIGN KEY FK_2CDFA86C13784AA5');
        $this->addSql('ALTER TABLE voyages_destinations DROP FOREIGN KEY FK_F21C3E96912C90D4');
        $this->addSql('ALTER TABLE hotels_destinations DROP FOREIGN KEY FK_14EC86B2F42F66C8');
        $this->addSql('ALTER TABLE voyages_hotels DROP FOREIGN KEY FK_4561FF8BF42F66C8');
        $this->addSql('ALTER TABLE order_details DROP FOREIGN KEY FK_845CA2C1CFFE9AD6');
        $this->addSql('ALTER TABLE vols_type_vols DROP FOREIGN KEY FK_F5CB3F2B7F1F6109');
        $this->addSql('ALTER TABLE `Cart` DROP FOREIGN KEY FK_AB912789A76ED395');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398A76ED395');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE reviews_product DROP FOREIGN KEY FK_E0851D6CA76ED395');
        $this->addSql('ALTER TABLE agence_location_voitures_voitures DROP FOREIGN KEY FK_229E02CCC4661F');
        $this->addSql('ALTER TABLE vols_compagnies DROP FOREIGN KEY FK_BEA8033B573E0EFC');
        $this->addSql('ALTER TABLE vols_type_vols DROP FOREIGN KEY FK_F5CB3F2B573E0EFC');
        $this->addSql('ALTER TABLE voyages_vols DROP FOREIGN KEY FK_B0421D5573E0EFC');
        $this->addSql('ALTER TABLE related_voyage DROP FOREIGN KEY FK_9351F1F368C9E5AF');
        $this->addSql('ALTER TABLE reviews_product DROP FOREIGN KEY FK_E0851D6C68C9E5AF');
        $this->addSql('ALTER TABLE voyages_destinations DROP FOREIGN KEY FK_F21C3E96A170CAB9');
        $this->addSql('ALTER TABLE voyages_hotels DROP FOREIGN KEY FK_4561FF8BA170CAB9');
        $this->addSql('ALTER TABLE voyages_agence_location_voitures DROP FOREIGN KEY FK_F25821CBA170CAB9');
        $this->addSql('ALTER TABLE voyages_vols DROP FOREIGN KEY FK_B0421D5A170CAB9');
        $this->addSql('DROP TABLE `Cart`');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE agence_location_voitures');
        $this->addSql('DROP TABLE agence_location_voitures_voitures');
        $this->addSql('DROP TABLE agence_location_voitures_destinations');
        $this->addSql('DROP TABLE cart_details');
        $this->addSql('DROP TABLE compagnies');
        $this->addSql('DROP TABLE destinations');
        $this->addSql('DROP TABLE hotels');
        $this->addSql('DROP TABLE hotels_destinations');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_details');
        $this->addSql('DROP TABLE related_voyage');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE reviews_product');
        $this->addSql('DROP TABLE type_vols');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE voitures');
        $this->addSql('DROP TABLE vols');
        $this->addSql('DROP TABLE vols_compagnies');
        $this->addSql('DROP TABLE vols_type_vols');
        $this->addSql('DROP TABLE voyages');
        $this->addSql('DROP TABLE voyages_destinations');
        $this->addSql('DROP TABLE voyages_hotels');
        $this->addSql('DROP TABLE voyages_agence_location_voitures');
        $this->addSql('DROP TABLE voyages_vols');
    }
}
