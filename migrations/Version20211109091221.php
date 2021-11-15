<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109091221 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE carte_cimetiere');
        $this->addSql('ALTER TABLE carte ADD acces_c_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFDB8CD1DF9 FOREIGN KEY (acces_c_id) REFERENCES cimetiere (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_BAD4FFFDB8CD1DF9 ON carte (acces_c_id)');
        $this->addSql('ALTER TABLE cimetiere ALTER nom_cim SET NOT NULL');
        $this->addSql('ALTER TABLE cimetiere ALTER adress_cim SET NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE carte_cimetiere (carte_id INT NOT NULL, cimetiere_id INT NOT NULL, PRIMARY KEY(carte_id, cimetiere_id))');
        $this->addSql('CREATE INDEX idx_3d991a0a458a3b08 ON carte_cimetiere (cimetiere_id)');
        $this->addSql('CREATE INDEX idx_3d991a0ac9c7ceb6 ON carte_cimetiere (carte_id)');
        $this->addSql('ALTER TABLE carte_cimetiere ADD CONSTRAINT fk_3d991a0ac9c7ceb6 FOREIGN KEY (carte_id) REFERENCES carte (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE carte_cimetiere ADD CONSTRAINT fk_3d991a0a458a3b08 FOREIGN KEY (cimetiere_id) REFERENCES cimetiere (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cimetiere ALTER nom_cim DROP NOT NULL');
        $this->addSql('ALTER TABLE cimetiere ALTER adress_cim DROP NOT NULL');
        $this->addSql('ALTER TABLE carte DROP CONSTRAINT FK_BAD4FFFDB8CD1DF9');
        $this->addSql('DROP INDEX IDX_BAD4FFFDB8CD1DF9');
        $this->addSql('ALTER TABLE carte DROP acces_c_id');
    }
}
