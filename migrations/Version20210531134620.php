<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531134620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence_location_voitures (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_jour DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_16DEC596A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agence_location_voitures_voitures (agence_location_voitures_id INT NOT NULL, voitures_id INT NOT NULL, INDEX IDX_229E024839DDBC (agence_location_voitures_id), INDEX IDX_229E02CCC4661F (voitures_id), PRIMARY KEY(agence_location_voitures_id, voitures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compagnies (id INT AUTO_INCREMENT NOT NULL, nam VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destinations (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, nom_pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotels (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix_nuit DOUBLE PRECISION NOT NULL, is_all_include TINYINT(1) DEFAULT NULL, is_spa TINYINT(1) DEFAULT NULL, is_wifi TINYINT(1) DEFAULT NULL, is_piscine TINYINT(1) DEFAULT NULL, INDEX IDX_E402F625A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE related_voyage (id INT AUTO_INCREMENT NOT NULL, voyage_id INT NOT NULL, INDEX IDX_9351F1F368C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews_product (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, voyage_id INT NOT NULL, note INT NOT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_E0851D6CA76ED395 (user_id), INDEX IDX_E0851D6C68C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags_product_voyage (tags_product_id INT NOT NULL, voyage_id INT NOT NULL, INDEX IDX_B0A5A13D273D7ABB (tags_product_id), INDEX IDX_B0A5A13D68C9E5AF (voyage_id), PRIMARY KEY(tags_product_id, voyage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_vols (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voitures (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type_voiture VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols (id INT AUTO_INCREMENT NOT NULL, ville_de_depart_id INT DEFAULT NULL, ville_d_arriver_id INT DEFAULT NULL, INDEX IDX_2CDFA86C7B3DF36 (ville_de_depart_id), INDEX IDX_2CDFA86C9D6829C (ville_d_arriver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols_compagnies (vols_id INT NOT NULL, compagnies_id INT NOT NULL, INDEX IDX_BEA8033B573E0EFC (vols_id), INDEX IDX_BEA8033B5F9EE3CE (compagnies_id), PRIMARY KEY(vols_id, compagnies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols_type_vols (vols_id INT NOT NULL, type_vols_id INT NOT NULL, INDEX IDX_F5CB3F2B573E0EFC (vols_id), INDEX IDX_F5CB3F2B7F1F6109 (type_vols_id), PRIMARY KEY(vols_id, type_vols_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyage (id INT AUTO_INCREMENT NOT NULL, destination_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, duree INT NOT NULL, quantite INT NOT NULL, is_special_offert TINYINT(1) DEFAULT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_3F9D8955816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agence_location_voitures ADD CONSTRAINT FK_16DEC596A6E44244 FOREIGN KEY (pays_id) REFERENCES destinations (id)');
        $this->addSql('ALTER TABLE agence_location_voitures_voitures ADD CONSTRAINT FK_229E024839DDBC FOREIGN KEY (agence_location_voitures_id) REFERENCES agence_location_voitures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agence_location_voitures_voitures ADD CONSTRAINT FK_229E02CCC4661F FOREIGN KEY (voitures_id) REFERENCES voitures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotels ADD CONSTRAINT FK_E402F625A6E44244 FOREIGN KEY (pays_id) REFERENCES destinations (id)');
        $this->addSql('ALTER TABLE related_voyage ADD CONSTRAINT FK_9351F1F368C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
        $this->addSql('ALTER TABLE reviews_product ADD CONSTRAINT FK_E0851D6CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reviews_product ADD CONSTRAINT FK_E0851D6C68C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
        $this->addSql('ALTER TABLE tags_product_voyage ADD CONSTRAINT FK_B0A5A13D273D7ABB FOREIGN KEY (tags_product_id) REFERENCES tags_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tags_product_voyage ADD CONSTRAINT FK_B0A5A13D68C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C7B3DF36 FOREIGN KEY (ville_de_depart_id) REFERENCES destinations (id)');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C9D6829C FOREIGN KEY (ville_d_arriver_id) REFERENCES destinations (id)');
        $this->addSql('ALTER TABLE vols_compagnies ADD CONSTRAINT FK_BEA8033B573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_compagnies ADD CONSTRAINT FK_BEA8033B5F9EE3CE FOREIGN KEY (compagnies_id) REFERENCES compagnies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_type_vols ADD CONSTRAINT FK_F5CB3F2B573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_type_vols ADD CONSTRAINT FK_F5CB3F2B7F1F6109 FOREIGN KEY (type_vols_id) REFERENCES type_vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955816C6140 FOREIGN KEY (destination_id) REFERENCES destinations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agence_location_voitures_voitures DROP FOREIGN KEY FK_229E024839DDBC');
        $this->addSql('ALTER TABLE vols_compagnies DROP FOREIGN KEY FK_BEA8033B5F9EE3CE');
        $this->addSql('ALTER TABLE agence_location_voitures DROP FOREIGN KEY FK_16DEC596A6E44244');
        $this->addSql('ALTER TABLE hotels DROP FOREIGN KEY FK_E402F625A6E44244');
        $this->addSql('ALTER TABLE vols DROP FOREIGN KEY FK_2CDFA86C7B3DF36');
        $this->addSql('ALTER TABLE vols DROP FOREIGN KEY FK_2CDFA86C9D6829C');
        $this->addSql('ALTER TABLE voyage DROP FOREIGN KEY FK_3F9D8955816C6140');
        $this->addSql('ALTER TABLE tags_product_voyage DROP FOREIGN KEY FK_B0A5A13D273D7ABB');
        $this->addSql('ALTER TABLE vols_type_vols DROP FOREIGN KEY FK_F5CB3F2B7F1F6109');
        $this->addSql('ALTER TABLE agence_location_voitures_voitures DROP FOREIGN KEY FK_229E02CCC4661F');
        $this->addSql('ALTER TABLE vols_compagnies DROP FOREIGN KEY FK_BEA8033B573E0EFC');
        $this->addSql('ALTER TABLE vols_type_vols DROP FOREIGN KEY FK_F5CB3F2B573E0EFC');
        $this->addSql('ALTER TABLE related_voyage DROP FOREIGN KEY FK_9351F1F368C9E5AF');
        $this->addSql('ALTER TABLE reviews_product DROP FOREIGN KEY FK_E0851D6C68C9E5AF');
        $this->addSql('ALTER TABLE tags_product_voyage DROP FOREIGN KEY FK_B0A5A13D68C9E5AF');
        $this->addSql('DROP TABLE agence_location_voitures');
        $this->addSql('DROP TABLE agence_location_voitures_voitures');
        $this->addSql('DROP TABLE compagnies');
        $this->addSql('DROP TABLE destinations');
        $this->addSql('DROP TABLE hotels');
        $this->addSql('DROP TABLE related_voyage');
        $this->addSql('DROP TABLE reviews_product');
        $this->addSql('DROP TABLE tags_product');
        $this->addSql('DROP TABLE tags_product_voyage');
        $this->addSql('DROP TABLE type_vols');
        $this->addSql('DROP TABLE voitures');
        $this->addSql('DROP TABLE vols');
        $this->addSql('DROP TABLE vols_compagnies');
        $this->addSql('DROP TABLE vols_type_vols');
        $this->addSql('DROP TABLE voyage');
    }
}
