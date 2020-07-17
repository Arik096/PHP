<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentTable Test Case
 */
class StudentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentTable
     */
    protected $Student;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Student',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Student') ? [] : ['className' => StudentTable::class];
        $this->Student = TableRegistry::getTableLocator()->get('Student', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Student);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
