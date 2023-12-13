<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231210194406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE despesa ADD fornecedor_id INT NOT NULL, ADD categoria_id INT NOT NULL');
        $this->addSql('ALTER TABLE despesa ADD CONSTRAINT FK_1F5A61D2D3EBB69D FOREIGN KEY (fornecedor_id) REFERENCES fornecedor (id)');
        $this->addSql('ALTER TABLE despesa ADD CONSTRAINT FK_1F5A61D23397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_1F5A61D2D3EBB69D ON despesa (fornecedor_id)');
        $this->addSql('CREATE INDEX IDX_1F5A61D23397707A ON despesa (categoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE despesa DROP FOREIGN KEY FK_1F5A61D2D3EBB69D');
        $this->addSql('ALTER TABLE despesa DROP FOREIGN KEY FK_1F5A61D23397707A');
        $this->addSql('DROP INDEX IDX_1F5A61D2D3EBB69D ON despesa');
        $this->addSql('DROP INDEX IDX_1F5A61D23397707A ON despesa');
        $this->addSql('ALTER TABLE despesa DROP fornecedor_id, DROP categoria_id');
    }
}
