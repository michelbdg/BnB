<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240116092723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE firstname firstname VARCHAR(50) DEFAULT NULL, CHANGE lastname lastname VARCHAR(50) DEFAULT NULL, CHANGE birthyear birthyear INT DEFAULT NULL, CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(50) DEFAULT NULL, CHANGE country country VARCHAR(50) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE job job VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE firstname firstname VARCHAR(50) NOT NULL, CHANGE lastname lastname VARCHAR(50) NOT NULL, CHANGE birthyear birthyear INT NOT NULL, CHANGE adress adress VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(50) NOT NULL, CHANGE country country VARCHAR(50) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE job job VARCHAR(50) NOT NULL');
    }
}
