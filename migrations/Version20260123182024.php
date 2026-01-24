<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260123182024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP CONSTRAINT FK_23A0E66F675F31B');
        $this->addSql('ALTER TABLE article RENAME COLUMN "createdAt" TO created_at');
        $this->addSql('ALTER TABLE article RENAME COLUMN "deletedAt" TO deleted_at');
        $this->addSql('ALTER TABLE article RENAME COLUMN "articleBody" TO article_body');
        $this->addSql('ALTER TABLE article RENAME COLUMN "dateAdded" TO date_added');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66F675F31B FOREIGN KEY (author_id) REFERENCES "User" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE article DROP CONSTRAINT fk_23a0e66f675f31b');
        $this->addSql('ALTER TABLE article RENAME COLUMN created_at TO "createdAt"');
        $this->addSql('ALTER TABLE article RENAME COLUMN deleted_at TO "deletedAt"');
        $this->addSql('ALTER TABLE article RENAME COLUMN article_body TO "articleBody"');
        $this->addSql('ALTER TABLE article RENAME COLUMN date_added TO "dateAdded"');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT fk_23a0e66f675f31b FOREIGN KEY (author_id) REFERENCES "User" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
