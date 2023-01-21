<?php
return [
    'local' => [
        'domain_extension'          =>              ['.test', '.local', '.localhost'],
        'server_name'               =>              ['localhost', '127.0.0.1'],
        'environment'               =>              'local',
        'base'                      =>              base_path('.env'),
    ],
    
    'production' => [
        'domain_extension'          =>              ['.devel'],
        'server_name'               =>              [''],
        'environment'               =>              'production',
        'base'                      =>              base_path('.env.production'),
    ],
];