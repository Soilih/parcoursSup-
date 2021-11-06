<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101065237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bourse (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, detail LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecole (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, detail VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, ile VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, adresse VARCHAR(255) NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, nin VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, ile VARCHAR(255) NOT NULL, date_valide DATE NOT NULL, type_identite VARCHAR(255) NOT NULL, pays_delivrance VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, date_experience DATE NOT NULL, poste VARCHAR(255) NOT NULL, entreprise VARCHAR(255) NOT NULL, detail VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, INDEX IDX_590C103A6E44244 (pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours_universitaire (id INT AUTO_INCREMENT NOT NULL, niveau_id INT DEFAULT NULL, universite_id INT DEFAULT NULL, anne_inscription DATE NOT NULL, filiere VARCHAR(255) NOT NULL, mention VARCHAR(255) NOT NULL, fichier VARCHAR(255) NOT NULL, detail VARCHAR(255) NOT NULL, moyenne VARCHAR(255) NOT NULL, titre_univeriste VARCHAR(255) NOT NULL, INDEX IDX_996FC494B3E9C81 (niveau_id), INDEX IDX_996FC4942A52F05F (universite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcous_colaire (id INT AUTO_INCREMENT NOT NULL, ecole_id INT DEFAULT NULL, anne_obtention_bac DATE NOT NULL, serie VARCHAR(255) NOT NULL, mention VARCHAR(255) NOT NULL, moyenne VARCHAR(255) NOT NULL, releve VARCHAR(255) NOT NULL, attestation VARCHAR(255) NOT NULL, INDEX IDX_282E6DAA77EF1B1E (ecole_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, proffession VARCHAR(255) NOT NULL, revenu VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE universite (id INT AUTO_INCREMENT NOT NULL, pays_id INT DEFAULT NULL, type_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, detail LONGTEXT DEFAULT NULL, adresse LONGTEXT NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, site VARCHAR(255) NOT NULL, postal DOUBLE PRECISION NOT NULL, ville VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, filiale VARCHAR(255) DEFAULT NULL, INDEX IDX_B47BD9A3A6E44244 (pays_id), INDEX IDX_B47BD9A3C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE parcours_universitaire ADD CONSTRAINT FK_996FC494B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE parcours_universitaire ADD CONSTRAINT FK_996FC4942A52F05F FOREIGN KEY (universite_id) REFERENCES universite (id)');
        $this->addSql('ALTER TABLE parcous_colaire ADD CONSTRAINT FK_282E6DAA77EF1B1E FOREIGN KEY (ecole_id) REFERENCES ecole (id)');
        $this->addSql('ALTER TABLE universite ADD CONSTRAINT FK_B47BD9A3A6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE universite ADD CONSTRAINT FK_B47BD9A3C54C8C93 FOREIGN KEY (type_id) REFERENCES type_universite (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE parcous_colaire DROP FOREIGN KEY FK_282E6DAA77EF1B1E');
        $this->addSql('ALTER TABLE parcours_universitaire DROP FOREIGN KEY FK_996FC494B3E9C81');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103A6E44244');
        $this->addSql('ALTER TABLE universite DROP FOREIGN KEY FK_B47BD9A3A6E44244');
        $this->addSql('ALTER TABLE parcours_universitaire DROP FOREIGN KEY FK_996FC4942A52F05F');
        $this->addSql('DROP TABLE bourse');
        $this->addSql('DROP TABLE ecole');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE parcours_universitaire');
        $this->addSql('DROP TABLE parcous_colaire');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE responsable');
        $this->addSql('DROP TABLE universite');
    }
}
