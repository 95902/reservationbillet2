<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210531215941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE related_voyage (id INT AUTO_INCREMENT NOT NULL, voyage_id INT NOT NULL, INDEX IDX_9351F1F368C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reviews_product (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, voyage_id INT NOT NULL, note INT NOT NULL, comment LONGTEXT DEFAULT NULL, INDEX IDX_E0851D6CA76ED395 (user_id), INDEX IDX_E0851D6C68C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE related_voyage ADD CONSTRAINT FK_9351F1F368C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyages (id)');
        $this->addSql('ALTER TABLE reviews_product ADD CONSTRAINT FK_E0851D6CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reviews_product ADD CONSTRAINT FK_E0851D6C68C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyages (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE related_voyage');
        $this->addSql('DROP TABLE reviews_product');
    }
}
