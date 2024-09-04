<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240904093418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD user_tresorier VARCHAR(255) NOT NULL, ADD user_president VARCHAR(255) NOT NULL, ADD user_site_internet VARCHAR(255) DEFAULT NULL, ADD user_lien_x VARCHAR(255) DEFAULT NULL, ADD user_lien_fb VARCHAR(255) DEFAULT NULL, ADD user_lien_insta VARCHAR(255) DEFAULT NULL, DROP tresorier, DROP president');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD tresorier VARCHAR(255) NOT NULL, ADD president VARCHAR(255) NOT NULL, DROP user_tresorier, DROP user_president, DROP user_site_internet, DROP user_lien_x, DROP user_lien_fb, DROP user_lien_insta');
    }
}
