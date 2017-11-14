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
    'getUsersAchievements',
    'createRegisterLink',
    "accomplishAnAchievement"
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

