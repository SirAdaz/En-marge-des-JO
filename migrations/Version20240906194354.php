<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240906194354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name_asso VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD user_tel VARCHAR(255) NOT NULL, ADD user_asso_tel VARCHAR(255) NOT NULL, ADD user_adress VARCHAR(255) NOT NULL, ADD user_asso_adress VARCHAR(255) NOT NULL, ADD user_asso_sport VARCHAR(255) NOT NULL, ADD user_asso_descr VARCHAR(255) NOT NULL, ADD user_date_creation DATE NOT NULL, ADD image_file_name VARCHAR(255) DEFAULT NULL, ADD user_tresorier VARCHAR(255) NOT NULL, ADD user_president VARCHAR(255) NOT NULL, ADD user_site_internet VARCHAR(255) DEFAULT NULL, ADD user_lien_x VARCHAR(255) DEFAULT NULL, ADD user_lien_fb VARCHAR(255) DEFAULT NULL, ADD user_lien_insta VARCHAR(255) DEFAULT NULL, DROP date_creation, CHANGE user_last_name user_lastname VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
        $this->addSql('ALTER TABLE user ADD user_last_name VARCHAR(255) NOT NULL, ADD date_creation DATETIME DEFAULT CURRENT_TIMESTAMP, DROP user_lastname, DROP user_tel, DROP user_asso_tel, DROP user_adress, DROP user_asso_adress, DROP user_asso_sport, DROP user_asso_descr, DROP user_date_creation, DROP image_file_name, DROP user_tresorier, DROP user_president, DROP user_site_internet, DROP user_lien_x, DROP user_lien_fb, DROP user_lien_insta');
    }
}
