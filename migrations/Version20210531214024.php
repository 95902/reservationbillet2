<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531214024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE voyages_hotels (voyages_id INT NOT NULL, hotels_id INT NOT NULL, INDEX IDX_4561FF8BA170CAB9 (voyages_id), INDEX IDX_4561FF8BF42F66C8 (hotels_id), PRIMARY KEY(voyages_id, hotels_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voyages_agence_location_voitures (voyages_id INT NOT NULL, agence_location_voitures_id INT NOT NULL, INDEX IDX_F25821CBA170CAB9 (voyages_id), INDEX IDX_F25821CB4839DDBC (agence_location_voitures_id), PRIMARY KEY(voyages_id, agence_location_voitures_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voyages_hotels ADD CONSTRAINT FK_4561FF8BA170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_hotels ADD CONSTRAINT FK_4561FF8BF42F66C8 FOREIGN KEY (hotels_id) REFERENCES hotels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_agence_location_voitures ADD CONSTRAINT FK_F25821CBA170CAB9 FOREIGN KEY (voyages_id) REFERENCES voyages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE voyages_agence_location_voitures ADD CONSTRAINT FK_F25821CB4839DDBC FOREIGN KEY (agence_location_voitures_id) REFERENCES agence_location_voitures (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE voyages_hotels');
        $this->addSql('DROP TABLE voyages_agence_location_voitures');
    }
}
