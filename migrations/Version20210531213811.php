<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531213811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence_location_voitures_destinations (agence_location_voitures_id INT NOT NULL, destinations_id INT NOT NULL, INDEX IDX_7C7EE0684839DDBC (agence_location_voitures_id), INDEX IDX_7C7EE068912C90D4 (destinations_id), PRIMARY KEY(agence_location_voitures_id, destinations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hotels_destinations (hotels_id INT NOT NULL, destinations_id INT NOT NULL, INDEX IDX_14EC86B2F42F66C8 (hotels_id), INDEX IDX_14EC86B2912C90D4 (destinations_id), PRIMARY KEY(hotels_id, destinations_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agence_location_voitures_destinations ADD CONSTRAINT FK_7C7EE0684839DDBC FOREIGN KEY (agence_location_voitures_id) REFERENCES agence_location_voitures (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agence_location_voitures_destinations ADD CONSTRAINT FK_7C7EE068912C90D4 FOREIGN KEY (destinations_id) REFERENCES destinations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotels_destinations ADD CONSTRAINT FK_14EC86B2F42F66C8 FOREIGN KEY (hotels_id) REFERENCES hotels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE hotels_destinations ADD CONSTRAINT FK_14EC86B2912C90D4 FOREIGN KEY (destinations_id) REFERENCES destinations (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agence_location_voitures_destinations');
        $this->addSql('DROP TABLE hotels_destinations');
    }
}
