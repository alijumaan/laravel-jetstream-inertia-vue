<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_permission_crud_by_admin_is_working()
    {
        Role::create(['name' => 'admin']);

        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $response = $this->actingAs($admin)->get('permissions');
        $response->assertOk();

        $response = $this->actingAs($admin)->post('permissions', ['name' => 'Access user']);
        $response->assertRedirect('permissions');

        $permission = Permission::find(1)->first();
        $response = $this->actingAs($admin)->put('permissions/' . $permission->id, ['name' => 'Update user']);
        $response->assertRedirect('permissions');

        $this->assertDatabaseHas(Permission::class, ['name' => 'Update user']);

        $response = $this->actingAs($admin)->delete('permissions/' . $permission->id);
        $response->assertRedirect('permissions');

        $this->assertDatabaseMissing(Permission::class, ['name' => 'Update user']);
    }
}
