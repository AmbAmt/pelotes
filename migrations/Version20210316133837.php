<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210316133837 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type_aiguilles (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aiguilles ADD type_aiguilles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE aiguilles ADD CONSTRAINT FK_2D20467A02BD46E FOREIGN KEY (type_aiguilles_id) REFERENCES type_aiguilles (id)');
        $this->addSql('CREATE INDEX IDX_2D20467A02BD46E ON aiguilles (type_aiguilles_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aiguilles DROP FOREIGN KEY FK_2D20467A02BD46E');
        $this->addSql('DROP TABLE type_aiguilles');
        $this->addSql('DROP INDEX IDX_2D20467A02BD46E ON aiguilles');
        $this->addSql('ALTER TABLE aiguilles DROP type_aiguilles_id');
    }
}
