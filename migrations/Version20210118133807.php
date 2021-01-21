<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210118133807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emprunt (id INT AUTO_INCREMENT NOT NULL, emprunteur_id INT NOT NULL, date_retour DATE NOT NULL, date_emprunt DATE NOT NULL, INDEX IDX_364071D7F0840037 (emprunteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunt_livre (emprunt_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_562087F2AE7FEF94 (emprunt_id), INDEX IDX_562087F237D925CB (livre_id), PRIMARY KEY(emprunt_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(190) NOT NULL, genre VARCHAR(190) DEFAULT NULL, langue VARCHAR(190) DEFAULT NULL, auteur VARCHAR(190) DEFAULT NULL, annee_edition INT DEFAULT NULL, nombre_pages INT DEFAULT NULL, nom_editeur VARCHAR(190) DEFAULT NULL, cote VARCHAR(190) NOT NULL, isbn VARCHAR(190) NOT NULL, etat VARCHAR(190) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parametres (id INT AUTO_INCREMENT NOT NULL, durée_emprunt VARCHAR(255) NOT NULL COMMENT \'(DC2Type:dateinterval)\', nombre_emprunt INT NOT NULL, montant_amende INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(190) NOT NULL, email VARCHAR(190) DEFAULT NULL, telephone VARCHAR(190) DEFAULT NULL, blacklist TINYINT(1) NOT NULL, carte TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649AA08CB10 (login), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7F0840037 FOREIGN KEY (emprunteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE emprunt_livre ADD CONSTRAINT FK_562087F2AE7FEF94 FOREIGN KEY (emprunt_id) REFERENCES emprunt (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE emprunt_livre ADD CONSTRAINT FK_562087F237D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt_livre DROP FOREIGN KEY FK_562087F2AE7FEF94');
        $this->addSql('ALTER TABLE emprunt_livre DROP FOREIGN KEY FK_562087F237D925CB');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7F0840037');
        $this->addSql('DROP TABLE emprunt');
        $this->addSql('DROP TABLE emprunt_livre');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE parametres');
        $this->addSql('DROP TABLE user');
    }
}
