<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211109141657 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE cim_am_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cimetiere1_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cimetiere_am_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE cim_am (id INT NOT NULL, cim1 VARCHAR(255) NOT NULL, acce1 BOOLEAN NOT NULL, cim2 VARCHAR(255) NOT NULL, acce2 BOOLEAN NOT NULL, cim3 VARCHAR(255) NOT NULL, acce3 BOOLEAN NOT NULL, cim4 VARCHAR(255) NOT NULL, acce4 BOOLEAN NOT NULL, cim5 VARCHAR(255) NOT NULL, acce5 BOOLEAN NOT NULL, cim6 VARCHAR(255) NOT NULL, acce6 BOOLEAN NOT NULL, cim7 VARCHAR(255) NOT NULL, acce7 BOOLEAN NOT NULL, cim8 VARCHAR(255) NOT NULL, acce8 BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cimetiere1 (id INT NOT NULL, cim1 VARCHAR(255) NOT NULL, acce1 BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE cimetiere_am (id INT NOT NULL, cim1 VARCHAR(255) NOT NULL, acce1 BOOLEAN NOT NULL, cim2 VARCHAR(255) NOT NULL, acce2 BOOLEAN NOT NULL, cim3 VARCHAR(255) NOT NULL, acce3 VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE cim_am_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cimetiere1_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cimetiere_am_id_seq CASCADE');
        $this->addSql('DROP TABLE cim_am');
        $this->addSql('DROP TABLE cimetiere1');
        $this->addSql('DROP TABLE cimetiere_am');
    }
}
