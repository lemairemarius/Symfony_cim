<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109135658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_cimetiere (carte_id INT NOT NULL, cimetiere_id INT NOT NULL, PRIMARY KEY(carte_id, cimetiere_id))');
        $this->addSql('CREATE INDEX IDX_3D991A0AC9C7CEB6 ON carte_cimetiere (carte_id)');
        $this->addSql('CREATE INDEX IDX_3D991A0A458A3B08 ON carte_cimetiere (cimetiere_id)');
        $this->addSql('ALTER TABLE carte_cimetiere ADD CONSTRAINT FK_3D991A0AC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE carte_cimetiere ADD CONSTRAINT FK_3D991A0A458A3B08 FOREIGN KEY (cimetiere_id) REFERENCES cimetiere (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE carte_cimetiere');
    }
}
