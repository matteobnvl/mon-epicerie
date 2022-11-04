<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104105109 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE epicerie (id INT AUTO_INCREMENT NOT NULL, id_region_id INT NOT NULL, id_date_ouverture_id INT DEFAULT NULL, id_type_id INT DEFAULT NULL, nom_epicerie VARCHAR(255) NOT NULL, numero_rue_epicerie INT NOT NULL, nom_rue_epicerie VARCHAR(255) NOT NULL, code_postal_epicerie VARCHAR(255) NOT NULL, ville_epicerie VARCHAR(255) NOT NULL, frais_livraison TINYINT(1) DEFAULT NULL, INDEX IDX_32420CA41813BD72 (id_region_id), INDEX IDX_32420CA486FF2355 (id_date_ouverture_id), INDEX IDX_32420CA41BD125E3 (id_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_epicerie (id INT AUTO_INCREMENT NOT NULL, id_epicerie_id INT DEFAULT NULL, nom_photo VARCHAR(255) NOT NULL, lien_photo VARCHAR(255) NOT NULL, INDEX IDX_A17E132E944592F9 (id_epicerie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT DEFAULT NULL, id_epicerie_id INT DEFAULT NULL, nom_produit VARCHAR(255) NOT NULL, prix_produit INT NOT NULL, description_produit VARCHAR(255) NOT NULL, photo_produit VARCHAR(255) DEFAULT NULL, INDEX IDX_29A5EC279F34925F (id_categorie_id), INDEX IDX_29A5EC27944592F9 (id_epicerie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom_region VARCHAR(255) NOT NULL, numero_region INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA41813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA486FF2355 FOREIGN KEY (id_date_ouverture_id) REFERENCES date_ouverture (id)');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA41BD125E3 FOREIGN KEY (id_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE photo_epicerie ADD CONSTRAINT FK_A17E132E944592F9 FOREIGN KEY (id_epicerie_id) REFERENCES epicerie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC279F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27944592F9 FOREIGN KEY (id_epicerie_id) REFERENCES epicerie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA41813BD72');
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA486FF2355');
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA41BD125E3');
        $this->addSql('ALTER TABLE photo_epicerie DROP FOREIGN KEY FK_A17E132E944592F9');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC279F34925F');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27944592F9');
        $this->addSql('DROP TABLE epicerie');
        $this->addSql('DROP TABLE photo_epicerie');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE region');
    }
}
