<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240328133350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ficherais (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT DEFAULT NULL, mois VARCHAR(20) NOT NULL, nb_justificatifs INT NOT NULL, montant_valide NUMERIC(10, 2) NOT NULL, date_modif DATE NOT NULL, INDEX IDX_FCEF4D0AC6EE5C49 (id_utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fraisforfait (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, montant NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lignefraisforfait (id INT AUTO_INCREMENT NOT NULL, id_fiche_id INT DEFAULT NULL, id_frais_forfait_id INT DEFAULT NULL, quantite INT NOT NULL, UNIQUE INDEX UNIQ_ED4F43428F89C99D (id_fiche_id), INDEX IDX_ED4F434298FA628F (id_frais_forfait_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lignefraishorsforfait (id INT AUTO_INCREMENT NOT NULL, id_fiche_id INT DEFAULT NULL, libelle VARCHAR(100) NOT NULL, date DATE NOT NULL, montant NUMERIC(10, 2) NOT NULL, UNIQUE INDEX UNIQ_8543E1458F89C99D (id_fiche_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, prenom VARCHAR(30) NOT NULL, adresse VARCHAR(255) NOT NULL, cp VARCHAR(6) NOT NULL, ville VARCHAR(40) NOT NULL, date_embauche DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ficherais ADD CONSTRAINT FK_FCEF4D0AC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE lignefraisforfait ADD CONSTRAINT FK_ED4F43428F89C99D FOREIGN KEY (id_fiche_id) REFERENCES ficherais (id)');
        $this->addSql('ALTER TABLE lignefraisforfait ADD CONSTRAINT FK_ED4F434298FA628F FOREIGN KEY (id_frais_forfait_id) REFERENCES fraisforfait (id)');
        $this->addSql('ALTER TABLE lignefraishorsforfait ADD CONSTRAINT FK_8543E1458F89C99D FOREIGN KEY (id_fiche_id) REFERENCES ficherais (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficherais DROP FOREIGN KEY FK_FCEF4D0AC6EE5C49');
        $this->addSql('ALTER TABLE lignefraisforfait DROP FOREIGN KEY FK_ED4F43428F89C99D');
        $this->addSql('ALTER TABLE lignefraisforfait DROP FOREIGN KEY FK_ED4F434298FA628F');
        $this->addSql('ALTER TABLE lignefraishorsforfait DROP FOREIGN KEY FK_8543E1458F89C99D');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE ficherais');
        $this->addSql('DROP TABLE fraisforfait');
        $this->addSql('DROP TABLE lignefraisforfait');
        $this->addSql('DROP TABLE lignefraishorsforfait');
        $this->addSql('DROP TABLE utilisateur');
    }
}
