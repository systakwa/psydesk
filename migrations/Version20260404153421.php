<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260404153421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fiche (id INT AUTO_INCREMENT NOT NULL, texte_fiche VARCHAR(255) NOT NULL, date DATETIME NOT NULL, patient_id INT DEFAULT NULL, psychologue_id INT DEFAULT NULL, reservation_id INT DEFAULT NULL, INDEX IDX_4C13CC786B899279 (patient_id), INDEX IDX_4C13CC78465459D3 (psychologue_id), UNIQUE INDEX UNIQ_4C13CC78B83297E7 (reservation_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE fiche ADD CONSTRAINT FK_4C13CC786B899279 FOREIGN KEY (patient_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE fiche ADD CONSTRAINT FK_4C13CC78465459D3 FOREIGN KEY (psychologue_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE fiche ADD CONSTRAINT FK_4C13CC78B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fiche DROP FOREIGN KEY FK_4C13CC786B899279');
        $this->addSql('ALTER TABLE fiche DROP FOREIGN KEY FK_4C13CC78465459D3');
        $this->addSql('ALTER TABLE fiche DROP FOREIGN KEY FK_4C13CC78B83297E7');
        $this->addSql('DROP TABLE fiche');
    }
}
