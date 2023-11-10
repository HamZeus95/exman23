<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231110163010 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entretien (id INT AUTO_INCREMENT NOT NULL, candidat INT DEFAULT NULL, type VARCHAR(255) NOT NULL, date DATE NOT NULL, heure TIME NOT NULL, etat VARCHAR(255) NOT NULL, INDEX IDX_2B58D6DA6AB5B471 (candidat), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entretien ADD CONSTRAINT FK_2B58D6DA6AB5B471 FOREIGN KEY (candidat) REFERENCES candidat (cin)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entretien DROP FOREIGN KEY FK_2B58D6DA6AB5B471');
        $this->addSql('DROP TABLE entretien');
    }
}
