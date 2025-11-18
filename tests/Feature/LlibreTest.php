<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;
use App\Models\Author;

class LlibreTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Comprobar que la ruta principal carga correctamente.
     */
    public function test_index_books_loads(): void
    {
        $response = $this->get(route('books.index'));

        $response->assertStatus(200);
        $response->assertViewIs('books.index');
    }

    /**
     * Comprobar que se puede crear un libro.
     */
    public function test_can_create_book(): void
    {
        $author = Author::create([
            'name' => 'Autor de Prueba',
            'nationality' => 'España',
        ]);

        $response = $this->post(route('books.store'), [
            'title' => 'Libro de Prueba',
            'year' => 2025,
            'author_id' => $author->id,
        ]);

        $response->assertRedirect(route('books.index'));
        $this->assertDatabaseHas('books', [
            'title' => 'Libro de Prueba',
            'author_id' => $author->id,
        ]);
    }

    /**
     * Comprobar que no se puede crear un libro sin un autor válido.
     */
    public function test_cannot_create_book_without_valid_author(): void
    {
        $response = $this->post(route('books.store'), [
            'title' => 'Libro Inválido',
            'year' => 2025,
            'author_id' => 9999, // autor que no existe
        ]);

        $response->assertSessionHasErrors('author_id');
        $this->assertDatabaseMissing('books', [
            'title' => 'Libro Inválido',
        ]);
    }
}
