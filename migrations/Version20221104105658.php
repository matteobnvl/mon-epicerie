<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104105658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo_epicerie DROP FOREIGN KEY FK_A17E132E944592F9');
        $this->addSql('DROP INDEX IDX_A17E132E944592F9 ON photo_epicerie');
        $this->addSql('ALTER TABLE photo_epicerie CHANGE id_epicerie_id epicerie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo_epicerie ADD CONSTRAINT FK_A17E132E8C575F0E FOREIGN KEY (epicerie_id) REFERENCES epicerie (id)');
        $this->addSql('CREATE INDEX IDX_A17E132E8C575F0E ON photo_epicerie (epicerie_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27944592F9');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC279F34925F');
        $this->addSql('DROP INDEX IDX_29A5EC279F34925F ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC27944592F9 ON produit');
        $this->addSql('ALTER TABLE produit ADD categorie_id INT DEFAULT NULL, ADD epicerie_id INT DEFAULT NULL, DROP id_categorie_id, DROP id_epicerie_id');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC278C575F0E FOREIGN KEY (epicerie_id) REFERENCES epicerie (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC278C575F0E ON produit (epicerie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photo_epicerie DROP FOREIGN KEY FK_A17E132E8C575F0E');
        $this->addSql('DROP INDEX IDX_A17E132E8C575F0E ON photo_epicerie');
        $this->addSql('ALTER TABLE photo_epicerie CHANGE epicerie_id id_epicerie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo_epicerie ADD CONSTRAINT FK_A17E132E944592F9 FOREIGN KEY (id_epicerie_id) REFERENCES epicerie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A17E132E944592F9 ON photo_epicerie (id_epicerie_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC278C575F0E');
        $this->addSql('DROP INDEX IDX_29A5EC27BCF5E72D ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC278C575F0E ON produit');
        $this->addSql('ALTER TABLE produit ADD id_categorie_id INT DEFAULT NULL, ADD id_epicerie_id INT DEFAULT NULL, DROP categorie_id, DROP epicerie_id');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27944592F9 FOREIGN KEY (id_epicerie_id) REFERENCES epicerie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC279F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_29A5EC279F34925F ON produit (id_categorie_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27944592F9 ON produit (id_epicerie_id)');
    }
}
