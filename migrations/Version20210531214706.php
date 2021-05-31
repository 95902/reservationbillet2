<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531214706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vols_compagnies (vols_id INT NOT NULL, compagnies_id INT NOT NULL, INDEX IDX_BEA8033B573E0EFC (vols_id), INDEX IDX_BEA8033B5F9EE3CE (compagnies_id), PRIMARY KEY(vols_id, compagnies_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols_type_vols (vols_id INT NOT NULL, type_vols_id INT NOT NULL, INDEX IDX_F5CB3F2B573E0EFC (vols_id), INDEX IDX_F5CB3F2B7F1F6109 (type_vols_id), PRIMARY KEY(vols_id, type_vols_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vols_compagnies ADD CONSTRAINT FK_BEA8033B573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_compagnies ADD CONSTRAINT FK_BEA8033B5F9EE3CE FOREIGN KEY (compagnies_id) REFERENCES compagnies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_type_vols ADD CONSTRAINT FK_F5CB3F2B573E0EFC FOREIGN KEY (vols_id) REFERENCES vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols_type_vols ADD CONSTRAINT FK_F5CB3F2B7F1F6109 FOREIGN KEY (type_vols_id) REFERENCES type_vols (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vols ADD ville_depart_id INT NOT NULL, ADD ville_arrive_id INT NOT NULL');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C497832A6 FOREIGN KEY (ville_depart_id) REFERENCES destinations (id)');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C13784AA5 FOREIGN KEY (ville_arrive_id) REFERENCES destinations (id)');
        $this->addSql('CREATE INDEX IDX_2CDFA86C497832A6 ON vols (ville_depart_id)');
        $this->addSql('CREATE INDEX IDX_2CDFA86C13784AA5 ON vols (ville_arrive_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE vols_compagnies');
        $this->addSql('DROP TABLE vols_type_vols');
        $this->addSql('ALTER TABLE vols DROP FOREIGN KEY FK_2CDFA86C497832A6');
        $this->addSql('ALTER TABLE vols DROP FOREIGN KEY FK_2CDFA86C13784AA5');
        $this->addSql('DROP INDEX IDX_2CDFA86C497832A6 ON vols');
        $this->addSql('DROP INDEX IDX_2CDFA86C13784AA5 ON vols');
        $this->addSql('ALTER TABLE vols DROP ville_depart_id, DROP ville_arrive_id');
    }
}
