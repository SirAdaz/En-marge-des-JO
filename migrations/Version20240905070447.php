<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240905070447 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name_asso VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD user_tresorier VARCHAR(255) NOT NULL, ADD user_president VARCHAR(255) NOT NULL, ADD user_site_internet VARCHAR(255) DEFAULT NULL, ADD user_lien_x VARCHAR(255) DEFAULT NULL, ADD user_lien_fb VARCHAR(255) DEFAULT NULL, ADD user_lien_insta VARCHAR(255) DEFAULT NULL, DROP date_creation, DROP membre_depuis_le, DROP tresorier, DROP president, CHANGE image_file_name image_file_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE contact');
        $this->addSql('ALTER TABLE user ADD date_creation DATE NOT NULL, ADD membre_depuis_le DATE NOT NULL, ADD tresorier VARCHAR(255) NOT NULL, ADD president VARCHAR(255) NOT NULL, DROP user_tresorier, DROP user_president, DROP user_site_internet, DROP user_lien_x, DROP user_lien_fb, DROP user_lien_insta, CHANGE image_file_name image_file_name VARCHAR(255) NOT NULL');
    }
}
