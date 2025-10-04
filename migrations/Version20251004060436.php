<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251004060436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, asin VARCHAR(50) NOT NULL, title VARCHAR(500) NOT NULL, price NUMERIC(10, 2) NOT NULL, currency VARCHAR(10) NOT NULL, price_symbol VARCHAR(5) NOT NULL, image VARCHAR(500) NOT NULL, url VARCHAR(500) NOT NULL, description CLOB NOT NULL, category VARCHAR(100) NOT NULL, availability VARCHAR(100) NOT NULL, brand VARCHAR(100) NOT NULL, features CLOB NOT NULL --(DC2Type:json)
        , rating_score NUMERIC(3, 1) NOT NULL, rating_stars NUMERIC(2, 1) NOT NULL, rating_text VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE "user" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE "user"');
    }
}
