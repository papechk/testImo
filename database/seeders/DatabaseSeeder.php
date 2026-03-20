<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Property;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Tags immobiliers
        $tags = [];
        foreach (['Piscine', 'Garage', 'Jardin', 'Terrasse', 'Vue mer', 'Meublé', 'Neuf', 'Ascenseur'] as $titre) {
            $tags[] = Tag::create(['titre' => $titre]);
        }

        // Propriétés
        $properties = [
            ['titre' => 'Villa moderne à Almadies', 'description' => 'Magnifique villa de 5 pièces avec piscine et jardin, vue imprenable sur l\'océan. Finitions haut de gamme.', 'prix' => 250000000, 'ville' => 'Dakar', 'adresse' => 'Route des Almadies', 'code_postal' => '12500', 'surface' => 350, 'vendu' => false, 'tags' => [0,2,4]],
            ['titre' => 'Appartement F3 Plateau', 'description' => 'Bel appartement rénové au cœur du Plateau avec ascenseur et terrasse. Proximité commerces et transports.', 'prix' => 85000000, 'ville' => 'Dakar', 'adresse' => '15 Avenue Léopold Sédar Senghor', 'code_postal' => '10200', 'surface' => 95, 'vendu' => false, 'tags' => [3,5,7]],
            ['titre' => 'Terrain constructible à Diamniadio', 'description' => 'Terrain plat de 500m² dans le nouveau pôle urbain de Diamniadio. Titre foncier disponible.', 'prix' => 35000000, 'ville' => 'Diamniadio', 'adresse' => 'Zone résidentielle Nord', 'code_postal' => '16000', 'surface' => 500, 'vendu' => false, 'tags' => [6]],
            ['titre' => 'Duplex standing Saly', 'description' => 'Duplex de 4 chambres avec piscine privée à 200m de la plage. Idéal pour résidence secondaire ou location saisonnière.', 'prix' => 180000000, 'ville' => 'Saly', 'adresse' => 'Saly Portudal', 'code_postal' => '23000', 'surface' => 220, 'vendu' => true, 'tags' => [0,2,4,5]],
            ['titre' => 'Studio meublé Mermoz', 'description' => 'Studio entièrement meublé et équipé, parfait pour jeune professionnel. Bail disponible immédiatement.', 'prix' => 25000000, 'ville' => 'Dakar', 'adresse' => '8 Rue de Mermoz', 'code_postal' => '11500', 'surface' => 35, 'vendu' => false, 'tags' => [5,6]],
            ['titre' => 'Maison familiale Ouakam', 'description' => 'Grande maison de 6 pièces avec garage et jardin arboré. Quartier calme, idéal pour famille.', 'prix' => 150000000, 'ville' => 'Dakar', 'adresse' => 'Ouakam, près du phare', 'code_postal' => '12000', 'surface' => 280, 'vendu' => false, 'tags' => [1,2]],
            ['titre' => 'Local commercial Point E', 'description' => 'Local commercial de 120m² sur avenue passante. Climatisé, aménagé, prêt à l\'emploi.', 'prix' => 95000000, 'ville' => 'Dakar', 'adresse' => 'Avenue Cheikh Anta Diop', 'code_postal' => '10700', 'surface' => 120, 'vendu' => true, 'tags' => [7]],
            ['titre' => 'Appartement F4 neuf Sacré-Cœur', 'description' => 'Appartement neuf jamais habité, 4 pièces avec terrasse panoramique et 2 places de parking souterrain.', 'prix' => 120000000, 'ville' => 'Dakar', 'adresse' => 'Sacré-Cœur 3', 'code_postal' => '10800', 'surface' => 140, 'vendu' => false, 'tags' => [3,6,7]],
        ];

        foreach ($properties as $data) {
            $tagIds = $data['tags'];
            unset($data['tags']);
            $property = Property::create($data);
            foreach ($tagIds as $i) {
                DB::table('property_tag')->insert([
                    'property_id' => $property->id,
                    'tag_id' => $tags[$i]->id,
                ]);
            }
        }
    }
}
