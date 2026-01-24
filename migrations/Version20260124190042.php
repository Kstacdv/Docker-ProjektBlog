<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260124190042 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "User" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "User" (email)');
        $this->addSql('CREATE TABLE article (id SERIAL NOT NULL, author_id INT NOT NULL, title VARCHAR(80) NOT NULL, created_at DATE NOT NULL, deleted_at DATE DEFAULT NULL, tags VARCHAR(255) NOT NULL, article_body TEXT DEFAULT NULL, date_added DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_23A0E66F675F31B ON article (author_id)');
        $this->addSql('COMMENT ON COLUMN article.created_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN article.deleted_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('CREATE TABLE database (id SERIAL NOT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(255) DEFAULT NULL, date_created INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F675F31B FOREIGN KEY (author_id) REFERENCES "User" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE article DROP CONSTRAINT FK_23A0E66F675F31B');
        $this->addSql('DROP TABLE "User"');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE database');
    }
}
