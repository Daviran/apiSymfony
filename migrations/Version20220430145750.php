<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220430145750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993981AD5CDBF');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD1AD5CDBF');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('DROP INDEX UNIQ_F52993981AD5CDBF ON `order`');
        $this->addSql('ALTER TABLE `order` DROP cart_id');
        $this->addSql('DROP INDEX IDX_D34A04AD1AD5CDBF ON product');
        $this->addSql('ALTER TABLE product DROP cart_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_item (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `order` ADD cart_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993981AD5CDBF FOREIGN KEY (cart_id) REFERENCES order_item (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F52993981AD5CDBF ON `order` (cart_id)');
        $this->addSql('ALTER TABLE product ADD cart_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD1AD5CDBF FOREIGN KEY (cart_id) REFERENCES order_item (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D34A04AD1AD5CDBF ON product (cart_id)');
    }
}
