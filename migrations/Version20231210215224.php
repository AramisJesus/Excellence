<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231210215224 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ganho ADD cliente_id INT NOT NULL, ADD categoria_id INT NOT NULL');
        $this->addSql('ALTER TABLE ganho ADD CONSTRAINT FK_5CCAB76ADE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE ganho ADD CONSTRAINT FK_5CCAB76A3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_5CCAB76ADE734E51 ON ganho (cliente_id)');
        $this->addSql('CREATE INDEX IDX_5CCAB76A3397707A ON ganho (categoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ganho DROP FOREIGN KEY FK_5CCAB76ADE734E51');
        $this->addSql('ALTER TABLE ganho DROP FOREIGN KEY FK_5CCAB76A3397707A');
        $this->addSql('DROP INDEX IDX_5CCAB76ADE734E51 ON ganho');
        $this->addSql('DROP INDEX IDX_5CCAB76A3397707A ON ganho');
        $this->addSql('ALTER TABLE ganho DROP cliente_id, DROP categoria_id');
    }
}
