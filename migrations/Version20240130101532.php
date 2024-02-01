<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240130101532 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE adresse CHANGE util_id util_id INT NOT NULL, CHANGE adr adr VARCHAR(255) NOT NULL, CHANGE adr_livr adr_livr VARCHAR(255) NOT NULL, CHANGE adr_fact adr_fact VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE details_com CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE produit CHANGE fab_id fab_id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs CHANGE email email VARCHAR(180) NOT NULL, CHANGE tel tel VARCHAR(50) NOT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\', CHANGE mdp mdp VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE utilisateurs CHANGE email email VARCHAR(180) DEFAULT NULL, CHANGE tel tel VARCHAR(50) DEFAULT NULL, CHANGE roles roles JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE mdp mdp VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE details_com CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE adresse CHANGE util_id util_id INT DEFAULT NULL, CHANGE adr adr VARCHAR(255) DEFAULT NULL, CHANGE adr_livr adr_livr VARCHAR(255) DEFAULT NULL, CHANGE adr_fact adr_fact VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE produit CHANGE fab_id fab_id INT DEFAULT NULL');
    }
}
