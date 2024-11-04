<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'], // Permite todos os métodos (GET, POST, PUT, DELETE, etc.)

    'allowed_origins' => ['*'], // Permite todas as origens. Em produção, especifique os domínios permitidos

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // Permite todos os cabeçalhos

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true, // Defina como `true` se estiver usando autenticação com cookies ou sessões
];
