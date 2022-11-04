<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221104105510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA41813BD72');
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA41BD125E3');
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA486FF2355');
        $this->addSql('DROP INDEX IDX_32420CA41BD125E3 ON epicerie');
        $this->addSql('DROP INDEX IDX_32420CA486FF2355 ON epicerie');
        $this->addSql('DROP INDEX IDX_32420CA41813BD72 ON epicerie');
        $this->addSql('ALTER TABLE epicerie ADD date_ouverture_id INT DEFAULT NULL, ADD type_id INT DEFAULT NULL, DROP id_date_ouverture_id, DROP id_type_id, CHANGE id_region_id region_id INT NOT NULL');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA498260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA477C84B42 FOREIGN KEY (date_ouverture_id) REFERENCES date_ouverture (id)');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA4C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_32420CA498260155 ON epicerie (region_id)');
        $this->addSql('CREATE INDEX IDX_32420CA477C84B42 ON epicerie (date_ouverture_id)');
        $this->addSql('CREATE INDEX IDX_32420CA4C54C8C93 ON epicerie (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA498260155');
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA477C84B42');
        $this->addSql('ALTER TABLE epicerie DROP FOREIGN KEY FK_32420CA4C54C8C93');
        $this->addSql('DROP INDEX IDX_32420CA498260155 ON epicerie');
        $this->addSql('DROP INDEX IDX_32420CA477C84B42 ON epicerie');
        $this->addSql('DROP INDEX IDX_32420CA4C54C8C93 ON epicerie');
        $this->addSql('ALTER TABLE epicerie ADD id_date_ouverture_id INT DEFAULT NULL, ADD id_type_id INT DEFAULT NULL, DROP date_ouverture_id, DROP type_id, CHANGE region_id id_region_id INT NOT NULL');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA41813BD72 FOREIGN KEY (id_region_id) REFERENCES region (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA41BD125E3 FOREIGN KEY (id_type_id) REFERENCES type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE epicerie ADD CONSTRAINT FK_32420CA486FF2355 FOREIGN KEY (id_date_ouverture_id) REFERENCES date_ouverture (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_32420CA41BD125E3 ON epicerie (id_type_id)');
        $this->addSql('CREATE INDEX IDX_32420CA486FF2355 ON epicerie (id_date_ouverture_id)');
        $this->addSql('CREATE INDEX IDX_32420CA41813BD72 ON epicerie (id_region_id)');
    }
}
