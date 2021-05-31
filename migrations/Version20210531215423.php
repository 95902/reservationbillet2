<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531215423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tags_product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags_product_voyages (tags_product_id INT NOT NULL, voyages_id INT NOT NULL, INDEX IDX_43D626BB273D7ABB (tags_product_id), INDEX IDX_43D626BBA170CAB9 (voyages_id), PRIMARY KEY(tags_product_id, voyages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tags_product_voyages ADD CONSTRAINT FK_43D626BB273D7ABB FOREIGN KEY (tags_product_id) REFERENCES tags_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tags_product_voyages ADD CONSTRAINT FK_43D626BBA170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tags_product_voyages DROP FOREIGN KEY FK_43D626BB273D7ABB');
        $this->addSql('DROP TABLE tags_product');
        $this->addSql('DROP TABLE tags_product_voyages');
    }
}
