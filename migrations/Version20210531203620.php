<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531203620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE destinations (id INT AUTO_INCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, nom_pays VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, duree INT NOT NULL, image VARCHAR(255) NOT NULL, is_speciale_offert TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages_destinations (voyages_id INT NOT NULL, destinations_id INT NOT NULL, INDEX IDX_F21C3E96A170CAB9 (voyages_id), INDEX IDX_F21C3E96912C90D4 (destinations_id), PRIMARY KEY(voyages_id, destinations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voyages_destinations ADD CONSTRAINT FK_F21C3E96A170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_destinations ADD CONSTRAINT FK_F21C3E96912C90D4 FOREIGN KEY (destinations_id) REFERENCES destinations (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voyages_destinations DROP FOREIGN KEY FK_F21C3E96912C90D4');
        $this->addSql('ALTER TABLE voyages_destinations DROP FOREIGN KEY FK_F21C3E96A170CAB9');
        $this->addSql('DROP TABLE destinations');
        $this->addSql('DROP TABLE voyages');
        $this->addSql('DROP TABLE voyages_destinations');
    }
}
