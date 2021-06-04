<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210604123149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "Cart" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, reference VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, delivery_address CLOB NOT NULL, is_paid BOOLEAN NOT NULL, more_informations CLOB DEFAULT NULL, created_at DATETIME NOT NULL, quantity INTEGER NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_AB912789A76ED395 ON "Cart" (user_id)');
        $this->addSql('CREATE TABLE address (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, full_name VARCHAR(255) NOT NULL, campany VARCHAR(255) DEFAULT NULL, address CLOB NOT NULL, complement CLOB DEFAULT NULL, phone INTEGER NOT NULL, city VARCHAR(255) NOT NULL, code_postal INTEGER NOT NULL, contry VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D4E6F81A76ED395 ON address (user_id)');
        $this->addSql('CREATE TABLE agence_location_voitures (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL, prix_jours DOUBLE PRECISION NOT NULL, image VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE agence_location_voitures_voitures (agence_location_voitures_id INTEGER NOT NULL, voitures_id INTEGER NOT NULL, PRIMARY KEY(agence_location_voitures_id, voitures_id))');
        $this->addSql('CREATE INDEX IDX_229E024839DDBC ON agence_location_voitures_voitures (agence_location_voitures_id)');
        $this->addSql('CREATE INDEX IDX_229E02CCC4661F ON agence_location_voitures_voitures (voitures_id)');
        $this->addSql('CREATE TABLE agence_location_voitures_destinations (agence_location_voitures_id INTEGER NOT NULL, destinations_id INTEGER NOT NULL, PRIMARY KEY(agence_location_voitures_id, destinations_id))');
        $this->addSql('CREATE INDEX IDX_7C7EE0684839DDBC ON agence_location_voitures_destinations (agence_location_voitures_id)');
        $this->addSql('CREATE INDEX IDX_7C7EE068912C90D4 ON agence_location_voitures_destinations (destinations_id)');
        $this->addSql('CREATE TABLE cart_details (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, carts_id INTEGER NOT NULL, product_name VARCHAR(255) NOT NULL, product_price DOUBLE PRECISION NOT NULL, quantity INTEGER NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_89FCC38DBCB5C6F5 ON cart_details (carts_id)');
        $this->addSql('CREATE TABLE compagnies (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE destinations (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_ville VARCHAR(255) NOT NULL, nom_pays VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE hotels (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL, prix_nuit DOUBLE PRECISION NOT NULL, is_all_include BOOLEAN DEFAULT NULL, is_spa BOOLEAN DEFAULT NULL, is_wifi BOOLEAN DEFAULT NULL, is_piscine BOOLEAN DEFAULT NULL, addresse VARCHAR(255) NOT NULL, maps CLOB NOT NULL, prix VARCHAR(255) DEFAULT NULL, is_plage BOOLEAN DEFAULT NULL, is_clim BOOLEAN DEFAULT NULL, is_sport BOOLEAN DEFAULT NULL, is_bar BOOLEAN DEFAULT NULL, is_restaurant BOOLEAN DEFAULT NULL, is_parking BOOLEAN DEFAULT NULL)');
        $this->addSql('CREATE TABLE hotels_destinations (hotels_id INTEGER NOT NULL, destinations_id INTEGER NOT NULL, PRIMARY KEY(hotels_id, destinations_id))');
        $this->addSql('CREATE INDEX IDX_14EC86B2F42F66C8 ON hotels_destinations (hotels_id)');
        $this->addSql('CREATE INDEX IDX_14EC86B2912C90D4 ON hotels_destinations (destinations_id)');
        $this->addSql('CREATE TABLE "order" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, reference VARCHAR(255) NOT NULL, full_name VARCHAR(255) NOT NULL, delivery_address CLOB NOT NULL, is_paid BOOLEAN NOT NULL, more_informations CLOB DEFAULT NULL, created_at DATETIME NOT NULL, quantity INTEGER NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_F5299398A76ED395 ON "order" (user_id)');
        $this->addSql('CREATE TABLE order_details (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, orders_id INTEGER NOT NULL, product_name VARCHAR(255) NOT NULL, product_price DOUBLE PRECISION NOT NULL, quantity INTEGER NOT NULL, sub_total_ht DOUBLE PRECISION NOT NULL, taxe DOUBLE PRECISION NOT NULL, sub_total_ttc DOUBLE PRECISION NOT NULL)');
        $this->addSql('CREATE INDEX IDX_845CA2C1CFFE9AD6 ON order_details (orders_id)');
        $this->addSql('CREATE TABLE related_voyage (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, voyage_id INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_9351F1F368C9E5AF ON related_voyage (voyage_id)');
        $this->addSql('CREATE TABLE reset_password_request (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , expires_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_7CE748AA76ED395 ON reset_password_request (user_id)');
        $this->addSql('CREATE TABLE reviews_product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, voyage_id INTEGER NOT NULL, note INTEGER NOT NULL, comment CLOB DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_E0851D6CA76ED395 ON reviews_product (user_id)');
        $this->addSql('CREATE INDEX IDX_E0851D6C68C9E5AF ON reviews_product (voyage_id)');
        $this->addSql('CREATE TABLE type_vols (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, is_verified BOOLEAN NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE voitures (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, is_clim BOOLEAN DEFAULT NULL, is_auto BOOLEAN NOT NULL, is_manuel BOOLEAN DEFAULT NULL, is_bagage BOOLEAN DEFAULT NULL)');
        $this->addSql('CREATE TABLE vols (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ville_depart_id INTEGER NOT NULL, ville_arrive_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2CDFA86C497832A6 ON vols (ville_depart_id)');
        $this->addSql('CREATE INDEX IDX_2CDFA86C13784AA5 ON vols (ville_arrive_id)');
        $this->addSql('CREATE TABLE vols_compagnies (vols_id INTEGER NOT NULL, compagnies_id INTEGER NOT NULL, PRIMARY KEY(vols_id, compagnies_id))');
        $this->addSql('CREATE INDEX IDX_BEA8033B573E0EFC ON vols_compagnies (vols_id)');
        $this->addSql('CREATE INDEX IDX_BEA8033B5F9EE3CE ON vols_compagnies (compagnies_id)');
        $this->addSql('CREATE TABLE vols_type_vols (vols_id INTEGER NOT NULL, type_vols_id INTEGER NOT NULL, PRIMARY KEY(vols_id, type_vols_id))');
        $this->addSql('CREATE INDEX IDX_F5CB3F2B573E0EFC ON vols_type_vols (vols_id)');
        $this->addSql('CREATE INDEX IDX_F5CB3F2B7F1F6109 ON vols_type_vols (type_vols_id)');
        $this->addSql('CREATE TABLE voyages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL, prix INTEGER NOT NULL, duree INTEGER NOT NULL, image VARCHAR(255) NOT NULL, is_special_offert BOOLEAN DEFAULT NULL, quantite INTEGER NOT NULL, created_at DATETIME NOT NULL, tags CLOB DEFAULT NULL, slug VARCHAR(255) NOT NULL, maps CLOB NOT NULL)');
        $this->addSql('CREATE TABLE voyages_destinations (voyages_id INTEGER NOT NULL, destinations_id INTEGER NOT NULL, PRIMARY KEY(voyages_id, destinations_id))');
        $this->addSql('CREATE INDEX IDX_F21C3E96A170CAB9 ON voyages_destinations (voyages_id)');
        $this->addSql('CREATE INDEX IDX_F21C3E96912C90D4 ON voyages_destinations (destinations_id)');
        $this->addSql('CREATE TABLE voyages_hotels (voyages_id INTEGER NOT NULL, hotels_id INTEGER NOT NULL, PRIMARY KEY(voyages_id, hotels_id))');
        $this->addSql('CREATE INDEX IDX_4561FF8BA170CAB9 ON voyages_hotels (voyages_id)');
        $this->addSql('CREATE INDEX IDX_4561FF8BF42F66C8 ON voyages_hotels (hotels_id)');
        $this->addSql('CREATE TABLE voyages_agence_location_voitures (voyages_id INTEGER NOT NULL, agence_location_voitures_id INTEGER NOT NULL, PRIMARY KEY(voyages_id, agence_location_voitures_id))');
        $this->addSql('CREATE INDEX IDX_F25821CBA170CAB9 ON voyages_agence_location_voitures (voyages_id)');
        $this->addSql('CREATE INDEX IDX_F25821CB4839DDBC ON voyages_agence_location_voitures (agence_location_voitures_id)');
        $this->addSql('CREATE TABLE voyages_vols (voyages_id INTEGER NOT NULL, vols_id INTEGER NOT NULL, PRIMARY KEY(voyages_id, vols_id))');
        $this->addSql('CREATE INDEX IDX_B0421D5A170CAB9 ON voyages_vols (voyages_id)');
        $this->addSql('CREATE INDEX IDX_B0421D5573E0EFC ON voyages_vols (vols_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE "Cart"');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE agence_location_voitures');
        $this->addSql('DROP TABLE agence_location_voitures_voitures');
        $this->addSql('DROP TABLE agence_location_voitures_destinations');
        $this->addSql('DROP TABLE cart_details');
        $this->addSql('DROP TABLE compagnies');
        $this->addSql('DROP TABLE destinations');
        $this->addSql('DROP TABLE hotels');
        $this->addSql('DROP TABLE hotels_destinations');
        $this->addSql('DROP TABLE "order"');
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
