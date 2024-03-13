<?php

/**
 * Tests for the AuthorResource class.
 *
 * Provides tests for the AuthorResource form and table schemas, and CRUD operations 
 * on the Author model.
 *
 * @package Tests\Filament\Resources
 */

namespace Tests\Filament\Resources;

use App\Filament\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class AuthorResourceTest extends TestCase
{
    /**
     * Tests the form schema includes all fields with correct configurations.
     *
     * Ensures that all expected fields are present in the form schema with the correct 
     * maximum length and other configurations.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_form_schema_includes_all_fields_with_correct_configurations()
    {
        $formFields = AuthorResource::form([])->getSchema();

        $this->assertArrayHasKey('name', $formFields);
        $this->assertTrue($formFields['name']->isRequired());
        $this->assertEquals(255, $formFields['name']->getMaxLength());

        $this->assertArrayHasKey('description', $formFields);
        $this->assertTrue($formFields['description']->isRequired());
        $this->assertEquals(255, $formFields['description']->getMaxLength());

        $this->assertArrayHasKey('is_active', $formFields);
        $this->assertTrue($formFields['is_active']->isRequired());
        $this->assertTrue($formFields['is_active']->isNumeric());
    }
    /**
     * Tests the table schema includes all columns with correct configurations.
     *
     * Verifies that all expected columns are present in the table schema, are searchable or sortable 
     * as appropriate, and have the correct configurations.
     *
     * @return void
     */

    public function test_table_schema_includes_all_columns_with_correct_configurations()
    {
        $tableColumns = AuthorResource::table([])->getColumns();

        $this->assertArrayHasKey('name', $tableColumns);
        $this->assertTrue($tableColumns['name']->isSearchable());

        $this->assertArrayHasKey('description', $tableColumns);
        $this->assertTrue($tableColumns['description']->isSearchable());

        $this->assertArrayHasKey('is_active', $tableColumns);
        $this->assertTrue($tableColumns['is_active']->isNumeric());
        $this->assertTrue($tableColumns['is_active']->isSortable());

        $this->assertArrayHasKey('created_at', $tableColumns);
        $this->assertTrue($tableColumns['created_at']->isSortable());

        $this->assertArrayHasKey('updated_at', $tableColumns);
        $this->assertTrue($tableColumns['updated_at']->isSortable());
    }

    public function test_crud_operations()
    {
        $authorData = [
            'name'        => 'John Doe',
            'description' => 'An author',
            'is_active'   => 1,
        ];

        // Create
        $author = Author::create($authorData);
        $this->assertDatabaseHas('authors', $authorData);

        // Read
        $retrievedAuthor = Author::find($author->id);
        $this->assertNotNull($retrievedAuthor);

        // Update
        $updatedData = ['name' => 'Jane Doe'];
        $author->update($updatedData);
        $this->assertDatabaseHas('authors', array_merge($authorData, $updatedData));

        // Delete
        $author->delete();
        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }
}
/**
 * Tests CRUD operations on the Author model.
 *
 * Ensures that create, read, update, and delete operations work as expected for the Author model.
 *
 * @return void
 */
