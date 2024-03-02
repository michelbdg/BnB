<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302181246 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE booking (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, traveler_id INTEGER DEFAULT NULL, room_id INTEGER DEFAULT NULL, rewiew_id INTEGER DEFAULT NULL, number VARCHAR(50) NOT NULL, check_in DATETIME NOT NULL, check_out DATETIME NOT NULL, occupants INTEGER NOT NULL, create_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , CONSTRAINT FK_E00CEDDE59BBE8A3 FOREIGN KEY (traveler_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E00CEDDE54177093 FOREIGN KEY (room_id) REFERENCES room (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E00CEDDE98599D2F FOREIGN KEY (rewiew_id) REFERENCES rewiew (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE59BBE8A3 ON booking (traveler_id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDE54177093 ON booking (room_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E00CEDDE98599D2F ON booking (rewiew_id)');
        $this->addSql('CREATE TABLE equipment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, rooms_id INTEGER DEFAULT NULL, name VARCHAR(50) DEFAULT NULL, CONSTRAINT FK_D338D5838E2368AB FOREIGN KEY (rooms_id) REFERENCES room (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_D338D5838E2368AB ON equipment (rooms_id)');
        $this->addSql('CREATE TABLE favorite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, traveler_id INTEGER NOT NULL, CONSTRAINT FK_68C58ED959BBE8A3 FOREIGN KEY (traveler_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_68C58ED959BBE8A3 ON favorite (traveler_id)');
        $this->addSql('CREATE TABLE favorite_room (favorite_id INTEGER NOT NULL, room_id INTEGER NOT NULL, PRIMARY KEY(favorite_id, room_id), CONSTRAINT FK_9C9948A4AA17481D FOREIGN KEY (favorite_id) REFERENCES favorite (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9C9948A454177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_9C9948A4AA17481D ON favorite_room (favorite_id)');
        $this->addSql('CREATE INDEX IDX_9C9948A454177093 ON favorite_room (room_id)');
        $this->addSql('CREATE TABLE rewiew (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, traveler_id INTEGER NOT NULL, rooms_id INTEGER NOT NULL, title VARCHAR(50) NOT NULL, comment CLOB NOT NULL, rating INTEGER NOT NULL, created_at DATETIME NOT NULL, CONSTRAINT FK_C1FFE6A359BBE8A3 FOREIGN KEY (traveler_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_C1FFE6A38E2368AB FOREIGN KEY (rooms_id) REFERENCES room (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_C1FFE6A359BBE8A3 ON rewiew (traveler_id)');
        $this->addSql('CREATE INDEX IDX_C1FFE6A38E2368AB ON rewiew (rooms_id)');
        $this->addSql('CREATE TABLE room (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, host_id INTEGER NOT NULL, description CLOB DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(50) DEFAULT NULL, country VARCHAR(50) DEFAULT NULL, price INTEGER NOT NULL, cover VARCHAR(255) DEFAULT NULL, title VARCHAR(50) NOT NULL, CONSTRAINT FK_729F519B1FB8D185 FOREIGN KEY (host_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_729F519B1FB8D185 ON room (host_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, firstname VARCHAR(50) DEFAULT NULL, lastname VARCHAR(50) DEFAULT NULL, birthyear INTEGER DEFAULT NULL, adress VARCHAR(255) DEFAULT NULL, city VARCHAR(50) DEFAULT NULL, country VARCHAR(50) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, job VARCHAR(50) DEFAULT NULL, is_verified BOOLEAN NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , available_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , delivered_at DATETIME DEFAULT NULL --(DC2Type:datetime_immutable)
        )');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE booking');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE favorite');
        $this->addSql('DROP TABLE favorite_room');
        $this->addSql('DROP TABLE rewiew');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
