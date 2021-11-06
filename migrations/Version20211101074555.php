<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211101074555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bourse ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bourse ADD CONSTRAINT FK_DDC2BC1CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_DDC2BC1CA76ED395 ON bourse (user_id)');
        $this->addSql('ALTER TABLE etudiant ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_717E22E3A76ED395 ON etudiant (user_id)');
        $this->addSql('ALTER TABLE experience ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_590C103A76ED395 ON experience (user_id)');
        $this->addSql('ALTER TABLE flux ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE flux ADD CONSTRAINT FK_7252313AA76ED395 FOREIGN KEY (user_id) REFERENCES flux (id)');
        $this->addSql('CREATE INDEX IDX_7252313AA76ED395 ON flux (user_id)');
        $this->addSql('ALTER TABLE langue ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE langue ADD CONSTRAINT FK_9357758EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9357758EA76ED395 ON langue (user_id)');
        $this->addSql('ALTER TABLE parcours_universitaire ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parcours_universitaire ADD CONSTRAINT FK_996FC494A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_996FC494A76ED395 ON parcours_universitaire (user_id)');
        $this->addSql('ALTER TABLE parcous_colaire ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parcous_colaire ADD CONSTRAINT FK_282E6DAAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_282E6DAAA76ED395 ON parcous_colaire (user_id)');
        $this->addSql('ALTER TABLE responsable ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE responsable ADD CONSTRAINT FK_52520D07A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_52520D07A76ED395 ON responsable (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bourse DROP FOREIGN KEY FK_DDC2BC1CA76ED395');
        $this->addSql('DROP INDEX IDX_DDC2BC1CA76ED395 ON bourse');
        $this->addSql('ALTER TABLE bourse DROP user_id');
        $this->addSql('ALTER TABLE etudiant DROP FOREIGN KEY FK_717E22E3A76ED395');
        $this->addSql('DROP INDEX IDX_717E22E3A76ED395 ON etudiant');
        $this->addSql('ALTER TABLE etudiant DROP user_id');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103A76ED395');
        $this->addSql('DROP INDEX IDX_590C103A76ED395 ON experience');
        $this->addSql('ALTER TABLE experience DROP user_id');
        $this->addSql('ALTER TABLE flux DROP FOREIGN KEY FK_7252313AA76ED395');
        $this->addSql('DROP INDEX IDX_7252313AA76ED395 ON flux');
        $this->addSql('ALTER TABLE flux DROP user_id');
        $this->addSql('ALTER TABLE langue DROP FOREIGN KEY FK_9357758EA76ED395');
        $this->addSql('DROP INDEX IDX_9357758EA76ED395 ON langue');
        $this->addSql('ALTER TABLE langue DROP user_id');
        $this->addSql('ALTER TABLE parcours_universitaire DROP FOREIGN KEY FK_996FC494A76ED395');
        $this->addSql('DROP INDEX IDX_996FC494A76ED395 ON parcours_universitaire');
        $this->addSql('ALTER TABLE parcours_universitaire DROP user_id');
        $this->addSql('ALTER TABLE parcous_colaire DROP FOREIGN KEY FK_282E6DAAA76ED395');
        $this->addSql('DROP INDEX IDX_282E6DAAA76ED395 ON parcous_colaire');
        $this->addSql('ALTER TABLE parcous_colaire DROP user_id');
        $this->addSql('ALTER TABLE responsable DROP FOREIGN KEY FK_52520D07A76ED395');
        $this->addSql('DROP INDEX IDX_52520D07A76ED395 ON responsable');
        $this->addSql('ALTER TABLE responsable DROP user_id');
    }
}
