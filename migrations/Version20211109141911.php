<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109141911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cimetiere1 (id INT NOT NULL, cim1 VARCHAR(255) NOT NULL, acce1 BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cimetiere_am (id INT NOT NULL, cim1 VARCHAR(255) NOT NULL, acce1 BOOLEAN NOT NULL, cim2 VARCHAR(255) NOT NULL, acce2 BOOLEAN NOT NULL, cim3 VARCHAR(255) NOT NULL, acce3 VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE cim_am ADD carte_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cim_am ADD CONSTRAINT FK_4AC9C83BC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4AC9C83BC9C7CEB6 ON cim_am (carte_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE cimetiere1');
        $this->addSql('DROP TABLE cimetiere_am');
        $this->addSql('ALTER TABLE cim_am DROP CONSTRAINT FK_4AC9C83BC9C7CEB6');
        $this->addSql('DROP INDEX IDX_4AC9C83BC9C7CEB6');
        $this->addSql('ALTER TABLE cim_am DROP carte_id');
    }
}
