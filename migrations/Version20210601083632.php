<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601083632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tags_product_voyage DROP FOREIGN KEY FK_B0A5A13D273D7ABB');
        $this->addSql('ALTER TABLE tags_product_voyages DROP FOREIGN KEY FK_43D626BB273D7ABB');
        $this->addSql('ALTER TABLE tags_product_voyage DROP FOREIGN KEY FK_B0A5A13D68C9E5AF');
        $this->addSql('CREATE TABLE voyages_vols (voyages_id INT NOT NULL, vols_id INT NOT NULL, INDEX IDX_B0421D5A170CAB9 (voyages_id), INDEX IDX_B0421D5573E0EFC (vols_id), PRIMARY KEY(voyages_id, vols_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voyages_vols ADD CONSTRAINT FK_B0421D5A170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_vols ADD CONSTRAINT FK_B0421D5573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE tags_product');
        $this->addSql('DROP TABLE tags_product_voyage');
        $this->addSql('DROP TABLE tags_product_voyages');
        $this->addSql('DROP TABLE voyage');
        $this->addSql('ALTER TABLE vols ADD name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tags_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tags_product_voyage (tags_product_id INT NOT NULL, voyage_id INT NOT NULL, INDEX IDX_B0A5A13D273D7ABB (tags_product_id), INDEX IDX_B0A5A13D68C9E5AF (voyage_id), PRIMARY KEY(tags_product_id, voyage_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tags_product_voyages (tags_product_id INT NOT NULL, voyages_id INT NOT NULL, INDEX IDX_43D626BB273D7ABB (tags_product_id), INDEX IDX_43D626BBA170CAB9 (voyages_id), PRIMARY KEY(tags_product_id, voyages_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE voyage (id INT AUTO_INCREMENT NOT NULL, destination_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, price DOUBLE PRECISION NOT NULL, duree INT NOT NULL, quantite INT NOT NULL, is_special_offert TINYINT(1) DEFAULT NULL, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_3F9D8955816C6140 (destination_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tags_product_voyage ADD CONSTRAINT FK_B0A5A13D273D7ABB FOREIGN KEY (tags_product_id) REFERENCES tags_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tags_product_voyage ADD CONSTRAINT FK_B0A5A13D68C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tags_product_voyages ADD CONSTRAINT FK_43D626BB273D7ABB FOREIGN KEY (tags_product_id) REFERENCES tags_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tags_product_voyages ADD CONSTRAINT FK_43D626BBA170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyage ADD CONSTRAINT FK_3F9D8955816C6140 FOREIGN KEY (destination_id) REFERENCES destinations (id)');
        $this->addSql('DROP TABLE voyages_vols');
        $this->addSql('ALTER TABLE vols DROP name');
    }
}
