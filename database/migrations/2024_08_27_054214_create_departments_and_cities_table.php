<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDepartmentsAndCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('departments_and_cities', function (Blueprint $table) {
            $table->id();
            $table->string('department');
            $table->string('city');
            $table->timestamps();
        });

        // Insert departments and cities data
        DB::table('departments_and_cities')->insert([
            ['department' => 'Amazonas', 'city' => 'Leticia'],
            ['department' => 'Antioquia', 'city' => 'Medellín'],
            ['department' => 'Antioquia', 'city' => 'Envigado'],
            ['department' => 'Antioquia', 'city' => 'Itagüí'],
            ['department' => 'Antioquia', 'city' => 'Bello'],
            ['department' => 'Arauca', 'city' => 'Arauca'],
            ['department' => 'Arauca', 'city' => 'Saravena'],
            ['department' => 'Atlántico', 'city' => 'Barranquilla'],
            ['department' => 'Atlántico', 'city' => 'Soledad'],
            ['department' => 'Atlántico', 'city' => 'Malambo'],
            ['department' => 'Bolívar', 'city' => 'Cartagena'],
            ['department' => 'Bolívar', 'city' => 'Magangué'],
            ['department' => 'Bolívar', 'city' => 'Turbaco'],
            ['department' => 'Boyacá', 'city' => 'Tunja'],
            ['department' => 'Boyacá', 'city' => 'Duitama'],
            ['department' => 'Boyacá', 'city' => 'Sogamoso'],
            ['department' => 'Caldas', 'city' => 'Manizales'],
            ['department' => 'Caldas', 'city' => 'Villamaría'],
            ['department' => 'Caldas', 'city' => 'La Dorada'],
            ['department' => 'Caquetá', 'city' => 'Florencia'],
            ['department' => 'Caquetá', 'city' => 'San Vicente del Caguán'],
            ['department' => 'Casanare', 'city' => 'Yopal'],
            ['department' => 'Casanare', 'city' => 'Aguazul'],
            ['department' => 'Cauca', 'city' => 'Popayán'],
            ['department' => 'Cauca', 'city' => 'Santander de Quilichao'],
            ['department' => 'Cesar', 'city' => 'Valledupar'],
            ['department' => 'Cesar', 'city' => 'La Paz'],
            ['department' => 'Chocó', 'city' => 'Quibdó'],
            ['department' => 'Chocó', 'city' => 'Istmina'],
            ['department' => 'Córdoba', 'city' => 'Montería'],
            ['department' => 'Córdoba', 'city' => 'Lorica'],
            ['department' => 'Cundinamarca', 'city' => 'Bogotá'],
            ['department' => 'Cundinamarca', 'city' => 'Soacha'],
            ['department' => 'Cundinamarca', 'city' => 'Chía'],
            ['department' => 'Guainía', 'city' => 'Inírida'],
            ['department' => 'Guaviare', 'city' => 'San José del Guaviare'],
            ['department' => 'Guajira', 'city' => 'Riohacha'],
            ['department' => 'Guajira', 'city' => 'Maicao'],
            ['department' => 'Huila', 'city' => 'Neiva'],
            ['department' => 'Huila', 'city' => 'Pitalito'],
            ['department' => 'La Guajira', 'city' => 'Riohacha'],
            ['department' => 'La Guajira', 'city' => 'Maicao'],
            ['department' => 'Magdalena', 'city' => 'Santa Marta'],
            ['department' => 'Magdalena', 'city' => 'Ciénaga'],
            ['department' => 'Meta', 'city' => 'Villavicencio'],
            ['department' => 'Meta', 'city' => 'Granada'],
            ['department' => 'Nariño', 'city' => 'Pasto'],
            ['department' => 'Nariño', 'city' => 'Tumaco'],
            ['department' => 'Norte de Santander', 'city' => 'Cúcuta'],
            ['department' => 'Norte de Santander', 'city' => 'Pamplona'],
            ['department' => 'Putumayo', 'city' => 'Mocoa'],
            ['department' => 'Quindío', 'city' => 'Armenia'],
            ['department' => 'Quindío', 'city' => 'Calarcá'],
            ['department' => 'Risaralda', 'city' => 'Pereira'],
            ['department' => 'Risaralda', 'city' => 'Dosquebradas'],
            ['department' => 'San Andrés y Providencia', 'city' => 'San Andrés'],
            ['department' => 'San Andrés y Providencia', 'city' => 'Providencia'],
            ['department' => 'Santander', 'city' => 'Bucaramanga'],
            ['department' => 'Santander', 'city' => 'San Gil'],
            ['department' => 'Sucre', 'city' => 'Sincelejo'],
            ['department' => 'Sucre', 'city' => 'Corozal'],
            ['department' => 'Tolima', 'city' => 'Ibagué'],
            ['department' => 'Tolima', 'city' => 'Espinal'],
            ['department' => 'Valle del Cauca', 'city' => 'Cali'],
            ['department' => 'Valle del Cauca', 'city' => 'Palmira'],
            ['department' => 'Vaupés', 'city' => 'Mitú'],
            ['department' => 'Vichada', 'city' => 'Puerto Carreño'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('departments_and_cities');
    }
}
