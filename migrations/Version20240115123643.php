<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240115123643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INT AUTO_INCREMENT NOT NULL, traveler_id INT DEFAULT NULL, room_id INT DEFAULT NULL, rewiew_id INT DEFAULT NULL, number VARCHAR(50) NOT NULL, check_in DATETIME NOT NULL, check_out DATETIME NOT NULL, occupants INT NOT NULL, create_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E00CEDDE59BBE8A3 (traveler_id), INDEX IDX_E00CEDDE54177093 (room_id), UNIQUE INDEX UNIQ_E00CEDDE98599D2F (rewiew_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, rooms_id INT DEFAULT NULL, name VARCHAR(50) DEFAULT NULL, INDEX IDX_D338D5838E2368AB (rooms_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rewiew (id INT AUTO_INCREMENT NOT NULL, traveler_id INT NOT NULL, rooms_id INT NOT NULL, title VARCHAR(50) NOT NULL, comment LONGTEXT NOT NULL, rating INT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_C1FFE6A359BBE8A3 (traveler_id), INDEX IDX_C1FFE6A38E2368AB (rooms_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE59BBE8A3 FOREIGN KEY (traveler_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE54177093 FOREIGN KEY (room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDE98599D2F FOREIGN KEY (rewiew_id) REFERENCES rewiew (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D5838E2368AB FOREIGN KEY (rooms_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE rewiew ADD CONSTRAINT FK_C1FFE6A359BBE8A3 FOREIGN KEY (traveler_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rewiew ADD CONSTRAINT FK_C1FFE6A38E2368AB FOREIGN KEY (rooms_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE user CHANGE firstname firstname VARCHAR(50) NOT NULL, CHANGE lastname lastname VARCHAR(50) NOT NULL, CHANGE birthyear birthyear INT NOT NULL, CHANGE adress adress VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(50) NOT NULL, CHANGE country country VARCHAR(50) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL, CHANGE job job VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE59BBE8A3');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE54177093');
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDE98599D2F');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D5838E2368AB');
        $this->addSql('ALTER TABLE rewiew DROP FOREIGN KEY FK_C1FFE6A359BBE8A3');
        $this->addSql('ALTER TABLE rewiew DROP FOREIGN KEY FK_C1FFE6A38E2368AB');
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE rewiew');
        $this->addSql('ALTER TABLE user CHANGE firstname firstname VARCHAR(50) DEFAULT NULL, CHANGE lastname lastname VARCHAR(50) DEFAULT NULL, CHANGE birthyear birthyear INT DEFAULT NULL, CHANGE adress adress VARCHAR(255) DEFAULT NULL, CHANGE city city VARCHAR(50) DEFAULT NULL, CHANGE country country VARCHAR(50) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL, CHANGE job job VARCHAR(50) DEFAULT NULL');
    }
}
