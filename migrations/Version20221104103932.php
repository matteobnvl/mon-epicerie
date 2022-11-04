<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104103932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE date_ouverture (id INT AUTO_INCREMENT NOT NULL, lundi VARCHAR(255) NOT NULL, mardi VARCHAR(255) NOT NULL, mercredi VARCHAR(255) NOT NULL, jeudi VARCHAR(255) NOT NULL, vendredi VARCHAR(255) NOT NULL, samedi VARCHAR(255) NOT NULL, dimanche VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE epicerie (id INT AUTO_INCREMENT NOT NULL, nom_epicerie VARCHAR(255) NOT NULL, numero_rue_epicerie INT NOT NULL, nom_rue_epicerie VARCHAR(255) NOT NULL, code_postal_epicerie VARCHAR(255) NOT NULL, ville_epicerie VARCHAR(255) NOT NULL, frais_livraison VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, epicerie_id INT NOT NULL, nom_region VARCHAR(255) NOT NULL, numero_region INT NOT NULL, INDEX IDX_F62F1768C575F0E (epicerie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, nom_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F1768C575F0E FOREIGN KEY (epicerie_id) REFERENCES epicerie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F1768C575F0E');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE date_ouverture');
        $this->addSql('DROP TABLE epicerie');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE type');
    }
}
