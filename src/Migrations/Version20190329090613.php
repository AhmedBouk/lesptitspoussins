<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190329090613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, note CLOB NOT NULL --(DC2Type:array)
        , texte CLOB NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, is_enabled BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_8F91ABF02AD18E6A ON avis (parentt_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF037955E80 ON avis (pro_profil_id)');
        $this->addSql('CREATE TABLE enfant_profil (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, allergie CLOB DEFAULT NULL, traitement CLOB DEFAULT NULL, maladies CLOB DEFAULT NULL, autres CLOB DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_65BDECDA2AD18E6A ON enfant_profil (parentt_id)');
        $this->addSql('CREATE TABLE facturation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, date DATETIME DEFAULT NULL, montant_ht NUMERIC(10, 10) DEFAULT NULL, tva NUMERIC(10, 10) DEFAULT NULL, total NUMERIC(10, 10) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_17EB513A2AD18E6A ON facturation (parentt_id)');
        $this->addSql('CREATE INDEX IDX_17EB513A37955E80 ON facturation (pro_profil_id)');
        $this->addSql('CREATE TABLE liste_status (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, status CLOB NOT NULL --(DC2Type:array)
        )');
        $this->addSql('CREATE INDEX IDX_4A7110272AD18E6A ON liste_status (parentt_id)');
        $this->addSql('CREATE INDEX IDX_4A71102737955E80 ON liste_status (pro_profil_id)');
        $this->addSql('CREATE TABLE paiement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, montant NUMERIC(10, 10) DEFAULT NULL, mode_paiement CLOB DEFAULT NULL --(DC2Type:array)
        , date_paiement DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E2AD18E6A ON paiement (parentt_id)');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E37955E80 ON paiement (pro_profil_id)');
        $this->addSql('CREATE TABLE parentt (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, ville VARCHAR(255) DEFAULT NULL, codepostal INTEGER DEFAULT NULL, adresse CLOB DEFAULT NULL, telephone INTEGER DEFAULT NULL, password VARCHAR(150) NOT NULL, token VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, created_at_abonnement DATETIME DEFAULT NULL, statut_abonnement BOOLEAN NOT NULL, date_duree DATE DEFAULT NULL, is_enabled BOOLEAN NOT NULL)');
        $this->addSql('CREATE TABLE "plan" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enfant_profil_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, date DATE NOT NULL, heuredebut TIME DEFAULT NULL, heuredefin TIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_DD5A5B7DA1440662 ON "plan" (enfant_profil_id)');
        $this->addSql('CREATE INDEX IDX_DD5A5B7D37955E80 ON "plan" (pro_profil_id)');
        $this->addSql('CREATE TABLE pro_profil (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, ville VARCHAR(255) DEFAULT NULL, codepostal INTEGER DEFAULT NULL, adresse CLOB DEFAULT NULL, telephone INTEGER DEFAULT NULL, password VARCHAR(255) NOT NULL, token VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, nombre_personnel INTEGER DEFAULT NULL, disponibilite BOOLEAN NOT NULL, tarif NUMERIC(10, 10) DEFAULT NULL, horaire CLOB DEFAULT NULL --(DC2Type:json)
        , statut BOOLEAN NOT NULL, nombredeplace INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE tuteur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_564122682AD18E6A ON tuteur (parentt_id)');
        $this->addSql('CREATE INDEX IDX_5641226837955E80 ON tuteur (pro_profil_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE enfant_profil');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP TABLE liste_status');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('DROP TABLE parentt');
        $this->addSql('DROP TABLE "plan"');
        $this->addSql('DROP TABLE pro_profil');
        $this->addSql('DROP TABLE tuteur');
    }
}
