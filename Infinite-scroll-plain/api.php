<?php

$firstNames = [
    "John", "Emma", "Michael", "Olivia", "William", "Ava", "James", "Sophia", "Benjamin", "Isabella",
    "Jacob", "Mia", "Ethan", "Charlotte", "Alexander", "Amelia", "Henry", "Harper", "Daniel", "Evelyn",
    "Matthew", "Abigail", "Jackson", "Emily", "Samuel", "Elizabeth", "Sebastian", "Sofia", "David", "Avery",
    "Joseph", "Ella", "Luke", "Grace", "Gabriel", "Chloe", "Andrew", "Victoria", "Nathan", "Lily",
    "Christopher", "Madison", "Ryan", "Scarlett", "Christian", "Zoey", "Jonathan", "Layla", "Noah", "Natalie"
];

$lastNames = [
    "Smith", "Johnson", "Williams", "Jones", "Brown", "Davis", "Miller", "Wilson", "Moore", "Taylor",
    "Anderson", "Thomas", "Jackson", "White", "Harris", "Martin", "Thompson", "Garcia", "Martinez", "Robinson",
    "Clark", "Rodriguez", "Lewis", "Lee", "Walker", "Hall", "Allen", "Young", "Hernandez", "King",
    "Wright", "Lopez", "Hill", "Scott", "Green", "Adams", "Baker", "Gonzalez", "Nelson", "Carter",
    "Mitchell", "Perez", "Roberts", "Turner", "Phillips", "Campbell", "Parker", "Evans", "Edwards", "Collins"
];


$dataBundle = [];

for($i = 0; $i < 10; $i++){
    $name = $firstNames[array_rand( $firstNames )] . ' ' . $lastNames[array_rand($lastNames)];
    array_push($dataBundle, ['id' => rand(), 'name' => $name]);
}

echo json_encode($dataBundle);