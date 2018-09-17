<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180917140514 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_item ADD number_of_ordered_items VARCHAR(255) NOT NULL, ADD value VARCHAR(255) NOT NULL, DROP number_of_order_items, DROP total_cost');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F529939828D3A508');
        $this->addSql('DROP INDEX IDX_F529939828D3A508 ON `order`');
        $this->addSql('ALTER TABLE `order` ADD date_create VARCHAR(255) NOT NULL, ADD order_price VARCHAR(255) NOT NULL, DROP orderitem_id, DROP date_of_creation, DROP amount_of_order');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `order` ADD orderitem_id INT DEFAULT NULL, ADD date_of_creation VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD amount_of_order VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP date_create, DROP order_price');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F529939828D3A508 FOREIGN KEY (orderitem_id) REFERENCES order_item (id)');
        $this->addSql('CREATE INDEX IDX_F529939828D3A508 ON `order` (orderitem_id)');
        $this->addSql('ALTER TABLE order_item ADD number_of_order_items VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD total_cost VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP number_of_ordered_items, DROP value');
    }
}
