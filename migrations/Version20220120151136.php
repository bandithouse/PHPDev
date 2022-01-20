<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220120151136 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('
             CREATE SEQUENCE product_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
             CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1;
             CREATE TABLE product (id INT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(20) NOT NULL, symbol VARCHAR(4) NOT NULL, PRIMARY KEY(id));
             CREATE UNIQUE INDEX UNIQ_D34A04AD5E237E06 ON product (name);
             CREATE UNIQUE INDEX UNIQ_D34A04ADECC836F9 ON product (symbol);
             CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id);
             CREATE TABLE category (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id));
             CREATE UNIQUE INDEX UNIQ_64C19C15E237E06 ON category (name);
             ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE;
        ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
