<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220312104707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP slug, CHANGE name name VARCHAR(100) NOT NULL');
        $this->addSql('ALTER TABLE categories RENAME INDEX parent_id TO IDX_3AF34668727ACA70');
        $this->addSql('ALTER TABLE coupons CHANGE coupons_types_id coupons_types_id INT NOT NULL, CHANGE code code VARCHAR(10) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE discount discount INT NOT NULL, CHANGE max_usage max_usage INT NOT NULL, CHANGE validity validity DATETIME NOT NULL, CHANGE is_valid is_valid TINYINT(1) NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE coupons RENAME INDEX code TO UNIQ_F564111877153098');
        $this->addSql('ALTER TABLE coupons RENAME INDEX coupons_types_id TO IDX_F56411183DDD47B7');
        $this->addSql('ALTER TABLE coupons_types CHANGE name name VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE images CHANGE products_id products_id INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE images RENAME INDEX products_id TO IDX_E01FBE6A6C8A81A9');
        $this->addSql('ALTER TABLE orders CHANGE users_id users_id INT NOT NULL, CHANGE reference reference VARCHAR(20) NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE orders RENAME INDEX reference TO UNIQ_E52FFDEEAEA34913');
        $this->addSql('ALTER TABLE orders RENAME INDEX coupons_id TO IDX_E52FFDEE6D72B15C');
        $this->addSql('ALTER TABLE orders RENAME INDEX users_id TO IDX_E52FFDEE67B3B43D');
        $this->addSql('ALTER TABLE orders_details CHANGE quantity quantity INT NOT NULL, CHANGE price price INT NOT NULL');
        $this->addSql('ALTER TABLE orders_details RENAME INDEX products_id TO IDX_835379F16C8A81A9');
        $this->addSql('ALTER TABLE products DROP slug, CHANGE categories_id categories_id INT NOT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE price price INT NOT NULL, CHANGE stock stock INT NOT NULL, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE products RENAME INDEX categories_id TO IDX_B3BA5A5AA21214B7');
        $this->addSql('ALTER TABLE users CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE lastname lastname VARCHAR(255) NOT NULL, CHANGE firstname firstname VARCHAR(255) NOT NULL, CHANGE address address VARCHAR(255) NOT NULL, CHANGE zipcode zipcode VARCHAR(5) NOT NULL, CHANGE city city VARCHAR(150) NOT NULL, CHANGE roles roles JSON NOT NULL, CHANGE created_at created_at DATETIME DEFAULT \' CURRENT_TIMESTAMP\' NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE users RENAME INDEX email TO UNIQ_1483A5E9E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories ADD slug VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE categories RENAME INDEX idx_3af34668727aca70 TO parent_id');
        $this->addSql('ALTER TABLE coupons CHANGE coupons_types_id coupons_types_id INT DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE description description TEXT DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE discount discount INT DEFAULT NULL, CHANGE max_usage max_usage INT DEFAULT NULL, CHANGE validity validity DATETIME DEFAULT NULL, CHANGE is_valid is_valid TINYINT(1) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE coupons RENAME INDEX uniq_f564111877153098 TO code');
        $this->addSql('ALTER TABLE coupons RENAME INDEX idx_f56411183ddd47b7 TO coupons_types_id');
        $this->addSql('ALTER TABLE coupons_types CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE images CHANGE products_id products_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE images RENAME INDEX idx_e01fbe6a6c8a81a9 TO products_id');
        $this->addSql('ALTER TABLE orders CHANGE users_id users_id INT DEFAULT NULL, CHANGE reference reference VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE created_at created_at DATETIME DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE orders RENAME INDEX idx_e52ffdee6d72b15c TO coupons_id');
        $this->addSql('ALTER TABLE orders RENAME INDEX uniq_e52ffdeeaea34913 TO reference');
        $this->addSql('ALTER TABLE orders RENAME INDEX idx_e52ffdee67b3b43d TO users_id');
        $this->addSql('ALTER TABLE orders_details CHANGE quantity quantity INT DEFAULT NULL, CHANGE price price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders_details RENAME INDEX idx_835379f16c8a81a9 TO products_id');
        $this->addSql('ALTER TABLE products ADD slug VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE categories_id categories_id INT DEFAULT NULL, CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE description description TEXT DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE price price INT DEFAULT NULL, CHANGE stock stock INT DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE products RENAME INDEX idx_b3ba5a5aa21214b7 TO categories_id');
        $this->addSql('ALTER TABLE users CHANGE email email VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE roles roles JSON DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE firstname firstname VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE lastname lastname VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE address address VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE zipcode zipcode VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE city city VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE created_at created_at DATETIME DEFAULT \'now()\'');
        $this->addSql('ALTER TABLE users RENAME INDEX uniq_1483a5e9e7927c74 TO email');
    }
}
