<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210122124327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE aiguilles (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, taille NUMERIC(10, 3) NOT NULL, quantite NUMERIC(10, 3) DEFAULT NULL, prix NUMERIC(10, 3) DEFAULT NULL, INDEX IDX_2D204674827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cables (id INT AUTO_INCREMENT NOT NULL, longeure NUMERIC(10, 3) NOT NULL, quantite NUMERIC(10, 3) NOT NULL, prix NUMERIC(10, 3) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marques (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pelotes (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, matiere VARCHAR(255) DEFAULT NULL, taille_aiguille NUMERIC(10, 3) NOT NULL, couleur_nom VARCHAR(255) DEFAULT NULL, couleur_numero NUMERIC(10, 3) DEFAULT NULL, longeure NUMERIC(10, 3) DEFAULT NULL, grammage NUMERIC(10, 3) DEFAULT NULL, echantillon NUMERIC(10, 3) DEFAULT NULL, quantite NUMERIC(10, 3) DEFAULT NULL, prix NUMERIC(10, 3) DEFAULT NULL, date_modif DATETIME NOT NULL, INDEX IDX_94C4934D4827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aiguilles ADD CONSTRAINT FK_2D204674827B9B2 FOREIGN KEY (marque_id) REFERENCES marques (id)');
        $this->addSql('ALTER TABLE pelotes ADD CONSTRAINT FK_94C4934D4827B9B2 FOREIGN KEY (marque_id) REFERENCES marques (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aiguilles DROP FOREIGN KEY FK_2D204674827B9B2');
        $this->addSql('ALTER TABLE pelotes DROP FOREIGN KEY FK_94C4934D4827B9B2');
        $this->addSql('DROP TABLE aiguilles');
        $this->addSql('DROP TABLE cables');
        $this->addSql('DROP TABLE marques');
        $this->addSql('DROP TABLE pelotes');
    }
}
