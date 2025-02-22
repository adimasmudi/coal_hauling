<?php

namespace Database\Seeders;

use App\Models\DeliveryStatus;
use App\Models\EmployeeStatus;
use App\Models\PartnerStatus;
use App\Models\Role;
use App\Models\User;
use App\Models\VehicleDocumentStatus;
use App\Models\VehicleMaintenanceStatus;
use App\Models\VehicleStatus;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        foreach(['admin','employee'] as $role){
            Role::factory()->create([
                'name' => $role
            ]);
        }
        

        User::factory()->create([
            'role_id' => 1,
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin_123')
        ]);

        foreach(['available','sick','on_leave','absent'] as $employee_status){
            EmployeeStatus::factory()->create([
                'name' => $employee_status
            ]);
        }

        foreach(['available','under_maintenance','assigned','broken','document_problem'] as $vehicle_status){
            VehicleStatus::factory()->create([
                'name' => $vehicle_status
            ]);
        }

        foreach(['valid','invalid','expired'] as $vehicle_document_status){
            VehicleDocumentStatus::factory()->create([
                'name' => $vehicle_document_status
            ]);
        }

        foreach(['queued','in_progres','done','unrepairable'] as $vehicle_maintenance_status){
            VehicleMaintenanceStatus::factory()->create([
                'name' => $vehicle_maintenance_status
            ]);
        }

        foreach(['arrived','in_progres','ready','in_disorder','failed'] as $delivery_status){
            DeliveryStatus::factory()->create([
                'name' => $delivery_status
            ]);
        }

        foreach(['active','inactive'] as $partner_status){
            PartnerStatus::factory()->create([
                'name' => $partner_status
            ]);
        }
    }
}
