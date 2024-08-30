<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240830110816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD user_name VARCHAR(255) NOT NULL, ADD user_lastname VARCHAR(255) NOT NULL, ADD user_asso_name VARCHAR(255) NOT NULL, ADD user_tel VARCHAR(255) NOT NULL, ADD user_asso_tel VARCHAR(255) NOT NULL, ADD user_adress VARCHAR(255) NOT NULL, ADD user_asso_adress VARCHAR(255) NOT NULL, ADD user_asso_sport VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP user_name, DROP user_lastname, DROP user_asso_name, DROP user_tel, DROP user_asso_tel, DROP user_adress, DROP user_asso_adress, DROP user_asso_sport');
    }
}
