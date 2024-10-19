<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240906201745 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Création des tables contact, user et messenger_messages';
    }

    public function up(Schema $schema): void
    {
        // Création de la table contact
        $this->addSql('CREATE TABLE contact (
            id INT AUTO_INCREMENT NOT NULL, 
            name_asso VARCHAR(255) NOT NULL, 
            email VARCHAR(255) NOT NULL, 
            tel VARCHAR(255) NOT NULL, 
            message VARCHAR(255) NOT NULL, 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table 
        $this->addSql('CREATE TABLE user (
            id INT AUTO_INCREMENT NOT NULL, 
            email VARCHAR(255) NOT NULL, 
            roles JSON NOT NULL, 
            password VARCHAR(255) NOT NULL, 
            user_name VARCHAR(255) NOT NULL, 
            user_lastname VARCHAR(255) NOT NULL,  
            user_asso_name VARCHAR(255) NOT NULL, 
            user_tel VARCHAR(255) NOT NULL, 
            user_asso_tel VARCHAR(255) NOT NULL, 
            user_adress VARCHAR(255) NOT NULL, 
            user_asso_adress VARCHAR(255) NOT NULL, 
            user_asso_sport VARCHAR(255) NOT NULL, 
            user_asso_descr VARCHAR(255) NOT NULL, 
            user_date_creation DATE NOT NULL, 
            image_file_name VARCHAR(255) DEFAULT NULL, 
            user_tresorier VARCHAR(255) DEFAULT NULL,  -- Cette colonne pourrait être optionnelle
            user_president VARCHAR(255) DEFAULT NULL,  -- Cette colonne pourrait aussi être optionnelle
            user_site_internet VARCHAR(255) DEFAULT NULL, 
            user_lien_x VARCHAR(255) DEFAULT NULL, 
            user_lien_fb VARCHAR(255) DEFAULT NULL, 
            user_lien_insta VARCHAR(255) DEFAULT NULL, 
            UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        // Création de la table messenger_messages
        $this->addSql('CREATE TABLE messenger_messages (
            id BIGINT AUTO_INCREMENT NOT NULL, 
            body LONGTEXT NOT NULL, 
            headers LONGTEXT NOT NULL, 
            queue_name VARCHAR(190) NOT NULL, 
            created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            INDEX IDX_75EA56E0FB7336F0 (queue_name), 
            INDEX IDX_75EA56E0E3BD61CE (available_at), 
            INDEX IDX_75EA56E016BA31DB (delivered_at), 
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // Suppression des tables
        // $this->addSql('DROP TABLE contact');
        // $this->addSql('DROP TABLE user');
        // $this->addSql('DROP TABLE messenger_messages');
    }
}
