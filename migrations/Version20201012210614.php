<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201012210614 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entreprise (id INT AUTO_INCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, ninea INT NOT NULL, typecompte VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operations (id INT AUTO_INCREMENT NOT NULL, numero_compte_id INT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, type_operation VARCHAR(255) NOT NULL, montant NUMERIC(10, 2) NOT NULL, solde NUMERIC(10, 2) NOT NULL, date_operation DATE NOT NULL, INDEX IDX_28145348BFD610BF (numero_compte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operations ADD CONSTRAINT FK_28145348BFD610BF FOREIGN KEY (numero_compte_id) REFERENCES entreprise (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operations DROP FOREIGN KEY FK_28145348BFD610BF');
        $this->addSql('DROP TABLE entreprise');
        $this->addSql('DROP TABLE operations');
    }
}
