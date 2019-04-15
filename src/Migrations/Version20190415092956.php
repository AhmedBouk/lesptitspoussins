<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415092956 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_5641226837955E80');
        $this->addSql('DROP INDEX IDX_564122682AD18E6A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tuteur AS SELECT id, parentt_id, pro_profil_id, nom, prenom, created_at, updated_at FROM tuteur');
        $this->addSql('DROP TABLE tuteur');
        $this->addSql('CREATE TABLE tuteur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL COLLATE BINARY, prenom VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, CONSTRAINT FK_564122682AD18E6A FOREIGN KEY (parentt_id) REFERENCES parentt (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_5641226837955E80 FOREIGN KEY (pro_profil_id) REFERENCES pro_profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO tuteur (id, parentt_id, pro_profil_id, nom, prenom, created_at, updated_at) SELECT id, parentt_id, pro_profil_id, nom, prenom, created_at, updated_at FROM __temp__tuteur');
        $this->addSql('DROP TABLE __temp__tuteur');
        $this->addSql('CREATE INDEX IDX_5641226837955E80 ON tuteur (pro_profil_id)');
        $this->addSql('CREATE INDEX IDX_564122682AD18E6A ON tuteur (parentt_id)');
        $this->addSql('DROP INDEX IDX_17EB513A37955E80');
        $this->addSql('DROP INDEX IDX_17EB513A2AD18E6A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__facturation AS SELECT id, parentt_id, pro_profil_id, date, montant_ht, tva, total, created_at, updated_at FROM facturation');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('CREATE TABLE facturation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, date DATETIME DEFAULT NULL, montant_ht NUMERIC(10, 10) DEFAULT NULL, tva NUMERIC(10, 10) DEFAULT NULL, total NUMERIC(10, 10) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, CONSTRAINT FK_17EB513A2AD18E6A FOREIGN KEY (parentt_id) REFERENCES parentt (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_17EB513A37955E80 FOREIGN KEY (pro_profil_id) REFERENCES pro_profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO facturation (id, parentt_id, pro_profil_id, date, montant_ht, tva, total, created_at, updated_at) SELECT id, parentt_id, pro_profil_id, date, montant_ht, tva, total, created_at, updated_at FROM __temp__facturation');
        $this->addSql('DROP TABLE __temp__facturation');
        $this->addSql('CREATE INDEX IDX_17EB513A37955E80 ON facturation (pro_profil_id)');
        $this->addSql('CREATE INDEX IDX_17EB513A2AD18E6A ON facturation (parentt_id)');
        $this->addSql('DROP INDEX IDX_DD5A5B7D37955E80');
        $this->addSql('DROP INDEX IDX_DD5A5B7DA1440662');
        $this->addSql('CREATE TEMPORARY TABLE __temp__plan AS SELECT id, enfant_profil_id, pro_profil_id, heuredebut, heuredefin, created_at, updated_at FROM "plan"');
        $this->addSql('DROP TABLE "plan"');
        $this->addSql('CREATE TABLE "plan" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enfant_profil_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, heuredebut DATETIME DEFAULT NULL, heuredefin DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, CONSTRAINT FK_DD5A5B7DA1440662 FOREIGN KEY (enfant_profil_id) REFERENCES enfant_profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_DD5A5B7D37955E80 FOREIGN KEY (pro_profil_id) REFERENCES pro_profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO "plan" (id, enfant_profil_id, pro_profil_id, heuredebut, heuredefin, created_at, updated_at) SELECT id, enfant_profil_id, pro_profil_id, heuredebut, heuredefin, created_at, updated_at FROM __temp__plan');
        $this->addSql('DROP TABLE __temp__plan');
        $this->addSql('CREATE INDEX IDX_DD5A5B7D37955E80 ON "plan" (pro_profil_id)');
        $this->addSql('CREATE INDEX IDX_DD5A5B7DA1440662 ON "plan" (enfant_profil_id)');
        $this->addSql('DROP INDEX IDX_65BDECDA2AD18E6A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__enfant_profil AS SELECT id, parentt_id, prenom, nom, date_naissance, allergie, traitement, maladies, autres, created_at, updated_at FROM enfant_profil');
        $this->addSql('DROP TABLE enfant_profil');
        $this->addSql('CREATE TABLE enfant_profil (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL COLLATE BINARY, nom VARCHAR(255) DEFAULT NULL COLLATE BINARY, date_naissance DATE DEFAULT NULL, allergie CLOB DEFAULT NULL COLLATE BINARY, traitement CLOB DEFAULT NULL COLLATE BINARY, maladies CLOB DEFAULT NULL COLLATE BINARY, autres CLOB DEFAULT NULL COLLATE BINARY, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, CONSTRAINT FK_65BDECDA2AD18E6A FOREIGN KEY (parentt_id) REFERENCES parentt (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO enfant_profil (id, parentt_id, prenom, nom, date_naissance, allergie, traitement, maladies, autres, created_at, updated_at) SELECT id, parentt_id, prenom, nom, date_naissance, allergie, traitement, maladies, autres, created_at, updated_at FROM __temp__enfant_profil');
        $this->addSql('DROP TABLE __temp__enfant_profil');
        $this->addSql('CREATE INDEX IDX_65BDECDA2AD18E6A ON enfant_profil (parentt_id)');
        $this->addSql('DROP INDEX IDX_4A71102737955E80');
        $this->addSql('DROP INDEX IDX_4A7110272AD18E6A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__liste_status AS SELECT id, parentt_id, pro_profil_id, created_at, updated_at, status FROM liste_status');
        $this->addSql('DROP TABLE liste_status');
        $this->addSql('CREATE TABLE liste_status (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, status CLOB NOT NULL COLLATE BINARY --(DC2Type:array)
        , CONSTRAINT FK_4A7110272AD18E6A FOREIGN KEY (parentt_id) REFERENCES parentt (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_4A71102737955E80 FOREIGN KEY (pro_profil_id) REFERENCES pro_profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO liste_status (id, parentt_id, pro_profil_id, created_at, updated_at, status) SELECT id, parentt_id, pro_profil_id, created_at, updated_at, status FROM __temp__liste_status');
        $this->addSql('DROP TABLE __temp__liste_status');
        $this->addSql('CREATE INDEX IDX_4A71102737955E80 ON liste_status (pro_profil_id)');
        $this->addSql('CREATE INDEX IDX_4A7110272AD18E6A ON liste_status (parentt_id)');
        $this->addSql('DROP INDEX IDX_8F91ABF037955E80');
        $this->addSql('DROP INDEX IDX_8F91ABF02AD18E6A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__avis AS SELECT id, parentt_id, pro_profil_id, note, texte, created_at, updated_at, is_enabled FROM avis');
        $this->addSql('DROP TABLE avis');
        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, note CLOB NOT NULL COLLATE BINARY --(DC2Type:array)
        , texte CLOB NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, is_enabled BOOLEAN NOT NULL, CONSTRAINT FK_8F91ABF02AD18E6A FOREIGN KEY (parentt_id) REFERENCES parentt (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_8F91ABF037955E80 FOREIGN KEY (pro_profil_id) REFERENCES pro_profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO avis (id, parentt_id, pro_profil_id, note, texte, created_at, updated_at, is_enabled) SELECT id, parentt_id, pro_profil_id, note, texte, created_at, updated_at, is_enabled FROM __temp__avis');
        $this->addSql('DROP TABLE __temp__avis');
        $this->addSql('CREATE INDEX IDX_8F91ABF037955E80 ON avis (pro_profil_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF02AD18E6A ON avis (parentt_id)');
        $this->addSql('DROP INDEX IDX_B1DC7A1E37955E80');
        $this->addSql('DROP INDEX IDX_B1DC7A1E2AD18E6A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__paiement AS SELECT id, parentt_id, pro_profil_id, montant, date_paiement, created_at, updated_at, mode_paiement FROM paiement');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('CREATE TABLE paiement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, montant NUMERIC(10, 10) DEFAULT NULL, date_paiement DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, mode_paiement CLOB DEFAULT NULL --(DC2Type:array)
        , CONSTRAINT FK_B1DC7A1E2AD18E6A FOREIGN KEY (parentt_id) REFERENCES parentt (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_B1DC7A1E37955E80 FOREIGN KEY (pro_profil_id) REFERENCES pro_profil (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO paiement (id, parentt_id, pro_profil_id, montant, date_paiement, created_at, updated_at, mode_paiement) SELECT id, parentt_id, pro_profil_id, montant, date_paiement, created_at, updated_at, mode_paiement FROM __temp__paiement');
        $this->addSql('DROP TABLE __temp__paiement');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E37955E80 ON paiement (pro_profil_id)');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E2AD18E6A ON paiement (parentt_id)');
        $this->addSql('DROP INDEX UNIQ_40D43EC05126AC48');
        $this->addSql('DROP INDEX UNIQ_40D43EC0C567A17');
        $this->addSql('CREATE TEMPORARY TABLE __temp__pro_profil AS SELECT id, nom_entreprise, mail, ville, codepostal, adresse, telephone, password, created_at, updated_at, nombre_personnel, disponibilite, tarif, statut, nombredeplace, roles, token, horaire FROM pro_profil');
        $this->addSql('DROP TABLE pro_profil');
        $this->addSql('CREATE TABLE pro_profil (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL COLLATE BINARY, mail VARCHAR(255) NOT NULL COLLATE BINARY, ville VARCHAR(255) DEFAULT NULL COLLATE BINARY, codepostal INTEGER DEFAULT NULL, adresse CLOB DEFAULT NULL COLLATE BINARY, telephone INTEGER DEFAULT NULL, password VARCHAR(255) NOT NULL COLLATE BINARY, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, nombre_personnel INTEGER DEFAULT NULL, disponibilite BOOLEAN NOT NULL, tarif NUMERIC(10, 10) DEFAULT NULL, statut BOOLEAN NOT NULL, nombredeplace INTEGER NOT NULL, roles CLOB NOT NULL COLLATE BINARY --(DC2Type:array)
        , token VARCHAR(255) DEFAULT NULL COLLATE BINARY, horaire CLOB DEFAULT NULL --(DC2Type:json)
        )');
        $this->addSql('INSERT INTO pro_profil (id, nom_entreprise, mail, ville, codepostal, adresse, telephone, password, created_at, updated_at, nombre_personnel, disponibilite, tarif, statut, nombredeplace, roles, token, horaire) SELECT id, nom_entreprise, mail, ville, codepostal, adresse, telephone, password, created_at, updated_at, nombre_personnel, disponibilite, tarif, statut, nombredeplace, roles, token, horaire FROM __temp__pro_profil');
        $this->addSql('DROP TABLE __temp__pro_profil');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_40D43EC05126AC48 ON pro_profil (mail)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_40D43EC0C567A17 ON pro_profil (nom_entreprise)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_8F91ABF02AD18E6A');
        $this->addSql('DROP INDEX IDX_8F91ABF037955E80');
        $this->addSql('CREATE TEMPORARY TABLE __temp__avis AS SELECT id, parentt_id, pro_profil_id, note, texte, created_at, updated_at, is_enabled FROM avis');
        $this->addSql('DROP TABLE avis');
        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, note CLOB NOT NULL --(DC2Type:array)
        , texte CLOB NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, is_enabled BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO avis (id, parentt_id, pro_profil_id, note, texte, created_at, updated_at, is_enabled) SELECT id, parentt_id, pro_profil_id, note, texte, created_at, updated_at, is_enabled FROM __temp__avis');
        $this->addSql('DROP TABLE __temp__avis');
        $this->addSql('CREATE INDEX IDX_8F91ABF02AD18E6A ON avis (parentt_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF037955E80 ON avis (pro_profil_id)');
        $this->addSql('DROP INDEX IDX_65BDECDA2AD18E6A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__enfant_profil AS SELECT id, parentt_id, prenom, nom, date_naissance, allergie, traitement, maladies, autres, created_at, updated_at FROM enfant_profil');
        $this->addSql('DROP TABLE enfant_profil');
        $this->addSql('CREATE TABLE enfant_profil (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, date_naissance DATE DEFAULT NULL, allergie CLOB DEFAULT NULL, traitement CLOB DEFAULT NULL, maladies CLOB DEFAULT NULL, autres CLOB DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO enfant_profil (id, parentt_id, prenom, nom, date_naissance, allergie, traitement, maladies, autres, created_at, updated_at) SELECT id, parentt_id, prenom, nom, date_naissance, allergie, traitement, maladies, autres, created_at, updated_at FROM __temp__enfant_profil');
        $this->addSql('DROP TABLE __temp__enfant_profil');
        $this->addSql('CREATE INDEX IDX_65BDECDA2AD18E6A ON enfant_profil (parentt_id)');
        $this->addSql('DROP INDEX IDX_17EB513A2AD18E6A');
        $this->addSql('DROP INDEX IDX_17EB513A37955E80');
        $this->addSql('CREATE TEMPORARY TABLE __temp__facturation AS SELECT id, parentt_id, pro_profil_id, date, montant_ht, tva, total, created_at, updated_at FROM facturation');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('CREATE TABLE facturation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, date DATETIME DEFAULT NULL, montant_ht NUMERIC(10, 10) DEFAULT NULL, tva NUMERIC(10, 10) DEFAULT NULL, total NUMERIC(10, 10) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO facturation (id, parentt_id, pro_profil_id, date, montant_ht, tva, total, created_at, updated_at) SELECT id, parentt_id, pro_profil_id, date, montant_ht, tva, total, created_at, updated_at FROM __temp__facturation');
        $this->addSql('DROP TABLE __temp__facturation');
        $this->addSql('CREATE INDEX IDX_17EB513A2AD18E6A ON facturation (parentt_id)');
        $this->addSql('CREATE INDEX IDX_17EB513A37955E80 ON facturation (pro_profil_id)');
        $this->addSql('DROP INDEX IDX_4A7110272AD18E6A');
        $this->addSql('DROP INDEX IDX_4A71102737955E80');
        $this->addSql('CREATE TEMPORARY TABLE __temp__liste_status AS SELECT id, parentt_id, pro_profil_id, created_at, updated_at, status FROM liste_status');
        $this->addSql('DROP TABLE liste_status');
        $this->addSql('CREATE TABLE liste_status (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, status CLOB NOT NULL --(DC2Type:array)
        )');
        $this->addSql('INSERT INTO liste_status (id, parentt_id, pro_profil_id, created_at, updated_at, status) SELECT id, parentt_id, pro_profil_id, created_at, updated_at, status FROM __temp__liste_status');
        $this->addSql('DROP TABLE __temp__liste_status');
        $this->addSql('CREATE INDEX IDX_4A7110272AD18E6A ON liste_status (parentt_id)');
        $this->addSql('CREATE INDEX IDX_4A71102737955E80 ON liste_status (pro_profil_id)');
        $this->addSql('DROP INDEX IDX_B1DC7A1E2AD18E6A');
        $this->addSql('DROP INDEX IDX_B1DC7A1E37955E80');
        $this->addSql('CREATE TEMPORARY TABLE __temp__paiement AS SELECT id, parentt_id, pro_profil_id, montant, mode_paiement, date_paiement, created_at, updated_at FROM paiement');
        $this->addSql('DROP TABLE paiement');
        $this->addSql('CREATE TABLE paiement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, montant NUMERIC(10, 10) DEFAULT NULL, date_paiement DATETIME DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, mode_paiement CLOB DEFAULT \'NULL --(DC2Type:array)\' COLLATE BINARY --(DC2Type:array)
        )');
        $this->addSql('INSERT INTO paiement (id, parentt_id, pro_profil_id, montant, mode_paiement, date_paiement, created_at, updated_at) SELECT id, parentt_id, pro_profil_id, montant, mode_paiement, date_paiement, created_at, updated_at FROM __temp__paiement');
        $this->addSql('DROP TABLE __temp__paiement');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E2AD18E6A ON paiement (parentt_id)');
        $this->addSql('CREATE INDEX IDX_B1DC7A1E37955E80 ON paiement (pro_profil_id)');
        $this->addSql('DROP INDEX IDX_DD5A5B7DA1440662');
        $this->addSql('DROP INDEX IDX_DD5A5B7D37955E80');
        $this->addSql('CREATE TEMPORARY TABLE __temp__plan AS SELECT id, enfant_profil_id, pro_profil_id, heuredebut, heuredefin, created_at, updated_at FROM "plan"');
        $this->addSql('DROP TABLE "plan"');
        $this->addSql('CREATE TABLE "plan" (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, enfant_profil_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, heuredebut DATETIME DEFAULT NULL, heuredefin DATETIME DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO "plan" (id, enfant_profil_id, pro_profil_id, heuredebut, heuredefin, created_at, updated_at) SELECT id, enfant_profil_id, pro_profil_id, heuredebut, heuredefin, created_at, updated_at FROM __temp__plan');
        $this->addSql('DROP TABLE __temp__plan');
        $this->addSql('CREATE INDEX IDX_DD5A5B7DA1440662 ON "plan" (enfant_profil_id)');
        $this->addSql('CREATE INDEX IDX_DD5A5B7D37955E80 ON "plan" (pro_profil_id)');
        $this->addSql('DROP INDEX UNIQ_40D43EC0C567A17');
        $this->addSql('DROP INDEX UNIQ_40D43EC05126AC48');
        $this->addSql('CREATE TEMPORARY TABLE __temp__pro_profil AS SELECT id, nom_entreprise, mail, ville, codepostal, adresse, telephone, password, token, created_at, updated_at, nombre_personnel, disponibilite, tarif, horaire, statut, nombredeplace, roles FROM pro_profil');
        $this->addSql('DROP TABLE pro_profil');
        $this->addSql('CREATE TABLE pro_profil (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom_entreprise VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, ville VARCHAR(255) DEFAULT NULL, codepostal INTEGER DEFAULT NULL, adresse CLOB DEFAULT NULL, telephone INTEGER DEFAULT NULL, password VARCHAR(255) NOT NULL, token VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, nombre_personnel INTEGER DEFAULT NULL, disponibilite BOOLEAN NOT NULL, tarif NUMERIC(10, 10) DEFAULT NULL, statut BOOLEAN NOT NULL, nombredeplace INTEGER NOT NULL, roles CLOB NOT NULL --(DC2Type:array)
        , horaire CLOB DEFAULT \'NULL --(DC2Type:json)\' COLLATE BINARY --(DC2Type:json)
        )');
        $this->addSql('INSERT INTO pro_profil (id, nom_entreprise, mail, ville, codepostal, adresse, telephone, password, token, created_at, updated_at, nombre_personnel, disponibilite, tarif, horaire, statut, nombredeplace, roles) SELECT id, nom_entreprise, mail, ville, codepostal, adresse, telephone, password, token, created_at, updated_at, nombre_personnel, disponibilite, tarif, horaire, statut, nombredeplace, roles FROM __temp__pro_profil');
        $this->addSql('DROP TABLE __temp__pro_profil');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_40D43EC0C567A17 ON pro_profil (nom_entreprise)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_40D43EC05126AC48 ON pro_profil (mail)');
        $this->addSql('DROP INDEX IDX_564122682AD18E6A');
        $this->addSql('DROP INDEX IDX_5641226837955E80');
        $this->addSql('CREATE TEMPORARY TABLE __temp__tuteur AS SELECT id, parentt_id, pro_profil_id, nom, prenom, created_at, updated_at FROM tuteur');
        $this->addSql('DROP TABLE tuteur');
        $this->addSql('CREATE TABLE tuteur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, parentt_id INTEGER DEFAULT NULL, pro_profil_id INTEGER DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL)');
        $this->addSql('INSERT INTO tuteur (id, parentt_id, pro_profil_id, nom, prenom, created_at, updated_at) SELECT id, parentt_id, pro_profil_id, nom, prenom, created_at, updated_at FROM __temp__tuteur');
        $this->addSql('DROP TABLE __temp__tuteur');
        $this->addSql('CREATE INDEX IDX_564122682AD18E6A ON tuteur (parentt_id)');
        $this->addSql('CREATE INDEX IDX_5641226837955E80 ON tuteur (pro_profil_id)');
    }
}
