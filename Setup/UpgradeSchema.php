<?php

namespace Learnmodules\UiGridModule\Setup;


use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * Class UpgradeSchema
 * @package Learnmodules\UiGridModule\Setup
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;

        $installer->startSetup();

        if(version_compare($context->getVersion(), '1.0.1', '<')) {
            if (!$installer->tableExists('learn_uitest_post')) {
                $table = $installer->getConnection()->newTable(
                    $installer->getTable('learn_uitest_post')
                )
                    ->addColumn(
                        'post_id',
                        Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'nullable' => false,
                            'primary'  => true,
                            'unsigned' => true,
                        ],
                        'Post ID'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        255,
                        ['nullable => false'],
                        'Post Name'
                    )
                    ->addColumn(
                        'url_key',
                        Table::TYPE_TEXT,
                        255,
                        [],
                        'Post URL Key'
                    )
                    ->addColumn(
                        'post_content',
                        Table::TYPE_TEXT,
                        '64k',
                        [],
                        'Post Post Content'
                    )
                    ->addColumn(
                        'tags',
                        Table::TYPE_TEXT,
                        255,
                        [],
                        'Post Tags'
                    )
                    ->addColumn(
                        'status',
                        Table::TYPE_INTEGER,
                        1,
                        [],
                        'Post Status'
                    )
                    ->addColumn(
                        'featured_image',
                        Table::TYPE_TEXT,
                        255,
                        [],
                        'Post Featured Image'
                    )
                    ->addColumn(
                        'created_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                        'Created At'
                    )->addColumn(
                        'updated_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                        'Updated At')
                    ->setComment('Post Table');
                $installer->getConnection()->createTable($table);

                $installer->getConnection()->addIndex(
                    $installer->getTable('learn_uitest_post'),
                    $setup->getIdxName(
                        $installer->getTable('learn_uitest_post'),
                        ['name','url_key','post_content','tags','featured_image'],
                        AdapterInterface::INDEX_TYPE_FULLTEXT
                    ),
                    ['name','url_key','post_content','tags','featured_image'],
                    AdapterInterface::INDEX_TYPE_FULLTEXT
                );
            }
        }

        $installer->endSetup();
    }
}