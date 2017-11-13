<?php
$routes = [
    'metadata',
    'getAccessToken',
    'createStatistics',
    'updateStatistics',
    'getStatistic',
    'getStatisticSection',
    'getLeaderboard',
    'getAllAchievements',
    'accomplishUserAchievement',
    'getUsersAchievements',
    'createRegisterLink'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

