<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DepartmentAndCity;

class DepartmentAndCitySeeder extends Seeder
{
    public function run()
    {
        $departmentsAndCities = [
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
            ['department' => 'Vichada', 'city' => 'Puerto Carreño']
        ];

        // Insertar departamentos y ciudades
        foreach ($departmentsAndCities as $entry) {
            DepartmentAndCity::create($entry);
        }
    }
}
