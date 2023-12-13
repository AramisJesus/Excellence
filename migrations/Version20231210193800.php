<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231210193800 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receita ADD cliente_id INT NOT NULL, ADD categoria_id INT NOT NULL');
        $this->addSql('ALTER TABLE receita ADD CONSTRAINT FK_5A2897AADE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE receita ADD CONSTRAINT FK_5A2897AA3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_5A2897AADE734E51 ON receita (cliente_id)');
        $this->addSql('CREATE INDEX IDX_5A2897AA3397707A ON receita (categoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE receita DROP FOREIGN KEY FK_5A2897AADE734E51');
        $this->addSql('ALTER TABLE receita DROP FOREIGN KEY FK_5A2897AA3397707A');
        $this->addSql('DROP INDEX IDX_5A2897AADE734E51 ON receita');
        $this->addSql('DROP INDEX IDX_5A2897AA3397707A ON receita');
        $this->addSql('ALTER TABLE receita DROP cliente_id, DROP categoria_id');
    }
}
