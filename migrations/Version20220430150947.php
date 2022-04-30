<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220430150947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD8D9F6D38');
        $this->addSql('DROP INDEX IDX_D34A04AD8D9F6D38 ON product');
        $this->addSql('ALTER TABLE product ADD available TINYINT(1) NOT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE price price DOUBLE PRECISION DEFAULT NULL, CHANGE order_id ordr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD92FCEA00 FOREIGN KEY (ordr_id) REFERENCES `order` (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD92FCEA00 ON product (ordr_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD92FCEA00');
        $this->addSql('DROP INDEX IDX_D34A04AD92FCEA00 ON product');
        $this->addSql('ALTER TABLE product DROP available, CHANGE description description VARCHAR(255) NOT NULL, CHANGE price price INT NOT NULL, CHANGE ordr_id order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD8D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_D34A04AD8D9F6D38 ON product (order_id)');
    }
}
