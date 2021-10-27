<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211027084559 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gestionnaire_utilisateurs (gestionnaire_id INT NOT NULL, utilisateurs_id INT NOT NULL, PRIMARY KEY(gestionnaire_id, utilisateurs_id))');
        $this->addSql('CREATE INDEX IDX_FA8EAEBF6885AC1B ON gestionnaire_utilisateurs (gestionnaire_id)');
        $this->addSql('CREATE INDEX IDX_FA8EAEBF1E969C5 ON gestionnaire_utilisateurs (utilisateurs_id)');
        $this->addSql('ALTER TABLE gestionnaire_utilisateurs ADD CONSTRAINT FK_FA8EAEBF6885AC1B FOREIGN KEY (gestionnaire_id) REFERENCES gestionnaire (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE gestionnaire_utilisateurs ADD CONSTRAINT FK_FA8EAEBF1E969C5 FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE gestionnaire_utilisateurs');
    }
}
