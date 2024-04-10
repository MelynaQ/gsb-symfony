<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240402083829 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficherais ADD id_etat_id INT NOT NULL');
        $this->addSql('ALTER TABLE ficherais ADD CONSTRAINT FK_FCEF4D0AD3C32F8F FOREIGN KEY (id_etat_id) REFERENCES etat (id)');
        $this->addSql('CREATE INDEX IDX_FCEF4D0AD3C32F8F ON ficherais (id_etat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficherais DROP FOREIGN KEY FK_FCEF4D0AD3C32F8F');
        $this->addSql('DROP INDEX IDX_FCEF4D0AD3C32F8F ON ficherais');
        $this->addSql('ALTER TABLE ficherais DROP id_etat_id');
    }
}
