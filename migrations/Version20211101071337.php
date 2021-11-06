<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101071337 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flux (id INT AUTO_INCREMENT NOT NULL, universite_id INT DEFAULT NULL, pays_id INT DEFAULT NULL, niveau_actuel_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, depart DATE NOT NULL, filiere VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, titre_universite VARCHAR(255) NOT NULL, INDEX IDX_7252313A2A52F05F (universite_id), INDEX IDX_7252313AA6E44244 (pays_id), INDEX IDX_7252313A5B4E0609 (niveau_actuel_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE flux ADD CONSTRAINT FK_7252313A2A52F05F FOREIGN KEY (universite_id) REFERENCES universite (id)');
        $this->addSql('ALTER TABLE flux ADD CONSTRAINT FK_7252313AA6E44244 FOREIGN KEY (pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE flux ADD CONSTRAINT FK_7252313A5B4E0609 FOREIGN KEY (niveau_actuel_id) REFERENCES niveau (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE flux');
    }
}
