<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240702091032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE inside inside TINYINT(1) NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE furniture CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE height height DOUBLE PRECISION NOT NULL, CHANGE width width DOUBLE PRECISION NOT NULL, CHANGE depth depth DOUBLE PRECISION NOT NULL, CHANGE price price DOUBLE PRECISION NOT NULL, CHANGE color color VARCHAR(255) DEFAULT NULL, CHANGE picture picture VARCHAR(255) NOT NULL, CHANGE material material VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE updated_at updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE status_id status_id INT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE furniture ADD CONSTRAINT FK_665DDAB312469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE furniture ADD CONSTRAINT FK_665DDAB36BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_665DDAB312469DE2 ON furniture (category_id)');
        $this->addSql('CREATE INDEX IDX_665DDAB36BF700BD ON furniture (status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE furniture DROP FOREIGN KEY FK_665DDAB36BF700BD');
        $this->addSql('DROP TABLE status');
        $this->addSql('ALTER TABLE categories MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON categories');
        $this->addSql('ALTER TABLE categories CHANGE id id INT NOT NULL, CHANGE description description TEXT NOT NULL, CHANGE inside inside INT NOT NULL');
        $this->addSql('ALTER TABLE furniture MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE furniture DROP FOREIGN KEY FK_665DDAB312469DE2');
        $this->addSql('DROP INDEX IDX_665DDAB312469DE2 ON furniture');
        $this->addSql('DROP INDEX IDX_665DDAB36BF700BD ON furniture');
        $this->addSql('DROP INDEX `primary` ON furniture');
        $this->addSql('ALTER TABLE furniture CHANGE id id INT NOT NULL, CHANGE status_id status_id TEXT NOT NULL, CHANGE height height INT NOT NULL, CHANGE width width INT NOT NULL, CHANGE depth depth INT NOT NULL, CHANGE price price INT NOT NULL, CHANGE color color TEXT NOT NULL, CHANGE picture picture TEXT NOT NULL, CHANGE material material TEXT NOT NULL, CHANGE description description TEXT NOT NULL, CHANGE created_at created_at DATE NOT NULL, CHANGE updated_at updated_at DATE NOT NULL');
    }
}
